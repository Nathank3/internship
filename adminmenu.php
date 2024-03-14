

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

*{
  list-style: none;
  text-decoration: none;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Open Sans', sans-serif;
}

body{
  background: #f5f6fa;
}

.wrapper .sidebar{
  background: rgb(5, 68, 104);
  position: fixed;
  top: 0;
  left: 0;
  width: 225px;
  height: 100%;
  padding: 20px 0;
  transition: all 0.5s ease;
}

.wrapper .sidebar .profile{
  margin-bottom: 30px;
  text-align: center;
}

.wrapper .sidebar .profile img{
  display: block;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin: 0 auto;
}

.wrapper .sidebar .profile h3{
  color: #ffffff;
  margin: 10px 0 5px;
}

.wrapper .sidebar .profile p{
  color: rgb(206, 240, 253);
  font-size: 14px;
}

.wrapper .sidebar ul li a{
  display: block;
  padding: 13px 30px;
  border-bottom: 1px solid #10558d;
  color: rgb(241, 237, 237);
  font-size: 16px;
  position: relative;
}

.wrapper .sidebar ul li a .icon{
  color: #dee4ec;
  width: 30px;
  display: inline-block;
}

 

.wrapper .sidebar ul li a:hover,
.wrapper .sidebar ul li a.active{
  color: #0c7db1;

  background:white;
    border-right: 2px solid rgb(5, 68, 104);
}

.wrapper .sidebar ul li a:hover .icon,
.wrapper .sidebar ul li a.active .icon{
  color: #0c7db1;
}

.wrapper .sidebar ul li a:hover:before,
.wrapper .sidebar ul li a.active:before{
  display: block;
}

.wrapper .section{
  width: calc(100% - 225px);
  margin-left: 225px;
  transition: all 0.5s ease;
}

.wrapper .section .top_navbar{
  background: rgb(7, 105, 185);
  height: 50px;
  display: flex;
  align-items: center;
  padding: 0 30px;
 
}

.wrapper .section .top_navbar .hamburger a{
  font-size: 28px;
  color: #f4fbff;
}

.wrapper .section .top_navbar .hamburger a:hover{
  color: #a2ecff;
}

 

body.active .wrapper .sidebar{
  left: -225px;
}

body.active .wrapper .section{
  margin-left: 0;
  width: 100%;
}
/*modal*/
.modal {
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
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
  text-align: center;
}

.modal-body {padding: 2px 16px;}

textarea {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
    </style>
</head>
<body>
   
    <div class="wrapper">
        <div class="section">
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            </div>
             
        </div>
        <div class="sidebar">
            <div class="profile">
                <img style="width: 140px;" src="images/logo/logo.png" alt="profile_picture">
                <h3><?php echo $uname;?></h3>
                <p><?php echo $email;?></p>
            </div>
            <ul>
              
                <li>
                    <a href="admindashboard.php">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item" >My Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="applications.php">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Internships</span>
                    </a>
                </li>
                <li>
                    <a href="attach.php">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Attachments</span>
                    </a>
                </li>
                <li>
                    <a href="deadline.php">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="item">Set Deadline</span>
                    </a>
                </li>
                <li>
                    <a  href="Updates.php">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Post Updates</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="">
                        <span class="icon"><i class="fas fa-chart-line"></i></span>
                        <span class="item">Announcements</span>
                    </a>
                </li> -->
                <li>
                    <a href="adminprofile.php">
                        <span class="icon"><i class="fas fa-user-shield"></i></span>
                        <span class="item">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="item">End Session</span>
                    </a>
                </li>
            </ul>
        </div>
        
    </div>
  <script>
       var hamburger = document.querySelector(".hamburger");
  hamburger.addEventListener("click", function(){
    document.querySelector("body").classList.toggle("active");
  })
  </script>

 
    
    
 
  </div>

</div>


</body>
</html>
