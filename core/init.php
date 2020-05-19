<?php 
session_start();


$GLOBALS['config'] = array (
    'mysql' => array(
        'host' => 'loginsystemphp.herokuapp.com',
        'username' => 'root',
        'password' => '',
        'db' => 'LoginSystem'
    ),
    'remember' => array (
        'cookie_name' => 'hash',
        'cookie_expiry' => 2629746
    ),
    'session' => array (
        'session_name' => 'user',
        'token_name' => 'token'
    ),
);


spl_autoload_register('classAutoloader');

function classAutoloader($class){
    $path = 'classes/';
    $extension = '.php';
    $fullpath = $path . $class . $extension;

    if (!file_exists($fullpath)) {
        return false;
    }

    require_once $fullpath;
}

require_once 'functions/sanitize.php';

if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

    if ($hashCheck->count()) {
        $user = new User($hashCheck->first()->user_id);
        $user->login();
    }
}

