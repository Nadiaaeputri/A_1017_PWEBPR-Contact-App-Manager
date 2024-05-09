      <div class="sidebar">
        <nav>
            <div class="sidebar-header">
                <div class="logo">
                  <h1>Contact App Manager</h1>
                </div>
                <ul>
                    <div class="sidebar-menu"> 
                        <li><a href="#">
                                <i class="fas fa-user"></i>
                                <span class="nav-item">Dashboard</span>
                            </a>
                        </li>
                        <li><a href="#">
                            <i class="fas fa-cog"></i>
                            <span class="nav-item">Setting</span>
                        </a>
                        </li>
                        <li><a href="#">
                            <i class="fas fa-question-circle"></i>
                            <span class="nav-item">Help</span>
                        </a>
                        </li>
                        <li><a href="login.php" class="logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="nav-item">Logout</span>
                        </a>
                        </li>
                    </div>
                </ul>
        </nav>
        <section class="main">
          <div class="main-content">
            <h1>Contact List</h1>
          </div>
          <div class="main-body">
          <div class="Account">
            <br><a href="tambahdata.php" class="Tambahdata">
                <i class="fa fa-user-plus"></i>
            </a>
            <div class="Account_details">
                <br><table>
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
                        echo "<td>" . $row['No_ID'] . "</td>";
                        echo "<td>" . $row['No_HP'] . "</td>";
                        echo "<td>" . $row['Owner'] . "</td>";
                        echo "<td>";
                        echo "<a href='editdata.php'><i class='fas fa-edit'></i></a>"; // Icon untuk tombol "Edit"
                        echo "<a href='deletedata.php'><i class='fas fa-trash'></i></a>"; // Icon untuk tombol "Delete"
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