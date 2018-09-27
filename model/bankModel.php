<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/26/2018
 * Time: 9:54 AM
 */

namespace Model;
use PDO;

class bankModel
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAllTransaction() {
        $sql = "SELECT * FROM `transaction_history` ORDER BY dateTime DESC ";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    public function getAcountId($id) {
        $sql = "SELECT * FROM `user_account` WHERE `id` = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetch((PDO::FETCH_ASSOC));
        $accId = $result['id'];
        return $accId;
    }

    public function checkAcountName($userName) {
        $sql = "SELECT * FROM `user_account` WHERE `userName` = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $userName);
        $stmt->execute();
        $result = $stmt->fetch((PDO::FETCH_ASSOC));
        $accName = $result['userName'];
        if ($accName!== null)
            return true;
        else return false;
    }


    public function getPasswordAccount($userName) {
        $sql = "SELECT * FROM `user_account` WHERE `userName` = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $userName);
        $stmt->execute();
        $result = $stmt->fetch((PDO::FETCH_ASSOC));
        $passAcc = $result['password'];
        return $passAcc;
    }

    public function getAmountAccount($id) {
        $sql = "SELECT * FROM `user_account` WHERE `id` = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetch((PDO::FETCH_ASSOC));
        $accBalance = $result['balance'];
        if ($accBalance !== null)
        return $accBalance;
        else return 0;
    }

    public function transferDB($sourceAcc, $targetAcc, $amount, $date, $content)
    {
        $this->connection->beginTransaction();

        $balanceSource = $this->getAmountAccount($sourceAcc);

        if ($balanceSource < $amount) {
            echo "Số tiền trong taì khoản không đủ ";
            $success = 0;
        };

        if ($balanceSource > $amount) {

            $sqlUpdateSource = "UPDATE `user_account` SET balance = balance - ? WHERE id = ?";
            $query = $this->connection->prepare($sqlUpdateSource);
            $query->execute([$amount, $sourceAcc]);

            $sqlUpdateTarget = "UPDATE `user_account` SET balance=balance + ? WHERE id = ?";
            $query = $this->connection->prepare($sqlUpdateTarget);
            $query->execute([$amount, $targetAcc]);
            $success = 1;

        };

        $updateTrans = "INSERT INTO `transaction_history`(`target_id`, `source_id`, `amount`, `content`, `datetime`, `success`) VALUES (?,?,?,?,?,?)";
        $query = $this->connection->prepare($updateTrans);
        $query->execute([$targetAcc, $sourceAcc, $amount, "$content", "$date", $success]);

        $this->connection->commit();

    }



}