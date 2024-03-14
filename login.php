<?php
include ('connect.php');

$email = $_POST['email'];
$password = $_POST['passwordd']; // Assuming 'passwordd' is the name attribute of your password input field

// Retrieve the hashed password from the database based on the provided email
$sql = "SELECT * FROM register WHERE email = ?";
$query = $conn->prepare($sql);
$query->execute(array($email));
$row = $query->fetch();
$count = $query->rowCount();

if ($count > 0) {
    // Verify the entered password against the stored hashed password
    if (password_verify($password, $row['passwordd'])) {
        session_start();
        $_SESSION['pid'] = $row['pid'];
        $userid = $_SESSION['pid'];
        header("Location: dashboard.php");
        exit();
    } else {
        // Password does not match
        echo '<script>alert("Incorrect password. Please try again.")</script>';
    }
} else {
    // No user found with the provided email
    echo '<script>alert("User not found. Please check your email.")</script>';
}
?>
