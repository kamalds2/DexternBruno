<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="light">

    <head>

        <meta charset="utf-8" />
        <title>Admin Sign In | Travel Bunny</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" /> 
        <meta content="" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo THEMEURL;?>assets/images/favicon.png">

        <!-- Layout config Js  -->
        <script src="<?php echo THEMEURL;?>assets/js/layout.js"></script>
        <!-- Bootstrap Css -->
        <link href="<?php echo THEMEURL;?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo THEMEURL;?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo THEMEURL;?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!-- custom Css-->
        <link href="<?php echo THEMEURL;?>assets/css/custom.css" rel="stylesheet" type="text/css" />

    </head> 

    <body>

        <section class="auth-page-wrapper py-5 position-relative d-flex align-items-center justify-content-center min-vh-100 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-0">
                                    <div class="col-lg-5">
                                        <div class="card auth-card bg-primary h-100 border-0 shadow-none p-sm-3 overflow-hidden">
                                            <div class="card-body p-4 d-flex justify-content-between flex-column">
                                                <div class="auth-image">
                                                    <img src="<?php echo THEMEURL ; ?>assets/images/logo-light-full.png" alt="" height="80" />
                                                    <img src="<?php echo THEMEURL ; ?>assets/images/effect-pattern/auth-effect-2.png" alt="" class="auth-effect-2" />
                                                    <img src="<?php echo THEMEURL ; ?>assets/images/effect-pattern/auth-effect.png" alt="" class="auth-effect" />
                                                </div>

                                                <div>   
                                                    <h3 class="text-white">Start your journey with us.</h3>
                                                    <p class="text-white-75 fs-15">It brings together your tasks, projects, timelines, files and more</p>
                                                </div>
                                                <div class="text-center text-white-75">
                                                    <p class="mb-0">&copy;
                                                        <script> //document.write(new Date().getFullYear())</script> Travel Bunny.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-7">
                                        <div class="card mb-0 border-0 py-3 shadow-none">
                                            <div class="card-body px-0 p-sm-5 m-lg-4">
                                                <div class="text-center mt-2">
                                                    <h5 class="text-primary fs-20">Forgot Password?</h5>
                                                    <p class="text-muted mb-4">Reset password with Travel Bunny.</p>
                                                    
                                                </div>

                                                <div class="alert alert-borderless alert-warning text-center mb-2 mx-2" role="alert">
                                                    Enter your email and instructions will be sent to you!
                                                </div>
                                                <div class="p-2">
                                                    <form action="<?php echo SITEURL; ?>forgetpassword/resetPassword" method="post" name="forgetPasswordForm" id="forgetPasswordForm" enctype= multipart/form-data>
                                                        <div class="mb-4">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required />
                                                        </div>

                                                        <div class="text-center mt-4">
                                                            <button class="btn btn-primary w-100" type="submit">Send Reset Link</button>
                                                        </div>
                                                    </form><!-- end form -->
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <p class="mb-0">Wait, I remember my password... <a href="index.php" class="fw-semibold text-primary text-decoration-underline"> Click here </a> </p>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>

        <!-- JAVASCRIPT -->
        <script src="<?php echo THEMEURL;?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo THEMEURL;?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo THEMEURL;?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
        <script src="<?php echo THEMEURL;?>assets/js/plugins.js"></script>


        <script type="text/javascript">
            $(document).ready(function () {   
        $('#forgetPasswordForm').validate({   
              
            rules: {
                email : {
                    "required":true,
                    "email":true,
                    remote : {
                        url : '<?php echo SITEURL; ?>forgetPassword/checkEmail',
                        type: "post",
                        data: {
                            email: function() {
                                return $( "#email" ).val();
                            },
                        },
                    }, 
                } 
            },
            messages: {
                email : {
                    required: "Please enter  Email",
                    email : "Please enter valid email",
                    remote : "Pls enter correct email"
                }, 
                 
            }
        }); 


    });
        </script>

    </body>

</html>

