<?php

include_once "conexion.php";

class AreaModelo {

    public static function mdlListarArea() {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM area");
            $objRespuesta->execute();
            $listarAreas = $objRespuesta->fetchAll();
            $objRespuesta = null;

            $mensaje = array("codigo" => "200", "listarAreas" => $listarAreas);
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlRegistrarArea($nombre_area) {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("INSERT INTO area(nombre_area) VALUES (:nombre_area)");
            $objRespuesta->bindParam(":nombre_area", $nombre_area);

            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "Área registrada correctamente");
            } else {
                $mensaje = array("codigo" => "401", "mensaje" => "Error al registrar el área");
            }
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlBorrarArea($idarea) {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("DELETE FROM area WHERE idarea = :idarea");
            $objRespuesta->bindParam(":idarea", $idarea);

            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "Área eliminada correctamente");
            } else {
                $mensaje = array("codigo" => "401", "mensaje" => "Error al eliminar el área");
            }
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlModificarArea($idarea, $nombre_area) {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("UPDATE area SET nombre_area = :nombre_area WHERE idarea = :idarea");
            $objRespuesta->bindParam(":nombre_area", $nombre_area);
            $objRespuesta->bindParam(":idarea", $idarea);

            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "Área modificada correctamente");
            } else {
                $mensaje = array("codigo" => "401", "mensaje" => "Error al modificar el área");
            }
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }
}