<?php

    /**********************************************
     * Include Modelos de Banco de Dados          *
     **********************************************/

        include_once './modelos/AvisosSchema.php';

    /**********************************************
     * R.Q.M. = AvisosQueryMethods                *
     **********************************************/

    class AQM {

        /**********************************************
         * Construtor da classe                       *
         **********************************************/
        
            public function AQM() {
                
            }

        /**********************************************
         * Funcionalidades ligadas ao Banco de Dados  *
         **********************************************/


            /**********************************************
             * Métodos de Busca                           *
             **********************************************/

                public function BuscarAvisos(&$Banco, $colunas){
                    
                    $query = "SELECT ".$colunas." FROM avisos WHERE idAvisos = 1";

                    return $Banco->getThisQuery($query);
                    
                }
    }
?>