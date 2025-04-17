<div id="layout-wrapper">
    <div class="main-content">  
        <div class="page-content">
            <div class="card mt-n4 mx-n3 border-0 rounded-0 bg-primary-subtle breadcrumb_bg">
                <div class="card-body pb-0 px-4">
                    <div class="container-fluid">
                        <div class="row justify-content-between align-items-center g-3 mb-5 pb-1 pt-3">
                            <div class="col-lg-4">
                                <h4 class="mb-0">Change Password</h4>
                            </div>                            
                    </div>
                </div>
            </div>
        </div> 
        <div class="container-fluid"> 
            <div class="row mt-n5"> 
                <div class="card py-5">   
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
                    <form id="changePasswordForm" name="changePasswordForm" class="needs-validation p-2"   method="post" action="<?php echo SITEURL?>users/updatePassword">
                        <input type="hidden" id="edit_user_id" class="form-control" value="<?php echo $this->session->gets('adminuser_id')?>" name="edit_user_id">
                         
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-4 mb-3">
                                <label for="old_password" class="form-label">Old Password</label>
                                <input type="password" class="form-control mb-3" name="old_password" id="old_password" required >   

                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" name="new_password mb-3"class="form-control" id="new_password" required >     

                                <label for="c_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control mb-3" name="c_password" id="c_password"   required />     

                                <button type="submit" class="btn btn-success">Update</button>
                                <a type="submit" class="btn btn-danger" onclick="history.back()">Cancel</a>                      
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript"> 
// <![CDATA[
$(document).ready(function () {
    var ajaxLoading = false;
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
                equalTo : "Please enter New Password once again"
            }
        }
    }); 
    jQuery.validator.addMethod("notEqualTo", function(value, element, param) {
        return this.optional(element) || value != $(param).val();
    }, "This has to be different…");
}); 


</script>