<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    $conn = new mysqli("localhost", "root", "", "food_chain");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ? AND user_type = ?");
    $stmt->bind_param("ss", $username, $user_type);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        if (hash('sha256', $password) === $hashedPassword) {
            // ✅ Success: redirect to farmerInfo.html
            header("Location: farmerInfo.html");
            exit;
        } else {
            echo "<h2>❌ Incorrect password.</h2>";
        }
    } else {
        echo "<h2>❌ User not found.</h2>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "❌ Invalid Request Method";
}
?>
