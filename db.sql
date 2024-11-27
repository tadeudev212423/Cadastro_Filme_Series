CREATE DATABASE filmes_series;

USE filmes_series;

CREATE TABLE filmes_series (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    capitulo INT NULL,
    categoria TEXT NOT NULL,
    sinopse TEXT NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
