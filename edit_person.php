<?php 

include 'function.php';

if(!isset($_SESSION['client'])){
	header('Location: callback.php');
}
$client = $_SESSION['client'];

if(isset($_GET['id'])){
	$per = read_person($_GET['id']);
}else{
	header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>New Person | Hoop</title>

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
	    <h3>New Person</h3>
	    <form action="function.php" method="GET">
	    	<input type="hidden" name="update" value="update">
	    	<input type="hidden" name="id" value="<?php echo $per['result']['person']['id']; ?>">
	    	<div class="form-group">
	    		<label for="fname">First Name</label>
	    		<input type="text" name="fname"  class="form-control" id="fname" value="<?php echo $per['result']['person']['first_name']; ?>">
	    	</div>
	    	<div class="form-group">
	    		<label for="lname">Last Name</label>
	    		<input type="text" name="lname"  class="form-control" id="lname" value="<?php echo $per['result']['person']['last_name']; ?>">
	    	</div>
	    	<div class="form-group">
	    		<label for="email">Email Address</label>
	    		<input type="email" name="email"  class="form-control" id="email" value="<?php echo $per['result']['person']['email']; ?>">
	    	</div>
	    	<button type="submit" class="btn btn-default">Update Person</button>
	    </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>