<?php
require_once '../crud.php';
require_once '../db_conn.php';

$access = new crudoop;
//INSERT DATA
if(isset($_POST['create'])){
    $productsal = $_POST['productsal'];
    $custName= $_POST['cname'];
    $custContact = $_POST['ccontact'];
    $quantity= $_POST['quantity'];
    $price= $_POST['price'];
    
    
    if(!empty($custName) && !empty($custContact)  && !empty($quantity)  && !empty($price)){
        $check_contact = $access->checker("SELECT customer_contact FROM sales WHERE customer_contact = '$custContact'");
        if($check_contact=== "successfull"){
            echo 'alreadyexist';
        }else{
         $response = $access->insert("INSERT INTO sales (productID, customer_name, customer_contact, quantity, price) values('$productsal', '$custName', '$custContact', '$quantity', '$price')"); 
         echo $response;
        }
    }else{
        echo 'entryinput';
    }
}
if(isset($_POST['update'])){
   
    $result = $access->update("UPDATE sales SET 
    productID = '".$_POST['productsal']."' ,
    customer_name = '".$_POST['cname']."' , 
    customer_contact = '".$_POST['ccontact']."', 
    quantity  = '".$_POST['quantity']."',
    price  = '".$_POST['price']."'
    WHERE salesID  = '".$_POST['updatesalID']."' ");

    echo $result;
    
}
 //delete data
 if (isset($_POST['sendingDelId'])){
    echo $response = $access->delete("DELETE FROM sales WHERE salesID  = '".$_POST['sendingDelId']."'");
}
//update data

?>