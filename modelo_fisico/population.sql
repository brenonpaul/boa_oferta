INSERT INTO usuario (nome_completo,apelido,email,senha,cpf) values ('Jhonny James','jhon','jj.s.a.o@gmail.com','wudLGDOR','12497600970'),('admin','adm','admin@gmail.com','admin','12345678998'),('Tommy Taffy','tom','toninho005@gmail.com','pgDnm3F1','12345695110'), ('Michael Jackson','mika','rusbe@gmail.com','senha123','15632478945'), ('Denver Duley','den','DeDmonster@gmail.com','4DfM1P6C','45678932156'), ('Michelangelo Roly','ang','michelroly@gmai.com','Jqht3d8w','79845612305'), ('Marcos Marcelo','marc','mmprofessor@gmail.com','JMGtkL6O','85236974112'), ('Marlos Marcos','marlo','marcosM@outlook.com','s6UzAjHm','95715345630'), ('Vinicius dos Santos','vini','TCCnaoVouFazer@yahoo.com','JrORX7dI','78945612513'), ('Gilberto Filho','gaymer','Gilberzf@gmail.com','oqXPQu93','856951321'), ('Joao Wandall','jojo','skyrimOnline@gmail.com','mkFdjXFM','59134562501');

 Insert Into estado (sigla_estado,nome_estado) Values('AC','Acre');  
 Insert Into estado (sigla_estado,nome_estado) Values('AL','Alagoas');  
 Insert Into estado (sigla_estado,nome_estado) Values('AM','Amazonas');
 Insert Into estado (sigla_estado,nome_estado) Values('AP','Amapá');
 Insert Into estado (sigla_estado,nome_estado) Values('BA','Bahia');
 Insert Into estado (sigla_estado,nome_estado) Values('CE','Ceará');
 Insert Into estado (sigla_estado,nome_estado) Values('DF','Distrito Federal');
 Insert Into estado (sigla_estado,nome_estado) Values('ES','Espírito Santo');
 Insert Into estado (sigla_estado,nome_estado) Values('GO','Goiás');
 Insert Into estado (sigla_estado,nome_estado) Values('MA','Maranhão');
 Insert Into estado (sigla_estado,nome_estado) Values('MG','Minas Gerais');
 Insert Into estado (sigla_estado,nome_estado) Values('MS','Mato Grosso do Sul');
 Insert Into estado (sigla_estado,nome_estado) Values('MT','Mato Grosso');
 Insert Into estado (sigla_estado,nome_estado) Values('PA','Pará');
 Insert Into estado (sigla_estado,nome_estado) Values('PB','Paraíba');
 Insert Into estado (sigla_estado,nome_estado) Values('PE','Pernambuco');
 Insert Into estado (sigla_estado,nome_estado) Values('PI','Piauí');
 Insert Into estado (sigla_estado,nome_estado) Values('PR','Paraná');
 Insert Into estado (sigla_estado,nome_estado) Values('RJ','Rio de Janeiro');
 Insert Into estado (sigla_estado,nome_estado) Values('RN','Rio Grande do Norte');
 Insert Into estado (sigla_estado,nome_estado) Values('RO','Rondônia');
 Insert Into estado (sigla_estado,nome_estado) Values('RR','Roraima');
 Insert Into estado (sigla_estado,nome_estado) Values('RS','Rio Grande do Sul');
 Insert Into estado (sigla_estado,nome_estado) Values('SC','Santa Catarina');
 Insert Into estado (sigla_estado,nome_estado) Values('SE','Sergipe');
 Insert Into estado (sigla_estado,nome_estado) Values('SP','São Paulo');
 Insert Into estado (sigla_estado,nome_estado) Values('TO','Tocantins');

INSERT INTO cidade (nome_cidade,id_estado) Values
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


INSERT INTO bairro (nome_bairro,id_cidade) Values
('Adhemar Garcia',(select id_cidade from cidade where nome_cidade = 'Joinville')),
('América',(select id_cidade from cidade where nome_cidade = 'Joinville')),
('Anita Garibaldi',(select id_cidade from cidade where nome_cidade = 'Joinville')), 
('Atiradores',(select id_cidade from cidade where nome_cidade = 'Joinville')),
('Aventureiro',(select id_cidade from cidade where nome_cidade = 'Joinville')),
('Boa Vista',(select id_cidade from cidade where nome_cidade = 'Joinville')),
('Boehmerwald',(select id_cidade from cidade where nome_cidade = 'Joinville')),
('Bom Retiro',(select id_cidade from cidade where nome_cidade = 'Joinville')),
('Bucarein',(select id_cidade from cidade where nome_cidade = 'Joinville')),
('Centro',(select id_cidade from cidade where nome_cidade = 'Joinville')),
('Comasa',(select id_cidade from cidade where nome_cidade = 'Joinville')),
('Costa e Silva',(select id_cidade from cidade where nome_cidade = 'Joinville')), 
('Dona Francisca',(select id_cidade from cidade where nome_cidade = 'Joinville')),
('Espinheiros',(select id_cidade from cidade where nome_cidade = 'Joinville')),
('Fátima',(select id_cidade from cidade where nome_cidade = 'Joinville')), 
('Floresta',(select id_cidade from cidade where nome_cidade = 'Joinville')), 
('Glória',(select id_cidade from cidade where nome_cidade = 'Joinville')), 
('Guanabara',(select id_cidade from cidade where nome_cidade = 'Joinville')), 
('Iririú',(select id_cidade from cidade where nome_cidade = 'Joinville')), 
('Itaum',(select id_cidade from cidade where nome_cidade = 'Joinville')),
('Itinga',(select id_cidade from cidade where nome_cidade = 'Joinville')), 
('Jardim Iririú',(select id_cidade from cidade where nome_cidade = 'Joinville')), 
('Jardim Paraíso',(select id_cidade from cidade where nome_cidade = 'Joinville')), 
('Jardim Sofia',(select id_cidade from cidade where nome_cidade = 'Joinville')), 
('Jarivatuba',(select id_cidade from cidade where nome_cidade = 'Joinville')), 
('Paranaguamirim',(select id_cidade from cidade where nome_cidade = 'Joinville')), 
('Petrópolis',(select id_cidade from cidade where nome_cidade = 'Joinville')), 
('Pirabeiraba Centro',(select id_cidade from cidade where nome_cidade = 'Joinville')),
('Profipo',(select id_cidade from cidade where nome_cidade = 'Joinville')), 
('Rio Bonito',(select id_cidade from cidade where nome_cidade = 'Joinville')), 
('Saguaçu',(select id_cidade from cidade where nome_cidade = 'Joinville')), 
('Piraí',(select id_cidade from cidade where nome_cidade = 'Joinville')),
('Morro do Amaral',(select id_cidade from cidade where nome_cidade = 'Joinville')),
('Quirirí',(select id_cidade from cidade where nome_cidade = 'Joinville')),
('Enceada',(select id_cidade from cidade where nome_cidade = 'São Francisco do Sul')),
('Enseada',(select id_cidade from cidade where nome_cidade = 'São Francisco do Sul')),
('Patrimônio',(select id_cidade from cidade where nome_cidade = 'São Francisco do Sul')),
('Patrimônio Histórico',(select id_cidade from cidade where nome_cidade = 'São Francisco do Sul')),
('Paulas',(select id_cidade from cidade where nome_cidade = 'São Francisco do Sul')),
('Pérola',(select id_cidade from cidade where nome_cidade = 'São Francisco do Sul')),
('Praia do Ervino',(select id_cidade from cidade where nome_cidade = 'São Francisco do Sul')),
('Praia dos Ingleses',(select id_cidade from cidade where nome_cidade = 'São Francisco do Sul')),
('Praia Ervino',(select id_cidade from cidade where nome_cidade = 'São Francisco do Sul')),
('Praia Grande',(select id_cidade from cidade where nome_cidade = 'São Francisco do Sul')),
('Praia Paulas',(select id_cidade from cidade where nome_cidade = 'São Francisco do Sul')),
('Vila da Glória',(select id_cidade from cidade where nome_cidade = 'São Francisco do Sul')),
('Areia Pequena',(select id_cidade from cidade where nome_cidade = 'Araquari')),
('Areias Pequenas',(select id_cidade from cidade where nome_cidade = 'Araquari')),
('Barra do Sul',(select id_cidade from cidade where nome_cidade = 'Araquari')),
('Barra Itapocu',(select id_cidade from cidade where nome_cidade = 'Araquari')),
('Colégio Agrícola',(select id_cidade from cidade where nome_cidade = 'Araquari')),
('Itinga',(select id_cidade from cidade where nome_cidade = 'Araquari')),
('Porto Grande',(select id_cidade from cidade where nome_cidade = 'Araquari'));

INSERT INTO categorias (id_categoria, nome_categoria) Values
(1, 'Bebidas'),
(2, 'Carnes'),
(3, 'Frios'),
(4, 'Frutas, verduras e legumes'),
(5, 'Congelados');

INSERT INTO ruas (id_bairro, nome_rua) Values 
(1, 'Av. Alvino Hansen'),
(20, 'Rua Inácio de Oliveira'),
(20, 'Rua Teresópolis'),
(39, 'Rua Cândido Silva'),
(21, 'Rua Adele Hille'),
(9, 'Av. Getúlio Vargas')
(9, 'Rua Cel. Francisco Gomes');


INSERT INTO ruas (id_rua, nome_mercado) Values 
(6, 'Shopping BIG Americanas'),
(7, 'Fort Atacadista');



