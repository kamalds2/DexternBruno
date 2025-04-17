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
                              <a type="button" class="btn btn-primary w-100 addContact-modal" href="<?php echo SITEURL?>roles/addRole"  ><i class="bi bi-plus align-middle"></i> Add Role</a>
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
                    <div class="card-body">
                        <div class="card">                      
                            <div class="card-body">
                              <div class="table-responsive">
                                <table id="alternative-pagination" class="table dataTable table-dynamic filter-footer" style="width:100%">
                                  <thead class="table-light">
                                    <tr>
                                      <th>Module Name</th>
                                      <th>Access</th> 
                                      <th>Add</th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                      <th>Status</th>
                                    </tr>
                                  </thead>
                                    <tbody>
                                        <?php  
                                          if(!empty($this->modulesList)) {                  
                                            $access_v = explode(',', @$this->privilegesList->priviliges->access_m); 
                                            $add_v = explode(',', @$this->privilegesList->priviliges->add_m); 
                                            $edit_v = explode(',', @$this->privilegesList->priviliges->edit_m); 
                                            $delete_v = explode(',', @$this->privilegesList->priviliges->delete_m); 
                                            $status_v = explode(',', @$this->privilegesList->priviliges->status_m); 
                                            $i=0;
                                            foreach ($this->modulesList[0] as $key => $value) {                      
                                        ?>
                                        <tr>
                                          <td><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>">
                                          <strong class="text-primary">
                                            <?php if(isset($this->modulesList[$value->module_id])) { ?>
                                            <i class="icon-plus text-primary"></i>
                                            <?php } 
                                            echo $value->module_name;?></strong>
                                          </a></td>
                                          <td id='access_status<?php echo $i;?>'>
                                              <?php if(in_array($value->module_id, $access_v)){ ?>
                                                  <a onclick="saveAccessPages('access_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value->module_id; ?>','n', 'access')"> <i class="bi bi-check"></i> </a>

                                              <?php }else {  ?>
                                                  <a onclick="saveAccessPages('access_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value->module_id; ?>','y', 'access')"> <i class="bi bi-x text-danger"></i> </a>
                                              <?php } ?>
                                          </td>
                                            
                                          <td id='add_status<?php echo $i;?>'>
                                              <?php if(in_array($value->module_id, $add_v)){ ?>
                                                  <a onclick="saveAccessPages('add_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value->module_id; ?>','n', 'add')"> <i class="bi bi-check"></i> </a>
                                              <?php }else { ?>
                                                  <a onclick="saveAccessPages('add_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value->module_id; ?>','y', 'add')"> <i class="bi bi-x text-danger"></i> </a>
                                              <?php } ?>
                                          </td>
                                          <td id='edit_status<?php echo $i;?>'>
                                              <?php if(in_array($value->module_id, $edit_v)){ ?>
                                                  <a onclick="saveAccessPages('edit_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value->module_id; ?>','n', 'edit')"> <i class="bi bi-check"></i> </a>
                                              <?php }else { ?>
                                                  <a onclick="saveAccessPages('edit_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value->module_id; ?>','y', 'edit')"> <i class="bi bi-x text-danger"></i> </a>
                                              <?php } ?>
                                          </td>
                                          <td id='delete_status<?php echo $i;?>'>
                                              <?php if(in_array($value->module_id, $delete_v)){ ?>
                                                  <a onclick="saveAccessPages('delete_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value->module_id; ?>','n', 'delete')"> <i class="bi bi-check"></i> </a>
                                              <?php }else { ?>
                                                  <a onclick="saveAccessPages('delete_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value->module_id; ?>','y', 'delete')"> <i class="bi bi-x text-danger"></i> </a>
                                              <?php } ?>
                                          </td>
                                          <td id='status_status<?php echo $i;?>'>
                                              <?php if(in_array($value->module_id, $status_v)){ ?>
                                                  <a onclick="saveAccessPages('status_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value->module_id; ?>','n', 'status')"> <i class="bi bi-check"></i> </a>
                                              <?php }else { ?>
                                                  <a onclick="saveAccessPages('status_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value->module_id; ?>','y', 'status')"> <i class="bi bi-x text-danger"></i> </a>
                                              <?php } ?>
                                          </td>
                                        </tr>
                                        <?php if(isset($this->modulesList[$value->module_id])) {
                                            $i++; ?>
                                            <tr>
                                                <td colspan="6" class="p-0"><div id="collapse<?php echo $key; ?>" class="panel-collapse collapse">
                                                  <table class="table">
                                                    <tbody>
                                                      <?php foreach ($this->modulesList[$value->module_id] as $key2 => $value2) { ?>
                                                            <tr>
                                                                <td style="width:25%" class="p-l-30"><i class="fa fa-angle-double-right"></i><?php echo $value2->module_name; ?></td>
                                                                <td id='access_status<?php echo $i;?>' style="width:15%">
                                                                    <?php if(in_array($value2->module_id, $access_v)){ ?>
                                                                        <a onclick="saveAccessPages('access_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value2->module_id; ?>','n', 'access')"> <i class="bi bi-check"></i> </a>
                                                                    <?php }else { ?>
                                                                        <a onclick="saveAccessPages('access_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value2->module_id; ?>','y', 'access')"> <i class="bi bi-x text-danger"></i> </a>
                                                                    <?php } ?>
                                                                </td>
                                                                <td id='add_status<?php echo $i;?>' style="width:15%">
                                                                    <?php if(in_array($value2->module_id, $add_v)){ ?>
                                                                        <a onclick="saveAccessPages('add_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value2->module_id; ?>','n', 'add')"> <i class="bi bi-check"></i> </a>
                                                                    <?php }else { ?>
                                                                        <a onclick="saveAccessPages('add_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value2->module_id; ?>','y', 'add')"> <i class="bi bi-x text-danger"></i> </a>
                                                                    <?php } ?>
                                                                </td>
                                                                <td id='edit_status<?php echo $i;?>' style="width:15%">
                                                                    <?php if(in_array($value2->module_id, $edit_v)){ ?>
                                                                        <a onclick="saveAccessPages('edit_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value2->module_id; ?>','n', 'edit')"> <i class="bi bi-check"></i> </a>
                                                                    <?php }else { ?>
                                                                        <a onclick="saveAccessPages('edit_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value2->module_id; ?>','y', 'edit')"> <i class="bi bi-x text-danger"></i> </a>
                                                                    <?php } ?>
                                                                </td>
                                                                <td id='delete_status<?php echo $i;?>' style="width:15%">
                                                                    <?php if(in_array($value2->module_id, $delete_v)){ ?>
                                                                        <a onclick="saveAccessPages('delete_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value2->module_id; ?>','n', 'delete')"> <i class="bi bi-check"></i> </a>
                                                                    <?php }else { ?>
                                                                        <a onclick="saveAccessPages('delete_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value2->module_id; ?>','y', 'delete')"> <i class="bi bi-x text-danger"></i> </a>
                                                                    <?php } ?>
                                                                </td>
                                                                <td id='status_status<?php echo $i;?>' style="width:15%">
                                                                    <?php if(in_array($value2->module_id, $status_v)){ ?>
                                                                        <a onclick="saveAccessPages('status_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value2->module_id; ?>','n', 'status')"> <i class="bi bi-check"></i> </a>
                                                                    <?php }else { ?>
                                                                        <a onclick="saveAccessPages('status_status<?php echo $i;?>', '<?php echo $this->role_id;?>', '<?php echo $value2->module_id; ?>','y', 'status')"> <i class="bi bi-x text-danger"></i> </a>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr> 
                                                      <?php    $i++; }?>                                                      
                                                    </tbody>
                                                  </table>
                                                </td>
                                            </tr>
                                        <?php } $i++;   }}?>     
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
    function saveAccessPages(id, role_id, module_id, status, access) {   
        var p_url= "<?php echo SITEURL; ?>roles/accessPages";
        var ajaxLoading = false;
        if(!ajaxLoading) {
            var ajaxLoading = true;
            jQuery.ajax({
                type: "POST",             
                url: p_url, 
                dataType: 'json',
                data: 'role_id='+role_id+'&module_id='+module_id+'&status='+status+'&privilege_name='+access,
                success: function(data) {
                    if(data == 1){
                        $('#'+id).html('<a  onclick="saveAccessPages(\''+id+'\', \''+role_id+'\', \''+module_id+'\', \'n\', \''+access+'\')"><i class="fa fa-check"></i></a>');
                    } else {
                        $('#'+id).html('<a  onclick="saveAccessPages(\''+id+'\', \''+role_id+'\', \''+module_id+'\', \'y\', \''+access+'\')"><i class="bi bi-x text-danger"></i></a>');
                    }
                    ajaxLoading = false;
                    document.location.reload();
                }
            }); 
        }
    }

$(document).ready(function () { 

  var ajaxLoading = false;
  $(".delete").click(function(){
      if(confirm("Are You Sure Delete!")){
          var delId = $(this).attr('id');
          jQuery.ajax({
              type: "POST",             
              url: "<?php echo SITEURL; ?>roles/deleteRole",
              data: "delId="+delId,
              success: function(data) {      
                  document.location.reload();
              }
          });     
      } 
      else {
          return false;
      }
  });  
  $('#addRoleForm').validate({
    rules: {
      role_name : "required"
    },
    messages: {
      role_name : "Please enter Role Name"
    },
    submitHandler: function(form) { 
    jQuery.ajax({
      type: "POST",             
      url: "<?php echo SITEURL; ?>roles/addRole",
      data: $("#addRoleForm").serialize(),
      success: function(data) {      
        document.location.reload();
      }
    });   
    }
  });  

  $(".link-btn").click(function(){
    $('#role_name').val($(this).data('value'));
    $('#role_id').val($(this).data('id'));
  });     

$('#editRoleForm').validate({
  rules: {
    role_name : "required"
  },
  messages: {
    role_name : "Please enter Role Name"
  },
  submitHandler: function(form) { 
  jQuery.ajax({
    type: "POST",             
    url: "<?php echo SITEURL; ?>roles/editRole",
    data: $("#editRoleForm").serialize(),
    success: function(data) {      
      document.location.reload();
    }
  });   
  }
});   

});
</script>   
   