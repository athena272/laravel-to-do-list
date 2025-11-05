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

**Passo a passo completo:**

1. **Baixe o MySQL Installer:**
   - Acesse: https://dev.mysql.com/downloads/installer/
   - Escolha a opção **"mysql-installer-community"** (versão web ou offline)
   - A versão **web** é menor (~2MB) e baixa os componentes durante a instalação
   - A versão **offline** é maior (~400MB) mas não precisa de internet durante instalação

2. **Execute o instalador:**
   - Clique com botão direito e escolha **"Executar como administrador"**
   - Aceite os termos de licença
   - Escolha **"Developer Default"** (inclui MySQL Server, Workbench, etc.)

3. **Durante a instalação:**
   - Se aparecer algum aviso sobre dependências faltando (como Visual C++), clique em "Execute" para instalar automaticamente
   - Aguarde a instalação dos componentes (pode levar alguns minutos)
   - Na tela **"Type and Networking"**, mantenha as opções padrão:
     - Config Type: **Development Computer**
     - Port: **3306** (porta padrão)

4. **Configure o servidor:**
   - Na tela **"Authentication Method"**, escolha:
     - **"Use Strong Password Encryption"** (recomendado para MySQL 8.0+)
   - Na tela **"Accounts and Roles"**:
     - **Defina uma senha para o usuário `root`** (ANOTE ESSA SENHA, você precisará!)
     - Opcional: Crie um usuário adicional se desejar

5. **Finalize a instalação:**
   - Na tela **"Windows Service"**, mantenha:
     - Windows Service Name: **MySQL80** (ou MySQL)
     - ✅ **Start the MySQL Server at System Startup** (marcado)
     - ✅ **Run Windows Service as** → **Standard System Account**
   - Clique em **"Execute"** para aplicar as configurações
   - Aguarde a conclusão e clique em **"Finish"**

6. **Adicionar MySQL ao PATH (opcional, mas recomendado):**
   
   O MySQL geralmente é instalado em: `C:\Program Files\MySQL\MySQL Server 8.0\bin`
   
   Para adicionar ao PATH:
   - Pressione **Win + X** e escolha **"Sistema"**
   - Clique em **"Configurações avançadas do sistema"**
   - Clique em **"Variáveis de Ambiente"**
   - Em **"Variáveis do sistema"**, encontre **Path** e clique em **"Editar"**
   - Clique em **"Novo"** e adicione: `C:\Program Files\MySQL\MySQL Server 8.0\bin`
   - Clique em **"OK"** em todas as janelas
   - **Feche e abra novamente o terminal** para que as mudanças tenham efeito

7. **Verificar se o MySQL está rodando:**

   **Opção 1 - Via Services (Serviços do Windows):**
   - Pressione **Win + R**
   - Digite: `services.msc` e pressione Enter
   - Procure por **"MySQL80"** ou **"MySQL"**
   - O status deve estar como **"Em execução"**
   - Se não estiver, clique com botão direito → **"Iniciar"**

   **Opção 2 - Via Terminal (PowerShell como Administrador):**
   ```powershell
   # Verificar status do serviço
   Get-Service -Name MySQL80
   
   # Se não estiver rodando, iniciar:
   net start MySQL80
   ```

8. **Testar conexão com o MySQL:**
   
   Abra um novo terminal (PowerShell ou CMD) e execute:
   ```powershell
   mysql -u root -p
   ```
   
   - Digite a senha que você configurou durante a instalação
   - Se conseguir conectar, você verá: `mysql>`
   - Digite `exit;` para sair
   
   **Se aparecer erro "mysql não é reconhecido":**
   - O MySQL não está no PATH, use o caminho completo:
   ```powershell
   "C:\Program Files\MySQL\MySQL Server 8.0\bin\mysql.exe" -u root -p
   ```
   - Ou adicione ao PATH conforme passo 6 acima

9. **MySQL Workbench (opcional, mas útil):**
   
   O MySQL Workbench geralmente é instalado automaticamente com o "Developer Default". Você pode usá-lo para:
   - Gerenciar bancos de dados visualmente
   - Executar queries SQL
   - Criar e gerenciar tabelas
   
   Procure por "MySQL Workbench" no menu Iniciar.

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

**Para Windows - Você tem 3 opções:**

**Opção 1: Via Linha de Comando (PowerShell/CMD)**

Se o MySQL está no PATH:
```powershell
mysql -u root -p
```

Se o MySQL não está no PATH (use o caminho completo):
```powershell
"C:\Program Files\MySQL\MySQL Server 8.0\bin\mysql.exe" -u root -p
```

Depois de conectar (digite a senha quando solicitado), execute:
```sql
CREATE DATABASE todo_list CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
exit;
```

**Opção 2: Via Linha de Comando (sem abrir o MySQL interativamente)**

Se o MySQL está no PATH:
```powershell
mysql -u root -p -e "CREATE DATABASE todo_list CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

Se o MySQL não está no PATH:
```powershell
"C:\Program Files\MySQL\MySQL Server 8.0\bin\mysql.exe" -u root -p -e "CREATE DATABASE todo_list CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

**Opção 3: Via MySQL Workbench (Recomendado para iniciantes)**

1. Abra o **MySQL Workbench** (procure no menu Iniciar)
2. Clique em **"Local instance MySQL80"** (ou clique no ícone de conexão)
3. Digite a senha do root quando solicitado
4. No painel lateral esquerdo, clique com botão direito em **"Schemas"**
5. Selecione **"Create Schema..."**
6. Em **"Name"**, digite: `todo_list`
7. Em **"Collation"**, selecione: `utf8mb4_unicode_ci`
8. Clique em **"Apply"** e depois em **"Finish"**
9. Pronto! O banco de dados foi criado.

**Para Linux/macOS:**

```bash
# Conectar ao MySQL
sudo mysql -u root -p
# ou (se não precisar de sudo)
mysql -u root -p

# Depois de conectar, execute:
CREATE DATABASE todo_list CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
exit;
```

**Alternativa via linha de comando (sem abrir o MySQL):**

```bash
sudo mysql -u root -p -e "CREATE DATABASE todo_list CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

**Verificar se o banco foi criado:**

No terminal MySQL:
```sql
SHOW DATABASES;
```

Você deve ver `todo_list` na lista.

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

### Erro: "ext-fileinfo * -> it is missing from your system"

A extensão `fileinfo` do PHP não está habilitada. Para habilitar:

1. **Localize o arquivo php.ini:**
   ```bash
   php --ini
   ```
   Você verá algo como: `C:\php\php.ini`

2. **Abra o arquivo php.ini em um editor de texto** (como Notepad++, VS Code, etc.)

3. **Procure pela linha:**
   ```ini
   ;extension=fileinfo
   ```

4. **Remova o ponto e vírgula (;) do início da linha:**
   ```ini
   extension=fileinfo
   ```

5. **Salve o arquivo**

6. **Reinicie o servidor web** (se estiver usando Apache/Nginx) ou **feche e abra novamente o terminal**

7. **Verifique se a extensão está habilitada:**
   ```bash
   php -m | findstr fileinfo
   ```
   Se aparecer `fileinfo`, está funcionando!

8. **Tente instalar novamente:**
   ```bash
   composer install
   ```

**Nota:** Se você não encontrar `;extension=fileinfo` no arquivo, adicione a linha `extension=fileinfo` na seção de extensões.

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

### Problemas Específicos do MySQL no Windows

**1. MySQL não inicia no Windows**

**Via Services (Serviços):**
1. Pressione **Win + R**, digite `services.msc` e pressione Enter
2. Procure por **"MySQL80"** ou **"MySQL"**
3. Clique com botão direito → **"Iniciar"**
4. Se aparecer erro, anote a mensagem de erro

**Via PowerShell (como Administrador):**
```powershell
# Verificar status do serviço
Get-Service -Name MySQL80

# Tentar iniciar
net start MySQL80

# Se não funcionar, verificar se o serviço existe
Get-Service | Where-Object {$_.DisplayName -like "*MySQL*"}
```

**Se o serviço não existir ou não iniciar:**
1. Abra o PowerShell **como Administrador**
2. Navegue até a pasta bin do MySQL:
   ```powershell
   cd "C:\Program Files\MySQL\MySQL Server 8.0\bin"
   ```
3. Reinstale o serviço:
   ```powershell
   .\mysqld.exe --install MySQL80
   ```
4. Inicie o serviço:
   ```powershell
   net start MySQL80
   ```

**2. Verificar logs de erro:**

Os logs do MySQL estão em:
```
C:\ProgramData\MySQL\MySQL Server 8.0\Data\*.err
```

Para ver o último erro:
```powershell
Get-Content "C:\ProgramData\MySQL\MySQL Server 8.0\Data\*.err" -Tail 50
```

**3. Erro: "mysql não é reconhecido como comando"**

**Solução 1 - Adicionar ao PATH:**
- Veja as instruções no passo 6 da seção de instalação do MySQL

**Solução 2 - Usar caminho completo:**
```powershell
"C:\Program Files\MySQL\MySQL Server 8.0\bin\mysql.exe" -u root -p
```

**4. Esqueceu a senha do root do MySQL**

**Método 1 - Via arquivo de texto (Recomendado):**

1. Crie um arquivo de texto: `C:\reset_password.txt` com o conteúdo:
   ```
   ALTER USER 'root'@'localhost' IDENTIFIED BY 'nova_senha_aqui';
   ```

2. Pare o serviço MySQL:
   ```powershell
   net stop MySQL80
   ```

3. Inicie o MySQL em modo seguro (sem verificação de senha):
   ```powershell
   cd "C:\Program Files\MySQL\MySQL Server 8.0\bin"
   .\mysqld.exe --init-file=C:\reset_password.txt --console
   ```
   Deixe esse terminal aberto!

4. Abra **outro** terminal e conecte:
   ```powershell
   "C:\Program Files\MySQL\MySQL Server 8.0\bin\mysql.exe" -u root -p
   ```
   (Digite a nova senha que você colocou no arquivo)

5. Feche o MySQL em modo seguro (Ctrl+C no primeiro terminal)

6. Inicie o MySQL normalmente:
   ```powershell
   net start MySQL80
   ```

7. Delete o arquivo de reset:
   ```powershell
   Remove-Item C:\reset_password.txt
   ```

**Método 2 - Usando MySQL Installer (Mais fácil):**
1. Abra o MySQL Installer
2. Selecione **"Reconfigure"** no MySQL Server
3. Siga as instruções e defina uma nova senha

**5. Porta 3306 já está em uso**

Se outro programa estiver usando a porta 3306:

```powershell
# Ver o que está usando a porta 3306
netstat -ano | findstr :3306

# Você verá algo como: TCP    0.0.0.0:3306    0.0.0.0:0    LISTENING    1234
# O número 1234 é o PID (Process ID)

# Ver qual programa é esse PID:
tasklist | findstr 1234

# Se for outro MySQL ou aplicação, você pode:
# - Parar o outro serviço
# - Ou mudar a porta do MySQL no arquivo my.ini
```

Para mudar a porta do MySQL:
1. Abra: `C:\ProgramData\MySQL\MySQL Server 8.0\my.ini`
2. Procure por `port=3306` e mude para outra porta (ex: `port=3307`)
3. Reinicie o serviço MySQL
4. Atualize o `.env` do Laravel com a nova porta

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
