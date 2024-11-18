<script src="vista/js/cl_usuario.js"></script>

<div class="bg">
    <div class="container fondo">
    
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Usuarios</h1>
                <p class="col-md-8 fs-4">
                    "No te compares con nadie en este mundo... si lo haces, te estás insultando a ti mismo". - Bill Gates
                </p>
            </div>
        </div>
    
        
        <div class="container" id="contenedorTablaRegistrar">
            <div class="row">
        
            
                <div class="col-md-4">
                    <form id="fomUsuario" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="txt_Documento">Documento</label>
                            <input type="text" class="form-control" id="txt_Documento" required>
                            <div class="invalid-feedback">
                                Este campo es requerido
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="txt_Nombres">Nombres</label>
                            <input type="text" class="form-control" id="txt_Nombres" required>
                            <div class="invalid-feedback">
                                Este campo es requerido
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="txt_Apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="txt_Apellidos" required>
                            <div class="invalid-feedback">
                                Este campo es requerido
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="txt_Email">Email</label>
                            <input type="email" class="form-control" id="txt_Email" required>
                            <div class="invalid-feedback">
                                Este campo es requerido
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="txt_foto">Foto Usuario</label>
                            <input type="file" class="form-control" id="txt_foto" accept=".png,.jpg,.webp,.svg,.jpeg" required>
                            <div class="invalid-feedback">
                                Este campo es requerido
                            </div>
                        </div>
    
                        <button type="submit" class="btn btn-primary mt-3 btnAgregar">Agregar</button>
                    </form>
                </div>
        
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table id="tablaUsuarios" class="table table-primary">
                            <thead>
                                <tr>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Documento</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Email</th>
                                    <th scope="col"></th>
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
                <form id="formUsuarioModificar" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="txt_modificar_Documento">Documento</label>
                        <input type="text" class="form-control" id="txt_modificar_Documento" required>
                        <div class="invalid-feedback">
                            Este campo es requerido
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label for="txt_modificar_Nombres">Nombres</label>
                        <input type="text" class="form-control" id="txt_modificar_Nombres" required>
                        <div class="invalid-feedback">
                            Este campo es requerido
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label for="txt_modificar_Apellidos">Apellidos</label>
                        <input type="text" class="form-control" id="txt_modificar_Apellidos" required>
                        <div class="invalid-feedback">
                            Este campo es requerido
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label for="txt_modificar_Email">Email</label>
                        <input type="email" class="form-control" id="txt_modificar_Email" required>
                        <div class="invalid-feedback">
                            Este campo es requerido
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label for="txt_modificar_foto">Foto Usuario</label>
                        <input type="file" class="form-control" id="txt_modificar_foto" accept=".png,.jpg,.webp,.svg,.jpeg" required>
                        <div class="invalid-feedback">
                            Este campo es requerido
                        </div>
                    </div>
    
                    <button type="submit" class="btn btn-primary mt-3 btnModificar">Modificar</button>
                </form>
            </div>
        </div>
    
    </div>

</div>


<script src="vista/js/usuario.js"></script>