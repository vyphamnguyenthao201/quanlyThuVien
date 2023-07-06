<?php 
    function connect(){
        $host = "localhost";
        $username = "root"; 
        $password = "";
        $database = "ooad";
        $conn = mysqli_connect($host,$username,$password,$database);
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }
        return $conn;
    }
class Employee {
    private $id_employee;
    private $fullname;
    private $username;
    private $address;
    private $phone;
    private $email;
    private $password;
    private $position;
    private $status;
       
    public function __construct(/*$id_employee, $username,$fullname, $address, $phone, $email, $password, $position, $status*/){
        // $this->id_employee=$id_employee;
        // $this->fullname=$fullname;
        // $this->username=$username;
        // $this->address=$address;
        // $this->email=$email;
        // $this->password=$password;
        // $this->position=$position;
        // $this->status=$status;
        // $this->phone=$phone;
    }
    public function setNhanvien($username,$fullname, $address, $phone, $email, $password, $position, $status){
        $this->fullname=$fullname;
        $this->username=$username;
        $this->address=$address;
        $this->email=$email;
        $this->password=$password;
        $this->position=$position;
        $this->status=$status;
        $this->phone=$phone;
    }
    public function getAll(){
        $conn = connect(); 
        $sql = "SELECT * FROM nhanvien";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function getByID($id){
        $conn = connect(); 
        $sql = "SELECT * FROM nhanvien WHERE MaNhanVien =".$id;
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function AddEmployee($employee){
        $conn = connect(); 
        //$id = $employee->getIdEmployee();
        $fullname = $employee->getFullName();
        $username = $employee->getUserName();
        $phone = $employee->getPhone();
        $email = $employee->getEmail();
        $address = $employee->getAddress();
        $position = $employee->getPosition();
        $password = $employee->getPassword();
        $status = $employee->getStatus();
        $sql = 'INSERT INTO nhanvien VALUES(NULL,"'.$username.'","'.$fullname.'","'.$address.'","'.$phone.'","'.$email.'","'.$password.'",'.$position.','.$status.')';
        $result = mysqli_query($conn,$sql);
        return $result;
    }
    public function LockEmployee($employee){
        $conn = connect(); 
        $id = $employee->getIdEmployee();
        $sql = 'UPDATE nhanvien SET TrangThai = 0 WHERE MaNhanVien ='.$id;
        $result = mysqli_query($conn,$sql);
        return $result;
    }
    public function UnlockEmployee($employee){
        $conn = connect(); 
        $id = $employee->getIdEmployee();
        $sql = 'UPDATE nhanvien SET TrangThai = 1 WHERE MaNhanVien ='.$id;
        $result = mysqli_query($conn,$sql);
        return $result;
    }
    public function UpdateemployeeItem($employee){
        $conn = connect(); 
        $id = $employee->getIdEmployee();
        $fullname = $employee->getFullName();
        $username = $employee->getUserName();
        $phone = $employee->getPhone();
        $email = $employee->getEmail();
        $address = $employee->getAddress();
        $position = $employee->getPosition();
        $password = $employee->getPassword();
        $status = $employee->getStatus();
        $sql = 'UPDATE nhanvien SET TenDangNhap='.$username.', HoTen='.$fullname.', DiaChi='.$address.', SoDienThoai='.$phone.',Email='.$email.', MatKhau='.$password.',ChucVu='.$position.',TrangThai='.$status.' WHERE MaNhanVien ='.$id;
        $result = mysqli_query($conn,$sql);
        return $result;
    }

    public function Deleteemployee($employee){
        $conn = connect(); 
        $id = $employee->getIdEmployee();
        $sql = 'DELETE FROM NhanVien WHERE MaNhanVien ='. $id;
        $result = mysqli_query($conn,$sql);
        return $result;
    }
    public function getIdEmployee(){
        return $this->id_employee;
    }
    public function setIdEmployee($id){
        $this->id_employee = $id;
    }

    public function getUserName(){
        return $this->username;
    }

    public function getFullName(){
        return $this->fullname;
    }

    public function getAddress(){
        return $this->address;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getPosition(){
        return $this->position;
    }

    public function getStatus(){
        return $this->status;
    }
    
}
?>
