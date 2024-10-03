Laravel 11: Framework PHP para el desarrollo web.

Docker / Laravel Sail: Para la creación de entornos de desarrollo.

Laravel Breeze: Paquete de autenticación simple para Laravel. Elegí Breeze por su simplicidad y facilidad de uso en comparación con otros paquetes.
Blade: Motor de plantillas para la vista.
Eloquent: ORM de Laravel para interactuar con la base de datos.
Logging de Laravel: Para registrar las acciones importantes dentro de la aplicación.

Se utilizó el patrón Factory combinado con el Strategy.

Pasos para Levantar el Proyecto
    Clona el repositorio:

    git clone <URL_DEL_REPOSITORIO>
    cd <NOMBRE_DEL_REPOSITORIO>

    UTILIZAR EL .ENV de ejemplo

    Instala Laravel Breeze

    ./vendor/bin/sail composer require laravel/breeze --dev
    ./vendor/bin/sail artisan breeze:install
    ./vendor/bin/sail npm install
    ./vendor/bin/sail npm run dev

    EJECUTAR la migración

    ./vendor/bin/sail artisan migrate

    LEVANTAR EL PROYECTO

    ./vendor/bin/sail up -d

Vista del Frontend

resources/views/sendmessage.blade    VISTA PARA ENVIAR MENSAJES

resources/views/sent.blade    VISTA PARA VER MENSAJES ENVIADOS POR CADA USUARIO

Rutas del Backend
Las rutas disponibles en el backend son las siguientes:

GET /sendmessage - Muestra el formulario para enviar mensajes. (Nombre de ruta: sendmessage.create)
POST /send - Endpoint para enviar mensajes. (Nombre de ruta: messages.store)
GET /sent - Pantalla para ver los mensajes enviados (con paginación). (Nombre de ruta: messages.index)




