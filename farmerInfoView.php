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
            include('db_connect.php');
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
                        <button class='btn-edit'>Edit</button>
                        <button class='btn-delete'>Delete</button>
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
