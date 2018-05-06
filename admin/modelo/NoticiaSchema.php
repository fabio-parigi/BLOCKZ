<?php

    class NoticiaSchema{

        /**********************************************
         * Atributos da Classe                        *
         **********************************************/

			
            private $idnoticia;
			private $titulo;
            private $texto;
			private $intertitulo;
			private $datacriacao;
			private $datapublicacao;
			private $imgdestaque;
			private $imggaleria;

            
            

        /**********************************************
         * Construtor da classe                       *
         **********************************************/

            public function NoticiaSchema($titulo,$texto,$intertitulo,$datacriacao,$datapublicacao,$imgdestaque,$imggaleria){

                $this->titulo           = $titulo;
                $this->texto            = $texto;
                $this->intertitulo      = $intertitulo;
                $this->datacriacao      = $datacriacao;
				$this->datapublicacao   = $datapublicacao;
                $this->imgdestaque      = $imgdestaque;
				$this->imggaleria       = $imggaleria;
				
			
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
