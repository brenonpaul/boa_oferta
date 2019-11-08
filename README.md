# boa_oferta

1- Entrar na pasta public_html ou htdocs

2- Entrar pelo terminal no public_html/htdocs e executar o git clone do link https://github.com/brenonpaul/boa_oferta.git

3 -Entre no phpmyadmin clique em Novo BD coloque o nome do novo banco como "boa_oferta" em "colação" selecione a opção "utf8_general_ci" e clique em criar

4- Entrar na pasta "boa-oferta", e acessar "modelo_fisico" e copiar o texto que tem dentro do arquivo 'gilberto_grr_fisico.sql'

5- Com o texto copiado, entre no phpmyadmin e cole o texto na aba SQL e clique em executar

6- Ainda dentro da pasta "modelo_fisico" copie o conteudo do arquivo 'population.sql' e cole no phpmyadmin na aba SQL

7- Para realizar o login no site, pode usar qualquer uma das contas já cadastradas, como exemplo:
email: jj.s.a.o@gmail.com
senha: wudLGDOR

8- Após esses passos, pode-se usar o site

9- A parte de cadastro e login está 80% finalizada, logo adicionaremos ao software!


//////////////////////////////////////////

comandos para o Ivo:

select nome, email, ds_bairro_nome, ds_cidade_nome, ds_logradouro_nome from cad_usuario, cidades, logradouro, bairros where bairros_cd_bairro = cd_bairro and cidade_cd_cidade = cd_cidade and cd_logradouro = log_cd_tip_log and cpf = 09582746512;

update cad_usuario set nome = 'novo nome' where cpf = 1111111111;
