

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>Login Page</title>
    <link rel="stylesheet" href="css\login.css">
</head>
<body>
    <div id="background-slider">
        <img src="images/carousel/carousel_1.jpg" alt="Background Image 1">
        <img src="images/carousel/carousel_1.jpg" alt="Background Image 2">
        <img src="images/carousel/carousel_1.jpg" alt="Background Image 3">
        <!-- Add more images as needed -->
    </div>

    <div class="container">
        <div class="header">
            <img src="images/logo/logo.png" alt="Logo" class="logo">
            <h2>Login</h2>
        </div>
        
        <div class="scroll-container">
            <form id="loginForm" action="signin.php" method="post">
                <!-- USERNAME -->
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required style="border-radius: 3px;">

                <!-- PASSWORD -->
                <label for="password">Password:</label>  
                <input type="password" id="password" name="passwordd" required style="border-radius: 3px;">
                 
                <button type="submit" id="signin"> Sign In</button>
                    
                
            </form>
        </div>

        <div class="login-link">
            Don't have an account? <a href="signup.php" class="blue-link">Sign Up</a>
        </div>
        <div class="login-link">
            Forgot Password? <a href="reset_psw.php" class="blue-link"> Reset Now</a>
        </div>
        <hr>
        
        <div class="login-link">
            Proceed <a href="adminlogin.php" class="blue-link"><b>AS STAFF</b></a>
        </div>
    </div>

    <script src="javascript/login.js"></script>
</body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('connect.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if email and password are set in the form data
    if (isset($_POST['email']) && isset($_POST['passwordd'])) {
        $email = $_POST['email'];
        $password = $_POST['passwordd'];

        // Use a prepared statement to protect against SQL injection
        $sql = "SELECT * FROM register WHERE email = ?";
        $query = $conn->prepare($sql);
        $query->execute(array($email));

        // Check for errors
        $errorInfo = $query->errorInfo();
        if ($errorInfo[0] !== '00000') {
            echo "Error: " . $errorInfo[2];
            exit();
        }

        $row = $query->fetch();
        $count = $query->rowCount();

        if ($count > 0) {
            // Verify the entered password against the stored hashed password
            if (password_verify($password, $row['passwordd'])) {
                session_start();
                $_SESSION['pid'] = $row['pid'];
                $userid = $_SESSION['pid'];
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Makueni Assembly Says",
                        text: "Welcome back!",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(() => {
                        window.location.href = "dashboard.php";
                    });
                </script>';

                exit();
            } else {
                // Incorrect password
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Makueni Assembly Says",
                        text: "Incorrect password!",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(() => {
                        window.location.href = "signin.php";
                    });
                </script>';

                exit();
            }
        } else {
            // No user found with the provided email
            echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Makueni Assembly Says",
                        text: "Invalid Login credentials!",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(() => {
                        window.location.href = "signin.php";
                    });
                </script>';

            exit();
        }
    }
}
?>

</html>
