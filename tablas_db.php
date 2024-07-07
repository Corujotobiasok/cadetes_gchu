CREATE TABLE clientes (
    id INT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    -- otras columnas específicas de clientes
    FOREIGN KEY (id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE locales (
    id INT PRIMARY KEY,
    nombre_local VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    -- otras columnas específicas de locales
    FOREIGN KEY (id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE cadetes (
    id INT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    vehiculo VARCHAR(255) NOT NULL,
    -- otras columnas específicas de cadetes
    FOREIGN KEY (id) REFERENCES users(id) ON DELETE CASCADE
);