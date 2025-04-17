<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="light">

    <head>

        <meta charset="utf-8" />
        <title>Admin Sign In | Dextern&Bruno</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo THEMEURL ; ?>assets/images/favicon.png">



        <!-- Layout config Js -->
        <script src="<?php echo THEMEURL  ; ?>assets/js/layout.js"></script> 
        <!-- Bootstrap Css -->
        <link href="<?php echo THEMEURL ; ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo THEMEURL ; ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo THEMEURL ; ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!-- custom Css-->
        <link href="<?php echo THEMEURL ; ?>assets/css/custom.css" rel="stylesheet" type="text/css" />

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
                                        <div class="card auth-card bg-primary h-100 border-0 shadow-none p-sm-3 overflow-hidden mb-0">
                                            <div class="card-body p-4 d-flex justify-content-between flex-column">
                                                <div class="auth-image mb-3">
                                                    <img src="<?php echo THEMEURL ; ?>assets/images/logo-light-full.png" alt="" height="80" />
                                                        <img src="<?php echo THEMEURL ; ?>assets/images/effect-pattern/auth-effect.png" alt="" class="auth-effect" />
                                                </div>
        
                                                <div>
                                                    <h3 class="text-white">Start your journey with us.</h3> 
                                                    <p class="text-white-75 fs-15">It brings together your tasks, projects, timelines, files and more</p>
                                                </div>
                                                <div class="text-center text-white-75">
                                                    <p class="mb-0">&copy;
                                                        <script>//document.write(new Date().getFullYear())</script> Dextern & Bruno
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-7">
                                        <div class="card mb-0 border-0 shadow-none">
                                            <div class="card-body px-0 p-sm-5 m-lg-4">
                                                <div class="text-center mt-2">
                                                    <h5 class="text-primary fs-20">Welcome Back !</h5>
                                                    <p class="text-muted">Sign in to continue to Dextern & Bruno.</p>
                                                </div>
                                                <div class="p-2 mt-5">
                                                    <form  id="form-login" action="<?php echo SITEURL; ?>login/loginSubmit" method="post" name="loginForm">
                                                        <?php if(isset($_SESSION['error_msg'])) { ?>
                                                            <div style="color:#e82e40;font-weight:bold;"><?php  echo $_SESSION['error_msg']; unset($_SESSION['error_msg']);?></div>
                                                        <?php } ?> 
                                                        <div class="mb-3">
                                                            <label for="username" class="form-label">Username</label>
                                                            <input type="text" class="form-control" id="username" name="user_name" placeholder="Enter username" value="<?php if(isset($_COOKIE['digital_remember_user'])) echo $_COOKIE['digital_remember_user']; ?>">
                                                        </div>
                                                
                                                        <div class="mb-3">
                                                            <div class="float-end">
                                                                <a href="<?php echo SITEURL;?>forgetPassword" class="text-muted">Forgot password?</a>
                                                            </div>
                                                            <label class="form-label" for="password-input">Password</label>
                                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                                <input type="password" class="form-control pe-5 password-input" name="password" placeholder="Enter password" id="password-input" value="<?php if(isset($_COOKIE['digital_remember_pass'])) echo base64_decode($_COOKIE['digital_remember_pass']); ?>" >
                                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                            </div>
                                                        </div>
                                                
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check" name="stay_signed" value="1" <?php if(isset($_COOKIE['digital_remember_pass'])) echo 'checked'; ?>>
                                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                                        </div>
                                                
                                                        <div class="mt-4">
                                                            <!-- <a href="dashboard.php" class="btn btn-primary w-100">Sign In</a> -->
                                                            <button class="btn btn-primary w-100" id="submit-form" type="submit" name="submmit">Sign In</button>
                                                        </div>                                               
                                                        
                                                    </form>
                                                    
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        
        <!-- JAVASCRIPT -->
        <script src="<?php echo THEMEURL ; ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo THEMEURL ; ?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo THEMEURL ; ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
        <script src="<?php echo THEMEURL ; ?>assets/js/plugins.js"></script>

        <script src="<?php echo THEMEURL ; ?>assets/js/pages/password-addon.init.js"></script>

    </body>

</html>