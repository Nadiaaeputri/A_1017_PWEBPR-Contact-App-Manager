<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
        <h2 style="text-align: center;">Data Owner</h2>
        <form action="add_data.php" method="POST">
            <div class="form-group">
                <label for="NO_HP">NO_HP :</label>
                <input type="text" id="NO_HP" name="NO_HP" required>
            </div>
            <div class="form-group">
                <label for="Onwer">Owner :</label>
                <input type="text" id="Owner" name="phone_number" required>
            </div>
            <button type="submit">Save</button>
        </form>
    </div>
</body>
</html>
