<?php

require_once 'DB.php';

abstract class CrudGuerra extends DB {

    protected $tabela;

    public $desafiadora;
    public $desafiada;
    public $inicio;
    public $fim;
    public $vencedora;


    public function getDesafiadora()
    {
        return $this->desafiadora;
    }

    public function setDesafiadora($desafiadora)
    {
        $this->desafiadora = $desafiadora;

        return $this;
    }

    public function getDesafiada()
    {
        return $this->desafiada;
    }

    public function setDesafiada($desafiada)
    {
        $this->desafiada = $desafiada;

        return $this;
    }

    public function getInicio()
    {
        return $this->inicio;
    }

    public function setInicio($inicio)
    {
        $this->inicio = $inicio;

        return $this;
    }

    public function getFim()
    {
        return $this->fim;
    }

    public function setFim($fim)
    {
        $this->fim = $fim;

        return $this;
    }

    public function getVencedora()
    {
        return $this->vencedora;
    }

    public function setVencedora($vencedora)
    {
        $this->vencedora = $vencedora;

        return $this;
    }
}

