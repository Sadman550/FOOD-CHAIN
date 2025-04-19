<?php
include('db_connect.php');

$id = $_GET['id'];
$query = "SELECT * FROM farmers WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Farmer</title>
  <link rel="stylesheet" href="farmerCss.css"> <!-- Your existing CSS -->
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
    <header>✏️ Edit Farmer</header>
    <div class="container">
      <form action="update_farmer.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>

        <label for="contact">Contact Number</label>
        <input type="text" name="contact" value="<?php echo $row['contact']; ?>" required>

        <label for="street">Street</label>
        <input type="text" name="street" value="<?php echo $row['street']; ?>" required>

        <label for="city">City</label>
        <input type="text" name="city" value="<?php echo $row['city']; ?>" required>

        <button type="submit" class="btn-edit">Update Farmer</button>
      </form>
    </div>
  </div>
</body>
</html>
