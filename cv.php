<?php include ('conf/conn.php');
include('partials/header.php');
include('partials/header.php');
$photo = $name = $contact = $email = $address = $github = $linkedin = $objective = $skills = '';

session_start();
$email = mysqli_real_escape_string($conn, $_SESSION['email']);
$sql = "SELECT * FROM cv_details WHERE user_email = '$email';";
$result = mysqli_query($conn, $sql);

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
?>

<div class="container-fluid" id="cv-template">
      <div class="row">
        <div class="col-md-4 text-center py-5 left-template .light-blue">
          <!-- first section -->

          <img
            id="my-img"
            src="<?php echo $photo_url?>"
            alt="image"
            class="img-fluid myimg"
          />
          <div class="container">
            <h1 id="nameT1"><?php echo $name?></h1>
            <hr />
            <p id="noT"><?php echo $contact?></p>
            <p id="addressT"><?php echo $address?></p>
            <p id="emailT"><?php echo $re_email?></p>
          </div>
          <hr />

          <p>
            <a id="githubT" href="#"><?php echo $github?></a>
          </p>
          <p>
            <a id="linkedinT" href="#"><?php echo $linkedin?></a>
          </p>
        </div>

        <div class="col-md-8 py-4">
          <!-- second-section -->
          <!-- <h1 id="nameT2" class="text-center" style="font-weight:980">
            Jimmy
        </h1>
       -->
          <!-- objective  -->
          <div class="card mt-4">
            <div class="card-header  pale-green">
              <h3>Objective</h3>
            </div>
            <div class="card-body">
              <p id="objT"><?php echo $objective?></p>
            </div>
          </div>

          <!-- skill set -->
          <div class="card mt-4">
            <div class="card-header  pale-green">
              <h3>Skills</h3>
            </div>
            <div class="card-body">
              <p id="skillT"><?php echo $skills?></p>
            </div>
          </div>

          <div class="container text-center mt-4">
            <button onclick="printResume()" class="btn dark-blue white-text">
              Save PDF
            </button>
          </div>
        </div>
      </div>
    </div>


<script src="resources/html2pdf.bundle.min.js"></script>
<script>
 
</script>
<?php require('partials/footer.php'); ?>