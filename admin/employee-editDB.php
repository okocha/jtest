<?php
$id=$_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$tel = $_POST['tel'];

$sql = "UPDATE tb_employee SET username ='$username',
        password='$password',
        firstname='$firstname',
        lastname='$lastname',
        email='$email',
        tel='$tel'
        WHERE id = '$id'";


$rs = mysqli_query($conn, $sql);

if ($rs) {
    ?>
    <script type="text/javascript">
        alert('Edit Succuss!!!');

        window.location = 'index.php?menu=employee-show';
    </script>

    <?php

} else {
    ?>
    <script type="text/javascript">
        alert('Edit Fails!!!');

        history.back();
    </script>

    <?php

}
?>
