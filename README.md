# Taskrush Assessment back-end

Back-end simples da API feito para a avaliação da Taskrush.
Foi utilizado SQLite para acelerar o processo devido ao tempo limitado.

---
## Instalação:
Verifique as extensões do PHP (requisitos) instaladas na sua máquina e siga os passos abaixo.

### Requisitos:
- php8.2
- php8.2-xml
- php8.2-xdebug
- php8.2-curl
- php8.2-sqlite3
- composer ^2.7

### Passos (em sequência):
- Execute `composer install` para instalar as dependências
- Faça uma cópia do arquivo `.env.example` e renomeie-a para `.env`
- Em seguida, use os comandos: 
  - `php artisan migrate` para criar as tabelas do banco de dados
  - `php artisan db:seed` para popular o banco de dados
  - `php artisan key:generate` para gerar a chave de cifra de sessão
  - `php artisan scribe:generate` para gerar a documentação da API
- Por fim, `php artisan serve` para iniciar o servidor de desenvolvimento


### Opcionalmente:

- `php artisan ide-helper:eloquent` para gerar os códigos *helpers* de IDEs do Eloquent

## Como testar:

### API endpoints
Tendo seguido as instruções de instalação do projeto, uma _collection_ da API pode ser importada para o Postman usando a URI http://127.0.0.1:8000/docs/collection.json

## Troubleshooting
- **Front-end retorna erro de cors, na aba network das ferramentas de desenvolvedor:**
  - Verifique se o front está rodando no mesmo endereço da variável de ambiente `FRONTEND_URL`, no arquivo `.env` do back-end.

