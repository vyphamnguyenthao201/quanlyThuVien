<?php 
class Receipt {
    private $id_receipt;
    private $id_employee;
    private $id_brand;
    private $total;
    private $date;
    public $conn;
    public function __construct($receipt,$employee, $brand, $total, $date){
        $this->id_receipt=$receipt;
        $this->id_employee=$employee;
        $this->id_brand=$brand;
        $this->total=$total;
        $this->date=$date;
    }

    public function getAll(){
        $sql = "SELECT * FROM tbl_receipt";
        $result = $this->conn->query($sql);
        if($result-> num_rows() > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function getByID($receipt){
        $rec = $receipt->getIdReceipt();
        $sql = "SELECT * FROM tbl_receipt WHERE id_receipt ="+$rec;
        $result = $this->conn->query($sql);
        if($result-> num_rows() > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function AddReceipt($receipt){
        $rec = $receipt->getIdReceipt();
        $emp = $receipt->getIdEmployee();
        $brand = $receipt->getIdBrand();
        $total = $receipt->getTotal();
        $date = $receipt->getDate();
        $sql = 'INSERT INTO tbl_receipt VALUES('+$rec+','+$emp+','+$brand+','+$total+','+$date+')';
        $result = $this->conn->query($sql);
        return $result;
    }

    public function UpdateReceipt($receipt){
        $rec = $receipt->getIdReceipt();
        $emp = $receipt->getIdEmployee();
        $brand = $receipt->getIdBrand();
        $total = $receipt->getTotal();
        $date = $receipt->getDate();
        $sql = 'UPDATE tbl_receipt SET id_employee='+$emp+',id_brand='+$brand+', total='+$total+',date='+$date+' WHERE id_receipt ='+$rec;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function DeleteReceipt($receipt){
        $rec = $receipt->getIdReceipt();
        $sql = 'DELETE FROM tbl_receipt WHERE id_receipt ='+ $rec;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getIdReceipt(){
        return $this->id_receipt;
    }

    public function getIdEmployee(){
        return $this->id_employee;
    }

    public function getIdBrand(){
        return $this->id_brand;
    }

    public function getTotal(){
        return $this->total;
    }

    public function getDate(){
        return $this->date;
    }
}
?>