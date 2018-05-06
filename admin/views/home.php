<?php

    /**********************************************
     * Include Controladores de Página	          *
     **********************************************/

		
		include_once '../controladores/ControladorUsuario.php';
		include_once '../controladores/ControladorPaginas.php';


    /**********************************************
     * Include Persistência          			  *
     **********************************************/

		include_once '../persistencia/Banco.php';

	/**********************************************
     * Identificação de Sessão         			  *
     **********************************************/

		session_start();

		if(!isset($_SESSION['ControladorUsuario'])) header('Location: logout.php');
		else{

		    /**********************************************
	     	* Limitador de Sessão          			  *
	     	**********************************************/		
				date_default_timezone_set("Brazil/East");
						
				$registro 	= $_SESSION['registro'];
				$limite 	= $_SESSION['limite'];

				if($registro) $segundos = time()- $registro;

				if($segundos>$limite)header("Location: logout.php");
				else $_SESSION['registro'] = time();
			
			$ControladorUsuario = $_SESSION['ControladorUsuario'];
			$Banco				= new Banco();
			
			$Paginas = new Paginas();

		}

	/**********************************************
     * Tratamento de Mensagens de Erro 			  *
     **********************************************/

		$tipo 	 = "";
		$msgn	 = "";
		$confirma = FALSE;


	/**********************************************
	 * 			FIM DO SERVER SIDE			 	  *
	 **********************************************/
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="pt-BR"> <!--<![endif]-->

<!-- BEGIN HEAD -->
	<head>
		<meta charset="UTF-8" />
		<?php $Paginas->setTitle(); ?>
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/metro.css" rel="stylesheet" />
		<link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
		<link href="assets/css/style.css" rel="stylesheet" />
		<link href="assets/css/style_responsive.css" rel="stylesheet" />
		<link href="assets/css/style_default.css" rel="stylesheet" id="style_color" />
		<link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen/chosen.css" />
		<link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
		<link rel="shortcut icon" href="favicon.ico" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="fixed-top">
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				
				<!-- BEGIN LOGO -->
				<a class="brand" href="">
					<!--<img src="assets/img/logo.png" alt="logo" />-->
				</a>
				<!-- END LOGO -->

				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
					<img src="assets/img/menu-toggler.png" alt="" />
				</a>          
				<!-- END RESPONSIVE MENU TOGGLER -->				
				
				<!-- BEGIN TOP NAVIGATION MENU -->
				<ul class="nav pull-right">
						<?php $Paginas->setDropDown($ControladorUsuario->NomeUser(), $ControladorUsuario->idUsuario() ); ?>
				</ul>
				<!-- END TOP NAVIGATION MENU -->

			</div>
		</div>
	</div>

	<!-- BEGIN CONTAINER -->	
	<div class="page-container row-fluid">

		<div class="page-sidebar nav-collapse collapse">
			<?php $Paginas->setMenu(2); ?>
		</div>
		
		<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - BEGIN PAGE - - - - - - - - - - - - - - - - - - - - -->
		<div class="page-content">
			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						<?php $Paginas->setTitleBarra("Home","Home"); ?>
					</div>
				</div>
				<!-- END PAGE HEADER-->
				
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<div class="alert alert-alert">
							<button class="close" data-dismiss="alert"></button>
							<strong>ATENÇÃO: </strong>
								</br>
								</br> Atenção usuário, as sessões no painel de usuário possuem contagem de tempo de inatividade. Caso esse contador atinja um determinado valor, você será automaticamente desconectado e será direcionado para página de login. Sendo que todos os dados, não enviados, não salvos ou não editados serão perdidos.
								</br>
								</br>Ao cadastrar qualquer tipo de dado no sistema. A utilização de aspas simples "[ ' ' ]" não é permitida. A utilização inadequada não vai permitir que os dados inseridos sejam salvos na base de dados. Para tal, utilize apenas aspas duplas.
								
						</div>
					</div>
				</div>

				<!--END PAGE CONTENT-->

			</div>
		</div>
	</div>
	<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - END CONTAINER - - - - - - - - - - - - - - - - - - - - - -->

	<!-- BEGIN FOOTER -->
		<?php $Paginas->setCopyInterno(); ?>
	<!-- END FOOTER -->

	<!-- BEGIN JAVASCRIPTS -->
		<script src="assets/js/jquery-1.8.3.min.js"></script>			
		<script src="assets/breakpoints/breakpoints.js"></script>			
		<script src="assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>	
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.blockui.js"></script>
		<script src="assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>	
		<script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
		<script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
		<!-- ie8 fixes -->
			<!--[if lt IE 9]>
				<script src="assets/js/excanvas.js"></script>
				<script src="assets/js/respond.js"></script>
			<![endif]-->
		<script src="assets/js/app.js"></script>		
		<script>
			jQuery(document).ready(function() {			
				// initiate layout and plugins
				App.setPage('calendar');
				App.init();
			});
		</script>
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-37564768-1']);
			_gaq.push(['_setDomainName', 'keenthemes.com']);
			_gaq.push(['_setAllowLinker', TRUE]);
			_gaq.push(['_trackPageview']);
			(function() {
			  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = TRUE;
			  ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
			  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>