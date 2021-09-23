<?php

function registrationValidate() {
    $result = [
        'success' => true,
        'errors' => [],
    ];

    $email = $_POST['useremail'];
    $pass = $_POST['pass'];
    $confirm = $_POST['pass_confirm'];

    if (! $email || ! $pass || ! $confirm) {
        $result['errors'][] = 'All fields are required!';
    }

    $users = json_decode(file_get_contents(DB_USERS), true);
    if (in_array($email, array_column($users, 'email'))) {
        $result['errors'][] = 'This email already exists!';
    }

    if ($pass !== $confirm) {
        $result['errors'][] = 'Failed confirm password!';
    }

    if ($result['errors']) {
        $result['success'] = false;
    }

    return $result;
}

function loginValidate()
{
    $result = [
        'success' => true,
        'errors' => [],
    ];

    $email = $_POST['useremail'];
    $pass = $_POST['pass'];

    if (! $email || ! $pass) {
        $result['errors'][] = 'All fields are required!';
    }

    $users = json_decode(file_get_contents(DB_USERS), true);
    if (! in_array($email, array_column($users, 'email'))) {
        $result['errors'][] = 'You are not registered!';
    }

    if ($result['errors']) {
        $result['success'] = false;
    }

    return $result;
}