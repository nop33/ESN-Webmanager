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
	          	<?php echo form_open("student/update/$student->id",array('class' => 'form-horizontal', 'role' => 'form'));?>
	          	  <div class="form-group">
	          	    <label for="inputName" class="col-lg-2 control-label">Name</label>
	          	    <div class="col-lg-6">
	          	      <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="<?php echo $student->name ?>">
	          	    </div>
	          	  </div>
	          	  <div class="form-group">
	          	    <label for="inputSurname" class="col-lg-2 control-label">Surname</label>
	          	    <div class="col-lg-6">
	          	      <input type="text" class="form-control" id="inputSurname" placeholder="Surname" name="surname" value="<?php echo $student->surname ?>">
	          	    </div>
	          	  </div>
	          	  <div class="form-group">
	          	    <label for="inputType" class="col-lg-2 control-label">Type</label>
	          	    <div class="col-lg-6">
	          	      <select name="type" id="inputType" class="form-control">
	          	      	<?php if($student->type == "erasmus") {
	          	      		echo "<option selected value='erasmus'>Erasmus</option>";
	          	      	}
	          	      	else {
	          	      		echo "<option value='erasmus'>Erasmus</option>";
	          	      	}
	          	      	if($student->type == "esn") {
	          	      		echo "<option selected value='esn'>ESNer</option>";
	          	      	}
	          	      	else {
	          	      		echo "<option value='esn'>ESNer</option>";
	          	      	}
	          	      	?>
	          	      </select>
	          	    </div>
	          	  </div>
	          	  <div class="form-group">
	          	    <label for="inputEmail" class="col-lg-2 control-label">Email</label>
	          	    <div class="col-lg-6">
	          	      <input type="text" class="form-control" id="inputEmail" placeholder="Email" name="email" value="<?php echo $student->email ?>">
	          	    </div>
	          	  </div>
	          	  <div class="form-group">
	          	    <label for="inputPhone" class="col-lg-2 control-label">Phone</label>
	          	    <div class="col-lg-6">
	          	      <input type="text" class="form-control" id="inputPhone" placeholder="Phone" name="phone" value="<?php echo $student->phone ?>">
	          	    </div>
	          	  </div>
	          	  <div class="form-group">
	          	    <label for="inputSection" class="col-lg-2 control-label">Section</label>
	          	    <div class="col-lg-6">
	          	      <select name="section" id="inputSection" class="form-control">
	          	      	<?php if($student->section == "esn_auth") {
	          	      		echo "<option selected value='esn_auth'>ESN AUTH</option>";
	          	      	}
	          	      	else {
	          	      		echo "<option value='esn_auth'>ESN AUTH</option>";
	          	      	}
	          	      	if($student->section == "esn_uom") {
	          	      		echo "<option selected value='esn_uom'>ESN UOM</option>";
	          	      	}
	          	      	else {
	          	      		echo "<option value='esn_uom'>ESN UOM</option>";
	          	      	}
	          	      	if($student->section == "esn_ateith") {
	          	      		echo "<option selected value='esn_ateith'>ESN ATEITH</option>";
	          	      	}
	          	      	else {
	          	      		echo "<option value='esn_ateith'>ESN ATEITH</option>";
	          	      	}
	          	      	?>
	          	      </select>
	          	    </div>
	          	  </div>
	          	  <div class="form-group">
	          	    <label for="inputCard" class="col-lg-2 control-label">ESN Card</label>
	          	    <div class="col-lg-6">
	          	      <input name="has_esncard" type="checkbox" class="form-control" value="1" <?php if($student->has_esncard){ echo "checked"; } ?>/>
	          	    </div>
	          	  </div>
	          	  <?php if($student->type != 'esn') { ?>
	          	  <div class="form-group">
	          	    <label for="inputCountry" class="col-lg-2 control-label">Country</label>
	          	    <div class="col-lg-6">
	          	      <?php echo esn_countries(); ?>
	          	    </div>
	          	  </div>
	          	  <div class="form-group">
	          	    <label for="inputSemester" class="col-lg-2 control-label">Semester</label>
	          	    <div class="col-lg-6">
	          	      <select name="semester" id="inputSemester" class="form-control">
	          	      	<?php
	          	      		// the select field is automatically updated with the past years semesters,
	          	      		// the current ones and the next ones
	          	      		$startYear = '2012';
	          	      		$currentYear = date('Y');
	          	      		$differencePlus = $currentYear - $startYear + 2;
	          	      		for($i=0; $i<$differencePlus; $i++) {
	          	      			$startYear = '2012';
	          	      			$startYear = $startYear+$i;
	          	      			$nextYear = $startYear+1;
	          	      			$nextYearString = substr($nextYear,2,2);
	          	      			$fullStringA = "$startYear-$nextYearString"."_"."a";
	          	      			$fullStringS = "$startYear-$nextYearString"."_"."s";
	          	      			$fullStringF = "$startYear-$nextYearString"."_"."f";
	          	      			$selectedOptionA = "";
	          	      			$selectedOptionS = "";
	          	      			$selectedOptionF = "";
	          	      			if($student->semester == $fullStringA) {
	          	      				$selectedOptionA = "selected";
	          	      			} else if($student->semester == $fullStringS) {
	          	      				$selectedOptionS = "selected";
	          	      			} else if($student->semester == $fullStringF) {
	          	      				$selectedOptionF = "selected";
	          	      			}
	          	      			echo "<option value='$startYear-$nextYearString"."_"."a' $selectedOptionA>$startYear-$nextYearString autumn</option>";
	          	      			echo "<option value='$startYear-$nextYearString"."_"."s' $selectedOptionS>$startYear-$nextYearString spring</option>";
	          	      			echo "<option value='$startYear-$nextYearString"."_"."f' $selectedOptionF>$startYear-$nextYearString full year</option>";
	          	      		}
	          	      	?>
	          	      </select>
	          	    </div>
	          	  </div>
	          	  <?php } else { ?>
	          	  <!-- problem here -->
	          	  <div class="form-group">
	          	    <label for="input" class="col-lg-2 control-label">ESN Card</label>
	          	    <div class="col-lg-6">
	          	      <input name="has_esncard" type="checkbox" class="form-control" value="1" <?php if($student->has_esncard){ echo "checked"; } ?>/>
	          	    </div>
	          	  </div>
	          	  <input type='hidden' value="<?php echo $student->country ?>" name='country'/>
	          	  <input type='hidden' value="<?php echo $student->semester ?>" name='semester'/>
	          	  <?php } ?>
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
	        	  <li><a href="<?php echo base_url() ?>site/share">Share it!</a></li>
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
