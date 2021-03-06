    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>site">Home</a></li>
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
                  <strong>Success!</strong> The student was succesfully deleted!
                </div>
              <?php } else { ?>
                <div class="alert alert-dismissable alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Failed!</strong> The student is already registered to some events. You cannot delete this record!
                </div>
              <?php } ?>
              </div> <!-- row end -->
            <?php } ?>
            <?php if($this->input->get('success')) { ?>
              <div class="row">
              <?php if($this->input->get('success')=='true') { ?>
                <div class="alert alert-dismissable alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Success!</strong> Student was succesfully created!
                </div>
              <?php } else { ?>
                <div class="alert alert-dismissable alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Failed!</strong> Probably the student already exists.
                </div>
              <?php } ?>
              </div> <!-- row end -->
            <?php } ?>
            <div class="row">
              <div id="quicksearch-container">
                <form class="form-inline" role="form">
                  <div class="form-group">
                      <label class="sr-only" for="quicksearch">Quicksearch</label>
                      <input type="text" class="form-control" id="quicksearch" placeholder="Quicksearch" data-toggle="tooltip" data-placement="right" title="Search using the name of the student">
                  </div>
                </form>
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
                      echo anchor("student/details/$student->id","$student->name $student->surname",array('class' => 'underlined'));
                      echo "</td><td>";
                      echo anchor("student/update/$student->id","edit");
                      echo "</td><td>";
                      echo anchor("student/delete/$student->id","delete",'onclick="return confirm(\'Really delete?\');"');
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
                      echo anchor("student/details/$student->id","$student->name $student->surname");
                      echo "</td><td>";
                      echo anchor("student/update/$student->id","edit");
                      echo "</td><td>";
                      echo anchor("student/delete/$student->id","delete",'onclick="return confirm(\'Really delete?\');"');
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
                    <li class="active"><a href="<?php echo base_url() ?>student">Students</a></li>
                <li><a href="<?php echo base_url() ?>registration">Registration</a></li>
                    <li><a href="<?php echo base_url() ?>site/share">Share it!</a></li>
                </ul>
              </div><!--/.well -->
            </div><!--/span-->
          </div><!--/row-->
        </div>
    </div> <!-- /container -->

    <script src="<?php echo base_url() ?>js/jquery.quicksearch.js?"></script>
    <script type="text/javascript">
      $(function () {
          $('#myTabs a:first').tab('show')
        })
      $('input#quicksearch').quicksearch('table tbody tr');
      $('input#quicksearch').tooltip();
    </script>
