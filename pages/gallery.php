<h1 class="display-6">Gallery</h1>

<?php

$images = array_diff(scandir(STORAGE), ['.', '..']);

foreach ($images as $image):
    ?>
        <a href="<?='storage/' . $image?>" target="_blank">
            <img class="img-thumbnail photo" src="<?='storage/' . $image?>" alt="<?=$image?>">
        </a>
    <?php
endforeach;