# motohub
# motohub

### Primeros pasos

Primero debemos clonar el repositorio. Ejecutando el siguiente comando.
`'git clone git@github.com:Andres-Alvarez-V/motohub.git'`.

Nos dirigimos al archivo `.env.example` que se encuentra en la raiz del proyecto. Copiamos su contenido y luego creamos un archivo `.env` alli pegaremos el contenido copiado anteriormente.

Modificamos los siguientes atributos segun la necesidad:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

En nuestro caso usaremos 
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=moto_hub
DB_USERNAME=root
DB_PASSWORD=
```

Ahora ejecutamos el siguiente comando para instalar las dependencias de php `composer install`.
Ahora instalamos las dependencias de Javascript.
`npm run install`.

Ingresamo a xamp. En caso de no tenerlo descargado hacerlo.
Empezar a correr apache y MySQL.

Ahora ejecutamos el comando `php artisan migrate` esto para correr las migraciones.

Ahora corremos el siguiente comando `php artisan storage:link`.

Corremos `php artisan key:generate`


Ahora corremos la aplicacion con `php artisan serve` en una terminal, en otra corremos el siguiente comando `npm run dev`

Ahora nos ubicara en el endpoint `/login`. Debemos crear un regisro de usuario.

En el navbar aparece registrarse o entramos al siguiente endpoint `/register`.

Una vez registrados vamos a entrar como usuarios, por temas practicos nos dirigimos a phpmyadmin y en la tabla usuarios en la columna 'role' lo setteamos como `ADMIN`. Cuando recarguemos la pagina ya se veran las opciones de un usuario comun y las opciones adiccionales para los administradores.

Desde esta vista en el navbar se puede navegar a las distintas funcionalidades.

Para tener un setteo general de la app debemos entrar al archivo `Dummy.sql` y correrlo en la base de datos.

Esto creara unos estados, marcas y motos. Para poder visualizar bien las imagenes dentro de la aplicacion se debe ir a `public/images/brands` copiar todas las imagenes y moverlas a `storage/app/public`. Lo mismo se hace para las motos `public/images/motorcycles` copiamos las imagenes y las pasamos a `storage/app/public`.

Inicialmente las personas tienen un saldo de 0 en el dinero de la aplicacion, para modificar el valor se debe hacer desde la base de datos modificando para la tabla 'users' la columna balance por practicidad se puede poner un valor grande ej: '100000000'. 

Apartir de aqui ya se tiene todo el setteo inicial de la aplicacion para empezar a navegar como administrador y correr todas las funcionalidades, tener en cuenta que como administrador tambien se pueden comprar motos y hacer acciones de un usuario normal, la diferencia es que el usuario normal no tiene acceso a algunas partes y funcionalidades especificas para el administrador.

