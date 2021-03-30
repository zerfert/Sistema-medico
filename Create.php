<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sistema Medico</title>
    <link rel="stylesheet" href="./css/stylee.css">
    <script type="text/javascript" language="javascript" src="./js/funcionesL.js"></script>
  </head>
  <body onload="limpiarc();">

    <div class="login-box">
      <img src="./img/XD.png" class="avatar" alt="Avatar Image">
      <h1>Registro Sistema Medico</h1>
      <form action="ruser.php" method="POST">
        <label for="username">Ingrese Username</label>
        <input type="text" name="u" placeholder="Ingrese su nombre de Usuario" required/>
        <label for="password">Ingrese Password</label>
        <input type="password" name="p" placeholder="Ingrese su contraseña" required/>
        <label for="correo">Ingrese Correo Electronico</label>
        <input type="text" name="c" placeholder="Ingrese su correo" pattern="^[\w._%-]+@[\w.-]+\.[a-zA-Z]{2,4}$" required/>
        <input type="submit" value="Registrar" onclick="validarc();">
        <a href="./Index.php">Regresar</a><br>
      </form>
    </div>
  </body>
</html>
