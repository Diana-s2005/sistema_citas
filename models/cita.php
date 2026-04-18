<?php
require_once("../config/conexion.php");

class Cita {

    public static function crear($fecha, $hora, $usuario_id) {
        global $conexion;
        $sql = "INSERT INTO citas (fecha, hora, usuario_id) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        return $stmt->execute([$fecha, $hora, $usuario_id]);
    }

    public static function obtener($usuario_id) {
        global $conexion;
        $sql = "SELECT * FROM citas WHERE usuario_id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll();
    }

    public static function eliminar($id, $usuario_id) {
        global $conexion;
        $sql = "DELETE FROM citas WHERE id = ? AND usuario_id = ?";
        $stmt = $conexion->prepare($sql);
        return $stmt->execute([$id, $usuario_id]);
    }
}
?>