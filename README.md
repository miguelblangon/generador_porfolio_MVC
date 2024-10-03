# Título del Proyecto

_Generador de porfolios mediante plantillas_

## Comenzando 🚀

_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._

Mira **Deployment** para conocer como desplegar el proyecto.


### Pre-requisitos 📋

_Que cosas necesitas para instalar el software y como instalarlas_

```
PHP en su versión 8.1 y MySql
```

### Instalación 🔧

_Una instalación paso a paso que te dice lo que debes ejecutar para tener un entorno de desarrollo ejecutandose_

_1 Clonar el repositorio_

```
 git clone https://github.com/miguelblangon/generador_porfolio_MVC.git
```

_Instala dependencias:_

```
composer install
npm install
```

_Generar archivo .env y modificar su contenido_

```
cp .env.example .env
```
_Genera la clave de la aplicación:_

```
php artisan key:generate
```

_Añadir las siguientes linieas al archivo .env para el envio de correos_

```
MAIL_USERNAME=mail@mail.com
MAIL_PASSWORD='myPass'
MAIL_FROM_ADDRESS="email@email.com"
```
## Despliegue 📦

_Una vez ejecutado los pasos anteriores crear la base de datos y lanzar el comando para la creación de las tablas:_

```
php artisan migrate
```
_modificar el archivo UserSeeder que se encuentra dentro de la carpeta seeder dentro de database_

```
'name' => 'Tu_nombre',
'email' => 'email@email.com',
```

_Generar los registros necesarios para que el entorno funcione correctamente_

```
php artisan db:seed
```



## Construido con 🛠️

_las herramientas utilizadas_

* [Laravel](https://laravel.com/docs/11.x/installation) - El framework web usado

  
## Autor ✒️

_Autor_

* **Miguel Ángel Blanco González** - *Creador del proyecto* 
---
