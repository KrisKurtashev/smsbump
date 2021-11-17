<?php
require_once "Database.php";

class CodeModel extends Database
{
    public function SendCode($code, $phone)
    {
        $this->connectPDO();

        $query = "SELECT id FROM sms_sender WHERE phone = ".  $phone ." AND code = ".$code .";";


        $stmt = $this->connection->prepare($query);

        if (!$stmt->execute(array($phone, $code))) {
            var_dump($stmt->errorInfo());
            $stmt = null;
        }

        $data = $stmt->fetchALL(PDO::FETCH_ASSOC);
        if (!empty($data[0])) {
            $result = true;
        } else {
            $result = false;
        }


        return $result;
    }
}