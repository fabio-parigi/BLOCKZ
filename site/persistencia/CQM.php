<?php

    /**********************************************
     * C.Q.M. = CargoQueryMethods                 *
     **********************************************/
	
    class CQM {

        /**********************************************
         * Construtor da classe                       *
         **********************************************/
        
            public function CQM() {
                
            }

        /**********************************************
         * Funcionalidades ligadas ao Banco de Dados  *
         **********************************************/

            /**********************************************
             * Métodos de Busca                           *
             **********************************************/

                public function BuscarCargo(&$Banco, $colunas, $statement){

                    $query = "SELECT ".$colunas." FROM cargo ".$statement.";";

                    return $Banco->getThisQuery($query);
                    
                }
    }
?>