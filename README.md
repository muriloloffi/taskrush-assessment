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
- `php artisan serve` para iniciar o servidor

Extras (optional):
---
- `php artisan ide-helper:eloquent` para gerar os códigos helpers de IDEs do Eloquent
