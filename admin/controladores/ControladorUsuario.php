<?php

	/**********************************************
	 * Include Persistencia de Banco de Dados	  *
	 **********************************************/

		include_once '../persistencia/Banco.php';
		include_once '../persistencia/UQM.php';

	/**********************************************
	 * Include Modelos de Banco de Dados 		  *
	 **********************************************/

		include_once '../modelo/UsuarioSchema.php';

	class ControladorUsuario {

		/**********************************************
	 	 * Atributos da Classe 						  *
	 	 **********************************************/
			
			private $UQM 		= null;

		/**********************************************
	 	 * Construtor da classe 					  *
	 	 **********************************************/
			
			public function ControladorUsuario() {

				$this->UQM 		= new UQM();
			}

		/**********************************************
		 * Funcionalidades ligadas ao Banco de Dados  *
		 **********************************************/

			/**********************************************
	 		 * Mйtodos de Adicionar						  *
	 		 **********************************************/

				public function AdicionarUsuario(&$NovoUsuario, &$Banco) {

					return $this->UQM->AdicionarUsuario($NovoUsuario, $Banco);
				}				

	        /**********************************************
	 		 * Mйtodos de Busca 						  *
	 		 **********************************************/	

				public function ListarUsuario(&$Banco, $filtro){

					$colunas	= "	usuario.idUsuario, usuario.login";
					//$statement	= "	INNER JOIN cargo C ON usuario.idCargoFK 		= C.idCargo".$filtro;
			
					//return $this->UQM->BuscarUsuario($Banco, $colunas, $statement);
					$statement	= "   ";  //nгo hб joins para fazer no momento

					return $this->UQM->BuscarUsuario($Banco, $colunas, $statement);
				}

				public function BuscarUsuario(&$Banco, $login){

					$colunas	= "login";
					$statement	= "WHERE login = '".$login."'";

					return $this->UQM->BuscarUsuario($Banco, $colunas, $statement);
				}

				public function BuscarDadosUsuario(&$Banco, $idUsuario){

					$colunas	= "*";
					$statement	= "WHERE idUsuario = ".$idUsuario."";

					return $this->UQM->BuscarUsuario($Banco, $colunas, $statement);
				}

	        /**********************************************
	 		 * Mйtodo de Deletar						  *
	 		 **********************************************/
	        
				public function DeletarUsuario($idUsuario, $Banco){

					return $this->UQM->DeletarUsuario($idUsuario, $Banco);
				}

	        /**********************************************
	 		 * Mйtodo de Editar						  	  *
	 		 **********************************************/

				public function EditarUsuario(&$Banco, &$usuario){

					return $this->UQM->AlterarUsuario($usuario, $Banco);
				}

				public function EditarUsuarioSSenha(&$Banco, &$usuario){

					return $this->UQM->AlterarUsuarioSSenha($usuario, $Banco);
				}

			/**********************************************
	 		 * Alternativos 							  *
	 		 **********************************************/

				public function AutenticaUsuario($login, $senha, &$Banco) {

					$this->Usuario = new UsuarioSchema($login, $senha);
			
					if(!$this->UQM->AutenticaUsuario($this->Usuario, $Banco)){
						
						$this->Usuario = null;
						
						return FALSE;
					}else{
						
						return TRUE;
					}
				}

				

				/*public function BuscaridNivel(&$Banco, $idUsuario){   funзгo nгo serб necessбria enquanto nгo houver nнveis de usuario

					$colunas	= "idCargoFK";
					$statement	= "WHERE idUsuario = ".$idUsuario."";

					$resultado = $this->UQM->BuscarUsuario($Banco, $colunas, $statement);
					
					if($linha = $resultado->fetch_assoc()){
						
						return $linha['idCargoFK'];
					}
				}*/

				public function NomeUser(){

					return $this->Usuario->get('login');
				}

				/*public function idCargo(){  funзгo nгo serб necessбria enquanto nгo houver nнveis de usuario

					return $this->Usuario->get('idCargoFK');
				}*/

				

				public function idUsuario(){

					return $this->Usuario->get('idUsuario');
				}

		/********************************************************************************************
         * Mйtodos 'get' e 'set' moldбveis.															*
         * Й possнvel pegar e setar o valor de qualquer variбvel apenas digitando o nome e o valor. *
         ********************************************************************************************/
	        public function set($variavel, $valor){
	            $this->$variavel = $valor;
	        }
	        public function get($variavel){
	            return $this->$variavel;
	        }
	}
?>