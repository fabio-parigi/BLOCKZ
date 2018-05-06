<?php 

    /**********************************************
     * Include Controladores de Página	          *
     **********************************************/
		
		include_once 'controladores/paginas.php';
		include_once 'controladores/ControladorBanner.php';
		include_once 'controladores/ControladorRodape.php';
		include_once 'controladores/ControladorSponsor.php';
		include_once 'controladores/ControladorSubMenu.php';
		include_once 'controladores/ControladorPostagem.php';
		include_once 'controladores/ControladorInfoCidade.php';
		include_once 'controladores/ControladorSecretaria.php';
		include_once 'controladores/ControladorLateralDireita.php';

    /**********************************************
     * Include Persistência          			  *
     **********************************************/

		include_once 'persistencia/Banco.php';

	/**********************************************
	 * 			FIM DO SERVER SIDE			 	  *
	 **********************************************/

	$Banco 						= new Banco();
	$Pagina 					= new Paginas();
	$ControladorBanner 			= new ControladorBanner();
	$ControladorRodape			= new ControladorRodape();
	$ControladorSponsor 		= new ControladorSponsor();
	$ControladorSubMenu 		= new ControladorSubMenu();
	$ControladorPostagem		= new ControladorPostagem();
	$ControladorInfoCidade 		= new ControladorInfoCidade();
	$ControladorSecretaria 		= new ControladorSecretaria();
	$ControladorLateralDireita 	= new ControladorLateralDireita();

	if(isset($_POST['info'])){
		if(is_numeric($_POST['info'])){
			$InfoCidadeTexto = $ControladorInfoCidade->BuscarInfoCidade($Banco, $_POST['info']);
		}else header('Location: index.php');
	}else header('Location: index.php');
 ?>

<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR"> <!--<![endif]-->

	<head>
		<!-- head -->
		<?php  $Pagina->head(); ?>
		<!-- head -->
	</head>

	<body>
		<div style="background:URL(img/Figura2.gif) repeat-x center; position:relative; width:100%; height:450px; margin-top:-10px;" align=center>
			<a href="index.php">
				<img src="img/Figura3.png" width="456px" height="70px"> 
			</a>
			
			<!-- BANNER ROTATIVO -->
					<?php include_once('banner.php'); ?>	
			<!-- BANNER ROTATIVO -->
			
		</div>

		<div class="row">

			<!-- FORM SECRETARIA -->
				<form name="formSecretaria" type="hidden"  action="index.php" method="post"/>
					<input type="hidden" name="idsecretaria" value="">
					<input type="hidden" name="Sinf" value="">
					<input type="hidden" name="Ssup" value="">
				</form>
			<!-- FORM SECRETARIA -->
			
			<!-- FORM INFORMAÇÕES -->
				<form name="formInfo" type="hidden"  action="info.php" method="post"/>
					<input type="hidden" name="info" value="">
				</form>
			<!-- FORM INFORMAÇÕES -->

			<!-- FORM POSTAGENS -->
			<form name="formPostagem" type="hidden"  action="postagem.php" method="post"/>
				<input type="hidden" name="p" value="">
			</form>
			<!-- FORM POSTAGENS -->
			
			<!-- FORM PASTAS -->
			<form name="formPastas" type="hidden"  action="pastas.php" method="post"/>
				<input type="hidden" name="pid" value="">
			</form>
			<!-- FORM PASTAS -->
			
			

			<!-- LATERAL ESQUERDA -->
					<?php include_once('lateralesquerda.php'); ?>	
			<!-- LATERAL ESQUERDA -->
			

	        <div class="large-6 columns">
	        	<div class="panel">
	        		<center>
	        			<?php 
	        				
	        				$variavel = $InfoCidadeTexto;

	        				if ($Resultado = $variavel->fetch_assoc()) {

	        					echo 	"<div align=\"left\"  class=\"layert\">";

	        						echo $Resultado['nomelink'];

	        						echo	"</div>
					        				<hr />  <!-- spacer -->
										<div align=\"justify\" class=\"layerte\">
					        				".$Resultado['texto']."<br /><br />
					        				<br /><br />
					        			</div>";


	        				}else header('Location: index.php');
	        			 ?>
	        			<br /><br />

	        		</center>
	        	</div>
	        </div>

	        <!--LATERAL DIREITA -->	
	        <?php include_once('lateraldireita.php'); ?>	   
		
	  </div>  <!--Não apagar este /div  -->	
		   

		<!-- MAPA DO SITE E RODAPÉ -->	   
		<?php include_once('mapa.php'); ?>	   
			   
		
		
	</body>
</html>



	