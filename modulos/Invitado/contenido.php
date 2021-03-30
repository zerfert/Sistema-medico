<?php
session_start();
$inactivo=300;
if(isset($_SESSION['timeout'])){
 $session_life=time() - $_SESSION['timeout'];
  if($session_life>$inactivo){
  	session_destroy();
  	header("location:../../index.php");
  }
}
$_SESSION['timeout']=time();

if($_SESSION['user']){
?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../../css/cssc.css">
   <link rel="stylesheet" type="text/css" href="../../css/slicebox.css" />
	<link rel="stylesheet" type="text/css" href="../../css/dem.css" />
	<link rel="stylesheet" type="text/css" href="../../css/custom.css" />
	<script type="text/javascript" src="../../js/modernizr.custom.46884.js"></script>
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>Inicio</title>
</head>
<body>
<div class='fondo'>
<div id='cssmenu'>
<ul>
   <li><a><span>Bienvenido <?=$_SESSION['user'];?></span></a></li>
   <li><a href='./contenido.php'><span>Inicio</span></a></li>
   <li><a href='./citas.php'><span>Citas</span></a></li>
   <li><a href='./medicos.php'><span>Medicos</span></a></li>
   <li class='last'><a href='#'><span>Contactenos</span></a></li>
   <li><a href='./salir.php'><span>Cerrar Sesion</span></a></li>
</ul>
</div>
</div>
<div class="container">

		

			<h1>Sistema Medico <span>Ofertas Especiales El Dia De Hoy</span></h1>
			
			

			<div class="wrapper">

				<ul id="sb-slider" class="sb-slider">
					<li>
						<a href="#" target="_blank"><img src="1.png" alt="../../images/image1"/></a>
						<div class="sb-description">
						</div>
					</li>
					<li>
						<a href="#" target="_blank"><img src="2.jpg" alt="../../images/image1"/></a>
						<div class="sb-description">
						</div>
					</li>
					<li>
						<a href="#" target="_blank"><img src="3.jpeg" alt="../../images/image1"/></a>
						<div class="sb-description">
						</div>
					</li>
				</ul>

				<div id="shadow" class="shadow"></div>

				<div id="nav-arrows" class="nav-arrows">
					<a href="#">Next</a>
					<a href="#">Previous</a>
				</div>

			</div><!-- /wrapper -->
			

		</div>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="../../js/jquery.slicebox.js"></script>
		<script type="text/javascript">
			$(function() {
				
				var Page = (function() {

					var $navArrows = $( '#nav-arrows' ).hide(),
						$shadow = $( '#shadow' ).hide(),
						slicebox = $( '#sb-slider' ).slicebox( {
							onReady : function() {

								$navArrows.show();
								$shadow.show();

							},
							orientation : 'r',
							cuboidsRandom : true
						} ),
						
						init = function() {

							initEvents();
							
						},
						initEvents = function() {

							// add navigation events
							$navArrows.children( ':first' ).on( 'click', function() {

								slicebox.next();
								return false;

							} );

							$navArrows.children( ':last' ).on( 'click', function() {
								
								slicebox.previous();
								return false;

							} );

						};

						return { init : init };

				})();

				Page.init();

			});
		</script>
</body>
<html>
<?php
}else{

	echo "<script type='text/javascript'>
     alert('ERROR!! al iniciar sesion');
     window.location='../../index.php';
     </script>";
}
?> 
