(function () {
    listarTablaUsuarios();

    function listarTablaUsuarios() {

        let objData = { "listarUsuarios": "ok" };
        let objDataUsuario = new Usuario(objData);
        objDataUsuario.listarUsuarios();
    }


    let btnVolverTabla = document.getElementById("btn-Volver")
    btnVolverTabla.addEventListener("click", () => {
        $("#contenedorModificar").hide()
        $("#contenedorTablaRegistrar").show()
    })


    $("#tablaUsuarios").on("click", "#btnBorrarUsuario", function () {
        Swal.fire({
            title: "Esta usted seguro?",
            text: "Si confirma esta opción no podra recuperar el registro!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Aceptar"
        }).then((result) => {
            if (result.isConfirmed) {
                let objIdUsuario = $(this).attr("idusuario")
                let objData = { "borrarUsuarios": "ok", "idusuario": objIdUsuario }
                let objUsuario = new Usuario(objData);
                objUsuario.borrarUsuarios();
            }
        })
    })



    $("#tablaUsuarios").on("click", "#btnModificarUsuario", function () {
        $("#contenedorTablaRegistrar").hide()
        $("#contenedorModificar").show();


        let documento = $(this).attr("documento");
        let nombre = $(this).attr("nombre");
        let apellido = $(this).attr("apellido");
        let email = $(this).attr("email");
        let foto = $(this).attr("foto");
        let idusuario = $(this).attr("idusuario");


        $("#txt_modificar_Documento").val(documento);
        $("#txt_modificar_Nombres").val(nombre)
        $("#txt_modificar_Apellidos").val(apellido)
        $("#txt_modificar_Email").val(email)
        $("#txt_modificar_foto").val(foto)
        $("#btnModificarUsuario").attr("idusuario", idusuario)
    })



    'use strict';


    var formUsuario = document.querySelectorAll("#fomUsuario");

    Array.prototype.slice.call(formUsuario)
        .forEach(function (form) {
            form.addEventListener("submit", function (event) {
                event.preventDefault();

                if (!form.checkValidity()) {
                    event.stopPropagation();
                    form.classList.add('was-validated');
                } else {

                    let documento = document.getElementById("txt_Documento").value;
                    let nombres = document.getElementById("txt_Nombres").value;
                    let apellidos = document.getElementById("txt_Apellidos").value;
                    let email = document.getElementById("txt_Email").value;
                    let foto = document.getElementById("txt_foto").files[0];

                    let objData = {
                        "registrarUsuario": "ok", "documento": documento, "nombre": nombres,
                        "apellido": apellidos, "email": email, "foto": foto
                    }

                    let objDataUsuario = new Usuario(objData);
                    objDataUsuario.registrarUsuario();
                }
            })
        });



    var FormModificarUsuario = document.querySelectorAll("#formUsuarioModificar")

    Array.from(FormModificarUsuario).forEach(form => {
        form.addEventListener("submit", event => {
            event.preventDefault();
            if (!form.checkValidity()) {
                event.stopPropagation()
                form.classList.add('was-validated')
            } else {


                let documento = document.getElementById("txt_modificar_Documento").value;
                let nombres = document.getElementById("txt_modificar_Nombres").value;
                let apellidos = document.getElementById("txt_modificar_Apellidos").value;
                let email = document.getElementById("txt_modificar_Email").value;
                let foto = document.getElementById("txt_modificar_foto").files[0];
                let idusuario = $("#btnModificarUsuario").attr("idusuario")

                let objData = { "modificarUsuarios": "ok", "idusuario": idusuario, "documento": documento, "nombre": nombres, "apellido": apellidos, "email": email, "foto": foto }

                let objUsuario = new Usuario(objData);
                objUsuario.modificarUsuarios();
            }

        }, false)
    })


})();