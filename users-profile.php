<?php
require_once 'crud.php';
require_once 'db_conn.php';
$access = new crudoop;
session_start();
$msg = "";
$type = "add";
$data = null;
if (empty($_SESSION['userID'])) {
  header('location:login.php');
}
if(isset($_POST['save_pass'])){

  $Password = $_POST['password'];
  $newPass = $_POST['newpassword'];
  $renterpass = $_POST['renewpassword'];

  if(!empty($Password)){
    $check_user = $access->select("SELECT * FROM user WHERE userID = '".$_SESSION['userID']."'");
    if($check_user!=="failed"){
      if($newPass===$renterpass){

        $userData = mysqli_fetch_assoc($check_user);

      $result = $access->update("UPDATE user SET 
      user_password = '".$_POST['newpassword']."'
      WHERE userID  = '".$_SESSION['userID']."' ");
    }
    else{
      $msg =  'not matche';
    }
  }
}
else{
  $msg = "Password must required";
}
}
//update profile form
$type  = "update";
$dataRes = $access->select("SELECT * FROM profile WHERE userid = '".$_SESSION['userID']."' LIMIT 1");
$data = mysqli_fetch_assoc($dataRes);
?>
<!DOCTYPE html>
<html lang="en">
<?php include "include/head.php"; ?>

<body>
  <!-- ======= Header ======= -->
  <?php include "include/header.php"; ?>
  <!-- ======= Sidebar ======= -->
  <?php include "include/sidebar.php"; ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="table-user.php">Users</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <h2>Farhad khan</h2>
              <h3>Fabric seller</h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <!-- <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li> -->

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>
                
              </ul>
              
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <?php
                ?>
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic"><?php echo  $data['about']; ?></p>

                  <h5 class="card-title">Profile Details</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo  $data['name']; ?></div>
                  </div>

                  <!-- <div class="row">
                    <div class="col-lg-3 col-md-4 label">Company</div>
                    <div class="col-lg-9 col-md-8">Dot Style</div>
                  </div> -->

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Job</div>
                    <div class="col-lg-9 col-md-8"><?php echo  $data['job']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo  $data['address']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php echo  $data['phone']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo  $data['email']; ?></div>
                  </div>

                </div>
                <?php
                ?>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form id="<?php print($type)==="add"?'addProfileForm':'editProfileForm'; ?>">
                  <div class="text-danger">
                  <center><strong><?php echo $msg;?></strong></center>
                 </div>
                  <input type="hidden" name="<?php print($type)==="add"?'create':'update'; ?>" value="<?php print($type)==="add"?"Create":"Update"; ?>"/>
              <input type="hidden" name="dataID" value="<?php print($type)==="add" ? '0' : $data['profileID']; ?>"/>
                    
              
              <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <div id="preview">
                          <div id="img_preview">

                          </div>
                        </div>
                        <img src="assets/img/profile-img.jpg" alt="Profile">
                        <div class="pt-2">
                          <a  data-toggle="modal" data-target="#exampleModal"  class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a id="delete_btn" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" value="<?php print($type)==="add"?"":$data['name'] ?>" type="text" class="form-control" id="fullName" value="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about"  class="form-control" id="about" style="height: 100px"><?php print($type)==="add"?"":$data['about'] ?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job"  value="<?php print($type)==="add"?"":$data['job'] ?>" type="text" class="form-control" id="Job" value="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address"  value="<?php print($type)==="add"?"":$data['address'] ?>" type="text" class="form-control" id="Address" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone"  value="<?php print($type)==="add"?"":$data['phone'] ?>" type="text" class="form-control" id="Phone" value="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email"  value="<?php print($type)==="add"?"":$data['email'] ?>" type="email" class="form-control" id="Email" value="">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="submit-data" class="btn btn-primary">Save Changes</button>
                    </div>
                    <center> <div id="responseOfUpdate"></div></center>
                    <!-- <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="country" type="text" class="form-control" id="Country" value="Pakistan">
                      </div>
                    </div> -->

                    <!-- <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                      </div>
                    </div>-->

                    
                  </form>
                  <!-- End Profile Edit Form -->

                </div>

                <!-- <div class="tab-pane fade pt-3" id="profile-settings"> -->
                <!-- Settings Form -->
                <!-- <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form> -->
                <!-- End settings Form -->
                <!-- </div> -->

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="" method="POST">
                  <div class="text-danger">
                  <center><strong><?php echo $msg;?></strong></center>
                 </div>
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="save_pass" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
 <?php require_once './modal.php'?>
  </main><!-- End #main -->
  
  <!-- ======= Footer ======= -->
  <?php
  require_once './include/footer.php';
  ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="./js/jquery-3.6.1.js"></script>
  <script src="./js/profile.js"></script>
  <script src="./js/img.js"></script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>
