CREATE TABLE IF NOT EXISTS usuarios_administrativos (
    id SERIAL PRIMARY KEY,
    login VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS avaliacoes (
    id SERIAL PRIMARY KEY,
    id_setor INT NOT NULL,
    id_pergunta INT NOT NULL,
    id_dispositivo INT NOT NULL,
    resposta INT NOT NULL CHECK (resposta >= 0 AND resposta <= 10),
    feedback TEXT,
    data_avaliacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_setor) REFERENCES setores(id),
    FOREIGN KEY (id_pergunta) REFERENCES perguntas(id),
    FOREIGN KEY (id_dispositivo) REFERENCES dispositivos(id)
);

CREATE TABLE IF NOT EXISTS dispositivos (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    status VARCHAR(50) DEFAULT 'ativo'
);

CREATE TABLE IF NOT EXISTS setores (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS perguntas (
    id SERIAL PRIMARY KEY,
    texto TEXT NOT NULL,
    status VARCHAR(50) DEFAULT 'ativa'
);
