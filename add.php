<?php
include 'connect.php';
// check if email exixts
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM register WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    
    if ($stmt->rowCount() > 0) {
        echo '<script>alert("Email Exists")
         window.location.href = "signup.php";
         </script>';
    }
}
if (isset($_POST['add']))
{
	
	$fullName = $_POST['fullName'];
	$phone = $_POST['phone'];
	$passwordd = md5($_POST['passwordd']);
	$confirmPassword = md5($_POST['confirmPassword']);
	$email = $_POST['email'];
	$county = $_POST['county'];
    $subCounty = $_POST['subCounty'];
	$ward = $_POST['ward'];
	
   if($passwordd === $confirmPassword)
   	{
	$add = $conn->prepare("INSERT INTO register (fullName, phone, passwordd, confirmPassword, email, county, subCounty, ward)
		VALUES (?,?,?,?,?,?,?,?) ");

	$res=$add->execute(array($fullName,$phone,$passwordd,$confirmPassword,$email,$county,$subCounty,$ward));
	
	// second querry to store id of the the applicant
	
	/*$a = $conn->lastInsertId();
	$add1 = $conn->prepare("INSERT INTO clearance (id) VALUES (?)");
	$add1->execute(array($a));*/
	
     echo '<script>alert("Account Created Successfully")</script>'; 
        
           

    }
            else{
            	 echo '<script>alert("Passwords Do Not Match")</script>'; 

           
            }
	
}

 
?>
