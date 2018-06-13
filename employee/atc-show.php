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
<h1>พรบ. และ ทะเบียน ลูกค้า</h1>
<div class="row">

    <div class="col-md-12">

        <div class="text-right">
            <a href="index.php?menu=atc-new-addForm" class="btn btn-success"> <i class="fa fa-plus"></i> เพิ่ม(ลูกค้าใหม่)</a>
            <a href="index.php?menu=atc-old-addForm-step1-search" class="btn btn-primary"> <i class="fa fa-plus"></i> เพิ่ม(ลูกค้าเก่า)</a>

        </div>
        <div class="card">
            <div class="card-header">
                จัดการ พรบ. และ ทะเบียน

            </div>
            <div class="card-body">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>วันที่มาใช้บริการ</th>
                            <th>ชื่อลูกค้า</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>ทะเบียน</th>
                            <th>เลขตัวถัง</th>
                            <th>ประเภทรถ</th>
                            <th>ค่า พรบ.</th>
                            <th>ภาษีรถ</th>
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
                                <td><?= $row['firstname'] ?><?= $row['lastname'] ?></td>
                                <td><?= $row['tel'] ?></td>
                                <td><?= $row['car_char'] ?>-<?= $row['car_number'] ?> <?= $row['PROVINCE_NAME'] ?></td>
                                <td><?= $row['car_chassis'] ?></td>
                                <td><?= $row['category_car_name'] ?></td>
                                <td><?= number_format($row['price_atc']) ?></td>
                                <td><?= number_format($row['price_car_tax']) ?></td>
                                <td>
                                    <a href="index.php?menu=atc-editForm&id=<?=$row['id_order_service']?>" class="btn btn-primary"> <i class="fa fa-cog"></i></a>
                                    <a href="index.php?menu=atc-delDB&id=<?=$row['id_order_service']?>" class="btn btn-danger" onclick="return confirm('ยืนยันการลบ')"> <i class="fa fa-trash"></i></a>

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

    <h1 class="text-danger"> เดียวจะกลับมาทำ work_status</h1>