Se debe descargar la carpeta proyecto.

Se debe tener Apache 2.4.25, MySQL 5.7.17 y PHP 5.6.30 (para ahorrar tiempo puede usar Appserv) http://prdownloads.sourceforge.net/appserv/appserv-win32-8.6.0.exe?download .

Dentro de phpmyadmin crear una base de datos con nombre welcometo e importar schema.sql , el cuál esta dentro de la carpeta proyecto.

Modificar el archivo .php llamado Database.php "/proyecto/core/controller/Database.php" para establecer la conexión con la base de datos, en la linea 6, donde sale "$this->user="USUARIO_DE_PHPMYADMIN";$this->pass="CONTRASEÑA_DE_PHPMYADMIN";$this->host="localhost";$this->ddbb="welcometo";"

Ahora solo para entrar se debe ingresar dentro del navegador chrome o mozilla firefox a la dirección: http://localhost/proyecto

Las credenciales de administrador por default son usuario: admin contraseña: admin

En caso de no funcionar se requiere las siguientes versiones (vienen incluidas si usted descarga Appserv):
Apache 2.4.25
PHP 5.6.30
MySQL 5.7.17
