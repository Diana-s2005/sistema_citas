<?php
session_start();
require_once("../models/cita.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: ../views/login.php");
}

$usuario_id = $_SESSION['usuario'];

if (isset($_POST['crear'])) {
    Cita::crear($_POST['fecha'], $_POST['hora'], $usuario_id);
    header("Location: ../views/dashboard.php");
}

if (isset($_GET['eliminar'])) {
    Cita::eliminar($_GET['eliminar'], $usuario_id);
    header("Location: ../views/dashboard.php");
}
?>