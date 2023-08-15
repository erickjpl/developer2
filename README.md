# Sistema de Generación de Códigos QR

Este proyecto es un sistema simple que permite generar códigos QR a partir de datos enviados desde un formulario en la interfaz de usuario. El backend se encarga de generar el código QR y mostrarlo en la página web.

## Descripción

El sistema consta de una interfaz de usuario que permite a los usuarios ingresar información como nombre, cantidad y número de teléfono. Una vez que se envía el formulario, el backend genera un código QR basado en los datos proporcionados y lo muestra en la página.

## Endpoints

- `GET /api/health-check`: Muestra el estado de la api.

- `GET /generate-qr`: Muestra el formulario (nombre, cantidad y teléfono), y el código QR cuando se procesa la respuesta.

- `POST /api/generate-qr`: Recibe los datos del formulario (nombre, cantidad y teléfono), genera un código QR y lo devuelve en la respuesta.

## Cómo Levantar el Sistema

Sigue estos pasos para levantar el sistema en tu entorno local:

- **Clona el repositorio:**
```
git clone https://github.com/tu-usuario/tu-repositorio.git
```
- **Navega al directorio del proyecto:**
```
cd tu-repositorio
```
- **Instala las dependencias:**
```
composer install
```
- **Copia el archivo .env.example y renómbralo a .env:**
```
cp .env.example .env
```
- **Genera una clave de aplicación:**
```
php artisan key:generate
```
## Cómo Ejecutar los Tests

Para ejecutar los tests de la aplicación, puedes usar el siguiente comando:
```
php artisan test
```
Este comando ejecutará las pruebas unitarias y de integración y te proporcionará el resultado.

## Levanta el servidor de desarrollo:
```
php artisan serve
```

Accede a la aplicación en tu navegador en la dirección [http://localhost:8000](httpshttp://localhost:8000).

¡Listo! Ahora tienes el sistema de generación de códigos QR funcionando en tu entorno local. Puedes acceder a la interfaz de usuario, enviar el formulario y generar códigos QR con los datos proporcionados.

---
Autor: [Erick Perez](https://github.com/erickjpl/developer2)
