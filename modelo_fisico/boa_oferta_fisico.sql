CREATE TABLE tipo_usuarios (
id_tipo int PRIMARY KEY NOT NULL AUTO_INCREMENT,
descricao_tipo varchar(250)
);

CREATE TABLE estados (
id_estado int PRIMARY KEY NOT NULL AUTO_INCREMENT,
nome_estado varchar(150) NOT NULL,
sigla_estado varchar(2) NOT NULL
);

CREATE TABLE cidades (
id_cidade int PRIMARY KEY NOT NULL AUTO_INCREMENT,
nome_cidade varchar(150),
fk_id_estado int,
CONSTRAINT fk_cidade_id_estado FOREIGN KEY(fk_id_estado) REFERENCES estados (id_estado)
);


CREATE TABLE bairros (
id_bairro int PRIMARY KEY NOT NULL AUTO_INCREMENT,
fk_id_cidade int,
nome_bairro varchar(150),
CONSTRAINT fk_bairro_id_cidade FOREIGN KEY(fk_id_cidade) REFERENCES cidades (id_cidade)
);

CREATE TABLE ruas (
id_rua int PRIMARY KEY NOT NULL AUTO_INCREMENT,
fk_id_bairro int,
nome_rua varchar(150),
CONSTRAINT fk_endereco_id_bairro FOREIGN KEY(fk_id_bairro) REFERENCES bairros (id_bairro)
);

CREATE TABLE usuarios (
cpf varchar(14) PRIMARY KEY NOT NULL,
apelido varchar(25) NOT NULL,
nome_completo varchar(150) NOT NULL,
email varchar(250) NOT NULL,
senha varchar(25) NOT NULL,
foto_usuario varchar(150),
fk_id_rua_user int NOT NULL,
fk_id_tipo int NOT NULL,
CONSTRAINT fk_usuario_id_rua FOREIGN KEY(fk_id_rua_user) REFERENCES ruas (id_rua),
CONSTRAINT fk_id_tipo FOREIGN KEY(fk_id_tipo) REFERENCES tipo_usuarios (id_tipo)
);

CREATE TABLE categorias (
id_categoria int PRIMARY KEY NOT NULL AUTO_INCREMENT,
nome_categoria varchar(50),
foto_categoria varchar(150)
);


CREATE TABLE mercados (
id_mercado int PRIMARY KEY NOT NULL AUTO_INCREMENT,
nome_mercado varchar(150)
);



CREATE TABLE produtos (
id_produto int PRIMARY KEY NOT NULL AUTO_INCREMENT,
fk_cpf varchar(14),
fk_id_mercado int,
fk_id_categoria int,
foto_produto varchar(150),
nome_produto varchar(50),
data_cadastro varchar(10),
data_visu varchar(10),
preco varchar(25),
curtida varchar(5),
descurtida varchar(5),
CONSTRAINT fk_produto_cpf FOREIGN KEY(fk_cpf) REFERENCES usuarios (cpf),
CONSTRAINT fk_produto_id_mercado FOREIGN KEY(fk_id_mercado) REFERENCES mercados (id_mercado),
CONSTRAINT fk_produto_id_categoria FOREIGN KEY(fk_id_categoria) REFERENCES categorias (id_categoria)
);

CREATE TABLE cat_prod (
id_categoria int,
id_produto int,
CONSTRAINT fk_cat_prod_id_categoria FOREIGN KEY(id_categoria) REFERENCES categorias (id_categoria),
CONSTRAINT fk_cat_prod_id_produto FOREIGN KEY(id_produto) REFERENCES produtos (id_produto)
);

CREATE TABLE tip_user (
id_tipo int,
cpf varchar(14),
CONSTRAINT fk_tip_user_id_tipo FOREIGN KEY(id_tipo) REFERENCES tipo_usuarios (id_tipo),
CONSTRAINT fk_tip_user_cpf FOREIGN KEY(cpf) REFERENCES usuarios (cpf)
);

CREATE TABLE suporte (
id_suporte int PRIMARY KEY NOT NULL AUTO_INCREMENT,
desc_suporte varchar(250) NOT NULL,
fk_cpf_sup varchar(14) NOT NULL,
CONSTRAINT fk_cpf_sup FOREIGN KEY(fk_cpf_sup) REFERENCES usuarios (cpf)
);

CREATE TABLE curtidas (
fk_id_prod_curt int NOT NULL,
fk_cpf_curt varchar(14) NOT NULL,
CONSTRAINT fk_id_prod_curt FOREIGN KEY(fk_id_prod_curt) REFERENCES produtos (id_produto),
CONSTRAINT fk_cpf_curt FOREIGN KEY(fk_cpf_curt) REFERENCES usuarios (cpf)
);

CREATE TABLE descurtidas (
fk_id_prod_desc int NOT NULL,
fk_cpf_desc varchar(14) NOT NULL,
CONSTRAINT fk_id_prod_desc FOREIGN KEY(fk_id_prod_desc) REFERENCES produtos (id_produto),
CONSTRAINT fk_cpf_desc FOREIGN KEY(fk_cpf_desc) REFERENCES usuarios (cpf)
);






INSERT INTO tipo_usuarios (id_tipo, descricao_tipo) values
(1, 'Administrador'),
(2, 'Convencional'),
(3, 'Banido');



 Insert Into estados (sigla_estado,nome_estado) Values('AC','Acre');  
 Insert Into estados (sigla_estado,nome_estado) Values('AL','Alagoas');  
 Insert Into estados (sigla_estado,nome_estado) Values('AM','Amazonas');
 Insert Into estados (sigla_estado,nome_estado) Values('AP','Amapá');
 Insert Into estados (sigla_estado,nome_estado) Values('BA','Bahia');
 Insert Into estados (sigla_estado,nome_estado) Values('CE','Ceará');
 Insert Into estados (sigla_estado,nome_estado) Values('DF','Distrito Federal');
 Insert Into estados (sigla_estado,nome_estado) Values('ES','Espírito Santo');
 Insert Into estados (sigla_estado,nome_estado) Values('GO','Goiás');
 Insert Into estados (sigla_estado,nome_estado) Values('MA','Maranhão');
 Insert Into estados (sigla_estado,nome_estado) Values('MG','Minas Gerais');
 Insert Into estados (sigla_estado,nome_estado) Values('MS','Mato Grosso do Sul');
 Insert Into estados (sigla_estado,nome_estado) Values('MT','Mato Grosso');
 Insert Into estados (sigla_estado,nome_estado) Values('PA','Pará');
 Insert Into estados (sigla_estado,nome_estado) Values('PB','Paraíba');
 Insert Into estados (sigla_estado,nome_estado) Values('PE','Pernambuco');
 Insert Into estados (sigla_estado,nome_estado) Values('PI','Piauí');
 Insert Into estados (sigla_estado,nome_estado) Values('PR','Paraná');
 Insert Into estados (sigla_estado,nome_estado) Values('RJ','Rio de Janeiro');
 Insert Into estados (sigla_estado,nome_estado) Values('RN','Rio Grande do Norte');
 Insert Into estados (sigla_estado,nome_estado) Values('RO','Rondônia');
 Insert Into estados (sigla_estado,nome_estado) Values('RR','Roraima');
 Insert Into estados (sigla_estado,nome_estado) Values('RS','Rio Grande do Sul');
 Insert Into estados (sigla_estado,nome_estado) Values('SC','Santa Catarina');
 Insert Into estados (sigla_estado,nome_estado) Values('SE','Sergipe');
 Insert Into estados (sigla_estado,nome_estado) Values('SP','São Paulo');
 Insert Into estados (sigla_estado,nome_estado) Values('TO','Tocantins');

INSERT INTO cidades (nome_cidade,fk_id_estado) Values
('Abdon Batista',24),
('Abelardo Luz',24),
('Araquari',24),
('Balneário Barra do Sul',24),
('Balneário Camboriú',24),
('Balneário Gaivota',24),
('Bandeirante',24),
('Barra Bonita',24),
('Barra Velha',24),
('Bela Vista do Toldo',24),
('Belmonte',24),
('Benedito Novo',24),
('Biguaçu',24),
('Blumenau',24),
('Bocaina do Sul',24),
('Bom Jardim da Serra',24),
('Brusque',24),
('Caçador',24),
('Chapecó',24),
('Cocal do Sul',24),
('Concórdia',24),
('Cordilheira Alta',24),
('Coronel Freitas',24),
('Coronel Martins',24),
('Correia Pinto',24),
('Corupá',24),
('Criciúma',24),
('Cunha Porã',24),
('Cunhataí',24),
('Curitibanos',24),
('Descanso',24),
('Dionísio Cerqueira',24),
('Dona Emma',24),
('Doutor Pedrinho',24),
('Entre Rios',24),
('Ermo',24),
('Erval Velho',24),
('Faxinal dos Guedes',24),
('Flor do Sertão',24),
('Florianópolis',24),
('Herval d`Oeste',24),
('Ibiam',24),
('Ibicaré',24),
('Ibirama',24),
('Içara',24),
('Ilhota',24),
('Imaruí',24),
('Imbituba',24),
('Imbuia',24),
('Indaial',24),
('Iomerê',24),
('Ipira',24),
('Iporã do Oeste',24),
('Ipuaçu',24),
('Ipumirim',24),
('Iraceminha',24),
('Irani',24),
('Irati',24),
('Irineópolis',24),
('Itá',24),
('Itaiópolis',24),
('Itajaí',24),
('Itapema',24),
('Jaraguá do Sul',24),
('Joinville',24),
('Mafra',24),
('Palhoça',24),
('Passo de Torres',24),
('Passos Maia',24),
('Paulo Lopes',24),
('Pedras Grandes',24),
('Penha',24),
('Peritiba',24),
('Petrolândia',24),
('Piçarras',24),
('Pomerode',24),
('São Francisco do Sul',24),
('Sombrio',24),
('Tijucas',24),
('Xavantina',24),
('Xaxim',24),
('Zortéa',24);


INSERT INTO bairros (nome_bairro, fk_id_cidade) Values
('Adhemar Garcia',(select id_cidade from cidades where nome_cidade = 'Joinville')),
('América',(select id_cidade from cidades where nome_cidade = 'Joinville')),
('Anita Garibaldi',(select id_cidade from cidades where nome_cidade = 'Joinville')), 
('Atiradores',(select id_cidade from cidades where nome_cidade = 'Joinville')),
('Aventureiro',(select id_cidade from cidades where nome_cidade = 'Joinville')),
('Boa Vista',(select id_cidade from cidades where nome_cidade = 'Joinville')),
('Boehmerwald',(select id_cidade from cidades where nome_cidade = 'Joinville')),
('Bom Retiro',(select id_cidade from cidades where nome_cidade = 'Joinville')),
('Bucarein',(select id_cidade from cidades where nome_cidade = 'Joinville')),
('Centro',(select id_cidade from cidades where nome_cidade = 'Joinville')),
('Comasa',(select id_cidade from cidades where nome_cidade = 'Joinville')),
('Costa e Silva',(select id_cidade from cidades where nome_cidade = 'Joinville')), 
('Dona Francisca',(select id_cidade from cidades where nome_cidade = 'Joinville')),
('Espinheiros',(select id_cidade from cidades where nome_cidade = 'Joinville')),
('Fátima',(select id_cidade from cidades where nome_cidade = 'Joinville')), 
('Floresta',(select id_cidade from cidades where nome_cidade = 'Joinville')), 
('Glória',(select id_cidade from cidades where nome_cidade = 'Joinville')), 
('Guanabara',(select id_cidade from cidades where nome_cidade = 'Joinville')), 
('Iririú',(select id_cidade from cidades where nome_cidade = 'Joinville')), 
('Itaum',(select id_cidade from cidades where nome_cidade = 'Joinville')),
('Itinga',(select id_cidade from cidades where nome_cidade = 'Joinville')), 
('Jardim Iririú',(select id_cidade from cidades where nome_cidade = 'Joinville')), 
('Jardim Paraíso',(select id_cidade from cidades where nome_cidade = 'Joinville')), 
('Jardim Sofia',(select id_cidade from cidades where nome_cidade = 'Joinville')), 
('Jarivatuba',(select id_cidade from cidades where nome_cidade = 'Joinville')), 
('Paranaguamirim',(select id_cidade from cidades where nome_cidade = 'Joinville')), 
('Petrópolis',(select id_cidade from cidades where nome_cidade = 'Joinville')), 
('Pirabeiraba Centro',(select id_cidade from cidades where nome_cidade = 'Joinville')),
('Profipo',(select id_cidade from cidades where nome_cidade = 'Joinville')), 
('Rio Bonito',(select id_cidade from cidades where nome_cidade = 'Joinville')), 
('Saguaçu',(select id_cidade from cidades where nome_cidade = 'Joinville')), 
('Piraí',(select id_cidade from cidades where nome_cidade = 'Joinville')),
('Morro do Amaral',(select id_cidade from cidades where nome_cidade = 'Joinville')),
('Quirirí',(select id_cidade from cidades where nome_cidade = 'Joinville')),
('Enceada',(select id_cidade from cidades where nome_cidade = 'São Francisco do Sul')),
('Enseada',(select id_cidade from cidades where nome_cidade = 'São Francisco do Sul')),
('Patrimônio',(select id_cidade from cidades where nome_cidade = 'São Francisco do Sul')),
('Patrimônio Histórico',(select id_cidade from cidades where nome_cidade = 'São Francisco do Sul')),
('Paulas',(select id_cidade from cidades where nome_cidade = 'São Francisco do Sul')),
('Pérola',(select id_cidade from cidades where nome_cidade = 'São Francisco do Sul')),
('Praia do Ervino',(select id_cidade from cidades where nome_cidade = 'São Francisco do Sul')),
('Praia dos Ingleses',(select id_cidade from cidades where nome_cidade = 'São Francisco do Sul')),
('Praia Ervino',(select id_cidade from cidades where nome_cidade = 'São Francisco do Sul')),
('Praia Grande',(select id_cidade from cidades where nome_cidade = 'São Francisco do Sul')),
('Praia Paulas',(select id_cidade from cidades where nome_cidade = 'São Francisco do Sul')),
('Vila da Glória',(select id_cidade from cidades where nome_cidade = 'São Francisco do Sul')),
('Areia Pequena',(select id_cidade from cidades where nome_cidade = 'Araquari')),
('Areias Pequenas',(select id_cidade from cidades where nome_cidade = 'Araquari')),
('Barra do Sul',(select id_cidade from cidades where nome_cidade = 'Araquari')),
('Barra Itapocu',(select id_cidade from cidades where nome_cidade = 'Araquari')),
('Colégio Agrícola',(select id_cidade from cidades where nome_cidade = 'Araquari')),
('Itinga',(select id_cidade from cidades where nome_cidade = 'Araquari')),
('Porto Grande',(select id_cidade from cidades where nome_cidade = 'Araquari'));

INSERT INTO ruas (fk_id_bairro, nome_rua) Values 
(1, 'Av. Alvino Hansen'),
(20, 'Rua Inácio de Oliveira'),
(20, 'Rua Teresópolis'),
(39, 'Rua Cândido Silva'),
(21, 'Rua Adele Hille'),
(9, 'Av. Getúlio Vargas'),
(9, 'Rua Cel. Francisco Gomes');

INSERT INTO usuarios (nome_completo,apelido,email,senha,cpf,fk_id_rua_user, fk_id_tipo ) values 
('Jhonny James','jhon','jj.s.a.o@gmail.com','wudLGDOR','124.976.009-70', '1', '2'),
('admin','adm','admin@gmail.com','admin123','123.456.789-98', '2', '2'),
('Tommy Taffy','tom','toninho005@gmail.com','pgDnm3F1','123.456.951-10', '1', '2'),
('Michael Jackson','mika','rusbe@gmail.com','senha123','156.324.789-45', '1', '2'), 
('Denver Duley','den','DeDmonster@gmail.com','4DfM1P6C','456.789.321-56', '1', '2'), 
('Michelangelo Roly','ang','michelroly@gmai.com','Jqht3d8w','798.456.123-05', '1', '2'), 
('Marcos Marcelo','marc','mmprofessor@gmail.com','JMGtkL6O','852.369.741-12', '1', '2'), 
('Marlos Marcos','marlo','marcosM@outlook.com','s6UzAjHm','957.153-456-30', '1', '2'), 
('Vinicius dos Santos','vini','TCCnaoVouFazer@yahoo.com','JrORX7dI','789.456.125-13', '1', '2'), 
('Gilberto Filho','gamer','Gilberzf@gmail.com','oqXPQu93','856.951.321-22', '2', '2'), 
('Joao Wandall','jojo','skyrimOnline@gmail.com','mkFdjXFM','591.345.625-01', '1', '2');


INSERT INTO categorias (nome_categoria, foto_categoria) Values
('Carboidratos', 'carboidratos.jpg'),
('Verduras e Legumes', 'verd_leg.jpg'),
('Frutas', 'frutas.jpeg'),
('Leite e derivados', 'leite_deriv.jpeg'),
('Carnes e Ovos', 'carnes_ovos.jpeg'),
('Leguminosas e oleag.', 'leg_oleag.jpg'),
('Óleos e Gorduras', 'oleos_gord.png'),
('Açúcares e Doces', 'doces.jpg');


INSERT INTO mercados (nome_mercado) Values 
('Grupo Pão de Açúcar'),
('Carrefour'),
('Walmart(BIG)'),
('Ceconsud'),
('Zaffari'),
('Irmãos Muffato'),
('Condor Super Center'),
('Supermercados BH'),
('Sonda Supermercado'),
('Angeloni'),
('DMA Distribuidoras'),
('SDB Comércio de Alimentos'),
('Y. Yamada'),
('Coop'),
('Savegnago'),
('Líder Comércio e Indústria'),
('Carvalho e Fernandes'),
('Multi Formato Distribuidora'),
('Supermercado Zona Sul'),
('Comercial Zaragoza'),
('AM/PM comestível'),
('Giassi & Cia'),
('Supermercado Bahamas'),
('Companhia Sulamericana'),
('Supermercados Irmãos Lopes'),
('Supermercado Nordestão'),
('Unidasul Distribuidora Alimentícia'),
('Formosa Supermercados'),
('Hortigil'),
('D’Avó Supermercados'),
('Empresa Baiana de Alimentos'),
('Adição Distribuidora Express'),
('Realmar Distribuidora'),
('Intercontinental Com. de Alimentos'),
('Atakarejo'),
('Jad Zogheib e Cia'),
('Covabra Supermercados'),
('Nazaré Comércio de Alimentos'),
('Latuf Cury e Rocha'),
('Supermercados Vianense'),
('Supermercados Imperatriz'),
('Paulo e Maio Supermercados'),
('Mercado Torre e Jacarepaguá'),
('Bonanza Supermercados'),
('Enxuto Supermercados'),
('Casa Avenida Comércio e Importação'),
('Organização Verdemar'),
('Companhia Beal Alimentos'),
('Supermercado da Família'),
('Comercial Oswaldo Cruz');


INSERT INTO produtos (fk_cpf, fk_id_mercado, foto_produto, nome_produto, data_cadastro, data_visu, preco, fk_id_categoria, curtida, descurtida) Values 
('123.456.789-98', 1, 'maca.jpg', 'Maça Argentina', '04/12/19', '04/09/19', '3.00', 3, '10', '0'),
('856.951.321-22', 1, 'laranja1.jpg', 'Laranja Bahia', '07/11/19', '07/09/19', '1.40', 3, '5', '2'),
('856.951.321-22', 2, 'laranja1.jpg', 'Laranja Lima', '06/11/19', '10/08/19', '1.45', 3, '7', '1'),
('856.951.321-22', 1, 'laranja1.jpg', 'Laranja Vermelha', '10/11/19', '15/09/19', '1.50', 3, '5', '0'),
('856.951.321-22', 2, 'laranja1.jpg', 'Laranja Bahia', '07/11/19', '03/09/19', '1.50', 3, '1', '2'),
('856.951.321-22', 1, 'laranja1.jpg', 'Laranja Lima', '06/11/19', '08/09/19', '1.50', 3, '1', '0'),
('856.951.321-22', 1, 'laranja1.jpg', 'Laranja Seleta', '10/11/19', '25/09/19', '1.30', 3, '20', '1'),
('123.456.951-10', 1, 'iogurte.jpg', 'Iogurte Nestle', '14/03/19', '26/09/19', '2.40', 4, '35', '2');

INSERT INTO suporte (desc_suporte, fk_cpf_sup) values
('problema no software', '123.456.789-98');

INSERT INTO curtidas (fk_cpf_curt, fk_id_prod_curt) values
('123.456.789-98', '1');

INSERT INTO descurtidas (fk_cpf_desc, fk_id_prod_desc) values
('123.456.789-98', '2');