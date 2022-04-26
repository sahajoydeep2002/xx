<?php
require 'utilities/common.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ReferMedi - Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>

<body class="bg-gradient-primary" style="user-select: none">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/login_img.jpg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4" style="font-weight: bold">Welcome Back!</h4>
                                    </div>
                                    
                                    <form action="utilities/login_script.php" method="post" class="user">
                                        <div class="mb-3"><input class="form-control form-control-user" style="border: black 2px solid" id="email" type="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email"></div>
                                        <div class="mb-3"><input class="form-control form-control-user" style="border: black 2px solid" type="password" placeholder="Password" name="password"></div>
                                        
                                        <div class="mb-3 btn-user" style="border: black 2px solid">
                                            <select name="role" aria-label="Default select example" style="width: 95%;margin-left: 11px;border: none">
                                            <option>Patient</option>
                                            <option>Hospital</option>
                                            <option>Doctor</option>
                                            </select>
                                        </div>
                                        
                                        <button class="btn btn-primary d-block btn-user w-100" type="submit" style="font-weight: bold">Login</button>
                                        
                                        <hr>
                                    </form>
                                    
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                        <a class="small m-2" style="cursor: pointer" onclick="giveEmail()">Forgot password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>

    <script>
        function giveEmail() {
            let email = document.getElementById('email').value;
            if( email != "") {
                window.location.replace("pwd.php?email="+email);
            } else {
                alert("Please enter registered email");
            }
        }    
    </script>
    
    
</body>

</html>