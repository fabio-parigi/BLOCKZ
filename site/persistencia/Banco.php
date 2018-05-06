<?php

    class Banco {

        /**********************************************
         * Atributos da Classe                        *
         **********************************************/

            private $host   = "localhost";
            private $schema = "adm_fabio";
            private $user   = "root";
            private $pass   = "123!@#";
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
    }
?>
