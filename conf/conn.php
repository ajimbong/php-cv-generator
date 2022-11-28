<?php 

	// connect to the database
	$conn = mysqli_connect('localhost', 'root', '', 'cv_generator');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>