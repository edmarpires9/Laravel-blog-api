<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400">
  </a>
</p>

# Blog-API · Laravel + MySQL
#### 📦 Versão: 1.3.1
Uma API RESTful simples desenvolvida com **PHP (Laravel)** e **MySQL**, que permite operações de **CRUD** através de requisições HTTP `GET`, `POST`, `PUT` e `DELETE`. Ideal para estudos, testes com Postman, ou como base para projetos maiores.

---

## 🧰 Requisitos

- PHP >= 8.0 (recomendado usar XAMPP)
- Composer
- MySQL
- Postman (para testes de API)
- Git (opcional)

---

## 🚀 Instalação no Windows

### 1. Baixe os softwares necessários

- [XAMPP](https://www.apachefriends.org/pt_br/download.html)
- [Composer](https://getcomposer.org/download/)
- [Postman](https://www.postman.com/downloads/)

### 2. Clone o repositório

```bash
git clone https://github.com/edmarpires9/API-RESTful-PHP-and-MySQL.git
```

### 3. Configure o PHP

- Navegue até `C:\xampp\php`
- Abra o arquivo `php.ini` e descomente (remova o `;`) das seguintes linhas:

```
extension=mysqli
extension=pdo_mysql
extension=pdo_sqlite
```

- Adicione `C:\xampp\php` à variável de ambiente `PATH` do Windows

### 4. Inicie os serviços

- Abra o XAMPP
- Inicie o **Apache** e o **MySQL**

### 5. Configure o banco de dados

- Acesse o `phpMyAdmin` via XAMPP
- Crie um banco de dados com o nome `blog_api`
- Abra o arquivo `script.sql` na raiz do projeto e cole o conteúdo no SQL do phpMyAdmin para criar a tabela `posts`

### 6. Instale as dependências

No terminal, dentro da pasta do projeto:

```bash
composer install
npm install
```

### 7. Inicie o servidor

```bash
php artisan serve
```

---

## 📫 Testando com o Postman

Utilize o Postman para enviar requisições HTTP e testar os endpoints da API:

- `GET /api/posts` – Listar todos os posts
- `GET /api/posts/{id}` – Obter post específico
- `POST /api/posts` – Criar novo post
- `PUT /api/posts/{id}` – Atualizar post
- `DELETE /api/posts/{id}` – Deletar post

---

## 🧪 Estrutura da Tabela `posts`

```sql
CREATE TABLE posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
);
```
  <!--updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP-->

---

## ✨ Desenvolvido por

Edmar Pires  
🔗 [github.com/edmarpires9](https://github.com/edmarpires9)
