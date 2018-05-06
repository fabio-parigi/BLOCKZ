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

	if(isset($_POST['idsecretaria']) && isset($_POST['Sinf']) && isset($_POST['Ssup'])){
		
		$caso = "Secretaria";
		$filtro = 	 "WHERE idSecretariaFK = ".$_POST['idsecretaria']
					." ORDER BY idPostagem DESC"
					." LIMIT ".$_POST['Sinf'].", ".$_POST['Ssup'];

		$Postagem = $ControladorPostagem->ListarPostagem($Banco, $filtro);

	}else if(isset($_POST['idinfo'])){

		$caso = "Informacao";
		$InfoCidadeTexto = $ControladorInfoCidade->BuscarInfoCidade($Banco, $_POST['idinfo']);

	}else{

		$caso = "Geral";
		$PostagemGeral = $ControladorPostagem->ListarUltimasPostagem($Banco);

	}

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
			<a href="index-2.html">
				<img src="img/Figura3.png" width="456px" height="70px"> 
			</a>
			
			<!-- BANNER ROTATIVO -->
				<div id="mySlider" class="evoslider default">
					<dl>
						<?php 
							$ImagensBanner = $ControladorBanner->ListarBanner($Banco);
							$i = 1;
							while($resultado = $ImagensBanner->fetch_assoc()){
								echo"
										<dt>.$i.</dt>
										<dd>
											<img src=\""."../IbitingaAdmin".$resultado['caminho']."\">
										</dd>
									";
								$i++;
							}
						 ?>
					</dl>
				</div>
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
				<form name="formInfo" type="hidden"  action="index.php" method="post"/>
					<input type="hidden" name="idinfo" value="">
				</form>
			<!-- FORM INFORMAÇÕES -->

			<div class="large-3 columns">
				<!-- INFORMAÇÕES SOBRE A CIDADE -->
					<div align=center style="margin-top:50px;">
						<font class="layer">A Cidade</font>
					</div>
				<!-- INFORMAÇÕES SOBRE A CIDADE -->
				
				<hr />  <!-- spacer -->
				
				<p>
					<!-- LINKS INFORMAÇÕES -->
						<ul>
							<?php 
								$InfoCidade = $ControladorInfoCidade->ListarInfoCidade($Banco);
								while ($Resultado = $InfoCidade->fetch_assoc()) {
									echo "<a href=\"javascript:Informacoes(".$Resultado['idInfoCidade'].")\"> 
											<li class=\"bullet\">".$Resultado['nomelink']."</li> 
									 	  </a>";
								}
							 ?>
						</ul>
					<!-- LINKS INFORMAÇÕES -->
				</p>
				<div align=center style="margin-top:20px;">
					<font class="layer">Secretarias</font>
				</div> 
				
				<hr /> <!-- spacer -->
				<p>
					<!-- LINKS SECRETARIAS -->
						<ul>
							<?php 
								$Secretaria = $ControladorSecretaria->ListarSecretaria($Banco);
								while($Resultado = $Secretaria->fetch_assoc()){
									echo "<a href=\"javascript:Secretaria(".$Resultado['idSecretarias'].", 0, 5)\"> 
											<li class=\"bullet\">".$Resultado['nome']."</li> 
										 </a>";
								}
							 ?>
						</ul>
					<!-- LINKS SECRETARIAS -->
				</p>
	            
	            <?php 
	            	/**
	                 * LISTAGEM DE SPONSORS [IMAGENS DE PROPAGANDAS]
	                 */
	            	$Sponsor = $ControladorSponsor->ListarSponsor($Banco);
	             ?>

	            <!-- SPONSOR 1 -->
		            <div align=center style="margin-top:20px; margin-bottom:15px;">
		            	<?php 

		            		/**
		            		  <a href = "index8978.html?content=pages/fundo.php">
		            			<img src="img/fussi.jpg">
		            		  </a>
							*/

		            		/**
		            		 * A IMAGEM ESTÁ NA PASTA DE UPLOADS DO ADMINISTRATIVO.
		            		 * NOTE QUE EXISTE UMA CONCATENAÇÃO DE CAMINHOS ANTES DE IMPRIMIR O RESULTADO,
		            		 * ISSO ACONTECE, POIS O CAMINHO DA IMAGEM SALVO NO BD É O CAMINHO DA PASTA DO ADM+NOME_DA_FOTO,
		            		 * SENDO NA MAIORIA DOS CASOS: /LOCAL/LOCAL/NOME.JPG, POR CONTA DO SITE E O ADMINISTRATIVO FICAREM
		            		 * EM PASTAS DIFERENTES, EXISTE A NECESSIDADE DE CONCATENAR OS CAMINHOS PARA DIRECIONAR A BUSCA.
		            		 */
		            		if($Resultado = $Sponsor->fetch_assoc()){
		            			echo 	"<img src="."../IbitingaAdmin".$Resultado['caminho'].">";
		            		}
		            	 ?>
		            </div>
	            <!-- SPONSOR 1 -->
	            
	            <!-- SPONSOR 2 -->
		            <div align=center style="margin-top:00px; margin-bottom:10px;">
		            	<?php 
		            		if($Resultado = $Sponsor->fetch_assoc()){
		            			echo 	"<img src="."../IbitingaAdmin".$Resultado['caminho'].">";
		            		}
		            	 ?>
		            </div>
	            <!-- SPONSOR 2 -->

	            <?php 
	            	/**
	                 * LISTAGEM DE SUBMENUS [SUBMENUS DE LINKS EXTERNOS OU ARQUIVOS].
	                 * AS SECRETARIAS E INFORMAÇÕES DA CIDADE NÃO ENTRAM AQUI.
	                 */
	            	$SubMenu = $ControladorSubMenu->ListarSubMenu($Banco);
	             ?>

	            <!-- SUBMENU 1 -->
		            <div align=center style="margin-top:15px;">
		            	
			            <font class="layer">
			            	<?php 
			            		if($Resultado = $SubMenu->fetch_assoc()){
			            			$NomeSubMenu = $Resultado['nome'];
			            			echo $NomeSubMenu;
			            		}
			            	 ?>
			            </font>
			            <hr />  <!-- spacer -->
						<p>
							<!-- LINKS DO SUBMENU 1 -->
								<ul>
									<?php 
										$LateralDireita = $ControladorLateralDireita->ListarLateralDireita($Banco, $NomeSubMenu);
										while ($Resultado = $LateralDireita->fetch_assoc()) {
											echo "<a href = \"".$Resultado['link']."\" target=\"_blank\">
													<li class=\"bullet\">".$Resultado['lnome']."</li>
												 </a>";
										}
									 ?>
								</ul>
							<!-- LINKS DO SUBMENU 1 -->
						</p>
		            </div>
	            <!-- SUBMENU 1 -->

				<!-- SPONSOR 3 -->
					<div align=center style="margin-top:20px; margin-bottom:15px;">
						<?php 
		            		if($Resultado = $Sponsor->fetch_assoc()){
		            			echo 	"<img src="."../IbitingaAdmin".$Resultado['caminho'].">";
		            		}
		            	 ?>
					</div>
				<!-- SPONSOR 3 -->

				<!-- SPONSOR 4 -->
		            <div align=center style="margin-top:00px; margin-bottom:10px;">
		            	<?php 
		            		if($Resultado = $Sponsor->fetch_assoc()){
		            			echo 	"<img src="."../IbitingaAdmin".$Resultado['caminho'].">";
		            		}
		            	 ?>
		            </div>
	            <!-- SPONSOR 4 -->

				<!-- SUBMENU 2 -->
		            <div align=center style="margin-top:15px;">
		            	<font class="layer">
			            	<?php 
			            		if($Resultado = $SubMenu->fetch_assoc()){
			            			$NomeSubMenu = $Resultado['nome'];
			            			echo $NomeSubMenu;
			            		}
			            	 ?>
			            </font>
			            <hr />  <!-- spacer -->
			            <div align="left"  class="bullet">
			            	<!-- LINKS DO SUBMENU 2 -->
				            	<?php 
									$LateralDireita = $ControladorLateralDireita->ListarLateralDireita($Banco, $NomeSubMenu);
									while ($Resultado = $LateralDireita->fetch_assoc()) {
										echo "<a href = \"".$Resultado['link']."\" target=\"_blank\">
												".$Resultado['lnome']."
											  </a>";
									}
								 ?>
							 <!-- LINKS DO SUBMENU 2 -->
			            </div>
			        </div>
			        <div align=center style="margin-top:30px;"></div>
				<!-- SUBMENU 2 -->
			</div>

	        <div class="large-6 columns">
	        	<div class="panel">
	        		<center>
	        			<?php 

	        				if($caso == "Secretaria"){
	        					$variavel = $Postagem; //titulo
	        				}else if($caso == "Informacao"){
	        					$variavel = $InfoCidadeTexto; //nomelink

	        				}else{
	        					$variavel = $PostagemGeral;
	        				}

	        				while ($Resultado = $variavel->fetch_assoc()) {

	        					echo 	"<div align=\"left\"  class=\"layert\">";

	        					if($caso == "Informacao"){
	        						echo $Resultado['nomelink'];
	        					}else{
	        						echo $Resultado['titulo'];
	        					}

					        	echo	"</div>
					        				<hr />  <!-- spacer -->
										<div align=\"justify\" class=\"layerte\">
					        				".$Resultado['texto']."<br /><br />
					        			</div>";
	        				}
	        				if($caso == "Secretaria"){
	        					$inf = $_POST['Sinf'];
	        					$sup = $_POST['Ssup'];

	        					$ainf = $inf - 5;
	        					$asup = $sup - 5;

	        					$pinf = $inf + 5;
	        					$psup = $sup + 5;

	        					echo "	<div align=\"right\"  class=\"\">";
		        					if($ainf >= 0 && $asup >= 0){
			        					echo "<a href=\"javascript:Secretaria(".$_POST['idsecretaria'].", ".$ainf.", ".$asup.")\">Anterior</a>";
			        				}
		        				echo "&nbsp;&nbsp";
			        				if($pinf >= 0 && $psup >= 0){
			        					echo "<a href=\"javascript:Secretaria(".$_POST['idsecretaria'].", ".$pinf.", ".$psup.")\">Próximo</a>";
		        					}	
	        					echo "</div>";
	        				}
	        				

	        			 ?>
	        			<br /><br />

	        		</center>
	        	</div>
	        </div>

	        <div class="large-3 columns">
	        	<!-- SUBMENU 3 -->
		        	<div align=center style="margin-top:50px;">
		        		<font class="layer">
			        		<?php 
			            		if($Resultado = $SubMenu->fetch_assoc()){
			            			$NomeSubMenu = $Resultado['nome'];
			            			echo $NomeSubMenu;
			            		}
			             	 ?>
			        	</font>
			        	<hr />  <!-- spacer -->
			        	<p>
			        		<!-- LINKS DO SUBMENU 3 -->
				        		<ul>
									<?php 
										$LateralDireita = $ControladorLateralDireita->ListarLateralDireita($Banco, $NomeSubMenu);
										while ($Resultado = $LateralDireita->fetch_assoc()) {
											echo "<a href = \"".$Resultado['link']."\" target=\"_blank\">
													<li class=\"bullet\">".$Resultado['lnome']."</li>
												 </a>";
										}
									 ?>
				        		</ul>
			        		<!-- LINKS DO SUBMENU 3 -->
		        		</p>
		        	</div>
				<!-- SUBMENU 3 -->

	        	<!-- SPONSOR 5 -->
		        	<div align=center style="margin-top:20px; margin-bottom:15px;">
		        		<?php 
		            		if($Resultado = $Sponsor->fetch_assoc()){
		            			echo 	"<img src="."../IbitingaAdmin".$Resultado['caminho'].">";
		            		}
		            	 ?>
		        	</div>
	        	<!-- SPONSOR 5 -->

	        	<!-- SPONSOR 6 -->
		            <div align=center style="margin-top:00px; margin-bottom:15px;">
		            	<?php 
		            		if($Resultado = $Sponsor->fetch_assoc()){
		            			echo 	"<img src="."../IbitingaAdmin".$Resultado['caminho'].">";
		            		}
		            	 ?>
		            </div>
	            <!-- SPONSOR 6 -->

	            <!-- SPONSOR 7 -->
		            <div align=center style="margin-top:00px; margin-bottom:10px;">
		            	<?php 
		            		if($Resultado = $Sponsor->fetch_assoc()){
		            			echo 	"<img src="."../IbitingaAdmin".$Resultado['caminho'].">";
		            		}
		            	 ?>
		            </div>
	            <!-- SPONSOR 7 -->
			
				<!-- SUBMENU 4 -->
			        <div align=center style="margin-top:20px;">
			           	<font class="layer">
				           	<?php 
				           		if($Resultado = $SubMenu->fetch_assoc()){
				           			$NomeSubMenu = $Resultado['nome'];
				           			echo $NomeSubMenu;
				           		}
				           	 ?>
				        </font>
			           	<hr />  <!-- spacer -->
						<p>
							<!-- LINKS DO SUBMENU 4 -->
								<ul>
									<?php 
										$LateralDireita = $ControladorLateralDireita->ListarLateralDireita($Banco, $NomeSubMenu);
										while ($Resultado = $LateralDireita->fetch_assoc()) {
											echo "<a href = \"".$Resultado['link']."\" target=\"_blank\">
													<li class=\"bullet\">".$Resultado['lnome']."</li>
												 </a>";
										}
									 ?>
								</ul>
							<!-- LINKS DO SUBMENU 4 -->
						</p>
					</div>
				<!-- SUBMENU 4 -->

				<!-- SPONSOR 8 -->
					<div align=center style="margin-top:20px; margin-bottom:15px;">
						<?php 
		            		if($Resultado = $Sponsor->fetch_assoc()){
		            			echo 	"<img src="."../IbitingaAdmin".$Resultado['caminho'].">";
		            		}
		            	 ?>
					</div>
				<!-- SPONSOR 8 -->

				<!-- SPONSOR 9 -->
		            <div align=center style="margin-top:00px; margin-bottom:15px;">
		            	<?php 
		            		if($Resultado = $Sponsor->fetch_assoc()){
		            			echo 	"<img src="."../IbitingaAdmin".$Resultado['caminho'].">";
		            		}
		            	 ?>
		            </div>
	            <!-- SPONSOR 9 -->
	            
	            <!-- SPONSOR 10 -->
		            <div align=center style="margin-top:00px; margin-bottom:00px;">
		            	<?php 
		            		if($Resultado = $Sponsor->fetch_assoc()){
		            			echo 	"<img src="."../IbitingaAdmin".$Resultado['caminho'].">";
		            		}
		            	 ?>
		            </div>
	            <!-- SPONSOR 10 -->

				<!-- SUBMENU 5 -->
					<div align=center style="margin-top:20px;">
						<font class="layer">
							<?php 
			            		if($Resultado = $SubMenu->fetch_assoc()){
			            			$NomeSubMenu = $Resultado['nome'];
			            			echo $NomeSubMenu;
			            		}
			            	 ?>
						</font>
						<hr />  <!-- spacer -->
						<p>
							<!-- LINKS DO SUBMENU 5 -->
								<ul>
									<?php 
										$LateralDireita = $ControladorLateralDireita->ListarLateralDireita($Banco, $NomeSubMenu);
										while ($Resultado = $LateralDireita->fetch_assoc()) {
											echo "<a href = \"".$Resultado['link']."\" target=\"_blank\">
													<li class=\"bullet\">".$Resultado['lnome']."</li>
												 </a>";
										}
									 ?>
								</ul>
							<!-- LINKS DO SUBMENU 5 -->
						</p>
					</div>
					<div align=center style="margin-top:30px;"></div>
				<!-- SUBMENU 5 -->

				<!-- SPONSOR 11 -->
					<div align=center style="margin-top:20px; margin-bottom:00px;">
						<?php 
		            		if($Resultado = $Sponsor->fetch_assoc()){
		            			echo 	"<img src="."../IbitingaAdmin".$Resultado['caminho'].">";
		            		}
		            	 ?>
					</div>
				<!-- SPONSOR 11 -->
			</div>
		</div>

		<div class="footer_bar" >
		   <!-- RODAPE -->
			   <div align="center" class="no_bullet">
			    	<br /><br /><img src="img/foot1.png" align="center"><br />
			    	<?php 
			    		$Rodape = $ControladorRodape->BuscarRodape($Banco);

			    		if($Resultado = $Rodape->fetch_assoc()){
			    			echo $Resultado['nome']."</br>".
			    				 "Telefone ".$Resultado['DDD']." ".$Resultado['telefone']." - CNPJ ".$Resultado['CNPJ']."</br>".
			    				 $Resultado['rua'].", ".$Resultado['numero']." - ".$Resultado['bairro']." - ".$Resultado['cidade']." ".$Resultado['UF']." - CEP: ".$Resultado['CEP']." CP: ".$Resultado['CP'];

			    		}
			    	 ?>
			    </div>
		    <!-- RODAPE -->
		</div>

		<!-- Java Script -->
			<?php $Pagina->Java(); ?>
			<script type="text/javascript">
				function Secretaria(id, inferior, superior){
	                document.formSecretaria.idsecretaria.value = id;
	                document.formSecretaria.Sinf.value = inferior;
	                document.formSecretaria.Ssup.value = superior;
	                document.formSecretaria.submit();
	        	}
        	</script>
        	<script type="text/javascript">
				function Informacoes(id){
	                document.formInfo.idinfo.value = id;
	                document.formInfo.submit();
	        	}
        	</script>
		<!-- Java Script -->
	</body>
</html>



	