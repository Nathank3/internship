<?php

	include 'connect.php';

	$sql = "SELECT * FROM deadline ORDER BY id DESC LIMIT 1";
	$query = $conn->prepare($sql);
	$query->execute();
	$fetch = $query->fetch();

	$id = $fetch['id'];

	$sql1 = "UPDATE deadline SET status = ? WHERE id = ?";
	$query1 = $conn->prepare($sql1);
	$query1->execute(array(0, $id));

echo "<script>alert('Deadline Has Been Reset Successfully')
window.location.href = 'deadline.php';
</script>";
	 
?>