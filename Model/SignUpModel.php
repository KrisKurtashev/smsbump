<?php
require_once "Database.php";

class SignUpModel extends Database
{
    public function insertCode($phone)
    {
        $this->connectPDO();
        $text = 'Use this code for validation';
        $code = rand(10000, 99999);

        $query = "INSERT INTO sms_sender (phone, text, code) VALUES (?, ?, ?);";

        $stmt = $this->connection->prepare($query);

        if (!$stmt->execute(array($phone, $text, $code))) {
            var_dump($stmt->errorInfo());
            $stmt = null;
        }

        return true;
    }
}