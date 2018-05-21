<?php

/**
 * Description
 *
 * @author Salomão Lima
 */

require_once 'CrudFamilia.php';

class Familias extends CrudFamilia {
    
    protected $tabela = 'tbl_familia';
      
    public function findAll() {
        $sql = "SELECT * FROM $this->tabela";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } 
    
    public function insert() {
        $sql = "INSERT INTO $this->tabela (nome, membros) VALUES (:nome, :membros)";
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':membros', $this->membros);
        return $stmt->execute();
    }
    
    public function update($id) {
        $sql = "UPDATE $this->tabela SET nome = :nome, membros = :membros WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':membros', $this->membros);
        return $stmt->execute();
    }
    
    public function delete($id) {
        $sql = "DELETE FROM $this->tabela WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
}
