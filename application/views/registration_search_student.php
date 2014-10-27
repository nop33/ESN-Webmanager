    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>site">Home</a></li>
      <li><a href="<?php echo base_url() ?>registration">Select event</a></li>
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
            <?php if($this->input->get('success')) { ?>
              <div class="row">
              <?php if($this->input->get('success')=='true') { ?>
                <div class="alert alert-dismissable alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Success!</strong> Student was succesfully registered! Register the next one!
                </div>
              <?php } else { ?>
                <div class="alert alert-dismissable alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Registration failed!</strong> Probably the user is already registered. Check the registration of
                  <a href="<?php echo base_url() ?>event/registrations/<?php echo $this->uri->segment(3); ?>">this event</a>.
                </div>
              <?php } ?>
              </div> <!-- row end -->
            <?php } ?>
            <div class="row">
                <?php
                if($event->maxNumPeople == 0) {
                  $event->maxNumPeople = $registrations->total;
                }
                $presentage = round(($registrations->total / $event->maxNumPeople) * 100);
                $progressbar_type = 'info';
                if($presentage < 80) {
                } else if($presentage < 100) {
                  $progressbar_type = 'warning';
                } else {
                  $progressbar_type = 'danger';
                }
                ?>
                <p>Availability: <?php echo $registrations->total."/".$event->maxNumPeople; ?> reserved</p>
                <div class="progress">
                  <div class="progress-bar progress-bar-<?php echo $progressbar_type; ?>" role="progressbar" aria-valuenow="<?php echo $presentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $presentage; ?>%">
                    <?php echo $presentage; ?>%
                    <span class="sr-only"><?php echo $presentage; ?>% Complete</span>
                  </div>
                </div>
            </div>
            <div class="row">
              <div id="quicksearch-container" class="col-sm-10">
                <form class="form-inline" role="form">
                  <div class="form-group fullwidth">
                      <label class="sr-only" for="quicksearch">Quicksearch</label>
                      <input type="text" class="form-control" id="quicksearch" placeholder="Quicksearch" data-toggle="tooltip" data-placement="right" title="Search using the name of the student">
                  </div>
                </form>
              </div>
              <div class="col-sm-2 hidewhensmall helpbox" data-toggle="tooltip" data-placement="left" title="Use the quicksearch field to find students by their name. When you find the student you are looking for, click on the name to proceed the registration.">
                <span class="glyphicon glyphicon-question-sign"></span> Need help?
              </div>
            </div>

            <div class="row" id="student-pills">
                <ul class="nav nav-pills" id="myStudentTabs">
                  <?php 
                  $i = 1;
                  foreach ($ay_titles as $title) {
                    if($i == 1) {
                      echo '<li class="active"><a href="#studentTab1" data-toggle="tab">'.$title.'</a></li>'; 
                    } else {
                      echo '<li><a href="#studentTab'.$i.'" data-toggle="tab">'.$title.'</a></li>';
                    }
                    $i++;
                  } ?>
                  <li><a href="#esnersTab" data-toggle="tab">ESNers</a></li>
                </ul>
            </div>
            <div class="row">
              <div class="tab-content">
                <?php
                $i = 1;
                foreach ($records as $students) {
                  if($i == 1) {
                    echo '<div class="tab-pane active" id="studentTab1">';
                  } else {
                    echo '<div class="tab-pane" id="studentTab'.$i.'">';
                  }
                  if (!empty($students)) {
                    echo "<table class='table table-striped table-hover'>";
                    $counter = 1;
                    foreach($students as $student) {
                      echo "<tr><td>$counter</td><td>";
                      echo anchor("registration/student/$student->id","$student->name $student->surname",array('class' => 'underlined'));
                      echo "</td></tr>";
                      $counter++; 
                    }
                    echo "</table>";
                  } else {
                    echo '<div class="alert alert-warning" role="alert">No events found for this academic year.</div>';
                  }
                  echo '</div>';
                  
                  $i++;
                }
                ?>
                <div class="tab-pane" id="esnersTab">
                  <?php
                    $counter=1;
                    echo "<table class='table table-striped table-hover'>";
                    foreach($recordsESNers as $student) {
                      echo "<tr><td>$counter</td><td>";
                      echo anchor("registration/student/$student->id","$student->name $student->surname");
                      echo "</td></tr>";
                      $counter++;   
                    }
                    echo "</table>";
                  ?>
                </div>
              </div>
            </div><!--/row-->
	        </div><!--/span-->

	        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
            <div class="buttons-container">
              <a href="<?php echo base_url() ?>student/create" type="button" class="btn btn-success btn-block" data-toggle="offcanvas">
                <span class="glyphicon glyphicon-plus"></span> New student
              </a>
            </div>
	          <div class="well sidebar-nav">
	            <ul class="nav nav-pills nav-stacked">
	              <li ><a href="<?php echo base_url() ?>event">Events</a></li>
	        	    <li><a href="<?php echo base_url() ?>student">Students</a></li>
                <li><a href="<?php echo base_url() ?>registration">Registration</a></li>
	        	    <li><a href="<?php echo base_url() ?>shareIt">Share it!</a></li>
	            </ul>
	          </div><!--/.well -->
	        </div><!--/span-->
	      </div><!--/row-->
	  </div>
    </div> <!-- /container -->

    <script type="text/javascript">
      $(function () {
          $('#myTabs a:first').tab('show')
        })
      $('input#quicksearch').quicksearch('table tbody tr');
      $('input#quicksearch').tooltip();
      $('.helpbox').tooltip();
    </script>