<?php
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
    tb_car.car_province_id = tb_province.PROVINCE_ID
GROUP BY(tb_order_service.id)
ORDER BY(tb_order_service.service_date) DESC";

$rs = mysqli_query($conn, $sql);
?>
<h1>ค้นหาลูกค้าเก่า</h1>
<div class="row">

    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                ค้นหารายชื่อลูกค้า ที่เคยมาใช้บริการ

            </div>
            <div class="card-body">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>วันที่มาใช้บริการ(ล่าสุด)</th>
                            <th>ชื่อลูกค้า</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>ทะเบียน</th>
                            <th>ประเภทรถ</th>
                            <th>ACTION</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                        while ($row = mysqli_fetch_array($rs)) {
                            ?>
                            <tr>
                                <td><?= $index ?></td>
                                <td><?= $row['service_date'] ?></td>
                                <td><?= $row['firstname'] ?> <?= $row['lastname'] ?></td>
                                <td><?= $row['tel'] ?></td>
                                <td><?= $row['car_char'] ?>-<?= $row['car_number'] ?> <?= $row['PROVINCE_NAME'] ?></td>
                                <td><?= $row['category_car_name'] ?></td>
                                <td>

                                    <form action="index.php?menu=atc-old-addForm-step2-confirm&id=<?= $row['id_order_service'] ?>" method="POST">
                                        <input type="hidden" name="id_order_service" value="<?= $row['id_order_service'] ?>">
                                        <input type="hidden" name="id_car" value="<?= $row['id_car'] ?>">
                                        <input type="hidden" name="id_customer" value="<?= $row['id_customer'] ?>">

                                        <input type="hidden" name="id_card_number" value="<?= $row['id_card_number'] ?>">
                                        <input type="hidden" name="firstname" value="<?= $row['firstname'] ?>">
                                        <input type="hidden" name="lastname" value="<?= $row['lastname'] ?>">
                                        <input type="hidden" name="sex" value="<?= $row['sex'] ?>">
                                        <input type="hidden" name="address" value="<?= $row['address'] ?>">
                                        <input type="hidden" name="tel" value="<?= $row['tel'] ?>">
                                        <input type="hidden" name="car_reg_date" value="<?= $row['car_reg_date'] ?>">
                                        <input type="hidden" name="id_category_car" value="<?= $row['id_category_car'] ?>:<?= $row['category_car_name'] ?>">
                                        <input type="hidden" name="car_char" value="<?= $row['car_char'] ?>">
                                        <input type="hidden" name="car_number" value="<?= $row['car_number'] ?>">
                                        <input type="hidden" name="car_province_id" value=" <?= $row['car_province_id'] ?>:<?= $row['PROVINCE_NAME'] ?>">
                                        <input type="hidden" name="car_brand" value="<?= $row['car_brand'] ?>">
                                        <input type="hidden" name="car_model" value="<?= $row['car_model'] ?>">
                                        <input type="hidden" name="car_chassis" value="<?= $row['car_chassis'] ?>">

                                        <button type="submit" class="btn btn-info"> <i class="fa fa-user"></i> เลือก</button>
                                    </form>

                                </td>

                            </tr>
                            <?php
                            $index++;
                        }
                        ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div>
