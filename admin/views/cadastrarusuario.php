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

		$ControladorUsuario 	= $_SESSION['ControladorUsuario'];
	
		
		$Paginas 				= new Paginas();
		$Banco 					= new Banco();
	}

	/**********************************************
     * Tratamento de Mensagens de Erro 			  *
     **********************************************/

		$tipo 	 = "";
		$msgn	 = "";
		$confirma = FALSE;

	/**********************************************
     * Verificação de nível			 			  *
     **********************************************/
		
		$NivelUsuarioLogado = 2; //$ControladorCargo->getNivel($Banco, $ControladorUsuario->idCargo());  garantindo privilégios administrativos
//		if($NivelUsuarioLogado == 0) header('Location: 500.php');

	/**********************************************
     * Aplicação					 			  *
     **********************************************/

		if(isset ($_POST['login']) && isset ($_POST['tipoAcesso']) && isset ($_POST['ncsenha']) && isset ($_POST['nsenha']) ) {
	        
	        if($_POST['ncsenha'] != $_POST['nsenha']){
	        	
	        	$tipo = "erro"; 
	        	$msgn = "Senhas divergentes. Corrija e tente novamente."; 
	        	$confirma = TRUE;

	        }else{
		        
		        if($NivelUsuarioLogado != 2){
		        
		        	if(($NivelUsuarioLogado < $_POST['tipoAcesso'])) $autorizacao = FALSE;
		        	else $autorizacao = TRUE;
		        
		        }else if($NivelUsuarioLogado == 2) $autorizacao = TRUE;
		         else $autorizacao = FALSE;
		        
		        if($autorizacao){

		        	$count = $ControladorUsuario->BuscarUsuario($Banco, $_POST['login']);

					if($count->num_rows == 0){

			        	$NovoUsuario = new UsuarioSchema($_POST['login'], $_POST['nsenha']);
			        	$NovoUsuario->set('idCargoFK', $_POST['tipoAcesso']);


			        	if($ControladorUsuario->AdicionarUsuario($NovoUsuario, $Banco)){
			        		
			        		$tipo = "sucesso";
			        		$msgn = "Usuário cadastrado com sucesso.";
			        		$confirma = TRUE;

			        	}else{
			        		
			        		$tipo = "erro";
			        		$msgn = "Ocorreu um erro no cadastro. Informe ao Administrador que ocorreu um \"Exception\" no Banco de Dados para que ele possa arrumar.";
			        		$confirma = TRUE;
			        	}
			        }else{
			        	
			        	$tipo = "erro";
			        	$msgn = "O Login já consta na base da dados. Tente novamente com um Login diferente.";
			        	$confirma = TRUE;
			        }
			    }else{
			    	
			    	$tipo = "erro";
			    	$msgn = "Permissão insuficiente para concluir o cadastro. Solicite um permissão de acesso maior a seu supervisor, ou selecione uma permissão a qual possui acesso.";
			    	$confirma = TRUE;
			    }
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
		<link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen/chosen.css" />
	</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="fixed-top">
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">

				<a class="brand" href="">
					<!--<img src="assets/img/logo.png" alt="logo" />-->
				</a>
				
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
					<img src="assets/img/menu-toggler.png" alt="" />
				</a>          
				<!-- END RESPONSIVE MENU TOGGLER -->

				<ul class="nav pull-right">
					<?php $Paginas->setDropDown($ControladorUsuario->NomeUser(), $ControladorUsuario->idUsuario() ); ?>
				</ul>

			</div>
		</div>
	</div>

	<!-- BEGIN CONTAINER -->	
	<div class="page-container row-fluid">
		
		<div class="page-sidebar nav-collapse collapse">
			<?php $Paginas->setMenu($ControladorCargo->getNivel($Banco, $ControladorUsuario->idCargo())); ?>
		</div>


		<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - BEGIN PAGE - - - - - - - - - - - - - - - - - - - - -->
		<div class="page-content">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<?php $Paginas->setTitleBarra("Usuários","Cadastro de Usuários"); ?>
					</div>
				</div>
				
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<?php echo $Paginas->setAviso($tipo, $msgn, $confirma) ?>
						<div class="portlet box grey">

			                <div class="portlet-title">
			                    <h4><i class="icon-reorder"></i>Cadastro de Usuário</h4> 
			                    <div class="tools">
			                        <a href="javascript:;" class="collapse"></a>
			                    </div>
			                </div>
		                    <div class="portlet-body form">
		                        <form name="formUsuario" class="form-horizontal" action="cadastrarusuario.php" method="post"/>
			                        
			                        <div class="control-group">
			                           	<label class="control-label">Login</label>
			                           	<div class="controls">
			                               	<input class="span6 m-wrap" name="login" type="text" pattern=".{0,50}" title="No máximo cinquenta caracteres." required/>
			                           	</div>
			                        </div>

			                        <div class="control-group">
			                            <label class="control-label">Tipo de acesso</label>
			                            <div class="controls">
			                              	<select  name="tipoAcesso" align="right" class="chosen" data-placeholder="Clique para visualizar" >
			                                    <option value=""/>
			                                    <?php 
			                                   		$resultado = $ControladorCargo->ListarCargo($Banco);
			                                   		while($linha = $resultado->fetch_assoc()){
			                                   			if($NivelUsuarioLogado != 2){
			                                   				if($linha['nivel'] < $NivelUsuarioLogado)
			                                   					echo "<option value=\"".$linha['idCargo']."\"/>".$linha['nome']."";
			                                   			}else{
			                                   				echo "<option value=\"".$linha['idCargo']."\"/>".$linha['nome']."";
			                                   			}
			                                   		}
			                                   	?>
			                                </select>
			                           	</div>
			                        </div>

			                       
			                           	
			                        <div class="control-group">
			                            <label class="control-label">Senha</label>
			                            <div class="controls">
			                                 <div class="input-icon left">
			                                    <i class="icon-lock"></i>
			                                    <input class="span6 m-wrap " name="nsenha" type="password" placeholder="Senha de acesso" pattern=".{6,25}" title="Seis dígitos no mínimo, vinte e cinco no máximo." required/>    
			                                </div><br>
			                                <div class="input-icon left">
			                                    <i class="icon-lock"></i>
			                                    <input class="span6 m-wrap " name="ncsenha" type="password" placeholder="Repita a senha" pattern=".{6,25}" title="Seis dígitos no mínimo, vinte e cinco no máximo." required/>    
			                                </div>
			                            </div>
			                        </div>

			                        <div class="form-actions">
		                              	<button name="enviar" type="submit" class="btn blue">Enviar</button>
		                              	<button type="button" class="btn" onclick="window.location.href='usuarios.php'">Cancelar</button>
		                           	</div>

		                 		</form>
		                  	</div>
						</div>
					</div>
				</div>
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
</html>