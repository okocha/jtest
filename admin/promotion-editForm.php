<?php
$id = $_GET['id'];

$sql = "SELECT * FROM tb_promotion WHERE id = '$id'";
$rs = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($rs);
?>
<h1>เพิ่มข่าวสารโปรโมชั่น</h1
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                ข่าวสาร
            </div>
            <div class="card-body">
                <form action="index.php?menu=promotion-editDB" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <lable>ID</lable>
                        <input type="text" class="form-control" name="id" value="<?=$row['id'] ?>" readonly> 
                    </div>
                    <div class="form-group">
                        <lable>หัวข้อ</lable>
                        <input type="text" class="form-control" name="title" value="<?=$row['title']?>" placeholder="กรอกข้อมูล" required> 
                    </div>
                    <div class="form-group">
                        <lable>รูปภาพ</lable>
                        <img id="ex_img" src="../upload/<?=$row['picture']?>" alt="" height="300"/>
                        <input type="file" class="form-control" name="picture" onchange="readURL(this)"> 
                    </div>
                    <div class="form-group">
                        <lable>รายละเอียด</lable>
                        <textarea name="detail" class="form-control form-control-sm" required><?=$row['detail']?></textarea>
                    </div>
                    <div class="text-center">
                        <input type="button" value="ยกเลิก" class="btn btn-danger" onclick="history.back()">
                        <button type="submit" class="btn btn-success">บันทึก</button>
                    </div>

                </form>
            </div>
        </div>



    </div>

</div>