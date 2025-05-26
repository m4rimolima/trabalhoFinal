<?php
include('conexao.php');
session_start();

if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['username'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    $sql = "SELECT * FROM user WHERE user_email = :email AND user_name = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':email' => $email,
        ':username' => $username
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['user_password'])) {
            $_SESSION['id'] = $user['id_user'];
            $_SESSION['email'] = $user['user_email'];
            $_SESSION['name'] = $user['user_name'];
            header("Location: homepage.php");
            exit;
        } else {
            echo '<div class="message">Incorrect password.</div>';
        }
    } else {
        echo '<div class="message">User not found.</div>' ;
    }

} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Login</title>    
<link rel="stylesheet" href="assets/style.css">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">


</head>
<body class="bodySignUp">
    <div class="signUpBox">
    <h2 class="signUpLabel">SIGN IN </h2>
        <form action="" method="POST">
            <input type="email" name="email" placeholder="EMAIL" class="inputBox"/><br><br>
            <input type="password" name="password" placeholder="PASSWORD" class="inputBox" /><br><br>
            <input type="text" name="username" placeholder="USERNAME" class="inputBox"/><br><br>
            <button type="submit" class="buttonSign">SIGN IN</button>
        </form>
    </div>
<br>
 
    <div>
        <button type="button" onclick="window.location.href='register.php'" class="signupText">
        DON'T HAVE AN ACCOUNT? SIGN UP
        </button>
    </div>
       <div>
        <img src="assets/images/loginBanner.png" class="loginBanner" />
    </div>
</body>
</html>
