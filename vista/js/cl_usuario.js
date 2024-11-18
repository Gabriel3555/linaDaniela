class Usuario {

    constructor(objData) {
        this.objDataUsuario = objData;
    }

    listarUsuarios() {
        $("#tablaUsuarios").dataTable();

        let objData = new FormData();
        objData.append("listarUsuarios", this.objDataUsuario.listarUsuarios);

        fetch("controlador/usuarioControl.php", {
            method: "POST",
            body: objData
        })
            .then(response => response.json())
            .catch(error => {
                console.log(error);
            })
            .then(response => {
                console.log(response);

                if (response["codigo"] == "200") {
                    let dataSet = [];

                    
                
                    response["listarUsuarios"].forEach(item => {
                        let objBotones = '<div class="btn-group" role="group">';
                        objBotones += '<button id="btnModificarUsuario" type="button" class="btn btn-info" idusuario="' + item.idusuario + '" documento="' + item.documento + '" nombre="' + item.nombre + '" apellido="' + item.apellido + '" email="' + item.email + '" foto="' + item.urlFoto + '"><i class="bi bi-cloud-arrow-up"></i></button>';
                        objBotones += '<button id="btnBorrarUsuario" type="button" class="btn btn-danger" idusuario="' + item.idusuario + '"><i class="bi bi-person-x"></i></button>';
                        objBotones += '</div>';

                        dataSet.push(['<div class="foto"><img src="'+item.urlFoto+'" style="height: 60px; width: 80px;"></div>', item.documento, item.nombre + " " + item.apellido, item.email, objBotones]);

                    });

                    $('#tablaUsuarios').DataTable({
                        buttons: [{
                            extend: "colvis",
                            text: "Columnas"
                        },
                            "excel",
                            "pdf",
                            "print"
                        ],
                        dom: "Bfrtip",
                        responsive: true,
                        destroy: true,
                        data: dataSet
                    });
                } else {
                    console.log("Error en la respuesta o no hay usuarios");
                }
            });
    }


    registrarUsuario() {
        let objData = new FormData();
        objData.append("registrarUsuario", this.objDataUsuario.registrarUsuario);
        objData.append("documento", this.objDataUsuario.documento);
        objData.append("nombres", this.objDataUsuario.nombre);
        objData.append("apellidos", this.objDataUsuario.apellido);
        objData.append("email", this.objDataUsuario.email);
        objData.append("foto", this.objDataUsuario.foto);

        fetch("controlador/usuarioControl.php", {
            method: "POST",
            body: objData
        })
            .then(response => response.json())
            .catch(error => {
                console.console.log(error);
            })
            .then(response =>{
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Agregado Correctamente",
                    showConfirmButton: false,
                    timer: 1500
                  });

                  this.listarUsuarios();
            })
    }

    

    modificarUsuarios() {
        let objData = new FormData();
        objData.append("modificarUsuarios",this.objDataUsuario.modificarUsuarios);
        objData.append("idusuario", this.objDataUsuario.idusuario);
        objData.append("documento", this.objDataUsuario.documento);
        objData.append("nombres", this.objDataUsuario.nombre);
        objData.append("apellidos", this.objDataUsuario.apellido);
        objData.append("email", this.objDataUsuario.email);
        objData.append("foto", this.objDataUsuario.foto);

        fetch("controlador/usuarioControl.php",{
            method : "POST",
            body : objData
        })

        .then(response => response.json()).catch(error=>{
            console.log(error)
        })

        .then(response =>{
            $("#contenedorModificar").hide()
            $("#contenedorTablaRegistrar").show();
            this.listarUsuarios();
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Modificado Correctamente",
                showConfirmButton: false,
                timer: 1500
              });

             
        })
    }

    borrarUsuarios() {
        let objData = new FormData();
        objData.append("borrarUsuarios",this.objDataUsuario.borrarUsuarios);
        objData.append("idusuario", this.objDataUsuario.idusuario);


        fetch('controlador/usuarioControl.php',{
            method : "POST",
            body: objData
        })


        .then(response=> response.json()).catch(error=>{
            console.log(error);
        })
        .then(response=>{
            if(response["codigo"] == "200"){
                this.listarUsuarios();
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response["mensaje"],
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        })
    }
}


