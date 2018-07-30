<?php
$sql = "
SELECT 
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
    tb_order_service.work_status = 'ปิดการขาย'
GROUP BY(tb_order_service.id)
ORDER BY(tb_order_service.id) DESC
";

$rs = mysqli_query($conn, $sql);
?>

<h1>รายการปิดการขาย พรบ. และ ทะเบียน ของลูกค้าทั้งหมด</h1>

<div class="row">
    <div class="col-md-12">

        

        <div class="card">
            <div class="card-header">
                รายการ พรบ. และ ทะเบียน ของลูกค้า
            </div>
            <div class="card-body">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>วันที่มาใช้บริการ</th>
                            <th>ข้อมูลลูกค้า</th>
                            <th>ข้อมูลรถ</th>
                            <th>ค่าใช้จ่ายทั้งหมด</th>
                            <th>รวมทั้งสิ้น</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                        while($row = mysqli_fetch_array($rs)){
                            $total_price = $row['price_check_car'] + $row['price_atc'] + $row['price_car_tax_order'] + 
                                $row['price_car_tax_owe'] + $row['price_tax_fine'] + $row['price_service'] + $row['price_service_express'];
                        ?>
                        <tr>
                            <td> <?=$index?> </td>
                            <td> <?=$row['service_date']?> </td>
                            <td>
                                <strong>ชื่อ: </strong> <?=$row['firstname']?> <?=$row['lastname']?> <br>
                                <strong>โทร: </strong> <?=$row['tel']?> <br>
                            </td>
                            <td>
                                <strong>ทะเบียน: </strong> <?=$row['car_char']?> - <?=$row['car_number']?> <?=$row['PROVINCE_NAME']?> <br>
                                <strong>เลขตัวถัง: </strong> <?=$row['car_chassis']?> <br>
                                <strong>ประเภทรถ: </strong> <?=$row['category_car_name']?> <br>
                            </td>
                            <td>
                                <strong>ค่าตรวจสภาพรถ: </strong> <?=number_format($row['price_check_car'])?> <br>
                                <strong>ค่า พรบ.: </strong> <?=number_format($row['price_atc'])?> <br>
                                <strong>ค่าภาษี: </strong> <?=number_format($row['price_car_tax_order'])?> <br>
                                <strong>ค่าภาษีย้อนหลัง: </strong> <?=number_format($row['price_car_tax_owe'])?> <br>
                                <strong>ค่าปรับภาษี: </strong> <?=number_format($row['price_tax_fine'])?> <br>
                                <strong>ค่าบริการต่อภาษี: </strong> <?=number_format($row['price_service'])?> <br>
                                <strong>ค่าบริการต่อภาษีด่วน: </strong> <?=number_format($row['price_service_express'])?>
                            </td>
                            <td>
                                <?php
//                                if($total_price <=999 ){
                                   ?>
                              <?=number_format($total_price)?> 
                                <?php
//                                }else{
                                ?> 
<!--                                <p class="text-success"><?=number_format($total_price)?> </p>-->
                                <?php
//                                }
                                ?>
                                
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
</div>