<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="light">

    <head> 

        <meta charset="utf-8" />
        <title>Dextern & Bruno</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="Travel Bunny Offers A Wide Variety Of Travel Related Solutions To Fulfils All Your Travel Requirements. Our Services: Flight Bookings And Domestic - International  Holiday Packages And Visa Services & Forex Exchange." />
        <meta name="keywords" content="travel bunny, travelbunny, travel bunny hyderabad, Kerela Honeymoon, Kashmir Honeymoon, Maldives Honeymoon, Amarnath yatra, Dubai packages" />
        <meta content="" name="Travel Bunny" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo THEMEURL;?>assets/images/favicon.png">


        <!-- Bootstrap Css -->
        <link href="<?php echo THEMEURL;?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo THEMEURL;?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo THEMEURL;?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!-- custom Css-->
        <link href="<?php echo THEMEURL;?>assets/css/custom.css" rel="stylesheet" type="text/css" />

         <link rel="stylesheet" href="<?php echo THEMEURL;?>assets/libs/nouislider/nouislider.min.css">



         <!-- multi.js css -->
        <link rel="stylesheet" type="text/css" href= "<?php echo THEMEURL;?>assets/libs/multi.js/multi.min.css" />
        <!-- autocomplete css -->
        <link rel="stylesheet" href="<?php echo THEMEURL;?>assets/libs/@tarekraafat/autocomplete.js/css/autoComplete.css">
        <!-- jsvectormap css -->
        <link href="<?php echo THEMEURL;?>assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
        <!--Swiper slider css-->
        <link href="<?php echo THEMEURL;?>assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />
        <!-- Layout config Js -->
        <!-- <script src="<?php //echo THEMEURL;?>assets/js/layout.js"></script> -->


         <!-- dropzone css -->
        <link rel="stylesheet" href="<?php echo THEMEURL;?>assets/libs/dropzone/dropzone.css" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css">

        <!-- Jquery Css -->
        <!-- <link rel="stylesheet"  href="<?php //echo THEMEURL;?>assets/jquery-tree/tree.css" type="text/css" /> -->


        <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>

        <!-- JAVASCRIPT -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
                <!-- Summernote -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
        <!-- dropzone min -->
        <script src="<?php echo THEMEURL;?>assets/libs/dropzone/dropzone-min.js"></script>
        
    </head>

    <body>
        <div class="top-tagbar">
            <div class="w-100">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-auto col-9">
                        <div class="text-white-50 fs-13">
                            <i class="bi bi-clock align-middle me-2"></i> <span id="current-time"> <?php echo date('Y-m-d H:i:s')  ?></span>
                        </div>
                    </div>
                    <div class="col-md-auto col-6 d-none d-lg-block">
                        <div class="d-flex align-items-center justify-content-center gap-3 fs-13 text-white-50">
                            <div>
                                <i class="bi bi-envelope align-middle me-2"></i> chandra@travelbunny.in
                            </div>
                            <div>
                                <i class="bi bi-globe align-middle me-2"></i> www.travelbunny.in
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?php echo THEMEURL;?>assets/images/logo-sm.png" alt="" height="40">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo THEMEURL;?>assets/images/favicon.png" alt="" height="60">
                                </span>
                            </a>
                            <a href="index.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?php echo THEMEURL;?>assets/images/logo-sm.png" alt="" height="40">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo THEMEURL;?>assets/images/logo-light.png" alt="" height="40">
                                </span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                        <span class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        </button>
                        <!-- <button type="button" class="btn btn-sm px-3 fs-15 text-reset header-item d-none d-md-block" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <span class="bi bi-search me-2"></span> Search for siri innovations...
                        </button> -->
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle" id="page-header-search-dropdown" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="bi bi-search fs-16"></i>
                            </button>
                        </div>
                        <div class="float-end ms-4 mt-1">                            
                            <a href="<?php echo SITEURL;?>settings"><i class="bi bi-gear text-muted fs-22 align-middle"></i> </a>
                        </div>
                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                <img class="rounded-circle header-profile-user" src="<?php echo THEMEURL;?>assets/images/users/avatar-1.jpg" alt="Header Avatar">
                                <span class="text-start ms-xl-2">
                                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php echo $this->session->gets('user_name'); ?></span>
                                    <span class="d-none d-xl-block ms-1 fs-13 text-reset user-name-sub-text"><?php echo $this->session->gets('user_email'); ?></span>
                                </span>
                            </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#myProfileModal" data-bs-toggle="modal" ><i class="mdi mdi-account-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                                <!-- <a class="dropdown-item" href="<?php //echo SITEURL;?>settings"   ><i class="mdi mdi-content-save-settings-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a> -->
                                <a class="dropdown-item" href="#changePasswordModal" data-bs-toggle="modal" ><i class="mdi mdi-lock-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Change Password</span></a>
                                <a class="dropdown-item" href="<?php echo SITEURL?>login/logout"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </header>

<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded">
            <div class="modal-header p-3">
                <div class="position-relative w-100">
                    <input type="text" class="form-control form-control-lg border-2" placeholder="Search for siri innovations..." autocomplete="off" id="search-options" value="">
                    <span class="bi bi-search search-widget-icon fs-17"></span>
                    <a href="javascript:void(0);" class="search-widget-icon fs-14 link-secondary text-decoration-underline search-widget-icon-close d-none" id="search-close-options">Clear</a>
                </div>
            </div>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 overflow-hidden" id="search-dropdown">
                <div class="dropdown-head rounded-top">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0 fs-14 text-muted fw-semibold"> RECENT SEARCHES </h6>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item bg-transparent text-wrap">
                        <a href="#" class="btn btn-soft-secondary btn-sm btn-rounded">how to setup <i class="mdi mdi-magnify ms-1 align-middle"></i></a>
                        <a href="#" class="btn btn-soft-secondary btn-sm btn-rounded">buttons <i class="mdi mdi-magnify ms-1 align-middle"></i></a>
                    </div>
                </div>
                <div data-simplebar style="max-height: 300px;" class="pe-2 ps-3 my-3">
                    <div class="list-group list-group-flush">
                        <div class="notification-group-list">
                            <h5 class="text-overflow text-muted fs-13 mb-2 mt-3 text-uppercase notification-title">Apps Pages</h5>
                            <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item"><i class="bi bi-speedometer2 me-2"></i> <span>Analytics Dashboard</span></a>
                            <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item"><i class="bi bi-filetype-psd me-2"></i> <span>siri innovations.psd</span></a>
                            <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item"><i class="bi bi-ticket-detailed me-2"></i> <span>Support Tickets</span></a>
                            <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item"><i class="bi bi-file-earmark-zip me-2"></i> <span>siri innovations.zip</span></a>
                        </div>
                        
                        
                        <div class="notification-group-list">
                            <h5 class="text-overflow text-muted fs-13 mb-2 mt-3 text-uppercase notification-title">People</h5>
                            <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo THEMEURL;?>assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-circle flex-shrink-0 me-2" />
                                    <div>
                                        <h6 class="mb-0">Ayaan Bowen</h6>
                                        <span class="fs-13 text-muted">React Developer</span>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo THEMEURL;?>assets/images/users/avatar-7.jpg" alt="" class="avatar-xs rounded-circle flex-shrink-0 me-2" />
                                    <div>
                                        <h6 class="mb-0">Alexander Kristi</h6>
                                        <span class="fs-13 text-muted">React Developer</span>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo THEMEURL;?>assets/images/users/avatar-5.jpg" alt="" class="avatar-xs rounded-circle flex-shrink-0 me-2" />
                                    <div>
                                        <h6 class="mb-0">Alan Carla</h6>
                                        <span class="fs-13 text-muted">React Developer</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- removeNotificationModal -->
<div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
            </div>
            <div class="modal-body p-md-5">
                <div class="text-center">
                    <div class="text-danger">
                        <i class="bi bi-trash display-4"></i>
                    </div>
                    <div class="mt-4 fs-15">
                        <h4 class="mb-1">Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- My Profile Modal  -->
<div class="modal fade" id="myProfileModal" tabindex="-1" aria-labelledby="myProfileModal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header p-4  ">
                <h1 class="modal-title fs-5 fw-bold" id="addContactModalLabel">My Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="addContact-btnClose" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0 p-4">
                <?php  
                $this->profileDetails = $this->getUserDetails(); 
                  ?>
                <form id="" method="post" action="<?php echo SITEURL?>users/updateProfileDetails">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12">
                            <div class="mb-3"> 
                                <label for="firstnameInput" class="form-label">First Name </label>
                                <input type="text" class="form-control" id="firstnameInput" placeholder="Enter your firstname" name="first_name" value="<?php echo $this->profileDetails->users->first_name; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="lastnameInput" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastnameInput" placeholder="Enter your lastname" name="last_name" value="<?php echo $this->profileDetails->users->last_name; ?>">
                            </div>

                              <input type="hidden" class="form-control"  name="edit_user_id" value="<?php echo $this->profileDetails->users->user_id; ?>">

                              <div class="hstack gap-2">
                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="button" class="btn btn-danger" onclick="history.back('-1')">Cancel</button>
                            </div>
                        </div>
                        
                        
                    </div>
                    <!--end row-->
                </form> 
            </div>
        </div>
    </div>
</div>
       
<!-- Change Password Modal  -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h1 class="modal-title fs-5 fw-bold" id="addContactModalLabel">Change Password </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="addContact-btnClose" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0 p-4">
                 
                <form id="changePasswordForm" name="changePasswordForm" method="post" action="<?php echo SITEURL?>users/updatePassword">
                    <div class="row d-flex justify-content-center">
                        <input type="hidden" id="edit_user_id" class="form-control" value="<?php echo $this->session->gets('adminuser_id')?>" name="edit_user_id">
                        <div class="col-md-12">
                            <div class="mb-3"> 
                                <label for="old_password" class="form-label">Old Password <span class="text-danger"> *</span></label>
                                <input type="password" class="form-control mb-3" name="old_password" id="old_password" required >  
                            </div>

                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password <span class="text-danger"> *</span></label>
                                <input type="password" name="new_password mb-3"class="form-control" id="new_password" required >
                            </div>
 
                            <div class="mb-3">
                                <label for="c_password" class="form-label">Confirm Password <span class="text-danger"> *</span></label>
                                <input type="password" class="form-control mb-3" name="c_password" id="c_password"   required />  
                            </div>
 

                              <div class="hstack gap-2">
                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="button" class="btn btn-danger" >Cancel</button>
                            </div>
                        </div>
                        
                        
                    </div>
                    <!--end row-->
                </form> 
            </div>
        </div>
    </div>
</div>
            
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="dashboard.php" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo THEMEURL;?>assets/images/logo-sm.png" alt="" height="40">
            </span>
            <span class="logo-lg">
                <img src="<?php echo THEMEURL;?>assets/images/logo-dark.png" alt="" height="40">
            </span>
        </a>
        <a href="dashboard.php" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo THEMEURL;?>assets/images/logo-sm.png" alt="" height="40">
            </span>
            <span class="logo-lg">
                <img src="<?php echo THEMEURL;?>assets/images/logo-light.png" alt="" height="40">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
        <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
           <!-- <div id="two-column-menu">
                        </div>  -->
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a href="<?php echo SITEURL?>dashboard" class="nav-link menu-link"> <i class="bi bi-speedometer2"></i> <span data-key="t-dashboard">Dashboard</span> </a>
                </li>
                  
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?php echo SITEURL?>sliders">
                        <i class="mdi mdi-view-grid-outline"></i> <span data-key="t-widgets">Sliders</span>
                    </a>
                </li>
                <li class="nav-item <?php if(isset($this->cat_id) && $this->cat_id == base64_encode(1) )echo 'active';?>">
                                <a href="<?php echo SITEURL?>services" class="nav-link" data-key="t-starter"> Services </a>
                            </li>
                
                 <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="ri ri-suitcase-2-line "></i> <span data-key="t-authentication">HomePage</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                              <li class="nav-item">
                    <a href="<?php echo SITEURL?>testimonials" class="nav-link menu-link">  <span data-key="t-dashboard">Home Page Video</span> </a>
                </li>
                            <li class="nav-item <?php if(isset($this->cat_id) && $this->cat_id == base64_encode(2) )echo 'active';?>">
                                <a href="<?php echo SITEURL; ?>services/homeServices/" class="nav-link" data-key="t-starter"> Home Services </a>
                            </li> 
                        </ul>
                    </div>
                </li>

               

                <li class="nav-item">
                    <a href="<?php echo SITEURL?>pages" class="nav-link menu-link"> <i class="mdi mdi-book-open-page-variant-outline"></i> <span data-key="t-dashboard">Pages</span> </a>
                </li>
                
               <li class="nav-item">
                    <a href="<?php echo SITEURL?>jobs" class="nav-link menu-link"> <i class="mdi mdi-book-open-page-variant-outline"></i> <span data-key="t-dashboard">Jobs</span> </a>
                </li>

                 <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="ri ri-suitcase-2-line "></i> <span data-key="t-authentication">Menus</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                              <li class="nav-item">
                    <a href="<?php echo SITEURL?>menus" class="nav-link menu-link"> <i class="mdi mdi-menu"></i> <span data-key="t-dashboard">HeaderMenus</span> </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo SITEURL?>footer_menu    " class="nav-link menu-link"> <i class="mdi mdi-menu"></i> <span data-key="t-dashboard">Footer Menus</span> </a>
                </li>
                            
                        </ul>
                    </div>
                </li>
                

                

            
                
               

            
                
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="mdi mdi-account-multiple-outline"></i> <span data-key="t-authentication">User Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo SITEURL?>users" class="nav-link" data-key="t-starter"> Users </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo SITEURL?>roles" class="nav-link" data-key="t-starter"> Roles </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="<?php //echo SITEURL?>customers" class="nav-link" data-key="t-starter"> Customers </a>
                            </li> -->
                        </ul>
                    </div>
                </li>
            
                 
            
            </ul>
        </div>
    <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>
<script type="text/javascript"> 
    // <![CDATA[
    $(document).ready(function () {
        var ajaxLoading = false;
        $('#myProfileForm').validate({
            rules: {
                first_name : {
                    required: true,
                     letterswithspace: true
                },
                last_name : {
                    required : true, 
                    letterswithspace : true,
                },
                 
            },
            messages: {
                first_name : {
                    required: "Please enter First Name", 
                },
                last_name : {
                    required : "Please enter Last Name", 
                } 
            }
        });  
        jQuery.validator.addMethod("letterswithspace", function(value, element) {
            return this.optional(element) || /^[a-z][a-z\s]*$/i.test(value);
        }, "Name should not allow special characters");

         $('#changePasswordForm').validate({
        rules: {
            old_password : {
                required: true,
                remote: {
                    url: '<?php echo SITEURL; ?>users/checkUserPassword',
                    type: "post",
                    data: {
                        old_password: function() {
                            return $("#old_password").val();
                        },
                    }
                }, 
            },
            new_password : {
                required : true,
                maxlength : 32,
                minlength : 6,
                notEqualTo : '#old_password'
            },
            c_password : {
                required : true,
                equalTo : '#new_password',
            }
        },
        messages: {
            old_password : {
                required: "Please enter Old Password",
                remote : "Incorrect Password"
            },
            new_password : {
                required : "Please enter New Password",
                minlength : "New password should be atleast 6 characters",
                notEqualTo : "New Password and old password cant be same"
            },
            c_password : {
                required: "Please enter Confirm Password",
                equalTo : " New Password & Confirm Password Should be Same"
            }
        }
    }); 
    jQuery.validator.addMethod("notEqualTo", function(value, element, param) {
        return this.optional(element) || value != $(param).val();
    }, "This has to be different…");

    }); 

</script>