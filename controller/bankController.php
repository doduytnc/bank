<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/26/2018
 * Time: 6:13 AM
 */
namespace CotrollerBank;

use Model\bankModel;
use \model\connectDB;

class bankController
{
    public $bankModel;

    public function __construct() {
     $connect = new connectDB();
     $this->bankModel = new bankModel($connect->connect());
    }

    public function index(){
        $trans = $this->bankModel->getAllTransaction();
        include 'view/list.php';
    }

    public function checkExistAccount($id) {
        $check = $this->bankModel->getAcountId($id);
        if ($check == $id)
            return true;
        else return false;
    }

/*    public function transfer() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/transfer.php';
        } else {
            $date = date('Y-m-d H:i:s');
            $this->bankModel->transferDB($_POST['sourceAcc'], $_POST['targetAcc'], $_POST['amount'], $date, $_POST['content']);
            header('Location: /WBD-PHP/bank/index.php?page=index'); //Quay trở lại trang index
            exit();
        }
    }*/

    public function transfer() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/transfer.php';
        } else {
            if($this->checkExistAccount($_POST['targetAcc'])==true
                and $this->checkExistAccount($_POST['sourceAcc'])==true) {
            $date = date('Y-m-d H:i:s');
            $this->bankModel->transferDB($_POST['sourceAcc'], $_POST['targetAcc'], $_POST['amount'], $date, $_POST['content']);
            header('Location: /WBD-PHP/bank/index.php?page=index'); //Quay trở lại trang index
            exit();
            } else {
                header('Location: /WBD-PHP/bank/index.php?page=transfer');
                echo "<script> alert('Tài khoản không tồn tại');</script>";

            }
        }
    }

/*    public function login() {
        include 'view/login.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userLogin = $_POST['userLogin'];
            $passLogin = $_POST['passLogin'];

            if ($this->bankModel->checkAcountName($userLogin)== true
                and $this->bankModel->getPasswordAccount($userLogin)==$passLogin){
                header('Location: /WBD-PHP/bank/index.php?page=index');
            } else echo "User or password invalid";
        }
    }*/

    public function login() {
        include 'view/login.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userLogin = $_POST['userLogin'];
            $passLogin = $_POST['passLogin'];

            if ($this->bankModel->checkAcountName($userLogin)== false) {
                echo "User name không tồn tại";
                header('Location: /WBD-PHP/bank/index.php');
            } elseif ($this->bankModel->getPasswordAccount($userLogin)==$passLogin) {
                header('Location: /WBD-PHP/bank/index.php?page=index');
                } else {
                echo "<p style='font-size: 20px; text-align: center'> Password invalid</p>";
                header("HTTP/1.1 401 Unauthorized");
            }
        }
    }

}

