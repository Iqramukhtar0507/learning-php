<?php
require_once 'db_conn.php';
class crudoop{
    public $conn;
    function __construct(){
        $this->conn = connection();    
    }

    public function insert($query){
        $qr = $query;
        $result = mysqli_query($this->conn, $qr);
        if($result>0){
            return 'sucessfull';
        }else{
            return 'failed';
        }
    }
    public function select($query){
       $qr = $query;
        $result = mysqli_query($this->conn, $qr);
        if(mysqli_num_rows($result)>0){
                return $result;
            }else{
                return 'failed';
            }
        
    }

    public function update($query){
     $qr = $query;
        $result = mysqli_query($this->conn, $qr);
        if($result>0){
            return 'successfull';
        }else{
            return 'failed';
        }
    }
    public function delete($query){
        $qr = $query;
        $result = mysqli_query($this->conn, $qr);
        if($result>0){
            return 'successfull';
        }else{
            return 'failed';
        }
    }
    public function checker($query){
        $qr = $query;
        $result = mysqli_query($this->conn, $qr);
        if(mysqli_num_rows($result)>0){
            return 'successfull';
        }else{
            return 'failed';
        }

    }

}
?>