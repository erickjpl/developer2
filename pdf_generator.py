import db_utils
import pdf_creator


def main():
    conn, cursor = db_utils.conectar_base_datos()

    try:
        query = "SELECT est.fecha_peticion, est.nombre_establecimiento, est.direccion, est.cp, est.localidad, est.provincia, est.persona_contacto, est.telefono_contacto, est.email, est.sector_actividad, est.tipo_terminal, est.comision, est.retorno, est.retorno_porcentaje, est.fondo_inicial, est.aportacion_fondo, est.metodo_reposicion, emp.nombre_empresa, emp.cif, emp.direccion_fiscal, emp.cp_fiscal, emp.localidad_fiscal, emp.provincia_fiscal, emp.nombre_administrador, emp.dni_administrador FROM establecimiento est JOIN empresa emp ON est.id = emp.id WHERE 1;"
        resultados = db_utils.ejecutar_consulta(cursor, query)
        pdf_creator.generar_pdf(resultados)
    except Exception as e:
        print("Error:", e)
    finally:
        db_utils.cerrar_conexion(conn, cursor)


if __name__ == "__main__":
    main()
