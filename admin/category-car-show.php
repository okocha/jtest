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
    
    <table id="dataTable" class="table-sm table-hover">
            <thead>
                
                <tr>
                    <th>#</th>
                    <th>ID</th>
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
                $sql ="SELECT * FROM tb_category_car ORDER BY (category_car_name) ASC";
                $rs = mysqli_query($conn, $sql);
                $index=1;
                while($row=mysqli_fetch_array($rs)){
                ?>
                <tr><td><?=$index?></td>
                    <td><?=$row['id']?></td>
                    <td><?=$row['category_car_name']?></td>
                    <td><?=$row['price_check_car']?></td>
                    
                    <td><?=$row['price_service']?></td>
                    <td><?=$row['price_car_tax']?></td>
                    <td><?=$row['price_atc']?></td>
                    <td>
                        <a href="index.php?menu=category-car-editForm&id=<?=$row['id']?>" class="btn btn-sm btn-primary"><i class="fa fa-cog"></i></a>
                        <a href="index.php?menu=category-car-delDB&id=<?=$row['id']?>" class="btn btn-sm btn-danger" onclick="return confirm('ต้องการที่จะลบข้อมูล')"><i class="fa fa-trash"></i></a>
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