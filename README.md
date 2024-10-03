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
asdasdasd
```



## Construido con 🛠️

_Menciona las herramientas que utilizaste para crear tu proyecto_

* [Dropwizard](http://www.dropwizard.io/1.0.2/docs/) - El framework web usado
* [Maven](https://maven.apache.org/) - Manejador de dependencias
* [ROME](https://rometools.github.io/rome/) - Usado para generar RSS

## Contribuyendo 🖇️

Por favor lee el [CONTRIBUTING.md](https://gist.github.com/villanuevand/xxxxxx) para detalles de nuestro código de conducta, y el proceso para enviarnos pull requests.

## Wiki 📖

Puedes encontrar mucho más de cómo utilizar este proyecto en nuestra [Wiki](https://github.com/tu/proyecto/wiki)

## Versionado 📌

Usamos [SemVer](http://semver.org/) para el versionado. Para todas las versiones disponibles, mira los [tags en este repositorio](https://github.com/tu/proyecto/tags).

## Autores ✒️

_Menciona a todos aquellos que ayudaron a levantar el proyecto desde sus inicios_

* **Andrés Villanueva** - *Trabajo Inicial* - [villanuevand](https://github.com/villanuevand)
* **Fulanito Detal** - *Documentación* - [fulanitodetal](#fulanito-de-tal)

También puedes mirar la lista de todos los [contribuyentes](https://github.com/your/project/contributors) quíenes han participado en este proyecto. 

## Licencia 📄

Este proyecto está bajo la Licencia (Tu Licencia) - mira el archivo [LICENSE.md](LICENSE.md) para detalles

## Expresiones de Gratitud 🎁

* Comenta a otros sobre este proyecto 📢
* Invita una cerveza 🍺 o un café ☕ a alguien del equipo. 
* Da las gracias públicamente 🤓.
* Dona con cripto a esta dirección: `0xf253fc233333078436d111175e5a76a649890000`
* etc.



---
⌨️ con ❤️ por [Villanuevand](https://github.com/Villanuevand) 😊
