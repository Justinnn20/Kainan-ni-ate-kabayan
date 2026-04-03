<?php
session_start();
include 'db_conn.php';

// 1. I-check kung logged in ang user
$is_logged_in = isset($_SESSION['user_id']);
$can_rate = false;

if ($is_logged_in) {
    $user_id = $_SESSION['user_id'];
    // 2. I-check kung may 'Completed' order na ang user na ito
    $check_order = "SELECT * FROM orders WHERE user_id = '$user_id' AND status = 'Completed' LIMIT 1";
    $order_result = mysqli_query($conn, $check_order);
    if (mysqli_num_rows($order_result) > 0) {
        $can_rate = true;
    }
}

// 3. Kunin ang Stats para sa Ratings Display
$stats_query = "SELECT 
    COUNT(*) as total_reviews, 
    AVG(rating) as avg_rating,
    SUM(CASE WHEN rating = 5 THEN 1 ELSE 0 END) as star5,
    SUM(CASE WHEN rating = 4 THEN 1 ELSE 0 END) as star4,
    SUM(CASE WHEN rating = 3 THEN 1 ELSE 0 END) as star3,
    SUM(CASE WHEN rating = 2 THEN 1 ELSE 0 END) as star2,
    SUM(CASE WHEN rating = 1 THEN 1 ELSE 0 END) as star1
    FROM reviews";

$stats_result = mysqli_query($conn, $stats_query);
$stats = mysqli_fetch_assoc($stats_result);

$total = $stats['total_reviews'] > 0 ? $stats['total_reviews'] : 1; 
$avg = number_format($stats['avg_rating'] ?? 0, 1);

// Compute percentages para sa progress bars
$p5 = ($stats['star5'] / $total) * 100;
$p4 = ($stats['star4'] / $total) * 100;
$p3 = ($stats['star3'] / $total) * 100;
$p2 = ($stats['star2'] / $total) * 100;
$p1 = ($stats['star1'] / $total) * 100;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kainan ni Ate Kabayan - Ratings</title>
    <link rel="stylesheet" href="ratings.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<header>
    <div class="header-container">
        <div class="logo">
            <div class="logo-circle">
                <img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772298452/logo_ate_kabayan_jtfqeg.jpg" alt="Logo">
            </div>
            <h2>KAINAN NI ATE KABAYAN</h2>
        </div>
        
        <nav>
            <a href="index.php">Home</a>
            <a href="menu.php">Menu</a>
            <a href="About Us.php">About Us</a>
            <a href="Contactus.php">Contact Us</a>
        </nav>

        <div class="header-actions">
            <a href="cart.php" class="cart-icon-btn">
                <i class="fa-solid fa-shopping-cart"></i>
                <span class="badge" id="cart-badge">0</span>
            </a>
            <button class="btn-order-now" onclick="window.location.href='menu.php'">Order Now!</button>
        </div>
    </div>
</header>

<main>
    <div class="glass-card">
        <div class="card-header-flex">
            <div class="title-section">
                <h2>RATINGS AND REVIEW</h2>
                <div class="stars-display">
                    <?php 
                    for($i = 1; $i <= 5; $i++) {
                        echo ($i <= round($avg)) ? '<i class="fa-solid fa-star gold"></i>' : '<i class="fa-regular fa-star"></i>';
                    }
                    ?>
                </div>
            </div>
            <?php if ($can_rate): ?>
                <button class="btn-review-main" onclick="openReviewModal()">Write Review</button>
            <?php endif; ?>
        </div>

        <div class="ratings-layout">
            <div class="score-container">
                <span id="bigScore"><?php echo ($stats['total_reviews'] > 0) ? $avg : "0.0"; ?></span>
                <div class="count-text"><?php echo $stats['total_reviews']; ?> reviews</div>
            </div>

            <div class="bars-container">
                <?php 
                $star_levels = [5, 4, 3, 2, 1];
                foreach($star_levels as $level): 
                    $pct = ($stats['star'.$level] / $total) * 100;
                ?>
                <div class="bar-row">
                    <span><?php echo $level; ?></span>
                    <div class="bar-bg">
                        <div class="bar-fill" style="width: <?php echo $pct; ?>%;"></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="reviews-feed">
            <h3>Recent Reviews</h3>
            <?php
            // Inupdate: Ginawang full_name at create_acc
            $rev_query = "SELECT r.*, u.full_name FROM reviews r JOIN create_acc u ON r.user_id = u.id ORDER BY r.created_at DESC";
            $rev_result = mysqli_query($conn, $rev_query);

            while($row = mysqli_fetch_assoc($rev_result)): ?>
                <div class="feed-item">
                    <div class="feed-header">
                        <strong><?php echo $row['full_name']; ?></strong>
                        <div class="stars-mini">
                            <?php echo str_repeat('★', $row['rating']); ?>
                        </div>
                    </div>
                    <p><?php echo $row['comment']; ?></p>
                    
                    <?php if(!empty($row['review_image'])): ?>
                        <div class="review-img-box">
                            <img src="uploads/<?php echo $row['review_image']; ?>" alt="Review Image">
                        </div>
                    <?php endif; ?>
                    
                    <small><?php echo date('M d, Y', strtotime($row['created_at'])); ?></small>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <div id="reviewModal" class="modal-overlay">
        <div class="modal-box">
            <span class="close-btn" onclick="closeReviewModal()">&times;</span>
            <h3>Write a Review</h3>
            <form action="submit_review.php" method="POST" enctype="multipart/form-data">
                <div class="star-rating-radio">
                    <input type="radio" name="rating" value="5" id="star5" required><label for="star5">★</label>
                    <input type="radio" name="rating" value="4" id="star4"><label for="star4">★</label>
                    <input type="radio" name="rating" value="3" id="star3"><label for="star3">★</label>
                    <input type="radio" name="rating" value="2" id="star2"><label for="star2">★</label>
                    <input type="radio" name="rating" value="1" id="star1"><label for="star1">★</label>
                </div>
                <textarea name="comment" placeholder="Anong masasabi mo sa pagkain, Kabayan?" required></textarea>
                
                <div class="image-upload-section">
                    <label for="imageUpload"><i class="fa-solid fa-camera"></i> Mag-upload ng Picture</label>
                    <input type="file" name="review_image" id="imageUpload" accept="image/*">
                </div>
                
                <button type="submit" class="btn-submit-form">Submit Review</button>
            </form>
        </div>
    </div>
</main>

<footer>
    <div class="footer-left">
        <img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772298452/logo_ate_kabayan_jtfqeg.jpg" alt="Logo" class="footer-logo" style="width: 50px; border-radius: 50%;">
        <div class="footer-info">
            <p><i class="fa-solid fa-door-open"></i> OPEN DAILY (10AM - 3AM)</p>
            <p><i class="fa-solid fa-phone"></i> (0921) 910 6637</p>
            <p><i class="fa-solid fa-location-dot"></i> 1785 Evangelista St. Bangkal, Makati City</p>
        </div>
    </div>
    <div class="footer-links">
        <a href="index.php">Home</a>
        <a href="menu.php">Menu</a>
        <a href="cart.php">Cart</a>
    </div>
</footer>

<script src="script.js"></script>
<script>
    function openReviewModal() {
        document.getElementById('reviewModal').style.display = 'flex';
    }
    function closeReviewModal() {
        document.getElementById('reviewModal').style.display = 'none';
    }
    window.onclick = function(event) {
        let modal = document.getElementById('reviewModal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>
