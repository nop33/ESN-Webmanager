    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>site">Home</a></li>
      <li><a href="<?php echo base_url() ?>event">Events</a></li>
      <li class="active"><?php echo $title; ?></li>
    </ol>
    <div class="container">
      <div class="starter-template">
	      <div class="row row-offcanvas row-offcanvas-right">
	        <div class="col-xs-12 col-sm-9">
            <div class="row">
	            <p class="pull-right visible-xs">
	              <button type="button" class="btn btn-primary" data-toggle="offcanvas"><span class="glyphicon glyphicon-chevron-right"></button>
	            </p>
            </div>
	          <div class="row">
	          	<?php echo form_open("registration/update/$registration->event_id/$registration->student_id",array('class' => 'form-horizontal', 'role' => 'form'));?>
	          	  <div class="form-group">
	          	    <label for="inputName" class="col-lg-2 control-label">Paid</label>
	          	    <div class="col-lg-6">
	          	      <input type="text" class="form-control" id="inputName" placeholder="Name" name="paid" value="<?php echo $registration->paid ?>">
	          	    </div>
	          	  </div>
	          	  <div class="form-group">
	          	    <label for="inputNotes" class="col-lg-2 control-label">Notes</label>
	          	    <div class="col-lg-6">
	          	      <textarea class="form-control" id="inputNotes" placeholder="Place your notes" name="notes"><?php echo $registration->notes ?></textarea>
	          	    </div>
	          	  </div>
	          	  <div class="form-group">
	          	    <div class="col-lg-offset-2 col-lg-6">
	          	      <button type="submit" class="btn btn-default" name="submit">Save</button>
	          	    </div>
	          	  </div>
	          	<?php echo form_close()?> 
              </div><!--/row-->
	        </div><!--/span-->

	        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
	          <div class="well sidebar-nav">
	            <ul class="nav nav-pills nav-stacked">
	              <li><a href="<?php echo base_url() ?>event">Events</a></li>
	        	    <li><a href="<?php echo base_url() ?>student">Students</a></li>
                <li><a href="<?php echo base_url() ?>registration">Registration</a></li>
	        	    <li><a href="<?php echo base_url() ?>shareIt">Share it!</a></li>
	            </ul>
	          </div><!--/.well -->
	        </div><!--/span-->
	      </div><!--/row-->
	  </div>
    </div> <!-- /container -->

    <!-- form validation -->
    <script data-cfasync="false" type="text/javascript">
      $(function(){
        $('.form-horizontal').validate({
            rules: {
                paid: {
                    required: true
                }
            },
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });
      })
    </script>
