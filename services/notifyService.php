<?php

function notify(string $message, string $type) {
    if ($message) {
        ?>
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="alert alert-<?=$type?>" role="alert">
                    <?=$message?>
                </div>
            </div>
        <?php
    }
}