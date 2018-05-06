<?php

    class Banco {

        /**********************************************
         * Atributos da Classe                        *
         **********************************************/
            private $host   = "127.0.0.1";
            private $schema = "sistemacatraca";
            private $user   = "root";
            private $pass   = "";
            private $mysqli = NULL;

        /**********************************************
         * Construtor da classe                       *
         **********************************************/

            public function Banco() {

            }

        /**********************************************
         * Funcionalidades ligadas ao Banco de Dados  *
         **********************************************/

            /**********************************************
             * Métodos de Conexão                         *
             **********************************************/

                public function Connect() {

                    $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->schema);
                }

                public function CloseConnection() {
                
                    $this->mysqli->close();
                }

                public function ExplodeConnection(){
                    
                    unset($this->mysqli);
                }

            /**********************************************
             * Métodos de Busca                           *
             **********************************************/

                public function QueryThis($query){
                    $this->Connect();

                    if($this->mysqli->query($query)){

                        $this->CloseConnection();
                        return  TRUE;

                    }else{

                        $this->CloseConnection();
                        return FALSE;

                    } 
                }
				
				public function QueryThisID($query){
                    $this->Connect();

                    if($this->mysqli->query($query)){
						$id = $this->mysqli->insert_id;
                        $this->CloseConnection();
                        return  $id;

                    }else{

                        $this->CloseConnection();
                        return FALSE;

                    } 
                }

                public function getThisQuery($query){
                    $this->Connect();

                    if($result = $this->mysqli->query($query)){
                        
                        $this->CloseConnection();
                        return $result;

                    }else{

                        $this->CloseConnection();
                        return FALSE;

                    }
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
