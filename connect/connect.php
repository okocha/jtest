<?php
// on Docker 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pro2";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connect Database fail : " . $conn->connect_error);
  exit("EXIT;");
}

// SET UTF8 ป้องกันภาษาต่างดาว
$query = $conn->query("SET NAMES UTF8");

// ตั้งค่า Timezone ให้เป็น กรุงเทพ
date_default_timezone_set("Asia/Bangkok");
?>