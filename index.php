<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "contact_owner";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM list_contact";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact App Manager - Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <p>Account</p>
        </div>

        <div class="sidebar-menu">
            <a href="#"><button class = "button"> Profil</button></a>
            <a href="#"><button class = "button"> Setting</button></a>
            <a href="login.html"><button class = "button">Logout</button></a>
        </div>
    </div>
    <main>
        <div class="main-content">
            <h2><br>Contact List</h2><br>
            <table>
                <tr>
                    <th>No ID</th>
                    <th>No HP</th>
                    <th>Owner</th>
                    <th>Action</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['No ID'] . "</td>";
                    echo "<td>" . $row['No HP'] . "</td>";
                    echo "<td>" . $row['Owner'] . "</td>";
                    echo "<td>";
                    echo "<button>Add</button>";
                    echo "<button>Edit</button>";
                    echo "<button>Delete</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </main>
</body>
</html>

<?php
mysqli_close($conn);
?>