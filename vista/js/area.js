(function() {
    listarTablaAreas();

    function listarTablaAreas() {
        let objData = {"listarArea": "ok"};
        let objArea = new Area(objData);
        objArea.listarArea();
    }

    $("#formArea").on("submit", function(event) {
        event.preventDefault();
        let nombre_area = $("#txt_nombre_area").val();
        let objData = {"registrarArea": "ok", "nombre_area": nombre_area};
        let objArea = new Area(objData);
        objArea.registrarArea();
    });

    $("#tablaAreas").on("click", "#btnBorrarArea", function() {
        Swal.fire({
            title: "¿Está seguro?",
            text: "Esta acción no se puede revertir",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar"
        }).then((result) => {
            if (result.isConfirmed) {
                let idarea = $(this).attr("idarea");
                let objData = {"borrarArea": "ok", "idarea": idarea};
                let objArea = new Area(objData);
                objArea.borrarArea();
            }
        });
    });

    $("#tablaAreas").on("click", "#btnModificarArea", function() {
        $("#contenedorModificar").show();
        $("#contenedorTablaRegistrar").hide();

        let idarea = $(this).attr("idarea");
        let nombre_area = $(this).attr("nombre_area");

        $("#txt_modificar_nombre_area").val(nombre_area);
        $("#btnModificarArea").attr("idarea", idarea);
    });

    $("#btn-Volver").on("click", function() {
        $("#contenedorModificar").hide()
        $("#contenedorTablaRegistrar").show();
        $("#tablaAreas").show();
    })

    $("#formModificarArea").on("submit", function(event) {
        event.preventDefault();
        let idarea = $("#btnModificarArea").attr("idarea");
        let nombre_area = $("#txt_modificar_nombre_area").val();
        let objData = {"modificarArea": "ok", "idarea": idarea, "nombre_area": nombre_area};
        let objArea = new Area(objData);
        objArea.modificarArea();
    });
})();