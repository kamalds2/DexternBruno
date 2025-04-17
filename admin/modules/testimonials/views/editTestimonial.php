<div id="layout-wrapper">
    <div class="main-content">  
        <div class="page-content">
            <div class="card mt-n4 mx-n3 border-0 rounded-0 bg-primary-subtle breadcrumb_bg">
                <div class="card-body pb-0 px-4">
                    <div class="container-fluid">
                        <div class="row justify-content-between align-items-center g-3 mb-5 pb-1 pt-3">
                            <div class="col-lg-4">
                                <h4 class="mb-0">Upload Videos</h4>
                            </div>                            
                    </div>
                </div>
            </div>
        </div> 
        <div class="container-fluid"> 
            <div class="row mt-n5"> 
                <div class="card">            
                    <form id="editTestimonialForm" autocomplete="off" class="needs-validation p-2" novalidate method="post" action="<?php echo SITEURL?>testimonials/updateTestimonialDetails" enctype="multipart/form-data">
                         
                        <div class="d-flex flex-column gap-3">
                            <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="edit_testimonial_title" class="form-label">Title <span> * </span></label>
                                <input type="text" class="form-control" name="testimonial_title" id="edit_testimonial_title"  value="<?php echo $this->testimonials->testimonial_title?>" />
                            </div> 
                            
                            <div class="col-lg-12 mb-3">                                 
                                <label for="video_url" class="form-label">vedio :  <span> * </span> </label>
                                <?php if($this->testimonials->testimonial_name !='') {?>
                                    <img src="<?php echo FRONTUPLOADURL.'testimonials/'.$this->testimonials->testimonial_name; ?>" style="width:100px;">             
                                    <input type="hidden" class="form-control"  name="testimonial_name_old" value="<?php echo  $this->testimonials->testimonial_name; ?>" >
                                    <?php } ?> 
                                <input type="file" class="form-control" name="testimonial_name">
                            </div>  
                                 <div class="col-lg-12 mb-3">                                 
                                <label for="video_url" class="form-label">Youtube URL:  <span class="text-danger"> * </span> </label>
                                <input type="text" class="form-control" name="video_url" id="video_url" value="<?php echo  $this->testimonials->video_url; ?>" />
                            </div> 
                   
                            <div class="col-lg-6 mb-3">
                                <label for="testimonial_status" class="form-label">Status:  <span> * </span> </label>
                                <select class="form-select" id="testimonial_status" name="testimonial_status" >
                                    <option value=""  > Select Status  </option>
                                    <option value="0"  <?php if($this->testimonials->testimonial_status == 0) echo 'selected'; ?>  >Active</option>
                                    <option value="1"  <?php if($this->testimonials->testimonial_status == 1) echo 'selected'; ?>  >InActive</option>
                                </select>
                            </div>
                        </div>
                            <div class="text-end">
                                <input type="hidden" name="testimonial_id" value="<?php echo $this->testimonials->testimonial_id;?>">
                                <button type="submit" class="btn btn-success">Update</button>
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
        $('#editTestimonialForm').validate({   
              
            rules: {
                testimonial_title : {
                    "required":true,
                    maxlength:100
                },
                                            
                testimonial_status : "required"
            },
            messages: {
                testimonial_title : {
                    required: "Please enter  title",
                    maxlength : "Please enter maximum 100 letters"
                },
                video_url : {
                    required : "Please enter Youtube URL" ,
                    remote : "please enter youtube url"
                },
                

                testimonial_status : "Please select status"
            }
        }); 


    });
</script>