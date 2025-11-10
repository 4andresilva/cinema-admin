# Cinema Admin

Sistema de gerenciamento administrativo para redes de cinema, desenvolvido com Laravel e Filament.

<p align="center">
<a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>
</p>

## 📋 Sobre o Projeto

Este sistema permite o gerenciamento completo de uma rede de cinemas, incluindo:

- Gestão do cinema e salas
- Controle de assentos
- Gerenciamento de filmes e sessões

## 🚀 Tecnologias Utilizadas

- [Laravel](https://laravel.com/) - Framework PHP
- [Filament](https://filamentphp.com/) - Framework de administração
- [PostgreSQL](https://www.postgresql.org/) - Banco de dados
- [Docker](https://www.docker.com/) - Containerização
- [Nginx](https://nginx.org/) - Servidor web

## 💻 Pré-requisitos

- Docker
- Docker Compose
- Composer
- PHP 8.1 ou superior
- Node.js 16 ou superior

## 🛠️ Instalação

1. Clone o repositório:
```bash
git clone https://github.com/4andresilva/cinema-admin.git
cd cinema-admin
```

2. Copie o arquivo de ambiente:
```bash
cp .env.example .env
```

3. Instale as dependências:
```bash
composer install
npm install
```

4. Inicie os containers Docker:
```bash
docker-compose up -d
```

5. Execute as migrações:
```bash
docker-compose exec app php artisan migrate
```

6. Gere a chave da aplicação:
```bash
docker-compose exec app php artisan key:generate
```

## 👥 Módulos do Sistema

### Administração (Admin)
- Gestão completa do cinema
- Controle de salas, assentos e filmes 
- Programação de sessões
- Relatórios de vendas

## 🔧 Tecnologias do Laravel

O sistema utiliza os seguintes recursos do Laravel:

- [Sistema de rotas](https://laravel.com/docs/routing) para gerenciamento de URLs
- [Eloquent ORM](https://laravel.com/docs/eloquent) para manipulação do banco de dados
- [Sistema de migrations](https://laravel.com/docs/migrations) para versionamento do banco
- [Laravel Queue](https://laravel.com/docs/queues) para processamento em background
- [Sistema de cache](https://laravel.com/docs/cache) para otimização de performance

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
