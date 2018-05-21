<?php

/**
 * Description
 *
 * @author Salomão Lima
 */

require_once 'CrudGuerra.php';

class Guerras extends CrudGuerra {
    
    protected $tabela = 'tbl_guerra';
    protected $tabela_familia = 'tbl_familia';

    public function findAll() {
        $sql = "SELECT * FROM $this->tabela";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function insert() {
        $sql = "INSERT INTO $this->tabela (desafiadora, desafiada, inicio, fim, vencedora) VALUES (:desafiadora, :desafiada, :inicio, :fim, :vencedora)";
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':desafiadora', $this->desafiadora);
        $stmt->bindValue(':desafiada', $this->desafiada);
        $stmt->bindValue(':inicio', $this->inicio);
        $stmt->bindValue(':fim', $this->fim);
        $stmt->bindValue(':vencedora', $this->vencedora);        
        return $stmt->execute();
    }
    
    public function update($id) {
        $sql = "UPDATE $this->tabela SET desafiadora = :desafiadora, 
                                         desafiada = :desafiada, 
                                         inicio = :inicio, 
                                         fim = :fim, 
                                         vencedora = :vencedora 
                                         WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':desafiadora', $this->desafiadora);
        $stmt->bindValue(':desafiada', $this->desafiada);
        $stmt->bindValue(':inicio', $this->inicio);
        $stmt->bindValue(':fim', $this->fim);
        $stmt->bindValue(':vencedora', $this->vencedora);        
        return $stmt->execute();
    }

   
    public function delete($id) {
        $sql = "DELETE FROM $this->tabela WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
}
