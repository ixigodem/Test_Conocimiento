var tituloTablaMantenedor = document.getElementById('tituloTablaMantenedor');
var cuerpoTablaMantenedor = document.getElementById('cuerpoTablaMantenedor');
var pieTablaMantenedor = document.getElementById('pieTablaMantenedor');

fetch('../controller/GetUsuario.php',{
    method: 'GET'
})
.then(res => res.json())
.then(usuario => {
    if (usuario === "") {
        alert("No se envio ningun dato");
    } else {
        crearTablaMantenedor(usuario); 
    }
}).catch(err => console.log(err));

function crearTablaMantenedor(usuario) {
    tituloTablaMantenedor.innerHTML = `
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
    `

    for (const u of usuario) {
        cuerpoTablaMantenedor.innerHTML += `
        <tr>
            <td>${u.usuario}</td>
            <td>${u.nombres}</td>
            <td>${u.ap_paterno}</td>
            <td>${u.ap_materno}</td>
            <td>${u.email}</td>
            <td>${u.perfil}</td>
            <td>${u.estado == 0 ? "Inactivo" : "Activo"}</td>
            <td>
            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalE" onclick="editarUsuario(${u.id_usuario})">
            <img src="https://img.icons8.com/ios/20/000000/edit-property.png"/>
            </button>
            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalD" onclick="eliminarUsuario(${u.id_usuario})">
            <img src="https://img.icons8.com/ios/20/000000/delete--v1.png"/>
            </button>
            </td>
        </tr>
        `
        pieTablaMantenedor.innerHTML = `
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
        `
    }

    $(document).ready(function() {
        $('#tableMantenedor').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });
    });
}

function editarUsuario(id) {
    // Obtener el usuario seleccionado
    fetch('../controller/GetUser.php?id=' +id, {
        method: 'GET'
    })
    .then(res => res.json())
    .then(respuesta => {
        abrirModalEditarUsuario(respuesta);
    }).catch(err => console.log(err));
    // Fin de Obtención de los datos del usuario
    // Una vez que tengo el Json, Abrir el Modal
}

function abrirModalEditarUsuario(respuesta){
    // Acá abres modal
    $("#exampleModalE").modal("show");
    for (const p of respuesta) {
        $("#id_usuarioE").val(p['id_usuario']);
        $("#usuarioE").val(p['usuario']);
        $("#claveE").val(p['clave']);
        $("#nombresE").val(p['nombres']);
        $("#apellido_paternoE").val(p['ap_paterno']);
        $("#apellido_maternoE").val(p['ap_materno']);
        $("#emailE").val(p['email']);
        $("#perfilE").val(p['id_perfil']);
        $("#estadoE").val(p['estado']);
    }
    // y llenas los datos del html que està dentro del modal
    // recuerda crear un input hidden que se llame idPacienteEditado
    // al cual debes poner el id del paciente en cuestiòn
}

function eliminarUsuario(id_u) {
    // Obtener el paciente seleccionado
    fetch('../controller/GetUser.php?id=' +id_u, {
        method: 'GET'
    })
    .then(res => res.json())
    .then(resultado => {
        abrirModalEliminarUsuario(resultado);
    }).catch(err => console.log(err));
    // Fin de Obtención de los datos del paciente
    // Una vez que tengo el Json, Abrir el Modal
}

function abrirModalEliminarUsuario(resultado){
    // Acá abres modal
    $("#exampleModalD").modal("show");
    for (const r of resultado) {
        $("#id_usuarioD").val(r['id_usuario']);
        $("#usuarioD").val(r['usuario']);
        $("#claveD").val(r['clave']);
        $("#nombresD").val(r['nombres']);
        $("#apellido_paternoD").val(r['ap_paterno']);
        $("#apellido_maternoD").val(r['ap_materno']);
        $("#emailD").val(r['email']);
        $("#perfilD").val(r['id_perfil']);
        $("#estadoD").val(r['estado']);
    }
    // y llenas los datos del html que està dentro del modal
    // recuerda crear un input hidden que se llame idPacienteEditado
    // al cual debes poner el id del paciente en cuestiòn
}

function cerrarSesion() {
    $("#modalCerrarSesion").modal("show");
    envioSolicitud();
}

function envioSolicitud() {
    $("#btnCerrarSesion").click(function() {
        fetch('../controller/Salir.php',{
            method: 'POST'  
        }).catch(err => console.log(err));

        $("#modalCerrarSesion").removeClass("modal-open");
        window.location.href="../index.php";
    })
}