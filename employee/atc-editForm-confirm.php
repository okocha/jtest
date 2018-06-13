<?php
$id_order_service = $_POST['id_order_serivce'];
$id_car = $_POST['id_car'];
$id_customer = $_POST['id_customer'];

$id_card_number = $_POST['id_card_number'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$sex = $_POST['sex'];
$address = $_POST['address'];
$tel = $_POST['tel'];

$car_reg_date = $_POST['car_reg_date'];

$id_category_car = explode(':', $_POST['id_category_car'])[0];
$name_category_car = explode(':', $_POST['id_category_car'])[1];
$car_char = $_POST['car_char'];
$car_number = $_POST['car_number'];

$car_province_id = explode(':', $_POST['car_province_id'])[0];
$car_province_name = explode(':', $_POST['car_province_id'])[1];
$car_brand = $_POST['car_brand'];
$car_model = $_POST['car_model'];
$car_chassis = $_POST['car_chassis'];

$sql = "SELECT * FROM tb_category_car WHERE id='$id_category_car'";
$rs = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($rs);

$price_check_car = $row['price_check_car'];
$price_atc = $row['price_atc'];
$price_car_tax = $row['price_car_tax'];
$price_service = $row['price_service'];
$total_price = $price_check_car + $price_atc + $price_car_tax + $price_service;
?>
<h1>พรบ. และทะเบียน ของลูกค้า</h1>

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header text-white bg-info">
                รายละเอียดลูกค้า
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered">
                    <tr>
                        <th class="w-25">เลขประจำตัวประชาชน</th>
                        <td> <?= $id_card_number ?> </td>
                    </tr>
                    <tr>
                        <th>ชื่อ</th>
                        <td><?= $firstname ?></td>
                    </tr>
                    <tr>
                        <th>นามสกุล</th>
                        <td><?= $lastname ?></td>
                    </tr>
                    <tr>
                        <th>เพศ</th>
                        <td><?= $sex ?></td>
                    </tr>
                    <tr>
                        <th>ที่อยู่</th>
                        <td><?= $address ?></td>
                    </tr>
                    <tr>
                        <th>เบอร์โทรศัพท์</th>
                        <td><?= $tel ?></td>
                    </tr>

                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header text white bg-warning">
                รายละเอียดรถ
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered">
                    <tr>
                        <th class="w-25">วันจดทะเบียน</th>
                        <td> <?= $car_reg_date ?> </td>
                    </tr>
                    <tr>
                        <th>ประเภทรถ</th>
                        <td> <?= $name_category_car ?> </td>
                    </tr>
                    <tr>
                        <th>เลขทะเบียน</th>
                        <td> <?= $car_char ?> - <?= $car_number ?> <?= $car_province_name ?> </td>
                    </tr>
                    <tr>
                        <th>ยี่ห้อรถ</th>
                        <td> <?= $car_brand ?> </td>
                    </tr>
                    <tr>
                        <th>รุ่นโมเดลรถ</th>
                        <td> <?= $car_model ?> </td>
                    </tr>
                    <tr>
                        <th>เลขตัวรถ</th>
                        <td> <?= $car_chassis ?> </td>
                    </tr>

                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header text-white bg-primary">
                รายละเอียดราคา
            </div>
            <div class="body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>ค่าตรวจสภาพรถ</td>
                            <td>ค่าพรบ.</td>
                            <td>ค่าภาษี</td>
                            <td>ค่าบริการต่อภาษี</td>
                            <td>รวมทั้งสิ้น</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= number_format($price_check_car) ?></td>
                            <td><?= number_format($price_atc) ?></td>
                            <td><?= number_format($price_car_tax) ?></td>
                            <td><?= number_format($price_service) ?></td>
                            <td><?= number_format($total_price) ?></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="text-center">
            <form action="index.php?menu=atc-editDB" method="post">

                <input type="hidden" name="id_order_service" value="<?= $id_order_service ?>">
                <input type="hidden" name="id_car" value="<?= $id_car ?>">
                <input type="hidden" name="id_customer" value="<?= $id_customer ?>">

                <input type="hidden" name="id_card_number" value="<?= $id_card_number ?>">
                <input type="hidden" name="firstname" value="<?= $firstname ?>">
                <input type="hidden" name="lastname" value="<?= $lastname ?>">
                <input type="hidden" name="sex" value="<?= $sex ?>">
                <input type="hidden" name="address" value="<?= $address ?>">
                <input type="hidden" name="tel" value="<?= $tel ?>">
                <input type="hidden" name="car_reg_date" value="<?= $car_reg_date ?>">
                <input type="hidden" name="id_category_car" value="<?= $id_category_car ?>">
                <input type="hidden" name="car_char" value="<?= $car_char ?>">
                <input type="hidden" name="car_number" value="<?= $car_number ?>">
                <input type="hidden" name="car_province_id" value=" <?= $car_province_id ?> ">
                <input type="hidden" name="car_brand" value="<?= $car_brand ?>">
                <input type="hidden" name="car_model" value="<?= $car_model ?>">
                <input type="hidden" name="car_chassis" value="<?= $car_chassis ?>">



                <button type="submit" class="btn btn-success">บันทึก</button>
                <input type="button" value="ยกเลิก" class="btn btn-danger" onclick="history.back()">

            </form>

        </div>

    </div>
</div>
