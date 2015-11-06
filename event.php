<?php 

include 'function.php';

if(!isset($_SESSION['client'])){
	header('Location: callback.php');
}
$client = $_SESSION['client'];

if(isset($_GET['id'])){
	$ev = read_event($_GET['id']);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Event Form | Hoop</title>

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
	    <h3>Event Form</h3>
	    <form action="function.php" method="GET">
	    	<input type="hidden" name="updateEvent" value="update">
        <?php if(isset($ev)):?>
  	    	<input type="hidden" name="id" value="<?php echo $ev['result']['event']['id']; ?>">
        <?php endif; ?>
	    	<div class="form-group">
	    		<label for="name">Name</label>
	    		<input type="text" name="name"  class="form-control" id="name" value="<?php echo $ev['result']['event']['name']; ?>">
	    	</div>
	    	<div class="form-group">
	    		<label for="status">Status</label>
	    		<input type="text" name="status"  class="form-control" id="status" value="<?php echo $ev['result']['event']['status']; ?>">
	    	</div>
	    	<div class="form-group">
	    		<label for="start_time">Start Time</label>
	    		<input type="start_time" name="start_time"  class="form-control" id="start_time" value="<?php echo $ev['result']['event']['start_time']; ?>">
	    	</div>
        <div class="form-group">
          <label for="end_time">End Time</label>
          <input type="end_time" name="end_time"  class="form-control" id="end_time" value="<?php echo $ev['result']['event']['end_time']; ?>">
        </div>
	    	<button type="submit" class="btn btn-default"><?php echo (isset($ev) ? "Update" : "Create"); ?> Event</button>
	    </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>