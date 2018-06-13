<?php
$id = $_GET['id'];

$sql = "SELECT * FROM tb_category_car WHERE id = '$id'";
$rs = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($rs);
?>

<h1>แก้ไขประเภทรถ</h1>
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                แก้ไขประเภทรถ
            </div>
            <div class="card-body">
                <form action="index.php?menu=category-car-editDB" method="post">
                    <div class="form-group">
                        <lable>ID</lable>
                        <input type="text" class="form-control" name="id" value="<?=$row['id'] ?>" readonly> 
                    </div>
                    <div class="form-group">
                        <lable>ชื่อประเภทรภ</lable>
                        <input type="text" class="form-control" name="category_car_name" value="<?=$row['category_car_name'] ?>" placeholder="กรอกข้อมูล" required> 
                    </div>
                    <div class="form-group">
                        <lable>ค่าตรวจสภาพรถ</lable>
                        <input type="text" class="form-control" name="price_check_car" value="<?=$row['price_check_car'] ?>" required> 
                    </div>
                    <div class="form-group">
                        <lable>ค่าบริการต่อภาษี</lable>
                        <input type="text" class="form-control" name="price_service" value="<?=$row['price_service'] ?>" required> 
                    </div>
                    <div class="form-group">
                        <lable>ค่าภาษีรถ</lable>
                        <input type="text" class="form-control" name="price_car_tax" value="<?=$row['price_car_tax'] ?>" required> 
                    </div>
                    <div class="form-group">
                        <lable>ค่าเบี้ย พรบ.</lable>
                        <input type="text" class="form-control" name="price_atc" value="<?=$row['price_atc'] ?>" required> 
                    </div>
                    <button type="submit" class="btn btn-primary">บันทึก</button>


                </form>
            </div>
        </div>



    </div>

</div>
