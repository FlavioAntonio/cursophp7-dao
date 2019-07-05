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
            $this->setData($results[0]);
        }
    }



public static function getList(){
    $sql = new Sql();

    return $sql->select("SELECT * FROM funcionario ORDER BY dlogin;");
}
public static function search($login){
    $sql = new Sql();

    return $sql->select("SELECT * FROM funcionario WHERE dlogin LIKE :SEARCH ORDER BY dlogin", array(
        ':SEARCH'=>"%".$login."%"
    ));
}

public function login($login, $password){

    $sql = new Sql();
    $results = $sql->select("SELECT * FROM funcionario WHERE dlogin =:DLOGIN AND senha = :DPASSWORD", array(
        "DLOGIN"=>$login,
        "DPASSWORD"=>$password
    ));

    if(count($results) > 0){
      $this->setData($results[0]);
   
    }else{
        throw new Exception("Login e/ou senha Invalidos");
    }
    
}

public function setData($data){
       
        $this->setIdfuncionario($data['idfuncionario']);
        $this->setNome($data['nome']);
        $this->setDlogin($data['dlogin']);
        $this->setSenha($data['senha']);
        $this->setDataCadastro(new DateTime($data['dataCadastro']));
}

public function insert(){
    $sql = new Sql();

    $results = $sql->select("CALL sp_funcionario_insert(:NOME, :LOGIN, :PASSWORD)", array(
        ':NOME'=>$this->getNome(),
        ':LOGIN'=>$this->getDlogin(),
        ':PASSWORD'=>$this->getSenha()
    ));

    if(count($results)>0){
        $this->setData($results[0]);
    }
}

public function __construct($nome ="", $login ="", $password =""){
    $this->setNome($nome);
    $this->setDlogin($login);
    $this->setSenha($password);
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