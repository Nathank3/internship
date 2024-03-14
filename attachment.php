<?php
include('session.php');
include('connect.php');
?>


<?php include('menu.php');?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<h2 style="text-align:center;">Attachment/Volunteerism Application Section</h2>
<div class="formbold-main-wrapper">
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <div class="formbold-form-wrapper">
    <form  method="POST" enctype="multipart/form-data">
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
                <label for="Coursename" class="formbold-form-label"> Course undertaking /Completed </label>
                <input
                type="text" name="Coursename" placeholder="BSc. IT" required class="formbold-form-input"  required/>
              
            </div>
          </div>
  
          <div class="formbold-input-flex">
              <div>
                  <label for="yog" class="formbold-form-label"> Application Type</label>
                  <select style="width:100%; height: 43px;" name="Application_Type">
                    <option value="Attachment">Attachment</option>
                    <option value="Volunteerism">Volunteerism</option>
                 
                  </select>
              </div>
              <div>
                  <label for="email" class="formbold-form-label"> Academic Level </label>
                  <select style="width:100%; height: 43px;" name="Academic_Level">
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
            <label for="message" class="formbold-form-label">Attachment application letter</label>
            <input type="file" id="myFile" name="application_letter">
          </div>
        </div>
        <div class="formbold-input-flex">
          <div>
            <label for="message" class="formbold-form-label"> Current resume or CV </label>
            <input type="file" id="myFile" name="CV" >
          </div>
          <div>
            <label for="Certificate" class="formbold-form-label"> Transcripts/Certicate </label>
            <input type="file" id="myFile" name="Transcripts_or_certificate">
          </div>
          </div>

          <div class="formbold-input-flex">
            <div>
              <label for="Id" class="formbold-form-label">National/Student ID </label>
              <input type="file" id="myFile" name="ID">
            </div>
            <div>
              <label for="Professional" class="formbold-form-label"> Insurance letter </label>
              <input type="file" id="myFile" name="Insurance_letter">
            </div>
            </div>
        </div>

        <div class="formbold-form-step-3">
          <div class="formbold-form-confirm">
            <p>
              I hereby certify that, to the best of my knowledge, the provided
              information is true and accurate
            </p>

            <div>
              <button class="formbold-confirm-btn active"  >
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


              <button class="formbold-confirm-btn">
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
                No! I Decline.
              </button>
            </div>
          </div>
        </div>

        <div class="formbold-form-btn-wrapper">
          <button class="formbold-back-btn">
            Back
          </button>

          <button class="formbold-btn">
              Next Step
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_1675_1807)">
              <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white"/>
              </g>
              <defs>
              <clipPath id="clip0_1675_1807">
              <rect width="16" height="16" fill="white"/>
              </clipPath>
              </defs>
              </svg>
          </button>
        </div>
    </form>
  </div>
</div>
<!-- INSERTING INTO DATABASE -->
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your other form data
    $iname = $_POST['iname'];
    $Coursename = $_POST['Coursename'];
    $Application_Type = $_POST['Application_Type'];
    $Academic_Level = $_POST['Academic_Level'];
    $Department = $_POST['Department'];
    $userid = $_SESSION['pid']; 


    // File Uploads
    $KCSE = "Attachment/" . $_FILES["KCSE"]["name"];
    $KCSETmpName = $_FILES["KCSE"]["tmp_name"];
    move_uploaded_file($_FILES["KCSE"]["tmp_name"], $KCSE);

    $application_letter = "Attachment/" . $_FILES["application_letter"]["name"];
    $letterTmpName = $_FILES["application_letter"]["tmp_name"];
    move_uploaded_file($_FILES["application_letter"]["tmp_name"], $application_letter);
   
    $CV = "Attachment/" . $_FILES["CV"]["name"];
    $cvTmpName = $_FILES["CV"]["tmp_name"];
    move_uploaded_file($_FILES["CV"]["tmp_name"], $CV);

    $Transcripts_or_certificate = "Attachment/" . $_FILES["Transcripts_or_certificate"]["name"];
    $CertificateTmpName = $_FILES["Transcripts_or_certificate"]["tmp_name"];
   move_uploaded_file($_FILES["Transcripts_or_certificate"]["tmp_name"], $Transcripts_or_certificate);

    $ID = "Attachment/" . $_FILES["ID"]["name"];
    $nidTmpName = $_FILES["ID"]["tmp_name"];
     move_uploaded_file($_FILES["ID"]["tmp_name"], $ID);

    $Insurance_letter = "Attachment/" . $_FILES["Insurance_letter"]["name"];
    $AttachmentsTmpName = $_FILES["Insurance_letter"]["tmp_name"];
     move_uploaded_file($_FILES["Insurance_letter"]["tmp_name"], $Insurance_letter);

    // Database Insert
    $stmt = $conn->prepare("INSERT INTO volunteerism (iname, Coursename, Application_Type, Academic_Level, Department, KCSE,CV,ID,application_letter, Transcripts_or_certificate, Insurance_letter,pid)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");

    $stmt->bindParam(1, $iname);
    $stmt->bindParam(2, $Coursename);
    $stmt->bindParam(3, $Application_Type);
    $stmt->bindParam(4, $Academic_Level);
    $stmt->bindParam(5, $Department);
    $stmt->bindParam(6, $KCSE);
    $stmt->bindParam(7, $CV);
    $stmt->bindParam(8, $ID);
    $stmt->bindParam(9, $application_letter);
    $stmt->bindParam(10, $Transcripts_or_certificate);
    $stmt->bindParam(11, $Insurance_letter);
    $stmt->bindParam(12, $pid);

    if ($stmt->execute()) {
      echo '<script>
                Swal.fire({
                    title: "Congratulations!",
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
    background: white;
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
    color: #536387;
  }
  .formbold-steps li span {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #DDE3EC;
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
    background: #6A64F1;
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
    background: #FFFFFF;
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
    background: #FFFFFF;
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
    background: #6A64F1;
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
    background: #FFFFFF;
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
    background-color: #6A64F1;
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
  background-color: DodgerBlue;
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
  border-color: #fff transparent transparent transparent;
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
  background-color: DodgerBlue;
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
  background-color: rgba(0, 0, 0, 0.1);
}

</style>
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
<?php include('footer.php');?>