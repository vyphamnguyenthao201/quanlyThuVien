<?php 
class Voucher {
    private $id_voucher;
    private $code;
    private $discountpercent;
    private $datebegin;
    private $dateend;
    public $conn;
    public function __construct($id_voucher, $code, $discountpercent, $datebegin, $dateend){
        $this->id_voucher=$id_voucher;
        $this->code=$code;
        $this->discountpercent=$discountpercent;
        $this->datebegin=$datebegin;
        $this->datebegin=$dateend;
    }

    public function getAll(){
        $sql = "SELECT * FROM tbl_voucher";
        $result = $this->conn->query($sql);
        if($result-> num_rows() > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function getByID($voucher){
        $id = $voucher->getIdReceipt();
        $sql = "SELECT * FROM tbl_voucher WHERE id_voucher ="+$id;
        $result = $this->conn->query($sql);
        if($result-> num_rows() > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function AddVoucher($voucher){
        $id = $voucher->getIdVoucher();
        $code = $voucher->getCode();
        $discountpercent = $voucher->getDiscountpercent();
        $datebegin = $voucher->getDateBegin();
        $dateend = $voucher->getDateEnd();
        $sql = 'INSERT INTO tbl_voucher VALUES('+$id+','+$code+','+$discountpercent+','+$datebegin+','+$dateend+')';
        $result = $this->conn->query($sql);
        return $result;
    }

    public function UpdateVoucher($voucher){
        $id = $voucher->getIdVoucher();
        $code = $voucher->getCode();
        $discountpercent = $voucher->getDiscountpercent();
        $datebegin = $voucher->getDateBegin();
        $dateend = $voucher->getDateEnd();
        $sql = 'UPDATE tbl_voucher SET code='+$code+',discountpercent='+$discountpercent+', datebegin='+$datebegin+', dateend'+$dateend+' WHERE id_voucher ='+$id;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function DeleteVoucher($voucher){
        $id = $voucher->getIdVoucher();
        $sql = 'DELETE FROM tbl_voucher WHERE id_voucher ='+ $id;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getIdVoucher(){
        return $this->id_voucher;
    }

    public function getCode(){
        return $this->code;
    }

    public function getDiscountpercent(){
        return $this->discountpercent;
    }

    public function getDateBegin(){
        return $this->datebegin;
    }

    public function getDateEnd(){
        return $this->dateend;
    }
}
?>