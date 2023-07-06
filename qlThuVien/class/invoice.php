<?php 
class Invoice {
    private $id_invoice;
    private $id_employee;
    private $id_voucher;
    private $total;
    private $date;
    public $conn;
    public function __construct($id_invoice, $id_employee, $id_voucher, $total, $date){
        $this->id_invoice=$id_invoice;
        $this->id_employee=$id_employee;
        $this->id_invoice=$id_voucher;
        $this->total=$total;
        $this->date=$date;
    }

    public function getAll(){
        $sql = "SELECT * FROM tbl_invoice";
        $result = $this->conn->query($sql);
        if($result-> num_rows() > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function getByID($invoice){
        $id = $invoice->getIdInvoice();
        $sql = "SELECT * FROM tbl_invoice WHERE id_invoice ="+$id;
        $result = $this->conn->query($sql);
        if($result-> num_rows() > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function AddInvoice($invoice){
        $id = $invoice->getIdInvoice();
        $id_employee = $invoice->getIdEmployee();
        $id_voucher = $invoice->getIdVoucher();
        $total = $invoice->getTotal();
        $date= $invoice->getDate();
        $sql = 'INSERT INTO tbl_invoice VALUES('+$id+','+$id_employee+','+$id_voucher+','+$total+','+$date+')';
        $result = $this->conn->query($sql);
        return $result;
    }

    public function UpdateInvoice($invoice){
        $id = $invoice->getIdInvoice();
        $id_employee = $invoice->getIdEmployee();
        $id_voucher = $invoice->getIdVoucher();
        $total = $invoice->getTotal();
        $date= $invoice->getDate();
        $sql = 'UPDATE tbl_invoice SET id_employee='+$id_employee+', id_voucher='+$id_voucher+', total='+$total+', date'+$date+' WHERE id_invoice ='+$id;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function DeleteInvoice($invoice){
        $id = $invoice->getIdInvoice();
        $sql = 'DELETE FROM tbl_invoice WHERE id_invoice ='+ $id;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getIdInvoice(){
        return $this->id_invoice;
    }

    public function getIdEmployee(){
        return $this->id_employee;
    }

    public function getIdVoucher(){
        return $this->id_voucher;
    }

    public function getTotal(){
        return $this->total;
    }

    public function getDate(){
        return $this->date;
    }
}
?>