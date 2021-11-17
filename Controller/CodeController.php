<?php
require_once "Model/CodeModel.php";

class CodeController extends CodeModel
{
    private $code;
    private $phone;

    public function __construct($code, $phone)
    {
        $this->code = $this->sanitizeCode($code);
        $this->phone = $this->sanitizePhone($phone);
    }

    public function CheckCode() {

        return $this->SendCode($this->code, $this->phone);
    }

    private function SanitizeCode($code)
    {
        //remove spaces
        $code = preg_replace('/[^0-9.]+/', '', $code);
        return $code;

    }

    private function SanitizePhone($phone)
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