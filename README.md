# Ecommerce-Laravel

Projeto feito apartir do curso de laravel da Node Studio Treinamentos.

## Como executar:

### 1.0 Clonar o Repositório
``git clone https://github.com/WellitonGioriSilva/Ecommerce-Laravel.git``  
``cd Ecommerce-Laravel``

### 2.0 Instalar Dependências
``composer install``

### 3.0 Usando XAMPP
3.1 Inicie o Apache e o MySQL no XAMPP.  
3.2 Acesse http://localhost/phpmyadmin no seu navegador.  
3.3 Crie um novo banco de dados para o projeto com o nome "dblaravel".

### 4.0 Executar as Migrations
#### 4.1 Após configurar o banco de dados, execute as migrations para criar as tabelas:  
``php artisan migrate``

### 5.0 Servir o Projeto
#### 5.1 Por fim, inicie o servidor de desenvolvimento Laravel (O projeto estará disponível em http://localhost:8000.):  
``php artisan serve``
