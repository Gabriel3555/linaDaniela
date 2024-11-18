<script src="vista/js/cl_area.js"></script>

<div class="container">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">área</h1>
            <p class="col-md-8 fs-4">
                "Los buenos programadores saben qué escribir. Los grandes saben qué reescribir y reutilizar" - Eric S. Raymond
            </p>
        </div>
    </div>

    <div class="container" id="contenedorTablaRegistrar">
        <div class="row">
            <div class="col-md-4">
                <form id="formArea" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="txt_nombre_area">Nombre del Área</label>
                        <input type="text" class="form-control" id="txt_nombre_area" required>
                        <div class="invalid-feedback">
                            Este campo es requerido
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Agregar</button>
                </form>
            </div>

            <div class="col-md-8">
                <div class="table-responsive">
                    <table id="tablaAreas" class="table table-primary">
                        <thead>
                        <tr>
                            <th scope="col">Nombre del Área</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="contenedorModificar" style="display: none;">
        <button class="btn btn-danger" id="btn-Volver">Volver</button>
        <div class="row col-md-4">
            <form id="formModificarArea" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="txt_modificar_nombre_area">Nombre del Área</label>
                    <input type="text" class="form-control" id="txt_modificar_nombre_area" required>
                    <div class="invalid-feedback">
                        Este campo es requerido
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Modificar</button>
            </form>
        </div>
    </div>
</div>

<script src="vista/js/area.js"></script>