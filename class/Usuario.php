<?php

class Usuario{
    private $idfuncionario;
    private $nome;
    private $dlogin;
    private $senha;
    private $dataCadastro;

    
    public function getIdfuncionario() {
        return $this->idfuncionario;
    }
    public function setIdfuncionario($idfuncionario){
        $this->idfuncionario = $idfuncionario;
    }

    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome)  {
        $this->nome = $nome;
    }

    public function getDlogin() {
        return $this->dlogin;
    }
    public function setDlogin($dlogin){
        $this->dlogin = $dlogin;
    }

    public function getSenha()  {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }


    public function loadByid($id){
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM funcionario WHERE idfuncionario = :ID", array(
            ":ID"=>$id
        ));

        if(count($results) > 0 ){
            $row = $results[0];
            $this->setIdfuncionario($row['idfuncionario']);
            $this->setNome($row['nome']);
            $this->setDlogin($row['dlogin']);
            $this->setDataCadastro(new DateTime($row['dataCadastro']));
        }
    }

    public function __toString(){
        return json_encode(array(
            "idfuncionario"=>$this->getIdfuncionario(),
            "nome"=>$this->getNome(),
            "dlogin"=>$this->getDlogin(),
            "senha"=>$this->getSenha(),
            "dataCadastro"=>$this->getDataCadastro()->format("d/m/y H:i:s")
));
    }
}

?>