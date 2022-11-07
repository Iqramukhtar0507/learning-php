<?php
require_once '../crud.php';
require_once '../db_conn.php';
session_start();
$access = new crudoop;
if($_FILES['file']['name'] != ''){
$fileName = $_FILES['file']['name'];
$extention = pathinfo($fileName, PATHINFO_EXTENSION);
$valid_extentions = array("jpg","jpeg","png","gif");
if(in_array($extention, $valid_extentions)){
    $new_name = rand().".".$extention;
    $path = "./assets/img/".$new_name;
    if(move_uploaded_file( $_FILES['file']['tmp_name'] ,$path)){
        echo '<img src= "'.$path.'" /><br>
        <button data-path="'.$path.'" id="delete_btn">Delete</button>';
    }

}else{
    echo "<script>alert('invalid file')</script>";
}
}else{
    echo "<script>alert('please select file')</script>";
}
// delete 
if(!empty($_POST['path'])){
    if(unlink($_POST['path'])){
        echo "Image deleted";
    }
}
?> 
