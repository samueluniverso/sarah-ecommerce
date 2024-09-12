-- Tabela produtos
CREATE TABLE produtos (
    id BIGINT NOT NULL DEFAULT nextval('produtos_id_seq'),
    fk_marca INT NOT NULL,
    nome TEXT NOT NULL,
    is_destaque BOOLEAN NOT NULL DEFAULT FALSE,
    preco FLOAT NOT NULL,
    PRIMARY KEY (id)
);

-- Tabela imagens
CREATE TABLE imagens (
    id BIGINT NOT NULL DEFAULT nextval('imagens_id_seq'),
    nome TEXT NOT NULL,
    path TEXT NOT NULL,
    checksum TEXT NOT NULL,
    PRIMARY KEY (id)
);

-- Tabela imagens_produtos
CREATE TABLE imagens_produtos (
    id BIGINT NOT NULL DEFAULT nextval('imagens_produtos_id_seq'),
    fk_imagem INT NOT NULL,
    fk_produto INT NOT NULL,
    PRIMARY KEY (id)
);

-- Tabela imagens_categorias
CREATE TABLE imagens_categorias (
    id BIGINT NOT NULL DEFAULT nextval('imagens_categorias_id_seq'),
    fk_imagem INT NOT NULL,
    fk_categoria INT NOT NULL,
    PRIMARY KEY (id)
);

-- Tabela marcas
CREATE TABLE marcas (
    id BIGINT NOT NULL DEFAULT nextval('marcas_id_seq'),
    nome TEXT NOT NULL,
    descricao TEXT,
    PRIMARY KEY (id)
);

-- Tabela promocoes
CREATE TABLE promocoes (
    id BIGINT NOT NULL DEFAULT nextval('promocoes_id_seq'),
    fk_produto INT NOT NULL,
    dt_inicio TIMESTAMP NOT NULL,
    dt_fim TIMESTAMP,
    vl_percentual FLOAT NOT NULL,
    vl_absoluto FLOAT NOT NULL,
    PRIMARY KEY (id)
);

-- Tabela categorias
CREATE TABLE categorias (
    id BIGINT NOT NULL DEFAULT nextval('categorias_id_seq'),
    nome TEXT NOT NULL,
    descricao TEXT,
    PRIMARY KEY (id)
);

-- Tabela produtos_categorias
CREATE TABLE produtos_categorias (
    id BIGINT NOT NULL DEFAULT nextval('produtos_categorias_id_seq'),
    fk_produto INT NOT NULL,
    fk_categoria INT NOT NULL,
    PRIMARY KEY (id)
);

-- Tabela estoques
CREATE TABLE estoques (
    id BIGINT NOT NULL DEFAULT nextval('estoques_id_seq'),
    fk_produto INT NOT NULL,
    fk_medida INT NOT NULL,
    quantidade INT NOT NULL,
    maximo INT NOT NULL,
    minimo INT NOT NULL,
    ponto_pedido INT,
    PRIMARY KEY (id)
);

-- Tabela formas_pagamentos
CREATE TABLE formas_pagamentos (
    id BIGINT NOT NULL DEFAULT nextval('formas_pagamentos_id_seq'),
    tipo TEXT NOT NULL,
    descricao TEXT NOT NULL,
    PRIMARY KEY (id)
);

-- Tabela pagamentos
CREATE TABLE pagamentos (
    id BIGINT NOT NULL DEFAULT nextval('pagamentos_id_seq'),
    fk_pedido INT NOT NULL,
    fk_forma_pagamento INT NOT NULL,
    valor FLOAT NOT NULL,
    PRIMARY KEY (id)
);

-- Tabela pedidos
CREATE TABLE pedidos (
    id BIGINT NOT NULL DEFAULT nextval('pedidos_id_seq'),
    fk_pessoa INT NOT NULL,
    fk_endereco INT NOT NULL,
    observacao TEXT,
    dt_pedido TIMESTAMP,
    dt_entrega TIMESTAMP,
    dt_cancelamento TIMESTAMP,
    PRIMARY KEY (id)
);

-- Tabela pedidos_produtos
CREATE TABLE pedidos_produtos (
    id BIGINT NOT NULL DEFAULT nextval('pedidos_produtos_id_seq'),
    fk_pedido INT NOT NULL,
    fk_produto INT NOT NULL,
    quantidade INT,
    PRIMARY KEY (id)
);

-- Tabela medidas
CREATE TABLE medidas (
    id BIGINT NOT NULL DEFAULT nextval('medidas_id_seq'),
    completo TEXT NOT NULL,
    sigla TEXT NOT NULL,
    comprimento FLOAT,
    largura FLOAT,
    altura FLOAT,
    PRIMARY KEY (id)
);

-- Tabela usuarios
CREATE TABLE usuarios (
    id BIGINT NOT NULL DEFAULT nextval('usuarios_id_seq'),
    fk_pessoa INT NOT NULL,
    username TEXT NOT NULL,
    senha TEXT NOT NULL,
    PRIMARY KEY (id)
);

-- Tabela pessoas
CREATE TABLE pessoas (
    id BIGINT NOT NULL DEFAULT nextval('pessoas_id_seq'),
    nome TEXT NOT NULL,
    telefone TEXT,
    email TEXT,
    PRIMARY KEY (id)
);

-- Tabela pessoas_fisicas
CREATE TABLE pessoas_fisicas (
    id BIGINT NOT NULL DEFAULT nextval('pessoas_fisicas_id_seq'),
    fk_pessoa BIGINT NOT NULL,
    cpf TEXT NOT NULL,
    genero TEXT CHECK (genero IN ('Masc', 'Fem', 'Outros')),
    dt_nascimento DATE,
    PRIMARY KEY (id),
    FOREIGN KEY (fk_pessoa) REFERENCES pessoas(id)
);

-- Tabela pessoas_juridicas
CREATE TABLE pessoas_juridicas (
    id BIGINT NOT NULL DEFAULT nextval('pessoas_juridicas_id_seq'),
    fk_pessoa BIGINT NOT NULL,
    cnpj TEXT NOT NULL,
    razao_social TEXT NOT NULL,
    nome_fantasia TEXT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (fk_pessoa) REFERENCES pessoas(id)
);

-- Tabela enderecos
CREATE TABLE enderecos (
    id BIGINT NOT NULL DEFAULT nextval('enderecos_id_seq'),
    cep INT NOT NULL,
    numero TEXT,
    rua TEXT,
    completo TEXT,
    PRIMARY KEY (id)
);

-- Tabela pessoas_enderecos
CREATE TABLE pessoas_enderecos (
    id BIGINT NOT NULL DEFAULT nextval('pessoas_enderecos_id_seq'),
    fk_pessoa INT,
    fk_endereco INT,
    PRIMARY KEY (id),
    FOREIGN KEY (fk_pessoa) REFERENCES pessoas(id),
    FOREIGN KEY (fk_endereco) REFERENCES enderecos(id)
);

