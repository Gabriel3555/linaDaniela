<?php

include_once "../modelo/usuarioModelo.php";

class UsuarioControlador {

    public $idusuario;
    public $documento;
    public $nombres;
    public $apellidos;
    public $email;
    public $foto;

    public function ctrListarUsuario() {
        $objRespuesta = UsuarioModelo::mdlListarUsuario();
        echo json_encode($objRespuesta);
    }

    public function ctrRegistrarUsuario() {
        $objRespuesta = UsuarioModelo::mdlRegistrarUsuario($this->documento, $this->nombres, $this->apellidos, $this->email, $this->foto);
        echo json_encode($objRespuesta);
    }

    public function ctrBorrarUsuario(){
        $objRespuesta = UsuarioModelo::mdlBorrarUsuario($this->idusuario);
        echo json_encode($objRespuesta);
    }

    public function ctrModificarUsuario(){
        $objRespuesta = UsuarioModelo::mdlModificarUsuario($this->idusuario,$this->documento, $this->nombres, $this->apellidos, $this->email, $this->foto);
        echo json_encode(($objRespuesta));
    }
    
}

if (isset($_POST["registrarUsuario"]) == "ok") {
    $objUsuario = new UsuarioControlador();
    $objUsuario->documento = $_POST["documento"];
    $objUsuario->nombres = $_POST["nombres"];
    $objUsuario->apellidos = $_POST["apellidos"];
    $objUsuario->email = $_POST["email"];
    $objUsuario->foto = $_FILES["foto"];

    $objUsuario->ctrRegistrarUsuario();
}

if (isset($_POST["listarUsuarios"]) == "ok") {
    $objUsuario = new UsuarioControlador();
    $objUsuario->ctrListarUsuario();
}

if(isset($_POST["borrarUsuarios"]) == "ok"){
    $objUsuario = new UsuarioControlador();
    $objUsuario->idusuario = $_POST["idusuario"];
    $objUsuario->ctrBorrarUsuario();
}

if(isset($_POST["modificarUsuarios"]) == "ok"){
    $objUsuario = new UsuarioControlador();

    $objUsuario->documento = $_POST["documento"];
    $objUsuario->nombres = $_POST["nombres"];
    $objUsuario->apellidos = $_POST["apellidos"];
    $objUsuario->email = $_POST["email"];
    $objUsuario->foto = $_FILES["foto"];
    $objUsuario->idusuario = $_POST["idusuario"];
    
    $objUsuario->ctrModificarUsuario();
}