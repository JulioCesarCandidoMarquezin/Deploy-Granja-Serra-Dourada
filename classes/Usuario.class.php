<?php

require_once 'CRUD.class.php';
require_once 'Nivel.enum.php';

class Usuario extends CRUD
{

    protected static string $table = "Usuario";
    protected static array $columns = [
        'nome' => 'VARCHAR(50)',
        'email' => 'VARCHAR(255)',
        'nivel' => 'ENUM("administrador", "gerente", "funcionario")',
        'senha' => 'VARCHAR(255)'
    ];

    private ?int $id = null;
    private string $nome;
    private string $email;
    private Nivel $nivel;
    private string $senha;

    public function create(): void
    {
        $fields = ['nome', 'email', 'nivel', 'senha'];
        $values = [$this->nome, $this->email, $this->nivel->value, $this->senha];
        $params = $values;

        $fieldsList = implode(", ", $fields);
        $valuesList = implode(", ", array_fill(0, count($values), "?"));

        $sql = "INSERT INTO " . static::$table . " ($fieldsList) VALUES ($valuesList)";

        self::execute($sql, $params);
    }

    public function getNivel(): Nivel
    {
        return $this->nivel;
    }

    public function setNivel(Nivel $nivel): self
    {
        $this->nivel = $nivel;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): self
    {
        $this->senha = $senha;
        return $this;
    }
}