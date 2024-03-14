<?php 
include('connect.php');
session_start();

if (!isset($_SESSION['aid']) || ($_SESSION['aid'] == '')){ ?>
	<script>
		window.location = 'index.php';
	</script>
<?php
}


$adminid = $_SESSION['aid'];

$sql = "SELECT * FROM administrator WHERE uname = $adminid ";
$query = $conn->prepare($sql);
$query->execute();
$row = $query->fetch();
$aid = $row['aid'];
$uname = $row['uname'];
$email = $row['email'];
$DateofAdmission = $row['DateofAdmission'];
?>