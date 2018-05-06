<?php

    class UsuarioSchema{

        /**********************************************
         * Atributos da Classe                        *
         **********************************************/

            private $idUsuario;
            private $login;
            private $senha;
  
       

        /**********************************************
         * Construtor da classe                       *
         **********************************************/

            public function UsuarioSchema($login, $senha){

                $this->login = $login;
                $this->senha = $senha;
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
