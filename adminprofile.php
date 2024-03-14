<?php
include('connect.php');
include('session-admin.php');
include('adminmenu.php');
?>

<br><br>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  
    <div class="col-sm-6" style="background-color:grey; border-radius:6px;">
      <h2 style="text-align: center;">Current Profile</h2>
      <hr>
      <br>

       <form class="w3-container">
     <?php
                    $sql = "SELECT  uname, email, DateofAdmission FROM administrator";
                    $query = $conn->prepare($sql);
                    $query->execute();
                    $fetch = $query->fetchAll();

                    foreach ($fetch as $key => $value) { ?>
  <label>UserName</label>
 <input class="w3-input" type="text" readonly value="<?php echo $value['uname']; ?>">

  <p>
  <label>Email</label>
  <input class="w3-input" type="text" readonly value="<?php echo $value['email']; ?>"></p>
  <p>
  <label>Date Of AC Creation</label>
  <input class="w3-input" type="text" readonly value="<?php echo $value['DateofAdmission']; ?>"></p>
 </form>
   <?php } ?>

<br><br><br><br><hr>
    </div>
      <!--    updating section      -->      
    <div class="col-sm-6" style="background-color:pink;border-radius:6px;">
     <form class="w3-container" action="adminprofile.php" method="post">

     <h2 style="text-align: center;">Update your Profile Now</h2>
      <br>
  <label>New UserName</label>
  <input class="w3-input" type="text" name="uname" required></p>
  <p>
  <label>New Email</label>
  <input class="w3-input" type="text" name="email" required></p>
  <label>New Password</label>
  <input class="w3-input" type="password" pasword name="pasword" required></p>
  <p>
  <label>Confirm Password</label>
  <input class="w3-input" type="password" name="confirmPassword" required></p>
  <button class="btn btn-success" name="submit"  type="submit">Update</button>
</form>
<hr>
    </div>
  </div>
</div>
 <?php

// Check if the form is submitted via POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if submit button is clicked
    if (isset($_POST['submit'])) {
        // Retrieve form data
        $email = $_POST['email'];
        $uname = $_POST['uname'];
        $password = $_POST['pasword'];
        $confirmPassword = $_POST['confirmPassword'];
        $adminid = $_SESSION['aid']; // Ensure this session variable is set properly

        // Check if passwords match
        if ($password !== $confirmPassword) {
            echo "<script>alert('Passwords don't match');</script>";
            exit;
        }

        // Hash the password using password_hash (PASSWORD_BCRYPT)
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Prepare SQL statement to update password
        $sql = "UPDATE administrator SET email = :email, uname = :uname, pasword = :password,
                confirmPassword = :confirmPassword WHERE aid = :admin_id";
        $query = $conn->prepare($sql);
        
        // Bind parameters
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':uname', $uname, PDO::PARAM_STR);
        $query->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $query->bindParam(':confirmPassword', $hashedPassword, PDO::PARAM_STR); // Bind confirmPassword separately
        $query->bindParam(':admin_id', $adminid, PDO::PARAM_INT);
        
        // Execute the query
        if ($query->execute()) {
            echo "<script>alert('Profile updated successfully');</script>";
            header('Location: admindashboard.php'); // Redirect to dashboard
            exit;
        } else {
            echo "<script>alert('Failed to update password');</script>";
        }
    }
}
?>


</body>
</html>
<?php include('footer.php');?>