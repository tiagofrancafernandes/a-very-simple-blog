Para instalação serão necessários atender alguns dos requisitos mínimos:
* Composer 2.0
* PHP >= 7.4.11
* Saber utilizar o terminal

Seguindo as instruções passso-a-passo abaixo iniciará o app:

* Clonar este repositório:
```shell
git clone https://github.com/tiagofrancafernandes/a-very-simple-blog.git
```

* Entrar na pasta do projeto:
```shell
cd a-very-simple-blog
```

* Copiar o arquivo **.env.example** para __.env__  configurado conforme seu ambiente
```shell
cp .env.example .env
```

* (sugestão) para o simples teste, altere o __DB_CONNECTION__ para o sqlite no aquivo .ENV, por padrão é o mysql, troque o mysql para __*sqlite*__:
<img src="https://i.imgur.com/oBkylKL.png" width="250" height="250" />

* Para criar o banco em memória sqlite:
```shell
touch database/database.sqlite
```

* Instalação das dependêcias Laravel
```shell
composer install
```

* Criação da chave/key (por razões de segurança))
```shell
php artisan key:generate
```

* Rodar o migrate (criação das tabelas no banco)
```shell
php artisan migrate
```

* Rodar o seed (cria/semeia dados iniciais)
```shell
php artisan db:seed

#Migrar e cadastrar dados iniciais ao mesmo tempo
php artisan migrate --seed
```

* Executar o servidor php embutido do Laravel
```shell
$ php artisan serve
```

* Acessar o navegador
```shell
http://127.0.0.1:8000
```

----

### CRUD

- **C**reate **[DONE]**

- **R**ead **[DONE]**


- **U**pdate  **[DONE]**


- **D**elete  **[DONE]**

----

