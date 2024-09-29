# Iniciar un Proyecto Laravel Sail en una Nueva PC

Este proyecto utiliza [Laravel Sail](https://laravel.com/docs/9.x/sail), un entorno de desarrollo basado en Docker para Laravel. A continuación, se describen los pasos para configurar y ejecutar el proyecto en una nueva computadora.

## Requisitos

Antes de empezar, asegúrate de tener lo siguiente instalado en tu sistema:

- [Docker Desktop](https://www.docker.com/products/docker-desktop) (necesario para usar Sail)
- [Git](https://git-scm.com/) (opcional, pero recomendado para clonar repositorios)

## Pasos para la configuración

1. **Clonar el repositorio**  
   Si ya tienes el proyecto en un repositorio, puedes clonarlo con el siguiente comando:
   ```bash
   git clone https://github.com/MoisesM02/LIC-API.git
2. **Navegar a la carpeta del repositorio**
cd LIC-API

3. **Ejecutar el siguiente comando de Docker**
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install

   4. **Crear una copia del archivo .env**
      cp .env.example .env
   5. **Generar la llave de la aplicación**
      ./vendor/bin/sail artisan key:generate
   6. **Inicializar los contenedores**
      ./vendor/bin/sail up -d
   7. **Correr las migraciones del proyecto**
   ./vendor/bin/sail artisan migrate
    
