<?php
include('session.php');
include('connect.php');
?>
<?php include 'menu.php'; ?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   // check if user has applied for any position
 $userid = $_SESSION['pid'];

// Query to check the status in filesave table
$sql1 = "SELECT * FROM filesave WHERE pid = ?";
$query1 = $conn->prepare($sql1);
$query1->execute(array($userid));
$result1 = $query1->fetch(PDO::FETCH_ASSOC);

if ($result1) {
    echo "<script type='text/javascript'>alert('You Can Apply for one POST');
          window.location.href = 'dashboard.php';
          </script>";
    exit; // Stop execution if the user has applied
}

 

    
    // Your other form data
    $iname = $_POST['iname'];
    $Coursename = $_POST['Coursename'];
    $Yearr = $_POST['Yearr'];
    $academics = $_POST['academics'];
    $Department = $_POST['Department'];
    $userid = $_SESSION['pid']; 


    // File Uploads
    $KCSE = "uploads/" . $_FILES["KCSE"]["name"];
    $KCSETmpName = $_FILES["KCSE"]["tmp_name"];
    move_uploaded_file($_FILES["KCSE"]["tmp_name"], $KCSE);

    $letter = "uploads/" . $_FILES["letter"]["name"];
    $letterTmpName = $_FILES["letter"]["tmp_name"];
    move_uploaded_file($_FILES["letter"]["tmp_name"], $letter);
   
    $CV = "uploads/" . $_FILES["CV"]["name"];
    $cvTmpName = $_FILES["CV"]["tmp_name"];
    move_uploaded_file($_FILES["CV"]["tmp_name"], $CV);

    $Certificate = "uploads/" . $_FILES["Certificate"]["name"];
    $CertificateTmpName = $_FILES["Certificate"]["tmp_name"];
   move_uploaded_file($_FILES["Certificate"]["tmp_name"], $Certificate);

    $nid = "uploads/" . $_FILES["nid"]["name"];
    $nidTmpName = $_FILES["nid"]["tmp_name"];
     move_uploaded_file($_FILES["nid"]["tmp_name"], $nid);

    $Attachments = "uploads/" . $_FILES["Attachments"]["name"];
    $AttachmentsTmpName = $_FILES["Attachments"]["tmp_name"];
     move_uploaded_file($_FILES["Attachments"]["tmp_name"], $Attachments);

    // Database Insert
    $stmt = $conn->prepare("INSERT INTO filesave (iname, Coursename, Yearr, academics, Department, KCSE, letter, CV, Attachments, Certificate, nid,pid)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");

    $stmt->bindParam(1, $iname);
    $stmt->bindParam(2, $Coursename);
    $stmt->bindParam(3, $Yearr);
    $stmt->bindParam(4, $academics);
    $stmt->bindParam(5, $Department);
    $stmt->bindParam(6, $KCSE);
    $stmt->bindParam(7, $letter);
    $stmt->bindParam(8, $CV);
    $stmt->bindParam(9, $Attachments);
    $stmt->bindParam(10, $Certificate);
    $stmt->bindParam(11, $nid);
    $stmt->bindParam(12, $pid);

    if ($stmt->execute()) {
      echo '<script>
                Swal.fire({
                    title: "Success!",
                    text: "Data Received successfully.",
                    icon: "success",
                    confirmButtonText: "OK"
                }).then(function() {
                    window.location.href = "dashboard.php";
                });
              </script>';
     
      
    } else {
        echo '<script>
                Swal.fire({
                    title: "Error!",
                    text: "Error saving data.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
              </script>';
         }
}
?>


<style>
 
</style>
<script>

  
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="path/to/your/css/file.css">
</head>
 <style>
         @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    font-family: "Inter", sans-serif;
  }
  .formbold-main-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px;
  }

  .formbold-form-wrapper {
    margin: 0 auto;
    max-width: 550px;
    width: 50%;
 
  }

  .formbold-steps {
    padding-bottom: 18px;
    margin-bottom: 35px;
    border-bottom: 1px solid #DDE3EC;
  }
  .formbold-steps ul {
    padding: 0;
    margin: 0;
    list-style: none;
    display: flex;
    gap: 40px;
  }
  .formbold-steps li {
    display: flex;
    align-items: center;
    gap: 14px;
    font-weight: 500;
    font-size: 16px;
    line-height: 24px;
    color: #536738;
  }
  .formbold-steps li span {
    display: flex;
    align-items: center;
    justify-content: center;
 
    border-radius: 50%;
    width: 36px;
    height: 36px;
    font-weight: 500;
    font-size: 16px;
    line-height: 24px;
    color: #536387;
  }
  .formbold-steps li.active {
    color: #07074D;;
  }
  .formbold-steps li.active span {
   
    color: #FFFFFF;
  }

  .formbold-input-flex {
    display: flex;
    gap: 20px;
    margin-bottom: 22px;
  }
  .formbold-input-flex > div {
    width: 50%;
  }
  .formbold-form-input {
    width: 100%;
    padding: 13px 22px;
    border-radius: 5px;
    border: 1px solid #DDE3EC;
  
    font-weight: 500;
    font-size: 16px;
    color: #536387;
    outline: none;
    resize: none;
  }
  .formbold-form-input:focus {
    border-color: #6a64f1;
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }
  .formbold-form-label {
    color: #07074D;
    font-weight: 500;
    font-size: 14px;
    line-height: 24px;
    display: block;
    margin-bottom: 10px;
  }

  .formbold-form-confirm {
    border-bottom: 1px solid #DDE3EC;
    padding-bottom: 35px;
  }
  .formbold-form-confirm p {
    font-size: 16px;
    line-height: 24px;
    color: #536387;
    margin-bottom: 22px;
    width: 75%;
  }
  .formbold-form-confirm > div {
    display: flex;
    gap: 15px;
  }

  .formbold-confirm-btn {
    display: flex;
    align-items: center;
    gap: 10px;
    
    border: 0.5px solid #DDE3EC;
    border-radius: 5px;
    font-size: 16px;
    line-height: 24px;
    color: #536387;
    cursor: pointer;
    padding: 10px 20px;
    transition: all .3s ease-in-out;
  }
  .formbold-confirm-btn {
    box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.12);
  }
  .formbold-confirm-btn.active {
   
    color: #FFFFFF;
  }

  .formbold-form-step-1,
  .formbold-form-step-2,
  .formbold-form-step-3 {
    display: none;
  }
  .formbold-form-step-1.active,
  .formbold-form-step-2.active,
  .formbold-form-step-3.active {
    display: block;
  }

  .formbold-form-btn-wrapper {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 25px;
    margin-top: 25px;
  }
  .formbold-back-btn {
    cursor: pointer;
  
    border: none;
    color: #07074D;
    font-weight: 500;
    font-size: 16px;
    line-height: 24px;
    display: none;
  }
  .formbold-back-btn.active {
    display: block;
  }
  .formbold-btn {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 16px;
    border-radius: 5px;
    padding: 10px 25px;
    border: none;
    font-weight: 500;
   
    color: white;
    cursor: pointer;
  }
  .formbold-btn:hover {
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }
  .custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: inline; /*hide original SELECT element: */
}

.select-selected {
 
}

/* Style the arrow inside the select element: */
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #ffff transparent transparent transparent;
}

/* Point the arrow upwards when the select box is open (active): */
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/* style the items (options), including the selected item: */
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
}

/* Style items (options): */
.select-items {
  position: absolute;
 
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/* Hide the items when the select box is closed: */
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {

}

    </style>
<body > 

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <h3 style="text-align:center;"><u>Note: You Can only Apply for One Position</u></h3>
<div class="formbold-main-wrapper">
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <div class="formbold-form-wrapper">
    <form  method="POST" enctype="multipart/form-data" >
        <div class="formbold-steps">
            <ul>
                <li class="formbold-step-menu1 active">
                    <span>1</span>
                    Academic background
                </li>
                <li class="formbold-step-menu2">
                    <span>2</span>
                    Files & Documents
                </li>
                <li class="formbold-step-menu3">
                    <span>3</span>
                    Confirm Details
                </li>
            </ul>
        </div>

        <div class="formbold-form-step-1 active">
          <div class="formbold-input-flex">
            <div>
                <label for="Institutionname" class="formbold-form-label"> Institution Name </label>
                <input
                type="text" name="iname" placeholder=" e.g Meru University" required class="formbold-form-input" />
              
            </div>
            <div>
                <label for="Coursename" class="formbold-form-label"> Course Completed </label>
                <input
                type="text" name="Coursename" placeholder="BSc. IT" required class="formbold-form-input"  required/>
              
            </div>
          </div>
  
          <div class="formbold-input-flex">
              <div>
                  <label for="yog" class="formbold-form-label"> Year Completed (Graduated) </label>
                  <select style="width:100%; height: 43px;" name="Yearr">
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                  </select>
              </div>
              <div>
                  <label for="email" class="formbold-form-label"> Academic Level </label>
                  <select style="width:100%; height: 43px;" name="academics">
                    <option value="Masters">Masters</option>
                    <option value="Degree">Degree</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Certificate">Certificate</option>
                  </select>
              </div>
          </div>
  
          <div>
              <label for="address" class="formbold-form-label"> Department Interested </label>
              <select style="width:100%; height: 43px;" name="Department">
                <option value="Department of ICT">Department of ICT</option>
                <option value="HR">Department of HR</option>
                <option value="Department of Finance">Department of Finance</option>
                <option value="Department of Procurement">Department of Procurement</option>
                <option value="Department of Legal Services of ICT">Department of Legal Services</option>
                <option value="Department of Internal Audit">Department of Internal Audit</option>
          
              </select>
          </div>
        </div>

        <div class="formbold-form-step-2">
          <div class="formbold-input-flex">
          <div>
            <label for="message" class="formbold-form-label"> KCSE Result Slip </label>
            <input type="file"  name="KCSE">
          </div>
          <div>
            <label for="message" class="formbold-form-label"> Cover letter</label>
            <input type="file" id="myFile" name="letter">
          </div>
        </div>
        <div class="formbold-input-flex">
          <div>
            <label for="message" class="formbold-form-label"> CV </label>
            <input type="file" id="myFile" name="CV" >
          </div>
          <div>
            <label for="Certificate" class="formbold-form-label"> Degree/Diloma/Certificate </label>
            <input type="file" id="myFile" name="Certificate">
          </div>
          </div>

          <div class="formbold-input-flex">
            <div>
              <label for="Id" class="formbold-form-label"> National Id </label>
              <input type="file" id="myFile" name="nid">
            </div>
            <div>
              <label for="Professional" class="formbold-form-label"> Professional Attachments </label>
              <input type="file" id="myFile" name="Attachments">
            </div>
            </div>
        </div>

        <div class="formbold-form-step-3">
          <div class="formbold-form-confirm">
            <p style="font-weight:600">
              I hereby certify that, to the best of my knowledge, the provided
              information is true and accurate
            </p>

            <div>
              <button class="btn btn-success"  >
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="11" cy="11" r="10.5" fill="white" stroke="#DDE3EC"/>
                <g clip-path="url(#clip0_1667_1314)">
                <path d="M9.83343 12.8509L15.1954 7.48828L16.0208 8.31311L9.83343 14.5005L6.12109 10.7882L6.94593 9.96336L9.83343 12.8509Z" fill="#536387"/>
                </g>
                <defs>
                <clipPath id="clip0_1667_1314">
                <rect width="14" height="14" fill="white" transform="translate(4 4)"/>
                </clipPath>
                </defs>
                </svg>
                I Agree
              </button>


              <button  class="btn btn-warning">
                <a href="dashboard.php">   No! I Decline.</a>
             
              </button>
            </div>
          </div>
        </div>

        <div class="formbold-form-btn-wrapper">
          <button class="formbold-back-btn">
            Back
          </button>

          <button class="formbold-btn" style="background-color:dodgerblue;">
              Next Step
              </svg>
          </button>
        </div>
    </form>
  </div>
</div>
   

    <script>
         const stepMenuOne = document.querySelector('.formbold-step-menu1')
  const stepMenuTwo = document.querySelector('.formbold-step-menu2')
  const stepMenuThree = document.querySelector('.formbold-step-menu3')

  const stepOne = document.querySelector('.formbold-form-step-1')
  const stepTwo = document.querySelector('.formbold-form-step-2')
  const stepThree = document.querySelector('.formbold-form-step-3')

  const formSubmitBtn = document.querySelector('.formbold-btn')
  const formBackBtn = document.querySelector('.formbold-back-btn')

  formSubmitBtn.addEventListener("click", function(event){
    event.preventDefault()
    if(stepMenuOne.className == 'formbold-step-menu1 active') {
        event.preventDefault()

        stepMenuOne.classList.remove('active')
        stepMenuTwo.classList.add('active')

        stepOne.classList.remove('active')
        stepTwo.classList.add('active')

        formBackBtn.classList.add('active')
        formBackBtn.addEventListener("click", function (event) {
          event.preventDefault()

          stepMenuOne.classList.add('active')
          stepMenuTwo.classList.remove('active')

          stepOne.classList.add('active')
          stepTwo.classList.remove('active')

          formBackBtn.classList.remove('active')

        })

      } else if(stepMenuTwo.className == 'formbold-step-menu2 active') {
        event.preventDefault()

        stepMenuTwo.classList.remove('active')
        stepMenuThree.classList.add('active')

        stepTwo.classList.remove('active')
        stepThree.classList.add('active')

        formBackBtn.classList.remove('active')
        formSubmitBtn.textContent = 'submit'
      } else if(stepMenuThree.className == 'formbold-step-menu3 active') {
        document.querySelector('form').submit()
      }
  })
    

    </script>

</body>
</html>
