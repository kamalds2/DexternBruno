<style>
    @import url(https://fonts.googleapis.com/css2?family=Covered+By+Your+Grace&display=swap);
    @import url(https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap);
  #banner {
    position: relative;
    width: 100%;
    margin: auto;
  }
    .overlay { 
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
        background-color:rgba(0,0,0,.5);
    }
    #banner img {
        width: 100%;
        height: 600px;
        display: block;
        object-fit: fill;
        object-position: center;
    }
  
  #banner .text-overlay {
    position: absolute;
    top: 44%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    text-align: center;
  }
    #banner #MainTitle{
        font-size: 70px;
        letter-spacing: -1.4px;
        display: inline-block;
        color: var(--travel-white, #fff);
        margin-bottom: 0;
        position: relative;
        transition: transform 1s, opacity 1s;
        transform: translateY(30px);
        font-weight: 900;
        font-family: var(--travel-font, "Lato", sans-serif);
        line-height: 1.2;
    }
    #banner #sliderdate {
        font-size: 30px;
        line-height: 1;
        font-weight: 400 !important;
        color: var(--travel-white, #fff);
        font-family: var(--travel-special-font, "Covered By Your Grace", cursive);
        margin-bottom:30px;
        position: relative;
        transition: transform 1s, opacity 1s;
        transform: translateY(50px);
    }
    #html-preview {
        width: 100%;
        margin: auto;
        margin-top: 20px;
        border: 1px solid #ccc;
        padding: 10px;
        display: none;
    }
</style>
<div id="layout-wrapper"> 
    <div class="main-content">  
        <div class="page-content">
            <div class="card mt-n4 mx-n3 border-0 rounded-0 bg-primary-subtle breadcrumb_bg">
                <div class="card-body pb-0 px-4">
                    <div class="container-fluid">
                        <div class="row justify-content-between align-items-center g-3 mb-5 pb-1 pt-3">
                            <div class="col-lg-4">
                                <h4 class="mb-0">Edit Sliders</h4>
                            </div>                            
                    </div>
                </div>
            </div>
        </div> 
        <div class="container-fluid"> 
            <div class="row mt-n5"> 
                <div class="card">            
                    <form id="updateslidersForm" autocomplete="off" class="needs-validation p-2" novalidate method="post" action="<?php echo SITEURL?>sliders/updateSlider" enctype="multipart/form-data"> 
                        <div class="d-flex flex-column gap-3">
                            <div class="row">

                                <div class="col-md-12 mb-3">       

                                    <div id="banner">
                                        <div class="overlay"></div>
                                        <img id="previewImage" src="<?php echo FRONTUPLOADURL.'sliders/'.$this->sliders->slider_image; ?>"  alt="<?php echo $this->sliders->slider_image;?>">
                                        <div class="text-overlay">
                                            <p id="slider_date"><?php echo $this->sliders->slider_date; ?></p>
                                            <h1 id="MainTitle"><?php echo $this->sliders->slider_title; ?></h1>

                                        </div>
                                    </div>
                                <div id="html-preview"></div>

                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">                                 
                                    <label for="image" class="form-label">File Upload</label> 
                                    <?php if($this->sliders->slider_image !='') {?>
                                    <img src="<?php echo FRONTUPLOADURL.'sliders/'.$this->sliders->slider_image; ?>" style="width:100px;">             
                                    <input type="hidden" class="form-control"  name="slider_image_old" value="<?php echo  $this->sliders->slider_image; ?>" >
                                    <?php } ?> 
                                    <input type="file" class="form-control" id="image" name="slider_image">
                                </div>
                            <div class="col-lg-12 mb-3">
                                <label for="edit_slider_title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="slider_title" id="edit_slider_title" value="<?php echo $this->sliders->slider_title; ?>" required />                                
                            </div>


                              <div class="col-lg-4 mb-3">     
                                <label for="slider_description" class="form-label">Description:<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="slider_description" id="slider_description"  rows="5" cols="500"><?php echo $this->sliders->slider_description;?></textarea>                        
                               
                            </div>


                            <div class="col-lg-12 mb-3">                                 
                                <label for="label" class="form-label">slider_date:</label>
                                <input type="text" class="form-control" name="slider_date" value="<?php echo $this->sliders->slider_date; ?>" >
                            </div>
                           
                          
                            
                            <div class="col-lg-6 mb-3">
                                <label for="label" class="form-label">Status</label>
                                <select class="form-select" id="label" name="slider_status" required>
                                    <option> Select Status </option>
                                    <option value="0" <?php if($this->sliders->slider_status == 0) echo 'selected'; ?> >Active</option>
                                    <option value="1" <?php if($this->sliders->slider_status == 1) echo 'selected'; ?> >InActive</option>
                                </select>
                            </div>
                        </div>
                            <div class="text-end">
                                <input type="hidden" class="form-control" id="slider_id" name="slider_id" value="<?php echo  $this->sliders->slider_id; ?>">
                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="button" class="btn btn-danger" onclick="history.back('-1')">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
      // Function to update HTML preview
    function updatePreview() {
        var html = $('#banner').html(); // Get HTML content of banner
        $('#html-preview').text(html); // Update preview
    }
      
    // Call the updatePreview function on page load
    updatePreview();
      
      // Call the updatePreview function when any changes occur in banner content
    $('#banner').on('input', function(){
        updatePreview();
    });
  
    // File input change event handler
    $('#image').change(function(){
        var file = this.files[0]; // Get the selected file
        if (file) {
          var reader = new FileReader(); // Create a FileReader object
          reader.onload = function(e) {
            $('#previewImage').attr('src', e.target.result); // Set the source of the preview image
          }
          reader.readAsDataURL(file); // Read the file as a Data URL
        }
      });
    });


    $("#edit_slider_title").on("input",function(){
      $("#MainTitle").html($(this).val());
    });

    $("#slider_date").on("input",function(){
      $("#sliderdate").html($(this).val());
    });
</script>
