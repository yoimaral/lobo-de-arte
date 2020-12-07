# Lobo De Arte

En este repositorio encontraras un proyecto realizado por etapas con el fin de formar desarrolladores Junior realizado para la compañia EVERTEC.
Este proyecto fue diseñado con el fin de mostrar pinturas y obras de arte de la ciudad.

## Comenzando 🚀

Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._


# Pre-requisitos 📋

- Php 7.2.0 con phpCli habilitado para la ejecución de comando.
- Mysql 5.7.19.
- Composer


### Instalación 🔧

Para la instalación debes clonar el repositorio en una carpeta preferiblemente vacia.

1. Instalar el controlador de dependencia:
```
❯ composer install
```
2. Crear la base de datos. Se utilizo phpMyAdmin como preferencia:
```
❯ lobo-de-arte

```
3. Copiar el archivo .env.example y pegarlo en el .env:
```
❯ .env.example .env

# Importante:
- En las variablesde entorno .env debemos configurar las credenciales de Mailtrap para uso de las notificaciones y tambien configurar la pasarela de pagos en este caso se implemento PLACETOPAY.
```
4. Laravel Mix para la compilación de los asset.
```
❯ npm install
❯ npm run dev

# Nota: Ahora puedes ver el despliegue en la url: http://localhost:3000/
 Los usuarios y sus contraseñas están en la ruta ❯database❯seeds❯ProductSeeder.php
```
* Creación del symbolic link para ener acceso al archivo storage y a las vistas:
```
❯ php artisan storage:link
```

### Ejecutando las pruebas automatizadas para este sistema⚙️

* Migraciones y alimentación de la base de datos:
```
❯ php artisan migrate --seed

# Nota:
- Para ejecutar el npm run watch debes ejecutar el comando php artisan a la vez:
❯ php artisan serve
❯ npm run watch
```

## Construido con 🛠️
```
* El sistema operativo usado fue:

❯ Linux
# Nota: Se recomienda instalar el proyecto desde cero en sistemas Unix como Linux para evitar errores del tipo "funciona en mi máquina".

* Consola:

❯ Vs Code


## Versionado 📌

Laravel 7.0


## Autores ✒️

Yoimar Lozano

## Licencia 📄

Este proyecto está bajo la Licencia (EVERTEC)

## Expresiones de Gratitud 🎁

* Comenta a otros sobre este proyecto 📢
* Invita una cerveza 🍺 o un café ☕ a alguien del equipo. 
* Da las gracias públicamente 🤓.
* etc.
