<h1>ค้นหาทะเบียนรถ</h1>
<form action="index.php" method="get">
    <input type="hidden" name="menu" value="search-history-result">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-primary">
                    รายละเอียดรถ
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>เลขทะเบียนรถ</label>
                        <div class="form-inline">
                            <input type="text" class="form-control form-control-sm" name="car_char" placeholder="ตัวอักษร" required> -
                            <input type="text" class="form-control form-control-sm" name="car_number" placeholder="เลขทะเบียน" required> -

                            <select name="car_province_id"class="form-control form-control-sm" required>
                                <option value="">---เลือกจังหวัด---</option>
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
                        <label>เลขบัตรประจำตัวประชาชน</label>
                        <input type="text" class="form-control form-control-sm" name="id_card_number" required> 
                    </div>


                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="text-center">
                <button type="submit" class="btn btn-success">ค้นหา</button>
            </div>
        </div>
    </div>
</form>

