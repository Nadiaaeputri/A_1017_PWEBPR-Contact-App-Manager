<?php $title = 'Welcome'; ?>

<?php 
    ob_start();
    include 'asset/style.css';
    $style = ob_get_clean(); 
?>

<?php include_once '...'; ?>

<?php
    if (isset($_GET['auth'])) {
        echo "<script>alert('Silahkan login terlebih dahulu');</script>";
    }
    if (isset($_GET['failed'])) {
        echo "<script>alert('".ucfirst($url)." gagal');</script>";
    }
    if (isset($url)) {
        include_once $url.'.php';
    }
?>

<?php include '...'; ?>