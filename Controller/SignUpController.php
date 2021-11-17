<?php
require_once "../Model/SignUpModel.php";

class SignUpController extends SignUpModel {
    private $uid;
    private $pwd;
    private $pwdrepeat;
    private $email;
    private $phone;

    public function __construct($uid, $pwd, $pwdrepeat, $email, $phone)
    {
        ;
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdrepeat = $pwdrepeat;
        $this->email = $email;
        $this->phone = $this->sanitizePhone($phone);
    }

    private function emptyInput():bool
    {
        $result = true;

        if (empty($this->uid) || empty($this->pwd) || empty($this->pwdrepeat) || empty($this->email) || empty($this->phone) ) {
            $result = false;
        }

        return $result;
    }

    private function ivalidUid()
    {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function ivalidPhone()
    {
        if (strlen($this->phone) !== 14) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    public function SendCode($phone) {
        return $this->insertCode($phone);
    }

    public function sanitizePhone($phone)
    {
        //remove spaces
        $phone = preg_replace('/[^0-9.]+/', '', $phone);
        //remove all left "0" if some wrote 00395 or 087
        $phone = ltrim($phone, "0");

        $phoneStart = substr($phone, 0, 3);

        if ($phoneStart == 359) {
            $phone = '00' . $phone;
        } else {
            $phone = '00359' . $phone;
        }

        return $phone;
    }
}