
    <div class="container">
        <div class="box form-box">
            <div class="form-header">
                <h2>Sign up</h2> <br>
            </div>
            <form action="registrasi.php" method="post"> <!-- Ganti action menjadi registrasi.php -->
                <div class="field input">
                    <label for="longname">Nama</label>
                    <input type="text" name="longname" id="longname" required>
                </div>
                <div class="field input">
                    <label for="age">Umur</label>
                    <input type="text" name="age" id="age" required>
                </div>
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field">
                    <input type="submit" name="submit" class="button" value="Sign Up">
                </div>
                <?php if (isset($error)) { ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php } ?>
                <div class="link"> 
                    Sudah punya akun? <a href="login.php">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
