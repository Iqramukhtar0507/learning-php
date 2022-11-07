<?php 
require_once '../crud.php';
require_once '../db_conn.php';
session_start();
$access = new crudoop;
$search_value = $_POST['search'];
$receive = $access->select("SELECT * FROM livesearch WHERE name LIKE '%{$search_value}%' OR action LIKE '%{$search_value}%'");
  if($receive!=="failed"){
    while($data = mysqli_fetch_assoc($receive)){
      ?>

      <a href="<?php echo $data['action']?>"><?php echo $data['name']?></a>
      <?php
    }
  } 
// $output = "";
// if ($receive !== 'failed') {
//     while ($data = mysqli_fetch_assoc($receive)) {
//   ?>
<!-- //     $output .= " <table class="table table-striped" id="table">
//               <thead>
//                 <tr>
//                   <th scope="col">#</th>
//                   <th scope="col">Name</th>
//                   <th scope="col">Action</th>
//                   <th scope="col">Delete</th>
//                   <th scope="col">Edit</th>
//                 </tr>
//               </thead>";
//               $output .= "<tr>
//         <td><?php // echo  $data['expID']; ?></td>
//         <td><?php // echo  $data['exp_type']; ?></td>
//         <td><?php // echo  $data['exp_amount']; ?></td>
//         <td><a onclick="deleteData(this)" data-del_Id="<?php // echo  $data['expID']; ?>" class="btn btn-danger">Delete</a></td>
//                       <td><a href="form-expenses.php?expanseID=<?php // echo $data['expID']; ?>" class="btn btn-primary">Update</a></td>
//                     </tr>"; -->
                <?php
                //   }
                //   $output .="</table>";
                //   mysqli_close($conn);
                //   echo $output;
                // }
                ?>