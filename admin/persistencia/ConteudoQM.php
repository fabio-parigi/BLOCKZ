<?php

    /**********************************************
     * Include Modelos de Banco de Dados          *
     **********************************************/

        include_once '../modelo/Conteudochema.php';

    /**********************************************
     * N.Q.M. = ConteudoQueryMethods                *
     **********************************************/

    class NQM {

        /**********************************************
         * Construtor da classe                       *
         **********************************************/
        
            public function NQM() {
                
            }

        /**********************************************
         * Funcionalidades ligadas ao Banco de Dados  *
         **********************************************/

            /**********************************************
             * Métodos de Adicionar                       *
             **********************************************/

                public function AdicionarConteudo(&$Conteudo, &$Banco) {
                    
                    $query = "INSERT INTO `Conteudo`(`titulo`, `texto`, `intertitulo`, `datacriacao`,`datapublicacao`,`imgdestaque`, `imggaleria`) VALUES  ('".$Conteudo->get('titulo')."','".$Conteudo->get('texto')."','".$Conteudo->get('intertitulo')."','".$Conteudo->get('datacriacao')."','".$Conteudo->get('datapublicacao')."','".$Conteudo->get('imgdestaque')."','".$Conteudo->get('imggaleria')."')";

                    return $Banco->QueryThis($query);
                }

            /**********************************************
             * Métodos de Busca                           *
             **********************************************/


                public function BuscarConteudo(&$Banco,$filtro){

				   		$query = 	"SELECT * FROM Conteudo ".$filtro;

                    return $Banco->getThisQuery($query);
                    
                }
				
                public function ListarConteudo(&$Banco){

				   		$query = "SELECT * FROM Conteudo order by datapublicacao desc";
                    
                    return $Banco->getThisQuery($query);
                    
                }
				
				
            /**********************************************
             * Métodos de Editar                          *
             **********************************************/

                public function EditarConteudo(&$Banco, $query){
                    
                    return $Banco->getThisQuery($query);
                    
                }

            /**********************************************
             * Método de Deletar                          *
             **********************************************/

                public function DeletarConteudo($idConteudo, &$Banco) {

                    $query = "DELETE FROM Conteudo WHERE id = ".$idConteudo;

                   return $Banco->QueryThis($query);
				   
                }
    }
?>