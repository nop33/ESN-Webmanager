    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>site">Home</a></li>
      <li class="active"><?php echo $title; ?></li>
    </ol>
    <div class="container">
      <div class="starter-template">
        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-xs-12 col-sm-9">

              <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary" data-toggle="offcanvas"><span class="glyphicon glyphicon-chevron-right"></button>
              </p>
            <?php if(strlen($this->input->get('fb')) > 0) { ?>
              <div class="row">
              <?php if($this->input->get('fb')) { ?>
                <div class="alert alert-dismissable alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Success!</strong> The message was succesfully posted on Facebook!
                </div>
              <?php } else { ?>
                <div class="alert alert-dismissable alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Failed!</strong> Your message was not posted on Facebook.
                </div>
              <?php } ?>
              </div> <!-- row end -->
            <?php } ?>
            <?php if(strlen($this->input->get('tw')) > 0) { ?>
              <div class="row">
              <?php if($this->input->get('tw')) { ?>
                <div class="alert alert-dismissable alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Success!</strong> The message was succesfully posted on Twitter!
                </div>
              <?php } else { ?>
                <div class="alert alert-dismissable alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Failed!</strong> Your message was not posted on Twitter.
                </div>
              <?php } ?>
              </div> <!-- row end -->
            <?php } ?>
              <div class="row">
                <?php if(@$user_profile): ?>
                    <div>
                  <blockquote>
                    <p><?php echo "Welcome ".$user_profile['name']."! "; ?><a href="<?php echo $logout_url ?>" class="btn btn-large btn-primary">Logout</a></p>
                  </blockquote>
                    </div>
                    <div>
                        <?php echo form_open('shareIt/sharePost',array('class' => 'form-horizontal', 'role' => 'form')); ?>
                  <div class="col-lg-6" style="border-right:1px solid #ccc;">
                            <p class="lead">1. Επέλεξε που θέλεις να κοινοποιήσεις</p>
                    <div class="well">
                            <div class="form-group">
                      <div class="col-lg-12">
                        <input checked type="checkbox" name="shareit[]" value="esn-auth-page" /><i class="facebook-icon facebook-page"></i>ESN AUTH page*
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-12">
                        <input checked type="checkbox" name="shareit[]" value="erasmus-thessaloniki-group" /><i class="facebook-icon facebook-group"></i>ERASMUS in Thessaloniki group
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-12">
                        <input checked type="checkbox" name="shareit[]" value="esn-auth-group" /><i class="facebook-icon facebook-group"></i>ESN AUTH group
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-12">
                        <input checked type="checkbox" name="shareit[]" value="esn-uom-page" /><i class="facebook-icon facebook-page"></i>ESN UOM page*
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-12">
                        <input checked type="checkbox" name="shareit[]" value="esn-ateith-page" /><i class="facebook-icon facebook-page"></i>ESN ATEITH page*
                      </div>
                    </div>
                    <p>*Σχετικά με τις pages, για να εμφανίζεται το post σαν να είναι της σελίδας, θα πρέπει ο χρήστης που κάνει το post να είναι στους admin
                      της σελίδας, αλλιώς το post θα εμφανίζεται στο "Recent Posts by Others".<br>
                      Επίσης υπάρχει ένα άλυτο (προς το παρών) θέμα με την κοινοποίηση link στις pages. Ακόμα και αν είσαι admin, αν το post περιέχει link,
                      θα εμφανιστεί και πάλι στο 'Posts by Others'. Oπότε καλό είναι να αποφεύγονται τα links όταν κοινοποιείτε και στις pages (μέχρι να λυθεί).</p>
                    </div>
                  </div>
                    <div class="col-lg-6">
                      <p class="lead">2. Γράψε το μήνυμα και... 'Send posts'!</p>
                    <div class="form-group">
                      <label for="inputMessage" class="col-lg-2 control-label">Message</label>
                      <div class="col-lg-10">
                        <textarea class="form-control" id="inputMessage" placeholder="Το κείμενο του μηνύματος" name="message"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputLink" class="col-lg-2 control-label">Link</label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputLink" placeholder="Αν το post περιέχει κάποιο link, εδω!" name="link">
                        <p>Use a <a href="http://goo.gl" target="_blank">URL Shortener</a> for more beautiful links :)</p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputTweet" class="col-lg-2 control-label">Tweet</label>
                      <div class="col-lg-10">
                        <textarea class="form-control" id="inputTweet" placeholder="Tweet message" name="tweet"></textarea>
                        <p class="text-muted" id="characters">Characters left: <span id="charsleft">140</span></p>
                      </div>
                    </div>
                            <div class="form-group">
                              <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-lg btn-block btn-success" name="submit" id="sendposts">Send posts</button>
                              </div>
                            </div>
                  </div>
                            <!-- <input class="formatted" type="submit" name="submit" value="Send posts" /> -->
                        <?php echo form_close(); ?>
                    </div>
                  <?php else: ?>
                <div>
                  <p class="lead">Κάνε login με το Facebook για να μοιραστείς το μήνυμά σου</p>
                    <a href="<?php echo $login_url ?>" class="btn btn-lg btn-block btn-primary ">Login with Facebook</a>
                </div>
                  <?php endif; ?>
              </div><!--/row-->
            </div><!--/span-->

            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
              <div class="well sidebar-nav">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="<?php echo base_url() ?>event">Events</a></li>
                    <li><a href="<?php echo base_url() ?>student">Students</a></li>
                <li><a href="<?php echo base_url() ?>registration">Registration</a></li>
                    <li class="active"><a href="#">Share it!</a></li>
                </ul>
              </div><!--/.well -->
            </div><!--/span-->
          </div><!--/row-->
      </div>
    </div> <!-- /container -->

    <script type="text/javascript">
      $(document).ready(function() {
        $('#inputTweet').bind('input propertychange', function() {
            var left = 140 - this.value.length;
            $('#charsleft').html(left);
              if(this.value.length > 140){
                $('#characters').addClass('text-danger');
                $('#sendposts').addClass('disabled');
              } else {
                $('#characters').removeClass('text-danger');
                $('#sendposts').removeClass('disabled');
              }
        });
      });
    </script>
