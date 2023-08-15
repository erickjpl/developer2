# Generación de PDF desde Base de Datos con Python y ReportLab

Este proyecto consiste en un programa en Python que genera un informe en formato PDF a partir de datos almacenados en una base de datos MySQL. 
Utiliza la biblioteca ReportLab para crear el PDF y extrae los datos de la base de datos utilizando MySQL.

## Requisitos

- Python 3.x instalado en tu sistema.
- Biblioteca MySQL Connector/Python (`mysql-connector-python`), que se utiliza para conectarse a la base de datos MySQL.
- Biblioteca ReportLab (`reportlab`), que se utiliza para crear el PDF.

## Pasos para generar el PDF

1. Clona este repositorio a tu máquina local o descarga el código fuente.

2. Instala las bibliotecas requeridas ejecutando el siguiente comando en la terminal:


3. Configura la base de datos MySQL:

- Crea una base de datos en MySQL y configura las tablas con la estructura y los campos que necesitas. Puedes usar la descripción de los campos proporcionada en el archivo `db_utils.py` como guía.
- Actualiza las credenciales de conexión a la base de datos en el archivo `db_utils.py`.

4. Ejecuta el programa para generar el PDF:

python generar_pdf.py


5. Verifica que se haya generado el archivo PDF en el directorio con el nombre `informe.pdf`.

---
Autor: [Erick Perez](https://github.com/erickjpl/developer2)
