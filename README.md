# 🗳️ Sistema de Votação - Teste Desenvolvedor 2025

Projeto desenvolvido em **Laravel 11**, **PHP 8.4** e **MySQL**, para o teste técnico de Desenvolvedor 2025.

---

## 🚀 Funcionalidades

- CRUD de **Enquetes** (Criar, Editar, Excluir).
- CRUD de **Opções** (mínimo 3, dinâmicas no formulário).
- **Datas de início e fim** da enquete.
- **Status automático** da enquete:
  - ⏳ Agendada
  - ✅ Em andamento
  - ❌ Finalizada
- Votação com **atualização em tempo real (AJAX)**.
- Botão **Votar** desabilitado fora do período válido.
- Layout simples com **Bootstrap 5** e **Flexbox**.
- Seeder para criar automaticamente enquetes de exemplo:
  - Uma **Agendada**
  - Uma **Em andamento**
  - Uma **Finalizada**

---

## 📦 Requisitos

- PHP >= 8.2  
- Composer  
- MySQL  
- Node.js + NPM (opcional, caso queira recompilar assets)  

---

## ⚙️ Instalação e Execução

1. Clone o repositório:

   ```bash
   git clone https://github.com/Heron-Alves/sistema-de-votacao.git
   cd sistema-de-votacao
   
2. Instale as dependências do Laravel:
   composer install
   
3. Copie o arquivo .env.example para .env:
   cp .env.example .env

4. Configure seu banco no .env:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=sistema_votacao
    DB_USERNAME=root
    DB_PASSWORD=
    APP_TIMEZONE=America/Sao_Paulo

5. Gere a chave da aplicação:
   php artisan key:generate

6. Rode as migrations e seeders:
   php artisan migrate:fresh --seed

7. Inicie o servidor local:
   php artisan serve

🧪 Dados de exemplo

Após rodar php artisan migrate:fresh --seed, serão criadas automaticamente 3 enquetes:

Enquete Agendada (abre amanhã).

Enquete Em andamento (aberta agora).

Enquete Finalizada (já encerrada).

Cada uma possui 3 opções de votação.

🖼️ Telas
📋 Lista de Enquetes

Mostra título, datas, status e opções com total de votos.

Botões para Editar e Excluir.

➕ Criar Enquete

Formulário para criar nova enquete com título, datas e opções dinâmicas.

📝 Editar Enquete

Edita título, datas e opções já existentes.

✅ Votação

Botão de votar ativo somente no período válido.

Contador de votos atualizado via AJAX.

🎯 Diferenciais implementados

Seeder automático para facilitar testes.

Status exibido com cores (badges Bootstrap).


Código organizado e comentado.

👨‍💻 Autor

Desenvolvido por Heron Alves – Teste Técnico Desenvolvedor 2025
