<!-- Begin page -->
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
                            <div class="col-lg-2">
                                <a type="button" class="btn btn-primary w-100 addContact-modal" href="<?php echo SITEURL?>users/addUser"  ><i class="bi bi-plus align-middle"></i> Add User</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid"> 
            <div class="row mt-n5">               
                 
                <div class="col-lg-12">
                    <div class="card">
                        <div class="row">
                            <?php if($this->session->gets('success_msg')) { ?>
                                <div class="mb-3" id="successMessage" > 
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
                        <div class="card-body ">
                            <div class="card">
                      
                                <div class="card-body">
                                     <div class="table-responsive">
                                    <table id="alternative-pagination" class="table dataTable table-dynamic filter-footer" style="width:100%">
                                        <thead  class="table-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $this->usersList = (Array) $this->usersList->users;
                                              if($this->usersList != '') {                                               
                                              foreach($this->usersList as $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value->first_name.' '.$value->last_name;?></td>
                                                <td><?php echo $value->user_email;?></td>
                                                <td><?php echo $value->role_name;?></td>
                                                
                                                
                                                <td><span class="badge badge-soft-success"><?php echo ($value->user_status == '0') ? "Active":"In-Active";;?></span></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2 justify-content-center">    
                                                        <div class="editUserDetails">
                                                            <a  href="<?php echo SITEURL;?>users/editUser/<?php echo $value->user_id ?>" class="text-muted px-1 d-block"><i class="bi bi-pencil-fill"></i></a>
                                                        </div>                        
                                                        <div>
                                                            <a href="javascript:void(0)"  data-id="<?php echo $value->user_id; ?>" class="text-muted px-1 d-block deleteUser"><i class="bi bi-trash-fill"></i></a>
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

      

<script type="text/javascript"> 

        $(document).on('click', '.deleteUser', function() { 
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
                        url:"<?php echo SITEURL; ?>users/deleteUser",
                        // data: 'deletId='+ delId,
                        data :{ deletId: delId },
                        success: function(data) {
                            // document.location.reload();
                        }
                    });
                  }
                }
            });
        });
     

</script>

                

                 