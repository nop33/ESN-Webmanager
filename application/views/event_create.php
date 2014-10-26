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
	          <div class="row">
                                
	          	<?php echo form_open('event/create',array('class' => 'form-horizontal', 'role' => 'form'));?>
                
                <div class="form-group control-group">
                  <label for="inputType" class="col-lg-2 control-label">Type</label>
                  <div class="col-lg-6 controls" >
                    <div class="radio">
                      <label id="trip">
                        <input type="radio" name="type" id="inputTypeTrip" value="1" checked>
                        Trip
                      </label>
                    </div>
                    <div class="radio">
                      <label id="event">
                        <input type="radio" name="type" id="inputTypeEvent" value="2">
                        Event
                      </label>
                    </div>
                  </div>
                </div>
	          	  <div class="form-group control-group">
	          	    <label for="inputName" class="col-lg-2 control-label">Name</label>
	          	    <div class="col-lg-6 controls">
	          	      <input type="text" class="form-control" id="inputName" placeholder="Name" name="name">
	          	    </div>
	          	  </div>
	          	  <div class="form-group control-group">
	          	    <label for="inputDate" class="col-lg-2 control-label">Date</label>
	          	    <div class="col-lg-6 controls">
	          	      <input type="text" class="form-control" id="inputDate" placeholder="Date" name="date">
	          	    </div>
	          	  </div>
                <div class="form-group control-group">
                  <label for="inputFeeWith" class="col-lg-2 control-label">Fee with ESN Card</label>
                  <div class="col-lg-6 controls input-group">
                    <span class="input-group-addon">&euro;</span>
                    <input type="text" class="form-control" id="inputFeeWith" placeholder="Fee with" name="feewith">
                  </div>
                </div>
                <div class="form-group control-group">
                  <label for="inputFeeWithout" class="col-lg-2 control-label">Fee without ESN Card</label>
                  <div class="col-lg-6 controls input-group">
                    <span class="input-group-addon">&euro;</span>
                    <input type="text" class="form-control" id="inputFeeWithout" placeholder="Fee without" name="feewithout">
                  </div>
                </div>
                <div class="form-group control-group">
                  <label for="inputMaxPeople" class="col-lg-2 control-label">Max number of people</label>
                  <div class="col-lg-6 controld">
                    <input type="text" class="form-control" id="inputMaxPeople" placeholder="Max people" name="maxNumPeople">
                  </div>
                </div>
                <div class="form-group control-group">
                  <label for="inputStartTime" class="col-lg-2 control-label">Start Time</label>
                  <div class="col-lg-6 controls">
                    <input type="text" class="form-control" id="inputStartTime" placeholder="Start Time" name="starttime" disabled>
                  </div>
                </div>
                <div class="form-group control-group">
                  <label for="inputEndTime" class="col-lg-2 control-label">End Time</label>
                  <div class="col-lg-6 controls">
                    <input type="text" class="form-control" id="inputEndTime" placeholder="End Time" name="endtime" disabled>
                  </div>
                </div>
                <div class="form-group control-group">
                  <label for="inputPlace" class="col-lg-2 control-label">Place</label>
                  <div class="col-lg-6 controld">
                    <input type="text" class="form-control" id="inputPlace" placeholder="Place" name="place" disabled>
                  </div>
                </div>
	          	  <div class="form-group">
	          	    <label for="inputNotes" class="col-lg-2 control-label">Notes</label>
	          	    <div class="col-lg-6">
	          	      <textarea class="form-control" id="inputNotes" placeholder="Place your notes" name="notes"></textarea>
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

    <script data-cfasync="false" type="text/javascript">
	    $(function() {
	      $( "#inputDate" ).datepicker({ format: 'yyyy-mm-dd' });
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
                date: {
                    required: true
                },
                feewith: {
                    required: true
                },
                feewithout: {
                    required: true
                },
                maxNumPeople: {
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
    <script type="text/javascript">
      $('#trip').click(function() {
        $("form.form-horizontal input").prop("disabled", false);
        $('#inputStartTime').attr('disabled','');
        $('#inputEndTime').attr('disabled','');
        $('#inputPlace').attr('disabled','');
      });
      $('#event').click(function() {
        $("form.form-horizontal input").prop("disabled", false);
        $('#inputFeeWithout').attr('disabled','');
        $('#inputFeeWith').attr('disabled','');
        $('#inputMaxPeople').attr('disabled','');
      });
      $(function(){
        $('#inputStartTime').pickatime({
          formatSubmit: 'HH:i',
          formatLabel: 'HH:i',
          format: 'HH:i'
        });
        $('#inputStartTime').attr('readonly',false);
        $('#inputEndTime').pickatime({
          formatSubmit: 'HH:i',
          formatLabel: 'HH:i',
          format: 'HH:i'
        });
        $('#inputEndTime').attr('readonly',false);
      });
      $(document).ready(function(){
        $("[data-toggle=popover]").popover('show');
      });
    </script>
