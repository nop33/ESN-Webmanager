    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>site">Home</a></li>
      <li><a href="<?php echo base_url() ?>registration">Select event</a></li>
      <li><a href="#">Select student</a></li>
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
            <?php
              $student_data = $records['student_data'];
              $event_data = $records['event_data'];
            ?>
            <div class="row alert alert-warning" id="mainColumn-payment-notice">
              <?php if($student_data->has_esncard) {
                echo "Ο/Η $student_data->name έχει ESN card. Πρέπει να πληρώσει <span class='payment-empasize'>$event_data->fee_with &euro;</span>";
              }
              else {
                echo "Ο/Η $student_data->name δεν έχει ESN card. Πρέπει να πληρώσει <span class='payment-empasize'>$event_data->fee_without &euro;</span>";
              }?>
            </div>
              <div class="row">
              <?php echo form_open("registration/register/$student_data->id",array('class' => 'form-horizontal', 'role' => 'form'));?>
                <div class="well">
                <div class="form-group">
                  <label for="inputName" class="col-lg-2 control-label">Paid</label>
                  <div class="col-lg-6">
                    <input type="text" class="form-control" id="inputName" placeholder="&euro;" name="paid">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNotes" class="col-lg-2 control-label">Notes</label>
                  <div class="col-lg-6">
                    <textarea class="form-control" id="inputNotes" placeholder="Place your notes" name="notes"></textarea>
                  </div>
                </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-6">
                    <button type="submit" class="btn btn-success btn-block" name="submit">
                      <span class="glyphicon glyphicon-floppy-disk"></span> Save registration
                    </button>
                  </div>
                </div>
              <?php echo form_close()?>
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
                <div>
                  <?php if(!$student_data->has_esncard) {?>
                    <a type="button" class="btn btn-primary btn-block" href="<?php echo base_url() ?>student/updateCard/<?php echo $student_data->id; ?>" onclick="return confirm('Give student <?php echo $student_data->name; ?> an ESN Card?');"> Update ESN Card</a>
                  <?php } ?>
                </div>
              </form>
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
