<!-- Begin page -->
<div id="layout-wrapper">
    <div class="main-content">                
        <div class="page-content">
            <div class="card mt-n4 mx-n3 border-0 rounded-0 bg-primary-subtle breadcrumb_bg">
                <div class="card-body pb-0 px-4">
                    <div class="container-fluid">
                        <div class="row justify-content-between align-items-center g-3 mb-5 pb-1 pt-3">
                            <div class="col-lg-4">
                                <h4 class="mb-0">Roles</h4>
                            </div>
                            <div class="col-lg-2">
                                <a type="button" class="btn btn-primary " href="#addRoleModal" data-bs-toggle="modal" class="text-muted px-1 d-block addRoleDetails"  ><i class="bi bi-plus align-middle"></i> Add Role</a> 
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid"> 
            <div class="row mt-n5">               
                 
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card">
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
                                <div class="card-body">
                                     <div class="table-responsive">
                                    <table id="alternative-pagination" class="table dataTable table-dynamic filter-footer"  style="width:100%">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Previliges</th> 
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $this->rolesList = (Array) $this->rolesList->roles;
                                              if($this->rolesList != '') {                                               
                                              foreach($this->rolesList as $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value->role_name;?></td> 
                                                <td> <a href="<?php echo SITEURL;?>roles/privileges/<?php echo $value->role_id?>"><i class="bi bi-lock"></i> </a></td> 
                                                
                                                
                                                <td><span class="badge badge-soft-success"><?php echo ($value->role_status == '0') ? "Active":"In-Active";;?></span></td>
                                                <td>
                                                    <div class="d-flex align-items-left gap-2">    
                                                         
                                                        <div>
                                                            <a href="#editRoleModal" data-bs-toggle="modal" class="text-muted px-1 d-block editRoleDetails"   data-id="<?php echo $value->role_id;?>" data-value="<?php echo $value->role_name;?>" ><i class="bi bi-pencil-fill"></i></a>
                                                        </div>                       
                                                        <div>
                                                            <a href="javascript:void(0)"  data-id="<?php echo $value->role_id; ?>" class="text-muted px-1 d-block deleteRole"><i class="bi bi-trash-fill"></i></a>
                                                        </div>                      
                                                    </div>
                                                </td>
                                            </tr>

                                            <?php  }  }   ?>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>                 
            </div>       <!--end row-->
        </div>
    </div>


    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header p-4 pb-0 m-2">
                    <h1 class="modal-title fs-5 fw-bold" id="addContactModalLabel">Add Role</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="addContact-btnClose" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0 p-4">
                    <form id="addRoleForm" autocomplete="off" class="needs-validation p-2" method="post" action="<?php echo SITEURL?>roles/addRoleDetails" >
                        <input type="hidden" id="edit_role_id" class="form-control" name="role_id">
                        
                        <div class="d-flex flex-column gap-3">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="role_name" class="form-label">Role Name<span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" name="role_name" id="role_name" required />                                
                                </div> 
                            </div>
                        </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Add</button>
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
      
    <div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="editRoleModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header p-4 pb-0 m-2">
                    <h1 class="modal-title fs-5 fw-bold" id="addContactModalLabel">Edit Role</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="addContact-btnClose" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0 p-4">
                    <form id="editRoleForm" autocomplete="off" class="needs-validation p-2" method="post" action="<?php echo SITEURL?>roles/updateRole" >
                        <input type="hidden" id="edit_role_id" class="form-control" name="role_id">
                        
                        <div class="d-flex flex-column gap-3">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="role_name" class="form-label">Role Name</label>
                                    <input type="text" class="form-control" name="role_name" id="edit_role_name" required />                                
                                </div> 
                            </div>
                        </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
      

<script type="text/javascript"> 
    $(document).ready(function () { 
        $('#addRoleForm').validate({
            ignore : '',
            rules: {
                role_name : {
                    required: true,
                    letterswithspace : true,
                    maxlength : 30,
                    remote : {
                        url : '<?php echo SITEURL; ?>roles/checkRoleName',
                        type: "post",
                        data: {
                            role_name: function() {
                                return $( "#add_role_name" ).val();
                            },
                        },
                    }, 
                },
            },
            messages: {
                role_name : {
                    required : "Please enter Role Name",
                    letterswithspace : "Please enter alphabets only",
                    maxlength : " Should not exceed 30 characters",
                    remote : "Role name is already exists"
                } 
            },
            
        }); 

        jQuery.validator.addMethod("letterswithspace", function(value, element) {
            return this.optional(element) || /^[a-z][a-z\s]*$/i.test(value);
        }, "Name should not allow special characters");
    });  
    
    $(document).on('click', '.deleteRole', function() { 
        var delId = $(this).data('id'); 
        bootbox.confirm({
        title: "<strong>Confirmation</strong> Box",
            message: "Are you sure, you want to delete?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
              if(result) {            
                jQuery.ajax({
                    type: "POST",             
                    url:"<?php echo SITEURL; ?>roles/deleteRole",
                    data: 'deletId='+ delId,
                    success: function(data) {
                        document.location.reload();
                    }
                });
              }
            }
        });
    });

    $(document).on('click', '.editRoleDetails', function() { 
         
        $('#edit_role_name').val($(this).data('value'));
        $('#edit_role_id').val($(this).data('id'));
    });


     

</script>

                

                 