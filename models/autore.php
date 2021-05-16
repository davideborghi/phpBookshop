<?php

class Autore{
    public $id;
    public $nome;
    public $urlFotoAutore;


    public function __construct($id, $nome, $urlFotoAutore){
        $this->id = $id;
        $this->nome = $nome;
        $this->urlFotoAutore = $urlFotoAutore;
    }
}