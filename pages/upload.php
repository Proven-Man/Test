<h1 class="display-6">Image upload</h1>

<?php
    if (! isset($_POST['frm_upload'])) {
?>

<div class="col-sm-12 col-md-8 col-lg-4">
    <form action="index.php?page=upload" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
        
        <div class="mb-3">
            <label for="image_file" class="form-label">Choose your file:</label>
            <input name="user_image" type="file" class="form-control" id="image_file" accept="image/*">
        </div>

        <input name="frm_upload" type="hidden">

        <button type="submit" class="btn btn-primary">Load</button>

    </form>
</div>

<?php
    } else {
        require_once(ROOT . '/services/notifyService.php');

        if ($_FILES['user_image']['error'] > 0) {
            notify("Upload error: {$_FILES['user_image']['error']}", 'danger');
        } else {
            if (is_uploaded_file($_FILES['user_image']['tmp_name'])) {
                move_uploaded_file(
                    $_FILES['user_image']['tmp_name'],
                    STORAGE . $_FILES['user_image']['name']
                );

                notify('Your file was uploaded!', 'success');
            }
        }
    }

