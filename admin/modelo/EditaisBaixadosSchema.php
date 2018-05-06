<?php

    class EditaisBaixadosSchema{

        /**********************************************
         * Atributos da Classe                        *
         **********************************************/

            //private $idDoc;  auto-incremental no banco
            private $nome;
            private $data;
            private $situacao;
			

        /**********************************************
         * Construtor da classe                       *
         **********************************************/

            public function EditaisBaixadosSchema($nome,$data,$situacao){

                $this->nome = $nome;
                $this->data = $data;
                $this->situacao = $dsituacao;
				
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
