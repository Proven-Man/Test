<h1 class="display-6">Registration</h1>

<?php
    if (! isset($_POST['frm_registration'])) {
?>

<div class="col-sm-12 col-md-8 col-lg-4">
    <form action="index.php?page=registration" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input name="useremail" type="email" class="form-control" id="email">
            <div class="form-text">Your email</div>
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input name="pass" type="password" class="form-control" id="pass">
        </div>
        <div class="mb-3">
            <label for="pass_confirm" class="form-label">Confirm password</label>
            <input name="pass_confirm" type="password" class="form-control" id="pass_confirm">
        </div>

        <input name="frm_registration" type="hidden">

        <button type="submit" class="btn btn-primary">Registration</button>

    </form>
</div>

<?php
    } else {
        require_once(ROOT . '/services/validationService.php');
        require_once(ROOT . '/services/notifyService.php');
        require_once(ROOT . '/services/authService.php');

        $validationResult = registrationValidate();

        if (! $validationResult['success']) {
            foreach ($validationResult['errors'] as $error) {
                notify($error, 'danger');
            }
        } else {
            if (! register($_POST['useremail'], $_POST['pass'])) {
                notify('Registration failed', 'warning');
            } else {
                notify('All OK', 'success');
            }
        }
    }

