<?php

	/**********************************************
	 * Include Persistencia de Banco de Dados	  *
	 **********************************************/

		include_once '../persistencia/Banco.php';
		include_once '../persistencia/EBQM.php';

	/**********************************************
	 * Include Modelos de Banco de Dados 		  *
	 **********************************************/

		include_once '../modelo/EditaisBaixadosSchema.php';

	class ControladorEditaisBaixados {

		/**********************************************
	 	 * Atributos da Classe 						  *
	 	 **********************************************/

			private $EBQM = NULL;

		/**********************************************
	 	 * Construtor da classe 					  *
	 	 **********************************************/

			public function ControladorEditaisBaixados() {

				$this->EBQM	= new EBQM();
			}

		/**********************************************
		 * Funcionalidades ligadas ao Banco de Dados  *
		 **********************************************/

			/**********************************************
	 		 * Métodos de Adicionar						  *
	 		 **********************************************/

				public function AdicionarEditaisBaixados(&$edital, &$Banco) {

	            	return $this->EBQM->AdicionarEditaisBaixados($edital, $Banco);
	        	}

	        /**********************************************
	 		 * Métodos de Busca 						  *
	 		 **********************************************/

				public function ListarEditaisBaixados(&$Banco){

					return $this->EBQM->BuscarEditaisBaixados($Banco);
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