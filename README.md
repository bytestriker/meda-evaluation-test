<p align="center"><a href="https://meda.com.mx" target="_blank"><img src="https://www.meda.com.mx/img/2211_img_Logo.png" width="150" alt="Laravel Logo"></a></p>

## Acerca de la Prueba

### Objetivo
Desarrollar un pequeño módulo de gestión de empleados y sus empresas respectivamente,
así como el consumo de un servicio web externo, para lo cual se detallan los aspectos que
debe contener el proyecto:
1. Generar un repositorio donde de podrá descargar para poder hacer una revisión del
mismo, así como todos los pasos, recursos, credenciales, etc. para ejecutarlo
2. Debe contener una base de datos interna
3. Deberá ser desarrollado en Symfony, Doctrine, DB(Mysql, PostgreSQL o MongoDB)


## Ejercicio

La página principal tendrá 3 botones: Login empresa, Login empleado
El botón de login empresa hará login con las credenciales: Usuario:admin, Contraseña: test,
lo que se presentará en la pantalla es un listado de empleados y un botón de “Agregar
empleado”, con los siguientes campos: nombre, usuario, contraseña.
El segundo botón al hacer click se podrá acceder al perfil del usuario generado (solo el
nombre) con las credenciales que se dieron de alta anteriormente.
Por último se deberá consumir la api de banxico
“https://www.banxico.org.mx/SieAPIRest/service/v1/series/SP68257” y responder sobre la
url ‘/api/udi’ con autenticación basic usando los “Empleados” generados en los puntos
anteriores.

## Requisitos PHP
PHP 8.1
 * Composer (https://getcomposer.org/doc/00-intro.md)

Extensiones requeridas:
 * BCMath
 * Ctype
 * cURL
 * DOM
 * Fileinfo
 * JSON
 * Mbstring
 * OpenSSL
 * PCRE
 * PDO
 * Tokenizer
 * XML
 
 Estas extensiones son regularmente incluidas en la instalación de PHP .

## Utilizar un Paquete Amigable con el Desarrollador

[Apache Friends](https://www.apachefriends.org/) or [Homestead](https://github.com/laravel/homestead)

## Notas de la Instalación

> ### Paso 1
> Ejecutar el comando para abrir el directorio donde se descargará el repositorio
>
> `cd /home/user/project_path/`
>

> ### Paso 2
> Clonar el repositorio público de la siguiente dirección
>
> `git clone https://github.com/bytestriker/meda-evaluation-test.git`

> ### Paso 3
> Verificar el destino del directorio con el comando 
>
> `pwd` 
>
> __Asegurarse de estar dentro de la carpeta donde se descargó el proyecto__
>
> De lo contrario, cambia al directorio del proyecto con el comando
> `cd /home/user/project_path/`
> 


> ### Paso 4
> Ejecutar el comando 
>
> [Composer help](https://getcomposer.org/doc/00-intro.md#locally)
>
> `composer install`
>
> Para descargar / instalar las dependencias del framework

> ### Paso 5
> Dentro de la carpeta del proyecto `/home/user/project_path/`
> `ls -las`
>
> Verifica si existe un archivo ".env". Si no existe, créalo con el siguiente comando
>
> `cp .env.example .env`
> 
>

> ### Paso 6
> Abre el archivo ".env" con tu editor favorito
> Revisa la línea 3 del archivo y verifica que la variable 
> `APP_KEY` contenga un texto semejante a éste 
> `base64:daLJYorOFZFsx1+lc/uXrbNEO5zAySJkY1+o1SGkVTM=`
> de lo contrario, vuelve a la consola/terminal y dentro   de la carpeta del proyecto `/home/user/project_path/`
> ejecuta el comando
> `php artisan key:generate`
> 
> 


> ### Paso 7
> Para crear un enlace hacia la carpeta de almacenamiento pública en Laravel, ejecuta
> `php artisan storage:link`
>

> ### Paso 8
> Accede a tu SGBD MySQL/MariaDB con el siguiente comando, p. ej:
>
> `mysql -uroot -p `
>
> Crea una nueva base de datos para el sistema
>
> `create database evaluation default charset utf8 default collate utf8_general_ci;`
>


> ### Paso 9
> Crea un nuevo usuario para conectar a la base de datos, usa el siguiente comando como ejemplo
>
> `create user 'g33k'@'your-preferred-hostname-or-%' identified by 'v4lidPasswD0.';`
>

> ### Paso 10
> 
> Concede los privilegios a tu usuario
>
> `grant all privileges on evaluation.* to 'g33k'@'your-preferred-hostname-or-%';`
>
> `flush privileges;`
> `exit;`
>
> ============================================
>
> No olvides ajustar las variables de conexión de tu archivo .env con las credenciales que acabas de crear
>
> DB_DATABASE=evaluation
>
> DB_USERNAME=g33k
>
> DB_PASSWORD=v4lidPasswD0.
>

> ### Paso 11
> Dentro de la carpeta `/home/user/project_path/` vamos a ejecutar el comando 
>
> `php artisan migrate`
>
> Para convertir los modelos de la aplicación en tablas de la base de datos

> ### Paso 12
> Dentro de la carpeta `/home/user/project_path/` vamos a ejecutar el comando 
>
> `php artisan meda:make.admin`
>
> Para crear un usuario administrador con las credenciales por defecto:
> 
> user: `admin`
> password: `test`

> ### Paso 13
> Dentro de la carpeta `/home/user/project_path/` vamos a ejecutar el comando 
>
> `php artisan serve`
>
> y accede a la liga [localhost:8000](http://localhost:8000)


### Para consultar el end point correspondiente al API `api/udi`, ejecuta la siguiente sentencia en la terminal

`curl --location --request POST 'http://localhost:8000/api/udi' \
--header 'Bmx-Token: ed560a808aa38664ab271561cda9da0a01e3c9627b57019962619a3993e77b2a' \
--header 'Authorization: Bearer 82dC0kwoOzAYGloosq7zhFQzDuxaYZzodPAQTDjOjkYfgCkzyONSN3gismMdSYoc'`