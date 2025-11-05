# 📋 To-Do List - Aplicação Laravel

Aplicação web desenvolvida em Laravel para gerenciamento de lista de tarefas (to-do list), desenvolvida como parte de um teste técnico para vaga de estágio em desenvolvimento web.

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

### Pré-requisitos: Instalar MySQL

#### Windows
1. Baixe o MySQL Installer em: https://dev.mysql.com/downloads/installer/
2. Execute o instalador e escolha "Developer Default"
3. Durante a instalação, defina uma senha para o usuário `root`
4. Verifique se o MySQL está rodando:
   - Abra o **Services** (Win+R → `services.msc`)
   - Procure por "MySQL80" ou "MySQL" e verifique se está "Running"
   - Ou pelo terminal: `net start MySQL80` (pode precisar de privilégios de administrador)

#### Linux (Ubuntu/Debian)
```bash
# Instalar MySQL
sudo apt update
sudo apt install mysql-server

# Iniciar serviço MySQL
sudo systemctl start mysql
sudo systemctl enable mysql

# Verificar status
sudo systemctl status mysql

# Configurar segurança (opcional, mas recomendado)
sudo mysql_secure_installation
```

#### macOS
```bash
# Usando Homebrew
brew install mysql

# Iniciar MySQL
brew services start mysql

# Verificar status
brew services list
```

#### Verificar se MySQL está funcionando
```bash
# Conectar ao MySQL
mysql -u root -p

# Se conseguir conectar, está funcionando!
# Digite 'exit' para sair
```

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

#### 4.1. Edite o arquivo `.env`

Edite o arquivo `.env` e configure as credenciais do seu banco de dados:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_list
DB_USERNAME=root
DB_PASSWORD=sua_senha_aqui
```

**Importante:** Substitua `sua_senha_aqui` pela senha que você configurou ao instalar o MySQL.

#### 4.2. Crie o banco de dados

Conecte-se ao MySQL e crie o banco de dados:

**Windows:**
```bash
mysql -u root -p
```

**Linux/macOS:**
```bash
sudo mysql -u root -p
# ou
mysql -u root -p
```

Depois de conectar, execute:

```sql
CREATE DATABASE todo_list CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
exit;
```

**Alternativa via linha de comando (sem abrir o MySQL):**

```bash
# Windows
mysql -u root -p -e "CREATE DATABASE todo_list CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Linux/macOS
sudo mysql -u root -p -e "CREATE DATABASE todo_list CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

#### 4.3. Verificar conexão com o banco

Para testar se a conexão está funcionando, você pode executar:

```bash
php artisan migrate:status
```

Se não aparecer erros de conexão, está tudo certo!

### 5. Gere a chave da aplicação

```bash
php artisan key:generate
```

### 6. Execute as migrations

```bash
php artisan migrate
```

Isso criará todas as tabelas necessárias:
- `users` - Tabela de usuários para autenticação
- `tasks` - Tabela de tarefas
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

### 8. Configure o servidor de desenvolvimento

Inicie o servidor de desenvolvimento do Laravel:

```bash
php artisan serve
```

A aplicação estará disponível em: `http://localhost:8000`

---

## Opção B: Instalação com Docker

### Pré-requisitos
- Docker Desktop instalado e rodando
- Verifique se está funcionando: `docker --version` e `docker-compose --version`

### 1. Clone o repositório

```bash
git clone <url-do-repositorio>
cd laravel-to-do-list
```

### 2. Crie o arquivo docker-compose.yml

Crie um arquivo `docker-compose.yml` na raiz do projeto:

```yaml
version: '3.8'

services:
  app:
    build:
      context: .
      dockerfile: Dockerfile
    container_name: todo-list-app
    ports:
      - "8000:8000"
    volumes:
      - .:/var/www/html
    depends_on:
      - db
    environment:
      - DB_HOST=db
      - DB_DATABASE=todo_list
      - DB_USERNAME=root
      - DB_PASSWORD=root

  db:
    image: mysql:8.0
    container_name: todo-list-db
    ports:
      - "3306:3306"
    environment:
      - MYSQL_DATABASE=todo_list
      - MYSQL_ROOT_PASSWORD=root
    volumes:
      - db_data:/var/lib/mysql

volumes:
  db_data:
```

### 3. Crie o Dockerfile

Crie um arquivo `Dockerfile` na raiz do projeto:

```dockerfile
FROM php:8.2-fpm

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalar Node.js e npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Configurar diretório de trabalho
WORKDIR /var/www/html

# Copiar arquivos do projeto
COPY . .

# Instalar dependências
RUN composer install --no-dev --optimize-autoloader

# Configurar permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expor porta
EXPOSE 8000

# Comando para iniciar
CMD php artisan serve --host=0.0.0.0 --port=8000
```

### 4. Configure o arquivo .env

Crie o arquivo `.env` com as configurações do Docker:

```env
APP_NAME="To-Do List"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=todo_list
DB_USERNAME=root
DB_PASSWORD=root

# ... resto das configurações (veja seção anterior)
```

### 5. Inicie os containers

```bash
docker-compose up -d
```

### 6. Execute comandos dentro do container

```bash
# Gerar chave da aplicação
docker-compose exec app php artisan key:generate

# Executar migrations
docker-compose exec app php artisan migrate

# Executar seeders
docker-compose exec app php artisan db:seed
```

### 7. Acesse a aplicação

A aplicação estará disponível em: `http://localhost:8000`

### Comandos úteis do Docker

```bash
# Ver logs
docker-compose logs -f

# Parar containers
docker-compose down

# Parar e remover volumes (apaga banco de dados)
docker-compose down -v

# Reiniciar containers
docker-compose restart
```

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

### Erro: "No application encryption key has been specified"
```bash
php artisan key:generate
```

### Erro de conexão com banco de dados

**Erro: "SQLSTATE[HY000] [2002] No connection could be made"**

1. Verifique se o MySQL está rodando:
   - **Windows:** Abra Services (Win+R → `services.msc`) e procure por MySQL
   - **Linux:** `sudo systemctl status mysql`
   - **macOS:** `brew services list`

2. Verifique as credenciais no `.env`:
   ```env
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=todo_list
   DB_USERNAME=root
   DB_PASSWORD=sua_senha_correta
   ```

3. Teste a conexão manualmente:
   ```bash
   mysql -u root -p
   ```

4. Verifique se o banco de dados existe:
   ```sql
   SHOW DATABASES;
   ```

**Erro: "SQLSTATE[HY000] [1045] Access denied for user"**

- Verifique se o usuário e senha estão corretos no `.env`
- Se esqueceu a senha do root, veja como resetar:
  - **Windows/Linux:** https://dev.mysql.com/doc/refman/8.0/en/resetting-permissions.html
  - **macOS:** `brew services stop mysql` e siga as instruções de reset

**Erro: "Unknown database 'todo_list'"**

- Crie o banco de dados:
  ```sql
  CREATE DATABASE todo_list CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
  ```

### Erro 500 após instalação
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### Permissões de diretório (Linux/Mac)
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### MySQL não inicia no Windows

1. Verifique se o serviço está configurado:
   ```bash
   net start MySQL80
   ```

2. Se não funcionar, tente reinstalar o serviço:
   ```bash
   # Na pasta bin do MySQL (geralmente C:\Program Files\MySQL\MySQL Server 8.0\bin)
   mysqld --install
   net start MySQL80
   ```

3. Verifique os logs de erro em:
   - `C:\ProgramData\MySQL\MySQL Server 8.0\Data\*.err`

### Problemas com Docker

**Erro: "Cannot connect to Docker daemon"**

- Certifique-se de que o Docker Desktop está rodando
- Verifique se o Docker está iniciado: `docker ps`

**Erro: "Port already in use"**

- Se a porta 8000 ou 3306 já estiver em uso, altere no `docker-compose.yml`:
  ```yaml
  ports:
    - "8001:8000"  # Mude para outra porta
  ```

**Container não inicia**

- Verifique os logs: `docker-compose logs app`
- Reconstrua os containers: `docker-compose up -d --build`

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 👨‍💻 Desenvolvido por

Desenvolvido como parte de um teste técnico para vaga de estágio em desenvolvimento web.

---

**Nota:** Esta aplicação foi desenvolvida seguindo as melhores práticas do Laravel e está pronta para ser expandida com novas funcionalidades conforme necessário.
