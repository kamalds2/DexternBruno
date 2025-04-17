<!-- Begin page -->
<div id="layout-wrapper">
    <div class="main-content">                
        <div class="page-content">
            <div class="card mt-n4 mx-n3 border-0 rounded-0 bg-primary-subtle breadcrumb_bg">
                <div class="card-body pb-0 px-4">
                    <div class="container-fluid">
                        <div class="row justify-content-between align-items-center g-3 mb-5 pb-1 pt-3">
                            <div class="col-lg-4">
                                <h4 class="mb-0">Opening Jobs</h4>
                            </div>
                            <div class="col-lg-2">
                                <a type="button" class="btn btn-primary w-100 addContact-modal" href="<?php echo SITEURL?>jobs/addPage"  ><i class="bi bi-plus align-middle"></i> Add Jobs</a>
                            </div>
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
                                <div class="mb-3" id="successMessage"> 
                                    <div class="alert alert-success text-center" role="alert">
                                        <strong><?php echo $this->session->gets('success_msg'); ?>!</strong>  
                                        <?php unset($_SESSION['success_msg']); ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->session->gets('error_msg')) { ?>
                                <div class="mb-3"> 
                                    <div class="alert alert-danger mb-xl-0 text-center" role="alert">
                                        <strong><?php echo $this->session->gets('error_msg'); ?>!</strong> —check it out! 
                                        <?php unset($_SESSION['error_msg']); ?>
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
                                                    <th>Title</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $this->pagesList = (array) @$this->pagesList->pages;
                                                if ($this->pagesList != '') {    
                                                    foreach ($this->pagesList as $value) {
                                                            if ((int)$value->job_id === 0) {
                                                                continue;
                                                            }
                                                ?>
                                                <tr>
                                                    <td><?php echo $value->job_title; ?></td>
                                                    <td><span class="badge badge-soft-success"><?php echo ($value->job_status == '0') ? "Active" : "In-Active"; ?></span></td>
                                                    <td>
                                                        <div class="d-flex align-items-left gap-2">    
                                                            <div class="editPageDetails">
                                                                <a href="<?php echo SITEURL; ?>jobs/editPage/<?php echo $value->job_id ?>" class="text-muted px-1 d-block"><i class="bi bi-pencil-fill"></i></a>
                                                            </div>                        
                                                            <div>
                                                                <a href="javascript:void(0)" data-id="<?php echo $value->job_id; ?>" class="text-muted px-1 d-block deletePage"><i class="bi bi-trash-fill"></i></a>
                                                            </div>                      
                                                        </div>
                                                    </td>
                                                </tr>

                                                <?php } } ?>
                                                
                                            </tbody>
                                            <tr><td><form method="post" action="<?php echo SITEURL; ?>jobs/editbanner" enctype="multipart/form-data">
                                                    
                                                    <img src="<?php echo FRONTUPLOADURL . 'banners/' . $this->pagesList[0]->banner_image; ?>" style="width:100px;">

                                                    <input type="hidden" class="form-control" name="banner_image_old" value="<?php echo $this->pagesList[0]->banner_image; ?>"> 

                                                    </td><td><input type="file" name="banner_image" class="form-control"><td><td><input type="submit" value='upload'></td></form></tr>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>                 
            </div> 
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).on('click', '.deletePage', function() {
console.log("Clicked Element:", this);
 
    var delId = $(this).data('id'); 
    console.log(delId);

    bootbox.confirm({
        title: "<strong>Confirmation</strong> Box",
        message: "Are you sure you want to delete?",
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
        callback: function(result) {
            if (result) {            
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo SITEURL; ?>jobs/deletePage",
                    data: { job_id: delId },
                    success: function(data) {
                        document.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Failed to delete the job.');
                    }
                });
            }
        }
    });
});
</script>

