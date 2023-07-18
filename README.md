<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## INSTALAÇÃO

É necessário instalar servidor Apache com MySQL, PHP 8.1 e Composer. Na pasta que contém os arquivos da API execute o comando abaixo para instalar as dependências:

<pre>
    <code>composer install</code>
</pre>

Utilize o arquivo <code>.env.example</code> para criar e configurar o arquivo de ambiente <code>.env</code> com as definições para conexão com o banco de dados, chave JWT e outras opções do arquivo.

## MySQL MIGRATIONS

Uma vez que tiver as configurações bem definidas no arquivo de ambiente para comunicar com um banco de dados MySQL criado previamente, execute o comando abaixo para persistir as migrations definidas na API.

<pre>
    <code>php artisan migrate</code>
</pre>

## ROTAS DE ACESSO

Com o banco de dados pronto para receber os dados das requisições, utilize os endpoints abaixo em cada rota disponível.

<pre>
    <code>
    POST: /api/users -> Criar novo usuário
    GET: /api/users -> Listar usuários (Autenticado)
    GET: /api/users/{id} -> Mostrar um usuário (Autenticado)
    PATCH: /api/users/{id} -> Alterar um usuário (Autenticado)
    DELETE: /api/users/{id} -> Remover um usuário (Autenticado)
    </code>
</pre>

## AUTENTICAÇÃO

Utilize a rota abaixo para obter um token de acesso que será responsável pela autenticação das rotas seguras da API.

<pre>
    <code>
    POST: /api/login -> Para autenticar o acesso na API
    
    {
        "email":"exemplo@mail.com",
        "password":"SenhaDeAcesso" 
    }
    </code>
</pre>

## INTERFACE

Utilize a interface abaixo para interagir com requisições para criação e atualização de contas no sistema, que responde com a mesma estrutura de dados, com excessão da senha.

<pre>
    <code>
    POST: /api/user
    PATCH: /api/user/{id}

    { 
        "first_name":"Marcelo Henrique",
        "last_name":"A Marques",
        "email":"mh@mh.app.br",
        "password":"SenhaDeAcesso",
        "city":"Belo Horizonte",
        "country":"Brasil" 
    }
    </code>
</pre>
