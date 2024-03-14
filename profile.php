
<?php
include('session.php');
include('connect.php');
?>

<?php include 'menu.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<style>
    .table-container {
        max-width: 100%;
        overflow-x: auto; /* Enable horizontal scrolling if needed */
    }

    * {
        box-sizing: border-box;
    }

    /* Create two equal columns that float next to each other */
    .column {
        float: left;
        width: 50%;
        padding: 10px;
        height: auto; /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }
</style>
<br><br>
<body>
    <h2 style="color:#008b8b; font-weight: 600;">Personal Profile</h2>
<div class="row">
    <div class="column" style="background-color:#aaa;">
        <hr>
        <label><b>FULL NAMES</b></label>
        <h2><?php echo $fullName; ?></h2>
        <hr>
        <label><b>EMAIL</b></label>
        <h2><?php echo $email; ?></h2>
        <hr>
        <label><b>PHONE NUMBER</b></label>
        <h2><?php echo $phone; ?></h2>
    </div>
    <div class="column" style="background-color:#bbb;">
        <hr>
        <label><b>COUNTY</b></label>
        <h2><?php echo $county; ?></h2>
        <hr>
        <label><b>SUB-COUNTY</b></label>
        <h2><?php echo $subCounty; ?></h2>
        <hr>
        <label><b>WARD</b></label>
        <h2><?php echo $ward; ?></h2>
    </div>
</div>
<br>
<h2 style="color:#008b8b; font-weight: 600;">Academic Profile </h2>

<div class="table-container">
    <?php
    $sql = "SELECT * FROM  filesave WHERE pid = $pid ";
    $query = $conn->prepare($sql);
    $query->execute();
    $fetch = $query->fetchAll();
    ?>

    <?php if (!empty($fetch)) : ?>
        <table class="w3-table-all">
            <thead>
            <tr class="w3-blue">
                <th>KCSE</th>
                <th>Application Letter </th>
                <th style="text-align: center;">CV</th>
                <th>Degree/Diloma/Certificate</th>
                <th>National Id</th>
                <th>Professional Attachments</th>
                <th>Action</th>
            </tr>
            </thead>
            <!-- first row -->
            <?php foreach ($fetch as $key => $value) : ?>
                <tr>
                    <td><a href="download.php?file=<?php echo urlencode($value['KCSE']); ?>" target="_blank">KCSE</a></td>
                    <td><a href="download.php?file=<?php echo urlencode($value['letter']); ?>" target="_blank">Application
                            Letter</a></td>
                    <td><a href="download.php?file=<?php echo urlencode($value['CV']); ?>" target="_blank">CV</a></td>
                    <td><a href="download.php?file=<?php echo urlencode($value['Certificate']); ?>" target="_blank">Certificate</a>
                    </td>
                    <td><a href="download.php?file=<?php echo urlencode($value['nid']); ?>" target="_blank">National ID</a></td>
                    <td><a href="download.php?file=<?php echo urlencode($value['Attachments']); ?>"
                           target="_blank">Professional Letter</a></td>
                    <td>
                        <form action="profile.php" method="post">
                            <input type="hidden" name="delete_docs" value="<?php echo $value['fid']; ?>">
                            <button type="submit" class="btn btn-danger">Delete Documents</button>
                        </form>
                    </td>
                </tr>
                <?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'delete_docs' parameter is set in the POST data
    if (isset($_POST['delete_docs'])) {
        // Retrieve the post ID from the POST data
        $postID = $_POST['delete_docs'];
        $userid = $_SESSION['pid']; 

        // Prepare and execute the DELETE query
        $stmt = $conn->prepare("DELETE FROM filesave WHERE fid = ? AND pid = ?");
        $stmt->bindParam(1, $postID);
        $stmt->bindParam(2, $userid);  // Assuming pid is the user ID
if ($stmt->execute()) {
    // Deletion successful
    echo "<script type='text/javascript'>
            Swal.fire({
                title: 'Success!',
                text: 'Documents Deleted.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(function() {
                window.location.href = 'applicants.php';
            });
          </script>";
} else {
    // Error in deletion
    echo "<script type='text/javascript'>
            Swal.fire({
                title: 'Error!',
                text: 'Error in Deletion.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
          </script>";
}

    }
}

?>

            <?php endforeach; ?>
        </table>
        <?php else : ?>
        <b>NO INTERNSHIP RECORD FOUND.</b>
    <?php endif; ?>
</div>

<label style="color:#008b8b; font-weight: 600;">Application Date</label>
<h4 style="color:darkcyan;"><?php echo $DateofAdmission; ?></h4>

</body>
</html>
<?php include 'footer.php'; ?>