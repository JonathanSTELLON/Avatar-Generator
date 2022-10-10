<svg class="avatar" viewBox="0 0 <?= $size;?> <?= $size;?>" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
    <?php foreach ($grid as $index1 => $values): ?>
        <?php foreach ($values as $index2 => $value): ?>
            <rect x="<?= $index2 ?>" y="<?= $index1 ?>" width="1" height="1" fill="<?= $value ?>"/>
        <?php endforeach; ?>
    <?php endforeach; ?>
</svg>

