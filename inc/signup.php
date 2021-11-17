<?php
if (isset($_POST['submit'])) {
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdrepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    require_once "../Controller/SignUpController.php";
    require __DIR__ . "/bootstrap.php";


    session_write_close();
    session_start();
    $_SESSION = $_POST;
    session_write_close();


    $signup = new SignUpController($uid, $pwd, $pwdrepeat, $email, $phone);

    $phoneClean = $signup->sanitizePhone($phone);
    $result = $signup->sendCode($phoneClean);
    if ($result == true) {
        header("Location: ../codeCheck.php?phone=" . $phoneClean);
    }


} else {

}

?>


