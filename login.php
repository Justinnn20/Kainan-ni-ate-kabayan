<?php
session_start();
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    
    // I-sanitize ang input para iwas SQL Injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];

    // 1. Hanapin ang email sa database (Base sa table mo na 'Create_Account')
    $sql = "SELECT * FROM Create_Account WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // 2. I-verify ang Hashed Password laban sa tinype ng user
        if (password_verify($pass, $row['password'])) {
            
            // TAMA ANG PASSWORD! Gagawa tayo ng Session "Stamp"
            // Note: Siguraduhin na may 'id' o 'user_id' column ka sa database
            $_SESSION['user_id'] = $row['id']; 
            $_SESSION['user_name'] = $row['name']; 
            
            // DITO MO BABAGUHIN: Itatapon na natin siya sa homepage.php
            echo "<script>alert('Welcome, " . $row['name'] . "!'); window.location='homepage.php';</script>";
        } else {
            // MALING PASSWORD
            echo "<script>alert('Incorrect Password!'); window.history.back();</script>";
        }
    } else {
        // HINDI NAKITA ANG EMAIL
        echo "<script>alert('Email not found!'); window.history.back();</script>";
    }
}
?>
