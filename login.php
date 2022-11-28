<?php
include('conf/conn.php');
if(isset($_POST['submit'])){
    $email = $pass = '';

    /*
    session_start();
    $_SESSION['name'] = $_POST['email'];

    header('Location: index.php');
    
    session_start();
    $name = $_SESSION('name');

    //deleting a session variable
    unset($_SESSION('name'));
    session_unset();
    */

    $email = $_POST['email'];
    $pass = $_POST['password'];
    if(empty($email) || empty($pass)){
        echo "You need to provide an email and password \n";
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "You have a provide a valid email \n";
    } else if(!preg_match('/\bUBa\d{2}\w{1,2}\d{3,4}\b/', $pass)){
            echo "Your password has to follow the UBa matricule format \n";
    } else{

        // escape sql chars
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$pass = mysqli_real_escape_string($conn, $_POST['password']);

		// check if user exists
		$sql = "SELECT * FROM user WHERE email = '$email';";
		$result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)==0){
            $sql = "INSERT INTO user(email,pass) VALUES('$email','$pass');";
            mysqli_query($conn, $sql);
        }

        session_start();
        $_SESSION['email'] = $_POST['email'];
        header('Location: index.php');


        // $email = mysqli_real_escape_string($conn, $_POST['email']);
		// 	$title = mysqli_real_escape_string($conn, $_POST['title']);
		// 	$ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

		// 	// create sql
		// 	$sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title','$email','$ingredients')";

		// 	// save to db and check
		// 	if(mysqli_query($conn, $sql)){
		// 		// success
		// 		header('Location: index.php');
		// 	} else {
		// 		echo 'query error: '. mysqli_error($conn);
		// 	}
    }

}
?>

<?php include('partials/header.php'); ?>

<!-- login -->
<div id="login" class="n">
      <div id="login-container">
          <h3>Want to create your cv ?</h3>
          <h1>Enter your Email and Password</h1>
  
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
              <div>
                  <label for="email">Email:</label>
                  <input type="text" name="email">
              </div>
              <div>
                  <label for="password">Password:</label>
                  <input type="password" name="password">
              </div>

              <div>
                  <input type="submit" name="submit" value="submit">
              </div>
          </form>
      </div>
  </div>

<?php require('partials/footer.php'); ?>