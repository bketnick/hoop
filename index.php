<?php 

include 'function.php';

if(!isset($_SESSION['client'])){
	header('Location: callback.php');
}
$client = $_SESSION['client'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hoop</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
	    <nav class="navbar navbar-default">
		    <div class="container-fluid">
			  	<ul class="nav navbav-nav navbar-right">
			  		<li><a href="logout.php">Clear Session</a></li>
			  	</ul>
		  	</div>
	  	</nav>
	    <h3>List of people</h3>
	    <?php people_table(); ?>
	    <a href="new_person.php" class="btn btn-primary">New Person</a>
	    <p><hr/></p>
	    <h3>Event List</h3>
	    <?php event_table(); ?>
	    <a href="event.php" class="btn btn-primary">New Event</a>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>