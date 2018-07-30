<?php
$id=$_SESSION['LOGIN_EMPLOYEE'];
$sql = " 
    SELECT * FROM tb_employee WHERE id=$id
       ";

$rs= mysqli_query($conn, $sql);

$row= mysqli_fetch_array($rs);
?>

<h1>ยินดีต้อนรับ: <?=$row['firstname']?> <?=$row['lastname']?></h1>