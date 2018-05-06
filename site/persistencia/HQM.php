<?php

    /**********************************************
     * H.Q.M. = HOMEQueryMethods                *
     **********************************************/

    class HQM {

        /**********************************************
         * Construtor da classe                       *
         **********************************************/
        
            public function HQM() {
                
            }

        /**********************************************
         * Funcionalidades ligadas ao Banco de Dados  *
         **********************************************/

            /**********************************************
             * Métodos de Busca                           *
             **********************************************/

                public function ListarHome(&$Banco, $colunas, $statment){
                    
                    $query = "SELECT ".$colunas." FROM home ".$statment;
                    
                    return $Banco->getThisQuery($query);
                    
                }
    }
?>