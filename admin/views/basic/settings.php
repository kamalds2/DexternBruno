 <!-- Begin page -->
        <div id="layout-wrapper">             
            <div class="main-content">
                
                <div class="page-content">
                    <div class="card mt-n4 mx-n3 border-0 rounded-0 bg-primary-subtle breadcrumb_bg">
                        <div class="card-body pb-0 px-4">
                            <div class="container-fluid">
                                <div class="row justify-content-between align-items-center g-3 mb-5 pb-1 pt-3">
                                    <div class="col-lg-4">
                                        <h4 class="mb-0">Settings</h4>
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
                                        <div class="panel">

                                            <form id="" method="post" action="<?php echo SITEURL?>settings/updateSettingsDetails" enctype="multipart/form-data">
                                                <div class="d-flex flex-column gap-3">
                                                    <div class="row">
                                                        <div class="alert alert-light text-body rounded-0">
                                                        <h4 class="text-center"> Header Section </h4>
                                                    </div>
                                                        
                                                        <div class="col-md-6 mb-3"> 
                                                            <div style="height: 90px; display: block;">
                                                                <?php if($this->settings->res->logo !='') {?>

                                                                <img src="<?php echo FRONTUPLOADURL.'settings/'.$this->settings->res->logo; ?>" style="width:300px;" alt="<?php echo $this->settings->res->logo;?>">             
                                                                <input type="hidden" class="form-control"  name="logo_old" value="<?php echo  $this->settings->res->logo; ?>" >
                                                                <?php } ?>
                                                            </div>                                
                                                            <label for="image" class="form-label"> Upload Logo</label>                                                            
                                                            <input type="file" class="form-control" id="logo_image" name="logo">
                                                        </div>
                                                        <div class="col-md-6 mb-3"> 
                                                            <div style="height: 90px; display: block;" class="d-flex align-items-center">
                                                                <?php if($this->settings->res->fav_icon !='') {?>

                                                                <img src="<?php echo FRONTUPLOADURL.'settings/'.$this->settings->res->fav_icon; ?>"  >             
                                                                <input type="hidden" class="form-control"  name="fav_icon_old" value="<?php echo  $this->settings->res->fav_icon; ?>" >
                                                            <?php } ?>
                                                            </div>                                
                                                            <label for="image" class="form-label"> Upload Fav Icon</label>
                                                            
                                                            <input type="file" class="form-control" id="fav_icon_image" name="fav_icon">
                                                        </div>
                                                        <div class="col-lg-6 mb-3">
                                                            <label for="email" class="form-label">Email  </label>
                                                            <input type="text" class="form-control" name="email" id="email"  value="<?php echo $this->settings->res->email?>" />
                                                        </div>
                                                        <div class="col-lg-6 mb-3">
                                                            <label for="toll_free_no" class="form-label"> Toll Free Number </label>
                                                            <input type="text" class="form-control" name="toll_free_no" id="toll_free_no"  value="<?php echo $this->settings->res->toll_free_no?>" />                                
                                                        </div>
                                                        <!-- <div class="col-lg-4 mb-3">
                                                            <label for="mobile_no" class="form-label">Mobile Number  </label>
                                                            <input type="text" class="form-control" name="mobile_no" id="mobile_no"  value="<?php //echo $this->settings->res->mobile_no?>" />                                
                                                        </div> -->
                                                        <div class="col-lg-12 mb-3">
                                                            <label for="address" class="form-label">Address   </label>
                                                            <textarea class="form-control" name="address" id="address" rows="4"><?php echo $this->settings->res->address?></textarea>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-lg-4 mb-3">
                                                            <label for="facebook_link" class="form-label">Facebook Link   </label>
                                                            <input type="text" class="form-control" name="facebook_link" id="facebook_link"  value="<?php echo $this->settings->res->facebook_link?>" />                                
                                                        </div>
                                                        <div class="col-lg-4 mb-3">
                                                            <label for="instagram_link" class="form-label"> Instagram Link  </label>
                                                            <input type="text" class="form-control" name="instagram_link" id="instagram_link"  value="<?php echo $this->settings->res->instagram_link?>" />                                
                                                        </div>
                                                        <div class="col-lg-4 mb-3">
                                                            <label for="" class="form-label">Youtube Link </label>
                                                            <input type="text" class="form-control" name="youtube_link" id="youtube_link"  value="<?php echo $this->settings->res->youtube_link?>" />                                
                                                        </div>
                                                        <div class="col-lg-4 mb-3">
                                                            <label for="" class="form-label">Twitter Link </label>
                                                            <input type="text" class="form-control" name="twitter_link" id="twitter_link"  value="<?php echo $this->settings->res->twitter_link?>" />                                
                                                        </div>
                                                        <div class="col-lg-4 mb-3">
                                                            <label for="" class="form-label">Pinterest Link </label>
                                                            <input type="text" class="form-control" name="pininterest_link" id="pininterest_link"  value="<?php echo $this->settings->res->pininterest_link?>" />                                
                                                        </div>
                                                        <div class="col-lg-4 mb-3">
                                                            <label for="business_timings" class="form-label"> Business Timings  </label>
                                                            <input type="text" class="form-control" name="business_timings" id="business_timings" value="<?php echo $this->settings->res->business_timings?>"  />                                
                                                        </div>     
                                                    </div>
                                                    <div class="row">
                                                        <div class="alert alert-light text-body rounded-0">
                                                            <h4 class="text-center"> Footer Section </h4>
                                                        </div>
                                                    
                                                             
                                                        <div class="col-lg-6 mb-3">
                                                            <label for="contact_nos" class="form-label">Contact  Numbers  </label>
                                                            <input type="text" class="form-control" name="contact_nos" id="contact_nos"  value="<?php echo $this->settings->res->contact_nos?>" />                                
                                                        </div>
                                                        <div class="col-lg-6 mb-3">
                                                            <label for="footer_address" class="form-label"> Footer Address   </label>
                                                            <textarea class="form-control" name="footer_address" id="footer_address"><?php echo $this->settings->res->footer_address?></textarea>
                                                        </div>
                                                         
                                                         <div class="col-md-6 mb-3"> 
                                                            <div style="height: 90px; display: block;">
                                                                <?php if($this->settings->res->footer_logo !='') {?>

                                                                <img src="<?php echo FRONTUPLOADURL.'settings/'.$this->settings->res->footer_logo; ?>" style="width:300px;">             
                                                                <input type="hidden" class="form-control"  name="footer_logo_old" value="<?php echo  $this->settings->res->footer_logo; ?>" >
                                                                <?php } ?>
                                                            </div>                                
                                                            <label for="image" class="form-label"> Upload Footer Logo</label>                                                            
                                                            <input type="file" class="form-control" id="footer_logo_image" name="footer_logo">
                                                        </div>   
                                                        
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <input type="hidden" class="form-control"  name="settings_id" value="<?php echo  $this->settings->res->settings_id; ?>" >
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                    <button type="button" class="btn btn-danger" onclick="history.back('-1');">Cancel</button>
                                                </div> 
                                            </form> 
                                        </div>
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
               
 