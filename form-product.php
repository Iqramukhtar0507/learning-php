<?php
require_once 'crud.php';
require_once 'db_conn.php';
$access = new crudoop;
session_start();
if(empty($_SESSION['userID'])){
  header('location:login.php');
}
$type  = "add";
if (isset($_GET['productID'])) {
  $type  = "update";
  $dataRes = $access->select("SELECT * FROM product WHERE productID = '" . $_GET['productID'] . "'");
  $data = mysqli_fetch_assoc($dataRes);
}
?>
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
      <h1>Form Product</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="table-product.php">Display Products</a></li>

        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php print ($type) === "add"?"Add Product":"Update Product"; ?></h5>
              <!-- General Form Elements -->
              <form id="<?php print ($type)==="add"?"product":"updateproduct"; ?>">
              <!-- Hidden inputs start -->
                <input type="hidden" name="<?php print ($type) === "add" ? "create":"update"; ?>" value="<?php print ($type) === "add"?"Create":"Update"; ?>"/>
                <input type="hidden" name="updateproID" value="<?php print ($type) === "add" ? '0' : $data['productID']; ?>" />
                <!--Hidden inputs end -->
                <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Product Name</label>
                  <div class="col-sm-10">
                    <input type="text"  value="<?php print($type)==="add"?"":$data['product_name'] ?>" class="form-control" name="pname">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Product Price</label>
                  <div class="col-sm-10">
                    <input type="number" value="<?php print($type)==="add"?"":$data['product_price'] ?>" class="form-control" name="pprice">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="text" class="col-sm-2 col-form-label">Product Type</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php print($type)==="add"?"":$data['product_type'] ?>" class="form-control" name="ptype">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Product Variant</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php print($type)==="add"?"":$data['product_varient'] ?>" class="form-control" name="pvariant">

                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary"><?php print($type)==="add"?"Create":"Update"; ?></button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
            <div class="card-footer">
              <center>
                <div id="responseOfProduct"></div>
              </center>
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
  <script src="./js/jquery-3.6.1.js"></script>
  <script src="./js/prod.js"></script>
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