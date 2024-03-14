<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

    <title>Signup Page</title>
    <link rel="stylesheet" href="css\styles.css">
</head>

</script>
<body>
    <div id="background-slider">
        <img src="images\carousel\carousel_1.jpg" alt="Background Image 1">
        <img src="images\carousel\carousel_1.jpg" alt="Background Image 2">
        <img src="images\carousel\carousel_1.jpg" alt="Background Image 3">
        <!-- Add more images as needed -->
    </div>

    <div class="container">
        <div class="header">
            <img src="images\logo\logo.png" alt="Logo" class="logo">
            <h2>Aunthenticate Please</h2>
        </div>
        
        <div class="scroll-container">
        <form action="adminlogin.php" method="POST">
            <label for="fullName">Your Email:</label>
            <input type="email" placeholder="Your Email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" placeholder="Your Password"  id="password" name="pasword" required>

            <button type="submit"  name="login">
                <span class="icon">&#x1F464;</span> Login
            </button>
            <br>
             <div class="mb-2">
                    <a href="index.php" class="btn btn-block btn-facebook">
                      <i class="icon-social-home mr-2"></i>Back Home </a>
                  </div>

        </form>
        </div>

        
    </div>
    

    <script src="jvascript/scripts.js"></script>
</body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('connect.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if email and password are set in the form data
    if (isset($_POST['email']) && isset($_POST['pasword'])) {
        $email = $_POST['email'];
        $password = $_POST['pasword'];

        // Use a prepared statement to protect against SQL injection
        $sql = "SELECT * FROM administrator WHERE email = ?";
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
            if (password_verify($password, $row['pasword'])) {
                session_start();
                $_SESSION['aid'] = $row['aid'];
                $adminid = $_SESSION['aid'];
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Makueni Assembly Says",
                        text: "Welcome back!",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(() => {
                        window.location.href = "admindashboard.php";
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
