<?php require(__DIR__ . '/includes/header.php'); ?>

<div class="row">
    <div class="column">
    <ul>
        <?php foreach($repositories as $repository): ?>
        <li><?php echo $repository; ?></li>
        <?php endforeach; ?>
    </ul>
    </div>
</div>
<?php require(__DIR__ . '/includes/footer.php'); ?>