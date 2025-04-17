<div id="layout-wrapper">
    <div class="main-content">  
        <div class="page-content">
            <div class="card mt-n4 mx-n3 border-0 rounded-0 bg-primary-subtle breadcrumb_bg">
                <div class="card-body pb-0 px-4">
                    <div class="container-fluid">
                        <div class="row justify-content-between align-items-center g-3 mb-5 pb-1 pt-3">
                            <div class="col-lg-4">
                                <h4 class="mb-0">Services</h4>
                            </div>                            
                    </div>
                </div>
            </div>
        </div> 
        <div class="container-fluid"> 
            <div class="row mt-n5"> 
                <div class="card">   
            
                    <form id="editPgesForm" autocomplete="off" class="needs-validation p-2" novalidate method="post" action="<?php echo SITEURL?>services/updatePage" enctype="multipart/form-data" >
                        <input type="hidden" id="edit_page_id" class="form-control" value="<?php echo $this->pages->service_id?>" name="service_id">
                         
                        <div class="d-flex flex-column gap-3">
                            <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="edit_page_title" class="form-label">Title: <span class="text-danger">*</span>  </label>
                                <input type="text" class="form-control" name="service_title" id="edit_page_title" required value="<?php echo $this->pages->service_title?>"/>                                
                            </div> 
                            <div class="col-lg-12 mb-3">                                 
                                <label for="label" class="form-label">Description: </label>
                                 <textarea  class="ckeditor-classic" name="service_description"  rows="10" cols="100"><?php echo $this->pages->service_description?></textarea> 
                            </div> 
                            <div class="col-lg-12 mb-3">
                            <img id="previewImage" src="<?php echo FRONTUPLOADURL . 'pages/' . $this->pages->service_image; ?>" alt="<?php echo $this->pages->service_image; ?>">
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label for="image" class="form-label">File Upload</label> 
                            <?php if($this->pages->service_image !='') { ?>
                            <img src="<?php echo FRONTUPLOADURL . 'pages/' . $this->pages->service_image; ?>" style="width:100px;">             
                            <input type="hidden" class="form-control" name="service_image_old" value="<?php echo $this->pages->service_image; ?>"> 
                            <?php } ?> 
                            <input type="file" class="form-control" id="image" name="service_image">
                        </div>

    
                            <div class="col-lg-6 mb-3">
                            <label for="label" class="form-label">Status <span>*</span> </label>
                            <select class="form-select" id="label" name="service_status" required>
                                <option value="" disabled <?php if ($this->pages->service_status !== '0' && $this->pages->service_status !== '1') echo 'selected'; ?>>Select Status</option>
                                <option value="0" <?php if ($this->pages->service_status == '0') echo 'selected'; ?> >Active</option>
                                <option value="1" <?php if ($this->pages->service_status == '1') echo 'selected'; ?> >InActive</option>
                            </select>

                            
                        </div>

                        </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="button" class="btn btn-danger" onclick="history.back('-1');">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">  
   /* $(document).ready(function () {  
        $('#page_description').summernote({
            placeholder: 'Enter Description Here ',
            tabsize: 2,
            height: 300,
            callbacks: {
                onImageUpload: function(files, editor, welEditable) {
                    sendFile(files[0], editor, welEditable,'page_description');
                }
            }
        });

      /*  function sendFile(file, editor, welEditable,summernotid) {
            //alert('hi');
            console.log(file);
            var data = new FormData();
            data.append("file", file);
            data.append("foldername",summernotid);
            $.ajax({
              data: data,
              type: "POST",
              url: "<?php echo SITEURL.'services/fileupload';?>",
              cache: false,
              contentType: false,
              processData: false,
              success: function(url) {
                console.log(url);
                var image = $('<img>').attr('src',url);
                    $('#'+summernotid).summernote("insertNode", image[0]);
                 
              }
            });
        }
        
       /* function validform(){
            var error=0;
              
            if($('#page_description').summernote('isEmpty')){
                $('#page_description-error').html('Please enter Page Description ');
                error=1;
            }else{
                $('#page_description-error').html('');
            }
        }

        $('#editPagesForm').validate({ 
            rules: {
                page_title : {
                    "required":true,
                    maxlength:100
                },
                page_description : {
                    "required":true
                },
                                 
                page_status : "required"
            },
            messages: {
                page_title : {
                    required: "Please enter service title",
                    maxlength : "Please enter maximum 100 letters"
                },
                page_description : {
                    required: "Please enter Page description" 
                },
                 
                page_status : "Please select status"
            }
        }); 


    });

</script>