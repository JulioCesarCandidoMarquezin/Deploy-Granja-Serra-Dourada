<?php

try {
    $dsn = "pgsql:host=dpg-cthckg9opnds73b27ic0-a.oregon-postgres.render.com;port=5432;dbname=granja_serra_dourada";
    $username = "granja_serra_dourada_user";
    $password = "XrAuvQhiE2WJeoXnnrh4F1VAd0KQCgmB";

    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    // $sql = "
    // CREATE TABLE Usuario (
    //     id SERIAL PRIMARY KEY,
    //     nome VARCHAR(255) NOT NULL,
    //     email VARCHAR(255) UNIQUE NOT NULL,
    //     senha VARCHAR(255) NOT NULL,
    //     nivel VARCHAR(20) NOT NULL CHECK (nivel IN ('administrador', 'gerente', 'funcionario'))
    // );

    // CREATE TABLE Produto (
    //     id SERIAL PRIMARY KEY,
    //     nome VARCHAR(255) NOT NULL,
    //     descricao VARCHAR(255),
    //     imagem VARCHAR(255)
    // );
    // ";

    $sql = "
    INSERT INTO Usuario (nome, email, senha, nivel) VALUES ('Júlio', 'roberto@gmail.com', 'roberto', 'administrador');
    ";
    // $sql = "UPDATE Usuario SET senha = 'julio' WHERE id = 1";
    $pdo->exec($sql);
    echo "Tabelas criadas com sucesso!";

    // $sql = "SELECT * FROM Usuario WHERE email = 'julio@gmail'";
    // $return = $pdo->query($sql);
    // $return = $return->fetch(PDO::FETCH_ASSOC);
    // print_r($return); 
} catch (PDOException $e) {
    echo "Erro ao conectar ou criar tabelas: " . $e->getMessage();
}
