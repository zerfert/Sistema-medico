<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sistema Medico</title>
    <link rel="stylesheet" href="./css/stylei.css">
  </head>
  <body>
    <div class="login">
      <img src="./img/XD.png" class="avatar" alt="Avatar Image">
      <h1>Sistema Medico</h1>
      <form name="form" action="logueo.php" method="POST">
        <label for="username">Username</label>
        <input type="text" name="u" placeholder="Ingrese su nombre de Usuario" required/>
        <label for="password">Password</label>
        <input type="password" name="p" placeholder="Ingrese su contraseña" required/>
        <input type="submit" value="Ingresar">
        <a href="./recuperar.php">¿Perdió su contraseña?</a><br>
        <a href="./Create.php">¿No tiene una cuenta?</a>
      </form>
    </div>
  </body>
</html>
