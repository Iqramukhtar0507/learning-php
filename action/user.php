<?php
require_once '../crud.php';
require_once '../db_conn.php';

$access = new crudoop;
if(isset($_POST['create'])){
   
    $userName = $_POST['uname'];
    $userPass = $_POST['upassword'];
   
    
    
    if(!empty($userName) && !empty($userPass)){
        $check_uname = $access->checker("SELECT user_name FROM user WHERE user_name = '$userName'");
       if($check_uname=== "successfull"){
            echo 'alreadyexist';
       }else{
        $response = $access->insert("INSERT INTO user (user_name, user_password) values('$userName', '$userPass')"); 
         echo $response;
        }
    }else{
        echo 'entryinput';
    }
}
//delete data
if (isset($_POST['sendingDelId'])){
    echo $response = $access->delete("DELETE FROM user WHERE userID  = '".$_POST['sendingDelId']."'");
}
//update data
if(isset($_POST['update'])){
   
    $result = $access->update("UPDATE user SET 
    user_name = '".$_POST['uname']."' , 
    user_password = '".$_POST['upassword']."' 
     
    WHERE userID  = '".$_POST['updateuserID']."' ");

    echo $result;
    
}
?>