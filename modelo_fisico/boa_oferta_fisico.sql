
CREATE TABLE enderecos (
cep varchar(9) PRIMARY KEY NOT NULL,
logradouro varchar(250) NOT NULL,
complemento varchar(250),
bairro varchar(250) NOT NULL,
localidade varchar(250) NOT NULL,
uf varchar(2) NOT NULL
);


CREATE TABLE usuarios (
cpf varchar(14) PRIMARY KEY NOT NULL,
cep_usuario varchar(9),
apelido varchar(25) NOT NULL,
nome_completo varchar(150) NOT NULL,
email varchar(250) NOT NULL,
senha varchar(25) NOT NULL,
foto_usuario varchar(150),
CONSTRAINT fk_usuario_cep FOREIGN KEY(cep_usuario) REFERENCES endereco (cep)
);

CREATE TABLE mercados (
id_mercado int PRIMARY KEY NOT NULL AUTO_INCREMENT,
cep_mercado varchar(9),
nome_mercado varchar(150),
CONSTRAINT fk_mercados_cep FOREIGN KEY(cep_mercado) REFERENCES endereco (cep)
);

CREATE TABLE produtos (
id_produto int PRIMARY KEY NOT NULL AUTO_INCREMENT,
cpf varchar(14),
id_mercado int,
foto_produto varchar(150),
nome_produto varchar(50),
data_cadastro varchar(10),
preco varchar(25),
CONSTRAINT fk_produto_cpf FOREIGN KEY(cpf) REFERENCES usuario (cpf)
);

CREATE TABLE categorias (
id_categoria int PRIMARY KEY NOT NULL AUTO_INCREMENT,
nome_categoria varchar(50)
);

CREATE TABLE tipo_usuarios (
id_tipo int PRIMARY KEY NOT NULL AUTO_INCREMENT,
descricao_tipo varchar(250)
);

CREATE TABLE cat_prod (
id_categoria int,
id_produto int,
CONSTRAINT fk_cat_prod_id_categoria FOREIGN KEY(id_categoria) REFERENCES categorias (id_categoria),
CONSTRAINT fk_cat_prod_id_produto FOREIGN KEY(id_produto) REFERENCES produto (id_produto)
);

CREATE TABLE tip_user (
id_tipo int,
cpf varchar(14),
CONSTRAINT fk_tip_user_id_tipo FOREIGN KEY(id_tipo) REFERENCES tipo_usuario (id_tipo),
CONSTRAINT fk_tip_user_cpf FOREIGN KEY(cpf) REFERENCES usuario (cpf)
);
