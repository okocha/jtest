<?php
$sql = "
    UPDATE tb_order_service SET 
        work_status ='กำลังดำเนินการ'
    WHERE
        work_status = 'ไม่เรียบร้อย'

    ";
$rs = mysqli_query($conn, $sql);
if($rs){
    ?>
    <script type="text/javascript">
    window.location='index.php?menu=atc-show';
    </script>
        <?php
}else{
    echo "UPDATE บ่ได้".mysqli_error($conn);
}
?>
