<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <title>Bienvenido</title>
</head>

<body class="text-center">
  <header class="p-3 mb-2 bg-success text-white">Test de Conocimientos</header>

  <main class="form-signin">
    <form action="controller/Login.php" method="post" id="formLogin">
      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Bienvenido</h1>

      <!-- usuario -->
      <label for="floatingPassword">Usuario</label>
      <div class="form-floating">
        <span class="input-group-text" id="basic-addon1">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
          </svg>
          <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario:" min="1" max="999999999999999" required="required" aria-label="Input group example" aria-describedby="basic-addon1">
        </span>
      </div>
      <!-- usuario -->
      <label for="floatingPassword">Contraseña</label>
      <div class="form-floating">
        <span class="input-group-text" id="basic-addon1">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
            <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"></path>
          </svg>
          <input type="password" class="form-control" id="clave" name="clave" min="1" max="9999999999" placeholder="Clave:" required="required" aria-label="Input group example" aria-describedby="basic-addon1">
        </span>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recordarme
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" name="btnIniciarSesion" type="submit">Entrar</button>
      <p class="mt-5 mb-3 text-muted">developed by Demis Vidal</p>
    </form>
  </main>

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
  </script>

  <!-- Optional JavaScript; choose one of the two! -->
  <!-- <script src="js/login.js"></script> -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>