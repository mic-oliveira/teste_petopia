# Teste técnico Petopia

## Subir containers de aplicação
`docker-compose up -d --force-recreate`

## Instalação de pacotes do projeto
`docker-compose exec web composer install`

## Informações de ambiente
Adicionado conexão ao container de mysql no arquivo .env.example e após copiado ou renomeado para .env, executar o comando:
<br>`docker-compose exec web php artisan key:generate`</br>

# Executar migrations
`docker-compose exec web php artisan migrate:fresh --seed`

## O usuário para login na api

### Usuário com acesso
- email: admin@admin.com
- password: admin
 
## Executar testes com Pest
`docker-compose exec web php vendor/bin/pest`
