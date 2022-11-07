<?php
require_once '../crud.php';
require_once '../db_conn.php';
session_start();
$access = new crudoop;
if (isset($_POST['create'])) 
{

    $fullName = $_POST['fullName'];
    $about = $_POST['about'];
    $job = $_POST['job'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];



    if (!empty($fullName) && !empty($about) && !empty($job) && !empty($address) && !empty($phone) && !empty($email)) {
        $check_name = $access->checker("SELECT name FROM profile WHERE name = '$fullName' ");
        if ($check_name === "successfull") {
            echo 'alreadyexist';
        } else {
            $response = $access->insert("INSERT INTO profile (name, about, job, address, phone, email) values('$fullName', '$about', '$job', '$address', '$phone', '$email')");
            echo $response;
        }
    } else {
        echo 'entryinput';
    }
}
//update data
if(isset($_POST['update'])){
   
    $result = $access->update("UPDATE profile SET 
    name = '".$_POST['fullName']."' , 
    about = '".$_POST['about']."',
    job = '".$_POST['job']."',
    address = '".$_POST['address']."',
    phone = '".$_POST['phone']."',
    email = '".$_POST['email']."'
     
    WHERE profileID  = '".$_POST['dataID']."' ");

    echo $result;
    
}