<?php

// get

route('login', 'get', 'AuthController::login');
route('register', 'get', 'AuthController::register');
route('dashboard/logout', 'get', 'AuthController::logout');
route('dashboard', 'get', 'DashController::index');

// post

route('login', 'post', 'AuthController::SaveLogin');
route('register', 'post', 'AuthController::newRegister');
route('dashboard/tambahdata', 'post', 'ContactController::createdata');
route('dashboard/editdata', 'post', 'ContactController::updatedata');
route('dashboard/deletedata', 'post', 'ContactController::deletedata');


route('/', 'get', function () {
    echo ('Halo, test 1 2 3');
});