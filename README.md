# RunTracker

Sistema web para gerenciamento de treinos de corrida, desenvolvido em PHP seguindo a arquitetura MVC.

## Sobre o Projeto

O RunTracker foi criado para auxiliar treinadores e atletas no planejamento, acompanhamento e análise de treinos de corrida.

O sistema possui dois perfis de acesso:

### Administrador

* Cadastrar atletas
* Editar atletas
* Cadastrar treinos para cada atleta
* Visualizar relatórios
* Acompanhar estatísticas gerais
* Monitorar a evolução dos atletas

### Atleta

* Realizar login no sistema
* Visualizar treinos cadastrados pelo treinador
* Marcar treinos como concluídos
* Registrar resultados reais dos treinos
* Visualizar histórico de atividades
* Acompanhar gráficos de evolução

---

## Tecnologias Utilizadas

### Backend

* PHP 8+
* PDO
* MySQL

### Frontend

* HTML5
* CSS3
* Bootstrap 5
* Bootstrap Icons

### Arquitetura

* MVC (Model-View-Controller)

### Controle de Versão

* Git
* GitHub

---

## Estrutura do Projeto

```text
runtrack/
│
├── app/
│   ├── controllers/
│   ├── middlewares/
│   ├── models/
│   └── views/
│
├── config/
│   └── database.php
│
├── public/
│   ├── assets/
│   │   ├── css/
│   │   └── img/
│   │
│   └── index.php
│
├── routes/
│   └── web.php
│
├── .env
├── .gitignore
└── README.md
```

---

## Funcionalidades Implementadas

### Autenticação

* Login de usuários
* Logout
* Controle de sessão
* Proteção de rotas

### Dashboard Administrativo

* Estrutura inicial
* Menu lateral responsivo
* Indicadores gerais

### Segurança

* Senhas armazenadas com hash
* Uso de PDO com Prepared Statements
* Variáveis de ambiente (.env)
* Middleware de autenticação

---

## Requisitos Funcionais

### Administrador

* RF01 - Realizar login
* RF02 - Cadastrar atletas
* RF03 - Editar atletas
* RF04 - Excluir atletas
* RF05 - Cadastrar treinos
* RF06 - Editar treinos
* RF07 - Visualizar relatórios
* RF08 - Visualizar estatísticas gerais

### Atleta

* RF09 - Realizar login
* RF10 - Visualizar treinos
* RF11 - Marcar treinos como concluídos
* RF12 - Registrar resultados reais
* RF13 - Visualizar histórico
* RF14 - Visualizar evolução

---

## Requisitos Não Funcionais

* RNF01 - Interface responsiva
* RNF02 - Compatibilidade com navegadores modernos
* RNF03 - Utilização de arquitetura MVC
* RNF04 - Segurança de autenticação
* RNF05 - Uso de variáveis de ambiente para credenciais
* RNF06 - Facilidade de manutenção do código

---

## Configuração do Ambiente

### Clone o repositório

```bash
git clone URL_DO_REPOSITORIO
```

### Configure o arquivo .env

```env
DB_HOST=localhost
DB_NAME=runtracker
DB_USER=root
DB_PASS=
```

### Crie o banco de dados

```sql
CREATE DATABASE runtracker;
```

### Inicie o servidor

Utilize o XAMPP ou outro ambiente compatível com PHP e MySQL.

---

## Status do Projeto

Em desenvolvimento

Funcionalidades atuais:

* Login
* Logout
* Dashboard inicial
* Estrutura MVC
* Sistema de autenticação

Próximas funcionalidades:

* CRUD de Atletas
* CRUD de Treinos
* Relatórios
* Gráficos de Evolução
* Controle de Metas
* Estatísticas Avançadas

---

