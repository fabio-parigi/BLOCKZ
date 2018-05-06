<?php

    /**********************************************
     * Include Modelos de Banco de Dados          *
     **********************************************/

        include_once '../modelo/AcessosSchema.php';

    /**********************************************
     * E.B.Q.M. = AcessosQueryMethods                *
     **********************************************/

    class EBQM {

        /**********************************************
         * Construtor da classe                       *
         **********************************************/
        
            public function EBQM() {
                
            }

        /**********************************************
         * Funcionalidades ligadas ao Banco de Dados  *
         **********************************************/
			
            /**********************************************
             * Métodos de Busca                           *
             **********************************************/

                public function BuscarAcessos(&$Banco){
                    
                   $query = "SELECT * FROM Acessos"; 
                    
                    return $Banco->getThisQuery($query);
                    
                }

            /**********************************************
             * Método de Deletar - Não requisitado        *
             **********************************************/

    }
?>