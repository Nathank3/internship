<?php
session_start();
include('connect.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['passwordd'];
    $confirmPassword = $_POST['confirmPassword'];

    $sql = "SELECT email FROM register WHERE email=:email AND phone=:phone";
    $query = $conn->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        // Hash the password using password_hash (PASSWORD_BCRYPT)
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $con = "UPDATE register SET passwordd=:passwordd,confirmPassword=:confirmPassword WHERE email=:email AND phone=:phone";
        $chngpwd1 = $conn->prepare($con);
        $chngpwd1->bindParam(':email', $email, PDO::PARAM_STR);
        $chngpwd1->bindParam(':phone', $phone, PDO::PARAM_STR);
        $chngpwd1->bindParam(':passwordd', $hashedPassword, PDO::PARAM_STR);
        $chngpwd1->bindParam(':confirmPassword', $hashedPassword, PDO::PARAM_STR);
        $chngpwd1->execute();

        echo "<script>alert('Your Password successfully changed');
            window.location.href = 'signin.php';
        </script>";
    } else {
        echo "<script>alert('Email id or phone no is invalid');</script>";
    }
}
?>


<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Add icon library-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        * {
            box-sizing: border-box;
        }
        .input-container {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            width: 100%;
            margin-bottom: 15px;
        }
        .icon {
            padding: 10px;
            background: green;
            color: white;
            min-width: 50px;
            text-align: center;
        }
        .input-field {
            width: 100%;
            padding: 10px;
            outline: none;
        }
        .input-field:focus {
            border: 2px solid dodgerblue;
        }
        /* Set a style for the submit button */
        .btn {
            /* background-color: dodgerblue; */
            background-color: dodgerblue;
            color: white;
            padding: 15px 20px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            width: 100%;
            opacity: 0.9;
        }
        .btn:hover {
            opacity: 1;
        }
        .fa-passwd-reset>.fa-lock {
            font-size: 0.85rem;
        }
    </style>
    <script>
        let check = function() {
            if (document.getElementById('password-1').value == document.getElementById('password-2').value) {
                document.getElementById("formSubmit").disabled = false;
                document.getElementById("formSubmit").style.background = 'blue';
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Password Matched';
            } else {
                document.getElementById("formSubmit").disabled = true;
                document.getElementById("formSubmit").style.background = 'grey';
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Password not matching';
            }
        }
        let validate = function() {
            console.log(document.getElementById('password-1').value)
            console.log(document.getElementById('password-2').value)
            if (document.getElementById('password-1').value.length < 5) {
                document.getElementById('pwd-length-1').innerHTML = 'Minimum 6 characters';
            } else {
                document.getElementById('pwd-length-1').innerHTML = '';
                check();
            }
            if (document.getElementById('password-2').value.length < 5) {
                document.getElementById('pwd-length-2').innerHTML = 'Minimum 6 characters';
            } else {
                document.getElementById('pwd-length-2').innerHTML = '';
                check();
            }
        }
    </script>

</head>
<body>
   <form action="reset_psw.php" method="POST" style="max-width:500px; margin:auto; border: 2px solid dodgerblue; border-radius: 4px; ">
    <center>
        <img style="width:auto; height:130px;" src="images/logo/logo.png">
    </center>
    <!-- Title  -->
    <center>
        <h2><span class="fa-passwd-reset fa-stack"><i class="fa fa-key"></i><i class="fa fa-lock fa-stack-1x"></i></span>Reset your Password<span class="fa-passwd-reset fa-stack"><i class="fa fa-key"></i><i class="fa fa-lock fa-stack-1x"></i></span></h2>
    </center>
    <!-- First Input Text  -->
    <div class="input-container"><i class="fa fa-envelope icon"></i>
        <input class="input-field" type="text" placeholder="Type your Registered Email"  name="email" required>
    </div>
    <!-- Length  -->
    <span id="pwd-length-1"></span>
    <!-- Second Input Text  -->
    <div class="input-container"><i class="fa fa-phone icon"></i>
        <input class="input-field" type="text" name="phone" placeholder="Type your Registered Phone Number" required>
    </div>
    <!-- Third Input Text  -->
    <div class="input-container"><i class="fa fa-key icon"></i>
        <input class="input-field" id="password-1" type="password" placeholder="Type your new password"
         name="passwordd" oninput='validate();' required>
    </div>
    <!-- Length  -->
    <span id="pwd-length-1"></span>
    <!-- Fourth Input Text  -->
    <div class="input-container"><i class="fa fa-key icon"></i>
        <input class="input-field" id="password-2" type="password" placeholder="Re-type your new password" 
        name="confirmPassword" oninput='validate();' required>
    </div>
    <!-- Length  -->
    <span id="pwd-length-2"></span>
    <!-- Validation Message - 1  -->
    <span id="message"></span>
    <button class="btn" id="formSubmit" name="submit"  type="submit" >Continue</button>
    <br><br>
    <a style="font-weight:600;text-align:center;" href="signin.php">Back To Login</a> 
 
</form>

</body>
</html>