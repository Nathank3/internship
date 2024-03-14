 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        .float-container {
            border: 3px solid #fff;
            padding: 20px;
            text-align: center;
            margin: 0 auto; /* Center-align the container */
        }

        .float-child {
            width: auto;
            float: left;
            padding: 20px;
            text-align: center;
            font-weight: 600;
            border: 2px solid darkcyan;
        }
    </style>
</head>
<body>
    <?php
    include('session-admin.php');
    include('connect.php');
    ?>
    <?php
    include('adminmenu.php');
    ?>
    <br>

    <h2 style="text-align:center;color: darkcyan;font-weight: 600;">Internship Applications</h2>

    <table class="w3-table-all">
        <thead>
            <tr class="w3-green">
                <th>DATE</th>
                <th>TIME</th>
                <th>NO.OF APPLICANTS</th>
                <th>APPROVED</th>
                <th>PENDING</th>
                <th>REJECTED</th>
            </tr>
        </thead>
        <tr>
            <td>
                <?php print strftime('%F'); ?>
            </td>
            <td>
                <div id="timeInternship"></div>
            </td>

            <td>
        <?php
        $sql = "SELECT register.*, filesave.*, COUNT(*) AS total FROM register

         JOIN filesave ON register.pid = filesave.pid;";

    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        // Output data of each row
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $totalCount = $row["total"];
        echo "Total Applicants: " . $totalCount;

    } 
    ?>

      </td>
      
      <td>
        <!-- show shortlisted applicants -->
        <?php
    $sql = "SELECT COUNT(DISTINCT pid) AS total FROM filesave WHERE status = '1'";

    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        // Output data of each row
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $totalCount = $row["total"];
        echo "Shortlisted Applicants: " . $totalCount;

    } 
    ?>
    <br>
    <!-- MODAL -->
    <button class="btn btn-primary" id="SizeChart">View  list</button>
    <!-- new -->
      <style >
        /* The Modal (background) */
.ebcf_modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.ebcf_modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.ebcf_close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.ebcf_close:hover,
.ebcf_close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
    </style>
     <div id="SizeChartModal" class="ebcf_modal">

  <div class="ebcf_modal-content">
    <span class="close">&times;</span>
    <?php include 'header.php'; ?>
   <h2 style="text-align:center;font-weight: 600;">List Of Successfull Interns</h2>
   <table id="datatable-buttons" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                           
                            <th>Full Names</th>
                            <th>Contact No.</th>
                            <th>Email</th>
                            <th>County</th>
                            <th>Sub County</th>
                            <th>Ward</th>
                             <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM register NATURAL JOIN filesave  WHERE  status=1";
                        $query = $conn->prepare($sql);
                        $query->execute();
                        $fetch = $query->fetchAll();

                        foreach ($fetch as $key => $value) { ?>
                            <tr>
                             
                                <td><?php echo $value['fullName'] ?></td>
                                <td><?php echo $value['phone'] ?></td>
                                <td><?php echo $value['email'] ?></td>
                                <td><?php echo $value['county'] ?></td>
                                <td><?php echo $value['subCounty'] ?></td>
                                <td><?php echo $value['ward']; ?></td>
                                 <td><?php echo $value['Gender']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <button class="btn btn-primary" onclick="printContent('datatable-buttons')">Print</button>
              <button class="btn btn-warning"><a href="admindashboard.php">Close</a></button>

  </div>

</div>
    
<script >
    // Get the modal
var ebMdal = document.getElementById('SizeChartModal');

// Get the button that opens the modal
var ebBt = document.getElementById("SizeChart");

// Get the <span> element that closes the modal
var ebSpa = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
ebBt.onclick = function() {
    ebMdal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
ebSpa.onclick = function() {
    ebMdal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == ebMdal) {
        ebMdal.style.display = "none";
    }
}
</script>

                                                       
      </td>
        
      <td>
        <!-- show pending approval -->
        <?php
    $sql = "SELECT COUNT(DISTINCT pid) AS total FROM filesave WHERE status = '0'";

    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        // Output data of each row
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $totalCount = $row["total"];
        echo "Pending Approval: " . $totalCount;

    } 
    ?>
    <br>
    <button class="btn btn-primary">View  list</button>
      </td>
      <td>
        <!-- show rejected applications -->
        <?php
    $sql = "SELECT COUNT(DISTINCT pid) AS total FROM filesave WHERE status = '2'";

    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        // Output data of each row
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $totalCount = $row["total"];
        echo "Unsuccessful: " . $totalCount;

    } 
    ?>
    <br>
    <button class="btn btn-primary" id="Chart">View  list</button>
    <style >
        /* The Modal (background) */
.ebcf_modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.ebcf_modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.ebcf_close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.ebcf_close:hover,
.ebcf_close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
    </style>
     <div id="mySizeChart" class="ebcf_modal">

  <div class="ebcf_modal-content">
    <span class="ebcf_close">&times;</span>
    <?php include 'header.php'; ?>
   <h2 style="text-align:center;font-weight: 600;">List Of Unssuccessfull Interns</h2>
   <table id="datatable-buttons" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                           
                            <th>Full Names</th>
                            <th>Contact No.</th>
                            <th>Email</th>
                            <th>County</th>
                            <th>Sub County</th>
                            <th>Ward</th>
                             <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM register NATURAL JOIN filesave WHERE  status=2";
                        $query = $conn->prepare($sql);
                        $query->execute();
                        $fetch = $query->fetchAll();

                        foreach ($fetch as $key => $value) { ?>
                            <tr>
                             
                                <td><?php echo $value['fullName'] ?></td>
                                <td><?php echo $value['phone'] ?></td>
                                <td><?php echo $value['email'] ?></td>
                                <td><?php echo $value['county'] ?></td>
                                <td><?php echo $value['subCounty'] ?></td>
                                <td><?php echo $value['ward']; ?></td>
                                 <td><?php echo $value['Gender']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <button class="btn btn-primary" onclick="printContent('datatable-buttons')">Print</button>
                <button class="btn btn-warning"><a href="admindashboard.php">Close</a></button>
  </div>

</div>
    
<script >
    // Get the modal
var el = document.getElementById('mySizeChart');

// Get the button that opens the modal
var b = document.getElementById("Chart");

// Get the <span> element that closes the modal
var s = document.getElementsByClassName("ebcf_close")[0];

// When the user clicks the button, open the modal 
b.onclick = function() {
    el.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
s.onclick = function() {
    el.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == el) {
        el.style.display = "none";
    }
}
</script>
      </td>

      

        </tr>
    </table>
<!-- end of first table -->
<br><br>
  <h2 style="text-align:center;color: darkcyan;font-weight: 700;">Attachment/Volunteer Applications</h2>
<table class="w3-table-all">
    <thead>
      <tr class="w3-indigo">
        <th>DATE</th>
        <th>TIME</th>
        <th>NO.OF APPLICANTS</th>
        <th>APPROVED</th>
        <th>PENDING</th>
        <th>REJECTED</th>
        
      </tr>
    </thead>
    <tr>
      <td>
        <?php print strftime('%F'); ?>
        </td>
      <td>
       <div id="time" ></div>
      </td>

      <td>
        <?php
        $sql = "SELECT register.*, volunteerism.*, COUNT(*) AS total FROM register

         JOIN volunteerism ON register.pid = volunteerism.pid;";

    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        // Output data of each row
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $totalCount = $row["total"];
        echo "Total Applicants: " . $totalCount;

    } 
    ?>

      </td>
      
      <td>
        <!-- show shortlisted applicants -->
        <?php
    $sql = "SELECT COUNT(DISTINCT pid) AS total FROM volunteerism WHERE status = '1'";

    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        // Output data of each row
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $totalCount = $row["total"];
        echo "Shortlisted Applicants: " . $totalCount;

    } 
    ?>
    <br>
    <!-- attachees -->
    
    <button class="btn btn-primary" id="mySizeChartt">View  list</button>
   <style >
        /* The Modal (background) */
.ebcf_modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.ebcf_modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.ebcf_close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.ebcf_close:hover,
.ebcf_close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
    </style>
     <div id="mySizeChartModall" class="ebcf_modal">

  <div class="ebcf_modal-content">
    <span class="ebf_close">&times;</span>
    <?php include 'header.php'; ?>
   <h2 style="text-align:center;font-weight: 600;">List Of Successfull Attaches/ Volunteers</h2>
   <table id="datatable-buttons" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                           
                            <th>Full Names</th>
                            <th>Contact No.</th>
                            <th>Email</th>
                            <th>County</th>
                            <th>Sub County</th>
                            <th>Ward</th>
                             <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM register NATURAL JOIN volunteerism WHERE  status=1";
                        $query = $conn->prepare($sql);
                        $query->execute();
                        $fetch = $query->fetchAll();

                        foreach ($fetch as $key => $value) { ?>
                            <tr>
                             
                                <td><?php echo $value['fullName'] ?></td>
                                <td><?php echo $value['phone'] ?></td>
                                <td><?php echo $value['email'] ?></td>
                                <td><?php echo $value['county'] ?></td>
                                <td><?php echo $value['subCounty'] ?></td>
                                <td><?php echo $value['ward']; ?></td>
                                 <td><?php echo $value['Gender']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <button class="btn btn-primary" onclick="printContent('datatable-buttons')">Print</button>
                <button class="btn btn-warning"><a href="admindashboard.php">Close</a></button>
  </div>

</div>
    
<script >
    // Get the modal
var eb = document.getElementById('mySizeChartModall');

// Get the button that opens the modal
var etn = document.getElementById("mySizeChartt");

// Get the <span> element that closes the modal
var en = document.getElementsByClassName("ebf_close")[0];

// When the user clicks the button, open the modal 
etn.onclick = function() {
    eb.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
en.onclick = function() {
    eb.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == eb) {
        eb.style.display = "none";
    }
}
</script>
      </td>
        
      <td>
        <!-- show pending approval -->
        <?php
    $sql = "SELECT COUNT(DISTINCT pid) AS total FROM volunteerism WHERE status = '0'";

    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        // Output data of each row
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $totalCount = $row["total"];
        echo "Pending Approval: " . $totalCount;

    } 
    ?>
    <br>
    <button class="btn btn-primary">View  list</button>
      </td>

      <td>
        <!-- show rejected applications -->
        <?php
    $sql = "SELECT COUNT(DISTINCT pid) AS total FROM volunteerism WHERE status = '2'";

    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        // Output data of each row
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $totalCount = $row["total"];
        echo "Unsuccessful: " . $totalCount;

    } 
    ?>
    <br>
    <button class="btn btn-primary" id="myySizeChart">View  list</button>
    <style >
        /* The Modal (background) */
.ebcf_modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.ebcf_modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.ebcf_close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.ebcf_close:hover,
.ebcf_close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
    </style>
     <div id="myySizeChartModal" class="ebcf_modal">

  <div class="ebcf_modal-content">
    <span class="ebcf_close">&times;</span>
    <?php include 'header.php'; ?>
   <h2 style="text-align:center;font-weight: 600;">List Of Unssuccessfull Attaches/ Volunteers</h2>
   <table id="datatable-buttons" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                           
                            <th>Full Names</th>
                            <th>Contact No.</th>
                            <th>Email</th>
                            <th>County</th>
                            <th>Sub County</th>
                            <th>Ward</th>
                             <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM register NATURAL JOIN volunteerism WHERE  status=2";
                        $query = $conn->prepare($sql);
                        $query->execute();
                        $fetch = $query->fetchAll();

                        foreach ($fetch as $key => $value) { ?>
                            <tr>
                             
                                <td><?php echo $value['fullName'] ?></td>
                                <td><?php echo $value['phone'] ?></td>
                                <td><?php echo $value['email'] ?></td>
                                <td><?php echo $value['county'] ?></td>
                                <td><?php echo $value['subCounty'] ?></td>
                                <td><?php echo $value['ward']; ?></td>
                                 <td><?php echo $value['Gender']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <button class="btn btn-primary" onclick="printContent('datatable-buttons')">Print</button>
                <button class="btn btn-warning"><a href="admindashboard.php">Close</a></button>
  </div>

</div>
    
<script >
    // Get the modal
var ebModal = document.getElementById('myySizeChartModal');

// Get the button that opens the modal
var ebBtn = document.getElementById("myySizeChart");

// Get the <span> element that closes the modal
var ebSpan = document.getElementsByClassName("ebcf_close")[0];

// When the user clicks the button, open the modal 
ebBtn.onclick = function() {
    ebModal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
ebSpan.onclick = function() {
    ebModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == ebModal) {
        ebModal.style.display = "none";
    }
}
</script>

      </td>
        
        

      
    </tr>
   
  </table>
    <!-- ... (rest of your code) ... -->

    <script>
        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTimeInternship() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            // add a zero in front of numbers < 10
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('timeInternship').innerHTML = h + ":" + m + ":" + s;
            t = setTimeout(function () {
                startTimeInternship()
            }, 500);
        }

        startTimeInternship();
    </script>

<!-- Add this script to close the modal when clicking outside -->
<script>
    // shortlisted attaches
    $(document).mouseup(function (e) {
        var modal = $(".modal-content");

        // If the target of the click isn't the modal
        if (!modal.is(e.target) && modal.has(e.target).length === 0) {
            // Close the modal
            $(".modal").modal('hide');
        }
    });
</script>

<!-- printing contents -->
<script>
    function printContent(elementId) {
        var printContents = document.getElementById(elementId).outerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

    <?php include('footer.php');?>
</body>
</html>