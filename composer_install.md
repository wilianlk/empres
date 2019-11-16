#Si no tiene instalado el composer se debe instalar:
[1] sudo apt-get update && apt-get upgrade
###### actualizar fuentes y actualizar paquetes 
[2] sudo apt-get install php-mcrypt php-gd php-mbstring hhvm phpunit
###### Instalar dependencias 
[3] curl -sS https://getcomposer.org/installer | php
###### descargar e instalar el composer
[4] mv composer.phar /usr/local/bin/composer
###### mover a una ubicacion para todo el sistema 
[5] chmod +x /usr/local/bin/composer
###### agregar permisos de ejecucion
[6] composer install
###### Instalar los paquetes requeridos por el sistema en desarrollo