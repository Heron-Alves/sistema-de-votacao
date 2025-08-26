# 🗳️ Sistema de Votação - Teste Desenvolvedor 2025

Projeto desenvolvido em **Laravel 12**, **PHP 8.4** e **MySQL**, como parte do teste técnico de Desenvolvedor 2025.

## 🚀 Funcionalidades

- CRUD de Enquetes (Criar, Editar, Excluir).
- CRUD de Opções (mínimo 3, dinâmicas no formulário).
- Definição de datas de início e fim da enquete.
- Status automático da enquete:
  - ⏳ Agendada
  - ✅ Em andamento
  - ❌ Finalizada
- Votação com atualização de votos em tempo real (AJAX).
- Botão Votar desabilitado fora do período válido.
- Layout com Bootstrap 5.
- Seeder para popular o banco automaticamente:
  - Enquete Agendada
  - Enquete Em andamento
  - Enquete Finalizada

## 📦 Requisitos

- PHP >= 8.2  
- Composer  
- MySQL  
- Node.js + NPM (opcional)  

## ⚙️ Instalação e Execução

```bash
git clone https://github.com/Heron-Alves/sistema-de-votacao.git
cd sistema-de-votacao
composer install
cp .env.example .env
Configurar o banco no .env:

env
Copiar
Editar
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistema_votacao
DB_USERNAME=root
DB_PASSWORD=
APP_TIMEZONE=America/Sao_Paulo
bash
Copiar
Editar
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
Acesse em: http://127.0.0.1:8000/enquetes

🧪 Dados de exemplo
Enquete Agendada (abre amanhã)

Enquete Em andamento (aberta agora)

Enquete Finalizada (já encerrada)

Cada enquete possui 3 opções de votação.

🖼️ Telas
Lista de Enquetes

Criar Enquete

Editar Enquete

Votação

🎯 Diferenciais implementados
Seeder automático

Status com cores (badges Bootstrap)

Feedback ao votar (AJAX ou redirect)

Código organizado e comentado

📹 Demonstração em vídeo
🔗 (adicione aqui o link do vídeo)

👨‍💻 Autor
Desenvolvido por Heron Alves – Teste Técnico Desenvolvedor 2025
