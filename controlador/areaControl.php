<?php

include_once "../modelo/areaModelo.php";

class AreaControlador {
    public $idarea;
    public $nombre_area;

    public function ctrListarArea() {
        $objRespuesta = AreaModelo::mdlListarArea();
        echo json_encode($objRespuesta);
    }

    public function ctrRegistrarArea() {
        $objRespuesta = AreaModelo::mdlRegistrarArea($this->nombre_area);
        echo json_encode($objRespuesta);
    }

    public function ctrBorrarArea() {
        $objRespuesta = AreaModelo::mdlBorrarArea($this->idarea);
        echo json_encode($objRespuesta);
    }

    public function ctrModificarArea() {
        $objRespuesta = AreaModelo::mdlModificarArea($this->idarea, $this->nombre_area);
        echo json_encode($objRespuesta);
    }
}

if (isset($_POST["listarArea"]) == "ok") {
    $objArea = new AreaControlador();
    $objArea->ctrListarArea();
}

if (isset($_POST["registrarArea"]) == "ok") {
    $objArea = new AreaControlador();
    $objArea->nombre_area = $_POST["nombre_area"];
    $objArea->ctrRegistrarArea();
}

if (isset($_POST["borrarArea"]) == "ok") {
    $objArea = new AreaControlador();
    $objArea->idarea = $_POST["idarea"];
    $objArea->ctrBorrarArea();
}

if (isset($_POST["modificarArea"]) == "ok") {
    $objArea = new AreaControlador();
    $objArea->idarea = $_POST["idarea"];
    $objArea->nombre_area = $_POST["nombre_area"];
    $objArea->ctrModificarArea();
}