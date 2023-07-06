<?php 
class Product {
    private $id_product;
    private $name;
    private $id_brand;
    private $quantity;
    private $price;
    private $image;
    public $conn;
    public function __construct($id_product, $name, $id_brand, $quantity, $price, $image){
        $this->$id_product=$id_product;
        $this->name=$name;
        $this->id_brand=$id_brand;
        $this->quantity=$quantity;
        $this->price=$price;
        $this->image=$image;
    }

    public function getAll(){
        $sql = "SELECT * FROM tbl_product";
        $result = $this->conn->query($sql);
        if($result-> num_rows() > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function getByID($product){
        $id = $product->getIdProduct();
        $sql = "SELECT * FROM tbl_product WHERE id_product ="+$id;
        $result = $this->conn->query($sql);
        if($result-> num_rows() > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function AddProduct($product){
        $id = $product->getIdProduct();
        $name = $product->getName();
        $id_brand = $product->getIdBrand();
        $quantity = $product->getQuantity();
        $price= $product->getPrice();
        $image= $product->getImage();
        $sql = 'INSERT INTO tbl_product VALUES('+$id+','+$name+','+$id_brand+','+$quantity+','+$price+','+$image+')';
        $result = $this->conn->query($sql);
        return $result;
    }

    public function UpdateProduct($product){
        $id = $product->getIdProduct();
        $name = $product->getName();
        $id_brand = $product->getIdBrand();
        $quantity = $product->getQuantity();
        $price= $product->getPrice();
        $image= $product->getImage();
        $sql = 'UPDATE tbl_product SET name='+$name+', id_brand='+$id_brand+', quantity='+$quantity+', price='+$price+',image='+$image+' WHERE id_product ='+$id;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function DeleteProduct($product){
        $id = $product->getIdProduct();
        $sql = 'DELETE FROM tbl_product WHERE id_product ='+ $id;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getIdProduct(){
        return $this->id_product;
    }

    public function getName(){
        return $this->name;
    }

    public function getIdBrand(){
        return $this->id_brand;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getImage(){
        return $this->image;
    }
}
?>