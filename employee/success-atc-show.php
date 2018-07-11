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
    tb_car.car_province_id = tb_province.PROVINCE_ID AND
    tb_order_service.work_status='เรียบร้อย'
GROUP BY(tb_order_service.id)
ORDER BY(tb_order_service.id) DESC";

$rs = mysqli_query($conn, $sql);
?>
<h1>เสร็จสิ้นการต่อพรบ. และ ทะเบียน</h1>
<div class="row">

    <div class="col-md-12">

        
        <div class="card">
            <div class="card-header text-white bg-success">
                จัดการ พรบ. และ ทะเบียน

            </div>
            <div class="card-body">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>วันที่มาใช้บริการ</th>
                            <th>ข้อมูลลูกค้า</th>
                            <th>ข้อมูลรถ</th>
                            <th>ค่า พรบ.</th>
                            <th>ภาษีรถ</th>
                            <th>ค่าปรับภาษี</th>
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
                                <td>
                                    <strong>ชื่อ : </strong> <?= $row['firstname'] ?> <?= $row['lastname'] ?><br>
                                    <strong>โทร: </strong> <?= $row['tel'] ?> <br>
                                </td>
                                
                                <td>
                                    <strong>ทะเบียนรถ : </strong> <?= $row['car_char'] ?>-<?= $row['car_number'] ?> <?= $row['PROVINCE_NAME'] ?><br>
                                    <strong>เลขตัวถัง  : </strong> <?= $row['car_chassis'] ?> <br>
                                    <strong>ประเภทรถ : </strong> <?= $row['category_car_name'] ?> <br>
                                </td>
                                <td><?= number_format($row['price_atc']) ?></td>
                                <td><?= number_format($row['price_car_tax_order']) ?></td>
                                <td><?= number_format($row['price_tax_fine']) ?></td>
                                <td>
                                    <a href="index.php?menu=success-atc-work-status-update&id=<?=$row['id_order_service']?>" class="btn btn-success">
                                        <i class="fa fa-check"></i> รับแล้ว
                                    </a>
                                    

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
