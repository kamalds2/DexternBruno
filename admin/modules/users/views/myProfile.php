 <!-- Begin page -->
        <div id="layout-wrapper">             
            <div class="main-content">
                
                <div class="page-content">
                    <div class="card mt-n4 mx-n3 border-0 rounded-0 bg-primary-subtle breadcrumb_bg">
                        <div class="card-body pb-0 px-4">
                            <div class="container-fluid">
                                <div class="row justify-content-between align-items-center g-3 mb-5 pb-1 pt-3">
                                    <div class="col-lg-4">
                                        <h4 class="mb-0">Profile</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                <div class="container-fluid">
                    <div class="row mt-n5"> 
                        <div class="col-xxl-12">
                            <div class="card">
                                <div class="card-body  py-5">
                                    <div class="row">
                                        <?php if($this->session->gets('success_msg')) { ?>
                                            <div class="mb-3" id="successMessage"> 
                                                <div class="alert alert-success text-center" role="alert">
                                                <strong><?php echo $this->session->gets('success_msg'); ?>! </strong>  
                                                <?php unset($_SESSION['success_msg']); ?>
                                            </div>
                          
                                        <?php  } ?>
                                        <?php if($this->session->gets('error_msg')) { ?>
                                            <div class="mb-3"> 
                                                <div class="alert alert-danger mb-xl-0 text-center" role="alert">
                                                    <strong> <?php echo $this->session->gets('success_msg'); ?>! </strong>  —check it out! <?php unset($_SESSION['error_msg']); ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="tab-content">
                                        <form id="" method="post" action="<?php echo SITEURL?>users/updateProfileDetails">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-md-4">
                                                    <div class="mb-3"> 
                                                        <label for="firstnameInput" class="form-label">First Name</label>
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
                        <!--end col-->
                    </div>
                    <!--end row-->

                </div>
                <!-- container-fluid -->
            </div>
               
 