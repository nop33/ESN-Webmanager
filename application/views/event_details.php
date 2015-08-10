    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>site">Home</a></li>
      <li><a href="<?php echo base_url() ?>event">Events</a></li>
      <li class="active">
        <?php
          if(isset($event)) {
            echo $event->name;
          }
        ?>
      </li>
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
                if(isset($event)) {
              ?>
              <form class="form-horizontal" role="form">
                <div class="form-group">
                  <label class="col-lg-2 control-label">Name</label>
                  <div class="col-lg-10">
                    <p class="form-control-static"><?php echo $event->name ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Date</label>
                  <div class="col-lg-10">
                    <p class="form-control-static"><?php echo $event->date ?></p>
                  </div>
                </div>
                <?php if($event->type == 1) { ?>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Fee with ESN Card</label>
                  <div class="col-lg-10">
                    <p class="form-control-static"><?php echo $event->fee_with ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Fee without</label>
                  <div class="col-lg-10">
                    <p class="form-control-static"><?php echo $event->fee_without ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Max number of people</label>
                  <div class="col-lg-10">
                    <p class="form-control-static"><?php echo $event->maxNumPeople ?></p>
                  </div>
                </div>
                <?php } else if($event->type == 2) { ?>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Start time</label>
                  <div class="col-lg-10">
                    <p class="form-control-static"><?php echo $event->starttime ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">End time</label>
                  <div class="col-lg-10">
                    <p class="form-control-static"><?php echo $event->endtime ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Place</label>
                  <div class="col-lg-10">
                    <p class="form-control-static"><?php echo $event->place ?></p>
                  </div>
                </div>
                <?php } ?>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Notes</label>
                  <div class="col-lg-10">
                    <p class="form-control-static"><?php echo $event->notes ?></p>
                  </div>
                </div>
              </form>
              <?php
                }
              ?>
              </div><!--/row-->
            </div><!--/span-->

            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
              <div class="buttons-container">
                  <a href="<?php echo base_url() ?>event/update/<?php echo $event->id; ?>" type="button" class="btn btn-info btn-block" data-toggle="offcanvas">
                <span class="glyphicon glyphicon-edit"></span> Edit event
              </a>
              <a href="<?php echo base_url() ?>event/registrations/<?php echo $event->id; ?>" type="button" class="btn btn-primary btn-block" data-toggle="offcanvas">
                <span class="glyphicon glyphicon-th-list"></span> Registrations
              </a>
              <a href="<?php echo base_url() ?>event/create" type="button" class="btn btn-success btn-block" data-toggle="offcanvas">
                <span class="glyphicon glyphicon-plus"></span> New event
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

