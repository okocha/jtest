<h1>ประเภทรถ</h1>
<div class="row" style="background-color: ">
    <div class="col-md-12">
        <div class="text-right">
            <a href="index.php?menu=category-car-addForm" class="btn btn-success">เพิ่ม</a>
        </div>
        
        <div class="card">
  <div class="card-header">
    จัดการประเภทรถ
  </div>
  <div class="card-body">
    
    <table id="dataTable" class="table table-hover">
            <thead>
                
                <tr>
                    <th>#</th>
                    <th>ประเภทรถ</th>
                    <th>ค่าตรวจสภาพรภ</th>
                    <th>ค่าบริการ</th>
                    <th>ค่าภาษีรถ</th>
                    <th>ค่าเบี้ย พรบ.</th>
                    <th>
                        ACTION
                    </th>
                    
                </tr>
            </thead>
            
            <tbody>
                <?php
                $sql ="SELECT * FROM tb_category_car";
                $rs = mysqli_query($conn, $sql);
                
                while($row=mysqli_fetch_array($rs)){
                ?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['category_car_name']?></td>
                    <td><?=$row['price_check_car']?></td>
                    
                    <td><?=$row['price_service']?></td>
                    <td><?=$row['price_car_tax']?></td>
                    <td><?=$row['price_atc']?></td>
                    <td>
                        <a href="index.php?menu=category-car-editForm&id=<?=$row['id']?>" class="btn btn-primary">Edit</a>
                        <a href="index.php?menu=category-car-delDB&id=<?=$row['id']?>" class="btn btn-danger" onclick="return confirm('ต้องการที่จะลบข้อมูล')">Del</a>
                    </td>
                    
                </tr>
                <?php
                }
                ?>
            </tbody>
            
            
        </table>
  </div>
</div>
        
        
        
    </div>
</div>