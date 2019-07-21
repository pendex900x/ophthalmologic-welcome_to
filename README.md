### Welcome to

Gestion de Pacientes, Medicos e instrumental
Creacion de Citas
Vista de Calendario
Integracion de Areas con Medicos
Integracion de estado de cita y tipo de pago
Busqueda avanzada
Reportes por paciente, medico, rango de fecha, estado, tipo de pago
Descarga de reporte en formato word


### Welcome to

MONTAJE DE LA APLICACIÓN WEB.

Se debe descargar la carpeta proyecto.

Se debe tener Apache 2.4.25, MySQL 5.7.17, PHP 5.6.30 y phpMyAdmin 4.6.6 (para ahorrar tiempo puede usar Appserv) http://prdownloads.sourceforge.net/appserv/appserv-win32-8.6.0.exe?download .

Dentro de phpmyadmin crear una base de datos con nombre 'welcometo' (Sin comillas) e importar schema.sql , el cuál esta dentro de la carpeta proyecto. El cotejamiento debe ser 'utf8_general_ci'.

La carpeta proyecto debe ingresarse en la carpeta de 'Appserv/www'

Modificar el archivo .php llamado Database.php "/proyecto/core/controller/Database.php" para establecer la conexión con la base de datos, en la linea 6, donde sale: $this->user="USUARIO_DE_PHPMYADMIN"; $this->pass="CONTRASEÑA_DE_PHPMYADMIN";

Cambiar USUARIO_DE_PHPMYADMIN por el usuario que usted configuró en phpmyadmin, por default suele ser 'root' (Sin comillas). Cambiar CONTRASEÑA_DE_PHPMYADMIN por la contraseña que usted configuró en phpmyadmin, por default suele ser 'root' (Sin comillas) o simplemente sin contraseña.

Ahora solo para entrar se debe ingresar dentro del navegador chrome o mozilla firefox a la dirección: http://localhost/proyecto

Las credenciales de administrador por default son usuario: admin contraseña: admin

En caso de no funcionar se requiere las siguientes versiones (vienen incluidas si usted descarga Appserv): Apache 2.4.25 PHP 5.6.30 MySQL 5.7.17 phpMyAdmin 4.6.6
