<?php
	include('connect.php');
	$d = $_POST['deadline'];
	$date_line = strtotime(date($d)); //1664361960
	$currentDate = strtotime(date('Y-m-d')); //1664316000\

    if($date_line < $currentDate) {

  echo "<script>alert('Deadline Cannot be past Dates')
  window.location.href = 'deadline.php';</script>";  
   }
   elseif($date_line > $currentDate)
    {
	$sql = "SELECT * FROM deadline ORDER BY id DESC LIMIT 1";
	$query = $conn->prepare($sql);
	$query->execute();
	$fetch = $query->fetch();
	$id = $fetch['id'];
	
		$sql2 = "INSERT INTO deadline(d_date,status) VALUES (?,?)";
		$query2 = $conn->prepare($sql2);
		$query2->execute(array($d,1));
	echo "<script>alert('deadline set Successfully')
	window.location.href = 'deadline.php';</script>";
}

?>