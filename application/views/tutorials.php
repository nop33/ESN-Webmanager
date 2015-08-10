    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>site">Home</a></li>
      <li class="active">Tutorials</li>
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
                    <h2>Sample list</h2>
                    <p>Ένα πρότυπο λίστας φοιτητών. Για να ανέβουν μαζικά τα στοιχεία των φοιτητών
                        στην βάση δεδομένων, απαραίτητο είναι ένα έγγραφο excel με την παρακάτω μορφή.<br/>
                        <!-- Note: Τα χρώματα στις στήλες δηλώνουν:<br/>
                        <span style="background-color:green; color:black;">απαραίτητο</span>,
                        <span style="background-color:orange; color:black;">προαιρετικό,</span>
                        <span style="background-color:red; color:black;">παραβλέψιμο.</span><br/> -->
                        Περιλαμβάνεται παράδειγμα.
                    </p>
                    <div>
                        <a href="<?php echo base_url() ?>files/template.xlsx" type="button" class="btn btn-info">
                          <span class="glyphicon glyphicon-floppy-disk"></span> Download file
                        </a>
                    </div>
                </div>
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
