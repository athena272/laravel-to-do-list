# 🔧 Guia Completo das Variáveis do Arquivo .env

## 📋 Índice

1. [O que é o arquivo .env?](#o-que-é)
2. [Por que usar .env?](#por-que-usar)
3. [Variáveis de Aplicação (APP_*)](#variáveis-app)
4. [Variáveis de Banco de Dados (DB_*)](#variáveis-database)
5. [Variáveis de Cache (CACHE_*)](#variáveis-cache)
6. [Variáveis de Sessão (SESSION_*)](#variáveis-session)
7. [Variáveis de Log (LOG_*)](#variáveis-log)
8. [Variáveis de Email (MAIL_*)](#variáveis-mail)
9. [Variáveis de Redis (REDIS_*)](#variáveis-redis)
10. [Variáveis de Broadcast (BROADCAST_*)](#variáveis-broadcast)
11. [Variáveis de Queue (QUEUE_*)](#variáveis-queue)
12. [Variáveis de Filesystem (FILESYSTEM_*)](#variáveis-filesystem)
13. [Variáveis Importantes para Este Projeto](#importantes-para-este-projeto)
14. [Como Configurar](#como-configurar)

---

## 🎯 O que é o arquivo .env?

O arquivo `.env` (environment = ambiente) é um arquivo de configuração que contém **variáveis de ambiente** específicas para cada ambiente onde a aplicação roda (desenvolvimento, testes, produção).

### Características:

- ✅ **NÃO é commitado no Git** (está no `.gitignore`)
- ✅ **Contém dados sensíveis** (senhas, chaves, tokens)
- ✅ **Específico para cada ambiente** (cada desenvolvedor tem o seu)
- ✅ **Facilita configuração** sem alterar código

### Exemplo de estrutura:

```env
APP_NAME="To-Do List"
APP_ENV=local
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxx
DB_PASSWORD=minha_senha_secreta
```

---

## 🤔 Por que usar .env?

### Problemas que resolve:

1. **Segurança:**
   - Senhas e tokens não ficam no código
   - Não são commitados no Git
   - Cada ambiente tem suas próprias credenciais

2. **Flexibilidade:**
   - Mesmo código funciona em diferentes ambientes
   - Desenvolvimento: `DB_HOST=127.0.0.1`
   - Produção: `DB_HOST=db.producao.com`

3. **Organização:**
   - Todas as configurações em um só lugar
   - Fácil de encontrar e alterar

### Como funciona:

```php
// No arquivo config/app.php
'name' => env('APP_NAME', 'Laravel'),

// O Laravel lê a variável APP_NAME do .env
// Se não encontrar, usa o valor padrão 'Laravel'
```

---

## 📱 Variáveis de Aplicação (APP_*)

### `APP_NAME`
**O que é:** Nome da aplicação  
**Exemplo:** `APP_NAME="To-Do List"`  
**Onde é usado:**
- Título da aplicação
- Emails enviados pela aplicação
- Logs e mensagens de sistema

**Relevância:** ⭐⭐⭐⭐ (Importante para identificação)

### `APP_ENV`
**O que é:** Ambiente da aplicação  
**Valores possíveis:**
- `local` - Desenvolvimento local
- `testing` - Testes automatizados
- `staging` - Ambiente de testes antes de produção
- `production` - Produção (usuários finais)

**Exemplo:** `APP_ENV=local`  
**Onde é usado:**
- Determina comportamentos diferentes por ambiente
- Em produção: menos logs, mais segurança
- Em local: mais debug, mais informações

**Relevância:** ⭐⭐⭐⭐⭐ (Crítico - afeta comportamento da aplicação)

### `APP_KEY`
**O que é:** Chave de criptografia da aplicação  
**Exemplo:** `APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxx`  
**Onde é usado:**
- Criptografar dados sensíveis
- Cookies e sessões
- Tokens CSRF

**Como gerar:**
```bash
php artisan key:generate
```

**Relevância:** ⭐⭐⭐⭐⭐ (Crítico - necessário para segurança)

⚠️ **IMPORTANTE:** Sem esta chave, a aplicação não funciona corretamente!

### `APP_DEBUG`
**O que é:** Modo de debug  
**Valores:**
- `true` - Mostra erros detalhados (desenvolvimento)
- `false` - Oculta erros (produção)

**Exemplo:** `APP_DEBUG=true`  
**Onde é usado:**
- Páginas de erro mostram detalhes
- Logs mais verbosos

**Relevância:** ⭐⭐⭐⭐⭐ (Crítico - segurança)

⚠️ **NUNCA use `APP_DEBUG=true` em produção!** Expõe informações sensíveis.

### `APP_URL`
**O que é:** URL base da aplicação  
**Exemplo:** `APP_URL=http://localhost` ou `APP_URL=https://meusite.com`  
**Onde é usado:**
- Geração de URLs absolutas
- Links em emails
- Redirecionamentos

**Relevância:** ⭐⭐⭐⭐ (Importante para URLs corretas)

---

## 🗄️ Variáveis de Banco de Dados (DB_*)

### `DB_CONNECTION`
**O que é:** Tipo de banco de dados  
**Valores:** `mysql`, `pgsql`, `sqlite`, `sqlsrv`  
**Exemplo:** `DB_CONNECTION=mysql`  
**Relevância:** ⭐⭐⭐⭐⭐ (Crítico - define qual banco usar)

### `DB_HOST`
**O que é:** Endereço do servidor do banco  
**Exemplo:** `DB_HOST=127.0.0.1` (local) ou `DB_HOST=db.example.com` (produção)  
**Relevância:** ⭐⭐⭐⭐⭐ (Crítico - conexão com banco)

### `DB_PORT`
**O que é:** Porta do banco de dados  
**Valores padrão:**
- MySQL: `3306`
- PostgreSQL: `5432`
- SQLite: não precisa

**Exemplo:** `DB_PORT=3306`  
**Relevância:** ⭐⭐⭐ (Geralmente usa padrão)

### `DB_DATABASE`
**O que é:** Nome do banco de dados  
**Exemplo:** `DB_DATABASE=todo_list`  
**Relevância:** ⭐⭐⭐⭐⭐ (Crítico - qual banco usar)

### `DB_USERNAME`
**O que é:** Usuário do banco de dados  
**Exemplo:** `DB_USERNAME=root` (local) ou `DB_USERNAME=app_user` (produção)  
**Relevância:** ⭐⭐⭐⭐⭐ (Crítico - autenticação)

### `DB_PASSWORD`
**O que é:** Senha do banco de dados  
**Exemplo:** `DB_PASSWORD=minha_senha_secreta`  
**Relevância:** ⭐⭐⭐⭐⭐ (Crítico - autenticação)

⚠️ **NUNCA commite esta variável no Git!**

### `DATABASE_URL` (Opcional)
**O que é:** URL completa de conexão (alternativa às variáveis acima)  
**Exemplo:** `DATABASE_URL=mysql://user:password@127.0.0.1:3306/database`  
**Relevância:** ⭐⭐ (Opcional - geralmente não usado)

---

## 💾 Variáveis de Cache (CACHE_*)

### `CACHE_DRIVER`
**O que é:** Driver de cache  
**Valores:**
- `file` - Arquivos (mais simples, desenvolvimento)
- `redis` - Redis (mais rápido, produção)
- `memcached` - Memcached
- `database` - Banco de dados

**Exemplo:** `CACHE_DRIVER=file`  
**Onde é usado:**
- Cache de configurações
- Cache de views
- Cache de queries

**Relevância:** ⭐⭐⭐ (Importante para performance)

**Para este projeto:** `file` é suficiente (desenvolvimento)

---

## 🍪 Variáveis de Sessão (SESSION_*)

### `SESSION_DRIVER`
**O que é:** Onde armazenar sessões  
**Valores:**
- `file` - Arquivos (desenvolvimento)
- `database` - Banco de dados
- `redis` - Redis
- `cookie` - Cookies (não recomendado)

**Exemplo:** `SESSION_DRIVER=file`  
**Relevância:** ⭐⭐⭐⭐ (Importante - autenticação precisa)

**Para este projeto:** `file` é suficiente

### `SESSION_LIFETIME`
**O que é:** Tempo de vida da sessão em minutos  
**Exemplo:** `SESSION_LIFETIME=120` (2 horas)  
**Relevância:** ⭐⭐⭐ (Controla quando usuário precisa fazer login novamente)

---

## 📝 Variáveis de Log (LOG_*)

### `LOG_CHANNEL`
**O que é:** Canal de log padrão  
**Valores:**
- `stack` - Múltiplos canais (padrão)
- `single` - Um arquivo
- `daily` - Arquivo por dia
- `slack` - Envia para Slack
- `syslog` - Sistema operacional

**Exemplo:** `LOG_CHANNEL=stack`  
**Relevância:** ⭐⭐⭐ (Como os logs são armazenados)

### `LOG_LEVEL`
**O que é:** Nível mínimo de log  
**Valores:** `debug`, `info`, `notice`, `warning`, `error`, `critical`, `alert`, `emergency`  
**Exemplo:** `LOG_LEVEL=debug`  
**Relevância:** ⭐⭐⭐ (Controla verbosidade dos logs)

**Para este projeto:** `debug` em desenvolvimento, `error` em produção

---

## 📧 Variáveis de Email (MAIL_*)

### `MAIL_MAILER`
**O que é:** Sistema de envio de email  
**Valores:**
- `smtp` - SMTP (mais comum)
- `sendmail` - Sendmail
- `mailgun` - Mailgun
- `ses` - Amazon SES
- `log` - Apenas log (desenvolvimento)

**Exemplo:** `MAIL_MAILER=smtp`  
**Relevância:** ⭐⭐ (Só se usar emails no projeto)

**Para este projeto:** Não usado (to-do list simples)

### `MAIL_HOST`
**O que é:** Servidor SMTP  
**Exemplo:** `MAIL_HOST=smtp.gmail.com`  
**Relevância:** ⭐⭐ (Só se usar SMTP)

### `MAIL_PORT`
**O que é:** Porta do servidor SMTP  
**Exemplo:** `MAIL_PORT=587` (TLS) ou `465` (SSL)  
**Relevância:** ⭐⭐ (Só se usar SMTP)

### `MAIL_USERNAME` e `MAIL_PASSWORD`
**O que é:** Credenciais do servidor SMTP  
**Relevância:** ⭐⭐ (Só se usar SMTP)

### `MAIL_FROM_ADDRESS` e `MAIL_FROM_NAME`
**O que é:** Email e nome do remetente  
**Exemplo:** `MAIL_FROM_ADDRESS="noreply@example.com"`  
**Relevância:** ⭐⭐ (Só se usar emails)

---

## 🔴 Variáveis de Redis (REDIS_*)

### `REDIS_HOST`
**O que é:** Endereço do servidor Redis  
**Exemplo:** `REDIS_HOST=127.0.0.1`  
**Relevância:** ⭐⭐ (Só se usar Redis para cache/filas)

**Para este projeto:** Não usado (projeto simples não precisa)

### `REDIS_PASSWORD`
**O que é:** Senha do Redis  
**Relevância:** ⭐⭐ (Só se usar Redis)

### `REDIS_PORT`
**O que é:** Porta do Redis  
**Exemplo:** `REDIS_PORT=6379`  
**Relevância:** ⭐⭐ (Só se usar Redis)

---

## 📡 Variáveis de Broadcast (BROADCAST_*)

### `BROADCAST_DRIVER`
**O que é:** Driver para broadcast (WebSockets, etc.)  
**Valores:** `pusher`, `redis`, `log`, `null`  
**Exemplo:** `BROADCAST_DRIVER=log`  
**Relevância:** ⭐ (Só se usar real-time features)

**Para este projeto:** `log` ou `null` (não usado)

---

## 📬 Variáveis de Queue (QUEUE_*)

### `QUEUE_CONNECTION`
**O que é:** Conexão para filas (jobs em background)  
**Valores:**
- `sync` - Síncrono (executa imediatamente)
- `database` - Banco de dados
- `redis` - Redis
- `sqs` - Amazon SQS

**Exemplo:** `QUEUE_CONNECTION=sync`  
**Relevância:** ⭐⭐ (Só se usar jobs assíncronos)

**Para este projeto:** `sync` é suficiente (sem jobs assíncronos)

---

## 📁 Variáveis de Filesystem (FILESYSTEM_*)

### `FILESYSTEM_DISK`
**O que é:** Disco padrão para armazenamento  
**Valores:**
- `local` - Sistema de arquivos local
- `public` - Público (acessível via web)
- `s3` - Amazon S3

**Exemplo:** `FILESYSTEM_DISK=local`  
**Relevância:** ⭐⭐ (Só se fazer upload de arquivos)

**Para este projeto:** `local` é suficiente

---

## 🎯 Variáveis Importantes para Este Projeto

### ✅ **ESSENCIAIS (Precisam estar configuradas):**

1. **`APP_NAME`** - Nome da aplicação
2. **`APP_ENV`** - Ambiente (local em desenvolvimento)
3. **`APP_KEY`** - Chave de criptografia (gerar com `php artisan key:generate`)
4. **`APP_DEBUG`** - Debug (true em dev, false em produção)
5. **`APP_URL`** - URL da aplicação
6. **`DB_CONNECTION`** - Tipo de banco (mysql)
7. **`DB_HOST`** - Servidor do banco
8. **`DB_PORT`** - Porta do banco
9. **`DB_DATABASE`** - Nome do banco
10. **`DB_USERNAME`** - Usuário do banco
11. **`DB_PASSWORD`** - Senha do banco

### ⚠️ **IMPORTANTES (Afetam funcionamento):**

1. **`SESSION_DRIVER`** - Como armazenar sessões
2. **`SESSION_LIFETIME`** - Tempo de sessão
3. **`CACHE_DRIVER`** - Sistema de cache
4. **`LOG_CHANNEL`** - Sistema de logs

### ⭐ **OPCIONAIS (Não usadas neste projeto):**

- Variáveis de email (MAIL_*)
- Variáveis de Redis (REDIS_*)
- Variáveis de broadcast (BROADCAST_*)
- Variáveis de queue (QUEUE_*)

---

## 🔧 Como Configurar

### 1. Criar arquivo .env

Se não existe, copie o `.env.example`:

```bash
cp .env.example .env
```

### 2. Configurar variáveis essenciais

Edite o arquivo `.env` e configure:

```env
APP_NAME="To-Do List"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_list
DB_USERNAME=root
DB_PASSWORD=sua_senha_aqui

CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120
LOG_CHANNEL=stack
LOG_LEVEL=debug

BROADCAST_DRIVER=log
QUEUE_CONNECTION=sync
FILESYSTEM_DISK=local
```

### 3. Gerar chave da aplicação

```bash
php artisan key:generate
```

Isso preenche automaticamente o `APP_KEY`.

### 4. Verificar configuração

```bash
php artisan config:clear
php artisan config:cache
```

---

## 📊 Exemplo Completo de .env para Este Projeto

```env
# ============================================
# APLICAÇÃO
# ============================================
APP_NAME="To-Do List"
APP_ENV=local
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxx
APP_DEBUG=true
APP_URL=http://localhost:8000

# ============================================
# BANCO DE DADOS
# ============================================
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_list
DB_USERNAME=root
DB_PASSWORD=

# ============================================
# CACHE
# ============================================
CACHE_DRIVER=file

# ============================================
# SESSÃO
# ============================================
SESSION_DRIVER=file
SESSION_LIFETIME=120

# ============================================
# LOGS
# ============================================
LOG_CHANNEL=stack
LOG_LEVEL=debug

# ============================================
# BROADCAST
# ============================================
BROADCAST_DRIVER=log

# ============================================
# FILAS (QUEUE)
# ============================================
QUEUE_CONNECTION=sync

# ============================================
# FILESYSTEM
# ============================================
FILESYSTEM_DISK=local
```

---

## 🔍 Como o Laravel Lê as Variáveis

### 1. Função `env()`

```php
// Em config/app.php
'name' => env('APP_NAME', 'Laravel'),
//        ↑    ↑           ↑
//        |    |           └─ Valor padrão se não encontrar
//        |    └─ Nome da variável no .env
//        └─ Função que lê do .env
```

### 2. Fluxo de Leitura

```
.env → env() → config/app.php → Aplicação
```

### 3. Cache de Configuração

Após alterar `.env`, limpe o cache:

```bash
php artisan config:clear
```

---

## ⚠️ Segurança e Boas Práticas

### ✅ **FAÇA:**

1. ✅ Mantenha `.env` no `.gitignore`
2. ✅ Use `.env.example` como template (sem valores sensíveis)
3. ✅ Use `APP_DEBUG=false` em produção
4. ✅ Use senhas fortes para `DB_PASSWORD`
5. ✅ Gere `APP_KEY` único para cada ambiente

### ❌ **NÃO FAÇA:**

1. ❌ Nunca commite `.env` no Git
2. ❌ Nunca compartilhe `.env` com valores reais
3. ❌ Nunca use `APP_DEBUG=true` em produção
4. ❌ Nunca use senhas fracas em produção
5. ❌ Nunca use a mesma `APP_KEY` em múltiplos ambientes

---

## 📚 Resumo Rápido

| Variável | Tipo | Relevância | Usado Neste Projeto? |
|----------|------|------------|---------------------|
| `APP_NAME` | String | ⭐⭐⭐⭐ | ✅ Sim |
| `APP_ENV` | String | ⭐⭐⭐⭐⭐ | ✅ Sim |
| `APP_KEY` | String | ⭐⭐⭐⭐⭐ | ✅ Sim |
| `APP_DEBUG` | Boolean | ⭐⭐⭐⭐⭐ | ✅ Sim |
| `APP_URL` | String | ⭐⭐⭐⭐ | ✅ Sim |
| `DB_CONNECTION` | String | ⭐⭐⭐⭐⭐ | ✅ Sim |
| `DB_HOST` | String | ⭐⭐⭐⭐⭐ | ✅ Sim |
| `DB_DATABASE` | String | ⭐⭐⭐⭐⭐ | ✅ Sim |
| `DB_USERNAME` | String | ⭐⭐⭐⭐⭐ | ✅ Sim |
| `DB_PASSWORD` | String | ⭐⭐⭐⭐⭐ | ✅ Sim |
| `CACHE_DRIVER` | String | ⭐⭐⭐ | ✅ Sim |
| `SESSION_DRIVER` | String | ⭐⭐⭐⭐ | ✅ Sim |
| `LOG_CHANNEL` | String | ⭐⭐⭐ | ✅ Sim |
| `MAIL_*` | Várias | ⭐⭐ | ❌ Não |
| `REDIS_*` | Várias | ⭐⭐ | ❌ Não |

---

## 🔗 Referências

- [Laravel Documentation - Configuration](https://laravel.com/docs/configuration)
- [Laravel Documentation - Environment Configuration](https://laravel.com/docs/configuration#environment-configuration)
- [12-Factor App - Config](https://12factor.net/config)

---

**Documento criado para:** Laravel To-Do List Project  
