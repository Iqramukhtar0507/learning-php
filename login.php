<?php
session_start();
require_once 'crud.php';
require_once 'db_conn.php';
$access = new crudoop;
$msg = "";
if(isset($_POST['logbutton'])){
   
    $User= $_POST['user'];
    $Password = $_POST['pass'];
    
    if(!empty($User) && !empty($Password)){
        $check_user = $access->select("SELECT * FROM user WHERE user_password = '$Password' 
        AND (user_contact = '$User' OR user_name = '$User')");
        if($check_user!=="failed"){
            $userData = mysqli_fetch_assoc($check_user);
            $_SESSION['userID'] = $userData['userID'];
          
            $JobFetc = $access->select("SELECT * FROM profile WHERE userid = '".$userData['userID']."'");
            $proile = mysqli_fetch_assoc($JobFetc);
            $_SESSION['job'] =$proile['job'];
            $_SESSION['userName'] = $proile['name'];
            $_SESSION['user_contact'] = $userData['user_contact'];
            header('location: index.php');
    }
    else{
        $msg =  "Wrong ID and Passowrd";
    }
       
}}

     
     
?>
<!doctype html>
<html lang="en">

<head>
    <title>DotStyleLogin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
</head>

<body>
    <div class="container my-5 order-xl-12 p-4">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                <div class="card bg-light mb-3" style="max-width: 25rem;">
  <div class="card-header"><h2 class="card-title text-center"><strong>Dot Style Fabrics</strong></h2></div>
 
  <div class="card-body">
  <form action="" method="POST">
   
  <div class="form-group">
    <label for="exampleInputEmail1">User Name</label>
    <input type="text" class="form-control" name="user" id="exampleInputEmail1" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">User Password</label>
    <input type="password" name="pass" class="form-control" >
  </div>
  <center><div class="text-danger">
  <?php echo $msg;?>
  </div></center>
  
  <button type="submit" class="btn btn-info form-control rounded submit px-3" name="logbutton">Submit</button>
</form>
  </div>
</div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>