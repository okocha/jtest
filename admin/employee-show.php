<h1>รายละเอียดพนักงาน</h1>
<div class="row" style="background-color: ">
    <div class="col-md-12">
        <div class="text-right">
            <a href="index.php?menu=employee-addForm" class="btn btn-success">เพิ่ม</a>
        </div>
        
        <div class="card">
  <div class="card-header">
    รายละเอียดพนักงาน
  </div>
  <div class="card-body">
    
    <table id="dataTable" class="table-sm table-hover">
            <thead>
                
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>Email</th>
                    <th>Tel</th>
                    <th>
                        ACTION
                    </th>
                    
                </tr>
            </thead>
            
            <tbody>
                <?php
                $sql ="SELECT * FROM tb_employee ORDER BY (id) ASC";
                $rs = mysqli_query($conn, $sql);
                $index=1;
                while($row=mysqli_fetch_array($rs)){
                ?>
                <tr><td><?=$index?></td>
                    <td><?=$row['id']?></td>
                    <td><?=$row['username']?></td>
                    <td><?=$row['password']?></td>
                    
                    <td><?=$row['firstname']?></td>
                    <td><?=$row['lastname']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['tel']?></td>
                    <td>
                        <a href="index.php?menu=employee-editForm&id=<?=$row['id']?>" class="btn btn-sm btn-primary"><i class="fa fa-cog"></i></a>
                        <a href="index.php?menu=employee-delDB&id=<?=$row['id']?>" class="btn btn-sm btn-danger" onclick="return confirm('ต้องการที่จะลบข้อมูล')"><i class="fa fa-trash"></i></a>
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