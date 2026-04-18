<?php
session_start();
require_once("../models/cita.php");

// Redirigir si no hay sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: /sistema_citas/views/login.php");
    exit();
}

$citas = Cita::obtener($_SESSION['usuario']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="/sistema_citas/styles/estilos.css">
</head>
<body>

<div class="container">
    <h2>Mis Citas</h2>

    <!-- FORMULARIO CREAR CITA -->
    <form method="POST" action="/sistema_citas/controllers/citaController.php">
        <input type="date" name="fecha" required>
        <input type="time" name="hora" required>
        <button name="crear">Agregar</button>
    </form>

    <!-- TABLA -->
    <table border="1">
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Acciones</th>
        </tr>

        <?php if ($citas): ?>
            <?php foreach ($citas as $cita): ?>
            <tr>
                <td><?= htmlspecialchars($cita['fecha']) ?></td>
                <td><?= htmlspecialchars($cita['hora']) ?></td>
                <td>
                    <a href="/sistema_citas/controllers/citaController.php?eliminar=<?= $cita['id'] ?>">
                        Eliminar
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">No tienes citas registradas</td>
            </tr>
        <?php endif; ?>
    </table>

    <br>

    <!-- LOGOUT -->
    <a href="/sistema_citas/index.php">Cerrar sesión</a>
</div>

</body>
</html>