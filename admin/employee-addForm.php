<h1>เพิ่มพนักงาน</h1>
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                รายละเอียดพนักงาน
            </div>
            <div class="card-body">
                <form action="index.php?menu=employee-addDB" method="post">
                    <div class="form-group">
                        <lable>Username</lable>
                        <input type="text" class="form-control" name="username" placeholder="กรอกข้อมูล" required> 
                    </div>
                    <div class="form-group">
                        <lable>Password</lable>
                        <input type="text" class="form-control" name="password" required> 
                    </div>
                    <div class="form-group">
                        <lable>ชื่อ</lable>
                        <input type="text" class="form-control" name="firstname" required> 
                    </div>
                    <div class="form-group">
                        <lable>นามสกุล</lable>
                        <input type="text" class="form-control" name="lastname" required> 
                    </div>
                    <div class="form-group">
                        <lable>Email</lable>
                        <input type="email" class="form-control" name="email" required> 
                    </div>
                    <div class="form-group">
                        <lable>เบอร์โทรศัพท์</lable>
                        <input type="text" class="form-control" name="tel" required> 
                    </div>
                    <button type="submit" class="btn btn-success">บันทึก</button>


                </form>
            </div>
        </div>



    </div>

</div>