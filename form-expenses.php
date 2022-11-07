<?php
require_once 'crud.php';
require_once 'db_conn.php';
$access = new crudoop;
session_start();
if(empty($_SESSION['userID'])){
  header('location:login.php');
}
$type  = "add";
if(isset($_GET['expanseID'])){
  $type  = "update";
  $dataRes = $access->select("SELECT * FROM expenses WHERE expID = '".$_GET['expanseID']."'");
  $data = mysqli_fetch_assoc($dataRes);
}
?>
<html lang="en">
  <?php include"include/head.php"; ?>
<body>
  <!-- ======= Header ======= -->
  <?php include"include/header.php"; ?>
  <!-- ======= Sidebar ======= -->
  <?php include"include/sidebar.php"; ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Form Expenses</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="table-expense.php">Display Expenses</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php print($type)==="add"?"Add Expanse":"Update Expanse";?></h5>
              <!-- General Form Elements -->
              <form id="<?php print($type)==="add"?"expense":"updateexpense";?>">
              <!-- Hidden inputs start -->
              <input type="hidden" name="<?php print($type)==="add"?"create":"update"; ?>" value="<?php print($type)==="add"?"Create":"Update"; ?>"/>
              <input type="hidden" name="dataID" value="<?php print($type)==="add" ? '0' : $data['expID']; ?>"/>
              <!--Hidden inputs end -->
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Expenses Type</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php print($type)==="add"?"":$data['exp_type'] ?>" class="form-control" name="etype">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Expenses Amount</label>
                  <div class="col-sm-10">
                    <input type="number" value="<?php print($type)==="add"?"":$data['exp_amount'] ?>" class="form-control" name="eamount">
                  
                  </div>
                </div>
               
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" ><?php print($type)==="add"?"Create":"Update"; ?></button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
            <div class="card-footer">
             <center> <div id="responseOfExpanse"></div></center>
            </div>
          </div>

        </div>

        <!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php 
    require_once './include/footer.php';
  ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="./js/jquery-3.6.1.min.js"></script>
<script src="./js/expen.js"></script>
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