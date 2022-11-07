<?php
require_once '../crud.php';
require_once '../db_conn.php';
session_start();
$access = new crudoop;

//insert data
if(isset($_POST['create'])){
   
    $expType= $_POST['etype'];
    $expAmount = $_POST['eamount'];
    if(!empty($expType) && !empty($expAmount)){
        $check_amount = $access->checker("SELECT exp_amount FROM expenses WHERE exp_amount = '$expAmount' ");
        if($check_amount=== "successfull"){
            echo 'alreadyexist';
        }else{
         $response = $access->insert("INSERT INTO expenses (exp_type, exp_amount) values('$expType', '$expAmount')"); 
         echo $response;
        }
    }else{
        echo 'entryinput';
    }
    }
//delete data
if (isset($_POST['sendingDelId'])) {
    echo $response = $access->delete("DELETE FROM expenses WHERE expID = '" . $_POST['sendingDelId'] . "'");
}
//update data
if(isset($_POST['update'])){
   
    $result = $access->update("UPDATE expenses SET 
    exp_type = '".$_POST['etype']."' , 
    exp_amount = '".$_POST['eamount']."' 
     
    WHERE expID  = '".$_POST['dataID']."' ");

    echo $result;
    
    
}

//show data for exp table
    if(isset($_POST['displayTable'])){
        $receive = $access->select("SELECT * FROM expenses");
                if ($receive !== 'failed') {
                  while ($data = mysqli_fetch_assoc($receive)) {
                    
                ?>

                    <tr>
                      <td><?php echo  $data['expID']; ?></td>
                      <td><?php echo  $data['exp_type']; ?></td>
                      <td><?php echo  $data['exp_amount']; ?></td>
                      <td><a onclick="deleteData(this)" data-del_Id="<?php echo  $data['expID']; ?>" class="btn btn-danger">Delete</a></td>
                      <td><a href="form-expenses.php?expanseID=<?php echo $data['expID']; ?>" class="btn btn-primary">Update</a></td>
                    </tr>
                <?php
                  }
                }
    }
?>