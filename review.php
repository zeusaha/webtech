<?php
        session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <link href="img/favicon.ico" rel="icon">

        
        <link href="https://fonts.googleapis.com/css2?family=Lato&family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <script>
            $(document).ready(function(){
  
  $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      autoPlay: 1000,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:5
          }
      }
  })
  });
        </script>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <!-- Entering the comment to database -->
    <?php

        if (isset($_POST["review"])){
            $con=mysqli_connect('localhost','root','') or die("Not able to connect");
            mysqli_select_db($con,'businessconsultancy');
            $comment= $_POST["commentTxt"];
            $query ="INSERT INTO review VALUES('".$_SESSION['fname']."','".$_SESSION['email']."','".$comment."')";
            if(mysqli_query($con,$query)){
                echo "Entered";
            } 
            else{
                if(mysqli_errno($con) == 1062)
                    echo "<script>duplicate entry no need to insert into DB</script>";
                else
                echo "<script>duplicate entry no need to insert into DB</script>";

             }
         
        }
    ?>

    <body class="page">
        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a href="index.html" class="navbar-brand">ConsultCo</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="service.php" class="nav-item nav-link">Service</a>
                        <a href="feature.php" class="nav-item nav-link">Feature</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->
        <section style="height: 70px;"></section>
        <!-- Testimonial Start -->
        <div class="testimonial">
            <div class="container">
                <div class="section-header">
                    <h2>100% Positive Customer Reviews</h2>
                </div>
                <section style="height: 10px;"></section>
                <div class="owl-carousel testimonials-carousel">
                    <div class="testimonial-item">
                        <img src="img/testimonial-1.jpg" alt="Image">
                        <h2>Client Name</h2>
                        <p>
                            They explain the process well and follow up to see how we’re progressing. They’ve gone above and beyond their duty
                        </p>
                        <div style="height: 10px;"></div>
                    </div>
                    <div class="testimonial-item">
                        <img src="img/testimonial-2.jpg" alt="Image">
                        <h2>Client Name</h2>
                        <p>
                            Their staff has breadth of knowledge, experience, and it’s clear they can handle large enterprise clients
   
                        <div style="height: 5px;"></div>
                    </div>
                    <div class="testimonial-item">
                        <img src="img/testimonial-3.jpg" alt="Image">
                        <h2>Client Name</h2>
                        <p>
                            We’ve built off each others’ ideas, which has been great to have in a partner.I feel very impressed that they seem to truly get our company
                        </p>
                        <h3>Profession</h3>
                        <div style="height: 10px;"></div>
                    </div>
                    <?php
                        $con=mysqli_connect('localhost','root','') or die("Not able to connect");
                        mysqli_select_db($con,'businessconsultancy');
                        $query="SELECT * FROM review ";
                        $results=mysqli_query($con,$query);
                        foreach($results as $ele)
                        {
                            echo "<div class='testimonial-item'>".
                            "<img src='img/testimonial-4.jpg' alt='Image'>".
                            "<h2>".$ele['Fname']."</h2>".
                            "<p>".$ele['Comment']."</p>".
                            "<div style='height: 10px;'></div>".
                            "</div>";
                            
                        } 
                            
                        
                        
                    ?>
                    
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
        <div>
            <form action="" method="post">
                <p style="color:black;font-size: 200%; margin-left:4rem;" >POST A REVIEW</p>
                <textarea class="reviewTextArea"  style ="border: 2px solid powderblue;padding: 30px" placeholder="Comment Here..." name="commentTxt" cols="30" rows="5"></textarea>
                <input style="display:block;padding: 10px;margin-left:5rem;background-color:#1b9f96;color:white;border:none"; type="submit" name="review" value="Post Review">
            </form>
        </div>
        
        <style>
               .reviewTextArea{
                margin-left: 5rem;
               }
        </style>
     
        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="footer-contact">
                                    <h2>Our Head Office</h2>
                                    <p><i class="fa fa-map-marker-alt"></i>15/3 Half Moon Line,Ranikhet,India</p>
                                    <p><i class="fa fa-phone-alt"></i>+012 345 67890</p>
                                    <p><i class="fa fa-envelope"></i>info@example.com</p>
                                    <div class="footer-social">
                                       <a href="https://freewebsitecode.com/"><i class="fab fa-twitter"></i></a>
                                    <a href="https://facebook.com/freewebsitecode"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://freewebsitecode.com/"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://freewebsitecode.com/"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.youtube.com/channel/UC9HlQRmKgG3jeVD_fBxj1Pw/videos"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="footer-link">
                                    <h2>Quick Links</h2>
                                    <a href="">Terms of use</a>
                                    <a href="">Privacy policy</a>
                                    <a href="">Cookies</a>
                                    <a href="">Help</a>
                                    <a href="">FQAs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="footer-newsletter">
                            <h2>Newsletter</h2>
                            <p>
                                Get the latest updates from our website and a chance to always be upto date with our progress along side yours!
                            </p>
                            <div class="form">
                                <input class="form-control" placeholder="Email goes here">
                                <button class="btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container copyright">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; <a href="https://freewebsitecode.com">ConsultCo</a>, All Right Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
