<div id="layout-wrapper">
    <div class="main-content">  
        <div class="page-content">
            <div class="card mt-n4 mx-n3 border-0 rounded-0 bg-primary-subtle breadcrumb_bg">
                <div class="card-body pb-0 px-4">
                    <div class="container-fluid">
                        <div class="row justify-content-between align-items-center g-3 mb-5 pb-1 pt-3">
                            <div class="col-lg-4">
                                <h4 class="mb-0">Users</h4>
                            </div>                            
                    </div>
                </div>
            </div>
        </div> 
        <div class="container-fluid"> 
            <div class="row mt-n5"> 
                <div class="card"> 
            
                    <form id="addUserForm" autocomplete="off" class="needs-validation p-2" novalidate method="post" action="<?php echo SITEURL?>users/createUser">
                        
                        <div class="d-flex flex-column gap-3">
                            <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="edit_page_title" class="form-label">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="first_name" id="first_name" required />                                
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="edit_page_description" class="form-label">Last Name <span class="text-danger">*</span></label>
                                <input class="form-control" name="last_name" id="last_name" value="" required >                                 
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="user_email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="user_email" id="user_email"   required />
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="user_password" class="form-label">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="user_password" id="user_password"   required />
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="role_id" class="form-label">Role <span class="text-danger">*</span></label>
                                <select class="form-select" id="role_id" name="role_id" required>
                                    <option value=""> Select Role</option>
                                    <?php
                                        $this->rolesList = (Array) $this->rolesList;
                                            if($this->rolesList != '') {
                                            foreach($this->rolesList as $value) {
                                    ?>
                                        <option value="<?php echo $value->role_id;?>"  ><?php echo $value->role_name;?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="user_status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select" id="user_status" name="user_status" required>
                                    <option value=""   >Select Status</option>
                                    <option value="0"   >Active</option>
                                    <option value="1"  >InActive</option>
                                </select>
                            </div>
                        </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Add</button>
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
        $('#addUserForm').validate({
            rules: {
                first_name : {
                    required: true,
                     letterswithspace: true
                },
                last_name : {
                    required : true, 
                    letterswithspace : true,
                }, 
                user_email : {
                    required : true, 
                    email : true,
                    emailwithoutspecialchars : true,
                    remote : {
                        url : '<?php echo SITEURL; ?>users/checkEmail',
                        type: "post",
                        data: {
                            email: function() {
                                return $( "#user_email" ).val();
                            },
                        },
                    }, 
                }, 
                user_password : {
                    required : true, 
                    minlength : 6,
                    maxlength : 12
                },
                role_id : "required",
                user_status : "required"
                 
            },
            messages: {
                first_name : {
                    required: "Please enter First Name", 
                },
                last_name : {
                    required : "Please enter Last Name", 
                } ,
                user_email : {
                    required : "Please enter Email", 
                    email : "Please enter Valid Email",
                    emailwithoutspecialchars : " email address Should Not Allow Special Characters",
                    remote : "Email Already  exists"
                } ,
                user_password : {
                    required : "Please enter Password", 
                    minlength : "Password Should be atleast 6 characters",
                    maxlength : "Password Should not exceed 12 characters",
                } ,
                role_id : "Please Select Role",
                user_status : "Please Select Status"
            }
        });  
        jQuery.validator.addMethod("letterswithspace", function(value, element) {
            return this.optional(element) || /^[a-z][a-z\s]*$/i.test(value);
        }, "Name should not allow special characters");

        jQuery.validator.addMethod("emailwithoutspecialchars", function(value, element) {
            return this.optional(element) || /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(value);
        }, "Please enter a valid email address without special characters except '@'");

    }); 

</script>