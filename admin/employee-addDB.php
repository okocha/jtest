<?php

$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$tel = $_POST['tel'];


$sql = " 
        INSERT INTO tb_employee(username,password,firstname,lastname,email,tel)
        VALUES ('$username','$password','$firstname','$lastname','$email','$tel')
       
       ";

$rs = mysqli_query($conn, $sql);

if ($rs) {
    ?>
    <script type="text/javascript">
        alert('Insert Succuss!!!');

        window.location = 'index.php?menu=employee-show';
    </script>

    <?php

} else {
    ?>
    <script type="text/javascript">
        alert('Insert Fails!!!');

        history.back();
    </script>

    <?php

}
?>
