<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/connection.php');
include_once($filepath . '/../helpers/format.php');


?>
<?php
class Example
{

    private $conn;
    private $fm;

    public function __construct()
    {
        $this->conn = getConnection();
    }

    public function showAll() {

    }

    /*
    select all, select  select by id, by ..., insert, update, delete
    khóa ngoại có kiểu Restrict
    */

    public function insertA($valueA) {
        // SQL Inject
        $valueA = $this->conn->escape_string($valueA);
        //Validation
        
        /* @SQL
        $sql = 'SELECT * FROM tbl_nhanvien';
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0)
            return $result;
        else
            return false;

        */
    }
    

}