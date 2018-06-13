<?php

$category_car_name = $_POST['category_car_name'];
$price_check_car = $_POST['price_check_car'];
$price_service = $_POST['price_service'];
$price_car_tax = $_POST['price_car_tax'];
$price_atc = $_POST['price_atc'];

$sql = "INSERT INTO tb_category_car(category_car_name,price_check_car,price_service,price_car_tax,price_atc)
        VALUES ('$category_car_name','$price_check_car','$price_service','$price_car_tax','$price_atc')";

$rs = mysqli_query($conn, $sql);

if ($rs) {
    ?>
    <script type="text/javascript">
        alert('Insert Succuss!!!');

        window.location = 'index.php?menu=category-car-show';
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
