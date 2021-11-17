<?php
require __DIR__ . "/Controller/CodeController.php";
require __DIR__ . "/inc/bootstrap.php";

session_write_close();
session_start();

$uid = $_SESSION['uid'];
$pwd = $_SESSION['pwd'];
$pwdrepeat = $_SESSION['pwdrepeat'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}


if (isset($_POST['check'])) {

    $code = $_POST['code'];
    $codeClass = new CodeController($code, $phone);

    $check = $codeClass->CheckCode();


    if ($check === false) {
        $_SESSION['counter'] = $_SESSION['counter'] + 1;
    } else {
        $_SESSION['counter'] = 0;
    }

    if ($_SESSION['counter'] >= 3) {
        $startCooldown = '<div id="counter" class="blocker CDstart"> </div>';
        $blockForm = 'block';
    } else {
        $startCooldown = '<div id="counter" class="blocker"> </div>';
        $blockForm = '';
    }

}
session_write_close();
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



    <form id="frm-code" class="<?php echo $blockForm;?>" action="#" style="border:1px solid #ccc" method="post">
        <?php echo $startCooldown; ?>
        <div class="container">
            <div class="form-field">
                <p>Validate Phone</p>
                <p> <?php echo $phone?></p>
            </div>

            <div class="form-field">
                <label for="code">Code</label>
                <input type="text" name="code" id="code" placeholder="code">
            </div>

            <div class="form-field">
                <button type="submit" name="check">Check</button>
            </div>
        </div>
    </form>
</div>



</body>

<script>
    var seconds=60;
    var timer;
    function myFunction() {
        if(seconds < 60) {
            document.getElementById("counter").innerHTML = seconds;
        }
        if (seconds >0 ) {
            seconds--;
        } else {
            clearInterval(timer);
            document.querySelector('.block').classList.remove('block');
            alert("You can try again");
        }
    }
    let down = document.querySelector('.blocker');
    if  (down.classList.contains('CDstart') == true) {
        function Start() {
            if(!timer) {
                timer = window.setInterval(function() {
                    myFunction();
                }, 1000);
            }
        }
        Start();
    }

</script>
</html>
