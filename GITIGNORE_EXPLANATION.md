# 📁 Guia de Arquivos do Laravel - O que Commit e o que Ignorar

## ❌ **NÃO COMMITAR** (Arquivos Temporários/Cache)

### 1. **`storage/framework/views/*.php`** ⚠️
**O que são:** Arquivos compilados das views Blade (template engine do Laravel).

**Por que não commit:**
- São gerados automaticamente quando você acessa as views
- Cada desenvolvedor tem sua própria versão compilada
- Mudam constantemente durante o desenvolvimento
- Não são código fonte, são apenas cache

**Exemplo:** `f819253641c9321c429c72c2620864c8.php` é a versão compilada de uma view Blade

**O que fazer:** O Laravel compila automaticamente quando necessário.

---

### 2. **`storage/framework/cache/*`** ⚠️
**O que são:** Cache de configurações, rotas, views, etc.

**Por que não commit:**
- Gerados automaticamente
- Específicos do ambiente local
- Podem causar conflitos entre desenvolvedores

**Comandos que geram cache:**
- `php artisan config:cache`
- `php artisan route:cache`
- `php artisan view:cache`

---

### 3. **`storage/framework/sessions/*`** ⚠️
**O que são:** Arquivos de sessão dos usuários (se usar driver `file` para sessões).

**Por que não commit:**
- Contêm dados sensíveis de sessão
- Específicos de cada ambiente
- Gerados automaticamente

---

### 4. **`storage/logs/*.log`** ⚠️
**O que são:** Arquivos de log da aplicação.

**Por que não commit:**
- Podem conter informações sensíveis
- Crescem muito rapidamente
- Específicos de cada ambiente

**Exemplo:** `laravel.log` contém erros, queries SQL, etc.

---

### 5. **`bootstrap/cache/*.php`** ⚠️
**O que são:** Cache de configurações e serviços compilados.

**Por que não commit:**
- Gerados automaticamente
- Específicos do ambiente
- Podem causar problemas em outros ambientes

**Exemplo:** `packages.php`, `services.php`

---

### 6. **`.env`** 🔒 **CRÍTICO**
**O que é:** Arquivo de configuração do ambiente com credenciais.

**Por que não commit:**
- Contém senhas, chaves de API, tokens
- **NUNCA** deve ser commitado!
- Cada ambiente tem seu próprio `.env`

**O que fazer:** Use `.env.example` como template (sem valores sensíveis)

---

### 7. **`vendor/`** 📦
**O que é:** Dependências instaladas via Composer.

**Por que não commit:**
- Muito grande (centenas de MB)
- Pode ser reinstalado com `composer install`
- O `composer.lock` já garante as versões corretas

---

### 8. **`node_modules/`** 📦
**O que é:** Dependências do Node.js (se usar npm/yarn).

**Por que não commit:**
- Muito grande
- Pode ser reinstalado com `npm install`

---

## ✅ **COMMITAR** (Arquivos de Código)

### 1. **Código da Aplicação**
- `app/` - Toda a lógica da aplicação
- `routes/` - Definição de rotas
- `resources/views/` - Templates Blade (código fonte)
- `database/migrations/` - Migrations do banco
- `database/seeders/` - Seeders
- `config/` - Arquivos de configuração (sem dados sensíveis)
- `public/` - Arquivos públicos (exceto `public/storage` e `public/hot`)

### 2. **Arquivos de Configuração**
- `composer.json` - Dependências PHP
- `composer.lock` - Versões exatas das dependências (importante!)
- `package.json` - Dependências Node.js (se houver)
- `.env.example` - Template de configuração (sem valores sensíveis)
- `.gitignore` - Arquivos a ignorar
- `README.md` - Documentação

### 3. **Arquivos `.gitkeep`**
**O que são:** Arquivos vazios para manter pastas no git.

**Por que commit:**
- Garantem que pastas vazias sejam criadas quando alguém clona o projeto
- Exemplo: `storage/logs/.gitkeep` mantém a pasta `storage/logs/` no repositório

**Onde estão:**
- `storage/framework/cache/.gitkeep`
- `storage/framework/sessions/.gitkeep`
- `storage/framework/views/.gitkeep`
- `storage/logs/.gitkeep`
- `bootstrap/cache/.gitkeep`

---

## 🔍 **Como Verificar o que está sendo Rastreado**

```bash
# Ver arquivos que estão sendo rastreados pelo git
git ls-files

# Ver arquivos que estão sendo ignorados
git status --ignored

# Verificar se um arquivo específico está sendo ignorado
git check-ignore -v storage/framework/views/f819253641c9321c429c72c2620864c8.php
```

---

## 📝 **Comandos Úteis**

### Limpar cache (se necessário):
```bash
# Limpar todos os caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Ou limpar tudo de uma vez
php artisan optimize:clear
```

### Verificar o que será commitado:
```bash
# Ver status do git
git status

# Ver diferenças
git diff

# Ver arquivos que não estão no .gitignore mas deveriam estar
git status --ignored
```

---

## ⚠️ **Regra de Ouro**

**Se o arquivo pode ser gerado automaticamente ou contém dados sensíveis, NÃO commite!**

**Se você não fez o arquivo manualmente ou ele muda sozinho, provavelmente não deve ser commitado.**

---

## 🛡️ **Segurança**

**NUNCA commite:**
- `.env` (contém senhas e chaves)
- Credenciais de banco de dados
- Chaves de API
- Tokens de autenticação
- Dados pessoais de usuários

**Se você acidentalmente commitou algo sensível:**
1. Remova do histórico do git (se ainda não foi pushado)
2. Mude as credenciais imediatamente
3. Se já foi pushado, considere usar `git filter-branch` ou ferramentas de limpeza de histórico

---

## 📊 **Resumo Visual**

```
laravel-to-do-list/
├── app/                    ✅ COMMITAR
├── bootstrap/
│   ├── app.php            ✅ COMMITAR
│   └── cache/             ❌ NÃO COMMITAR (exceto .gitkeep)
├── config/                 ✅ COMMITAR
├── database/               ✅ COMMITAR
├── public/                 ✅ COMMITAR (exceto /storage e /hot)
├── resources/              ✅ COMMITAR
├── routes/                 ✅ COMMITAR
├── storage/
│   ├── app/               ✅ COMMITAR estrutura
│   ├── framework/
│   │   ├── cache/         ❌ NÃO COMMITAR (exceto .gitkeep)
│   │   ├── sessions/      ❌ NÃO COMMITAR (exceto .gitkeep)
│   │   └── views/         ❌ NÃO COMMITAR (exceto .gitkeep)
│   └── logs/              ❌ NÃO COMMITAR (exceto .gitkeep)
├── vendor/                 ❌ NÃO COMMITAR
├── .env                    ❌ NÃO COMMITAR (CRÍTICO!)
├── .env.example            ✅ COMMITAR
├── composer.json           ✅ COMMITAR
├── composer.lock           ✅ COMMITAR
└── .gitignore              ✅ COMMITAR
```

