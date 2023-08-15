import mysql.connector


def conectar_base_datos():
    db_config = {
        "host": "localhost",
        "user": "root",
        "password": "",
        "database": "developer2"
    }
    conn = mysql.connector.connect(**db_config)
    cursor = conn.cursor()
    return conn, cursor


def ejecutar_consulta(cursor, query, params=None):
    cursor.execute(query, params)
    return cursor.fetchall()


def cerrar_conexion(conn, cursor):
    cursor.close()
    conn.close()
