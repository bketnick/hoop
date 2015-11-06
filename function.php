<?php 

include 'config.php';

if(!isset($_SESSION['client'])){
	header('Location: callback.php');
}
$client = $_SESSION['client'];

function people_table() {
	global $client, $baseApiUrl;

	$response = $client->fetch($baseApiUrl . '/api/v1/people');
	echo "<table class='table table-striped'>";
	echo "<tr><th>id</th><th>First</th><th>Last</th><th>Email</th><th>Actions</th></tr>";

	foreach( $response['result']['results'] as $k => $v){
		echo "<tr>";
		echo '<td>'.$v['id'].'</td>';
		echo '<td>'.$v['first_name'].'</td>';
		echo '<td>'.$v['last_name'].'</td>';
		echo '<td>'.$v['email'].'</td>';
		echo '<td>';
			echo '<a href="function.php?delete='.$v['id'].'" onclick="return confirm(\'Are you sure you want to delete this user?\')" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a> ';
			echo '<a href="edit_person.php?id='.$v['id'].'" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-pencil"></span></a>';
		echo '</td>';
		echo "</tr>";
	}
	echo "</table>";
}

function event_table() {
	global $client, $baseApiUrl, $baseSiteSlug;

	$response = $client->fetch($baseApiUrl . '/api/v1/sites/'.$baseSiteSlug.'/pages/events');
	echo "<table class='table table-striped'>";
	echo "<tr><th>id</th><th>Event Name</th><th>Starts</th><th>Ends</th><th>Actions</th></tr>";

	foreach( $response['result']['results'] as $k => $v){
		echo "<tr>";
		echo '<td>'.$v['id'].'</td>';
		echo '<td>'.$v['name'].'</td>';
		echo '<td>'.date('m/d/Y H:m', strtotime($v['start_time'])).'</td>';
		echo '<td>'.date('m/d/Y H:m', strtotime($v['end_time'])).'</td>';
		echo '<td>';
			echo '<a href="event.php?id='.$v['id'].'" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-pencil"></span></a>';
		echo '</td>';
		echo "</tr>";
	}
	echo "</table>";
}

function create_person($details){
	global $client, $baseApiUrl;
	$params = array(
		'person'=> array(
			'email'=>$details['email'],
			'first_name'=>$details['fname'],
			'last_name'=>$details['lname']
		)
	);
	$header = array(
		'Authorization' => $_SESSION['token'],
		'Content-Type' => 'application/json', 
		'Accept' => 'application/json'
	);
	$response = $client->fetch($baseApiUrl . '/api/v1/people',json_encode($params),'POST',$header,0);
	header('Location: index.php');
}

function create_event($details){
	global $client, $baseApiUrl, $baseSiteSlug;
	$params = array(
		'event'=> array(
			'name'=>$details['name'],
			'status'=>$details['status'],
			'start_time'=>$details['start_time'],
			'end_time'=>$details['end_time']
		)
	);
	$header = array(
		'Authorization' => $_SESSION['token'],
		'Content-Type' => 'application/json', 
		'Accept' => 'application/json'
	);
	$response = $client->fetch($baseApiUrl . '/api/v1/sites/'.$baseSiteSlug.'/pages/events',json_encode($params),'POST',$header,0);
	header('Location: index.php');
}

function read_person($id){
	global $client, $baseApiUrl;
	return $client->fetch($baseApiUrl . '/api/v1/people/'.$id);
}

function read_event($id){
	global $client, $baseApiUrl, $baseSiteSlug;
	return $client->fetch($baseApiUrl . '/api/v1/sites/'.$baseSiteSlug.'/pages/events/'.$id);
}

function update_person($details){
	global $client, $baseApiUrl;
	$params = array(
		'person'=> array(
			'email'=>$details['email'],
			'first_name'=>$details['fname'],
			'last_name'=>$details['lname']
		),
	);
	$header = array(
		'Authorization' => $_SESSION['token'],
		'Content-Type' => 'application/json', 
		'Accept' => 'application/json'
	);
	$response = $client->fetch($baseApiUrl . '/api/v1/people/'.$details['id'],json_encode($params),'PUT',$header,0);
	header('Location: index.php');
}

function update_event($details){
	global $client, $baseApiUrl, $baseSiteSlug;
	$params = array(
		'event'=> array(
			'name'=>$details['name'],
			'status'=>$details['status'],
			'start_time'=>$details['start_time'],
			'end_time'=>$details['end_time']
		)
	);
	$header = array(
		'Authorization' => $_SESSION['token'],
		'Content-Type' => 'application/json', 
		'Accept' => 'application/json'
	);
	$response = $client->fetch($baseApiUrl . '/api/v1/sites/'.$baseSiteSlug.'/pages/events/'.$details['id'],json_encode($params),'PUT',$header,0);
	header('Location: index.php');
}

function delete_person($id){
	global $client, $baseApiUrl;
	$response = $client->fetch($baseApiUrl . '/api/v1/people/'.$id,array(),'DELETE');
	header('Location: index.php');
}

if(isset($_GET['create']) && $_GET['create'] == 'create'){
	create_person($_GET);
}elseif(isset($_GET['update']) && $_GET['update'] == 'update'){
	update_person($_GET);
}elseif(isset($_GET['delete'])){
	delete_person($_GET['delete']);
}elseif (isset($_GET['updateEvent'])) {
	if(isset($_GET['id'])){
		update_event($_GET);
	}else{
		create_event($_GET);
	}
}

?>