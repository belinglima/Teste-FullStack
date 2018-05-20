<?php

require_once 'DB.php';

abstract class CrudFamilia extends DB {
    
    protected $tabela;
    public $nome;
    public $membros;
    
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getNome() {
        return $this->nome;
    }
        
    public function setMembros($membros) {
        $this->membros = $membros;
    }
    public function getMembros() {
        return $this->membros;
    }
    
}
  
