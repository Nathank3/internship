<?php
include('session-admin.php');
include('connect.php');
include('adminmenu.php');
?>

<br><br>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
 margin-left: 30%;
  width: 50%;
  text-align: center;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}
input {
  border: 1px solid #c4c4c4;
  border-radius: 5px;
  background-color: #fff;
  padding: 3px 5px;
  box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
  width: 190px;
}
.button {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 7px 22px;
  text-align: center;
  text-decoration: none;
  border-radius: 3PX;
  display: inline-block;
  font-weight: 600;
  font-size: 10px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>
<body>


<div class="row">
  <div class="column" style="background-color:#aaa; border-radius: 5px; height: auto;">
    
    <?php include('calendar.php');?>

  </div>

  <br><br>

  <form method="post" action="set_deadline.php">
  <div class="column" style="background-color:pink; border-radius: 5px; height:auto;">
    <h2>Set Deadline of All Applications</h2>

    <!-- php to reset deadline -->
    <?php 
          $sql1 = "SELECT * FROM deadline ORDER BY id DESC LIMIT 1";
          $query1 = $conn->prepare($sql1);
          $query1->execute();
          $fetch = $query1->fetch();

          if  ($fetch['status'] == 0){
        ?>
<input type="date" name="deadline" id="d_date">
<?php 
            }else{
              ?>
              <a href="reset_dl.php" class="reset_dl">Click here to reset deadline</a>
              <?php }
              ?>
<button type="submit" class="button">SET</button>
  </div>
  </form>
</div>
<br><br>
<div class="column" style="background-color:white; border-radius: 5px; height: auto;">
    
    <?php include('footer.php');?>

  </div>
</body>
</html>
