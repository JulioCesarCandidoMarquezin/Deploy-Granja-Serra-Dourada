<?php
class Produto extends CRUD{

protected $table = "Produto";
private $id;
private $nome;
private $descricao;
private $foto;


public function add(){
    #Sql de Inserir
    $sql = "INSERT INTO Produto (nomeProd, descricaoProd, foto) VALUES (:nomeProd, :descricaoProd, :foto)";

    #Preparar a declaração usando a classe Database
    $stmt = Database::prepare($sql);

    #atribuindo os valores aos parâmetros
    $stmt->bindParam(":nomeProd", $this->nome) ;
    $stmt->bindParam(":descricaoProd", $this->descricao) ;
    $stmt->bindParam(":foto", $this->foto) ;

    $stmt->execute();

}

public function update($campo, $id){

}

/**
 * Get the value of id
 */ 
public function getId()
{
return $this->id;
}

/**
 * Set the value of id
 *
 * @return  self
 */ 
public function setId($id)
{
$this->id = $id;

return $this;
}

/**
 * Get the value of nome
 */ 
public function getNome()
{
return $this->nome;
}

/**
 * Set the value of nome
 *
 * @return  self
 */ 
public function setNome($nome)
{
$this->nome = $nome;

return $this;
}

/**
 * Get the value of descricao
 */ 
public function getDescricao()
{
return $this->descricao;
}

/**
 * Set the value of descricao
 *
 * @return  self
 */ 
public function setDescricao($descricao)
{
$this->descricao = $descricao;

return $this;
}

/**
 * Get the value of foto
 */ 
public function getFoto()
{
return $this->foto;
}

/**
 * Set the value of foto
 *
 * @return  self
 */ 
public function setFoto($foto)
{
$this->foto = $foto;

return $this;
}
}
