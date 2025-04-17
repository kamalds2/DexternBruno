<div id="layout-wrapper">
    <div class="main-content">  
        <div class="page-content">
            <div class="card mt-n4 mx-n3 border-0 rounded-0 bg-primary-subtle breadcrumb_bg">
                <div class="card-body pb-0 px-4">
                    <div class="container-fluid">
                        <div class="row justify-content-between align-items-center g-3 mb-5 pb-1 pt-3">
                            <div class="col-lg-4">
                                <h4 class="mb-0">Pages</h4>
                            </div>                            
                    </div>
                </div>
            </div>
        </div> 
        <div class="container-fluid"> 
            <div class="row mt-n5"> 
                <div class="card">   
            
                    <form id="editUserForm"  name="editUserForm" autocomplete="off" class="needs-validation p-2" novalidate method="post" action="<?php echo SITEURL?>users/updateUser">
                        <input type="hidden" id="edit_user_id" class="form-control" value="<?php echo $this->users->user_id?>" name="edit_user_id">
                         
                        <div class="d-flex flex-column gap-3">
                            <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="edit_page_title" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="edit_first_name" required value="<?php echo $this->users->first_name?>"/>                                
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="edit_page_description" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="edit_last_name" value="<?php echo $this->users->last_name?>" required >                                
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="meta_title" class="form-label">Email</label>
                                <input type="email" class="form-control" name="user_email" id="edit_user_email" value="<?php echo $this->users->user_email?>" required />
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="label" class="form-label">Role</label>
                                <select class="form-select" id="label" name="role_id" required>
                                    <?php
                                        $this->rolesList = (Array) $this->rolesList;
                                            if($this->rolesList != '') {
                                            foreach($this->rolesList as $value) {
                                    ?>
                                        <option value="<?php echo $value->role_id;?>" <?php if($this->users->role_id == $value->role_id) echo 'selected'  ?> ><?php echo $value->role_name;?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="label" class="form-label">Status</label>
                                <select class="form-select" id="label" name="user_status" required>
                                    <option value="0" <?php if($this->users->user_status == '0') echo 'selected'  ?> >Active</option>
                                    <option value="1" <?php if($this->users->user_status == '1') echo 'selected'  ?>>InActive</option>
                                </select>
                            </div>
                        </div>
                            <div class="text-end">
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
        $('#editUserForm').validate({
            rules: {
                
                user_email : {
                    required : true, 
                    email : true,
                    emailwithoutspecialchars : true,
                    remote : {
                        url : '<?php echo SITEURL; ?>users/checkEditEmail',
                        type: "post",
                        data: {
                            email: function() {
                                return $( "#edit_user_email" ).val();
                            },
                            edit_user_id:function() {
                                return $( "#edit_user_id" ).val();
                            }
                        },
                    }, 
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
                }   
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