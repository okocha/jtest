<?php
$sql = "
    SELECT * FROM tb_promotion ORDER BY(id) DESC
";
$rs = mysqli_query($conn, $sql);
?>
<h1>ข่าวสาร & โปรโมชั่น</h1>

<div class="row">

    <?php
    $index = 1;
    while ($row = mysqli_fetch_array($rs)) {
        ?>
        <div class="col-md-4">
            <div class="card" style="width: 18rem; margin-top: 10px">
                <img class="card-img-top" src="upload/<?= $row['picture'] ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['title'] ?></h5>
                    <!--<p class="card-text"><?= $row['detail'] ?></p>-->

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#show<?= $index ?>">
                        อ่านต่อ
                    </button>


                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="show<?= $index ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?= $row['title'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img class="card-img-top" src="upload/<?= $row['picture'] ?>" alt="Card image cap">
                        <?= $row['detail'] ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>
                </div>
            </div>
        </div>
        <?php
        $index++;
    }
    ?>

</div>