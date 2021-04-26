var formLogin = document.getElementById('formLogin');

formLogin.addEventListener('click', function (e) {
    e.preventDefault();

    var formSesion = new FormData(formLogin);

    fetch('controller/Login.php', {
        method: 'POST',
        body: formSesion
    }).then(res => res.json())
        .then(login => {
            if (login === '') {
                alert("Usuario o contraseña incorrecta, favor ingresar datos correctamente");
            } else {
                location.href="view/Mantenedor.php";
            }
        }).catch(err => console.log(err));
});