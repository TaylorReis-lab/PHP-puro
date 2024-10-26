# Projeto de Cadastro e Login com Integração de API em PHP

Este projeto é uma aplicação de cadastro e login de usuários em PHP puro. Ele inclui uma integração com uma API pública para buscar informações e armazená-las no banco de dados.

## Funcionalidades

- **Cadastro de Usuário**: Permite que novos usuários se cadastrem informando Nome, Email, Código Único e Senha.
- **Login de Usuário**: Autenticação de usuários registrados para acesso a uma área privada.
- **Integração com API**: Ao cadastrar um usuário, a aplicação realiza uma requisição à API `https://jsonplaceholder.typicode.com/posts/1` para buscar o valor do campo `title`. Este título é armazenado no banco de dados como o campo `Título` do usuário.
- **Consulta do Título Armazenado**: Quando uma consulta é feita à URL da API, usando o `Código Único` do usuário no final da URL (`https://jsonplaceholder.typicode.com/posts/{codigo}`), o título armazenado pode ser verificado para aquele código específico.

## Estrutura do Projeto

C:\xampp\htdocs\php-puro </br>
├── includes
│ └── db.php # Arquivo de conexão com o banco de dados 
├── views
│ ├── register.php # Página de cadastro de usuário 
│ ├── login.php # Página de login de usuário 
│ ├── logout.php # Botão utilizado para deslogar de usuário
│ └── private.php # Página privada acessível após login 
└── index.php # Página inicial do projeto
└── README.md             # Documentação do projeto

## Configuração do Banco de Dados

1. No phpMyAdmin, crie um banco de dados chamado `meu_projeto` (ou outro nome de sua preferência).
2. Crie a tabela `users` com o seguinte comando SQL:

   ```sql
   CREATE TABLE `users` (
     `in_user` INT NOT NULL AUTO_INCREMENT,
     `name_user` VARCHAR(30) NOT NULL,
     `email_user` VARCHAR(40) NOT NULL,
     `password_user` VARCHAR(128) NOT NULL,
     `title_user` VARCHAR(74) NOT NULL,
     `code_user` VARCHAR(40) NOT NULL,
     PRIMARY KEY (`in_user`)
   ) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

## Como Funciona a Integração com a API

- **Cadastro**: Quando um usuário preenche o formulário de cadastro, ele deve fornecer um "Código Único".
- **Consulta à API**: O sistema utiliza o valor desse Código Único para montar uma URL da API (https://jsonplaceholder.typicode.com/posts/{codigo}). Em seguida, faz uma requisição a essa URL para obter o campo title.
- **Armazenamento do Título**: O título obtido é salvo no campo title_user do banco de dados para o usuário que está sendo cadastrado.
- **Consulta**: Quando a URL da API é acessada posteriormente com o código único, o título armazenado para aquele código único pode ser verificado.

## Como Executar

1. Inicie o Apache e o MySQL pelo painel de controle do XAMPP.
2. Acesse o projeto no navegador, usando a URL: http://localhost/php-puro/.
3. Para cadastrar um novo usuário, vá para http://localhost/php-puro/views/register.php.
4. Após o cadastro, faça login com o email e senha registrados para acessar a página privada (dashboard.php).

## Notas Importantes

- Certifique-se de que o "Código Único" inserido na página de cadastro corresponde a um valor válido na API (https://jsonplaceholder.typicode.com/posts/{codigo}) para que o campo title seja preenchido corretamente.

- A aplicação usa a função file_get_contents para fazer requisições à API. Verifique se esta função está habilitada no seu servidor.
- Este projeto é apenas um exercício de aprendizado e não deve ser usado em produção, pois não implementa práticas de segurança como hashing seguro de senhas e proteção contra SQL Injection.

> Status do Projeto: Concluido :heavy_check_mark:
