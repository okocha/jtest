<?php
$id = $_GET['id'];

$sql = "SELECT * FROM tb_employee WHERE id = '$id'";
$rs = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($rs);
?>
<h1>แก้ไขข้อมูลพนักงาน</h1>
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                รายละเอียดพนักงาน
            </div>
            <div class="card-body">
                <form action="index.php?menu=employee-editDB" method="post">
                    <div class="form-group">
                        <lable>ID</lable>
                        <input type="text" class="form-control" name="id" value="<?=$row['id'] ?>" readonly> 
                    </div>
                    <div class="form-group">
                        <lable>Username</lable>
                        <input type="text" class="form-control" name="username" value="<?=$row['username']?>" placeholder="กรอกข้อมูล" required> 
                    </div>
                    <div class="form-group">
                        <lable>Password</lable>
                        <input type="text" class="form-control" name="password" value="<?=$row['password']?>" required> 
                    </div>
                    <div class="form-group">
                        <lable>ชื่อ</lable>
                        <input type="text" class="form-control" name="firstname" value="<?=$row['firstname']?>" required> 
                    </div>
                    <div class="form-group">
                        <lable>นามสกุล</lable>
                        <input type="text" class="form-control" name="lastname" value="<?=$row['lastname']?>" required> 
                    </div>
                    <div class="form-group">
                        <lable>Email</lable>
                        <input type="email" class="form-control" name="email" value="<?=$row['email']?>" required> 
                    </div>
                    <div class="form-group">
                        <lable>เบอร์โทรศัพท์</lable>
                        <input type="text" class="form-control" name="tel" value="<?=$row['tel']?>" required> 
                    </div>
                    <button type="submit" class="btn btn-success">บันทึก</button>


                </form>
            </div>
        </div>



    </div>

</div>