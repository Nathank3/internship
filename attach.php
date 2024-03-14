<?php
include('session-admin.php');
include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td,th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  text-align: center;
}
</style>
</head>
<?php
include('adminmenu.php');
?>
<body>


<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
<table  id="myTable">
  <tr>
  
    <th>Full Names</th>
    <th>Email</th>
    <th>Phone</th>
    <th>County</th>
    <th>SubCounty</th>
    <th>Ward</th>
    <th>Date Of Application</th>
    <!-- Documents -->
       <th >KCSE</th>
        <th>Application Letter </th>
        <th style="text-align: center;">CV</th>
        <th>Degree/Diloma</th>
        <th>National Id</th>
        <th>Professional Attachments</th>
        <th colspan="2" style="text-align:center;">Action</th>
        
  </tr>

  <!-- fetching applicants data and display in table -->
  <?php
                    $sql = "SELECT * FROM register JOIN volunteerism ON 
                    register.pid= volunteerism.pid AND status=0";
                    $query = $conn->prepare($sql);
                    $query->execute();
                    $fetch = $query->fetchAll();

                    foreach ($fetch as $key => $value) { ?>
  <tr>
    
    <td><?php echo $value['fullName'] ?></td>
    <td><?php echo $value['email'] ?></td>
     <td><?php echo $value['phone'] ?></td>
    <td><?php echo $value['county'] ?></td>
    <td><?php echo $value['subCounty'] ?></td>
    <td><?php echo $value['ward'] ?></td>
    <td><?php echo $value['DateofAdmission'] ?></td>
    <!-- documents -->
    <td><a href="download.php?file=<?php echo urlencode($value['KCSE']); ?>" target="_blank">KCSE</a></td>

       <td><a href="download.php?file=<?php echo urlencode($value['application_letter']); ?>" target="_blank">Application Letter</a></td>

       <td><a href="download.php?file=<?php echo urlencode($value['CV']); ?>" target="_blank">CV</a></td>

        <td><a href="download.php?file=<?php echo urlencode($value['Transcripts_or_certificate']); ?>" target="_blank">Certificate</a></td>

       <td><a href="download.php?file=<?php echo urlencode($value['ID']); ?>" target="_blank">National ID</a></td>
      
       <td><a href="download.php?file=<?php echo urlencode($value['Insurance_letter']); ?>" target="_blank">Professional Letter</a></td>

    <td> <button type="button" class="btn btn-success"  onclick="confirmAccept('<?php echo $value['pid']; ?>')">Approve</button>
       <form id="AcceptForm_<?php echo $value['pid']; ?>" method="post" action="">
        <input type="hidden" name="accept" value="1">
        <input type="hidden" name="pid" value="<?php echo $value['pid']; ?>">
    </form>

    </td>
    <!-- <td> <button type="button" name="reject" class="btn btn-danger">REJECT</button></td> -->
    <td>
    <button type="button" class="btn btn-danger" onclick="confirmReject('<?php echo $value['pid']; ?>')">REJECT</button>
    <!-- Add a hidden form for each reject button -->
    <form id="rejectForm_<?php echo $value['pid']; ?>" method="post" action="">
        <input type="hidden" name="reject" value="1">
        <input type="hidden" name="pid" value="<?php echo $value['pid']; ?>">
    </form>
</td>

  </tr>
   
  <?php } ?>
</table>
<!-- inviting for interview -->
  <?php
    if (isset($_POST['accept'])) {
    $pid = $_POST['pid'];

  
    $query = $conn->prepare("UPDATE volunteerism SET status = 1 WHERE pid = ?");
    $query->execute(array($pid));
    
    
   }
   ?>

     <script>
        function confirmAccept(pid) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action will Accept Application!',
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Accept it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user clicks 'Yes', submit the form with the reject action
                    document.getElementById('AcceptForm_' + pid).submit();
                }
            });
        }
    </script>

<!-- dis-approving applicants -->
    
   <?php
    if (isset($_POST['reject'])) {
    $pid = $_POST['pid'];

    // Your reject logic goes here
    $query = $conn->prepare("UPDATE volunteerism SET status = 2 WHERE pid = ?");
    $query->execute(array($pid));

    // Redirect or display a success message as needed
    
    
   }
   ?>

     <script>
        function confirmReject(pid) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action will reject the applicant!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reject it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user clicks 'Yes', submit the form with the reject action
                    document.getElementById('rejectForm_' + pid).submit();
                }
            });
        }
    </script>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>
</html>

<?php include('footer.php');?>

