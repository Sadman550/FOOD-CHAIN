<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $crop_name = mysqli_real_escape_string($conn, $_POST['crop_name']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

    $query = "INSERT INTO crops (crop_name, type, quantity) VALUES ('$crop_name', '$type', '$quantity')";

    if (mysqli_query($conn, $query)) {
        header("Location: Farmer_dashboard.php");
        exit();
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }
}
?>
