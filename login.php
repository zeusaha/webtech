<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Business Consultancy</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/login.css" rel="stylesheet">
</head>
<?php
session_start();
if (isset($_POST['signup'])) {
    $_SESSION['fname'] = $_POST['fname'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $btype = $_POST['businesstype'];
    $email = $_POST['email'];
    $pwd = $_POST['fpassword'];
    $pno = $_POST['pno'];
    $uid = 'root';
    $con = mysqli_connect('localhost', $uid, '') or die("Not able to connect");
    mysqli_select_db($con, 'businessconsultancy');
    $sql_u = "SELECT * FROM users WHERE email='$email'";
    $res_u = mysqli_query($con, $sql_u);
    if (mysqli_num_rows($res_u) > 0) {
        echo "<script>alert('Please enter different Email');</script>";
    } else {
        mysqli_query($con, "INSERT INTO users VALUES('$fname','$lname','$email','$pwd','$btype','$pno')");
        header('Location:AfterLogin/loggedInHome.php');
    }
}
?>
<?php
   if(isset($_POST['login'])){
    $con=mysqli_connect('localhost','root','') or die("Not able to connect");
    mysqli_select_db($con,'businessconsultancy');
    $email=$_POST['email'];
    $password=$_POST['pswd'];
    $usernameQ=mysqli_query($con,"SELECT * FROM users where email='$email' AND password='$password'");
    $rowData = mysqli_fetch_array($usernameQ);
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $results = mysqli_query($con, $query);
    if (mysqli_num_rows($results)>0){
        $_SESSION['fname']=$rowData['First Name'];
        $_SESSION['email']=$_POST['email'];
        header('location:AfterLogin/loggedInHome.php');
    }else {
        echo "<script>alert('Wrong username/password combination');</script>";
    }
   }
?>
<body>
    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a href="index.html" class="navbar-brand">ConsultCo</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            </div>
        </div>
    </div>
    <!-- Nav Bar End -->
    <div class="wrapper">
        <div class="title-text">
            <div class="title login">Login Form</div>
            <div class="title signup">Signup Form</div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">Signup</label>
                <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
                <!-- Login Start -->
                <form action="" onsubmit="return validateLogin()" class="login" method="post">
                    <div class="field">
                        <input type="text" placeholder="Email Address" id='email1' name="email" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Password" id="pswd1" name="pswd" required>
                    </div>
                    <div class="pass-link"><a href="#">Forgot password?</a></div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" name='login' value="Login">
                    </div>
                    <div class="signup-link">Not a member? <a href="">Signup now</a></div>
                </form>
                <!-- Login End -->
                <!-- SignUp Start -->
                <form action="" class="signup" onsubmit="return validateSignup()" method="POST">
                    <div class="field">
                        <input type="text" placeholder="First Name" name="fname" required>
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Last Name" name="lname" required>
                    </div>

                    <div class='field'>
                        <input type="text" placeholder="Email Address" id="email" name="email" required>
                    </div>

                    <div class="field">
                        <input type="text" placeholder="Business type" name="businesstype" required>
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Phone Number" name="pno" id="pno" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Password" id="fpassword" name="fpassword" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Confirm password" id="spassword" name="spassword" required>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" name="signup" value="submit">
                    </div>
                </form>
                <!-- SignUp End -->
            </div>
        </div>
    </div>
    <script>
        const loginText = document.querySelector(".title-text .login");
        const loginForm = document.querySelector("form.login");
        const loginBtn = document.querySelector("label.login");
        const signupBtn = document.querySelector("label.signup");
        const signupLink = document.querySelector("form .signup-link a");
        signupBtn.onclick = (() => {
            loginForm.style.marginLeft = "-50%";
            loginText.style.marginLeft = "-50%";
        });
        loginBtn.onclick = (() => {
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
        });
        signupLink.onclick = (() => {
            signupBtn.click();
            return false;
        });

        function validateLogin() {
            var email = document.getElementById('email1').value;
            var pwd = document.getElementById('pswd1').value;
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (!email.match(mailformat)) {
                alert("Invalid Email");
                console.log("Invalid");
                return false;
            }
            var passw = /^[A-Za-z]\w{7,14}$/;
            if (pwd.match(passw)) {
                return true;
            } else {
                alert('Invalid Password') //To check a password between 6 to 20 characters 
                return false; //which contain at least one numeric digit, 
                //one uppercase and one lowercase letter
            }
            return true;
        }

        function validateSignup() {
            var email = document.getElementById('email').value;
            var pwd1 = document.getElementById('fpassword').value;
            var pwd2 = document.getElementById('spassword').value;
            console.log(pwd1);
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (!email.match(mailformat)) {
                alert("Enter Valid Email");
                return false;
            }
            var passw = /^[A-Za-z]\w{7,14}$/;
            if (pwd1.match(passw)) {
                return true;
            } else {
                alert('6 to 20 characters which contain at least one numeric digit');
                //one uppercase and one lowercase letter ') //To check a password between 6 to 20 characters 
                return false; //which contain at least one numeric digit, 
                //one uppercase and one lowercase letter
            }
            if (pwd1 != pwd2) {
                alert('Password does not match');
                return false;
            }
            return true;
        }
    </script>
</body>

</html>