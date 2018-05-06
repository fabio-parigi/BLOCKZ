<div align="center" class="footer_div">
			    	
			    	<img src="img/foot1.png" align="center"><br />

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
	                document.formInfo.info.value = id;
	                document.formInfo.submit();
	        	}
        	</script>
			
			<script type="text/javascript">
				function AbrirPostagem(id){
	                document.formPostagem.p.value = id;
	                document.formPostagem.submit();
	        	}
        	</script>
			
			<script type="text/javascript">
				function AbrirPasta(id){
	                document.formPastas.pid.value = id;
	                document.formPastas.submit();
	        	}
        	</script>
			
			
			
		<script type="text/javascript">
			<!--
			function redirectTo(sUrl) {
			window.location.replace = sUrl
			}
			//-->
			</script>

				
		<!-- Java Script -->