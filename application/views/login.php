<?php if(!isset($success)) { $success = true; } ?>
<!DOCTYPE html>
<html>
	<head>
	 	<link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
	 	<link href="<?php echo base_url() ?>css/parallax.css" rel="stylesheet" type="text/css">
		<title>ESN Web Manager</title>
	</head>
	<body>
	    <div class="container">
	        <div class="row vertical-offset-100">
	            <div class="col-md-4 col-md-offset-4">
	                <div class="panel panel-default">
	                    <div class="panel-heading">                                
	                        <div class="row-fluid user-row">
	                            <img src="<?php echo base_url() ?>images/esnstar.png" width="100" class="img-responsive" alt="ESN star"/>
	                        </div>
	                    </div>
	                    <div class="panel-body">
	                        <?php echo form_open('login/validate', array('class' => 'form-signin', 'role' => 'form'));?>
	                            <fieldset <?php if(!$success) { echo 'class="has-error"'; } ?>>
	                                <label class="panel-login">
	                                    <div class="login_result"><?php if(!$success) { echo 'Incorrect data, try again'; } ?></div>
	                                </label>
	                                <input class="form-control" placeholder="Username" id="username" type="text" name="username">
	                                <input class="form-control" placeholder="Password" id="password" type="password" name="password">
	                                <br></br>
	                                <input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="Login »">
									<button type="button" class="btn btn-default btn-lg btn-block" onclick="location.href='site';">Guest »</button>
	                            </fieldset>
	                        <?php echo form_close()?>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

	    <script src="<?php echo base_url() ?>js/jquery.min.js"></script>
	    <script src="<?php echo base_url() ?>js/parallax.js"></script>
	    <script src="<?php echo base_url() ?>js/TweenLite.min.js"></script>
	</body>
</html>