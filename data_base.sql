CREATE TABLE Establecimiento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha_peticion TIMESTAMP,
    nombre_establecimiento VARCHAR(60),
    direccion VARCHAR(120),
    cp VARCHAR(100),
    localidad VARCHAR(100),
    provincia VARCHAR(100),
    persona_contacto VARCHAR(80),
    telefono_contacto VARCHAR(25),
    email VARCHAR(80),
    sector_actividad VARCHAR(80),
    tipo_terminal ENUM('Cajero', 'Datáfono'),
    comision FLOAT(10, 2),
    retorno ENUM('Sí', 'No'),
    retorno_porcentaje FLOAT(10, 2),
    fondo_inicial FLOAT(10, 2),
    aportacion_fondo ENUM('Cliente', 'Nosotros'),
    metodo_reposicion ENUM('Loomis', 'Transferencia', 'Tarjeta')
);

CREATE TABLE Empresa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_empresa VARCHAR(120),
    cif VARCHAR(120),
    direccion_fiscal VARCHAR(120),
    cp_fiscal VARCHAR(100),
    localidad_fiscal VARCHAR(100),
    provincia_fiscal VARCHAR(100),
    nombre_administrador VARCHAR(60),
    dni_administrador VARCHAR(25)
);

INSERT INTO Establecimiento (fecha_peticion, nombre_establecimiento, direccion, cp, localidad, provincia, persona_contacto, telefono_contacto, email, sector_actividad, tipo_terminal, comision, retorno, retorno_porcentaje, fondo_inicial, aportacion_fondo, metodo_reposicion) VALUES
    ('2023-08-15 10:00:00', 'ABC Cafetería', 'Calle Mayor 123', '12345', 'Ciudad A', 'Provincia A', 'Juan Pérez', '123-456-7890', 'juan@example.com', 'Restaurante', 'Datáfono', 2.5, 'Sí', 5.0, 1000.0, 'Cliente', 'Transferencia'),
    ('2023-08-15 11:30:00', 'XYZ Tienda', 'Avenida Principal 456', '54321', 'Ciudad B', 'Provincia B', 'María Gómez', '987-654-3210', 'maria@example.com', 'Retail', 'Cajero', 3.0, 'No', 0.0, 500.0, 'Nosotros', 'Loomis'),
    ('2023-08-15 14:15:00', 'Café del Parque', 'Parque Central, Esquina 1', '67890', 'Ciudad C', 'Provincia C', 'Ana Rodríguez', '555-123-4567', 'ana@example.com', 'Café', 'Datáfono', 2.0, 'Sí', 4.0, 800.0, 'Cliente', 'Tarjeta'),
    ('2023-08-15 16:45:00', 'Ropa Fashion', 'Calle Moda 789', '98765', 'Ciudad D', 'Provincia D', 'Carlos Martínez', '222-333-4444', 'carlos@example.com', 'Moda', 'Cajero', 2.8, 'No', 0.0, 300.0, 'Nosotros', 'Transferencia');

INSERT INTO Empresa (nombre_empresa, cif, direccion_fiscal, cp_fiscal, localidad_fiscal, provincia_fiscal, nombre_administrador, dni_administrador) VALUES
  ('ABC Restauración', 'A12345678', 'Calle Restaurante 987', '12345', 'Ciudad A', 'Provincia A', 'Juan Pérez', '12345678A'),
  ('XYZ Retail', 'B98765432', 'Avenida Comercial 543', '54321', 'Ciudad B', 'Provincia B', 'María Gómez', '98765432B'),
  ('Café del Parque S.L.', 'C55555555', 'Parque Plaza, 2', '67890', 'Ciudad C', 'Provincia C', 'Ana Rodríguez', '55555555C'),
  ('Moda Trendy', 'D11111111', 'Calle de la Moda 123', '98765', 'Ciudad D', 'Provincia D', 'Carlos Martínez', '11111111D');
