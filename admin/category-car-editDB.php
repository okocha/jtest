<?php
$id=$_POST['id'];
$category_car_name = $_POST['category_car_name'];
$price_check_car = $_POST['price_check_car'];
$price_service = $_POST['price_service'];
$price_car_tax = $_POST['price_car_tax'];
$price_atc = $_POST['price_atc'];

$sql = "UPDATE tb_category_car SET category_car_name ='$category_car_name',
        price_check_car='$price_check_car',
        price_service='$price_service',
        price_car_tax='$price_car_tax',
        price_atc='$price_atc'
        WHERE id = '$id'";


$rs = mysqli_query($conn, $sql);

if ($rs) {
    ?>
    <script type="text/javascript">
        alert('Edit Succuss!!!');

        window.location = 'index.php?menu=category-car-show';
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
