<?php include('partials/header.php');
include('partials/login_redirect.php'); 
include('conf/conn.php');
$photo = $name = $contact = $re_email = $address = $github = $linkedin = $objective = $skills = '';
//Checking if current user already exists
$userExists = false;
$email = mysqli_real_escape_string($conn, $_SESSION['email']);
$sql = "SELECT * FROM cv_details WHERE user_email = '$email';";
$result = mysqli_query($conn, $sql);
if (!mysqli_num_rows($result)==0){
  $userExists = true;
  //auto populate the fields if user already exists
  $cv_info = mysqli_fetch_assoc($result);
    $name = $cv_info['name'];
    $contact = $cv_info['contact'];
    $re_email = $cv_info['email'];
    $address = $cv_info['address'];
    $github = $cv_info['github'];
    $linkedin = $cv_info['linkedin'];
    $objective = $cv_info['objective'];
    $skills = $cv_info['skills'];
    $photo_url = $cv_info['photo'];
    //user_email,photo,name,contact,email,address,github,linkedin,objective,skills
}

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $re_email = $_POST['email'];
  $address = $_POST['address'];
  $github = $_POST['github'];
  $linkedin = $_POST['linkedin'];
  $objective = $_POST['objective'];
  $skills = $_POST['skills'];

  if(isset($_FILES['photo'])){
    $photo = $_FILES['photo'];
    $initPhotoName = $_FILES['photo']['name'];
    $photoTmpName = $_FILES['photo']['tmp_name'];
    $photoType = $_FILES['photo']['type'];
    $photoError = $_FILES['photo']['error'];
    $photoExt = explode('.', $initPhotoName);
    $photoActualExt = strtolower(end($photoExt));

    $allowed = array('jpg', 'jpeg', 'png');
    if(in_array($photoActualExt, $allowed)){
      if($photoError === 0){
        $photoName = $_SESSION['email'];
        $photoDestination = "uploads/$photoName.$photoActualExt";
        move_uploaded_file($photoTmpName, $photoDestination);
        echo 'The upload was successful';

        // Check if the user already has
        if(!$userExists) {
          $sql = "INSERT INTO cv_details(user_email,photo,name,contact,email,address,github,linkedin,objective,skills) VALUES ('$email','$photoDestination', '$name', '$contact', '$re_email', '$address', '$github', '$linkedin', '$objective', '$skills');";

          mysqli_query($conn, $sql);
        } else{
          $sql = "UPDATE cv_details SET photo = '$photoDestination', name = '$name', contact = '$contact', email = '$re_email', address = '$address', github = '$github', linkedin = '$linkedin', objective = '$objective', skills = '$skills' WHERE user_email = '$email';";

          mysqli_query($conn, $sql);
        }
        //write some sql to update mysql if the user had already created a cv
        //navigate the user to the CV page when they submit
        mysqli_free_result($result);
		    mysqli_close($conn);
        header('Location: cv.php');

      } else {
        echo "There was an error uploading this file";
      }
    } else {
      echo "This file extension is not supported";
    }
  } else{
    echo "You need to provide an image";
  }
}

?>
   <!-- form  -->
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
   <div id="cv-form">
      <div class="header text-center text-light py-2">
        <h2>Resume Generator</h2>
        <p class="text-warning">😊</p>
      </div>

      <div class="container mt-3">
        <div class="row">
          <!-- colume 1 -->

          <div class="col-md-6 mt-2">
            <h3>Personal Details</h3>

            <div class="from-group mt-4">
              <label for="">Select your photo *</label>
              <input  
              id="imgField" 
              type="file" 
              class="form-control"
              name="photo"
              />
            </div>

            <div class="form-group mt-3">
              <label for="namefield"> Your Name</label>
              <input
                type="text"
                id="namefield"
                class="form-control"
                placeholder="Enter your name"
                name="name"
                value="<?php echo $name?>"
              />
            </div>
            <div class="form-group mt-2">
              <label for="contactfield"> Your Contact No.</label>
              <input
                type="number"
                id="contactfield"
                class="form-control"
                placeholder="Enter your Contact name"
                name="contact"
                value="<?php echo $contact?>"
              />
            </div>

            <div class="form-group mt-3">
              <label for="emailfield"> Your Email Id</label>
              <input
                type="email"
                id="emailfield"
                class="form-control"
                placeholder="Enter your email id "
                name="email"
                value="<?php echo $re_email?>"
              />
            </div>

            <div class="form-group mt-3">
              <label for="addressfield">Your Address</label>
              <textarea
                rows="4"
                class="form-control"
                placeholder="Enter your Address"
                id="addressfield"
                name="address"
                
              ><?php echo $address?></textarea>
            </div>

            <h3 class="pale-green-text mt-3">Social Link</h3>

            <div class="form-group mt-2">
              <label for="githubfield">Github Link</label>
              <input
                type="text"
                id="githubfield"
                class="form-control"
                placeholder="Enter your Github Profile link"
                name="github"
                value="<?php echo $github?>"
              />
            </div>
            <div class="form-group mt-3">
              <label for="linkedinfield"> LinkedIn Link</label>
              <input
                type="text"
                id="linkedinfield"
                class="form-control"
                placeholder="Enter your Linkedin Profile link"
                name="linkedin"
                value="<?php echo $linkedin?>"
              />
            </div>
          </div>

          <!-- column 2 -->
          <div class="col-md-6 mt-2">
            <h3>Professional Details</h3>

            <div class="form-group mt-4">
              <label for="objfield">Objective</label>
              <textarea
                rows="4"
                class="form-control"
                placeholder="Enter  Objective "
                id="objfield"
                name="objective"
               
              > <?php echo $objective?></textarea>
            </div>

            <div class="form-group mt-2">
              <label for="skillfield">Skills</label>
              <textarea
                rows="2"
                class="form-control"
                placeholder="Enter your Skill set"
                id="skillfield"
                name="skills"
              ><?php echo $skills?></textarea>
            </div>
          </div>
        </div>

        <div class="container text-center my-4">
          <input type="hidden" name="submit" value="submit" >
          <button type="submit" class="btn  pale-green btn-large"  >
            Generate Resume
          </button>
        </div>
      </div>
    </div>
  </form>
<?php require('partials/footer.php'); ?>