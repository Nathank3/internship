<?php
include('session.php');
include('connect.php');
?>


<?php include 'menu.php'; ?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<!-- INTERNSHIP APPLICATION TABLE -->
<h3 style="color:dodgerblue;font-weight: 600;">INTERNSHIP</h3>
<table class="w3-table-all">
    <thead>
        <tr class="w3-green">
            <th>Course Completed</th>
            <th>Academic Level</th>
            <th>Year Completed</th>
            <th>Department Applied</th>
            <th style="font-weight: 600; text-align: center;">Status of My Application</th>
        </tr>
    </thead>

    <?php
    $sql = "SELECT * FROM  filesave NATURAL JOIN register WHERE  pid = $pid ";
    $query = $conn->prepare($sql);
    $query->execute();
    $fetch = $query->fetchAll();

    if ($query->rowCount() > 0) {
        // Records found, loop through and display them
        foreach ($fetch as $key => $value) { ?>
            <tr>
                <td><?php echo $value['Coursename'] ?></td>
                <td><?php echo $value['academics'] ?></td>
                <td><?php echo $value['Yearr'] ?></td>
                <td><?php echo $value['Department'] ?></td>
                <td style="font-weight: 600; text-align: center;">
                    <input type="hidden" value="<?php echo $value['status'] ?>">

                    <?php
                    if ($value['status'] == 0) {
                        print("PROCESSING HAS STARTED");
                    } elseif ($value['status'] == 1) {
                        print("SUCCESSFULL");
                    } elseif ($value['status'] == 2) {
                        print(" NOT SUCCESSFULL");
                    }
                    ?>

                </td>
            </tr>
        <?php }
    } else {
        // No records found
        ?>
        <tr>
            <td colspan="5" style="text-align: center; font-weight: 600;">No INTERNSHIP records found</td>
        </tr>
    <?php } ?>
</table>

  <br>
<!-- ATTACHMENT APPLICATION TABLE -->
<h3 style="color:darkcyan;font-weight: 600;">ATTACHMENT/VOLUNTEERISM</h3>
<table class="w3-table-all">
    <thead>
        <tr class="w3-orange">
            <th>Course Completed</th>
            <th>Institution Name</th>
            <th>Application Type</th>
            <th>Department Applied</th>
            <th style="font-weight: 600; text-align: center;">Status of My Application</th>
        </tr>
    </thead>

    <?php
    $sql = "SELECT * FROM  register NATURAL JOIN volunteerism WHERE  pid = $pid ";
    $query = $conn->prepare($sql);
    $query->execute();
    $fetch = $query->fetchAll();

    if ($query->rowCount() > 0) {
        // Records found, loop through and display them
        foreach ($fetch as $key => $value) { ?>
            <tr>
                <td><?php echo $value['Coursename'] ?></td>
                <td><?php echo $value['iname'] ?></td>
                <td><?php echo $value['Application_Type'] ?></td>
                <td><?php echo $value['Department'] ?></td>
                <td style="font-weight: 600; text-align: center;">
                    <input type="hidden" value="<?php echo $value['status'] ?>">

                    <?php
                    if ($value['status'] == 0) {
                        print("PROCESSING HAS STARTED");
                    } elseif ($value['status'] == 1) {
                        print("SUCCESSFULL");
                    } elseif ($value['status'] == 2) {
                        print(" NOT SUCCESSFULL");
                    }
                    ?>

                </td>
            </tr>
        <?php }
    } else {
        // No records found
        ?>
        <tr>
            <td colspan="5" style="text-align: center; font-weight: 600;">No records found</td>
        </tr>
    <?php } ?>
</table>

  <br>
  <fieldset>
    <legend>Notice</legend>
    <?php
                                        $sql = "SELECT * FROM deadline WHERE status ='1'";
                                        $query = $conn->prepare($sql);
                                        $query->execute();
                                        $fetch = $query->fetchAll();

                                        foreach ($fetch as $key => $value) { ?>
     <h3 style="color:darkcyan;">Deadline Of All Applications is on:<br>
  <b><?php echo $value['d_date'];?></b>
     </h3>
        <?php } ?>
  </fieldset>

   <br>
  <fieldset>
    <legend>Application Guidelines</legend>
    <?php
$sql1 = "SELECT d_date FROM deadline WHERE status = 1";
$query1 = $conn->prepare($sql1);
$query1->execute();
$fetch = $query1->fetch();

$today = date('Y-m-d H:i:s');
$d_date = $fetch['d_date'];

$dl_exp = date('Y-m-d H:i:s', strtotime('+1 minute'));

    if ($today >= $d_date) { ?>
     <h3 style="color:darkred; font-weight: 600;">No Advertised Internship Opportunities</h3>
       <h3 style="color:darkcyan; font-weight: 600;">Thank You For Staying In Touch</h3>
     <br>
        <?php } 
        else{
          ?>
     <h3 style="color:darkred; font-weight: 600;">You are Reminded to apply For only one INTERNSHIP position</h3>
       <h3 style="color:darkcyan; font-weight: 600;">Thank You For Staying In Touch</h3>
     <br>
        <?php
        }
        ?>

  </fieldset>

  <?php include 'footer.php'; ?>