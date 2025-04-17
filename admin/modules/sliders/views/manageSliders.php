<!-- Begin page -->
<div id="layout-wrapper">
    <div class="main-content">                
        <div class="page-content">
            <div class="card mt-n4 mx-n3 border-0 rounded-0 bg-primary-subtle breadcrumb_bg">
                <div class="card-body pb-0 px-4">
                    <div class="container-fluid">
                        <div class="row justify-content-between align-items-center g-3 mb-5 pb-1 pt-3">
                            <div class="col-lg-4">
                                <h4 class="mb-0">Sliders</h4>
                            </div>
                            <div class="col-lg-2">
                                <a type="button" class="btn btn-primary w-100 addContact-modal" href="<?php echo SITEURL?>sliders/addSlider"  ><i class="bi bi-plus align-middle"></i> Add Slider</a>
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
                                    <table id="alternative-pagination" class="table dataTable table-dynamic filter-footer" style="width:100%">
                                        <thead  class="table-light">
                                            <tr>
                                                <th>Title</th>
                                                <th>Slider Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $this->slidersList = (Array) @$this->slidersList->sliders;
                                              if($this->slidersList != '') {                                               
                                              foreach($this->slidersList as $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo ($value->slider_title != '') ? $value->slider_title : '-'; ?></td>
                                                <td><?php echo ($value->slider_date != '') ? $value->slider_date : '-'; ?></td> 
                                                
                                                <td><span class="badge badge-soft-success"><?php echo ($value->slider_status == '0') ? "Active":"In-Active";;?></span></td>
                                                <td>
                                                    <div class="d-flex align-items-left gap-2 ">    
                                                        <div class="editSliderDetails">
                                                            <a  href="<?php echo SITEURL;?>sliders/editSlider/<?php echo $value->slider_id ?>" class="text-muted px-1 d-block"><i class="bi bi-pencil-fill"></i></a>
                                                        </div>                        
                                                        <div>
                                                            <a href="javascript:void(0)"  data-id="<?php echo $value->slider_id; ?>" class="text-muted px-1 d-block deleteSlider"><i class="bi bi-trash-fill"></i></a>
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

   <!--  <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
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

            </div>
        </div> 
    </div>
 -->
<script type="text/javascript"> 

        $(document).on('click', '.deleteSlider', function() { 
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
                        url:"<?php echo SITEURL; ?>sliders/deleteSlider",
                        data: 'slider_id='+ delId,
                        success: function(data) {
                            document.location.reload();
                        }
                    });
                  }
                }
            });
        });
     

</script>

                

                 