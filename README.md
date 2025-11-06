# 📋 To-Do List - Aplicação Laravel

Aplicação web desenvolvida em Laravel para gerenciamento de lista de tarefas (to-do list), desenvolvida como parte de um teste técnico para vaga de estágio em desenvolvimento web.

<a href="https://drive.google.com/file/d/16Ps4pLa-E9lVU-SSsGnKCGoYKz8L29dP/view?usp=sharing" target="_blank" rel="noopener noreferrer">
  🔗 Clique aqui para assistir no Google Drive
</a>

## 🚀 Funcionalidades

- ✅ **CRUD completo de tarefas** (Criar, Ler, Atualizar, Excluir)
- 🔍 **Filtro por status** (Pendente/Concluída)
- 📄 **Paginação** de resultados
- 🗑️ **Soft Delete** - Exclusão lógica com possibilidade de restauração
- 🔐 **Autenticação** - Sistema de login protegendo todas as rotas
- ✨ **Interface moderna** - UI responsiva com Bootstrap 5
- ✅ **Validação completa** - Validação de dados no backend usando FormRequest
- 🎨 **UX otimizada** - Feedback visual, mensagens de sucesso/erro, confirmações

## 📋 Requisitos

### Opção 1: Ambiente Local (Tradicional)
- PHP >= 8.1
- Composer
- MySQL/MariaDB ou PostgreSQL instalado e rodando localmente
- Extensões PHP: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML

### Opção 2: Docker (Recomendado)
- Docker Desktop instalado
- Docker Compose (geralmente incluído no Docker Desktop)
- PHP >= 8.1 e Composer (para desenvolvimento local) OU tudo dentro do container

## 🔧 Instalação

### Qual opção escolher?

**Opção A (MySQL Local):**
- ✅ Se você já tem MySQL instalado e configurado
- ✅ Se prefere trabalhar diretamente com o banco local
- ⚠️ Requer instalação e configuração prévia do MySQL
- ⚠️ Pode ter problemas de compatibilidade entre ambientes

**Opção B (Docker) - Recomendado:**
- ✅ Ambiente isolado e consistente
- ✅ Não requer instalação do MySQL na máquina
- ✅ Mais fácil para o avaliador testar
- ✅ Próximo ao ambiente de produção
- ⚠️ Requer Docker Desktop instalado

**Recomendação:** Para um teste técnico, a **Opção B (Docker)** é geralmente melhor, pois facilita a avaliação e demonstra conhecimento de containers, uma habilidade valorizada no mercado.

---

Escolha uma das opções abaixo:

- **[Opção A: Instalação Local com MySQL](#opção-a-instalação-local-com-mysql)** - Requer MySQL instalado localmente
- **[Opção B: Instalação com Docker](#opção-b-instalação-com-docker)** - Mais fácil e isolado (Recomendado)

---

## Opção A: Instalação Local com MySQL

### Pré-requisitos

**Instalar MySQL:**
- **Windows:** Baixe em https://dev.mysql.com/downloads/installer/ e instale o "Developer Default"
- **Linux:** `sudo apt install mysql-server` (Ubuntu/Debian) ou equivalente
- **macOS:** `brew install mysql`

**Verificar se está rodando:**
- **Windows:** `Get-Service -Name MySQL80` ou verificar em Services (Win+R → `services.msc`)
- **Linux/macOS:** `sudo systemctl status mysql` ou `brew services list`

### 1. Clone o repositório (ou baixe o projeto)

```bash
git clone <url-do-repositorio>
cd laravel-to-do-list
```

### 2. Instale as dependências

```bash
composer install
```

### 3. Configure o arquivo de ambiente

Copie o arquivo `.env.example` para `.env`:

```bash
cp .env.example .env
```

Ou crie manualmente o arquivo `.env` com o seguinte conteúdo:

```env
APP_NAME="To-Do List"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_list
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### 4. Configure o banco de dados

**Edite o `.env`** e configure as credenciais:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_list
DB_USERNAME=root
DB_PASSWORD=sua_senha_aqui
```

**Crie o banco de dados:**
```bash
# Windows (se MySQL estiver no PATH)
mysql -u root -p

# Windows (se não estiver no PATH)
"C:\Program Files\MySQL\MySQL Server 8.0\bin\mysql.exe" -u root -p

# Linux/macOS
sudo mysql -u root -p
```

Depois de conectar, execute:
```sql
CREATE DATABASE todo_list CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
exit;
```

**Alternativa (via MySQL Workbench):** Crie o schema `todo_list` com collation `utf8mb4_unicode_ci`.

### 5. Gere a chave da aplicação

```bash
php artisan key:generate
```

**Importante:** Na primeira execução, o Laravel pode detectar que a tabela de migrations não existe e criar automaticamente, executando todas as migrations. Isso é normal e esperado!

### 6. Execute as migrations

```bash
php artisan migrate
```

Se você já executou `php artisan key:generate` e as migrations foram criadas automaticamente, este comando mostrará que todas as migrations já foram executadas. Se não, ele criará todas as tabelas necessárias.

**Tabelas criadas pelas migrations:**
- `migrations` - Tabela que registra quais migrations foram executadas
- `users` - Tabela de usuários para autenticação
- `tasks` - Tabela de tarefas (com suporte a soft delete)
- `password_reset_tokens` - Tokens para reset de senha
- `failed_jobs` - Jobs falhados
- `personal_access_tokens` - Tokens de acesso pessoal

### 7. Popule o banco com dados iniciais (Seeder)

Execute o seeder para criar um usuário padrão:

```bash
php artisan db:seed
```

**Credenciais padrão:**
- **Email:** `admin@todolist.com`
- **Senha:** `password`

### 8. Iniciar o servidor

Inicie o servidor de desenvolvimento do Laravel:

```bash
php artisan serve
```

A aplicação estará disponível em: `http://localhost:8000`

---

## Opção B: Instalação com Docker

**Pré-requisito:** Docker Desktop instalado e rodando.

1. **Crie os arquivos `docker-compose.yml` e `Dockerfile`** (veja estrutura básica abaixo)
2. **Configure o `.env`** com `DB_HOST=db`, `DB_USERNAME=root`, `DB_PASSWORD=root`
3. **Inicie:** `docker-compose up -d`
4. **Execute comandos:** `docker-compose exec app php artisan [comando]`
5. **Acesse:** `http://localhost:8000`

**Nota:** Por ser uma opção mais complexa, recomenda-se usar a Opção A (MySQL local) para testes rápidos. Para produção ou ambientes isolados, Docker é ideal.

## 📱 Como Usar

### 1. Acesse a aplicação

Abra seu navegador e acesse: `http://localhost:8000`

### 2. Faça login

Use as credenciais padrão:
- **Email:** `admin@todolist.com`
- **Senha:** `password`

### 3. Gerencie suas tarefas

- **Criar tarefa:** Clique em "Nova Tarefa" no menu
- **Listar tarefas:** Visualize todas as tarefas na página inicial
- **Filtrar:** Use o filtro por status para ver apenas pendentes ou concluídas
- **Editar:** Clique no ícone de lápis para editar uma tarefa
- **Visualizar:** Clique no ícone de olho para ver os detalhes
- **Excluir:** Clique no ícone de lixeira para excluir (soft delete)

## 🏗️ Estrutura do Projeto

```
laravel-to-do-list/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   │   └── AuthenticatedSessionController.php
│   │   │   └── TaskController.php
│   │   ├── Middleware/
│   │   └── Requests/
│   │       ├── StoreTaskRequest.php
│   │       └── UpdateTaskRequest.php
│   └── Models/
│       ├── Task.php
│       └── User.php
├── database/
│   ├── migrations/
│   │   ├── 2014_10_12_000000_create_users_table.php
│   │   └── 2024_01_01_000001_create_tasks_table.php
│   └── seeders/
│       └── DatabaseSeeder.php
├── resources/
│   └── views/
│       ├── auth/
│       │   └── login.blade.php
│       ├── layouts/
│       │   └── app.blade.php
│       └── tasks/
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── edit.blade.php
│           └── show.blade.php
├── routes/
│   ├── web.php
│   └── auth.php
└── README.md
```

## 🎯 Decisões Técnicas e Boas Práticas

### 1. **Arquitetura MVC**
- Separação clara de responsabilidades seguindo o padrão MVC do Laravel
- Controllers focados apenas na lógica de controle
- Models com relacionamentos e métodos auxiliares
- Views organizadas com layouts e partials

### 2. **Validação com FormRequest**
- Uso de `FormRequest` para validação de dados
- Mensagens de erro personalizadas em português
- Validação tanto na criação quanto na atualização

### 3. **Soft Delete**
- Implementação de soft delete para permitir restauração de tarefas
- Uso do trait `SoftDeletes` do Eloquent
- Método `restore()` no controller para restaurar tarefas excluídas

### 4. **Rotas RESTful**
- Uso de `Route::resource()` para criar rotas RESTful automaticamente
- Rotas nomeadas seguindo convenções do Laravel
- Middleware de autenticação protegendo todas as rotas

### 5. **Paginação**
- Paginação nativa do Laravel (10 itens por página)
- Manutenção dos filtros na paginação usando `withQueryString()`

### 6. **Interface e UX**
- Bootstrap 5 para UI moderna e responsiva
- Bootstrap Icons para ícones consistentes
- Feedback visual com mensagens de sucesso/erro
- Confirmações antes de excluir tarefas
- Estados vazios informativos

### 7. **Autenticação**
- Sistema de autenticação nativo do Laravel
- Middleware `auth` protegendo todas as rotas de tarefas
- Seeder para criar usuário padrão

### 8. **Código Limpo**
- Nomes descritivos em português
- Comentários explicativos
- Métodos auxiliares no Model (ex: `isCompleted()`, `isPending()`)
- Código organizado e legível

## 🔮 Melhorias Futuras

1. **Funcionalidades Adicionais:**
   - Categorias/Tags para tarefas
   - Prioridade (alta, média, baixa)
   - Data de vencimento
   - Notificações por email
   - Busca por título/descrição
   - Ordenação por diferentes critérios

2. **Melhorias Técnicas:**
   - Testes automatizados (PHPUnit/Pest)
   - API REST para integração
   - Upload de anexos nas tarefas
   - Histórico de alterações (audit log)
   - Exportação de tarefas (PDF/Excel)

3. **UX/UI:**
   - Drag and drop para reordenar tarefas
   - Modo escuro
   - Filtros avançados
   - Atalhos de teclado
   - Aplicativo mobile (PWA)

4. **Performance:**
   - Cache de queries frequentes
   - Lazy loading de imagens
   - Otimização de queries N+1

## 📝 Comandos Artisan Úteis

```bash
# Criar nova migration
php artisan make:migration create_tasks_table

# Executar migrations
php artisan migrate

# Reverter última migration
php artisan migrate:rollback

# Executar seeders
php artisan db:seed

# Limpar cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Criar novo controller
php artisan make:controller TaskController --resource

# Criar novo model
php artisan make:model Task -m
```

## 🐛 Solução de Problemas

### Extensão PHP faltando
**Erro: "ext-fileinfo is missing"**
- Abra `php.ini` (localize com `php --ini`)
- Descomente: `;extension=fileinfo` → `extension=fileinfo`
- Reinicie o terminal

### Erro de conexão com banco
- Verifique se MySQL está rodando: `Get-Service -Name MySQL80` (Windows) ou `sudo systemctl status mysql` (Linux)
- Confirme credenciais no `.env`
- Verifique se o banco existe: `SHOW DATABASES;` no MySQL

### Erro 500
```bash
php artisan config:clear && php artisan cache:clear && php artisan view:clear
```

### MySQL não inicia (Windows)
- Verifique em Services (`services.msc`) ou via PowerShell: `net start MySQL80`
- Se necessário, reinstale: `mysqld --install MySQL80` (na pasta bin do MySQL)

### Docker
- Docker não conecta: Verifique se Docker Desktop está rodando (`docker ps`)
- Porta em uso: Altere no `docker-compose.yml`
- Container não inicia: `docker-compose logs app` para ver erros

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 👨‍💻 Desenvolvido por

Desenvolvido como parte de um teste técnico para vaga de estágio em desenvolvimento web.

---

**Nota:** Esta aplicação foi desenvolvida seguindo as melhores práticas do Laravel e está pronta para ser expandida com novas funcionalidades conforme necessário.

<a href="https://drive.google.com/file/d/16Ps4pLa-E9lVU-SSsGnKCGoYKz8L29dP/view?usp=sharing" target="_blank" rel="noopener noreferrer">
  🔗 Clique aqui para assistir no Google Drive
</a>
