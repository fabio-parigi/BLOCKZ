<?php

    class EditaisBaixadosSchema{

        /**********************************************
         * Atributos da Classe                        *
         **********************************************/

            //private $idDoc;  auto-incremental no banco
            private $nome;
            private $ddd;
			private $telefone;
			private $cpf;
			private $empresa;
			private $email;
            private $data;
            private $documentobaixado;
			

        /**********************************************
         * Construtor da classe                       *
         **********************************************/

            public function EditaisBaixadosSchema($nome,$telefone,$email,$data,$documentobaixado,$cpf,$ddd,$empresa){

                $this->nome = $nome;
				$this->ddd = $ddd;
                $this->telefone = $telefone;
				$this->cpf = $cpf;
				$this->empresa = $empresa;
                $this->email = $email;
                $this->data = $data;
                $this->documentobaixado = $documentobaixado;
				
            }
        /********************************************************************************************
         * Métodos 'get' e 'set' moldáveis.                                                         *
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
