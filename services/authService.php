<?php

function register(string $email, string $pass): bool
{
    try {
        $user = [
            'email' => $email,
            'pass' => md5($pass),
        ];

        $users = json_decode(file_get_contents(DB_USERS), true);
    
        $users[] = $user;
    
        file_put_contents(DB_USERS, json_encode($users));
    
        return true;
    } catch(Exception $ex) {
        return false;
    }
}

function login(string $email, string $pass): bool
{
    $users = json_decode(file_get_contents(DB_USERS), true);

    if (! in_array($email, array_column($users, 'email'))) {
        return false;
    }

    $user = $users[array_search($email, array_column($users, 'email'))];

    if ($user['pass'] !== md5($pass)) {
        return false;
    }

    $_SESSION['is_login'] = true;
    $_SESSION['user'] = $user;

    return true;    
}

function isLogin()
{
    return isset($_SESSION['is_login']) && $_SESSION['is_login'] == true;
}
