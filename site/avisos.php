<div align = "center">
	<?php 
		$DadosAvisos = $ControladorAvisos->BuscarAvisos($Banco);
		echo $DadosAvisos->get('texto');

	?>
</div> 