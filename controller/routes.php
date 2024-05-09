<?php

// get

Router::url('login', 'get', 'AuthController::login');
Router::url('register', 'get', 'AuthController::register');
Router::url('dashboard/logout', 'get', 'AuthController::logout');
Router::url('dashboard', 'get', 'DashController::index');

// post

Router::url('login', 'post', 'AuthController::SaveLogin');
Router::url('register', 'post', 'AuthController::newRegister');
Router::url('dashboard/tambahdata', 'post', 'ContactController::createContact');
Router::url('dashboard/editdata', 'post', 'ContactController::updateContact');
Router::url('dashboard/deletedata', 'post', 'ContactController::deleteContact');


Router::url('/', 'get', function () {
    header('Location: login');
});