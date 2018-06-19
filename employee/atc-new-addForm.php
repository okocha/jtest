<h1>พรบ. และ ทะเบียน ลูกค้า</h1>
<form action="index.php?menu=atc-new-addForm-confirm" method="post">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-info">
                    รายละเอียดลูกค้า
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label>เลขบัตรประจำตัวประชาชน</label>
                        <input type="text" class="form-control form-control-sm" name="id_card_number" required> 
                    </div>
                    <div class="form-group">
                        <label>ชื่อ</label>
                        <input type="text" class="form-control form-control-sm" name="firstname" required> 
                    </div>
                    <div class="form-group">
                        <label>นามสกุล</label>
                        <input type="text" class="form-control form-control-sm" name="lastname" required> 
                    </div>
                    <div class="form-group">
                        <label>เพศ</label>
                        <select name="sex" class="form-control form-control-sm" required>
                            <option value="ชาย">ชาย</option>
                            <option value="หญิง">หญิง</option>
                        </select> 
                        <div class="form-group">
                            <label>ที่อยู่</label>
                            <textarea name="address" class="form-control form-control-sm" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control form-control-sm" name="tel" required> 
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
                            <input type="date" class="form-control form-control-sm" name="car_reg_date" required> 
                        </div>
                    </div>
                    <div class="form-group">

                        <label>วันหมดภาษี(ล่าสุด)</label>
                        <div class="form-inline">
                            <input type="date" class="form-control form-control-sm" name="car_exp_date" required> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label>ประเภทรถ</label>
                        <select name="id_category_car" class="form-control form-control-sm" required>
                            <option value="0">---เลือกประเภทรถ---</option>
                            <?php
                            $sql = "SELECT * FROM tb_category_car ORDER BY(category_car_name) ASC";
                            $rs = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_array($rs)) {
                                ?>
                                <option value="<?= $row['id'] ?>:<?= $row['category_car_name'] ?>"> <?= $row['category_car_name'] ?></option>    

                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>เลขทะเบียนรถ</label>
                        <div class="form-inline">
                            <input type="text" class="form-control form-control-sm" name="car_char" placeholder="ตัวอักษร" required> -
                            <input type="text" class="form-control form-control-sm" name="car_number" placeholder="เลขทะเบียน" required> -

                            <select name="car_province_id"class="form-control form-control-sm" required>
                                <option value="0">---เลือกจังหวัด---</option>
                                <?php
                                $sql = "SELECT * FROM tb_province";
                                $rs = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($rs)) {
                                    ?>
                                    <option value="<?= $row['PROVINCE_ID'] ?>:<?= $row['PROVINCE_NAME'] ?>"> <?= $row['PROVINCE_NAME'] ?></option>    

                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>ยี่ห้อรถ</label>
                        <input type="text" class="form-control form-control-sm" name="car_brand" required> 
                    </div>
                    <div class="form-group">
                        <label>รุ่นโมเดลรถ</label>
                        <input type="text" class="form-control form-control-sm" name="car_model" required> 
                    </div>
                    <div class="form-group">
                        <label>CC รถ</label>
                        <input type="number" class="form-control form-control-sm" name="car_cc" value="0" required> 
                    </div>
                    <div class="form-group">
                        <label>เลขตัวถังรถ</label>
                        <input type="text" class="form-control form-control-sm" name="car_chassis" required> 
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="text-center">
                <a href="index.php?menu=atc-show" class="btn btn-danger">ยกเลิก</a>
                <button type="submit" class="btn btn-success">ถัดไป</button>
            </div>
        </div>
    </div>
</form>

