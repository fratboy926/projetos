# Dockerfile

# 1. Base image
FROM php:8.2-apache

# 2. Instale as extensões PHP necessárias
RUN docker-php-ext-install pdo pdo_mysql

# 3. Copie os seus arquivos para o container
COPY . /var/www/html/

# 4. Defina o comando de inicialização
CMD ["apache2-foreground"]
