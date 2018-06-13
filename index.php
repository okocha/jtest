<?php
session_start();
error_reporting(0);

include 'check-session.php';
include 'connect/connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ตรอ.</title>

    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/sticky-footer-navbar.css">
    <link rel="stylesheet" href="../assets/datatable/jquery.dataTables.min.css">
    
</head>
<body>
    <!-- Top Menu -->
    <header>
        <?php include 'menu.php';?>
    </header>

    <div class="container">
        <?php
        if (isset($_REQUEST['menu'])) {
            include $_REQUEST['menu'] . '.php';
        } else {
        ?>
        <script type="text/javascript">
            window.location = 'index.php?menu=home';
        </script>
        <?php
        }
        ?>
    </div>


    <!-- Footer -->
    <footer class="footer">
        <div class="container text-right">
            <span class="text-muted">My Website &copy; 2018</span>
        </div>
    </footer>




<!-- assets -->
<script src="assets/jquery/jquery.js"></script>
<script src="assets/bootstrap/dist/js/bootstrap.js"></script>
<script src="../assets/datatable/jquery.dataTables.min.js"></script>


<script type="text/javascript">
            
            $(document).ready(function() {
                $('#dateTable').DataTable();
                $('#dataTable1').DataTable();
                $('#dataTable2').DataTable();
                $('#dataTable3').DataTable();
<!-- my custom -->

<!-- code active menu by me-->
<script type="text/javascript">
$(document).ready(function () {
    var path = window.location.href.split("/").pop();

    path = path.split("&");

    var target = $('ul li a[href="' + path[0] + '"]');

    //target.addClass('active');
    target.parent().addClass('active');
});
</script>

</body>
</html>