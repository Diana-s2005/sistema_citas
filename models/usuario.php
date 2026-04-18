<?php
require_once("../config/conexion.php");

class Usuario {

    public static function registrar($nombre, $email, $password) {
        global $conexion;
        $passHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        return $stmt->execute([$nombre, $email, $passHash]);
    }

    public static function login($email, $password) {
        global $conexion;

        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
?>