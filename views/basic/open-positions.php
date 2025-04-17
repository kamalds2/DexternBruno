

        <div id="page" class="theme-page">

            

            <div class="fc-row js-section js-section-dark">

            <div class="blocks">

<div class="block block-wide_image_block" style="min-height: 30vh;">

    <div class="block-inner">

        <div class="background-image-stretch"

    style="background-image: url(<?php $jobs = $this->jobs->res; echo UPLOADURL.'/banners/'.$jobs[0]->banner_image;?>);"></div>

    </div>

</div>

</div>

</div>





        </div>

        <div class="fc-row js-section js-section-light bg-light">

    <div class="blocks">

<div class="block block-text">

    <div class="block-inner">

        <div class="container">

    <div class="row justify-content-center information-block">

        <div class="col-12 col-lg-12">

        <h2>Open Positions</h2>



    <div class="row mt-20">

        <div class="col-lg-6">

            <select class="form-control" id='category'>

                <option value="" selected="selected">Select a Category</option>

                    <!-- ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Build" class="ng-binding ng-scope">Build</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Business &amp; Program Management" class="ng-binding ng-scope">Business &amp; Program Management</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Creative Supervision" class="ng-binding ng-scope">Creative Supervision</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Facilities" class="ng-binding ng-scope">Facilities</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Finance" class="ng-binding ng-scope">Finance</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Human Resources" class="ng-binding ng-scope">Human Resources</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Marketing, and Communications" class="ng-binding ng-scope">Marketing, and Communications</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Other" class="ng-binding ng-scope">Other</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Performance (Animation, Creature, and FX)" class="ng-binding ng-scope">Performance (Animation, Creature, and FX)</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Production" class="ng-binding ng-scope">Production</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Production Technology, Core Services" class="ng-binding ng-scope">Production Technology, Core Services</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Production Technology, Pipeline" class="ng-binding ng-scope">Production Technology, Pipeline</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Production Technology, Realtime" class="ng-binding ng-scope">Production Technology, Realtime</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Production Technology, Research" class="ng-binding ng-scope">Production Technology, Research</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Production Technology, Software Product Development" class="ng-binding ng-scope">Production Technology, Software Product Development</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="RPM (Roto, Prep, Camera and Bodytrack)" class="ng-binding ng-scope">RPM (Roto, Prep, Camera and Bodytrack)</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Shot Finishing  (Environment Generalist, Lighting, and Comp)" class="ng-binding ng-scope">Shot Finishing  (Environment Generalist, Lighting, and Comp)</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Shot Prep (Shoot, and Layout)" class="ng-binding ng-scope">Shot Prep (Shoot, and Layout)</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Technology" class="ng-binding ng-scope">Technology</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Technology (I.T., and Systems)" class="ng-binding ng-scope">Technology (I.T., and Systems)</option><!-- end ngRepeat: item in state.facets['c'] --><option ng-repeat="item in state.facets['c']" value="Virtual Production" class="ng-binding ng-scope">Virtual Production</option><!-- end ngRepeat: item in state.facets['c'] -->

                </select>

        </div>

        <div class="col-lg-6">

            <select class="form-control" id='location'>

                <option value="" selected="selected">Select a Location</option>

                    <!-- ngRepeat: item in state.facets['l'] --><option ng-repeat="item in state.facets['l']" value="Bengaluru,India" class="ng-binding ng-scope">Bengaluru</option><!-- end ngRepeat: item in state.facets['l'] --><option ng-repeat="item in state.facets['l']" value="Chennai,India" class="ng-binding ng-scope">Chennai</option><!-- end ngRepeat: item in state.facets['l'] --><option ng-repeat="item in state.facets['l']" value="London,UK" class="ng-binding ng-scope">London</option><!-- end ngRepeat: item in state.facets['l'] --><option ng-repeat="item in state.facets['l']" value="Montreal,Canada" class="ng-binding ng-scope">Montreal</option><!-- end ngRepeat: item in state.facets['l'] --><option ng-repeat="item in state.facets['l']" value="Mumbai,India" class="ng-binding ng-scope">Mumbai</option><!-- end ngRepeat: item in state.facets['l'] --><option ng-repeat="item in state.facets['l']" value="Sydney,Australia" class="ng-binding ng-scope">Sydney</option><!-- end ngRepeat: item in state.facets['l'] --><option ng-repeat="item in state.facets['l']" value="Toronto,Canada" class="ng-binding ng-scope">Toronto</option><!-- end ngRepeat: item in state.facets['l'] --><option ng-repeat="item in state.facets['l']" value="Vancouver,Canada" class="ng-binding ng-scope">Vancouver</option><!-- end ngRepeat: item in state.facets['l'] --><option ng-repeat="item in state.facets['l']" value="3 Locations" class="ng-binding ng-scope">Western Site's (London / Vancouver / Montreal / Toronto)</option><!-- end ngRepeat: item in state.facets['l'] -->

                </select>

        </div>

    </div>







    <div class="row mt-20">

        <div class="col-lg-12">

            <table class="table table-striped job-table">

      <thead>

        <tr>

          <th>Job Title</th>

          <th>Location</th>

        </tr>

      </thead>

      <tbody class="body">
            <?php
            foreach($jobs as $val){?>
        <tr>

          <td><p><a href="<?php echo SITEURL.'pages/pagedetails/job-details';?>"><?php echo $val->job_title;?></a></p></td>

          <td><?php echo $val->job_location;?></td>

        </tr><?php } ?>

       
      </tbody>

    </table>

        </div>

        

    </div>



        </div>

    </div>

</div>    </div>

</div></div>

</div>


<script>
    $('#location, #category').change(function () {
        // Get selected values
        var location = $('#location').val();
        var category = $('#category').val();

        // Prepare data object for AJAX request
        var data = { location: location, category: category };

        console.log(data);

        // Perform AJAX request
        $.ajax({
            url: '<?php echo RESTURL."travelbunny/getJobDetails" ?>',
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (data) {
                console.log("Response received:", data);
                data = data.res;
                
                var htmlString = '';

                if (data && data.length > 0) {
                    
                    $.each(data, function (index, job) {
                        htmlString += '<tr>';
                        htmlString += '<td><p><a href="<?php echo SITEURL; ?>pages/pagedetails/job-details">' + job.job_title + '</a></p></td>';
                        htmlString += '<td>' + job.job_location + '</td>';
                        htmlString += '</tr>';
                    });
                } else {
                    // If no jobs are found, show a message
                    htmlString += '<tr>';
                    htmlString += '<td colspan="2">No jobs found for the selected criteria.</td>';
                    htmlString += '</tr>';
                }

                // Update the table body with the generated HTML
                $(".body").empty().html(htmlString);
            },
            error: function (xhr, status, error) {
                console.error("Error fetching jobs:", status);

                // Display an error message in the table
                $(".body").empty().html('<tr><td colspan="2">An error occurred while fetching jobs. Please try again later.</td></tr>');
            }
        });
    });
</script>
