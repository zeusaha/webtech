<!DOCTYPE html>
<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

 require 'sendemail/src/Exception.php';
 require 'sendemail/src/PHPMailer.php';
 require 'sendemail/src/SMTP.php';
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>ConsultCo</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <link href="img/favicon.ico" rel="icon">

        <link href="https://fonts.googleapis.com/css2?family=Lato&family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <link href="css/style.css" rel="stylesheet">
    </head>

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
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="service.html" class="nav-item nav-link">Service</a>
                        <a href="feature.html" class="nav-item nav-link">Feature</a>
                        <a href="review.php" class="nav-item nav-link">Review</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->
        
        
        <!-- Contact Start -->
        <div class="contact mt-125">
            <div class="container">
                <div class="section-header">
                    <p>Get In Touch</p>
                    <h2>Get In Touch For Any Query</h2>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div class="accordian">
                            <div class="contact-info">
                                <div class="contact-icon">
                                    <i class="fa fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-text">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Our Head Office <span class="fa fa-plus"></span></h3> 
                                        </div>
                                        <div class="card-body ">
                                            <p><h5>Address:</h5> 15/3 Half Moon Line,Ranikhet,India</p>
                                            <p>Visit us onsite to know more about us</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-info">
                                <div class="contact-icon">
                                    <i class="fa fa-phone-alt"></i>
                                </div>
                                <div class="contact-text">
                                    <div class="card">
                                        <div class="card-header">'
                                            <h3 class="head12">Call for Help<span class="ico fa fa-plus"></span> </h3>
                                        </div>
                                        <div class="card-body">
                                            <p><h5>Contact No:</h5>+012 345 6789</p>
                                            <p>Customer care available 24*7 to help you </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-info">
                                <div class="contact-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="contact-text">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Email for Info<span class="fa fa-plus"></span></h3>
                                        </div>
                                        <div class="card-body">
                                            <p><h5>Email:</h5>ConsultCo@XYZ.com</p>
                                            <p>Email us to get answers for all of your query</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="contact-form">
                            <form name="sentMessage" id="contactForm" action="" method="POST">
                                <div class="control-group">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <textarea class="form-control" name="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div>
                                    <input type="submit"  name='sendmail' value="Send message" class="btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
        <?php 
		if(isset($_POST['sendmail'])) {
			$mail = new PHPMailer(true);
          
			// $mail->SMTPDebug = 4;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = "consultco1014@gmail.com";                 // SMTP username
			$mail->Password = "ccncjirybrwuqhks";                           // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 465;                                    // TCP port to connect to

			$mail->setFrom("consultco1014@gmail.com");
			$mail->addAddress($_POST['email']);     // Add a recipient                                // Set email format to HTML
			$mail->isHTML(true);
			$mail->Subject = $_POST['subject'];
			$mail->Body    = $_POST['message'];
			$mail->AltBody = $_POST['message'];

			if(!$mail->send()) {
                echo "<script>alert('Message could not be sent')</script>";
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
                echo "<script>alert('Message has been sent')</script>";
			}
		}
	 ?>
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
                                    <p><i class="fa fa-envelope"></i>ConsultCo@XYZ.com</p>
                                    <div class="footer-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="footer-link">
                                    <h2>Quick Links</h2>
                                    <a href="">Terms of use</a>
                                    <a href="">Privacy policy</a>
                                    <a href="">Help</a>
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
                        <p>&copy; <a href="">ConsultCo</a>, All Right Reserved.</p>
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

        <!-- Template Javascript -->
        <script src="js/main.js"></script>

        <!-- Jquery Code -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.card-header').click(function(){
                    if($(this).next(".card-body").hasClass("active")){
                        $(this).next(".card-body").removeClass("active").slideUp();
                        $(this).child("span").removeClass("fa-minus").addClass('fa-plus');
                    }
                    else{
                        $(".card card-header h3 span").removeClass("fa-minus").addClass("fa-plus");
                        $(this).next(".card-body").addClass("active").slideDown();
                    }
                })
            })
        </script>
    </body>
</html>