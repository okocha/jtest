<?php

$id_order_service = $_REQUEST['id'];

$sql = "
    UPDATE tb_order_service SET 
        work_status ='เรียบร้อย'
    WHERE
        id = '$id_order_service'

    ";
$rs = mysqli_query($conn, $sql);
if ($rs) {
    ?>
    <script type="text/javascript">
        window.location = 'index.php?menu=progress-atc-show';
    </script>
    <?php

} else {
    echo "UPDATE บ่ได้" . mysqli_error($conn);
}
?>