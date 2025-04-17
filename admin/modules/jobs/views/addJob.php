<div id="layout-wrapper">
    <div class="main-content">  
        <div class="page-content">
            <div class="card mt-n4 mx-n3 border-0 rounded-0 bg-primary-subtle breadcrumb_bg">
                <div class="card-body pb-0 px-4">
                    <div class="container-fluid">
                        <div class="row justify-content-between align-items-center g-3 mb-5 pb-1 pt-3">
                            <div class="col-lg-4">
                                <h4 class="mb-0">Jobs</h4>
                            </div>                            
                    </div>
                </div>
            </div> 
        </div> 
        <div class="container-fluid"> 
            <div class="row mt-n5">                 
                <div class="card">            
                    <form id="addPagesForm" autocomplete="off"  class="needs-validation p-2" novalidate method="post" action="<?php echo SITEURL?>jobs/createPage" enctype="multipart/form-data" >
                         
                        <div class="d-flex flex-column gap-3">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="edit_page_title" class="form-label">Title <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" name="job_title"  />                                
                                </div>
                                <div class="col-lg-12 mb-3">                                 
                                <label for="label" class="form-label">Loactaion: </label>
            
                                  <select class="form-control" id='location'>

                                <option value="" name="job_location" selected="selected">Select a Location</option>

                                    <!-- ngRepeat: item in state.facets['l'] --><option ng-repeat="item in state.facets['l']" value="Bengaluru,India" class="ng-binding ng-scope">Bengaluru</option><!-- end ngRepeat: item in state.facets['l'] --><option ng-repeat="item in state.facets['l']" value="Chennai,India" class="ng-binding ng-scope">Chennai</option><!-- end ngRepeat: item in state.facets['l'] --><option ng-repeat="item in state.facets['l']" value="London,UK" class="ng-binding ng-scope">London</option><!-- end ngRepeat: item in state.facets['l'] --><option ng-repeat="item in state.facets['l']" value="Montreal,Canada" class="ng-binding ng-scope">Montreal</option><!-- end ngRepeat: item in state.facets['l'] --><option ng-repeat="item in state.facets['l']" value="Mumbai,India" class="ng-binding ng-scope">Mumbai</option><!-- end ngRepeat: item in state.facets['l'] --><option ng-repeat="item in state.facets['l']" value="Sydney,Australia" class="ng-binding ng-scope">Sydney</option><!-- end ngRepeat: item in state.facets['l'] --><option ng-repeat="item in state.facets['l']" value="Toronto,Canada" class="ng-binding ng-scope">Toronto</option><!-- end ngRepeat: item in state.facets['l'] --><option ng-repeat="item in state.facets['l']" value="Vancouver,Canada" class="ng-binding ng-scope">Vancouver</option><!-- end ngRepeat: item in state.facets['l'] --><option ng-repeat="item in state.facets['l']" value="3 Locations" class="ng-binding ng-scope">Western Site's (London / Vancouver / Montreal / Toronto)</option><!-- end ngRepeat: item in state.facets['l'] -->

                                </select>
                            </div> 
                            <div class="col-lg-12 mb-3">                                 
                                <label for="label" class="form-label">Category: </label>
                                 
                            <select class="form-control" name="job_category" id='category'>

                                <option value="" selected="selected">Select a Category</option>

                                    <!-- ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Build" class="ng-binding ng-scope">Build</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Business &amp; Program Management" class="ng-binding ng-scope">Business &amp; Program Management</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Creative Supervision" class="ng-binding ng-scope">Creative Supervision</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Facilities" class="ng-binding ng-scope">Facilities</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Finance" class="ng-binding ng-scope">Finance</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Human Resources" class="ng-binding ng-scope">Human Resources</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Marketing, and Communications" class="ng-binding ng-scope">Marketing, and Communications</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Other" class="ng-binding ng-scope">Other</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Performance (Animation, Creature, and FX)" class="ng-binding ng-scope">Performance (Animation, Creature, and FX)</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Production" class="ng-binding ng-scope">Production</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Production Technology, Core Services" class="ng-binding ng-scope">Production Technology, Core Services</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Production Technology, Pipeline" class="ng-binding ng-scope">Production Technology, Pipeline</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Production Technology, Realtime" class="ng-binding ng-scope">Production Technology, Realtime</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Production Technology, Research" class="ng-binding ng-scope">Production Technology, Research</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Production Technology, Software Product Development" class="ng-binding ng-scope">Production Technology, Software Product Development</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="RPM (Roto, Prep, Camera and Bodytrack)" class="ng-binding ng-scope">RPM (Roto, Prep, Camera and Bodytrack)</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Shot Finishing  (Environment Generalist, Lighting, and Comp)" class="ng-binding ng-scope">Shot Finishing  (Environment Generalist, Lighting, and Comp)</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Shot Prep (Shoot, and Layout)" class="ng-binding ng-scope">Shot Prep (Shoot, and Layout)</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Technology" class="ng-binding ng-scope">Technology</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Technology (I.T., and Systems)" class="ng-binding ng-scope">Technology (I.T., and Systems)</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Virtual Production" class="ng-binding ng-scope">Virtual Production</option><!-- end ngRepeat: item in state.facets['c'] -->

                                </select>
                            </div> 
                            
                                 
                                <div class="col-lg-6 mb-3">
                                    <label for="page_status" class="form-label">Status <span class="text-danger">*</span></label> 
                                    <select class="form-select" id="job_status" name="job_status">
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