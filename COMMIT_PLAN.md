# 📦 Plano de Commits Incrementais - Laravel To-Do List

Este documento organiza os arquivos do projeto em grupos lógicos para commits incrementais, facilitando o rastreamento do desenvolvimento e a revisão do código.

---

## 🎯 **Commit 1: Configuração Inicial do Projeto Laravel**

### Arquivos para este commit:
```
composer.json
composer.lock
phpunit.xml
artisan
.env.example
.gitignore
```

### Descrição:
Configuração base do projeto Laravel com dependências, estrutura inicial e arquivos de configuração.

### Comando:
```bash
git add composer.json composer.lock phpunit.xml artisan .env.example .gitignore
git commit -m "feat: configuração inicial do projeto Laravel

- Adiciona composer.json com dependências do Laravel 10
- Configura phpunit.xml para testes
- Adiciona .env.example como template
- Configura .gitignore para Laravel"
```

---

## 🎯 **Commit 2: Estrutura Base e Configurações**

### Arquivos para este commit:
```
bootstrap/app.php
config/app.php
config/auth.php
config/database.php
config/logging.php
config/session.php
config/view.php
public/index.php
```

### Descrição:
Estrutura base do Laravel: bootstrap, configurações principais e ponto de entrada público.

### Comando:
```bash
git add bootstrap/ config/ public/index.php
git commit -m "feat: adiciona estrutura base e configurações do Laravel

- Configura bootstrap da aplicação
- Adiciona configurações principais (app, auth, database, logging, session, view)
- Configura ponto de entrada público (index.php)"
```

---

## 🎯 **Commit 3: Providers e Middleware**

### Arquivos para este commit:
```
app/Providers/AppServiceProvider.php
app/Providers/RouteServiceProvider.php
app/Http/Kernel.php
app/Http/Middleware/*.php (todos os middlewares)
app/Http/Controllers/Controller.php
app/Console/Kernel.php
app/Exceptions/Handler.php
```

### Descrição:
Providers de serviço, middleware e estruturas base do Laravel.

### Comando:
```bash
git add app/Providers/ app/Http/Kernel.php app/Http/Middleware/ app/Http/Controllers/Controller.php app/Console/ app/Exceptions/
git commit -m "feat: adiciona providers, middleware e estruturas base

- Configura AppServiceProvider e RouteServiceProvider
- Adiciona HTTP Kernel com middlewares globais e de grupo
- Implementa middlewares de autenticação, CSRF, cookies, etc.
- Configura Console Kernel e Exception Handler"
```

---

## 🎯 **Commit 4: Sistema de Autenticação**

### Arquivos para este commit:
```
app/Models/User.php
app/Http/Controllers/Auth/AuthenticatedSessionController.php
routes/auth.php
resources/views/auth/login.blade.php
database/migrations/2014_10_12_000000_create_users_table.php
database/migrations/2014_10_12_100000_create_password_reset_tokens_table.php
database/migrations/2019_08_19_000000_create_failed_jobs_table.php
database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php
```

### Descrição:
Sistema completo de autenticação: Model User, Controller de autenticação, rotas, view de login e migrations relacionadas.

### Comando:
```bash
git add app/Models/User.php app/Http/Controllers/Auth/ routes/auth.php resources/views/auth/ database/migrations/2014_* database/migrations/2019_*
git commit -m "feat: implementa sistema de autenticação

- Adiciona Model User com traits de autenticação
- Implementa AuthenticatedSessionController (login/logout)
- Configura rotas de autenticação
- Cria view de login com Bootstrap 5
- Adiciona migrations de usuários, password reset, failed jobs e tokens"
```

---

## 🎯 **Commit 5: Model e Migration de Tasks**

### Arquivos para este commit:
```
app/Models/Task.php
database/migrations/2024_01_01_000001_create_tasks_table.php
```

### Descrição:
Model Task com soft deletes e migration da tabela tasks.

### Comando:
```bash
git add app/Models/Task.php database/migrations/2024_01_01_000001_create_tasks_table.php
git commit -m "feat: adiciona Model Task e migration

- Cria Model Task com SoftDeletes
- Implementa métodos auxiliares (isCompleted, isPending, getStatuses)
- Adiciona migration para tabela tasks com campos: title, description, status
- Suporta soft delete para restauração de tarefas"
```

---

## 🎯 **Commit 6: FormRequest de Validação**

### Arquivos para este commit:
```
app/Http/Requests/StoreTaskRequest.php
app/Http/Requests/UpdateTaskRequest.php
```

### Descrição:
FormRequests para validação de criação e atualização de tarefas.

### Comando:
```bash
git add app/Http/Requests/
git commit -m "feat: adiciona FormRequests para validação de tasks

- Implementa StoreTaskRequest com validação de criação
- Implementa UpdateTaskRequest com validação de atualização
- Adiciona mensagens de erro personalizadas em português"
```

---

## 🎯 **Commit 7: Controller de Tasks**

### Arquivos para este commit:
```
app/Http/Controllers/TaskController.php
```

### Descrição:
Controller completo com CRUD de tarefas, filtros, paginação e restauração.

### Comando:
```bash
git add app/Http/Controllers/TaskController.php
git commit -m "feat: implementa TaskController com CRUD completo

- Implementa index com filtro por status e paginação
- Implementa create, store, show, edit, update, destroy
- Adiciona método restore para soft delete
- Utiliza FormRequests para validação"
```

---

## 🎯 **Commit 8: Rotas Web**

### Arquivos para este commit:
```
routes/web.php
routes/api.php
routes/console.php
```

### Descrição:
Definição de rotas da aplicação (web, API e console).

### Comando:
```bash
git add routes/
git commit -m "feat: configura rotas da aplicação

- Adiciona rotas web com resource de tasks e restore
- Protege rotas com middleware de autenticação
- Configura rotas de API e console"
```

---

## 🎯 **Commit 9: Layout Principal e Views de Tasks**

### Arquivos para este commit:
```
resources/views/layouts/app.blade.php
resources/views/tasks/index.blade.php
resources/views/tasks/create.blade.php
resources/views/tasks/edit.blade.php
resources/views/tasks/show.blade.php
```

### Descrição:
Layout principal com Bootstrap 5 e todas as views de tarefas (listagem, criação, edição e visualização).

### Comando:
```bash
git add resources/views/
git commit -m "feat: implementa views completas com Bootstrap 5

- Cria layout principal (app.blade.php) com navbar e footer
- Implementa view de listagem com filtros e paginação
- Adiciona views de criação, edição e visualização de tarefas
- Aplica Bootstrap 5 e Bootstrap Icons para UI moderna"
```

---

## 🎯 **Commit 10: Database Seeder**

### Arquivos para este commit:
```
database/seeders/DatabaseSeeder.php
```

### Descrição:
Seeder para criar usuário padrão do sistema.

### Comando:
```bash
git add database/seeders/
git commit -m "feat: adiciona DatabaseSeeder para usuário padrão

- Cria seeder que gera usuário admin@todolist.com
- Facilita configuração inicial do projeto"
```

---

## 🎯 **Commit 11: Documentação**

### Arquivos para este commit:
```
README.md
ENV_VARIABLES_GUIDE.md
GITIGNORE_EXPLANATION.md
LARAVEL_LIFECYCLE.md
LICENSE
```

### Descrição:
Documentação completa do projeto: README, guias e explicações.

### Comando:
```bash
git add README.md ENV_VARIABLES_GUIDE.md GITIGNORE_EXPLANATION.md LARAVEL_LIFECYCLE.md LICENSE
git commit -m "docs: adiciona documentação completa do projeto

- README.md com instruções de instalação e uso
- Guia de variáveis de ambiente (.env)
- Explicação sobre arquivos do .gitignore
- Documentação do ciclo de vida do Laravel
- Adiciona licença MIT"
```

---

## 🎯 **Commit 12: Estrutura de Storage (Opcional)**

### Arquivos para este commit:
```
storage/.gitkeep (se existir)
```

### Descrição:
Manter estrutura de pastas do storage no Git (se necessário).

### Comando:
```bash
# Apenas se houver arquivos .gitkeep para adicionar
git add storage/
git commit -m "chore: adiciona estrutura de storage no Git

- Mantém pastas de storage no repositório com .gitkeep"
```

---

## 📋 Resumo dos Commits Sugeridos

1. ✅ **Configuração Inicial** - composer.json, .gitignore, etc.
2. ✅ **Estrutura Base** - bootstrap, config, public
3. ✅ **Providers e Middleware** - camada HTTP base
4. ✅ **Autenticação** - User, login, rotas de auth
5. ✅ **Model Task** - Model e migration
6. ✅ **FormRequests** - Validação
7. ✅ **TaskController** - Lógica de negócio
8. ✅ **Rotas** - Definição de rotas
9. ✅ **Views** - Interface completa
10. ✅ **Seeder** - Dados iniciais
11. ✅ **Documentação** - README e guias
12. ✅ **Storage** - Estrutura (opcional)

---

## 🚀 Como Executar os Commits

### Opção 1: Executar um por um manualmente
```bash
# Para cada commit, execute os comandos indicados acima
```

### Opção 2: Script automatizado (cuidado!)
```bash
# NÃO execute tudo de uma vez sem revisar!
# Revise cada commit antes de fazer push
```

---

## ⚠️ Importante

1. **Nunca commite o arquivo `.env`** - ele contém credenciais sensíveis
2. **Nunca commite arquivos de cache** (`storage/framework/views/*.php`, etc.)
3. **Revise cada commit** antes de fazer push
4. **Teste a aplicação** após cada commit importante
5. **Mensagens de commit** seguem padrão Conventional Commits (feat, fix, docs, etc.)

---

## 📝 Convenções de Mensagens de Commit

- `feat:` - Nova funcionalidade
- `fix:` - Correção de bug
- `docs:` - Documentação
- `style:` - Formatação
- `refactor:` - Refatoração
- `test:` - Testes
- `chore:` - Tarefas de manutenção

---

**Boa sorte com os commits! 🎉**

