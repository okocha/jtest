<?php
$id = $_REQUEST['id'];


$sql = "SELECT
	tb_customer.*, 
    tb_category_car.*,
    tb_car.*,
    tb_order_service.*,
    tb_province.*,
    tb_order_service.id AS id_order_service
FROM
	tb_customer, tb_category_car, tb_car, tb_order_service, tb_province
WHERE
	tb_order_service.id_car = tb_car.id AND
    tb_car.id_category_car = tb_category_car.id AND
    tb_car.id_customer = tb_customer.id AND
    tb_car.car_province_id = tb_province.PROVINCE_ID AND
    tb_order_service.id = '$id'
GROUP BY(tb_order_service.id)
ORDER BY(tb_order_service.service_date) DESC";

$rs = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($rs);
?>


<h1>แก้ไข พรบ. และ ทะเบียน ลูกค้า</h1>
<form action="index.php?menu=atc-editForm-confirm" method="post">
    <input type="hidden" name="id_order_service" value="<?= $id ?>">
    <input type="hidden" name="id_car" value="<?= $row['id_car'] ?>">
    <input type="hidden" name="id_customer" value="<?= $row['id_customer'] ?>">


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-info">
                    รายละเอียดลูกค้า
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label>เลขบัตรประจำตัวประชาชน</label>
                        <input type="text" class="form-control form-control-sm" name="id_card_number" value="<?= $row['id_card_number'] ?>" required> 
                    </div>
                    <div class="form-group">
                        <label>ชื่อ</label>
                        <input type="text" class="form-control form-control-sm" name="firstname" value="<?= $row['firstname'] ?>"required> 
                    </div>
                    <div class="form-group">
                        <label>นามสกุล</label>
                        <input type="text" class="form-control form-control-sm" name="lastname" value="<?= $row['lastname'] ?>"required> 
                    </div>
                    <div class="form-group">
                        <label>เพศ</label>
                        <?php
                        $men_selected = "";
                        $women_selected = "";
                        if ($row['sex'] == "ชาย") {
                            $men_selected = "selected";
                        } else if ($row['sex'] == "หญิง") {
                            $women_selected = "selected";
                        }
                        ?>
                        <select name="sex" class="form-control form-control-sm" required>
                            <option value="ชาย" <?= $men_selected ?>>ชาย</option>
                            <option value="หญิง" <?= $women_selected ?>>หญิง</option>
                    </select> 
                    <div class="form-group">
                        <label>ที่อยู่</label>
                        <textarea name="address" class="form-control form-control-sm" required><?= $row['address'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control form-control-sm" name="tel" value="<?= $row['tel'] ?>"required> 
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
                        <input type="date" class="form-control form-control-sm" name="car_reg_date"value="<?= $row['car_reg_date'] ?>"required> 
                    </div>
                </div>
                <div class="form-group">
                    <label>ประเภทรถ</label>
                    <select name="id_category_car" class="form-control form-control-sm" required>
                        <option value="0">---เลือกประเภทรถ---</option>
                        <?php
                        $sql2 = "SELECT * FROM tb_category_car ORDER BY(category_car_name) ASC";
                        $rs2 = mysqli_query($conn, $sql2);

                        while ($row2 = mysqli_fetch_array($rs2)) {
                            if ($row['id_category_car'] == $row2['id']) {
                                ?>
                                <option value="<?= $row2['id'] ?>:<?= $row2['category_car_name'] ?>" selected> <?= $row2['category_car_name'] ?></option>    

                                <?php
                            } else {
                                ?>
                                <option value="<?= $row2['id'] ?>:<?= $row2['category_car_name'] ?>"> <?= $row2['category_car_name'] ?></option>    

                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>เลขทะเบียนรถ</label>
                    <div class="form-inline">
                        <input type="text" class="form-control form-control-sm" name="car_char" value="<?= $row['car_char'] ?>"placeholder="ตัวอักษร" required> -
                        <input type="text" class="form-control form-control-sm" name="car_number" value="<?= $row['car_number'] ?>"placeholder="เลขทะเบียน" required> -

                        <select name="car_province_id"class="form-control form-control-sm" required>
                            <option value="0">---เลือกจังหวัด---</option>
                            <?php
                            $sql3 = "SELECT * FROM tb_province";
                            $rs3 = mysqli_query($conn, $sql3);

                            while ($row3 = mysqli_fetch_array($rs3)) {
                                if ($row ['car_province_id'] == $row3['PROVINCE_ID']) {
                                    ?>
                                    <option value="<?= $row3['PROVINCE_ID'] ?>:<?= $row3['PROVINCE_NAME'] ?>" selected> <?= $row3['PROVINCE_NAME'] ?></option>    

                                    <?php
                                } else {
                                    ?>
                                    <option value="<?= $row3['PROVINCE_ID'] ?>:<?= $row3['PROVINCE_NAME'] ?>"> <?= $row3['PROVINCE_NAME'] ?></option>    

                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>ยี่ห้อรถ</label>
                    <input type="text" class="form-control form-control-sm" name="car_brand" value="<?= $row['car_brand'] ?>"required> 
                </div>
                <div class="form-group">
                    <label>รุ่นโมเดลรถ</label>
                    <input type="text" class="form-control form-control-sm" name="car_model" value="<?= $row['car_model'] ?>"required> 
                </div>
                <div class="form-group">
                    <label>เลขตัวถังรถ</label>
                    <input type="text" class="form-control form-control-sm" name="car_chassis" value="<?= $row['car_chassis'] ?>"required> 
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="text-center">
            <a href="index.php?menu=atc-show" class="btn btn-danger">ยกเลิก</a>
            <button type="submit" class="btn btn-success">บันทึก</button>
            
        </div>
    </div>
</div>
</form>