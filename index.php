<?php
declare(strict_types = 1);
include 'inc/autoloader.inc.php';

$phone = "0878 -(6 2 07 23";
$phone = preg_replace('/[^0-9.]+/', '', $phone);
//remove all left "0" if some wrote 00395 or 087
$phone = ltrim($phone, "0");
$phoneStart = substr($phone, 0, 2);

if ($phoneStart == 359) {
    $phone = '00' . $phone;
} else {
    $phone = '00359' . $phone;
}


var_dump(strlen($phone));

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="style.css">
    <script src="javascript.js"></script>

</head>
<body>
<div class="section-forms">
    <form action="inc/signup.php" style="border:1px solid #ccc" method="post">
        <div class="container">
            <div class="form-field">
                <label for="uid">Username</label>
                <input type="text" name="uid" id="uid" placeholder="username">
            </div>

            <div class="form-field">
                <label for="pwd">Password</label>
                <input type="password" name="pwd" id="pwd" placeholder="password">
            </div>

            <div class="form-field">
                <label for="pwdrepeat">Repeat Password</label>
                <input type="password" name="pwdrepeat" id="pwdrepeat" placeholder="repeat pasword">
            </div>

            <div class="form-field">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="email">
            </div>

            <div class="form-field">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" placeholder="phone">
            </div>

            <div class="form-field">
                <button type="submit" name="submit">SIGN UP</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>