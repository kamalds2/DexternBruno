<div id="layout-wrapper">
    <div class="main-content">  
        <div class="page-content">
            <div class="card mt-n4 mx-n3 border-0 rounded-0 bg-primary-subtle breadcrumb_bg">
                <div class="card-body pb-0 px-4">
                    <div class="container-fluid">
                        <div class="row justify-content-between align-items-center g-3 mb-5 pb-1 pt-3">
                            <div class="col-lg-4">
                                <h4 class="mb-0">HomePage Videos</h4>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div> 

            <!-- Display Testimonials Table -->
            <div class="container-fluid">
                <div class="row mt-n5">
                    <div class="card">
                        <div class="card-body">
                            <table id="testimonialsTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th>Title</th>
                                        <th>Video Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                  
                                       
                                        foreach ($this->testimonialsList->testimonials as $testimonial) { ?>
                                            <tr>
                                                <td><?php echo $testimonial->testimonial_title; ?></td>
                                                <td>
                                                  <?php echo $testimonial->testimonial_name; ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                    echo $testimonial->testimonial_status == 0 
                                                         ? '<span class="badge bg-success">Active</span>'
                                                         : '<span class="badge bg-danger">Inactive</span>'; 
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo SITEURL; ?>testimonials/editTestimonial/<?php echo $testimonial->testimonial_id; ?>" class="btn btn-sm btn-warning">Edit</a>
                                                    
                                                </td>
                                            </tr>
                                        <?php } ?>
                                 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        // Initialize DataTables
        $('#testimonialsTable').DataTable({
            "ordering": true,
            "paging": true,
            "searching": true,
            "responsive": true
        });
    });
</script>
