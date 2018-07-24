<?php
$file_name=$_FILES['picture']['name'];
$temp_name=$_FILES['picture']['tmp_name'];

$file_name= uniqid().$file_name;

$title = $_POST['title'];
$picture = $_POST['picture'];
$detail = $_POST['detail'];

$sql = "INSERT INTO tb_promotion(title,picture,detail)
        VALUES ('$title','$file_name','$detail')";

$rs = mysqli_query($conn, $sql);

if ($rs) {
    move_uploaded_file($temp_name,'../upload/'.$file_name);
    ?>
    <script type="text/javascript">
        alert('Insert Succuss!!!');

        window.location = 'index.php?menu=promotion-show';
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
