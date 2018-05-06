<?php

	/**********************************************
	 * Include Persistencia de Banco de Dados	  *
	 **********************************************/

		include_once '../persistencia/Banco.php';
		include_once '../persistencia/HQM.php';

	/**********************************************
	 * Include Modelos de Banco de Dados 		  *
	 **********************************************/

		include_once '../modelo/HomeSchema.php';

	class ControladorHome {

		/**********************************************
	 	 * Atributos da Classe 						  *
	 	 **********************************************/

			private $HQM = NULL;

		/**********************************************
	 	 * Construtor da classe 					  *
	 	 **********************************************/

			public function ControladorHome() {

				$this->HQM	= new HQM();
			}

		/**********************************************
		 * Funcionalidades ligadas ao Banco de Dados  *
		 **********************************************/

	        /**********************************************
	 		 * Métodos de Busca 						  *
	 		 **********************************************/

				public function ListarHome(&$Banco, $filtro){
					
					$colunas = "titulo, texto, opcao";
		        	$statement = "";
									
					return $this->HQM->ListarHome($Banco, $colunas, $statement);
				}

			/**********************************************
	 		 * Métodos de Busca 						  *
	 		 **********************************************/

				public function EditarHome(&$Banco, &$Postagem, $idPostagem){
					
					$query = 	"UPDATE `home` 
									SET `titulo`	= '".$Postagem->get('titulo')."',
										`texto`		= '".$Postagem->get('texto')."',
										`opcao`		= ".$Postagem->get('opcao')."
								 WHERE `idHome`	= ".$idPostagem;

					return $this->HQM->EditarHome($Banco, $query);
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