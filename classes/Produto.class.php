<?php

require_once 'CRUD.class.php';

class Produto extends CRUD
{
    protected static string $table = "Produto";
    private int $id;
    private string $nome;
    private string $descricao;
    private string $imagem;

    public function create(): bool
    {
        $sql = "INSERT INTO " . static::$table . " (nome, descricao, imagem) VALUES (?, ?, ?)";
        $params = [
            $this->nome,
            $this->descricao,
            $this->imagem
        ];

        return Database::execute($sql, $params);
    }

    public function update(): bool
    {
        $sql = "UPDATE " . static::$table . " SET nome = ?, descricao = ?, imagem = ? WHERE id = ?";
        $params = [
            $this->nome,
            $this->descricao,
            $this->imagem,
            $this->id
        ];

        return Database::execute($sql, $params);
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
        $this->nome = $nome;
        return $this;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getImagem(): string
    {
        return $this->imagem;
    }

    public function setImagem(string $imagem): self
    {
        $this->imagem = $imagem;
        return $this;
    }
}