<?php
error_reporting(0);
$kg = $_REQUEST['kg'];

if ($kg <= 500) {
    $price = 300;
} else if ($kg >= 501 && $kg <= 750) {
    $price = 450;
} else if ($kg >= 751 && $kg <= 1000) {
    $price = 600;
} else if ($kg >= 1001 && $kg <= 1250) {
    $price = 750;
} else if ($kg >= 1251 && $kg <= 1500) {
    $price = 900;
} else if ($kg >= 1501 && $kg <= 1750) {
    $price = 1050;
} else if ($kg >= 1751 && $kg <= 2000) {
    $price = 1350;
} else if ($kg >= 2001 && $kg <= 2500) {
    $price = 1650;
} else if ($kg >= 2501 && $kg <= 3000) {
    $price = 1950;
} else if ($kg >= 3001 && $kg <= 3500) {
    $price = 2250;
} else if ($kg >= 3501 && $kg <= 4000) {
    $price = 2550;
} else if ($kg >= 4001 && $kg <= 4500) {
    $price = 2850;
} else if ($kg >= 4501 && $kg <= 5000) {
    $price = 3150;
} else if ($kg >= 5001 && $kg <= 6000) {
    $price = 3450;
} else if ($kg >= 6001 && $kg <= 7000) {
    $price = 3750;
} else if ($kg >= 7001) {
    $price = 4050;
}
?>



<form action="" method="get">
    <input type="text" name="kg"> |
    <input type="submit" value="คำนวณ kg">

</form>

<h1>น้ำหนักรถกระบะบรรทุก รย.3 <?= $kg ?> กิโลกรัม ผลลัพธ์ : <?= number_format($price) ?></h1>