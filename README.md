# Sistema de Chamados - Teste Técnico ADTR

Sistema de gerenciamento de chamados técnicos desenvolvido em Laravel, com autenticação de usuários, CRUD completo, filtros, paginação e API REST.

## Tecnologias

- PHP 8.5
- Laravel 13
- PostgreSQL
- Blade
- Tailwind CSS
- SweetAlert2
- Laravel Breeze
- Git/GitHub

## Funcionalidades / Listagem

- Autenticação de usuários
- Cadastro de chamados
- Edição de chamados
- Exclusão com confirmação
- Atualização de status
- Filtro por status
- Filtro por prioridade
- Busca por assunto
- Paginação
- API REST para chamados

## Campos do chamado

Cada chamado possui:

- Assunto
- Descrição
- Categoria
- Prioridade
- Status
- Data/hora de abertura

## Categorias disponíveis

- Suporte Externo
- Correção de Sistema
- Implementação
- Melhorias de Sistemas

## Status disponíveis

- Aberto
- Em andamento
- Finalizado

## Prioridades disponíveis

- Baixa
- Média
- Alta

## API REST

| Método | Endpoint | Descrição |
|--------|----------|-----------|
| GET | `/api/chamados` | Lista todos os chamados |
| POST | `/api/chamados` | Cria um novo chamado |
| GET | `/api/chamados/{id}` | Exibe um chamado específico |
| PUT/PATCH | `/api/chamados/{id}` | Atualiza um chamado |
| DELETE | `/api/chamados/{id}` | Remove um chamado |


## Banco de Dados

Banco utilizado:

- PostgreSQL

Estrutura criada utilizando:

- Migrations do Laravel
- Eloquent ORM
- Relacionamento entre usuário e chamados

Relacionamentos:

- Um usuário possui vários chamados
- Um chamado pertence a um usuário

## Como executar o projeto

Clone o repositório:

```bash
git clone https://github.com/viniciusbzbim-bot/adtr-chamados.git
```
2. Entrar na pasta
   
```bash
cd adtr-chamados/adtr-chamados
```
4. Instalar dependências PHP
```bash
composer install
```
6. Instalar dependências front-end
```bash
npm install
```
8. Configurar o arquivo .env
```bash
cp .env.example .env
```
Configure o PostgreSQL:
```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=adtr_chamados
DB_USERNAME=postgres
DB_PASSWORD=sua_senha
```
6. Gerar chave da aplicação
```bash
php artisan key:generate
```
7. Rodar migrations
```bash
php artisan migrate
```
8. Compilar assets
```bash
npm run build
```
9. Iniciar servidor
```bash
php artisan serve
```
Acesse:
```bash
http://127.0.0.1:8000
```

## Decisões Técnicas
Utilização do Laravel Breeze para autenticação
Utilização de Blade para renderização das views
Uso de SweetAlert2 para melhorar experiência visual
Organização seguindo padrão MVC
API REST separada das rotas web
PostgreSQL utilizado como banco principal
Interface responsiva utilizando Tailwind CSS


## Melhorias Futuras

Com mais tempo poderiam ser adicionados:

Dashboard administrativo
Upload de anexos
Sistema de comentários
Notificações
Docker
Testes automatizados
Swagger/OpenAPI
Controle de permissões
API autenticada com Laravel Sanctum


## Dificuldades Encontradas
Configuração inicial da API REST
Ajustes entre rotas web e api
Personalização visual da aplicação
Configuração do Git/GitHub
Ajustes de identidade visual da aplicação

Autor,
Vinicius Carneiro
