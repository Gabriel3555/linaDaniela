<?php

include_once "conexion.php";
include_once "folderModelo.php";

class UsuarioModelo {

    public static function mdlListarUsuario() {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM usuario");
            $objRespuesta->execute();
            $listarUsuarios = $objRespuesta->fetchAll();
            $objRespuesta = null;
            
            $mensaje = array("codigo" => "200", "listarUsuarios" => $listarUsuarios);

        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlRegistrarUsuario($documento, $nombres, $apellidos, $email, $foto) {
        $mensaje = FolderModelo::mdlFolder($documento);
        if ($mensaje["codigo"] == "200") {
            $ruta = $mensaje["ruta"];
            $arrayArchivo = explode('.', $foto["name"]);
            $nombreArchivo = uniqid('img-') . '.' . end($arrayArchivo);
            $rutaFinal = $ruta . $nombreArchivo;

            if (move_uploaded_file($foto['tmp_name'], '../' . $rutaFinal)) {
                try {
                    $objRespuesta = Conexion::conectar()->prepare("INSERT INTO usuario(nombre,apellido,documento,email,urlFoto) 
                    VALUES (:nombre,:apellido,:documento,:email,:urlFoto)");

                    $objRespuesta->bindParam(":nombre", $nombres);
                    $objRespuesta->bindParam(":apellido", $apellidos);
                    $objRespuesta->bindParam(":documento", $documento);
                    $objRespuesta->bindParam(":email", $email);
                    $objRespuesta->bindParam(":urlFoto", $rutaFinal);

                    if ($objRespuesta->execute()) {
                        $mensaje = array("codigo" => "200", "mensaje" => "Usuario registrado correctamente");
                    } else {
                        $mensaje = array("codigo" => "401", "mensaje" => "No se pudo registrar el usuario");
                    }
                } catch (Exception $e) {
                    $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
                }
            }
        }
        return $mensaje;
    }

    public static function mdlBorrarUsuario($idusuario){
        $mensaje = array();
    
        try {
            $objConsulta = Conexion::conectar()->prepare("SELECT documento, urlFoto FROM usuario WHERE idusuario = :idusuario");
            $objConsulta->bindParam(":idusuario", $idusuario);
            $objConsulta->execute();
            $usuario = $objConsulta->fetch(PDO::FETCH_ASSOC);
    
            if ($usuario) {
                $mensajeBorrarFolder = FolderModelo::mdlBorrarFolder($usuario['documento']);
                if ($mensajeBorrarFolder["codigo"] == "200") {
                    $objRespuesta = Conexion::conectar()->prepare("DELETE FROM usuario WHERE idusuario = :idusuario");
                    $objRespuesta->bindParam(":idusuario", $idusuario);
    
                    if($objRespuesta->execute()){
                        if (!empty($usuario['urlFoto']) && file_exists('../' . $usuario['urlFoto'])) {
                            unlink('../' . $usuario['urlFoto']);
                        }
                        $mensaje = array("codigo" => "200", "mensaje" => "Usuario y carpeta borrados correctamente");
                    } else {
                        $mensaje = array("codigo" => "401", "mensaje" => "Error al borrar el Usuario");
                    }
                } else {
                    $mensaje = $mensajeBorrarFolder;
                }
            } else {
                $mensaje = array("codigo" => "401", "mensaje" => "Usuario no encontrado");
            }
    
            $objRespuesta = null;
            $objConsulta = null;
    
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlModificarUsuario($idusuario, $documento, $nombres, $apellidos, $email, $foto) {
        $mensaje = array();
    
        try {
            $objConsulta = Conexion::conectar()->prepare("SELECT documento, urlFoto FROM usuario WHERE idusuario = :idusuario");
            $objConsulta->bindParam(":idusuario", $idusuario);
            $objConsulta->execute();
            $usuarioActual = $objConsulta->fetch(PDO::FETCH_ASSOC);
    
            if ($usuarioActual['documento'] != $documento) {
                $mensajeModificarFolder = FolderModelo::mdlModificarFolder($usuarioActual['documento'], $documento);
                if ($mensajeModificarFolder["codigo"] != "200") {
                    return $mensajeModificarFolder;
                }
            }
    
            $mensaje = FolderModelo::mdlFolder($documento);
            if ($mensaje["codigo"] == "200") {
                $ruta = $mensaje["ruta"];
                
                if ($foto['size'] > 0) {
                    $arrayArchivo = explode('.', $foto["name"]);
                    $nombreArchivo = uniqid('img-') . '.' . end($arrayArchivo);
                    $rutaFinal = $ruta . $nombreArchivo;
    
                    if (move_uploaded_file($foto['tmp_name'], '../' . $rutaFinal)) {
                        // Borrar la foto anterior si existe
                        if (!empty($usuarioActual['urlFoto']) && file_exists('../' . $usuarioActual['urlFoto'])) {
                            unlink('../' . $usuarioActual['urlFoto']);
                        }
                    } else {
                        throw new Exception("Error al subir la nueva foto");
                    }
                } else {
                    $rutaFinal = $usuarioActual['urlFoto'];
                }
    
                $objRespuesta = Conexion::conectar()->prepare("UPDATE usuario SET nombre=:nombre, apellido=:apellido, documento=:documento, email=:email, urlFoto=:urlFoto WHERE idusuario=:idusuario");
                $objRespuesta->bindParam(":nombre", $nombres);
                $objRespuesta->bindParam(":apellido", $apellidos);
                $objRespuesta->bindParam(":documento", $documento);
                $objRespuesta->bindParam(":email", $email);
                $objRespuesta->bindParam(":urlFoto", $rutaFinal);
                $objRespuesta->bindParam(":idusuario", $idusuario);
    
                if ($objRespuesta->execute()) {
                    $mensaje = array("codigo" => "200", "mensaje" => "Se modificó correctamente");
                } else {
                    $mensaje = array("codigo" => "401", "mensaje" => "Error al modificar");
                }
            }
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }
}