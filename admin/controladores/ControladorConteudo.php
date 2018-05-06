<?php

	/**********************************************
	 * Include Persistencia de Banco de Dados	  *
	 **********************************************/

		include_once '../persistencia/Banco.php';
		include_once '../persistencia/NQM.php';

	/**********************************************
	 * Include Modelos de Banco de Dados 		  *
	 **********************************************/

		include_once '../modelo/NoticiaSchema.php';

	class ControladorNoticia {

		/**********************************************
	 	 * Atributos da Classe 						  *
	 	 **********************************************/

			private $NQM = NULL;

		/**********************************************
	 	 * Construtor da classe 					  *
	 	 **********************************************/

			public function ControladorNoticia() {

				$this->NQM	= new NQM();
			}

		/**********************************************
		 * Funcionalidades ligadas ao Banco de Dados  *
		 **********************************************/

			/**********************************************
	 		 * Métodos de Adicionar						  *
	 		 **********************************************/

				public function AdicionarNoticia(&$Noticia, &$Banco) {

	            	return $this->NQM->AdicionarNoticia($Noticia, $Banco);
	        	}

	       
				
			/**********************************************
	 		 * Métodos de Busca 						  *
	 		 **********************************************/

				public function EditarNoticia(&$Banco, &$Noticia, $idnoticia){
					
					$query = 	"UPDATE `noticias` 
									SET `titulo`	       		= '".$Noticia->get('titulo')."',
										`texto`	        		= '".$Noticia->get('texto')."',
										`intertitulo`			= '".$Noticia->get('intertitulo')."',
										`imgdestaque`		 	= '".$Noticia->get('imgdestaque')."',
										`imggaleria`	    	= '".$Noticia->get('imggaleria')."',
										`datapublicacao`		= '".$Noticia->get('datapublicacao')."'
										
								 WHERE  `id`    	= ".$idnoticia;
									//`datacriacao`    		= '".$Noticia->get('datacriacao')."'    ####não se alterará a data de criação
									
					return $this->NQM->EditarNoticia($Banco, $query);
				}


				public function ListarNoticias(&$Banco){

					return $this->NQM->ListarNoticias($Banco);
				}

				public function BuscarNoticia(&$Banco,$filtro){

					return $this->NQM->BuscarNoticia($Banco,$filtro);
				}

	        /**********************************************
	 		 * Método de Deletar						  *
	 		 **********************************************/

				public function DeletarNoticia($idNoticia, &$Banco) {

	            	return $this->NQM->DeletarNoticia($idNoticia, $Banco);
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