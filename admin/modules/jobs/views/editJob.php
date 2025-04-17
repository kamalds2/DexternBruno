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
            
                    <form id="editPgesForm" autocomplete="off" class="needs-validation p-2" novalidate method="post" action="<?php echo SITEURL?>jobs/updatePage" enctype="multipart/form-data" >
                        <input type="hidden" id="edit_page_id" class="form-control" value="<?php echo $this->pages->job_id; ?>" name="job_id">
                         
                        <div class="d-flex flex-column gap-3">
                            <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="edit_page_title" class="form-label">Title: <span class="text-danger">*</span>  </label>
                                <input type="text" class="form-control" name="job_title" id="edit_job_title" required value="<?php echo $this->pages->job_title; ?>"/>                                
                            </div> 

                           <div class="col-lg-6 mb-3">
                                <label for="job_location" class="form-label">Location: <span class="text-danger">*</span>  </label>
                                
                                    <select class="form-control" name="job_location" id="location">
                                <option value="" name="job_location" <?php if($this->pages->job_location == "") echo 'selected';?>>Select a Location</option>
                                <option ng-repeat="item in state.facets['l']" value="Bengaluru,India" class="ng-binding ng-scope"<?php if($this->pages->job_location == "Bengaluru,India") echo 'selected';?>>Bengaluru</option>
                                <option ng-repeat="item in state.facets['l']" value="Chennai,India" class="ng-binding ng-scope"<?php if($this->pages->job_location == "Chennai,India") echo 'selected';?>>Chennai</option>
                                <option ng-repeat="item in state.facets['l']" value="London,UK" class="ng-binding ng-scope"<?php if($this->pages->job_location == "London,UK") echo 'selected';?>>London</option>
                                <option ng-repeat="item in state.facets['l']" value="Montreal,Canada" class="ng-binding ng-scope"<?php if($this->pages->job_location == "Montreal,Canada") echo 'selected';?>>Montreal</option>
                                <option ng-repeat="item in state.facets['l']" value="Mumbai,India" class="ng-binding ng-scope"<?php if($this->pages->job_location == "Mumbai,India") echo 'selected';?>>Mumbai</option>
                                <option ng-repeat="item in state.facets['l']" value="Sydney,Australia" class="ng-binding ng-scope"<?php if($this->pages->job_location == "Sydney,Australia") echo 'selected';?>>Sydney</option>
                                <option ng-repeat="item in state.facets['l']" value="Toronto,Canada" class="ng-binding ng-scope"<?php if($this->pages->job_location == "Toronto,Canada") echo 'selected';?>>Toronto</option>
                                <option ng-repeat="item in state.facets['l']" value="Vancouver,Canada" class="ng-binding ng-scope"<?php if($this->pages->job_location == "Vancouver,Canada") echo 'selected';?>>Vancouver</option>
                                <option ng-repeat="item in state.facets['l']" value="3 Locations" class="ng-binding ng-scope"<?php if($this->pages->job_location == "3 Locations") echo 'selected';?>>Western Site's (London / Vancouver / Montreal / Toronto)</option>
                            </select>
                            
                            </div> 
                            <div class="col-lg-6 mb-3">
                                <label for="job_location" class="form-label">Category: <span class="text-danger">*</span>  </label>
                                
                                 <select class="form-control" name="job_category" id='category' required>

                                <option value="" selected="selected">Select a Category</option>
                                <option ng-repeat="item in state.facets['c']" value="Build" class="ng-binding ng-scope">Build</option>
                                <option ng-repeat="item in state.facets['c']" value="Business &amp; Program Management" class="ng-binding ng-scope"<?php if($this->pages->job_category == "Business &amp; Program Management") echo 'selected';?>>Business &amp; Program Management</option>
                                <option ng-repeat="item in state.facets['c']" value="Creative Supervision" class="ng-binding ng-scope"<?php if($this->pages->job_category == "Creative Supervision") echo 'selected';?>>Creative Supervision</option>
                                <option ng-repeat="item in state.facets['c']" value="Facilities" class="ng-binding ng-scope"<?php if($this->pages->job_category == "Facilities") echo 'selected';?>>Facilities</option>
                                <option ng-repeat="item in state.facets['c']" value="Finance" class="ng-binding ng-scope"<?php if($this->pages->job_category == "Finance") echo 'selected';?>>Finance</option>
                                <option ng-repeat="item in state.facets['c']" value="Human Resources" class="ng-binding ng-scope"<?php if($this->pages->job_category == "Human Resources") echo 'selected';?>>Human Resources</option>
                                <option ng-repeat="item in state.facets['c']" value="Marketing, and Communications" class="ng-binding ng-scope"<?php if($this->pages->job_category == "Marketing, and Communications") echo 'selected';?>>Marketing, and Communications</option>
                                <option ng-repeat="item in state.facets['c']" value="Other" class="ng-binding ng-scope"<?php if($this->pages->job_category == "Other") echo 'selected';?>>Other</option>
                                <option ng-repeat="item in state.facets['c']" value="Performance (Animation, Creature, and FX)" class="ng-binding ng-scope"<?php if($this->pages->job_category == "Performance (Animation, Creature, and FX)") echo 'selected';?>>Performance (Animation, Creature, and FX)</option>
                                <option ng-repeat="item in state.facets['c']" value="Production" class="ng-binding ng-scope"<?php if($this->pages->job_category == "Production") echo 'selected';?>>Production</option>
                                <option ng-repeat="item in state.facets['c']" value="Production Technology, Core Services" class="ng-binding ng-scope"<?php if($this->pages->job_category == "Production Technology, Core Services") echo 'selected';?>>Production Technology, Core Services</option>
                                <option ng-repeat="item in state.facets['c']" value="Production Technology, Pipeline" class="ng-binding ng-scope"<?php if($this->pages->job_category == "Production Technology, Pipeline") echo 'selected';?>>Production Technology, Pipeline</option>
                                <option ng-repeat="item in state.facets['c']" value="Production Technology, Realtime" class="ng-binding ng-scope"<?php if($this->pages->job_category == "Production Technology, Realtime") echo 'selected';?>>Production Technology, Realtime</option>
                                <option ng-repeat="item in state.facets['c']" value="Production Technology, Research" class="ng-binding ng-scope"<?php if($this->pages->job_category == "Production Technology, Research") echo 'selected';?>>Production Technology, Research</option>
                                <option ng-repeat="item in state.facets['c']" value="Production Technology, Software Product Development" class="ng-binding ng-scope"<?php if($this->pages->job_category == "Production Technology, Software Product Development") echo 'selected';?>>Production Technology, Software Product Development</option>
                                <option ng-repeat="item in state.facets['c']" value="RPM (Roto, Prep, Camera and Bodytrack)" class="ng-binding ng-scope"<?php if($this->pages->job_category == "RPM (Roto, Prep, Camera and Bodytrack)") echo 'selected';?>>RPM (Roto, Prep, Camera and Bodytrack)</option>
                                <option ng-repeat="item in state.facets['c']" value="Shot Finishing  (Environment Generalist, Lighting, and Comp)" class="ng-binding ng-scope"<?php if($this->pages->job_category == "Shot Finishing  (Environment Generalist, Lighting, and Comp)") echo 'selected';?>>Shot Finishing  (Environment Generalist, Lighting, and Comp)</option>
                                <option ng-repeat="item in state.facets['c']" value="Shot Prep (Shoot, and Layout)" class="ng-binding ng-scope"<?php if($this->pages->job_category == "Shot Prep (Shoot, and Layout)") echo 'selected';?>>Shot Prep (Shoot, and Layout)</option>
                                <option ng-repeat="item in state.facets['c']" value="Technology" class="ng-binding ng-scope"<?php if($this->pages->job_category == "Technology") echo 'selected';?>>Technology</option>
                                <option ng-repeat="item in state.facets['c']" value="Technology (I.T., and Systems)" class="ng-binding ng-scope"<?php if($this->pages->job_category == "Technology (I.T., and Systems)") echo 'selected';?>>Technology (I.T., and Systems)</option>
                                <option ng-repeat="item in state.facets['c']" value="Virtual Production" class="ng-binding ng-scope"<?php if($this->pages->job_category == "Virtual Production") echo 'selected';?>>Virtual Production</option>
                                </select>
                             
                            </div>
    
                            <div class="col-lg-6 mb-3">
                            <label for="label" class="form-label">Status <span>*</span> </label>
                            <select class="form-select" id="label" name="job_status" required>
                                <option value="" disabled <?php if ($this->pages->job_status !== '0' && $this->pages->job_status !== '1') echo 'selected'; ?>>Select Status</option>
                                <option value="0" <?php if ($this->pages->job_status == '0') echo 'selected'; ?> >Active</option>
                                <option value="1" <?php if ($this->pages->job_status == '1') echo 'selected'; ?> >InActive</option>
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
    $(document).ready(function () {  
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