<?php
session_start(); 
include 'Config.php'; 


$page = isset($_GET['page']) ? $_GET['page'] : 'login';

switch ($page) {
    case 'login':
        include 'loginn.php'; 
        break;
    case 'register':
        include 'registrasi.php'; 
        break;
    case 'landing':
        include 'landing_page.php'; 
        break;
    // case 'manage_users':
    //     include 'manage_users.php'; // Halaman manajemen data pengguna
    //     break;
    case 'logout':
        session_destroy();
        header("Location: index.php?page=login"); 
        exit;
    default:
        echo "Halaman tidak ditemukan!";
}
?>
