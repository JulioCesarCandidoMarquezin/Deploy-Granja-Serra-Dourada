# Use a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Atualize os pacotes e instale as dependências necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libpq-dev \
    && docker-php-ext-install mysqli pdo_pgsql \
    && docker-php-ext-enable mysqli pdo_pgsql

# Copie os arquivos do site para o diretório padrão do Apache
COPY . /var/www/html

# Ajuste as permissões do diretório do site
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exponha a porta 80
EXPOSE 80

# Configure o comando de inicialização
CMD ["apache2-foreground"]
