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
              <?php
                if(isset($student)) {
              ?>
              <form class="form-horizontal" role="form">
                <div class="form-group">
                  <label class="col-lg-2 control-label">Name</label>
                  <div class="col-lg-10">
                    <p class="form-control-static"><?php echo $student->name ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Surname</label>
                  <div class="col-lg-10">
                    <p class="form-control-static"><?php echo $student->surname ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Email</label>
                  <div class="col-lg-10">
                    <p class="form-control-static"><?php echo $student->email ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Phone</label>
                  <div class="col-lg-10">
                    <p class="form-control-static"><?php echo $student->phone ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Section</label>
                  <div class="col-lg-10">
                    <p class="form-control-static">
                      <?php if($student->section == "esn_auth") {
                          echo "ESN AUTH";
                      }
                      elseif($student->section == "esn_uom") {
                          echo "ESN UOM";
                      } elseif($student->section == "esn_ateith") {
                          echo "ESN ATEITH";
                      } ?>
                    </p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Type</label>
                  <div class="col-lg-10">
                    <p class="form-control-static">
                      <?php if($student->type == 'erasmus') {
                          echo "Erasmus";
                      }
                      else if($student->type == 'esn'){
                          echo "ESNer";
                      } ?>
                    </p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">ESN card</label>
                  <div class="col-lg-10">
                    <p class="form-control-static">
                      <?php if($student->has_esncard) {
                          echo "<img src='".base_url()."images/check.png' width='16px'/>";
                      }
                      else {
                          echo "<img src='".base_url()."images/delete.png'/>";
                      } ?>
                    </p>
                  </div>
                </div>
                <?php if($student->type != 'esn') { ?>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Country</label>
                  <div class="col-lg-10">
                    <p class="form-control-static"><?php echo $student->country ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Semester</label>
                  <div class="col-lg-10">
                    <p class="form-control-static">
                      <?php
                                                                                  // expression: YYYY-YY_a
                          $semesterYear     = substr($student->semester, 0, -5);    // get the first 4 chars
                          $semesterSeason    = substr($student->semester, 8, 1);        // get the last char
                          $semesterYearPlus = $semesterYear+1;
                          switch ($semesterSeason) {
                              case 'a':
                                  $semesterSeason = 'autumn';
                                  break;
                              case 's':
                                  $semesterSeason = 'spring';
                                  break;
                              case 'f':
                                  $semesterSeason = 'full year';
                                  break;
                              default:
                                  break;
                          }
                          echo "$semesterYear-$semesterYearPlus $semesterSeason";
                      ?>
                    </p>
                  </div>
                </div>
                <?php } ?>
              </form>
              <?php
                }
              ?>
              </div><!--/row-->
            </div><!--/span-->

            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
              <div class="buttons-container">
                  <a href="<?php echo base_url() ?>student/update/<?php echo $student->id; ?>" type="button" class="btn btn-info btn-block" data-toggle="offcanvas">
                <span class="glyphicon glyphicon-edit"></span> Edit student
              </a>
              <a href="<?php echo base_url() ?>student/delete/<?php echo $student->id; ?>" type="button" class="btn btn-danger btn-block" data-toggle="offcanvas" onclick="return confirm('Really delete?');">
                <span class="glyphicon glyphicon-minus"></span> Delete student
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
