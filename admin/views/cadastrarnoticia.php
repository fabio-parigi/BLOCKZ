<?php

    /**********************************************
     * Include Controladores de Página	          *
     **********************************************/
		include_once '../controladores/ControladorNoticia.php';
		include_once '../controladores/ControladorUsuario.php';
		include_once '../controladores/ControladorPaginas.php';
		include_once '../controladores/ControladorCargo.php';


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
				$limite 	= 1800;

				if($registro) $segundos = time()- $registro;

				if($segundos>$limite)header("Location: logout.php");
				else $_SESSION['registro'] = time();

			$ControladorUsuario 	= $_SESSION['ControladorUsuario'];
			$controladorNoticia	= new ControladorNoticia();
			$ControladorCargo		= new ControladorCargo();
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

    	$NivelUsuarioLogado = $ControladorCargo->getNivel($Banco, $ControladorUsuario->idCargo());
    	//if($NivelUsuarioLogado != 2) header("Location: 500.php");

	/**********************************************
     * Aplicação					 			  *
     **********************************************/
		
		

		if(isset ($_REQUEST['titulo']) && isset ($_REQUEST['texto']) && isset ($_REQUEST['intertitulo'])) {
		
			$Noticia = new NoticiaSchema( addslashes($_REQUEST['titulo']),$_REQUEST['texto'], addslashes($_REQUEST['intertitulo']),date('Y-m-d H:i'),date('Y-m-d H:i'),$_REQUEST['destaque'],$_REQUEST['adicionais']);
			if($controladorNoticia->AdicionarNoticia($Noticia, $Banco)){

		    	$tipo = "sucesso";
		    	$msgn = "Notícia cadastrada com sucesso.";
		    	$confirma = TRUE;

		    }else{

		    	$tipo = "erro";
		    	$msgn = "Ocorreu um erro no cadastro. Certifique-se de ter preenchido todos os campos de forma adequada. Ou informe ao Administrador que ocorreu um \"Exception\" no Banco de Dados.";
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
		<link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href="assets/css/style.css" rel="stylesheet" />
		<link href="assets/css/style_responsive.css" rel="stylesheet" />
		<link href="assets/css/style_default.css" rel="stylesheet" id="style_color" />
		<link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
		<link rel="stylesheet" type="text/css" href="assets/ckeditor/contents.css" />
		<link rel="shortcut icon" href="favicon.ico" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="assets/ckeditor/ckfinder/ckfinder.js"></script>
		<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="assets/ckeditor/config.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.1.min.js"></script>  
		<link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen/chosen.css" />
		
		
		
		
			<script type="text/javascript">
			
				<!-- Abre a popup para escolher os arquivos no servidor -->
function BrowseServer( startupPath, functionData )
{
	// You can use the "CKFinder" class to render CKFinder in a page:
	var finder = new CKFinder();

	// The path for the installation of CKFinder (default = "/ckfinder/").
	finder.basePath = '../';

	//Startup path in a form: "Type:/path/to/directory/"
	finder.startupPath = startupPath;
	
	// Name of a function which is called when a file is selected in CKFinder.
	finder.selectActionFunction = SetFileField;

	// Additional data to be passed to the selectActionFunction in a second argument.
	// We'll use this feature to pass the Id of a field that will be updated.
	finder.selectActionData = functionData;

	// Name of a function which is called when a thumbnail is selected in CKFinder.
	finder.selectThumbnailActionFunction = ShowThumbnails;

	// Launch CKFinder
	finder.popup();
}

// This is a sample function which is called when a file is selected in CKFinder.
function SetFileField( fileUrl, data )
{
	document.getElementById( data["selectActionData"] ).value = document.getElementById( data["selectActionData"] ).value 	+ fileUrl+ ';';
	
	
}

// This is a sample function which is called when a thumbnail is selected in CKFinder.
function ShowThumbnails( fileUrl, data )
{
	// this = CKFinderAPI
	var sFileName = this.getSelectedFile().name;
	document.getElementById( 'thumbnails' ).innerHTML +=
			'<div class="thumb">' +
				'<img src="' + fileUrl + '" />' +
				'<div class="caption">' +
					'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
				'</div>' +
			'</div>';

	document.getElementById( 'preview' ).style.display = "";
	// It is not required to return any value.
	// When false is returned, CKFinder will not close automatically.
	return false;
}
	</script>
	
	
	

	
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
						<?php $Paginas->setTitleBarra("Adicionar Notícia","Novo Artigo"); ?>
					</div>
				</div>
				
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<?php echo $Paginas->setAviso($tipo, $msgn, $confirma) ?>
						<div class="portlet box grey">

			                <div class="portlet-title">
			                    <h4><i class="icon-reorder"></i>Escrever Notícia</h4> 
			                    <div class="tools">
			                        <a href="javascript:;" class="collapse"></a>
			                    </div>
			                </div>
		                    <div class="portlet-body form">
		                        <form name="formUsuario" class="form-horizontal" action="cadastrarnoticia.php" method="post"/>

											 
			                       <div class="control-group">	 	
										<label class="control-label">Imagem-Destaque&nbsp;&nbsp;</label>
										<input id="destaque" name="destaque" type="text" size="60" required />
										<button type="button" class="btn" onclick="BrowseServer('','destaque');">Escolher Imagem</button><br>
									</div>	
									
									 <div class="control-group">							 
										<label class="control-label">Galeria de Imagens da Notícia<br>&nbsp;&nbsp;</label>								 
										<input type="text" id="adicionais" name="adicionais"/>
										<button type="button" class="btn" onclick="BrowseServer('','adicionais');">Adicionar Imagens</button><br>
										<small><font color="grey">*Para inserir links externos de imagens, cole as URL's nas caixas de di&#225;logo acima, separados por ponto-v&#237;rgula</font></small>
									</div>	
										 
			                        <div class="control-group">
			                           	<label class="control-label">Titulo</label>
			                           	<div class="controls">
			                               	<input class="span6 m-wrap" name="titulo" type="text" pattern=".{0,60}" required>
			                           	</div>
			                        </div>
								
			                        <div class="control-group">
		                              	<label class="control-label">Intertítulo</label>
		                              	<div class="controls">
		                                 	<textarea name="intertitulo" class="span12 m-wrap" rows="6" required /></textarea>
		                              	</div>

		                           	</div>
									
									
									<div class="control-group">
		                              	<label class="control-label">Texto</label>
		                              	<div class="controls">
		                                 	<textarea name="texto" id="texto" class="span12 m-wrap" rows="6"/></textarea>
											
											<script>
												CKEDITOR.replace( 'texto', { //custom build of CKEDITOR
													toolbar: [
														{ name: 'document', items: [  'NewPage', 'Preview',] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
														[ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ],	// Defines toolbar group without name.
																																	// Line break - next group will be placed in new line.
														{ name: 'basicstyles', items: [ 'Bold', 'Italic','Underline' ] },
														{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
														 { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv', '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
														{ name: 'links', items: [ 'Link'] },
														{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] }
														
													]
												});
																						
											</script>
											
		                              	</div>
		                           	</div>

			                        <div class="form-actions">
		                              	<button name="enviar" type="submit" class="btn blue">Enviar</button>
		                              	<button type="button" class="btn" onclick="window.location.href='noticias.php'">Cancelar</button>
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

	<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script> 
	<script type="text/javascript" src="assets/ckeditor/config.js"></script>
	<script type="text/javascript" src="assets/ckeditor/build-config.js"></script>

	<script src="assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>	
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.blockui.js"></script>
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