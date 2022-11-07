<?php
require_once 'crud.php';
require_once 'db_conn.php';
$access = new crudoop;
session_start();
if (empty($_SESSION['userID'])) {
    header('location:login.php');
}
$type  = "add";
if (isset($_GET['product_qty_ID'])) {
    $type  = "update";
    $dataRes = $access->select("SELECT * FROM vendor WHERE product_qty_ID = '" . $_GET['product_qty_ID'] . "'");
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
            <h1>Form Quantity</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="table-vendor.php">Display Quantity</a></li>

                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body product_data">
                            <h5 class="card-title"><?php print ($type) === "add" ? "Add Quantity" : "Update Quantity"; ?></h5>
                            <!-- General Form Elements -->
                            <form id="<?php print ($type) === "add" ? "quantity" : "updatequantity"; ?>">
                                <!-- Hidden inputs start -->
                                <input type="hidden" name="<?php print ($type) === "add" ? "create" : "update"; ?>" value="<?php print ($type) === "add" ? "Create" : "Update"; ?>" />
                                <input type="hidden" name="updatequanID" value="<?php print ($type) === "add" ? '' : $data['product_qty_ID']; ?>" />
                                <!--Hidden inputs end -->
                                <div class="row mb-3">
                                    <div class="form-group">
                                 
                                        <div class="checkbox">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">product quantity status</label>
                                        <input type="checkbox" name="status" id="status" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
                                        <input type="hidden" name="hidden_status" id="hidden_status" value="deactive">
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mb-3">

                                    <label for="" class="col-sm-2 col-form-label">Select Product</label>
                                    <div class="col-sm-10">
                                        <select name="productid" id="" class="form-control">
                                            <?php
                                            $o = new crudoop;
                                            $productsFetch = $o->select("SELECT * FROM product");

                                            while ($productsData =  mysqli_fetch_assoc($productsFetch)) {
                                                echo '<option value="' . $productsData['productID'] . '">Name: ' . $productsData['product_name'] . ', Price: ' . $productsData['product_price'] . ' </option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Current Quantity</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php print ($type) === "add" ? "" : $data['Current_qty'] ?>" class="form-control" name="cqty">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary"><?php print ($type) === "add" ? "Submit" : "Update"; ?></button>
                                    </div>
                                </div>
                            </form><!-- End General Form Elements -->
                        </div>
                        <div class="card-footer">
                            <center>
                                <div id="responseOfVendor"></div>
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
    <script src="./js/quantity.js"></script>
    <!-- Vendor JS Files -->
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
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