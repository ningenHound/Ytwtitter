
# Ytwitter, otro clon de twitter (o X?)

*Este es un clon de Twitter para prueba de habilidades*

## Requisitos

Consideraciones:

- Este proyecto fue construido con PHP 8.2, por lo que se requiere usar esa versión o superior
- Por razones de practicidad, la base de datos configurada por defecto es SQLite3, por lo que se requiere instalar el módulo php-sqlite3 para usarla, o en otro caso modificar el archivo .env para adaptar a la conexión

Para levantar el proyecto:
- renombrar .env.example por .env
- ejecutar `composer install`
- crear un archivo para la base de datos sqlite en la carpeta database, se debe llamar: database.sqlite
- ejecutar las migraciones con `php artisan migrate`
- levantar el proyecto con `php artisan serve`

#
**Disclaimer:** *This project is created solely for educational purposes and serves as a demonstration of skills. It is not affiliated with, endorsed by, or connected in any way to [Twitter](https://twitter.com) or its affiliates. Any resemblance in design, functionality, or features to Twitter's platform is purely coincidental. All trademarks, registered trademarks, product names, and company names mentioned herein are the property of their respective owners.*