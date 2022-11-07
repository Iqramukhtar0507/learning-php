<?php
require_once '../crud.php';
require_once '../db_conn.php';

$access = new crudoop;
//INSERT DATA
if (isset($_POST['create'])) {

    $prodName = $_POST['pname'];
    $proPrice = $_POST['pprice'];
    $proType = $_POST['ptype'];
    $proVariant = $_POST['pvariant'];


    if (!empty($prodName) && !empty($proPrice)  && !empty($proType)  && !empty($proVariant)) {
        //echo 'ok';
        $check_name = $access->checker("SELECT product_name FROM product WHERE product_name = '$prodName'");
        if ($check_name === "successfull") {
            echo 'alreadyexist';
        } else {

            $response = $access->insert("INSERT INTO product (product_name, product_price, product_type, product_varient) values('$prodName', '$proPrice', '$proType', '$proVariant')");
            if($response==="sucessfull"){
               $productID = mysqli_insert_id($access->conn);
                 $qty_response = $access->insert("INSERT INTO product_qty (product_id) values('$productID')");
                 echo $qty_response;
            }
            else{
                echo 'entryinput';
            }
        }
    } else {
        echo 'entryinput';
    }
} 

//delete data
if (isset($_POST['sendingDelId'])) {
    echo $response = $access->delete("DELETE FROM product WHERE productID = '" . $_POST['sendingDelId'] . "'");
}

//show data
if (isset($_POST['displayTable'])) {
    $receive = $access->select("SELECT * FROM product");
    if ($receive !== 'failed') {
        while ($data = mysqli_fetch_assoc($receive)) {
?>
            <tr>
                <td><?php echo  $data['productID']; ?></td>
                <td><?php echo  $data['product_name']; ?></td>
                <td><?php echo  $data['product_price']; ?></td>
                <td><?php echo  $data['product_type']; ?></td>
                <td><?php echo  $data['product_varient']; ?></td>
                <td><a onclick="deleteData(this)" data-del_Id="<?php echo  $data['productID']; ?>" class="btn btn-danger">Delete</a></td>
                <td><a href="form-product.php?productID=<?php echo $data['productID']; ?>" class="btn btn-primary">Update</a></td>
            </tr>
<?php
        }
    }
}
//update data  
if (isset($_POST['update'])) {

    $result = $access->update("UPDATE product SET 
    product_name = '" . $_POST['pname'] . "' , 
    product_price = '" . $_POST['pprice'] . "',
    product_type = '" . $_POST['ptype'] . "',
    product_varient = '" . $_POST['pvariant'] . "'
     
    WHERE productID  = '" . $_POST['updateproID'] . "' ");
    echo $result;
}
?>