<?php

if ($_FILES['picture']['tmp_name'] != "") {
    
    $id = $_POST['id'];
    $file_name = $_FILES['picture']['name'];
    $temp_name = $_FILES['picture']['tmp_name'];

    $file_name = uniqid() . $file_name;

    $title = $_POST['title'];
    $picture = $_POST['picture'];
    $detail = $_POST['detail'];

    $sql = "UPDATE tb_promotion SET title ='$title',
        picture='$file_name',
        detail='$detail'
        WHERE id = '$id'";


    $rs = mysqli_query($conn, $sql);

    if ($rs) {
        move_uploaded_file($temp_name, '../upload/' . $file_name);
        ?>
        <script type="text/javascript">
            alert('Edit Succuss!!!');

            window.location = 'index.php?menu=promotion-show';
        </script>

        <?php

    } else {
        ?>
        <script type="text/javascript">
            alert('Edit Fails!!!');

            history.back();
        </script>

        <?php

    }
} else {
    $id = $_POST['id'];

    $title = $_POST['title'];
    $detail = $_POST['detail'];

    $sql = "UPDATE tb_promotion SET title ='$title',
        detail='$detail'
        WHERE id = '$id'";


    $rs = mysqli_query($conn, $sql);

    if ($rs) {
        ?>
        <script type="text/javascript">
            alert('Edit Succuss!!!');

            window.location = 'index.php?menu=promotion-show';
        </script>

        <?php

    } else {
        ?>
        <script type="text/javascript">
            alert('Edit Fails!!!');

            history.back();
        </script>

        <?php

    }
}
?>