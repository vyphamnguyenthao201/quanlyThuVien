<?php 
class ReceiptItem {
    private $id_receipt;
    private $id_product;
    private $quantity;
    private $price;
    public $conn;
    public function __construct($receipt,$product, $quan,$pri){
        $this->id_receipt=$receipt;
        $this->id_product=$product;
        $this->quantity=$quan;
        $this->price=$pri;
    }

    public function getAll(){
        $sql = "SELECT * FROM tbl_receipt_item";
        $result = $this->conn->query($sql);
        if($result-> num_rows() > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function getByID($receipt_item){
        $receipt = $receipt_item->getIdReceipt();
        $sql = "SELECT * FROM tbl_receipt_item WHERE id_receipt ="+$receipt;
        $result = $this->conn->query($sql);
        if($result-> num_rows() > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function AddReceiptItem($receipt_item){
        $receipt = $receipt_item->getIdReceipt();
        $product = $receipt_item->getIdProduct();
        $quan = $receipt_item->getQuantity();
        $pri = $receipt_item->getPrice();
        $sql = 'INSERT INTO tbl_receipt_item VALUES('+$receipt+','+$product+','+$quan+','+$pri+')';
        $result = $this->conn->query($sql);
        return $result;
    }

    public function UpdateReceiptItem($receipt_item){
        $receipt = $receipt_item->getIdReceipt();
        $product = $receipt_item->getIdProduct();
        $quan = $receipt_item->getQuantity();
        $pri = $receipt_item->getPrice();
        $sql = 'UPDATE tbl_receipt_item SET id_customer='+$product+',quantity='+$quan+', price='+$pri+' WHERE id_receipt ='+$receipt;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function DeleteReceiptItem($receipt_item){
        $receipt = $receipt_item->getIdReceipt();
        $sql = 'DELETE FROM tbl_receipt_item WHERE id_receipt ='+ $receipt;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getIdReceipt(){
        return $this->id_receipt;
    }

    public function getIdProduct(){
        return $this->id_product;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function getPrice(){
        return $this->price;
    }
}
?>