<?php
session_start();
include '../connect/connect.php';

$user = $_POST['user'];
$pass = $_POST['pass'];


$sql = "SELECT * FROM tb_admin WHERE username='$user' AND password='$pass' ";

$rs = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($rs);

if (mysqli_num_rows($rs) > 0) {
    echo 'Login ได้';

    $_SESSION['LOGIN_ADMIN'] = $row['id'];

    ?>
    <script type="text/javascript">
        window.location = "index.php";
    </script>
    <?php
}else{
    ?>
    <script type="text/javascript">
        alert('Login Fails!!!');

        history.back();
    </script>
    <?php
}
?>