<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="javascript/script.js" defer></script>
    <link rel="icon" href="images/logo/logo.png" >
   <style>
    h3 {
        color: black;
        font-size: 30px;
        
    }
    p {
        color: black;
        
    }
    body {font-family: Arial, Helvetica, sans-serif;}

    </style>
    <title>Landing Page</title>
</head>
<body>
    <!-- Header -->
    <header class="header-container">
        <nav>
            <div class="logo">
                <img src="images/logo/logo.png" alt="Logo" class="logo-img">
            </div>
            <ul class="menu">
                <button style='margin-right:16px' class="btn btn-info btn-lg" ><a href="signup.php">Register</a></button>
                <button style='margin-right:16px' class="btn btn-info btn-lg" ><a href="signin.php">Login</a></button>
                 
            </ul>
        </nav>
    </header>

    <!-- Body -->

    <div class="body-container">
    <!-- Bootstrap Carousel -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">

            <div class="item active slide slide1" style="background-image: url('images/carousel/carousel_1.JPG');">
                <div class="carousel-caption">
                    <h3>Andu Maitu</h3>
                    <p>Thayu Witu</p>
                </div>
            </div>

            <div class="item slide slide2" style="background-image: url('images/carousel/carousel_1.JPG');">
                <div class="carousel-caption">
                    <h3 >WOTE HQ</h3>
                    <p >Thank you, Makueni County!</p>
                </div>
            </div>

            <div class="item slide slide3" style="background-image: url('images/carousel/meru.JPG');">
                <div class="carousel-caption">
                    <h3>Makueni County Assembly</h3>
                    <p>P.O.Box 572-90300</p>
                    <p>Wote-Makueni</p>
                </div>
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- End Bootstrap Carousel -->
</div>

</div>


    <!-- Footer -->
    <footer class="footer-container">
        <div class="footer-column">
            <p>About</p>
            <p>Wauni Wa Kwika Nesa</p>
        </div>
        <div class="footer-column">
            <p>Contacts</p>
            <p>For any queries, contact us at <br><a href="info@makueniassembly.go.ke" style="color: green;">info@makueniassembly.go.ke</a></br></p>
        </div>
       
            <div class="footer-column">
    <b><a href="manual/manual.pdf" target="_blank" download>Download User Manual</a></b>
           </div>

   
  
    </footer>
</body>
</html>
