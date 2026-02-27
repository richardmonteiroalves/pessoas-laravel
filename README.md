<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# pessoas-laravel

API de exemplo em **Laravel v12.53.0** (PHP ^8.2), com **CRUD de Pessoas** usando **SQLite** e **migrations/seeders**.

> Projeto baseado no skeleton do Laravel (`laravel/laravel`).

---

## O que este projeto faz

- Persiste dados em **SQLite** (arquivo local: `database/database.sqlite`)
- ExpÃµe endpoints REST em `/api/people` para **Criar / Listar / Buscar / Atualizar / Excluir** registros da tabela `people`
- Inclui **migrations** e **seeders** para montar o banco e popular com dados fake

---

## DependÃªncias (bibliotecas) usadas

### PHP / Composer (runtime)
De `composer.json`:

- `laravel/framework` `v12.53.0` â€” framework web e componentes (routing, middleware, Eloquent ORM, migrations, validaÃ§Ã£o, etc.).
- `laravel/tinker` `v2.11.1` â€” REPL/console interativo para testar cÃ³digo com o app carregado.

### PHP / Composer (dev)
- `fakerphp/faker` `v1.24.1` â€” dados fake (usado nas factories).
- `phpunit/phpunit` `11.5.55` â€” testes.
- `nunomaduro/collision` `v8.9.1` â€” melhor output de erros no terminal.
- `mockery/mockery` `1.6.12` â€” mocks para testes.
- `laravel/pint` `v1.27.1` â€” formatador de cÃ³digo.
- `laravel/pail` `v1.2.6` â€” utilitÃ¡rios para logs.
- `laravel/sail` `v1.53.0` â€” ambiente Docker (opcional).

> ObservaÃ§Ã£o: alÃ©m dessas, o `composer.lock` inclui dependÃªncias transitivas (Symfony components, PSR, etc.). Para listar tudo: `composer show`.

### Front-end (Node / Vite) â€” opcional
De `package.json` (devDependencies):

- `vite` `^7.0.7` e `laravel-vite-plugin` `^2.0.0` â€” build/dev server de assets.
- `tailwindcss` `^4.0.0` e `@tailwindcss/vite` `^4.0.0` â€” CSS utilitÃ¡rio.
- `axios` `^1.11.0` â€” HTTP client (se vocÃª fizer telas/JS).
- `concurrently` `^9.0.1` â€” roda comandos juntos (dev).

---

## Banco de dados (SQLite)

Config em `.env`:

```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

O arquivo do banco fica em:

- `database/database.sqlite`

Migrations existentes:

- `create_users_table`
- `create_cache_table`
- `create_jobs_table`
- `create_people_table` (**people**: `id`, `name`, `created_at`, `updated_at`)

Seeders/factories:

- `PersonFactory` â†’ gera `name`
- `PersonSeeder` â†’ cria 20 pessoas (`Person::factory()->count(20)->create()`)
- `DatabaseSeeder` â†’ chama `PersonSeeder`

---

## Finalidade e desenho do CRUD (endpoints)

As rotas foram definidas com:

```php
<?php
use App\Http\Controllers\Api\PersonController;
use Illuminate\Support\Facades\Route;

Route::apiResource('people', PersonController::class);
```

`Route::apiResource` cria os endpoints REST padrÃ£o de um CRUD (ver tabela oficial de Resource Controllers).  
ReferÃªncia: documentaÃ§Ã£o do Laravel. https://laravel.com/docs/12.x/controllers#actions-handled-by-resource-controllers

### Endpoints expostos

| MÃ©todo | URL | AÃ§Ã£o (Controller) | O que faz |
|---|---|---|---|
| GET | `/api/people` | `index` | Lista pessoas |
| POST | `/api/people` | `store` | Cria pessoa |
| GET | `/api/people/{id}` | `show` | Busca por id |
| PUT/PATCH | `/api/people/{id}` | `update` | Atualiza pessoa |
| DELETE | `/api/people/{id}` | `destroy` | Exclui pessoa |

> ObservaÃ§Ã£o do cÃ³digo atual: `store` e `update` validam apenas o campo `name`.  
> Se vocÃª quiser incluir `email`, precisa adicionar coluna na migration e validar no controller.

---

## Exemplos de comandos (GET/POST/PUT/DELETE)

### Listar (GET)
```bash
curl http://127.0.0.1:8000/api/people
```

### Buscar por ID (GET)
```bash
curl http://127.0.0.1:8000/api/people/1
```

### Criar (POST)

**PowerShell**
```powershell
curl -Method POST "http://127.0.0.1:8000/api/people" `
  -Headers @{ "Content-Type"="application/json" } `
  -Body '{"name":"Richard"}'
```

**CMD**
```bat
curl -X POST "http://127.0.0.1:8000/api/people" ^
  -H "Content-Type: application/json" ^
  -d "{\"name\":\"Richard\"}"
```

### Atualizar (PUT)

**PowerShell**
```powershell
curl -Method PUT "http://127.0.0.1:8000/api/people/1" `
  -Headers @{ "Content-Type"="application/json" } `
  -Body '{"name":"Novo Nome"}'
```

**CMD**
```bat
curl -X PUT "http://127.0.0.1:8000/api/people/1" ^
  -H "Content-Type: application/json" ^
  -d "{\"name\":\"Novo Nome\"}"
```

### Excluir (DELETE)
```bash
curl -X DELETE http://127.0.0.1:8000/api/people/1
```

---

## Como executar localmente (Windows)

### Requisitos
- PHP **8.2+**
- Composer
- (Opcional) Node.js + npm (se for mexer em front-end/assets)

### 1) Entrar na pasta do projeto

**CMD**
```bat
cd /d C:\scripts\pessoas-laravel
```

**PowerShell**
```powershell
cd C:\scripts\pessoas-laravel
```

### 2) Instalar dependÃªncias PHP
```bash
composer install
```

### 3) Preparar o `.env` e gerar chave
```bash
copy .env.example .env
php artisan key:generate
```

### 4) Garantir que o SQLite existe

**PowerShell**
```powershell
New-Item -ItemType File -Force .\database\database.sqlite
```

**CMD**
```bat
type nul > database\database.sqlite
```

### 5) Rodar migrations + seed
```bash
php artisan migrate --seed
```

### 6) Subir o servidor
```bash
php artisan serve
```

Acessos:
- Home simples (web): `http://127.0.0.1:8000/`
- CRUD API: `http://127.0.0.1:8000/api/people`

### Comandos Ãºteis
- Ver rotas:
  ```bash
  php artisan route:list
  ```
- Limpar caches:
  ```bash
  php artisan optimize:clear
  ```
- Reset do banco (apaga tudo e recria):
  ```bash
  php artisan migrate:fresh --seed
  ```

---

## Nota para Git (recomendado)
- **NÃ£o versionar** `.env` (use `.env.example`).
- **NÃ£o versionar** `vendor/` (rodar `composer install`).
- Para SQLite, normalmente **nÃ£o versionar** `database/database.sqlite` (Ã© arquivo local).

SugestÃ£o de `.gitignore` (acrÃ©scimos comuns):
```
/vendor
/.env
/database/*.sqlite
/database/*.sqlite-*
/node_modules
/public/hot
/storage/*.key
```

---

## ReferÃªncias oficiais (Laravel)
- Routing: https://laravel.com/docs/12.x/routing  
- Controllers / `apiResource`: https://laravel.com/docs/12.x/controllers#api-resource-routes  
- Migrations: https://laravel.com/docs/12.x/migrations  
- Seeding: https://laravel.com/docs/12.x/seeding  
- Factories: https://laravel.com/docs/12.x/eloquent-factories
