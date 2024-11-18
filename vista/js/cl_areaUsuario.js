class UsuarioArea{

    constructor(objData){
        this._objData = objData;
    }


    listarAreaUsuarios(){
        let dataSet = [];

        $("#tablaUsuariosArea").dataTable({
            destroy: true,
            responsive:true,
            data:dataSet
        });
    }


}