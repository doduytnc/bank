<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/26/2018
 * Time: 6:14 AM
 */
namespace Model;

use PDO;
use PDOException;

class connectDB
{
    private $url;
    private $user_name;
    private $password;
    public $conn;

    //Tạo phương thức connect database
    public function connect() {

        $this->user_name = "root";
        $this->password = "";
        $this->url = "mysql:host=localhost;dbname=bank";
        $this->conn = null;

        try {
            $this->conn = new PDO($this->url, $this->user_name, $this->password);             //tạo đối tượng tên là conn từ lớp PDO có sẵn
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Thiết lập exception: ném ra ngoại lệ khi gặp lỗi đồng thời tạo ra PHP warning
        } catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }

        return $this->conn;
    }
}