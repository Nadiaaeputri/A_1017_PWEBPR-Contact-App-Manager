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
