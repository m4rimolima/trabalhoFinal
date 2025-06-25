<?php
session_start();
include('protect.php');
include('includes/menu.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ULTRAVIOLET BOOKSTORE</title>

    <link rel="stylesheet" href="/trabalhofinal/assets/homepage.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
</head>
<body class="homepage">
    <p class="welcomeMessage">
        Welcome to the home page, <?php echo htmlspecialchars($_SESSION['name']); ?>!
    </p>

    <section class="homepageBanner">
        <img src="/trabalhofinal/assets/images/homepageBanner.png" />
    </section>
    <section class="subBanner">
        <img src="/trabalhofinal/assets/images/subBanner.png" />
    </section>
    <section class="booksBanner">
        <img src="/trabalhofinal/assets/images/booksBanner.png" />
    </section>

