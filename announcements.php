<?php
include('session.php');
include('connect.php');
?>
<?php include 'menu.php'; ?>
<br><br><br>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


<style>
.divider {
  font-size: 30px;
  display: flex;
  align-items: center;
}

.divider::before, .divider::after {
  flex: 1;
  content: '';
  padding: 3px;
  background-color: darkcyan;
  margin: 5px;
}
  .table {
    counter-reset: tableCount;     
}
.counterCell:before {              
    content: counter(tableCount); 
    counter-increment: tableCount; 
}
}
</style>
 <?php include 'header.php'; ?>
<div style="text-align:center;">
	 
	<h3>Latest News from Makueni County Assembly to Internship Applicants</h3>
     <hr style="border: 4px solid red;  border-radius: 5px;">

	<table class="table table-hover">
  <thead>
    <tr>
     
      <th scope="col">Announcement</th>
      <th scope="col">Date Posted</th>
  
    </tr>
  </thead>
  <tbody>
    <tr>
    	           <?php
                   
                   $sql = "SELECT * FROM updates ORDER BY DATE DESC";

                    $query = $conn->prepare($sql);
                    $query->execute();
                    $fetch = $query->fetchAll();

                    foreach ($fetch as $key => $value) { ?>
    
       <td><?php echo $value ['posts']?></td>
      <td><?php echo $value ['Date']?></td>
    
    </tr>
      <?php } ?>
  </tbody>
</table>
</div>
<hr style="border: 4px solid green;  border-radius: 5px;">
<h2>From: <b>KELVIN MUTUKU</b>
<br>
CLERK-MAKUENI COUNTY ASSEMBLY</h2>
<div class="divider">CASB</div>
<div class="divider">Visit Makueni Public Service Board For More Jobs</div>
<?php include 'footer.php'; ?>