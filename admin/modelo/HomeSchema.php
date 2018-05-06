<?php

    class HomeSchema{

        /**********************************************
         * Atributos da Classe                        *
         **********************************************/

            private $idHome;
            private $titulo;
            private $texto;
            private $opcao;

        /**********************************************
         * Construtor da classe                       *
         **********************************************/

            public function HomeSchema($titulo, $texto, $opcao){

                $this->titulo           = $titulo;
                $this->texto            = $texto;
                $this->opcao            = $opcao;
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
