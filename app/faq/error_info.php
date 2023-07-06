<?php 
if (count($errMessage) > 0 ):  ?>
    <?php foreach ($errMessage as $error): ?>
        <Li><?= $error; ?></Li>
    <?php endforeach; ?>
<?php endif; ?>