<h1>เพิ่มประเภทรภ</h1>
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                เพิ่มประเภทรถ
            </div>
            <div class="card-body">
                <form action="index.php?menu=category-car-addDB" method="post">
                    <div class="form-group">
                        <lable>ชื่อประเภทรภ</lable>
                        <input type="text" class="form-control" name="category_car_name" placeholder="กรอกข้อมูล" required> 
                    </div>
                    <div class="form-group">
                        <lable>ค่าตรวจสภาพรถ</lable>
                        <input type="text" class="form-control" name="price_check_car" required> 
                    </div>
                    <div class="form-group">
                        <lable>ค่าบริการต่อภาษี</lable>
                        <input type="text" class="form-control" name="price_service" required> 
                    </div>
                    <div class="form-group">
                        <lable>ค่าภาษีรถ</lable>
                        <input type="text" class="form-control" name="price_car_tax" required> 
                    </div>
                    <div class="form-group">
                        <lable>ค่าเบี้ย พรบ.</lable>
                        <input type="text" class="form-control" name="price_atc" required> 
                    </div>
                    <button type="submit" class="btn btn-success">บันทึก</button>


                </form>
            </div>
        </div>



    </div>

</div>