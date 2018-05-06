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

		if(isset($_SESSION['ControladorUsuario'])) header('Location: home.php');
		else{
			session_unset();
			$ControladorUsuario = new ControladorUsuario();
			$Paginas 			= new Paginas();
			$Banco 				= new Banco();
		}

	/**********************************************
     * Tratamento de Mensagens de Erro 			  *
     **********************************************/

		$tipo 	 = "";
		$msgn	 = "";
		$confirma = FALSE;

	/**********************************************
     * Aplicação					 			  *
     **********************************************/

		if(isset($_POST['login']) && isset($_POST['senha'])){
					
			$psLogin = $_POST['login'];
	        $psSenha = $_POST['senha'];

	        if($ControladorUsuario->AutenticaUsuario($psLogin, $psSenha, $Banco)){
	        	
	        	$_SESSION['ControladorUsuario'] = $ControladorUsuario;
				
				/**********************************************
			     * Validação de sessão			 			  *
			     **********************************************/
					date_default_timezone_set("Brazil/East");

					$tempolimite = 600; //Tempo em Sengundos

					$_SESSION['registro'] = time();
					$_SESSION['limite'] = $tempolimite;

				header('Location: home.php');

			}else{
				$tipo 	 = "erro";
				$msgn	 = "Login ou Senha inválidos.";
				$confirma = TRUE;
			}
		}

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
	  	<?php echo  $Paginas->setTitle(); ?>
	  	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	  	<meta content="" name="description" />
	  	<meta content="" name="author" />
	  	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	  	<link href="assets/css/metro.css" rel="stylesheet" />
	  	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	  	<link href="assets/css/style.css" rel="stylesheet" />
	  	<link href="assets/css/style_responsive.css" rel="stylesheet" />
	  	<link href="assets/css/style_default.css" rel="stylesheet" id="style_color" />
	  	<link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
	 	<link rel="shortcut icon" href="favicon.ico" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<!-- END HEAD -->

	<!-- BEGIN BODY -->
	<body class="login">
	  	<!-- BEGIN LOGO -->
	  	<div class="logo">
	    	<img src="assets/img/logo.png" alt="" /> 
	  	</div>
	  	<!-- END LOGO -->
	  	
	  	<!-- BEGIN LOGIN -->
	  	<div class="content">
	    	<!-- BEGIN LOGIN FORM -->
	    	<form method="post" class="form-vertical login-form" action="login.php" />
		      	<br/><br/>
		      	<?php echo $Paginas->setAviso($tipo, $msgn, $confirma) ?>
		      	<div class="control-group">
		        	<div class="controls">
		          		<div class="input-icon left">
		            		<i class="icon-user"></i>
		            		<input class="m-wrap" type="text" required="" name="login" placeholder="Login">
		          		</div>
		        	</div>
		      	</div>
		      	<div class="control-group">
		        	<div class="controls">
		          		<div class="input-icon left">
		            		<i class="icon-lock"></i>
		            		<input class="m-wrap" type="password" required="" style="" name="senha" placeholder="Senha">
		          		</div>
		        	</div>
		      	</div>
		      	<div class="control-group">
		      		<div class="controls">
		        		<input type="submit" id="login-btn" class="btn dark-blue pull-right" value="Login">
		        		<br/><br/>
		        	</div>
		      	</div>
	    	</form>
	    	<!-- END LOGIN FORM -->        
	  	</div>
	  	<!-- END LOGIN -->

	  	<!-- BEGIN COPYRIGHT -->
	  	<?php $Paginas->setCopy(); ?>
	  	<!-- END COPYRIGHT -->
	  
	  	<!-- BEGIN JAVASCRIPTS -->
	  		<script src="assets/js/jquery-1.8.3.min.js"></script>
	  		<script src="assets/bootstrap/js/bootstrap.min.js"></script>  
	  		<script src="assets/uniform/jquery.uniform.min.js"></script> 
	  		<script src="assets/js/jquery.blockui.js"></script>
	  		<script src="assets/js/app.js"></script>
	  		<script>
	    		jQuery(document).ready(function() {     
	      			App.initLogin();
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