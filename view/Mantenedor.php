<?php
session_start();
if (isset($_SESSION["usuario"])) {
    require_once("../model/Usuario.php");

    $u = unserialize($_SESSION["usuario"]);
    $nombres = $u->getNombres();
    $apPaterno = $u->getAp_Paterno();
    $apMaterno = $u->getAp_Materno();
} else {
    header("location: ../index.php");
}
?>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Mantenedor</title>
</head>

<body>
    <!-- Navbar-->
    <header class="p-3 mb-2 bg-success text-white">
        <ul class="nav justify-content-start">
            <span class="navbar-brand mb-0 h1">Test de conocimientos</span>
        </ul>
        <ul class="nav justify-content-end">
            <span class="nav-link active">
                Bienvenido:
                <?php echo ($nombres . ' ' . $apPaterno . ' ' . $apMaterno); ?>
            </span>
        </Ul>
    </header>


    <div class="table-responsive-sm primary">

        <header class="p-3 mb-2 bg-success">
            <h3 class="logo">Mantenedor</h3>

            <!-- Modal Cerrar Sesion -->
            <ul class="nav justify-content-end">
                <button onclick="cerrarSesion()" class="btn btn-light">Cerrar Sesion</button>
                <!-- Modal -->
                <div class="modal fade" id="modalCerrarSesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Advertencia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ¿Realmente desea Cerrar Sesión?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" id="btnCerrarSesion" name="btnCerrarSesion" class="btn btn-success">SI</button>
                            </div>
                        </div>
                    </div>
                </div>
            </ul>
        </header>
        <!-- Modal Cerrar Sesion -->


        <!-- Modal Crear Usuario -->

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Agregar Usuario
        </button>
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../controller/CreateUsuario.php" method="POST">
                            <div class="col-auto"> <label for="validationTooltip01" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" min="1" max="999999999999999" placeholder="ej: usuario 1" required>
                            </div>
                            <div class="col-auto"> <label for="inputPassword" class="form-label">Clave</label>
                                <input type="password" class="form-control" id="clave" min="1" max="9999999999" placeholder="jytE3T5$/6ak" name="clave">
                            </div>
                            <div class="col-auto"> <label for="validationTooltip01" class="form-label">Nombres</label>
                                <input type="text" class="form-control" name="nombres" placeholder="ej: Juan Alberto" required>
                            </div>
                            <div class="col-auto"> <label for="validationTooltip02" class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" name="apellidoPaterno" placeholder="ej: Perez" required>
                            </div>
                            <div class="col-auto"> <label for="validationTooltip02" class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" name="apellidoMaterno" placeholder="ej: Rodriguez" required>
                            </div>
                            <div class="col-auto"> <label for="validationTooltipUsername" class="form-label">Email</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                    <input type="email" class="form-control" name="email" placeholder="ej: email@asdasd.com" aria-describedby="validationTooltipUsernamePrepend" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
                                </div>
                            </div>

                            <div class="col-auto"> <label for="validationTooltip04" class="form-label">Perfil</label>
                                <select class="form-select" name="perfil" required>
                                    <option selected disabled value="">Seleccione Perfil...</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Supervisor</option>
                                    <option value="3">Usuario Normal</option>
                                </select>
                            </div>

                            <div class="col-auto"> <label for="validationTooltip04" class="form-label">Estado</label>
                                <select class="form-select" name="estado" required>
                                    <option selected disabled value="">Seleccione Estado...</option>
                                    <option value="0">Inactivo</option>
                                    <option value="1">Activo</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit" name="btnCrearUsuario">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <!-- Modal Crear Usuario -->



        <!-- Datatable -->
        <table id="tableMantenedor" class="table table-striped table-bordered" style="width:100%">
            <thead id="tituloTablaMantenedor">
                <tr>
                    <th>Usuario</th>
                    <th>Nombres</th>
                    <th>A.Paterno</th>
                    <th>A.Materno</th>
                    <th>Email</th>
                    <th>Perfil Usuario</th>
                    <th>Estado</th>
                    <th>Opción</th>
                </tr>
            </thead>
            <tbody id="cuerpoTablaMantenedor"></tbody>
            <tfoot id="pieTablaMantenedor">
                <tr>
                    <th>Usuario</th>
                    <th>Nombres</th>
                    <th>A.Paterno</th>
                    <th>A.Materno</th>
                    <th>Email</th>
                    <th>Perfil Usuario</th>
                    <th>Estado</th>
                    <th>Opción</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- Datatable -->

    <!-- Modal Editar -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModalE" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../controller/UpdateUsuario.php" method="POST">
                        <input type="hidden" class="form-control" id="id_usuarioE" name="id_usuarioE">
                        <input type="hidden" class="form-control" id="claveE" name="claveE">

                        <div class="col-auto"> <label for="validationTooltip01" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="usuarioE" name="usuarioE" min="1" max="999999999999999" placeholder="ej: usuario 1" required>
                        </div>
                        <div class="col-auto"> <label for="validationTooltip01" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="nombresE" name="nombresE" placeholder="ej: Juan Alberto" required>
                        </div>
                        <div class="col-auto"> <label for="validationTooltip02" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control" id="apellido_paternoE" name="apellido_paternoE" placeholder="ej: Perez" required>
                        </div>
                        <div class="col-auto"> <label for="validationTooltip02" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control" id="apellido_maternoE" name="apellido_maternoE" placeholder="ej: Rodriguez" required>
                        </div>
                        <div class="col-auto"> <label for="validationTooltipUsername" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                <input type="email" class="form-control" id="emailE" name="emailE" placeholder="ej: email@asdasd.com" aria-describedby="validationTooltipUsernamePrepend" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
                            </div>
                        </div>

                        <div class="col-auto"> <label for="validationTooltip04" class="form-label">Perfil</label>
                            <select class="form-select" id="perfilE" name="perfilE" required>
                                <option selected disabled value="">Seleccione Perfil...</option>
                                <option value="1">Administrador</option>
                                <option value="2">Supervisor</option>
                                <option value="3">Usuario Normal</option>
                            </select>
                        </div>

                        <div class="col-auto"> <label for="validationTooltip04" class="form-label">Estado</label>
                            <select class="form-select" id="estadoE" name="estadoE" required>
                                <option selected disabled value="">Seleccione Estado...</option>
                                <option value="0">Inactivo</option>
                                <option value="1">Activo</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" name="btnEditarUsuario">Guardar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!-- Modal Editar -->

    <!-- Modal Eliminar -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModalD" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../controller/DeleteUsuario.php" method="POST">
                        <input type="hidden" class="form-control" id="id_usuarioD" name="id_usuarioD">
                        <input type="hidden" class="form-control" id="claveD" name="claveD">

                        <div class="col-auto"> <label for="validationTooltip01" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="usuarioD" name="usuarioD" min="1" max="999999999999999" placeholder="ej: usuario 1" disabled>

                        </div>
                        <div class="col-auto"> <label for="validationTooltip01" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="nombresD" name="nombresD" placeholder="ej: Juan Alberto" disabled>
                        </div>
                        <div class="col-auto"> <label for="validationTooltip02" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control" id="apellido_paternoD" name="apellido_paternoD" placeholder="ej: Perez" disabled>
                        </div>
                        <div class="col-auto"> <label for="validationTooltip02" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control" id="apellido_maternoD" name="apellido_maternoD" placeholder="ej: Rodriguez" disabled>
                        </div>
                        <div class="col-auto"> <label for="validationTooltipUsername" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                <input type="email" class="form-control" id="emailD" name="emailD" placeholder="ej: email@asdasd.com" aria-describedby="validationTooltipUsernamePrepend" disabled>
                            </div>
                        </div>

                        <div class="col-auto"> <label for="validationTooltip04" class="form-label">Perfil</label>
                            <select class="form-select" id="perfilD" name="perfilD" disabled>
                                <option selected disabled value="">Seleccione Perfil...</option>
                                <option value="1">Administrador</option>
                                <option value="2">Supervisor</option>
                                <option value="3">Usuario Normal</option>
                            </select>
                        </div>

                        <div class="col-auto"> <label for="validationTooltip04" class="form-label">Estado</label>
                            <select class="form-select" id="estadoD" name="estadoD" disabled>
                                <option selected disabled value="">Seleccione Estado...</option>
                                <option value="0">Inactivo</option>
                                <option value="1">Activo</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" name="btnEliminarUsuario">Guardar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!-- Modal Eliminar -->


    <!-- Validador cantidad de ingresos por input usuario y clave -->
    <script type="text/javascript">
        var usuario = document.getElementById('usuario');
        var clave = document.getElementById('clave');

        usuario.addEventListener('input', function() {
            if (this.value.length > 15)
                this.value = this.value.slice(0, 15);
        });

        clave.addEventListener('input', function() {
            if (this.value.length > 10)
                this.value = this.value.slice(0, 10);
        });

        var usuarioE = document.getElementById('usuarioE');
        var claveE = document.getElementById('claveE');

        usuarioE.addEventListener('input', function() {
            if (this.value.length > 15)
                this.value = this.value.slice(0, 15);
        });

        claveE.addEventListener('input', function() {
            if (this.value.length > 10)
                this.value = this.value.slice(0, 10);
        });

        var usuario = document.getElementById('usuarioD');
        var clave = document.getElementById('claveD');

        usuarioD.addEventListener('input', function() {
            if (this.value.length > 15)
                this.value = this.value.slice(0, 15);
        });

        claveD.addEventListener('input', function() {
            if (this.value.length > 10)
                this.value = this.value.slice(0, 10);
        });
    </script>
    <!-- Validador cantidad de ingresos por input usuario y clave -->

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="../js/mantenedor.js"></script>
    <script src="../js/editarUsuario.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
</body>

</html>