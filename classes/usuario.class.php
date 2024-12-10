<?php

    // id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    // nome varchar(255) NOT NULL,
    // email varchar(255) NOT NULL,
    // nivel varchar(1) NOT NULL,
    // senha varchar(15) not NULL

#Nome do arquivo Aluno.class.php

class Aluno extends CRUD{

    protected $table = "Aluno";
    private $id;
    private $nome;
    private $email;
    private $nivel;
    private $senha;

    public function add(){
        #Sql de Inserir
        $sql = "INSERT INTO Aluno (nomeAluno, emailAluno, celularAluno, estadoCivilAluno, statusAluno, foto) VALUES (:nomeAluno, :emailAluno, :celularAluno, :estadoCivilAluno, :statusAluno, :foto)";

        #Preparar a declaração usando a classe Database
        $stmt = Database::prepare($sql);

        #atribuindo os valores aos parâmetros
        $stmt->bindParam(":nomeUsuario", $this->nome) ;
        $stmt->bindParam(":emailUsuario", $this->email) ;
        $stmt->bindParam(":nivel", $this->nivel) ;
        $stmt->bindParam(":senha", $this->senha) ;
     

        $stmt->execute();

    }

    public function update($campo, $id){
    
    }

    /**
     * Get the value of nivel
     */ 
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set the value of nivel
     *
     * @return  self
     */ 
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

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
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }
}