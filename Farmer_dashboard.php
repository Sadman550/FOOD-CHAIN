<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Crop Dashboard</title>
  <link rel="stylesheet" href="farmerCss.css">
</head>
<body>
  <div class="sidebar">
    <h1>🌾 Farmer Panel</h1>
    <a href="farmerInfo.html">Farmer Info</a>
    <a href="farmerInfoView.html">Farmer Details</a>
    <a href="crop.html">Add Crop</a>
    <a href="Farmer_dashboard.php">Dashboard</a>
  </div>

  <div class="main">
    <header>📦 Submitted Crops</header>
    <div class="container">
      <table class="view-table">
        <thead>
          <tr>
            <th>Crop Name</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include('db_connect.php');

            $query = "SELECT * FROM crops";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td data-label='Crop Name'>" . htmlspecialchars($row['crop_name']) . "</td>";
                    echo "<td data-label='Type'>" . htmlspecialchars($row['type']) . "</td>";
                    echo "<td data-label='Quantity'>" . htmlspecialchars($row['quantity']) . "</td>";
                    echo "<td data-label='Status'>" . (!empty($row['status']) ? htmlspecialchars($row['status']) : 'Waiting for Grading') . "</td>";
                    echo "<td class='action-buttons'>
                            <button class='btn-edit'>Edit</button>
                            <button class='btn-delete'>Delete</button>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No crops submitted yet.</td></tr>";
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
