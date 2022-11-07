<?php
require_once '../db_conn.php';

$column = array('exp_type', 'exp_amount');
$query = 'SELECT * FROM expenses where
exp_type LIKE "%'.$_POST["search"]["value"].'%" OR
exp_amount LIKE "%'.$_POST["search"]["value"].'%"
';
if(isset($_POST["order"])){
    $query.= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}else{
    $query .= 'ORDER BY expID DESC';
}
$query1 = '';
if($_POST["length"] != -1)
{
    $query1 = 'LIMIT ' . $_POST['Start'] . ', ' . $_POST['length'];
}
$statement = $conn->prepare($query);
$statement->execute();
$number_filter_row  = $statement->rowCount();
$statement = $conn->prepare($query . $query1);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$total_expenses = 0;
foreach($result as $row){
    $sub_array = array();
    $sub_array[] = $row["exp_type"];
    $sub_array[] = $row["exp_amount"];
    $total_expenses = $total_expenses + floatval($row["exp_amount"]);
    $data[] = $sub_array;
    
}
function count_all_data($conn){
    $query = "SELECT * FROM expenses";
    $statement = $conn->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}
$output = array(
    'draw' => intval($_POST["draw"]),
    'recordsTotal' => count_all_data($conn),
    'recordsFiltered' => $number_filter_row,
    'data' => $data,
    'total' => number_format($total_expenses, 2),
   
);
echo json_encode($output);
?>