    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>site">Home</a></li>
      <li><a href="<?php echo base_url() ?>student">Students</a></li>
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
	          	<?php echo form_open("student/create",array('class' => 'form-horizontal', 'role' => 'form'));?>
	          	  <div class="form-group control-group">
	          	    <label for="inputName" class="col-lg-2 control-label">Name</label>
	          	    <div class="col-lg-6 col-md-8 controls">
	          	      <input type="text" class="form-control" id="inputName" placeholder="Name" name="name">
	          	      <p class="help-block"></p>
	          	    </div>
	          	  </div>
	          	  <div class="form-group control-group">
	          	    <label for="inputSurname" class="col-lg-2 control-label">Surname</label>
	          	    <div class="col-lg-6 col-md-8 controls">
	          	      <input type="text" class="form-control" id="inputSurname" placeholder="Surname" name="surname">
	          	      <p class="help-block"></p>
	          	    </div>
	          	  </div>
	          	  <div class="form-group control-group">
	          	    <label for="inputType" class="col-lg-2 control-label">Type</label>
	          	    <div class="col-lg-6 col-md-8 controls">
	          	      <select name="type" id="inputType" class="form-control">
	          	      	<option value="erasmus">Erasmus</option>
	          	      	<option value="esn">ESNer</option>
	          	      </select>
	          	    </div>
	          	  </div>
	          	  <div class="form-group">
	          	    <label for="inputEmail" class="col-lg-2 control-label">Email</label>
	          	    <div class="col-lg-6 col-md-8 controls">
	          	      <input type="text" class="form-control" id="inputEmail" placeholder="e-mail" name="email">
	          	    </div>
	          	  </div>
	          	  <div class="form-group">
	          	    <label for="inputPhone" class="col-lg-2 control-label">Phone</label>
	          	    <div class="col-lg-6 col-md-8 controls">
	          	      <input type="text" class="form-control" id="inputPhone" placeholder="Phone" name="phone">
	          	    </div>
	          	  </div>
	          	  <div class="form-group control-group">
	          	    <label for="inputSection" class="col-lg-2 control-label">Section</label>
	          	    <div class="col-lg-6 col-md-8 controls">
	          	      <select name="section" id="inputSection" class="form-control">
	          	      	<option value="esn_auth">ESN AUTH</option>
						<option value="esn_uom">ESN UOM</option>
						<option value="esn_ateith">ESN ATEITH</option>
	          	      </select>
	          	    </div>
	          	  </div>
	          	  <div class="form-group">
	          	    <label for="inputCard" class="col-lg-2 control-label">ESN Card</label>
	          	    <div class="col-lg-6 col-md-8 controls">
	          	      <input name="has_esncard" type="checkbox" class="form-control" value="1"/>
	          	    </div>
	          	  </div>
	          	  <div class="form-group">
	          	    <label for="inputCountry" class="col-lg-2 control-label">Country</label>
	          	    <div class="col-lg-6 col-md-8 controls">
	          	      <?php echo esn_countries(); ?>
	          	    </div>
	          	  </div>
	          	  <div class="form-group control-group">
	          	    <label for="inputSemester" class="col-lg-2 control-label">Semester</label>
	          	    <div class="col-lg-6 col-md-8 controls">
	          	      <select name="semester" id="inputSemester" class="form-control">
	          	      	<option value="">-- Select --</option>
						<?php
						// The select field is automatically updated with the current semesters
						$year = date('Y');	// Get the current year
						$month = date('m');	// Get the current month
						if($month < 9) { 	// The academic year ends in August,
							$year -= 1;		// so if the current month is between Jan-Aug,
						}					// it means we are in the second half of the academic year
						$nextYear = $year+1;
						$nextYearString = substr($nextYear,2,2);
						echo "<option value='$year-$nextYearString"."_"."a'>$year-$nextYearString autumn</option>";
						echo "<option value='$year-$nextYearString"."_"."s'>$year-$nextYearString spring</option>";
						echo "<option value='$year-$nextYearString"."_"."f'>$year-$nextYearString full year</option>";		
						?>
	          	      </select>
	          	    </div>
	          	  </div>
	          	  <div class="form-group">
	          	    <div class="col-lg-offset-2 col-lg-6">
	          	      <button type="submit" class="btn btn-primary" name="submit">Save</button>
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

	<!-- hide/show fields according to student type -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#inputType').change(function(){
				if($('#inputType').val() == 'esn') {
					$('#inputCountry').attr('disabled','');
					$('#inputSemester').attr('disabled','');
					$('#inputCountry').addClass('transparent');
					$('#inputSemester').addClass('transparent');
				} else {
					$('#inputCountry').removeAttr('disabled');
					$('#inputSemester').removeAttr('disabled');
					$('#inputCountry').removeClass('transparent');
					$('#inputSemester').removeClass('transparent');
				}
			});
		});
	</script>

	<!-- form validation -->
	<script data-cfasync="false" type="text/javascript">
		$(function(){
			$('.form-horizontal').validate({
			    rules: {
			        name: {
			            required: true
			        },
			        surname: {
			            required: true
			        },
			        type: {
			            required: true
			        },
			        semester: {
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
