<?php
session_start();

// Security Guard: Ibalik sa login kung hindi pa logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kainan ni Ate Kabayan</title>
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans+Code:ital,wght@0,300..800;1,300..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pacifico&family=Patrick+Hand&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Patrick+Hand&family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
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
            <a href="homepage.php" class="active">Home</a>
            <a href="menu.php">Menu</a>
            <a href="About Us.php">About Us</a>
            <a href="Contactus.php">Contact Us</a>
        </nav>

        <div class="header-actions">
            <span style="color: white; margin-right: 15px; font-weight: 600;">
                <i class="fa-solid fa-circle-user"></i> <?php echo $_SESSION['user_name']; ?>
            </span>

            <a href="cart.php" class="cart-icon-btn">
                <i class="fa-solid fa-shopping-cart"></i>
                <span class="badge" id="cart-badge">0</span>
            </a>
            
            <a href="logout.php" style="background: #ff4757; color: white; padding: 8px 15px; border-radius: 20px; text-decoration: none; font-size: 12px; margin-left: 10px;">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </a>
        </div>
    </div>
</header>


<section class="hero">
    <div class="hero-text">
         <div class="hero-buttons">
            <a href="menu.php" class="btn-order">ORDER NOW!</a>
    </div>
 </div>
</section>

<section id="menu" class="menu-section">
    <div class="menu-orange-banner">
        <h2 class="banner-title">MGA PABORITO NI ATE KABAYAN</h2>
    </div>

    <div class="container menu-container-content">
        <h3 class="section-subtitle-compact">BUSOG AT SULIT SA BAWAT ORDER! ITO ANG ILAN SA MGA <span class="best-sellers">BEST-SELLERS</span> NA SIGURADONG BABALIK-BALIKAN MO:</h3>
    </div>

    <div class="menu-scroll-wrapper">
        <div class="menu-card-scroll">
            <div class="card-image-circle">
                <img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772298630/PorkSilog_wpfoym.png" alt="Porksilog">
            </div>
            <div class="card-content">
                <div class="title-price">
                    <h3>PORKSILOG</h3>
                    <span class="price-badge">₱130</span>
                </div>
                <p class="desc">Crispy porkchop with sinangag rice and fried egg.</p>
                <div class="rating">⭐⭐⭐⭐⭐</div>
                <div class="card-actions">
                    <button class="btn-add-cart">Add to Cart! <i class="fa-solid fa-cart-shopping"></i></button>
                    <button class="btn-heart"><i class="fa-regular fa-heart"></i></button>
                </div>
            </div>
        </div>

        <div class="menu-card-scroll">
            <div class="card-image-circle">
                <img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772299118/Goto_Overload_xupge7.png" alt="Goto Overload">
            </div>
            <div class="card-content">
                <div class="title-price">
                    <h3>GOTO OVERLOAD</h3>
                    <span class="price-badge">₱150</span>
                </div>
                <p class="desc">Sabaw na may overload twalya, balat, isaw, at karne with rice.</p>
                <div class="rating">⭐⭐⭐⭐⭐</div>
                <div class="card-actions">
                    <button class="btn-add-cart">Add to Cart! <i class="fa-solid fa-cart-shopping"></i></button>
                    <button class="btn-heart"><i class="fa-regular fa-heart"></i></button>
                </div>
            </div>
        </div>

        <div class="menu-card-scroll">
            <div class="card-image-circle">
                <img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772298989/Lugaw_overload_ch9swb.png" alt="Lumpiang Shanghai">
            </div>
            <div class="card-content">
                <div class="title-price">
                    <h3>LUGAW OVERLOAD</h3>
                    <span class="price-badge">₱140</span>
                </div>
                <p class="desc">UNLI lugaw na may itlog, lechon kawali, twalya, at isaw.</p>
                <div class="rating">⭐⭐⭐⭐</div>
                <div class="card-actions">
                    <button class="btn-add-cart">Add to Cart! <i class="fa-solid fa-cart-shopping"></i></button>
                    <button class="btn-heart"><i class="fa-regular fa-heart"></i></button>
                </div>
            </div>
        </div>

        <div class="menu-card-scroll">
            <div class="card-image-circle">
                <img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772299033/LiempoSilog_zpdtmk.png" alt="Liemposilog"> 
            </div>
            <div class="card-content">
                <div class="title-price">
                    <h3>LIEMPOSILOG</h3>
                    <span class="price-badge">₱155</span>
                </div>
                <p class="desc">Grilled Liempo with sinangag rice and fried egg.</p>
                <div class="rating">⭐⭐⭐⭐⭐</div>
                <div class="card-actions">
                    <button class="btn-add-cart">Add to Cart! <i class="fa-solid fa-cart-shopping"></i></button>
                    <button class="btn-heart"><i class="fa-regular fa-heart"></i></button>
                </div>
            </div>
        </div>

        <div class="menu-card-scroll">
            <div class="card-image-circle">
                <img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772299076/Sisig_Barkada_nztbzh.png" alt="Sisig Barkada">
            </div>
            <div class="card-content">
                <div class="title-price">
                    <h3>SISIG BARKADA</h3>
                    <span class="price-badge">₱185</span>
                </div>
                <p class="desc">Sizzling pork sisig with egg for sharing barkada.</p>
                <div class="rating">⭐⭐⭐⭐⭐</div>
                <div class="card-actions">
                    <button class="btn-add-cart">Add to Cart! <i class="fa-solid fa-cart-shopping"></i></button>
                    <button class="btn-heart"><i class="fa-regular fa-heart"></i></button>
                </div>
            </div>
        </div>

        <div class="menu-card-scroll">
            <div class="card-image-circle">
                <img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772299423/Siomai_Chowfan_cq4la2.png" alt="Siomai Chowfan">
            </div>
            <div class="card-content">
                <div class="title-price">
                    <h3>SIOMAI CHOWFAN</h3>
                    <span class="price-badge">₱95</span>
                </div>
                <p class="desc">Crispy fried siomai with special chowfan rice</p>
                <div class="rating">⭐⭐⭐⭐⭐</div>
                <div class="card-actions">
                    <button class="btn-add-cart">Add to Cart! <i class="fa-solid fa-cart-shopping"></i></button>
                    <button class="btn-heart"><i class="fa-regular fa-heart"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>  

  <section class="features-section">
    <div class="features-container">
        <div class="feature-card">
            <div class="feature-icon-box">
                <img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772299469/Motor_Driver_Homepage_ieqima.png" alt="Motorcycle Delivery Icon">
            </div>
            <div class="feature-content">
                <h3>Fast Delivery</h3>
                <p>Si Ate ang bahala magpadeliver ng masarap, mabilis, at busog meal!</p>
            </div>
        </div>
        <div class="feature-card">
            <div class="feature-icon-box">
                <img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772299510/Plate_logo_pic_Homepage_eftfyb.png" alt="Spoon and Fork Icon">
            </div>
            <div class="feature-content">
                <h3>Sulit Servings</h3>
                <p>Busog ka na, sulit pa — good for sharing with pamilya at barkada.</p>
            </div>
        </div>
        <div class="feature-card">
            <div class="feature-icon-box">
                <img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772299543/Alagang_Bayan_logo_pic_vnqraw.png" alt="Chef Icon">
            </div>
            <div class="feature-content">
                <h3>Alagang Kabayan</h3>
                <p>Laging may ngiti, alaga, at malasakit mula sa team ni Ate Kabayan.</p>
            </div>
        </div>
    </div>
  </section>

  <section class="gallery-section">
    <h2 class="gallery-title">MGA BUSOG NA NGITI NG ATING MGA KABAYAN</h2>
    <p class="gallery-subtitle">Ganito kasaya ang bawat kain sa Kainnan ni Ate Kabayan. Silipin ang mga busog at masayang moments ng aming mga suki!</p>
    <div class="gallery-scroll-wrapper">
        <div class="gallery-photos">
            <div class="gallery-item"><img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772299840/Homepage_pic1_cffqvi.jpg" alt="Customer"></div>
            <div class="gallery-item"><img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772299861/Homepage_pic2_v3nsaf.jpg" alt="Customer"></div>
            <div class="gallery-item"><img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772299886/Homapage_pic_3_tv1ru9.jpg" alt="Customer"></div>
            <div class="gallery-item"><img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772299904/Homapage_pic_4_job6tt.jpg" alt="Customer"></div>
            <div class="gallery-item"><img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772300043/Homapage_pic_5_rykx3w.jpg" alt="Customer"></div>
            <div class="gallery-item"><img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772300044/Homapage_pic_6_is8j9z.jpg" alt="Customer"></div>
            <div class="gallery-item"><img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772300046/Homapage_pic_7_br1uak.jpg" alt="Customer"></div>
            <div class="gallery-item"><img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772300048/Homapage_pic_8_dirmuu.jpg" alt="Customer"></div>
            <div class="gallery-item"><img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772300049/Homapage_pic_9_okbwvv.jpg" alt="Customer"></div>
            <div class="gallery-item"><img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772300051/Homapage_pic_10_qfzdzb.jpg" alt="Customer"></div>
            <div class="gallery-item"><img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772300052/Homapage_pic_11_hp1nab.jpg" alt="Customer"></div>
            <div class="gallery-item"><img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772300054/Homapage_pic_12_byuf1i.jpg" alt="Customer"></div>
            <div class="gallery-item"><img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772300056/Homapage_pic_13_oqptun.jpg" alt="Customer"></div>
        </div>
    </div>
  </section>

<section class="cta">
    <div class="cta-content">
        <h2>GUTOM KANA? KAIN NA KABAYAN!</h2>
        <p>Mas pinadali na namin para sayo! Pick-up, delivery, o dine-in, lahat pwedeng pwede. Siguradong busog ka sa sarap at alaga ni Ate Kabayan.</p>
        <div class="cta-buttons">
            <a href="menu.php" class="btn-primary">ORDER NOW!</a>
            <a href="https://share.google/I9ubNtooj7WKodVWl" class="btn-secondary">VISIT US!</a>
        </div>
    </div>
</section>

  <section id="reserve" class="reserve-section">
    <div class="reserve-left">
        <h1 class="reserve-title">
          <span class="small">RESERVE A</span><br>
          <span class="big">TABLE</span>
        </h1>
        <form id="reserveForm" class="reserve-form">
          <div class="input-group">
            <span class="icon">👤</span>
            <input type="text" placeholder="Pangalan" required>
          </div>
          <div class="input-group">
            <span class="icon">👥</span>
            <input type="number" placeholder="Ilang tao?" required>
          </div>
          <div class="input-group">
            <span class="icon">📅</span>
            <input type="datetime-local" required>
          </div>
          <button type="submit" class="reserve-btn">RESERVE</button>
        </form>
        <p id="reserveMsg"></p>
    </div>
    <div class="reserve-right">
        <img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772299904/Homapage_pic_4_job6tt.jpg" alt="Group eating" />
    </div>
  </section>

<footer id="contact">
        <div class="footer-content">
            <div class="footer-section contact-info">
                <img src="https://res.cloudinary.com/dn38jxbeh/image/upload/v1772298452/logo_ate_kabayan_jtfqeg.jpg" alt="Kainan ni Ate Kabayan Logo" class="footer-logo">
                <div class="details">
                    <p><i class="fas fa-clock"></i> OPEN DAILY (10AM - 3AM)</p>
                    <p><i class="fas fa-phone-alt"></i> (0921) 910 6057</p>
                    <p><i class="fas fa-map-marker-alt"></i> 1785 Evangelista St., Bangkal, Makati City</p>
                </div>
            </div>

            <div class="footer-section sitemap">
                <h3>SITEMAP</h3>
                <ul>
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="#reserve">Reserve a Table</a></li>
                    <li><a href="About Us.php">About Us</a></li>
                    <li><a href="Contactus.php">Contact Us</a></li>
                </ul>
            </div>

            <div class="footer-section social-media">
                <h3>SOCIAL MEDIA</h3>
                <ul>
                    <li><a href="https://www.facebook.com/kainanniatekabayan"><i class="fab fa-facebook-f"></i> Kainan ni Ate Kabayan</a></li>
                    <li><a href="https://www.instagram.com/kainanniatekabayan/"><i class="fab fa-instagram"></i> @Kainan ni Ate Kabaya  </a></li>
                    <li><a href="https://share.google/I9ubNtooj7WKodVWl"><i class="fab fa-google"></i> Kainan ni Ate Kabayan</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>© 2022 Kainan ni Ate Kabayan. All Right Reserved.</p>
        </div>
    </footer> 
    
    <script src="script.js"></script>
</body>
</html>
