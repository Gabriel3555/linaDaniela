class Area {
    constructor(objData) {
        this._objData = objData;
    }

    listarArea() {
        let objData = new FormData();
        objData.append("listarArea", "ok");

        fetch("controlador/areaControl.php", {
            method: "POST",
            body: objData
        })
            .then(response => response.json())
            .catch(error => {
                console.log(error);
            })
            .then(response => {
                if (response["codigo"] == "200") {
                    let dataSet = [];
                    response["listarAreas"].forEach(element => {
                        let objBotones = '<div class="btn-group" role="group">';
                        objBotones += '<button id="btnModificarArea" type="button" class="btn btn-info" idarea="' + element.idarea + '" nombre_area="' + element.nombre_area + '"><i class="bi bi-cloud-arrow-up"></i></button>';
                        objBotones += '<button id="btnBorrarArea" type="button" class="btn btn-danger" idarea="' + element.idarea + '"><i class="bi bi-person-x"></i></button>';
                        objBotones += '</div>';

                        dataSet.push([element.nombre_area, objBotones]);
                    });

                    $('#tablaAreas').DataTable({
                        data: dataSet,
                        responsive: true,
                        destroy: true
                    });
                }
            });
    }

    registrarArea() {
        let objData = new FormData();
        objData.append("registrarArea", "ok");
        objData.append("nombre_area", this._objData.nombre_area);

        fetch("controlador/areaControl.php", {
            method: "POST",
            body: objData
        })
            .then(response => response.json())
            .catch(error => {
                console.log(error);
            })
            .then(response => {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response["mensaje"],
                    showConfirmButton: false,
                    timer: 1500
                });
                this.listarArea();
            });
    }

    borrarArea() {
        let objData = new FormData();
        objData.append("borrarArea", "ok");
        objData.append("idarea", this._objData.idarea);

        fetch("controlador/areaControl.php", {
            method: "POST",
            body: objData
        })
            .then(response => response.json())
            .catch(error => {
                console.log(error);
            })
            .then(response => {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response["mensaje"],
                    showConfirmButton: false,
                    timer: 1500
                });
                this.listarArea();
            });
    }

    modificarArea() {
        let objData = new FormData();
        objData.append("modificarArea", "ok");
        objData.append("idarea", this._objData.idarea);
        objData.append("nombre_area", this._objData.nombre_area);

        fetch("controlador/areaControl.php", {
            method: "POST",
            body: objData
        })
            .then(response => response.json())
            .catch(error => {
                console.log(error);
            })
            .then(response => {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response["mensaje"],
                    showConfirmButton: false,
                    timer: 1500
                });
                this.listarArea();
            });
    }
}