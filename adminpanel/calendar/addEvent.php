<html>
  <link rel='stylesheet' href='css/sweetalert.css'>

<?php

// Connexion à la base de données
require_once('bdd.php');
//echo $_POST['title'];
/* if (isset($_POST['Event'][1]) && isset($_POST['Event'][2]) && isset($_POST['Event'][3]) && isset($_POST['Event'][4])){ */

 if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end'])){

$title = $_POST['title'];
//$title = mysqli_real_escape_string($bdd,$_POST['title']);
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];

/*$title = 	 $_POST['Event'][1];
//$title = mysqli_real_escape_string($bdd,$_POST['title']);
	$start =	 $_POST['Event'][2];
	$end = $_POST['Event'][3];
	$color = 	 $_POST['Event'][4];*/



			
	$sql = "INSERT INTO events_demo(title, start, end, color,status) values ('$title', '$start', '$end', '$color',NULL)";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	echo $sql;

	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();


	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
}

	
 if (isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password'])){

$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$role = $_POST['role'];
	
			
	$sql = "INSERT INTO member_rss(member_first, username, password,email,role) values ('$name', '$username', '$password', '$email','$role')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	echo $sql;

	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();


	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
}
	


header('Location: '.$_SERVER['HTTP_REFERER']);


?>

  <script src='js/sweetalert.min.js'></script>
</html>
