<?php 
class InvoiceItem {
    private $id_invoice;
    private $id_product;
    private $quantity;
    private $price;
    public $conn;
    public function __construct($id_invoice, $id_product, $quantity, $price){
        $this->id_invoice=$id_invoice;
        $this->id_product=$id_product;
        $this->quantity=$quantity;
        $this->price=$price;
    }

    public function getAll(){
        $sql = "SELECT * FROM tbl_invoice_item";
        $result = $this->conn->query($sql);
        if($result-> num_rows() > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function getByID($invoice){
        $id = $invoice->getIdInvoice();
        $sql = "SELECT * FROM tbl_invoice_item WHERE id_invoice ="+$id;
        $result = $this->conn->query($sql);
        if($result-> num_rows() > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function AddInvoiceItem($invoice){
        $id = $invoice->getIdInvoice();
        $id_product = $invoice->getIdProduct();
        $quantity = $invoice->getQuantity();
        $price= $invoice->getPrice();
        $sql = 'INSERT INTO tbl_invoice_item VALUES('+$id+','+$id_product+','+$quantity+','+$price+')';
        $result = $this->conn->query($sql);
        return $result;
    }

    public function UpdateInvoiceItem($invoice){
        $id = $invoice->getIdInvoice();
        $id_product = $invoice->getIdProduct();
        $quantity = $invoice->getQuantity();
        $price= $invoice->getPrice();
        $sql = 'UPDATE tbl_invoice_item SET id_product='+$id_product+', quantity='+$quantity+', price='+$price+' WHERE id_invoice ='+$id;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function DeleteInvoiceItem($invoice){
        $id = $invoice->getIdInvoice();
        $sql = 'DELETE FROM tbl_invoice_item WHERE id_invoice ='+ $id;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getIdInvoice(){
        return $this->id_invoice;
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