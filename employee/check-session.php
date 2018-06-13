<?php
if(!isset($_SESSION['LOGIN_EMPLOYEE'])){
  ?>
  <script type="text/javascript">
     window.location = "login.php";
  </script>
  <?php
}
?>