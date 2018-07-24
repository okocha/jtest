<?php
$price = 90;
?>

<h1>Test</h1>



<?php
if ($price > 100) {
    ?>
    <p class="text-danger"><?= number_format($price) ?></p>
    <?php
} else {
    ?>
    <p class="text-success"><?= number_format($price) ?></p>
    <?php
}
?>
