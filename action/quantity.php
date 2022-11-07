<?php
require_once '../crud.php';
require_once '../db_conn.php';
session_start();
$access = new crudoop;
if(isset($_POST['create'])){
    $adqty = $_POST['status'];
    $productsal = $_POST['productid'];
    $currentqty= $_POST['cqty'];
    if(!empty($adqty) && !empty($productsal) && !empty($currentqty)){
        $response = $access->insert("INSERT INTO product_qty ( product_id, Current_qty) values('$productsal', '$adqty')"); 
        echo $response;
    }
    if($conn->query($response)=== TRUE){
        echo 'done';
    }else{
        echo "Error:" .$response. "<br>" . mysqli_error($conn);
    }
}else{
    echo 'nope';
}
//del
// if (isset($_POST['sendingDelId'])) {
//     echo $response = $access->delete("DELETE FROM product_qty WHERE product_qty_ID = '" . $_POST['sendingDelId'] . "'");
// }

?>
