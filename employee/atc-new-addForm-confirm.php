<?php
$id_card_number = $_POST['id_card_number'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$sex = $_POST['sex'];
$address = $_POST['address'];
$tel = $_POST['tel'];

$car_reg_date = $_POST['car_reg_date'];
$car_exp_date = $_POST['car_exp_date'];

$id_category_car = explode(':', $_POST['id_category_car'])[0];
$name_category_car = explode(':', $_POST['id_category_car'])[1];


$car_char = $_POST['car_char'];
$car_number = $_POST['car_number'];

$car_province_id = explode(':', $_POST['car_province_id'])[0];
$car_province_name = explode(':', $_POST['car_province_id'])[1];

$car_brand = $_POST['car_brand'];
$car_model = $_POST['car_model'];
$car_chassis = $_POST['car_chassis'];

$sql = "SELECT * FROM tb_category_car WHERE id = '$id_category_car' ";
$rs = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($rs);

$price_check_car = $row['price_check_car'];
$price_atc = $row['price_atc'];
$price_car_tax = $row['price_car_tax'];

$price_tax_fine = calculate_price_tax_fine($car_exp_date, $price_car_tax);

$price_service = $row['price_service'];
$total_price = $price_check_car + $price_atc + $price_car_tax + $price_service + $price_tax_fine;

function calculate_price_tax_fine($car_exp_date, $price_car_tax) {
    $date1 = date("Y-m-d", strtotime($car_exp_date));
    $date2 = date("Y-m-d");

    $datetime1 = date_create($date1);
    $datetime2 = date_create($date2);

    $year = 0;
    $month = 0;
    $day = 0;

    $total_month = 0;

    if ($datetime1 < $datetime2) {
        $interval = date_diff($datetime1, $datetime2);

        $year = $interval->format('%y');
        $month = $interval->format('%m') + 1;
        $day = $interval->format('%d') - 1;

        $total_month = ($year * 12) + $month;
    }

    $result = ($total_month * ( ($price_car_tax * 1) / 100 ));
    return $result;
}
?>
<h1>พรบ. และ ทะเบียน ของลูกค้า</h1>

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header text-white bg-info">
                รายละเอียดลูกค้า
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered">
                    <tr>
                        <th class="w-25">เลขบัตรประจำตัวประชาชน</th>
                        <td> <?= $id_card_number ?> </td>
                    </tr>
                    <tr>
                        <th>ชื่อ</th>
                        <td> <?= $firstname ?> </td>
                    </tr>
                    <tr>
                        <th>นามสกุล</th>
                        <td> <?= $lastname ?> </td>
                    </tr>
                    <tr>
                        <th>เพศ</th>
                        <td> <?= $sex ?> </td>
                    </tr>
                    <tr>
                        <th>ที่อยู่</th>
                        <td> <?= $address ?> </td>
                    </tr>
                    <tr>
                        <th>เบอร์โทร</th>
                        <td> <?= $tel ?> </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header text-white bg-warning">
                รายละเอียดรถ
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered">
                    <tr>
                        <th class="w-25">วันจดทะเบียนรถ</th>
                        <td> <?= $car_reg_date ?> </td>
                    </tr>
                    <tr>
                        <th>วันหมดภาษี(ล่าสุด)</th>
                        <td> 
                            <?= $car_exp_date ?> 
                            <?php
                            $date1 = date("Y-m-d", strtotime($car_exp_date));
                            $date2 = date("Y-m-d");

                            $datetime1 = date_create($date1);
                            $datetime2 = date_create($date2);

                            $year = 0;
                            $month = 0;
                            $day = 0;

                            $total_month = 0;

                            if ($datetime1 < $datetime2) {
                                $interval = date_diff($datetime1, $datetime2);

                                $year = $interval->format('%y');
                                $month = $interval->format('%m') + 1;
                                $day = $interval->format('%d') - 1;

                                $total_month = ($year * 12) + $month;
                            }
                            ?>
                            <small class="text-danger">(ขาดมาแล้ว <?= $year ?> ปี <?= $month ?> เดือน <?= $day ?> วัน )</small>
                        </td>
                    </tr>
                    <tr>
                        <th>ประเภทรถ</th>
                        <td> <?= $name_category_car ?> </td>
                    </tr>
                    <tr>
                        <th>เลขทะเบียนรถ</th>
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
                        <th>เลขตัวถังรถ</th>
                        <td> <?= $car_chassis ?> </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header text-white bg-primary">
                รายละเอียดราคา
            </div>
            <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>ค่าตรวจสภาพรถ</td>
                            <td>ค่า พรบ.</td>
                            <td>ค่าภาษี</td>
                            <td>ค่าปรับภาษี</td>
                            <td>ค่าบริการต่อภาษี</td>
                            <td>รวมทั้งสิ้น</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> <?= number_format($price_check_car) ?> </td>
                            <td> <?= number_format($price_atc) ?> </td>
                            <td> <?= number_format($price_car_tax) ?> </td>
                            <td class="text-primary"> <?= number_format($price_tax_fine, 2) ?> </td>
                            <td> <?= number_format($price_service) ?> </td>
                            <td> <?= number_format($total_price) ?> </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="text-center">
            <form action="index.php?menu=atc-new-addDB" method="post">

                <input type="hidden" name="id_card_number" value="<?= $id_card_number ?>">
                <input type="hidden" name="firstname" value="<?= $firstname ?>">
                <input type="hidden" name="lastname" value="<?= $lastname ?>">
                <input type="hidden" name="sex" value="<?= $sex ?>">
                <input type="hidden" name="address" value="<?= $address ?>">
                <input type="hidden" name="tel" value="<?= $tel ?>">
                <input type="hidden" name="car_reg_date" value="<?= $car_reg_date ?>">
                <input type="hidden" name="car_reg_date" value="<?= $car_exp_date ?>">
                <input type="hidden" name="id_category_car" value="<?= $id_category_car ?>">
                <input type="hidden" name="car_char" value="<?= $car_char ?>">
                <input type="hidden" name="car_number" value="<?= $car_number ?>">

                <input type="hidden" name="car_province_id" value="<?= $car_province_id ?>">
                <input type="hidden" name="car_brand" value="<?= $car_brand ?>">
                <input type="hidden" name="car_model" value="<?= $car_model ?>">
                <input type="hidden" name="car_chassis" value="<?= $car_chassis ?>">
                <input type="hidden" name="price_tax_fine" value="<?=$price_tax_fine?>">


                <input type="button" value="ยกเลิก" class="btn btn-danger" onclick="history.back()">
                <button type="submit" class="btn btn-success">บันทึก</button>
            </form>
        </div>

    </div>
</div>