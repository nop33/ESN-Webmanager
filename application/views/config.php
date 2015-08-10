    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>site">Home</a></li>
      <li class="active">Configuration</li>
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
              <div>
                <?php echo form_open('config/save',array('class' => 'form-horizontal', 'role' => 'form'));?>
                <div class="form-group">
                  <div class="col-xs-12 col-sm-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">Active academic years</h3>
                      </div>
                      <div class="panel-body">
                        <div class="checkbox">
                          <label>
                            <input type='checkbox' name='active_years[]' value='2012' <?php if(in_array('2012', $active_years)) { echo 'checked'; }?>> 2012-13
                          </label>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type='checkbox' name='active_years[]' value='2013' <?php if(in_array('2013', $active_years)) { echo 'checked'; }?>> 2013-14
                          </label>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type='checkbox' name='active_years[]' value='2014' <?php if(in_array('2014', $active_years)) { echo 'checked'; }?>> 2014-15
                          </label>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type='checkbox' name='active_years[]' value='2015' <?php if(in_array('2015', $active_years)) { echo 'checked'; }?>> 2015-16
                          </label>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type='checkbox' name='active_years[]' value='2016' <?php if(in_array('2016', $active_years)) { echo 'checked'; }?>> 2016-17
                          </label>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type='checkbox' name='active_years[]' value='2017' <?php if(in_array('2017', $active_years)) { echo 'checked'; }?>> 2017-18
                          </label>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type='checkbox' name='active_years[]' value='2018' <?php if(in_array('2018', $active_years)) { echo 'checked'; }?>> 2018-19
                          </label>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type='checkbox' name='active_years[]' value='2019' <?php if(in_array('2019', $active_years)) { echo 'checked'; }?>> 2019-20
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
                </div>
                <?php echo form_close()?>
              </div>
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
