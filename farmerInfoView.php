<?php
include('db_connect.php');

// Delete logic (no confirmation)
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM farmers WHERE id = $id";
    mysqli_query($conn, $deleteQuery);
    header("Location: farmerInfoView.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Farmer Details</title>
  <link rel="stylesheet" href="farmerCss.css">
</head>
<body>
  <div class="sidebar">
    <h1>🌾 Farmer Panel</h1>
    <a href="farmerInfo.html">Farmer Info</a>
    <a href="farmerInfoView.php">Farmer Details</a>
    <a href="crop.html">Add Crop</a>
    <a href="Farmer_dashboard.php">Dashboard</a>
  </div>

  <div class="main">
    <header>👤 Farmer Details</header>
    <div class="container">
      <table class="view-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Contact Number</th>
            <th>Street</th>
            <th>City</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query = "SELECT * FROM farmers";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['contact']) . "</td>";
                echo "<td>" . htmlspecialchars($row['street']) . "</td>";
                echo "<td>" . htmlspecialchars($row['city']) . "</td>";
                echo "<td>
                        <a class='btn-edit' href='editFarmer.php?id={$row['id']}'>Edit</a>
                        <a class='btn-delete' href='farmerInfoView.php?delete_id={$row['id']}'>Delete</a>
                      </td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='5'>No farmer data found.</td></tr>";
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
