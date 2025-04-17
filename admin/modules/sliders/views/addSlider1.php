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
                    </div>
                </div>
            </div>
        </div> 
        <div class="container-fluid"> 
            <div class="row mt-n5"> 
                <div class="card">            
                    <form id="addSliderForm" autocomplete="off" class="needs-validation p-2" novalidate method="post" action="<?php echo SITEURL?>sliders/createSlider" enctype="multipart/form-data">
                         
                        <div class="d-flex flex-column gap-3">
                            <div class="row">
                                <div class="col-md-6 mb-3">                                 
                                <label for="image" class="form-label"> File Upload :  <span> * </span> </label>
                                <input type="file" class="form-control" id="image" name="slider_image">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="edit_slider_title" class="form-label">Title </label>
                                <input type="text" class="form-control" name="slider_title" id="edit_slider_title"  />
                            </div> 
                            
                            <div class="col-lg-12 mb-3">                                 
                                <label for="label" class="form-label">Sub Title:  </label>
                                <input type="text" class="form-control" name="sub_title" id="sub_title">
                                <!-- <textarea  class="ckeditor-classic" name="slider_description"></textarea> -->
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="slider_url"> Slider URL : </label>
                                <input type="text" name="slider_url" id="slider_url" class="form-control">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="label" class="form-label">Status:  <span> * </span> </label>
                                <select class="form-select" id="label" name="slider_status" >
                                    <option value=""  > Select Status  </option>
                                    <option value="0"  >Active</option>
                                    <option value="1" >InActive</option>
                                </select>
                            </div>
                        </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Add</button>
                                <button type="submit" class="btn btn-danger" onclick="history.back('-1')">Cancel</button>
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
        $('#addSliderForm').validate({   
              
            rules: {
                 
                slider_image : {
                    "required":true,
                    accept:"image/jpg,image/png,image/jpeg,image/gif"
                },                 
                slider_status : "required"
            },
            messages: {
                 
                slider_image : {
                    required: "Please upload image with 600px * 330px or more" 
                }, 

                slider_status : "Please select status"
            }
        }); 


    });
</script>