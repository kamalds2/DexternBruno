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
            
                    <form id="addRoleForm"  role="form" class="needs-validation p-2" method="post" action="<?php echo SITEURL?>roles/createRole">
                        
                        <div class="d-flex flex-column gap-3">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="role_name" class="form-label">Role Name</label>
                                    <input type="text" class="form-control" name="role_name" id="add_role_name" required />                                
                                </div> 
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Add</button>
                                <a type="button" class="btn btn-danger" onclick="history.back()" >Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
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
    });  

</script>