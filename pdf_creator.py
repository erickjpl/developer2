from reportlab.lib.pagesizes import letter
from reportlab.platypus import SimpleDocTemplate, Spacer, Table, TableStyle, PageBreak, PageTemplate, Frame, Paragraph
from reportlab.lib import colors
from reportlab.lib.styles import getSampleStyleSheet


def generar_pdf(resultados):
    nombre_archivo = "informe.pdf"
    doc = SimpleDocTemplate(nombre_archivo, pagesize=letter)
    story = []

    titulo = "NUEVA INSTALACIÓN"
    story.append(Spacer(1, 20))
    story.append(Table([[titulo]], style=[('ALIGN', (0, 0), (-1, -1), 'CENTER'),
                                          ('FONTNAME', (0, 0),
                                           (-1, 0), 'Helvetica-Bold'),
                                          ('FONTSIZE', (0, 0), (-1, 0), 16)]))
    story.append(Spacer(1, 20))

    data = [["Fecha Peticion", ""],
            ["Nombre del Establecimiento", ""],
            ["Direccion", ""],
            ["CP", ""],
            ["Localidad", ""],
            ["Provincia", ""],
            ["Persona Contacto", ""],
            ["Telefono Contacto", ""],
            ["Email", ""],
            ["Sector Actividad", ""],
            ["Tipo de Terminal", ""],
            ["Comisión", ""],
            ["Retorno", ""],
            ["Fondo Inicial", ""],
            ["Aportación del Fondo", ""],
            ["Metodo de Reposicion", ""],
            ["Nombre de la Empresa", ""],
            ["CIF", ""],
            ["Direccion", ""],
            ["CP", ""],
            ["Localidad", ""],
            ["Provincia", ""],
            ["Nombre del Administrador", ""],
            ["DNI Administrador", ""],
            ["Aportar documentación", ""],
            ["", ""],
            ["", ""],
            ["", ""]]

    for fila in resultados:
        data[0][1] = fila[0]  # Fecha Petición
        data[1][1] = fila[1]  # Nombre del Establecimiento
        data[2][1] = fila[2]  # Direccion
        data[3][1] = fila[3]  # CP
        data[4][1] = fila[4]  # Localidad
        data[5][1] = fila[5]  # Provincia
        data[6][1] = fila[6]  # Persona Contacto
        data[7][1] = fila[7]  # Telefono Contacto
        data[8][1] = fila[8]  # Email
        data[9][1] = fila[9]  # Sector Actividad
        data[10][1] = fila[10]  # Tipo Terminal
        data[11][1] = fila[11]  # Comision
        data[12][1] = fila[12]  # Retorno
        # data[12][2] = fila[13] # Retorno Porcentaje
        data[13][1] = fila[14]  # Fondo Inicial
        data[14][1] = fila[15]  # Aportacion Fondo
        data[15][1] = fila[16]  # Metodo Reposicion
        data[16][1] = fila[17]  # Nombre Empresa
        data[17][1] = fila[18]  # CIF
        data[18][1] = fila[19]  # Direccion Fiscal
        data[19][1] = fila[20]  # CP Fiscal
        data[20][1] = fila[21]  # Localidad Fiscal
        data[21][1] = fila[22]  # Provincia Fiscal
        data[22][1] = fila[23]  # Nombre Administrador
        data[23][1] = fila[24]  # DNI Administrador
        data[24][1] = "Escritura constitución / Alta autónomo"
        data[25][1] = "DNI administrador / autónomo"
        data[26][1] = "Si Loomis DNI persona autorizada recepción Loomis"
        data[27][1] = "Si Transferencia certificado titularidad bancaria"

    tabla = Table(data, colWidths=[150, 300])
    tabla.setStyle(TableStyle([
        ('ALIGN', (0, 0), (0, -1), 'RIGHT'),
        ('ALIGN', (1, 0), (1, -1), 'LEFT'),
        ('FONTNAME', (0, 0), (-1, -1), 'Helvetica'),
        ('FONTSIZE', (0, 0), (-1, -1), 11),
        ('VALIGN', (0, 0), (-1, -1), 'MIDDLE'),
        ('BOX', (0, 0), (-1, -5), 1, colors.black),
        ('GRID', (0, 0), (-1, -5), 1, colors.black)
    ]))

    story.append(tabla)

    styles = getSampleStyleSheet()
    estilo_pie = styles['Normal']
    estilo_pie.alignment = 2
    p = Paragraph("info@rapidosinriesgos.com Tel. : 900 83 44 15", estilo_pie)
    story.append(Spacer(1, 60))
    story.append(p)

    doc.build(story)
