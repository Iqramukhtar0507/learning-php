<?php
require_once 'crud.php';
require_once 'db_conn.php';
$access = new crudoop;
session_start();
if(empty($_SESSION['userID'])){
  header('location:login.php');
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
      <h1>User Table</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <!-- <li class="breadcrumb-item">Tables</li> -->
          <li class="breadcrumb-item active">User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <?php if (isset($_SESSION['message'])) : ?>
          <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
          </div>
        <?php endif; ?>
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Users</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped" id="user-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Name</th>
                    <th scope="col">User Password</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody id="tableShowuser">
                  <?php
                  $receive = $access->select("SELECT * FROM user");
                  if ($receive !== 'failed') {
                    while ($data = mysqli_fetch_assoc($receive)) {
                  ?>
                      <tr>
                        <td><?php echo  $data['userID']; ?></td>
                        <td><?php echo  $data['user_name']; ?></td>
                        <td><?php echo  $data['user_password']; ?></td>
                        <td><a onclick="deleteData(this)" data-del_Id="<?php echo  $data['userID']; ?>" class="btn btn-danger">Delete</a></td>
                        <td><a href="form-user.php?userID=<?php echo $data['userID']; ?>" class="btn btn-primary">Update</a></td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

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
  <script src="./js/user.js"></script>
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