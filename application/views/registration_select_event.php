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
            <div class="row" id="event-pills">
              <ul class="nav nav-pills" id="myTabs">
                <?php
                $i = 1;
                foreach ($ay_titles as $title) {
                  if($i == 1) {
                    echo '<li class="active"><a href="#tab1" data-toggle="tab">'.$title.'</a></li>';
                  } else {
                    echo '<li><a href="#tab'.$i.'" data-toggle="tab">'.$title.'</a></li>';
                  }
                  $i++;
                } ?>
              </ul>
            </div>
            <div class="row">
              <div class="tab-content">
                <?php
                $i = 1;
                foreach ($records as $events) {
                  if($i == 1) {
                    echo '<div class="tab-pane active" id="tab1">';
                  } else {
                    echo '<div class="tab-pane" id="tab'.$i.'">';
                  }
                  if (!empty($events)) {
                    echo '<div class="list-group">';
                    foreach($events as $event) {
                      echo anchor("registration/event/$event->id","$event->name",array('class' => 'list-group-item'));
                    }
                    echo '</div>';
                  } else {
                    echo '<div class="alert alert-warning" role="alert">No events found for this academic year.</div>';
                  }
                  echo '</div>';
                  $i++;
                }
                ?>
              </div>
            </div><!--/row-->
            </div><!--/span-->

            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
              <div class="buttons-container">
                  <a href="<?php echo base_url() ?>event/create" type="button" class="btn btn-success btn-block" data-toggle="offcanvas">
                    <span class="glyphicon glyphicon-plus"></span> New event
                  </a>
              </div>

              <div class="well sidebar-nav">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="<?php echo base_url() ?>event">Events</a></li>
                    <li><a href="<?php echo base_url() ?>student">Students</a></li>
                    <li class="active"><a href="#">Registration</a></li>
                    <li><a href="<?php echo base_url() ?>shareIt">Share it!</a></li>
                </ul>
              </div><!--/.well -->
            </div><!--/span-->
          </div><!--/row-->
      </div>
    </div> <!-- /container -->
