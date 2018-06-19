<?php

$id_card_number = $_POST['id_card_number'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$sex = $_POST['sex'];
$address = $_POST['address'];
$tel = $_POST['tel'];
$price_service_express = $_POST['price_service_express'];

$car_reg_date = $_POST['car_reg_date'];
$car_exp_date = $_POSt['car_exp_date'];

$id_category_car = $_POST['id_category_car'];

$car_char = $_POST['car_char'];
$car_number = $_POST['car_number'];

$car_province_id = $_POST['car_province_id'];


$car_brand = $_POST['car_brand'];
$car_model = $_POST['car_model'];
$car_cc = $_POST['car_cc'];
$car_chassis = $_POST['car_chassis'];

$price_tax_fine = $_POST['price_tax_fine'];
$price_car_tax = $_POST['price_car_tax'];



$sql = "
    INSERT INTO tb_customer(
            id_card_number,
            firstname,
            lastname,
            sex,
            address,
            tel
    ) VALUES (
        '$id_card_number',
        '$firstname',
        '$lastname',
        '$sex',
        '$address',
        '$tel'
    )
        ";

$rs1 = mysqli_query($conn, $sql);

$INSERT_CUSTOMER_ID = mysqli_insert_id($conn);

$sql = " INSERT INTO tb_car(
    id_category_car,
    car_char,
    car_number,
    car_province_id,
    car_brand,
    car_model,
    car_cc,
    car_chassis,
    car_reg_date,
    car_exp_date,
    id_customer
    )VALUES(
    '$id_category_car',
    '$car_char',
    '$car_number',
    '$car_province_id',
    '$car_brand',
    '$car_model',
    '$car_cc',
    '$car_chassis',
    '$car_reg_date',
    '$car_exp_date',
    '$INSERT_CUSTOMER_ID'
    )
         ";


$rs2 = mysqli_query($conn, $sql);
$INSERT_CAR_ID = mysqli_insert_id($conn);

$LOGIN_EMPLOYEE = $_SESSION['LOGIN_EMPLOYEE'];

$sql = "INSERT INTO tb_order_service(
    id_car,
    id_insurance_type,
    service_date,
    price_car_tax_order,
    price_tax_fine,
    price_service_express,
    id_employee
    )
    VALUES (
    '$INSERT_CAR_ID',
    '0',
    CURRENT_DATE(),
    '$price_car_tax',
    '$price_tax_fine',
    '$price_service_express',
    '$LOGIN_EMPLOYEE'
)
         ";

$rs3 = mysqli_query($conn, $sql);
if ($rs1 && $rs2 && $rs3) {
    echo 'Inserted';
    ?>
    <script type="text/javascript">
        alert('บันทึกสำเร็จ');
        window.location = 'index.php?menu=atc-show';
    </script>

    <?php

} else {
    exit('Cannot Insert');
}
?>


