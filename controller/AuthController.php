<?php
include_once 'models/user.php';
include_once 'function/main.php';
include_once 'config/static.php';

class AuthController {
    static function login() {
        view('auth/auth_layout', ['url' => 'login']);
    }

    static function register() {
        view('auth/auth_layout', ['url' => 'register']);
    }

    static function SaveLogin() {
        $post = array_map('htmlspecialchars', $_POST);

        $user = User::login([
            'username' => $post['username'], 
            'password' => $post['password']
        ]);
        if ($user) {
            unset($user['password']);
            $_SESSION['user'] = $user;
            header('Location: '.BASEURL.'dashboard');
        }
        else {
            header('Location: '.BASEURL.'login?failed=true');
        }
    }

    static function newRegister() {
        $post = array_map('htmlspecialchars', $_POST);

        $user = User::register([
            'nama' => $post['nama'], 
            'umur' => $post['umur'],
            'username' => $post['username'], 
            'password' => $post['password'],
        ]);

        if ($user) {
            header('Location: '.BASEURL.'login');
        }
        else {
            header('Location: '.BASEURL.'register?failed=true');
        }
    }

    static function logout() {
        $_SESSION = array();
        session_destroy();
        header('Location: '.BASEURL. 'login');
    }
}