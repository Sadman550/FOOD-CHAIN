<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];

    if (!empty($name)) {
        $sql = "INSERT INTO farmers (name, street, city, contact)
                VALUES ('$name', '$street', '$city', '$contact')";
        
        if (mysqli_query($conn, $sql)) {
            // Redirect instead of echoing
            header("Location: farmerInfoView.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Name is required.";
    }
}
?>
