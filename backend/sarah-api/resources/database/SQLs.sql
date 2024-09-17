-- Criação da tabela marcas
CREATE TABLE marcas (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome TEXT NOT NULL,
    descricao TEXT
);

-- Criação da tabela produtos
CREATE TABLE produtos (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fk_marca INT NOT NULL,
    nome TEXT NOT NULL,
    is_destaque BOOLEAN NOT NULL DEFAULT FALSE,
    preco FLOAT NOT NULL,
    FOREIGN KEY (fk_marca) REFERENCES marcas(id)
);

-- Criação da tabela imagens
CREATE TABLE imagens (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome TEXT NOT NULL,
    path TEXT NOT NULL,
    checksum TEXT NOT NULL
);

-- Criação da tabela categorias
CREATE TABLE categorias (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome TEXT NOT NULL,
    descricao TEXT
);

-- Criação da tabela imagens_produtos
CREATE TABLE imagens_produtos (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fk_imagem INT NOT NULL,
    fk_produto INT NOT NULL,
    FOREIGN KEY (fk_imagem) REFERENCES imagens(id),
    FOREIGN KEY (fk_produto) REFERENCES produtos(id)
);

-- Criação da tabela imagens_categorias
CREATE TABLE imagens_categorias (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fk_imagem INT NOT NULL,
    fk_categoria INT NOT NULL,
    FOREIGN KEY (fk_imagem) REFERENCES imagens(id),
    FOREIGN KEY (fk_categoria) REFERENCES categorias(id)
);

-- Criação da tabela promocoes
CREATE TABLE promocoes (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fk_produto INT NOT NULL,
    dt_inicio TIMESTAMP NOT NULL,
    dt_fim TIMESTAMP,
    vl_percentual FLOAT NOT NULL,
    vl_absoluto FLOAT NOT NULL,
    FOREIGN KEY (fk_produto) REFERENCES produtos(id)
);

-- Criação da tabela produtos_categorias
CREATE TABLE produtos_categorias (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fk_produto INT NOT NULL,
    fk_categoria INT NOT NULL,
    FOREIGN KEY (fk_produto) REFERENCES produtos(id),
    FOREIGN KEY (fk_categoria) REFERENCES categorias(id)
);

-- Criação da tabela medidas
CREATE TABLE medidas (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    completo TEXT NOT NULL,
    sigla TEXT NOT NULL,
    comprimento FLOAT,
    largura FLOAT,
    altura FLOAT
);

-- Criação da tabela estoques
CREATE TABLE estoques (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fk_produto INT NOT NULL,
    fk_medida INT NOT NULL,
    fk_caracteristica_produto INT NOT NULL,
    quantidade INT NOT NULL,
    maximo INT NOT NULL,
    minimo INT NOT NULL,
    ponto_pedido INT,
    FOREIGN KEY (fk_produto) REFERENCES produtos(id),
    FOREIGN KEY (fk_medida) REFERENCES medidas(id),
    FOREIGN KEY (fk_caracteristica_produto) REFERENCES caracteristicas_produtos(id)
);

-- Criação da tabela formas_pagamentos
CREATE TABLE formas_pagamentos (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tipo TEXT NOT NULL,
    descricao TEXT NOT NULL
);

-- Criação da tabela pedidos
CREATE TABLE pedidos (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fk_pessoa INT NOT NULL,
    fk_endereco INT NOT NULL,
    observacao TEXT,
    dt_pedido TIMESTAMP,
    dt_entrega TIMESTAMP,
    dt_cancelamento TIMESTAMP,
    FOREIGN KEY (fk_pessoa) REFERENCES pessoas(id),
    FOREIGN KEY (fk_endereco) REFERENCES enderecos(id)
);

-- Criação da tabela pagamentos
CREATE TABLE pagamentos (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fk_pedido INT NOT NULL,
    fk_forma_pagamento INT NOT NULL,
    valor FLOAT NOT NULL,
    FOREIGN KEY (fk_pedido) REFERENCES pedidos(id),
    FOREIGN KEY (fk_forma_pagamento) REFERENCES formas_pagamentos(id)
);

-- Criação da tabela pedidos_produtos
CREATE TABLE pedidos_produtos (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fk_pedido INT NOT NULL,
    fk_produto INT NOT NULL,
    quantidade INT,
    FOREIGN KEY (fk_pedido) REFERENCES pedidos(id),
    FOREIGN KEY (fk_produto) REFERENCES produtos(id)
);

-- Criação da tabela usuarios
CREATE TABLE usuarios (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fk_pessoa INT NOT NULL,
    username TEXT NOT NULL,
    senha TEXT NOT NULL,
    FOREIGN KEY (fk_pessoa) REFERENCES pessoas(id)
);

-- Criação da tabela pessoas
CREATE TABLE pessoas (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome TEXT NOT NULL,
    telefone TEXT,
    email TEXT
);

-- Criação da tabela pessoas_fisicas
CREATE TABLE pessoas_fisicas (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fk_pessoa INT NOT NULL,
    cpf TEXT NOT NULL,
    genero TEXT,
    dt_nascimento DATE,
    FOREIGN KEY (fk_pessoa) REFERENCES pessoas(id)
);

-- Criação da tabela pessoas_juridicas
CREATE TABLE pessoas_juridicas (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fk_pessoa BIGINT NOT NULL,
    cnpj TEXT NOT NULL,
    razao_social TEXT NOT NULL,
    nome_fantasia TEXT NOT NULL,
    FOREIGN KEY (fk_pessoa) REFERENCES pessoas(id)
);

-- Criação da tabela enderecos
CREATE TABLE enderecos (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cep INT NOT NULL,
    numero TEXT,
    rua TEXT,
    completo TEXT
);

-- Criação da tabela pessoas_enderecos
CREATE TABLE pessoas_enderecos (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fk_pessoa INT,
    fk_endereco INT,
    FOREIGN KEY (fk_pessoa) REFERENCES pessoas(id),
    FOREIGN KEY (fk_endereco) REFERENCES enderecos(id)
);

-- Criação da tabela caracteristicas_produtos
CREATE TABLE caracteristicas_produtos (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fk_produto INT NOT NULL,
    fk_medida INT NOT NULL,
    cor INT NOT NULL,
    FOREIGN KEY (fk_produto) REFERENCES produtos(id),
    FOREIGN KEY (fk_medida) REFERENCES medidas(id)
);
