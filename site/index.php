<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
    /**********************************************
     * Include Controladores de Página	          *
     **********************************************/
		
		include_once 'controladores/paginas.php';
		//include_once 'controladores/ControladorHome.php';
		include_once 'controladores/ControladorAvisos.php';
		

    /**********************************************
     * Include Persistência          			  *
     **********************************************/

		include_once 'persistencia/Banco.php';

	/**********************************************
	 * 			FIM DO SERVER SIDE			 	  *
	 **********************************************/

	$Banco 						= new Banco();
	$Pagina 					= new Paginas();
	//$ControladorHome			= new ControladorHome();
	$ControladorAvisos 			= new ControladorAvisos();
				
			
		
	

 ?>

<!DOCTYPE html>
<!--[if lte IE 8]>
<meta http-equiv="refresh" content="0;url=suporte.html">
<![endif]-->

	<head>
		<!-- head 
		<?php  $Pagina->head(); ?>
			<link href="css/hoverbutton.css" rel="stylesheet" />
		<!-- head -->
	</head>

	<body>

			
		<div class="row">
			
			<div class="large-6 columns">
				<?php include_once('contador.php'); ?>	
				<br><br> Avisos aos colaboradores:<br>				
				<?php include_once('avisos.php'); ?>	
				
	        	</div> <!--/Div 6 columns   -->
				
	        			
		  </div>  <!--/Div Row   -->	
			   
		
	</body>
</html>



	