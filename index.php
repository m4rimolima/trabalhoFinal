<?php
ob_start();
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('conexao.php');

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE user_email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':email' => $email,
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['user_password'])) {
                // Set session variables
                $_SESSION['id'] = $user['id_user'];
                $_SESSION['email'] = $user['user_email'];
                $_SESSION['name'] = $user['user_name'];  // Move this line here

                // Redirect to homepage
                header("Location: homepage.php");
                exit;
            } else {
                $error = 'Incorrect password.';
            }
        } else {
            $error = 'User not found.';
        }
    } else {
        $error = 'Fill in all fields.';
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
        <h2 class="signUpLabel">SIGN IN</h2>

        <?php if (!empty($error)): ?>
            <div class="message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <input type="email" name="email" placeholder="EMAIL" class="inputBox inputs" required
                value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" /><br><br>

            <input type="password" name="password" placeholder="PASSWORD" class="inputBox inputs" required /><br><br>

            <button type="submit" class="buttonSign">SIGN IN</button>
        </form>
    </div>
    <br>

    <div>
        <button type="button" onclick="window.location.href='register.php'" class="signupText">
            DON'T HAVE AN ACCOUNT? SIGN UP
        </button>

        <img src="assets/images/loginBanner.png" class="loginBanner" />
    </div>
</body>
</html>
