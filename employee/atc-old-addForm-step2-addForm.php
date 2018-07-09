<?php
$id_order_service = $_REQUEST['id_order_service'];
$id_car = $_REQUEST['id_car'];
$id_customer = $_REQUEST['id_customer'];

$id_card_number = $_REQUEST['id_card_number'];
$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];
$sex = $_REQUEST['sex'];
$address = $_REQUEST['address'];
$tel = $_REQUEST['tel'];

$car_reg_date = $_REQUEST['car_reg_date'];
$car_exp_date = $_REQUEST['car_exp_date'];

$id_category_car = explode(':', $_REQUEST['id_category_car'])[0];
$name_category_car = explode(':', $_REQUEST['id_category_car'])[1];
$car_char = $_REQUEST['car_char'];
$car_number = $_REQUEST['car_number'];

$car_province_id = explode(':', $_REQUEST['car_province_id'])[0];
$car_province_name = explode(':', $_REQUEST['car_province_id'])[1];
$car_brand = $_REQUEST['car_brand'];
$car_model = $_REQUEST['car_model'];
$car_cc = $_REQUEST['car_cc'];
$car_chassis = $_REQUEST['car_chassis'];

$sql = "SELECT * FROM tb_category_car WHERE id='$id_category_car'";
$rs = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($rs);

$price_check_car = $row['price_check_car'];
$price_atc = $row['price_atc'];
$price_car_tax = $row['price_car_tax'];
$price_service = $row['price_service'];
$total_price = $price_check_car + $price_atc + $price_car_tax + $price_service;
?>
<h1>พรบ. และ ทะเบียน ลูกค้า</h1>
<form action="index.php?menu=atc-old-addForm-step3-confirm" method="post">
    
    <input type="hidden" name="id_order_service" value="<?=$id_order_service?>">
    <input type="hidden" name="id_car" value="<?=$id_car?>">
    <input type="hidden" name="id_customer" value="<?=$id_customer?>">
    
    

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-info">
                    รายละเอียดลูกค้า
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label>เลขบัตรประจำตัวประชาชน</label>
                        <input type="text" class="form-control form-control-sm" name="id_card_number" value="<?= $id_card_number ?>" required> 
                    </div>
                    <div class="form-group">
                        <label>ชื่อ</label>
                        <input type="text" class="form-control form-control-sm" name="firstname" value="<?= $firstname ?>" required> 
                    </div>
                    <div class="form-group">
                        <label>นามสกุล</label>
                        <input type="text" class="form-control form-control-sm" name="lastname" value="<?= $lastname ?>" required> 
                    </div>
                    <div class="form-group">
                        <label>เพศ</label>
                        <select name="sex" class="form-control form-control-sm" required>
                            <?php
                            $men_selected = "";
                            $women_selected = "";

                            if ($sex == 'ชาย') {
                                $men_selected = "selected";
                            } else if ($sex == 'หญิง') {
                                $women_selected = "selected";
                            }
                            ?>


                            <option value="ชาย" <?= $men_selected ?> >ชาย</option>
                            <option value="หญิง" <?= $women_selected ?> >หญิง</option>
                        </select> 
                        <div class="form-group">
                            <label>ที่อยู่</label>
                            <textarea name="address" class="form-control form-control-sm" required><?= $address ?>"</textarea>
                        </div>
                        <div class="form-group">
                            <label>เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control form-control-sm" name="tel" value="<?= $tel ?>" required> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">

            <div class="card">
                <div class="card-header text-white bg-primary">
                    ค่าบริการต่อภาษี
                </div>
                <div class="card-body">
                    <div class="form-group">

                        <label>ต่อทะเบียนด่วน</label>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-sm" name="price_service_express" value="0" required> 
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-warning">
                    รายละเอียดรถ
                </div>
                <div class="card-body">
                    <div class="form-group">

                        <label>วันจดทะเบียน</label>
                        <div class="form-inline">
                            <input type="date" class="form-control form-control-sm" name="car_reg_date" value="<?= $car_reg_date ?>" required> 
                        </div>
                    </div>
                    <div class="form-group">

                        <label>วันหมดภาษี(ล่าสุด)</label>
                        <div class="form-inline">
                            <input type="date" class="form-control form-control-sm" name="car_exp_date" value="<?= $car_exp_date ?>" required> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label>ประเภทรถ</label>
                        <select name="id_category_car" class="form-control form-control-sm" required>
                            <option value="">---เลือกประเภทรถ---</option>
                            <?php
                            $sql = "SELECT * FROM tb_category_car ORDER BY(category_car_name) ASC";
                            $rs = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_array($rs)) {
                                if ($row['id'] == $id_category_car) {
                                    ?>
                                    <option value="<?= $row['id'] ?>:<?= $row['category_car_name'] ?>" selected> <?= $row['category_car_name'] ?></option>    
                                    <?php
                                } else {
                                    ?>
                                    <option value="<?= $row['id'] ?>:<?= $row['category_car_name'] ?>"> <?= $row['category_car_name'] ?></option>    
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>เลขทะเบียนรถ</label>
                        <div class="form-inline">
                            <input type="text" class="form-control form-control-sm" name="car_char" placeholder="ตัวอักษร" value="<?= $car_char ?>" required> -
                            <input type="text" class="form-control form-control-sm" name="car_number" placeholder="เลขทะเบียน" value="<?= $car_number ?>" required> -

                            <select name="car_province_id"class="form-control form-control-sm" required>
                                <option value="">---เลือกจังหวัด---</option>
                                <?php
                                $sql = "SELECT * FROM tb_province";
                                $rs = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($rs)) {
                                    if ($row['PROVINCE_ID'] == $car_province_id) {
                                        ?>
                                        <option value="<?= $row['PROVINCE_ID'] ?>:<?= $row['PROVINCE_NAME'] ?>" selected=""> <?= $row['PROVINCE_NAME'] ?></option>    

                                        <?php
                                    } else {
                                        ?>
                                        <option value="<?= $row['PROVINCE_ID'] ?>:<?= $row['PROVINCE_NAME'] ?>"> <?= $row['PROVINCE_NAME'] ?></option>    

                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>ยี่ห้อรถ</label>
                        <input type="text" class="form-control form-control-sm" name="car_brand" value="<?= $car_brand ?>" required> 
                    </div>
                    <div class="form-group">
                        <label>รุ่นโมเดลรถ</label>
                        <input type="text" class="form-control form-control-sm" name="car_model" value="<?= $car_model ?>" required> 
                    </div>
                    <div class="form-group">
                        <label>CC รถ</label>
                        <input type="number" class="form-control form-control-sm" name="car_cc" value="<?= $car_cc ?>" required> 
                    </div>
                    <div class="form-group">
                        <label>เลขตัวถังรถ</label>
                        <input type="text" class="form-control form-control-sm" name="car_chassis" value="<?= $car_chassis ?>" required> 
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="text-center">
                <a href="index.php?menu=atc-old-addForm-step1-search" class="btn btn-danger">ยกเลิก</a>
                <button type="submit" class="btn btn-success">ถัดไป</button>
            </div>
        </div>
    </div>
</form>

