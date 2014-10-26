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
	          <?php if($this->input->get('deleted')) { ?>
	            <div class="row">
	            <?php if($this->input->get('deleted')=='true') { ?>
	              <div class="alert alert-dismissable alert-success">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <strong>Success!</strong> Student's registration was succesfully deleted!
	              </div>
	            <?php } else { ?>
	              <div class="alert alert-dismissable alert-danger">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <strong>Failed!</strong> Oups :/ ... Copy the URL and send it to Ilia.
	              </div>
	            <?php } ?>
	            </div> <!-- row end -->
	          <?php } ?>
	          <div class="row">
	            <?php if(@$records): ?>
	              <div class="">
	              	<?php 
	              	if($event->maxNumPeople == 0) {
	              		$event->maxNumPeople = sizeof($records);
	              	}
	              	$presentage = round((sizeof($records) / $event->maxNumPeople) * 100); ?>
	              	<p>Availability: <?php echo sizeof($records)."/".$event->maxNumPeople; ?> reserved</p>
	              	<div class="progress">
	              	  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo $presentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $presentage; ?>%">
	              	    <?php echo $presentage; ?>%
	              	    <span class="sr-only"><?php echo $presentage; ?>% Complete</span>
	              	  </div>
	              	</div>
	              </div>
	              <table class="table">
	            <?php
	              $counter=1;
	              $summary = 0;
	              echo "<tr><td colspan='5'>Erasmus:</td></tr>";
	              foreach($records as $student) {
	            	if($student->type == 'erasmus') {
	            	  echo "<tr'><td>$counter</td><td>";
	            	  echo anchor("registration/details/$student->event_id/$student->id","$student->name $student->surname");
	            	  echo "</td><td>";
	            	  echo anchor("registration/update/$student->event_id/$student->id","edit");
	            	  echo "</td><td>";
	            	  echo anchor(
	            	    "registration/delete/$student->event_id/$student->id",
	            		"delete registration",
	            	    'onclick="return confirm(\'Really delete?\');"'
	            		);
	            	  echo "</td><td>";
	            	  echo $student->paid."&euro;";
	            	  echo "</td></tr>";
	            	  $counter++;	
	            	  $summary += $student->paid;
	            	}
	              }
	              echo "<tr><td colspan='5'>ESNers:</td></tr>";
	              foreach($records as $student) {
	                if($student->type == 'esn') {
	            	  echo "<tr><td>$counter</td><td>";
	            	  echo anchor("registration/details/$student->event_id/$student->id","$student->name $student->surname");
	            	  echo "</td><td>";
	            	  echo anchor("registration/update/$student->event_id/$student->id","edit");
	                  echo "</td><td>";
	            	  echo anchor(
	            	    "registration/delete/$student->event_id/$student->id",
	            		"delete registration",
	            	    'onclick="return confirm(\'Really delete?\');"'
	            		);
	            	  echo "</td><td>";
	            	  echo $student->paid."&euro;";
	            	  echo "</td></tr>";
	            	  $counter++;	
	            	  $summary += $student->paid;
	            	}
	              }
	            ?>
	          </table>
	          <div class="well">Σύνολο: <?php echo $summary; ?>&euro;</div>
	          <?php else: ?>
	            <div class="well">No records available :(</div>
	          <?php endif; ?>
	          </div><!--/row-->
	        </div><!--/span-->

	        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
	          <div class="buttons-container">
	          	<a href="<?php echo base_url() ?>registration/printList/<?php echo $eventId; ?>" type="button" class="btn btn-primary btn-block" data-toggle="offcanvas">
	          	  <span class="glyphicon glyphicon-floppy-save"></span> Download PDF
	          	</a>
	          	<a href="<?php echo base_url() ?>registration/event/<?php echo $this->uri->segment(3); ?>" type="button" class="btn btn-success btn-block" data-toggle="offcanvas">
	          	  <span class="glyphicon glyphicon-plus"></span> Register a student
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
