<?php
session_start();
require_once("../models/usuario.php");

if (isset($_POST['registro'])) {
    Usuario::registrar($_POST['nombre'], $_POST['email'], $_POST['password']);
    header("Location: ../views/login.php");
}

if (isset($_POST['login'])) {
    $user = Usuario::login($_POST['email'], $_POST['password']);

    if ($user) {
        $_SESSION['usuario'] = $user['id'];
        header("Location: ../views/dashboard.php");
    } else {
        echo "Datos incorrectos";
    }
}
?>