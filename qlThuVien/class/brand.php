<?php
class Brand{
    private $id_brand;
    private $name;
    public $conn;
    public function __construct($id_brand, $name){
        $this->id_brand=$id_brand;
        $this->name=$name;
    }
    public function getAll(){
        $sql = "SELECT * FROM tbl_brand";
        $result = $this->conn->query($sql);
        if($result -> num_rows() > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function getByIDBrand($brand){
        $id = $brand->getIdBrand();
        $sql = 'SELECT * FROM tbl_brand WHERE id_brand='+$id;
        $result = $this->conn->query($sql);
        if($result -> num_rows() > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function AddBrand($brand){
        $id = $brand->getIdBrand();
        $name = $brand->getName;
        $sql = 'INSERT INTO tbl_brand VALUES('+$id+','+$name+')';
        $result = $this->conn->query($sql);
        return $result;
    }

    public function UpdateBrand($brand){
        $id = $brand->getIdBrand();
        $name = $brand->getName;
        $sql = 'UPDATE tbl_brand SET name ='+$name+' WHERE id_brand = '+$id;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function DeleteBrand($brand){
        $id = $brand->getIdBrand();
        $sql = 'DELETE FROM tbl_brand WHERE id_brand = '+$id;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getIdBrand(){
        return $this->id_brand;
    }

    public function getName(){
        return $this->name;
    }
}
?>