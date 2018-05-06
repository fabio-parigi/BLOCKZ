<?php

    class AvisosSchema{

        /**********************************************
         * Atributos da Classe                        *
         **********************************************/

            private $idAviso = 1;
            private $texto;

        /**********************************************
         * Construtor da classe                       *
         **********************************************/

            public function AvisosSchema($texto){

                $this->texto      = $texto;
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
