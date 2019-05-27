
CREATE TABLE endereco (
cep varchar(9) PRIMARY KEY NOT NULL,
logradouro varchar(250),
complemento varchar(250),
bairro varchar(250),
localidade varchar(250),
uf varchar(2)
);

CREATE TABLE usuario (
cpf varchar(14) PRIMARY KEY NOT NULL,
cep varchar(9),
apelido varchar(25) NOT NULL,
nome_completo varchar(150) NOT NULL,
email varchar(250) NOT NULL,
senha varchar(25) NOT NULL,
foto_usuario varchar(150),
CONSTRAINT fk_usuario_cep FOREIGN KEY(cep) REFERENCES endereco (cep)
);

CREATE TABLE mercados (
id_mercado int PRIMARY KEY NOT NULL AUTO_INCREMENT,
cep varchar(9),
nome_mercado varchar(150),
CONSTRAINT fk_mercados_cep FOREIGN KEY(cep) REFERENCES endereco (cep)
);

CREATE TABLE produto (
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

CREATE TABLE tipo_usuario (
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
