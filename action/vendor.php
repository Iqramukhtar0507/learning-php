<?php
require_once '../crud.php';
require_once '../db_conn.php';

$access = new crudoop;
if(isset($_POST['create'])){
   
    $vendorName = $_POST['vname'];
    $vendorAddress = $_POST['vaddress'];
    $vendorDesc = $_POST['vdescription'];

   
    
    
    if(!empty($vendorName) && !empty($vendorAddress) && !empty($vendorDesc)){
        $check_address = $access->checker("SELECT vendor_name && vendor_address FROM vendor WHERE vendor_name = '$vendorName' && vendor_address = '$vendorAddress'");
        if($check_address=== "successfull"){
            echo 'alreadyexist';
        }else{
         $response = $access->insert("INSERT INTO vendor (vendor_name, vendor_address, vendor_description) values('$vendorName', '$vendorAddress', '$vendorDesc')"); 
         echo $response;
        }
    }else{
        echo 'entryinput';
    }
}
//delete data
if (isset($_POST['sendingDelId'])){
    echo $response = $access->delete("DELETE FROM vendor WHERE vendorID  = '".$_POST['sendingDelId']."'");
}
//update data
if(isset($_POST['update'])){
   
    $result = $access->update("UPDATE vendor SET 
    vendor_name = '".$_POST['vname']."' ,
    vendor_address = '".$_POST['vaddress']."' , 
    vendor_description = '".$_POST['vdescription']."' 
     
    WHERE vendorID  = '".$_POST['updatevenID']."' ");

    echo $result;
    
}
?>