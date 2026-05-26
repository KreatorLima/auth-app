# Auth App

![Laravel](https://img.shields.io/badge/Laravel-12.x-red) ![PHP](https://img.shields.io/badge/PHP-8.2-blue) ![License](https://img.shields.io/badge/license-MIT-brightgreen)

Aplicação web construída em Laravel 12 para autenticação de usuários e gerenciamento de conteúdo. O projeto inclui cadastro de usuários, login, edição de perfil, CRUD de categorias e posts, além de upload de imagem.

---

## 📌 Índice

- [Sobre](#-sobre)
- [Funcionalidades](#-funcionalidades)
- [Tecnologias](#-tecnologias)
- [Requisitos](#-requisitos)
- [Instalação](#-instalação)
- [Uso](#-uso)
- [Rotas principais](#-rotas-principais)
- [Testes](#-testes)
- [Observações](#-observações)

## 🔎 Sobre

O `Auth App` é um projeto de exemplo para demonstrar como criar um sistema de autenticação e um pequeno painel administrativo em Laravel. Ele oferece controle de usuários e gerenciamento de conteúdo com uma interface segura.

## ✨ Funcionalidades

- Autenticação com Laravel Breeze
- Registro de usuário, login e recuperação de senha
- Edição e exclusão de perfil
- CRUD completo de categorias (`categorias`)
- CRUD completo de posts (`posts`)
- Upload e exibição de imagens nos posts
- Dashboard protegido por autenticação

## 🛠️ Tecnologias

- Laravel 12
- PHP 8.2
- Composer
- Node.js / npm
- Blade Templates
- Breeze Authentication

## ✅ Requisitos

- PHP 8.2 ou superior
- Composer
- Node.js 18+ / npm
- Banco de dados compatível com Laravel (MySQL, SQLite, PostgreSQL, etc.)
- Ambiente local como XAMPP ou WAMP no Windows

## 🚀 Instalação

1. Clone o repositório:

```bash
git clone <URL_DO_REPOSITORIO> auth-app
cd auth-app
```

2. Instale as dependências PHP:

```bash
composer install
```

3. Copie o arquivo de ambiente e gere a chave de aplicação:

```bash
copy .env.example .env
php artisan key:generate
```

4. Configure as credenciais do banco de dados em `.env`.

5. Execute as migrações:

```bash
php artisan migrate
```

6. Instale as dependências JavaScript:

```bash
npm install
```

7. Compile os ativos para desenvolvimento:

```bash
npm run dev
```

## ▶️ Uso

Inicie o servidor de desenvolvimento:

```bash
php artisan serve
```

Acesse no navegador:

- `http://127.0.0.1:8000` - página inicial
- `http://127.0.0.1:8000/register` - criar conta
- `http://127.0.0.1:8000/login` - fazer login
- `http://127.0.0.1:8000/dashboard` - dashboard protegido

## 🔗 Rotas principais

- `/` - página inicial
- `/dashboard` - painel protegido por autenticação
- `/profile` - edição de perfil
- `/categorias` - gerenciamento de categorias
- `/posts` - gerenciamento de posts

## 🧪 Testes

Execute os testes automatizados:

```bash
php artisan test
```

## ⚠️ Observações

- Em Windows, confirme se `storage` e `bootstrap/cache` têm permissões corretas.
- Se usar SQLite, crie `database/database.sqlite` e ajuste `.env` para `DB_CONNECTION=sqlite`.
- Caso precise servir imagens de uploads, rode:

```bash
php artisan storage:link
```

---

Feito para mostrar um sistema simples de autenticação e administração de conteúdo em Laravel.
