<?php
require_once'database.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "SELECT * FROM data_akun WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        header("Location: index.php");
        exit;
    } else {
        // Authentication failed
        $error = "Username or password incorrect!";
    }

    // Close connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <h2>Login</h2> <br>
            <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>
            <form action="login.php" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field">
                    <input type="submit" name="submit" class="button" value="Login">
                </div>
                <div class="link"> 
                    Don't have an account? <a href="registrasi.php">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
