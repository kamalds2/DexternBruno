<div id="layout-wrapper">
    <div class="main-content">  
        <div class="page-content">
            <div class="card mt-n4 mx-n3 border-0 rounded-0 bg-primary-subtle breadcrumb_bg">
                <div class="card-body pb-0 px-4">
                    <div class="container-fluid">
                        <div class="row justify-content-between align-items-center g-3 mb-5 pb-1 pt-3">
                            <div class="col-lg-4">
                                <h4 class="mb-0">Home Page Servicessss</h4>
                            </div>                            
                    </div>
                </div>
            </div> 
        </div> 
        <div class="container-fluid"> 
            <div class="row mt-n5">                 
                <div class="card">            
                    <form id="addPagesForm" autocomplete="off"  class="needs-validation p-2" novalidate method="post" action="<?php echo SITEURL?>services/createHomePage" enctype="multipart/form-data" >
                         
                        <div class="d-flex flex-column gap-3">
                            <div class="row">
                                <div class="col-lg-12 mb-3">

                                    <?php foreach($this->pagesList->pages as $val) {?>
                                   
                                   <input type="checkbox" style="border: 2px solid " class="form-check-input service-checkbox" name="homeservice_id[]" value="<?php echo $val->service_id; ?>" id="checkbox_<?php echo $val->service_title; ?>" onchange="limitSelection(this)" />
                                    <label class="form-check-label" for="checkbox_<?php echo $val->service_title; ?>">
                                        <?php echo $val->service_title; ?><span class="text-danger">*</span>
                                    </label>  <br><br>
                                                            <?php }?>                            
                                </div>
                                 
                                
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Add</button>
                            <button type="button" class="btn btn-danger" onclick="history.back('-1');">Cancel</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 



<script>
function limitSelection(checkbox) {
    
    const checkboxes = document.querySelectorAll(".service-checkbox:checked");
    if (checkboxes.length > 4) {
        alert("You can only select up to 4 options.");
        checkbox.checked = false;
    }
}
</script> 