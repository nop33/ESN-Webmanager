    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>site">Home</a></li>
      <li><a href="<?php echo base_url() ?>event">Events</a></li>
      <li><a href="<?php echo base_url() ?>event/details/<?php echo $event_data->id; ?>"><?php echo $event_data->name; ?></a></li>
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
	          <div class="row well">
	          		<form class="form-horizontal col-lg-6" role="form">
	          		    <div class="form-group">
	          		      <label class="col-lg-4 control-label">Paid</label>
	          		      <div class="col-lg-8">
	          		        <p class="form-control-static"><?php echo $registration->paid ?></p>
	          		      </div>
	          		    </div>
	          		    <div class="form-group">
	          		      <label class="col-lg-4 control-label">Notes</label>
	          		      <div class="col-lg-8">
	          		        <p class="form-control-static"><?php echo $registration->notes ?></p>
	          		      </div>
	          		    </div>
	          		</form>
	          </div>
	          <div class="row">
              <form class="form-horizontal col-lg-6" role="form">
              	<h3>Event details</h3>
                <div class="form-group">
                  <label class="col-lg-4 control-label">Name</label>
                  <div class="col-lg-8">
                    <p class="form-control-static"><?php echo $event_data->name ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-4 control-label">Date</label>
                  <div class="col-lg-8">
                    <p class="form-control-static"><?php echo $event_data->date ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-4 control-label">Fee with ESN Card</label>
                  <div class="col-lg-8">
                    <p class="form-control-static"><?php echo $event_data->fee_with ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-4 control-label">Fee without</label>
                  <div class="col-lg-8">
                    <p class="form-control-static"><?php echo $event_data->fee_without ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-4 control-label">Max number of people</label>
                  <div class="col-lg-8">
                    <p class="form-control-static"><?php echo $event_data->maxNumPeople ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-4 control-label">Notes</label>
                  <div class="col-lg-8">
                    <p class="form-control-static"><?php echo $event_data->notes ?></p>
                  </div>
                </div>
              </form>
              <form class="form-horizontal col-lg-6" role="form">
              	<h3>Student details</h3>
                <div class="form-group">
                  <label class="col-lg-4 control-label">Name</label>
                  <div class="col-lg-8">
                    <p class="form-control-static"><?php echo $student_data->name; ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-4 control-label">Surname</label>
                  <div class="col-lg-8">
                    <p class="form-control-static"><?php echo $student_data->surname; ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-4 control-label">Country</label>
                  <div class="col-lg-8">
                    <p class="form-control-static"><?php echo $student_data->country; ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-4 control-label">Email</label>
                  <div class="col-lg-8">
                    <p class="form-control-static"><?php echo $student_data->email; ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-4 control-label">Phone</label>
                  <div class="col-lg-8">
                    <p class="form-control-static"><?php echo $student_data->phone; ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-4 control-label">ESN Card</label>
                  <div class="col-lg-8">
                    <p class="form-control-static">
 					  <?php if($student_data->has_esncard) { 
 					  	echo "<img src='".base_url()."images/check.png' width='16px'/>";
 					  }
 					  else {
 					  	echo "<img src='".base_url()."images/delete.png'/>";
 					  } ?>
                    </p>
                  </div>
                </div>
              </form>
	          </div><!--/row-->
	          <div class="row">
	            <a href="<?php echo base_url() ?>registration/update/<?php echo $event_data->id."/".$student_data->id; ?>" type="button" class="btn btn-info btn-block" data-toggle="offcanvas">
	          	  <span class="glyphicon glyphicon-edit"></span> Edit registration
	          	</a>
	          	<a href="<?php echo base_url() ?>registration/delete/<?php echo $event_data->id."/".$student_data->id; ?>" type="button" class="btn btn-danger btn-block" data-toggle="offcanvas" onclick="return confirm('Really delete?');">
	          	  <span class="glyphicon glyphicon-minus"></span> Delete registration
	            </a>
	          </div>
	        </div><!--/span-->

	        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
	          <div class="buttons-container">
	          	<a href="<?php echo base_url() ?>registration/update/<?php echo $event_data->id."/".$student_data->id; ?>" type="button" class="btn btn-info btn-block" data-toggle="offcanvas">
                  <span class="glyphicon glyphicon-edit"></span> Edit registration
                </a>
                <a href="<?php echo base_url() ?>registration/delete/<?php echo $event_data->id."/".$student_data->id; ?>" type="button" class="btn btn-danger btn-block" data-toggle="offcanvas" onclick="return confirm('Really delete?');">
                  <span class="glyphicon glyphicon-minus"></span> Delete registration
                </a>
	          </div>
	          
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
