<!DOCTYPE html>
<html>
  <head>
  <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>
    <meta charset="utf-8">
    <title>Sistema Medico</title>
    <link rel="stylesheet" href="./css/rec.css">
  </head>
  <body onload="limpiarr();">

    <div class="box">
      <img src="./img/XD.png" class="avatar" alt="Avatar Image">
      <h1>Sistema Medico</h1>
      <form id="form" action="form-post.php" method="POST">
        <label for="correo">Ingrese Correo Electronico Para Recuperar Tu Cuenta</label>
        <input type="text" name="c" placeholder="Ingrese su correo electronico" pattern="^[\w._%-]+@[\w.-]+\.[a-zA-Z]{2,4}$" required/>
        <label for="password">Ingrese Nueva Contraseña</label>
        <input type="password" name="p" placeholder="Ingrese su contraseña" required/>
        <div align= "center" class="g-recaptcha" data-sitekey="6Ld8CLoZAAAAAHJWKnnIwEQZUYXpngm7JGXYr50I"></div><br>
        <script src=‘https://www.google.com/recaptcha/api.js’></script>
        <input type="submit" value="Enviar" onclick="validarr();">
        <a href="./Index.php">Regresar</a><br>
      </form>
    </div>
  </body>
</html>