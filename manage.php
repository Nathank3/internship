<?php
include('session.php');
include('connect.php');
?>
<?php include 'menu.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}



/* Float cancel and signup buttons and add an equal width */
 .signupbtn {
  float: left;
  width: 100%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}display: table;

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
.pass_show{position: relative} 

.pass_show .ptxt { 

position: absolute; 
float: left;
top: 50%; 

right: 10px; 

z-index: 1; 

color: #f36c01; 

margin-top: -10px; 

cursor: pointer; 

transition: .3s ease all; 

} 

.pass_show .ptxt:hover{color: #333333;} 
</style>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <!-- Content for the first div goes here -->
        <div class="card-body">
       
  <div class="container">
    <h1>Update Your Profile</h1>
  <hr style="background: blue; height: 2px; border: none;">
    <form action="manage.php" method="POST">

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email"  value="<?php echo $email; ?>">

    <label for="psw"><b>Phone</b></label>
    <input type="text" placeholder="Enter New Phone Number" name="Phone"  value="<?php echo $phone; ?>">

    <label for="psw-repeat"><b>Full Names (As they Appear in your ID)</b></label>
    <input type="text" placeholder="Full Names As they Appear in your ID" name="fullName"  value="<?php echo $fullName; ?>" required>

    <div class="clearfix">
      <button type="submit" class="signupbtn">Update Now</button>
    </div>
    </form>
  </div>

 <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission

    // Retrieve form data
   
    $newEmail = $_POST['email'];
    $newPhone = $_POST['Phone'];
    $newNames = $_POST['fullName'];
    $userid= $_SESSION['pid'];

        $updateSql = "UPDATE register SET  email = ?, Phone = ?, fullName = ? WHERE pid =  $userid";
        $updateQuery = $conn->prepare($updateSql);
        $updateQuery->bindParam(1, $newEmail);
        $updateQuery->bindParam(2, $newPhone);
        $updateQuery->bindParam(3, $newNames);
        $updateQuery->execute();
        

        echo '<script>
            Swal.fire({
                icon: "success",
                title: "Makueni Assembly Says",
                text: "Updated Successfully!",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
            });
        </script>';
}
?>

        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <!-- Content for the second div goes here -->
        <div class="card-body">
         <form >
  <div class="container">
    <h1>Why Update Your Profile</h1>
  <hr style="background: blue; height: 2px; border: none;">

   <dl>
  <dt>Accuracy of Information:</dt>
  <dd>- Keeping profile information up-to-date ensures that the information displayed is accurate and reflects the current status of the user.</dd>
  <dt>Communication</dt>
  <dd>- Makueni County Assembly Will Communicate to you via the info provided</dd>
  <dt>Personalization:</dt>
  <dd>- Portals often use profile information to personalize user experiences. Whether it's customizing the interface, recommending content, or tailoring services, having accurate and current data is essential for providing a personalized user experience..</dd>
  <dt>Account Recovery:</dt>
  <dd>- In the event of account recovery or password reset, having the latest contact information and security details helps in verifying the identity of the user and ensures a smooth recovery process.</dd>
  <dt>Notifications and Alerts:</dt>
  <dd>-For platforms that send notifications, alerts, or updates based on user preferences, having the correct profile information ensures that users receive relevant and timely information.</dd>
  <dt>Security</dt>
  <dd>-Regularly updating passwords and other security-related information enhances the security of user accounts. In case of any security concerns, prompt updates help in mitigating risks.</dd>
 </dl> 
     <hr style="background: black; height: 2px; border: none;">
  </div>
</form>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Bootstrap JS and Popper.js (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php include 'footer.php'; ?>
