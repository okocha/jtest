<?php

$id = $_GET['id'];

$sql = "DELETE FROM tb_employee WHERE id = '$id'";
//exit($sql);
$rs = mysqli_query($conn, $sql);

if ($rs) {
    ?>
    <script type="text/javascript">
        

        window.location = 'index.php?menu=employee-show';
    </script>

    <?php

} else {
    ?>
    <script type="text/javascript">
        alert('Delete Fails!!!');

        history.back();
    </script>

    <?php

}
?>

