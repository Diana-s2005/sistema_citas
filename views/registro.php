<link rel="stylesheet" href="../styles/estilos.css">

<div class="container">
<form method="POST" action="../controllers/authController.php">
    <h2>Registro</h2>

    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>

    <button name="registro">Registrarse</button>
</form>
</div>