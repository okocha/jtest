<h1>เพิ่มข่าวสารโปรโมชั่น</h1>
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                ข่าวสาร
            </div>
            <div class="card-body">
                <form action="index.php?menu=promotion-addDB" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <lable>หัวข้อ</lable>
                        <input type="text" class="form-control" name="title" placeholder="กรอกข้อมูล" required> 
                    </div>
                    <div class="form-group">
                        <lable>รูปภาพ</lable>
                        <img id="ex_img" src="#" alt="" height="300"/>
                        <input type="file" class="form-control" name="picture" onchange="readURL(this)" required> 
                    </div>
                    <div class="form-group">
                        <lable>รายละเอียด</lable>
                        <textarea name="detail" class="form-control form-control-sm" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">บันทึก</button>


                </form>
            </div>
        </div>



    </div>

</div>