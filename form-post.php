<script src='https://www.google.com/recaptcha/api.js'></script>
<?php
       # Aquí pon la clave secreta que obtuviste en la página de developers de Google
define("6Ld8CLoZAAAAANfqvT_jf2my21KxvjNrvr2smdPC", "6Ld8CLoZAAAAAHJWKnnIwEQZUYXpngm7JGXYr50I");

# Comprobamos si enviaron el dato
if (!isset($_POST["g-recaptcha-response"]) || empty($_POST["g-recaptcha-response"])) {
    echo "<script type='text/javascript'>
     alert('Debes completar el captcha');
     window.location='recuperar.php';
     </script>";
}

# Antes de comprobar usuario y contraseña, vemos si resolvieron el captcha
$token = $_POST["g-recaptcha-response"];
$verificado = verificarToken($token, "6Ld8CLoZAAAAANfqvT_jf2my21KxvjNrvr2smdPC");
# Si no ha pasado la prueba
if ($verificado) {
    include('./Classlogueo.php');
    $t = new Trabajo();
    $t->CambiarPass($_REQUEST['p'],$_REQUEST['c']);
} else {
    echo "<script type='text/javascript'>
     alert('Parece que eres un robot');
     window.location='Index.php';
     </script>";

}


function verificarToken($token, $claveSecreta)
{
    # La API en donde verificamos el token
    $url = "https://www.google.com/recaptcha/api/siteverify";
    # Los datos que enviamos a Google
    $datos = [
        "secret" => $claveSecreta,
        "response" => $token,
    ];
    // Crear opciones de la petición HTTP
    $opciones = array(
        "http" => array(
            "header" => "Content-type: application/x-www-form-urlencoded\r\n",
            "method" => "POST",
            "content" => http_build_query($datos), # Agregar el contenido definido antes
        ),
    );
    # Preparar petición
    $contexto = stream_context_create($opciones);
    # Hacerla
    $resultado = file_get_contents($url, false, $contexto);
    # Si hay problemas con la petición (por ejemplo, que no hay internet o algo así)
    # entonces se regresa false. Este NO es un problema con el captcha, sino con la conexión
    # al servidor de Google
    if ($resultado === false) {
        # Error haciendo petición
        return false;
    }

    # En caso de que no haya regresado false, decodificamos con JSON
    # https://parzibyte.me/blog/2018/12/26/codificar-decodificar-json-php/

    $resultado = json_decode($resultado);
    # La variable que nos interesa para saber si el usuario pasó o no la prueba
    # está en success
    $pruebaPasada = $resultado->success;
    # Regresamos ese valor, y listo (sí, ya sé que se podría regresar $resultado->success)
    return $pruebaPasada;
}
?>