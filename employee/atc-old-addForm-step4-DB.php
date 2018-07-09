<?php

$id_order_service = $_REQUEST['id_order_service'];
$id_car = $_REQUEST['id_car'];
$id_customer = $_REQUEST['id_customer'];

$id_card_number = $_POST['id_card_number'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$sex = $_POST['sex'];
$address = $_POST['address'];
$tel = $_POST['tel'];
$price_service_express = $_POST['price_service_express'];

$car_reg_date = $_POST['car_reg_date'];
$car_exp_date = $_POST['car_exp_date'];

$id_category_car = $_POST['id_category_car'];

$car_char = $_POST['car_char'];
$car_number = $_POST['car_number'];

$car_province_id = $_POST['car_province_id'];


$car_brand = $_POST['car_brand'];
$car_model = $_POST['car_model'];
$car_cc = $_POST['car_cc'];
$car_chassis = $_POST['car_chassis'];

$price_car_tax_owe = $_POST['price_car_tax_owe'];
$price_car_tax = $_POST['price_car_tax'];
$price_tax_fine = $_POST['price_tax_fine'];

$LOGIN_EMPLOYEE = $_SESSION['LOGIN_EMPLOYEE'];

$sql = " UPDATE tb_customer SET
            id_card_number = '$id_card_number',
            firstname = '$firstname',
            lastname ='$lastname',
            sex ='$sex',
            address ='$address',
            tel ='$tel'
        WHERE id = 'id_customer'
        ";
$rs1 = mysqli_query($conn, $sql);

$sql = "UPDATE tb_car SET
    id_category_car = '$id_category_car',
    car_char = '$car_char',
    car_number = '$car_number',
    car_province_id = '$car_province_id',
    car_brand = '$car_brand',
    car_model = '$car_model',
    car_cc = '$car_cc',
    car_chassis = '$car_chassis',
    car_reg_date = '$car_reg_date',
    car_exp_date = '$car_exp_date'
    WHERE  id ='$id_car'

        ";
$rs2 = mysqli_query($conn, $sql);


$sql = "INSERT INTO tb_order_service(
    id_car,
    id_insurance_type,
    service_date,
    price_car_tax_order,
    price_car_tax_owe,
    price_tax_fine,
    price_service_express,
    id_employee
    )
    VALUES (
    '$id_car',
    '0',
    CURRENT_DATE(),
    '$price_car_tax',
    '$price_car_tax_owe',
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
?>