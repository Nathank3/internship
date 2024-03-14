<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include SweetAlert2 CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Signup Page</title>
    <link rel="stylesheet" href="css\styles.css">
</head>

<style>
    select {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-weight: 600;
}
</style>
<body>
    <div id="background-slider">
        <img src="images\carousel\carousel_1.jpg" alt="Background Image 1">
        <img src="images\carousel\carousel_1.jpg" alt="Background Image 2">
        <img src="images\carousel\carousel_1.jpg" alt="Background Image 3">
        <!-- Add more images as needed -->
    </div>

    <div class="container">
        <div class="header">
            <img src="images\logo\logo.png" alt="Logo" class="logo">
            <h2 style="font-weight:600;text-align: center;">Sign Up</h2>
        </div>
        
        <div class="scroll-container">
        <form id="signupForm" onsubmit="return validateForm()"
         action="signup.php" method="POST">
            <label for="fullName">Full Names:</label>
            <input type="text" id="fullName" name="fullName" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone No:</label>
            <input type="tel" id="phone" name="phone" required>

             <label for="subCounty">Gender:</label>
            <select name="Gender">
               <option value="Male">Male</option>
               <option value="Female">Female</option>
            </select>

            <label for="password">Password:</label>
            <input type="password" id="password" name="passwordd" minlength="8" required>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" minlength="8" required>

            <label for="county">County:</label>
            <select id="selectCounty" onchange="populateSubCounties()" name="county" required>
                <!-- Options for counties go here -->
                <option value="" disabled hidden selected>Select an option</option>
                  <option value=Makueni>Makueni</option>

            </select>
            <br>
            <label for="subCounty">Sub County:</label>
            <select name="subCounty" id="selectSubCounty" onchange="populateWards()">
               <option value="0">Select Sub County</option>
        <!-- Sub counties will be populated dynamically using JavaScript -->
            </select>

            <label for="ward">Ward:</label>
            <select name="ward" id="selectWard">
        <option value="0">-Select Ward-</option>
        <!-- Wards will be populated dynamically using JavaScript -->
        </select>

            <div class="terms">
                <input type="checkbox" id="termsCheckbox" required>
                <label for="termsCheckbox">
                    By clicking Sign Up, you acknowledge that you have read and agreed to the 
                    <a href="#" class="blue-link">Privacy Policy</a> and 
                    <a href="#" class="blue-link">Makueni County Assembly Terms of Use</a>.
                </label>
            </div>

            <button type="submit"  name="add" id="btnSubmit" onclick="submitForm()">
                <span class="icon">&#x1F464;</span> Sign Up
            </button>
        </form>
        </div>

        <div class="login-link">
            Already have an account? <a href="signin.php" class="blue-link">Login</a>
        </div>
    </div>

    <script>
    // Sample data for counties, sub-counties, and wards
const countyData = {
    "Makueni": {
        "Makueni": ["Nzaui/Kalamba","Muvau","Kathonzweni","Mavindini","Kitise/Kithuki","Wote","Mbitini"],
        "Mbooni": ["Tulimani","Mbooni","Kithungo","Kisau/Kiteta","Kako/Waia","Kalawa,"],
        "Kaiti": ["Kee","Kilungu","Ilima","Ukia"],
        "Kilome": ["Kiima", "Kiu/Kalanzoni","Mukaa","Kasikeu"],
        "Kibwezi East": ["Thange", "Ivingoni", "Mtito Andei","Masongaleni"],
        "Kibwezi West": ["Makindu","Nguumo","Nguu/Masumba","Emali/Mulala", "Kikumbulyu North", "Kikumbulyu South"],
        
    },
   
};

function populateSubCounties() {
    const countySelect = document.getElementById("selectCounty");
    const subCountySelect = document.getElementById("selectSubCounty");
    const wardSelect = document.getElementById("selectWard");

    const selectedCounty = countySelect.value;

    // Clear previous options
    subCountySelect.innerHTML = "<option value='0'>Select Sub County</option>";
    wardSelect.innerHTML = "<option value='0'>-Select Ward-</option>";

    if (selectedCounty !== "0") {
        const subCounties = countyData[selectedCounty];
        for (const subCounty in subCounties) {
            const option = document.createElement("option");
            option.value = subCounty;
            option.text = subCounty;
            subCountySelect.add(option);
        }
    }
}

function populateWards() {
    const subCountySelect = document.getElementById("selectSubCounty");
    const wardSelect = document.getElementById("selectWard");

    const selectedCounty = document.getElementById("selectCounty").value;
    const selectedSubCounty = subCountySelect.value;

    // Clear previous options
    wardSelect.innerHTML = "<option value='0'>-Select Ward-</option>";

    if (selectedCounty !== "0" && selectedSubCounty !== "0") {
        const wards = countyData[selectedCounty][selectedSubCounty];
        for (const ward of wards) {
            const option = document.createElement("option");
            option.value = ward;
            option.text = ward;
            wardSelect.add(option);
        }
    }
}

function submitForm() {
    const county = document.getElementById("selectCounty").value;
    const subCounty = document.getElementById("selectSubCounty").value;
    const ward = document.getElementById("selectWard").value;

    // You can use these values to perform further actions or submit the form
    console.log("County:", county);
    console.log("Sub County:", subCounty);
    console.log("Ward:", ward);
    // Add your form submission logic here
}

</script>
    

    <script src="jvascript/scripts.js"></script>
</body>

<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if email exists
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $sqlCheckEmail = "SELECT * FROM register WHERE email=?";
        $stmtCheckEmail = $conn->prepare($sqlCheckEmail);
        $stmtCheckEmail->execute([$email]);

        if ($stmtCheckEmail->rowCount() > 0) {
            echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Makueni Assembly Says",
                    text: "This Email Already Exists",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                }).then(() => {
                    window.location.href = "signup.php";
                });
            </script>';
            exit; // Stop execution if email already exists
        }
    }

    if (isset($_POST['add'])) {
        $fullName = $_POST['fullName'];
        $phone = $_POST['phone'];
        $Gender = $_POST['Gender'];
        $passwordd = $_POST['passwordd']; 
        $confirmPassword = $_POST['confirmPassword'];
        $email = $_POST['email'];
        $county = $_POST['county'];
        $subCounty = $_POST['subCounty'];
        $ward = $_POST['ward'];

        // Check if passwords match
        if ($passwordd !== $confirmPassword) {
            echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Makueni Assembly Says",
                    text: "Passwords DONT Match",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                }).then(() => {
                    window.location.href = "signup.php";
                });
            </script>';
            exit;
        }

        
        $hashedPassword = password_hash($passwordd, PASSWORD_BCRYPT);

         $add = $conn->prepare("INSERT INTO register (fullName,email,phone, Gender, passwordd, confirmPassword,  county, subCounty, ward)
        VALUES (?,?,?,?,?,?,?,?,?) ");
    $res = $add->execute(array($fullName, $email, $phone, $Gender, $hashedPassword, $hashedPassword, $county, $subCounty, $ward));

      
        if ($res) {
            // Show success message
            echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Makueni Assembly Says",
                    text: "Account Created! You Can now Login",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                }).then(() => {
                    window.location.href = "signin.php";
                });
            </script>';
        } else {
            echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Makueni Assembly Says",
                    text: "Error Creating Account",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                }).then(() => {
                    window.location.href = "signup.php";
                });
            </script>';
        }
    }
}
?>
</html>

