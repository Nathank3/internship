<?php 
include('connect.php');
session_start();

if (!isset($_SESSION['pid']) || ($_SESSION['pid'] == '')){ ?>
	<script>
		window.location = 'index.php';
	</script>
<?php
}


$userid = $_SESSION['pid'];
$sql = "SELECT * FROM register WHERE pid = $userid ";
$query = $conn->prepare($sql);
$query->execute();
$row = $query->fetch();


$fullName = $row['fullName'];
$email = $row['email'];
$phone = $row['phone'];
$county = $row['county']; 
$subCounty = $row['subCounty'];
$ward = $row['ward'];
$DateofAdmission = $row['DateofAdmission'];
$pid = $row['pid'];
?>