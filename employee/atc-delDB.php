<?php

$id = $_REQUEST['id'];
echo $id;

$sql = "DELETE FROM tb_order_service WHERE id='$id'";
$rs = mysqli_query($conn, $sql);


if ($rs) {
    echo 'ลบสำเร็จ';
    ?>
    <script type="text/javascript">
        history.back();
    </script>

    <?php

} else {
    echo 'ลบไม่สำเร็จ';
}
?>