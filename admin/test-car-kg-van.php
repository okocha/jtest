<?php
error_reporting(0);
$kg = $_REQUEST['kg'];

if ($kg <= 500) {
    $price = 150;
} else if ($kg >= 501 && $kg <= 750) {
    $price = 300;
} else if ($kg >= 751 && $kg <= 1000) {
    $price = 450;
} else if ($kg >= 1001 && $kg <= 1250) {
    $price = 800;
} else if ($kg >= 1251 && $kg <= 1500) {
    $price = 1000;
} else if ($kg >= 1501 && $kg <= 1750) {
    $price = 1300;
} else if ($kg >= 1751 && $kg <= 2000) {
    $price = 1600;
} else if ($kg >= 2001 && $kg <= 2500) {
    $price = 1900;
} else if ($kg >= 2501 && $kg <= 3000) {
    $price = 2200;
} else if ($kg >= 3001 && $kg <= 3500) {
    $price = 2400;
} else if ($kg >= 3501 && $kg <= 4000) {
    $price = 2600;
} else if ($kg >= 4001 && $kg <= 4500) {
    $price = 2800;
} else if ($kg >= 4501 && $kg <= 5000) {
    $price = 3000;
} else if ($kg >= 5001 && $kg <= 6000) {
    $price = 3200;
} else if ($kg >= 6001 && $kg <= 7000) {
    $price = 3400;
} else if ($kg >= 7001) {
    $price = 3600;
}
?>



<form action="" method="get">
    <input type="text" name="kg"> |
    <input type="submit" value="คำนวณ kg">

</form>

<h1>น้ำหนักรถยนต์นั่งส่วนบุคคลเกิน 7 คน รย.2 <?= $kg ?> กิโลกรัม ผลลัพธ์ : <?= number_format($price) ?></h1>