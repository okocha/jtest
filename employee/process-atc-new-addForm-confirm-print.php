<?php
include '../connect/connect.php';
error_reporting(0);
$id_card_number = $_POST['id_card_number'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$sex = $_POST['sex'];
$address = $_POST['address'];
$tel = $_POST['tel'];

$price_service_express = $_POST['price_service_express'];

$car_reg_date = $_POST['car_reg_date'];
$car_exp_date = $_POST['car_exp_date'];
// 2:รย.1 รถเก๋ง
// mrt:bts:kfc:mk
// mrt,bts,kfc,mk
$id_category_car = explode(':', $_POST['id_category_car'])[0];
$name_category_car = explode(':', $_POST['id_category_car'])[1];


$car_char = $_POST['car_char'];
$car_number = $_POST['car_number'];

$car_province_id = explode(':', $_POST['car_province_id'])[0];
$car_province_name = explode(':', $_POST['car_province_id'])[1];

$car_brand = $_POST['car_brand'];
$car_model = $_POST['car_model'];
$car_cc = $_POST['car_cc'];
$car_chassis = $_POST['car_chassis'];

$sql = "SELECT * FROM tb_category_car WHERE id = '$id_category_car' ";
$rs = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($rs);

if ($row['category_car_title'] == 'รย.12') {
    if (check_year($car_reg_date) <= 5) {
        $price_check_car = 0;
    } else {
        $price_check_car = $row['price_check_car'];
    }
} else {
    if (check_year($car_reg_date) <= 7) {
        $price_check_car = 0;
    } else {
        $price_check_car = $row['price_check_car'];
    }
}


$price_atc = $row['price_atc'];

if ($row['category_car_title'] == 'รย.1') {

//    if() {
//        
//    }
    //ถ้าเป็น price_car_tax ==0 แสดงว่าเป็นรถ รย.1

    $price_car_tax = calculate_cc_price_car_tax($car_cc, $car_reg_date);
} else {
    $price_car_tax = $row['price_car_tax'];
}

$price_car_tax_owe = calculate_price_car_tax_owe($car_exp_date, $price_car_tax);





$price_tax_fine = calculate_price_tax_fine($car_exp_date, $price_car_tax);
$price_service = $row['price_service'];

$total_price = $price_check_car + $price_atc + $price_car_tax + $price_service + $price_tax_fine + $price_car_tax_owe + $price_service_express;

function calculate_price_car_tax_owe($car_exp_date, $price_car_tax) {
    $result = 0;

    $total_year = check_year($car_exp_date);

    $next_exp_date = date("Y") . '-' . date("m-d", strtotime($car_exp_date));
    $date1 = date("Y-m-d", strtotime($next_exp_date));
    $date2 = date("Y-m-d");

    $datetime0 = date_create(date("Y-m-d", strtotime($car_exp_date)));

    $datetime1 = date_create($date1);
    $datetime2 = date_create($date2);

    if ($datetime0->format('Y') < $datetime2->format('Y')) {

        $interval = date_diff($datetime1, $datetime2);

        $year = $interval->format('%y');
        $month = $interval->format('$m');
        $day = $interval->format('$d');
        if ($month <= 2 || ($month == 3 && $day == 0)) {
            if ($datetime1 > $datetime2) {
                $total_year++;
            }
            $result = $price_car_tax * $total_year;
        } else {
            $result = $price_car_tax * $total_year;
        }
    }
    return $result;
}

function check_year($car_reg_date) {
    $date1 = date("Y-m-d", strtotime($car_reg_date));
    $date2 = date("Y-m-d");

    $datetime1 = date_create($date1);
    $datetime2 = date_create($date2);

    $year = 0;

    if ($datetime1 < $datetime2) {
        $interval = date_diff($datetime1, $datetime2);

        $year = $interval->format('%y');
    }
    return $year;
}

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
        $month = $interval->format('%m');
        $day = $interval->format('%d');

        if ($day == 0) {
            $total_month = ($year * 12) + $month;
        } else if ($day >= 1) {
            $total_month = ($year * 12) + ($month + 1);
        }
    }

    $result = ($total_month * ( ($price_car_tax * 1) / 100 ));
    return $result;
}

function calculate_cc_price_car_tax($car_cc, $car_reg_date) {


    $year = check_year($car_reg_date);
    $cc = $car_cc;

    $year5;
    $year6;
    $year7;
    $year8;
    $year9;
    $year10;

    if ($cc <= 600) {
        $year5 = $cc * 0.5;
        $year6 = $year5 - (($year5 * 10) / 100);
        $year7 = $year5 - (($year5 * 20) / 100);
        $year8 = $year5 - (($year5 * 30) / 100);
        $year9 = $year5 - (($year5 * 40) / 100);
        $year10 = $year5 - (($year5 * 50) / 100);
    } else if ($cc >= 601 && $cc <= 1800) {
        $year5 = (($cc - 601) * 1.5) + (600 * 0.5);
        $year6 = $year5 - (($year5 * 10) / 100);
        $year7 = $year5 - (($year5 * 20) / 100);
        $year8 = $year5 - (($year5 * 30) / 100);
        $year9 = $year5 - (($year5 * 40) / 100);
        $year10 = $year5 - (($year5 * 50) / 100);
    } else if ($cc >= 1801) {
        $year5 = (600 * 0.5) + ((1800 - 601) * 1.5) + (($cc - 1801) * 4);
        $year6 = $year5 - (($year5 * 10) / 100);
        $year7 = $year5 - (($year5 * 20) / 100);
        $year8 = $year5 - (($year5 * 30) / 100);
        $year9 = $year5 - (($year5 * 40) / 100);
        $year10 = $year5 - (($year5 * 50) / 100);
    }

    if ($year <= 5) {
        return $year5;
    } else if ($year == 6) {
        return $year6;
    } else if ($year == 7) {
        return $year7;
    } else if ($year == 8) {
        return $year8;
    } else if ($year == 9) {
        return $year9;
    } else if ($year >= 10) {
        return $year10;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> &nbsp; </title>

        <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/sticky-footer-navbar.css">

        <link rel="stylesheet" href="../assets/datatable/jquery.dataTables.min.css">
        
        
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">

    </head>
    <body>
        <div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <h4>ใบรับฝากต่อทะเบียนรถ
                สถานตรวจสภาพรถท่าอุเทนบริการ
            </h4>
            
        </div>
        <div class="card">
            <div class="card-header">
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
            <div class="card-header">
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
                                $month = $interval->format('%m');
                                $day = $interval->format('%d');

                                if ($day == 0) {
                                    $total_month = ($year * 12) + $month;
                                } else if ($day >= 1) {
                                    $total_month = ($year * 12) + ($month + 1);
                                }
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
                        <th>cc รถ</th>
                        <td> <?= $car_cc ?> </td>
                    </tr>
                    <tr>
                        <th>เลขตัวถังรถ</th>
                        <td> <?= $car_chassis ?> </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                รายละเอียดราคา
            </div>
            <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>ค่าตรวจสภาพรถ<small class="text-danger"> ( ปีที่ <?= check_year($car_reg_date) ?> )</small></td>
                            <td>ค่า พรบ.</td>
                            <td>ค่าภาษี</td>
                            <td>ค่าภาษีย้อนหลัง</td>
                            <td>ค่าปรับภาษี</td>
                            <td>ค่าบริการต่อภาษี</td>
                            <td>ค่าบริการต่อภาษีด่วน</td>
                            <td>รวมทั้งสิ้น</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> <?= number_format($price_check_car) ?> </td>
                            <td> <?= number_format($price_atc) ?> </td>
                            <td> <?= number_format($price_car_tax) ?> </td>
                            <td> <?= number_format($price_car_tax_owe) ?> </td>

                            <td>
                                    <?= number_format($price_tax_fine, 2) ?> 
                            </td>
                            <td> <?= number_format($price_service) ?> </td>
                            <td> <?= number_format($price_service_express) ?> </td>
                            <td> <?= number_format($total_price) ?> </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>


<script type="text/javascript">
      window.onload = function() { window.print(); }
</script>
</body>
</html>