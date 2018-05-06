<?php


	/**********************************************
	 * Include Persistencia de Banco de Dados	  *
	 **********************************************/

		include_once './persistencia/Banco.php';
		include_once './persistencia/AQM.php';

	/**********************************************
	 * Include Modelos de Banco de Dados 		  *
	 **********************************************/

		include_once './modelos/AvisosSchema.php';

	class ControladorAvisos {

		/**********************************************
	 	 * Atributos da Classe 						  *
	 	 **********************************************/

			private $AQM = NULL;

		/**********************************************
	 	 * Construtor da classe 					  *
	 	 **********************************************/

			public function ControladorAvisos() {

				$this->AQM	= new AQM();
			}

		/**********************************************
		 * Funcionalidades ligadas ao Banco de Dados  *
		 **********************************************/

			/**********************************************
	 		 * Não possui Métodos de Alterar Por ser Front  *
	 		 **********************************************/

			/**********************************************
	 		 * Alternativos 			  *
	 		 **********************************************/

		        public function BuscarAvisos(&$Banco) {

		        	$colunas = "*";

		            $resultado = $this->AQM->BuscarAvisos($Banco, $colunas);

		            if($linha = $resultado->fetch_assoc()){

		            	$Avisos = new AvisosSchema($linha['texto']);

		            	return $Avisos;
					}else{

						return FALSE;
					}
		        }
		/********************************************************************************************
         * Métodos 'get' e 'set' moldáveis.															*
         * É possível pegar e setar o valor de qualquer variável apenas digitando o nome e o valor. *
         ********************************************************************************************/
		
	        public function set($variavel, $valor){
	            $this->$variavel = $valor;
	        }
	        public function get($variavel){
	            return $this->$variavel;
	        }

	}
?>