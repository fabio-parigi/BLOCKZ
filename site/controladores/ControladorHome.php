<?php

	/**********************************************
	 * Include Persistencia de Banco de Dados	  *
	 **********************************************/

		include_once 'persistencia/Banco.php';
		include_once 'persistencia/HQM.php';

	class ControladorHome {

		private $HQM;

			public function ControladorHome() {
				$this->HQM = new HQM();
			}

		/**********************************************
		 * Funcionalidades ligadas ao Banco de Dados  *
		 **********************************************/
		
	        /**********************************************
	 		 * Métodos de Busca 						  *
	 		 **********************************************/

				public function ListarHome(&$Banco, $filtro){
					
					$colunas = "idHome, titulo, texto, opcao";
		        	$statement = "";

					return $this->HQM->ListarHome($Banco, $colunas, $statement);
				}

				public function ListarOpcao(&$Banco){
					
					$colunas = "opcao";
		        	$statement = " WHERE idHome = 1";

					return $this->HQM->ListarHome($Banco, $colunas, $statement);
				}

	}
?>