<?php

require_once 'CRUD.class.php';

class Produto extends CRUD
{
    protected static string $table = "Produto";
    protected static array $columns = [
        'nome' => 'VARCHAR(50)',
        'descricao' => 'TEXT',
        'imagem' => 'VARCHAR(255)',
    ];

    private int $id;
    private string $nome;
    private string $descricao;
    private string $imagem;

    public function create(): void
    {
        if (empty($this->nome) || empty($this->descricao) || empty($this->imagem)) {
            throw new InvalidArgumentException("All fields must be set before creating a product.");
        }

        $fields = ['nome', 'descricao', 'imagem'];
        $values = [$this->nome, $this->descricao, $this->imagem];
        $params = $values;

        $fieldsList = implode(", ", $fields);
        $valuesList = implode(", ", array_fill(0, count($values), "?"));

        $sql = "INSERT INTO " . static::$table . " ($fieldsList) VALUES ($valuesList)";
        self::execute($sql, $params);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        if ($id <= 0) {
            throw new InvalidArgumentException("ID must be a positive integer.");
        }
        $this->id = $id;
        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        if (empty($nome)) {
            throw new InvalidArgumentException("Name cannot be empty.");
        }
        $this->nome = $nome;
        return $this;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        if (empty($descricao)) {
            throw new InvalidArgumentException("Description cannot be empty.");
        }
        $this->descricao = $descricao;
        return $this;
    }

    public function getImagem(): string
    {
        return $this->imagem;
    }

    public function setImagem(string $imagem): self
    {
        if (empty($imagem)) {
            throw new InvalidArgumentException("Image path cannot be empty.");
        }
        $this->imagem = $imagem;
        return $this;
    }
}