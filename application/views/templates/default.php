<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="shortcut icon" href="<?php echo base_url() ?>images/favicon.ico">
	  <meta name="author" content="Ilias Trichopoulos">

    <title>ESN Web Manager - <?php echo $title; ?></title>

	  <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/jumbotron.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <?php
    if(isset($css))
      foreach ($css as $filename) {
        echo $filename;
      }
    ?>


    <script data-cfasync="false" type="text/javascript" src="<?php echo base_url() ?>js/jquery.min.js"></script>
    <script data-cfasync="false" type="text/javascript" src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <script data-cfasync="false" type="text/javascript" src="<?php echo base_url() ?>js/offcanvas.js"></script>
    
    <?php 
    if(isset($js))
      foreach ($js as $filename) {
        echo $filename;
      }
    ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url() ?>js/html5shiv.js"></script>
      <script src="<?php echo base_url() ?>js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url() ?>site">ESN Webmanager</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url() ?>site"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li><a href="<?php echo base_url() ?>site/about"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
            <li><a href="<?php echo base_url() ?>site/tutorials"><span class="glyphicon glyphicon-book"></span> Tutorials</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-flash"></span> Actions <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>event/create">Create event</a></li>
                <li><a href="<?php echo base_url() ?>student/create">Create student</a></li>
                <li><a href="<?php echo base_url() ?>shareIt">Share it!</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-globe"></span> Bookmarks <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="http://auth.esngreece.gr">Website</a></li>
                <li><a href="http://esnauth.forumgreek.com">Forum</a></li>
                <li><a href="https://mail.google.com/mail/u/0/?shva=1#inbox">Gmail</a></li>
                <li><a href="https://docs.google.com/?authuser=0#home">Google Drive</a></li>
                <li><a href="http://esngreece.gr/forum/greece/">ESN Greece Forum</a></li>
                <li><a href="http://www.facebook.com/groups/115670541852454/">FB Undercover</a></li>
                <li><a href="https://www.facebook.com/groups/369202436424177/">ESNers Thessaloniki</a></li>
                <li><a href="https://twitter.com">Twitter</a></li>
                <li role="presentation" class="divider"></li>
                <li><a href="http://www.eurep.auth.gr/index.php">ΤΕΕΠ</a></li>
                <li><a href="http://www.auth.gr/office/624">Γραφείο Κίνησης ΑΠΘ</a></li>
                <li><a href="http://esngreece.gr">Ιστοσελίδα ESN Greece</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    <?php if($title != 'Home') { ?>
    <div class="jumbotron small nomargin">
      <h1><?php echo $title; ?></h1>
    </div>
    <?php } else { ?>
    <div class="jumbotron"></div>
    <?php } ?>

    <?php echo $body; ?>
    
    <div class="container">
      <hr>
      <footer>
        <p>developed by Ilias Trichopoulos 
        	<a href="http://github.com/nop33"><i class="fa fa-github-square"></i></a> 
        	<a href="https://www.linkedin.com/in/iliastrichopoulos"><i class="fa fa-linkedin-square"></i></a>
        	| ESN AUTH</p>
      </footer>
    </div>

  </body>
</html>
