<h1>คำนวนค่าตรวจสภาพรถ พรบ. และ ทะเบียน</h1>
<form action="index.php?menu=calculate-atc-result" method="post">

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-info">
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
                            <option value="">---เลือกประเภทรถ---</option>
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
                        <label>CC รถ</label>
                        <input type="number" class="form-control form-control-sm" name="car_cc" value="0" required> 
                    </div>


                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="text-center">
                <button type="submit" class="btn btn-success">คำนวน</button>
            </div>
        </div>
    </div>
</form>

