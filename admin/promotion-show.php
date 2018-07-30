<h1>จัดการข่าวสารโปรโมชั่น</h1>
<div class="row" style="background-color: ">
    <div class="col-md-12">
        <div class="text-right">
            <a href="index.php?menu=promotion-addForm" class="btn btn-success">เพิ่ม</a>
        </div>
        
        <div class="card">
  <div class="card-header">
    จัดการข่าวสารโปรโมชั่น
  </div>
  <div class="card-body">
    
    <table id="dataTable" class="table-sm table-hover">
            <thead>
                
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>หัวข้อ</th>
                    <th>รูปภาพ</th>
                    <th>รายละเอียด</th>
                    <th>วันเวลา</th>
                    <th>
                        ACTION
                    </th>
                    
                </tr>
            </thead>
            
            <tbody>
                <?php
                $sql ="SELECT * FROM tb_promotion ORDER BY (id) DESC";
                $rs = mysqli_query($conn, $sql);
                $index=1;
                while($row=mysqli_fetch_array($rs)){
                ?>
                <tr><td><?=$index?></td>
                    <td><?=$row['id']?></td>
                    <td><?=$row['title']?></td>
                    <td><img src="../upload/<?=$row['picture']?>" height="50"></td>
                    
                    <td><?=$row['detail']?></td>
                    <td><?=$row['time_reg']?></td>
                    <td>
                        <a href="index.php?menu=promotion-editForm&id=<?=$row['id']?>" class="btn btn-sm btn-primary"><i class="fa fa-cog"></i></a>
                        <a href="index.php?menu=promotion-delDB&id=<?=$row['id']?>" class="btn btn-sm btn-danger" onclick="return confirm('ต้องการที่จะลบข้อมูล')"><i class="fa fa-trash"></i></a>
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