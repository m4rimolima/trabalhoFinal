<?php
session_start();
include('conexao.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username && $email && $password) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        try {
            $stmt = $pdo->prepare("INSERT INTO user (user_name, user_email, user_password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $passwordHash]);
            echo '<div class="message"> "Registered successfully!"</div>';
            $_SESSION['name']= $username;
            header("Location: homepage.php");
exit;

        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                echo '<div class="message">Email or username already exists!</div>';
            } else {
                echo '<div class="message">Error: </div>' . $e->getMessage();
            }
        }
    } else {
        echo '<div class="message">Fill all fields.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" href="/trabalhofinal/assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

</head>
<body class="bodySignUp">

    <div class="signUpBox">
        <h2 class="signUpLabel" onclick="window.location.href='homepage.php'">SIGN UP</h2>
        <form method="post">
            <label class="labels">NAME</label>
            <input type="text" name="username" required  class="inputBox"/><br>
            <label class="labels">EMAIL</label>
            <input type="email" name="email" required class="inputBox "/><br>
            <label class="labels">PASSWORD</label>
            <input type="password" name="password" required class="inputBox "/><br>
            <button type="submit" class="buttonSign">SIGN UP</button>
        </form>
    </div> 
        <br>
    <div>
        <button type="button" onclick="window.location.href='index.php'" class="signupText" >
                ALREADY HAVE AN ACCOUNT? SIGN IN
        </button>
        <img src="assets/images/loginBanner.png" class="loginBanner" />
    </div>
</body>
</html>

