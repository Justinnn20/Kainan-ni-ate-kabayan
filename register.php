<?php
include "db_conn.php";

if (isset($_POST['full_name'])) {
    // Kunin ang data mula sa HTML 'name' attributes
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact_number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];
    $cpass = $_POST['confirm_password'];

    // 1. Check kung magkatugma ang passwords
    if ($pass !== $cpass) {
        echo "<script>alert('Passwords do not match!'); window.history.back();</script>";
        exit();
    }

    // 2. I-encrypt ang password (Security Best Practice)
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    // 3. I-save sa database (Siguraduhin na 'Create_Account' ang table name mo)
    $sql = "INSERT INTO Create_Account (full_name, contact_number, email, password) 
            VALUES ('$name', '$contact', '$email', '$hashed_pass')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Success! Account Created.'); window.location='login.html';</script>";
    } else {
        // Kung may error (halimbawa: duplicate email)
        echo "Error: " . mysqli_error($conn);
    }
}
?>
