<?php

    /**********************************************
     * Include Modelos de Banco de Dados          *
     **********************************************/

        include_once 'modelos/EditaisBaixadosSchema.php';

    /**********************************************
     * E.B.Q.M. = EditaisBaixadosQueryMethods                *
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
             * Métodos de Adicionar                       *
             **********************************************/

                public function AdicionarEditalBaixado(&$edital, &$Banco) {
                    
					$query = "INSERT INTO editaisbaixados (nome,cpf,ddd,telefone,email,empresa,datahora,documentobaixado) VALUES ('".$edital->get('nome')."','".$edital->get('cpf')."','".$edital->get('ddd')."','".$edital->get('telefone')."','".$edital->get('email')."','".$edital->get('empresa')."','".$edital->get('data')."','".$edital->get('documentobaixado')."')";
					
                    return $Banco->QueryThis($query);
                }
    }
?>