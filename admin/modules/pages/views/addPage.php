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
                    <form id="addPagesForm" autocomplete="off" class="needs-validation p-2" novalidate method="post" action="<?php echo SITEURL?>pages/createPage" enctype="multipart/form-data" onSubmit="return validform();">
                         
                        <div class="d-flex flex-column gap-3">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="edit_page_title" class="form-label">Title <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" name="page_title" id="edit_page_title"  />                                
                                </div>
                                <div class="col-lg-12 mb-3">                                 
                                    <label for="page_description" class="form-label">Description:<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="page_description" id="page_description"></textarea>  
                                    <span class="text-danger" id="page_description-error">   </span>
                                </div> 
                                 <div class="col-lg-12 mb-3">                                 
                                <label for="image" class="form-label"> File Upload :  <span class="text-danger"> * </span> </label>
                                <input type="file" class="form-control" id="image" name="banner_image">
                            </div>

                                <div class="col-lg-12 mb-3">
                                    <label for="page_meta_title" class="form-label"> Meta Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="meta_title" id="page_meta_title"  />                                
                                </div>
                                <div class="col-lg-12 mb-3">                                 
                                    <label for="page_meta_description" class="form-label"> Meta Description<span class="text-danger">*</span>:</label>
                                    <textarea  class="form-control" name="meta_description" id="page_meta_description"></textarea>
                                </div>
                             
                                <div class="col-lg-6 mb-3">
                                    <label for="page_status" class="form-label">Status <span class="text-danger">*</span></label> 
                                    <select class="form-select" id="page_status" name="page_status">
                                        <option value=""  >Select Status</option>
                                        <option value="0"  >Active</option>
                                        <option value="1" >InActive</option>
                                    </select>
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

 




<script type="text/javascript">  

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
    

    function validform(){
        var error=0;
          
        if($('#page_description').summernote('isEmpty')){
            $('#page_description-error').html('Please enter Page Description ');
            error=1;
        }else{
            $('#page_description-error').html('');
        }
    }

    function sendFile(file, editor, welEditable,summernotid) {
        //alert('hi');
        console.log(file);
        var data = new FormData();
        data.append("file", file);
        data.append("foldername",summernotid);
        $.ajax({
          data: data,
          type: "POST",
          url: "<?php echo SITEURL.'pages/fileupload';?>",
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
    $(document).ready(function () {  
       
        
        $('#addPagesForm').validate({ 
            rules: {
                page_title : {
                    "required":true,
                    maxlength:100
                },
                page_description : {
                    "required":true
                },
                banner_image : {
                  "required":true,
                  accept:"image/jpg,image/png,image/jpeg,image/gif",
                  filesize: 1000000 
                },                 
                page_status : "required",
                meta_title : "required",
                meta_description : "required",
                meta_keywords : "required"
            },
            messages: {
                page_title : {
                    required: "Please enter Page title",
                    maxlength : "Please enter maximum 100 letters"
                },
                page_description : {
                    required: "Please enter Page description" 
                }, 
                banner_image : {
                    required: "Please upload image" 
                }, 
                page_status : "Please select status",
                meta_title : "Please Enter Meta Title ",
                meta_description : "Please Enter Meta Description ",
                meta_keywords : "Please Enter Meta Keywords ",
            }
        }); 


    });

</script>   