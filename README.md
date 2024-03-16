# Taskrush Assessment back-end

Back-end simples da API feito para a avaliação da Taskrush.
Foi utilizado SQLite para acelerar o processo devido ao tempo limitado.

Requisitos:
---
- php8.2
- php8.2-xml
- php8.2-xdebug
- php8.2-curl
- php8.2-sqlite3
- composer ^2.7

Instruções:
---
- `composer install` para instalar as dependências
- `php artisan migrate` para criar as tabelas do banco de dados
- `php artisan db:seed` para popular o banco de dados
- `php artisan key:generate` para gerar a chave de aplicação
- `php artisan scribe:generate` para gerar a documentação da API
- `php artisan serve` para iniciar o servidor de desenvolvimento

Opcional:
---
- `php artisan ide-helper:eloquent` para gerar os códigos *helpers* de IDEs do Eloquent

# Como testar:

## API endpoints
Tendo seguido as instruções de instalação do projeto, uma collection da API pode ser importada para o Postman usando a URI http://127.0.0.1:8000/docs/collection.json
