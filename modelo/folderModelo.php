<?php

class FolderModelo {

    public static function mdlFolder($ruta){
        $rutaGeneral = ('archivos');
        $mensaje = array();
        $error = false;

        if(!file_exists("../".$rutaGeneral)){
            if(!mkdir("../".$rutaGeneral, 0777, true)){
                $error = true;
            }
        }
        
        if(!$error){
            if(!file_exists("../".$rutaGeneral."/".$ruta)){
                if(!mkdir("../".$rutaGeneral."/".$ruta, 0777, true)){
                    $error = true;
                }
            }

            if(!$error){
                $mensaje = array("codigo"=>"200","ruta"=>$rutaGeneral."/".$ruta."/");
            }else{
                $mensaje = array("codigo"=>"401","mensaje"=>"Error al crear el directorio del usuario".$rutaGeneral."/".$ruta);
            }
        }else{
            $mensaje = array("codigo"=>"401","mensaje"=>"Error al crear el directorio principal".$rutaGeneral);
        }
        return $mensaje;
    }

    public static function mdlModificarFolder($rutaAntigua, $rutaNueva){
        $rutaGeneral = ('archivos');
        $mensaje = array();

        $rutaAntiguaCompleta = "../" . $rutaGeneral . "/" . $rutaAntigua;
        $rutaNuevaCompleta = "../" . $rutaGeneral . "/" . $rutaNueva;

        if(file_exists($rutaAntiguaCompleta) && !file_exists($rutaNuevaCompleta)){
            if(rename($rutaAntiguaCompleta, $rutaNuevaCompleta)){
                $mensaje = array("codigo"=>"200","ruta"=>$rutaGeneral."/".$rutaNueva."/");
            }else{
                $mensaje = array("codigo"=>"401","mensaje"=>"Error al modificar el directorio del usuario");
            }
        }else{
            $mensaje = array("codigo"=>"401","mensaje"=>"El directorio antiguo no existe o el nuevo ya existe");
        }

        return $mensaje;
    }

    public static function mdlBorrarFolder($ruta){
        $rutaGeneral = ('archivos');
        $mensaje = array();

        $rutaCompleta = "../" . $rutaGeneral . "/" . $ruta;

        if(is_dir($rutaCompleta)){
            $archivos = glob($rutaCompleta . '/*');
            foreach($archivos as $archivo){
                if(is_file($archivo)){
                    unlink($archivo);
                }
            }

            if(rmdir($rutaCompleta)){
                $mensaje = array("codigo"=>"200","mensaje"=>"Carpeta borrada correctamente");
            }else{
                $mensaje = array("codigo"=>"401","mensaje"=>"Error al borrar la carpeta");
            }
        }else{
            $mensaje = array("codigo"=>"401","mensaje"=>"La carpeta no existe");
        }

        return $mensaje;
    }
}