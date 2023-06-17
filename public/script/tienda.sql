DROP DATABASE IF EXISTS tienda;
CREATE DATABASE tienda;
USE tienda;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE categorias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    estatus ENUM('disponible', 'no_disponible') NOT NULL
);

CREATE TABLE marcas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    estatus ENUM('disponible', 'no_disponible') NOT NULL
);

CREATE TABLE productos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    cantidad_disponible INT NOT NULL,
    estatus ENUM('disponible', 'no_disponible') NOT NULL,
    precio DECIMAL(10, 2),
    descripcion TEXT,
    talla VARCHAR(50),
    color VARCHAR(50),
    ultima_actualizacion DATE,
    categoria_id INT,
    marca_id INT,
    INDEX idx_categoria_id (categoria_id),
    INDEX idx_marca_id (marca_id),
    FOREIGN KEY (categoria_id) REFERENCES categorias(id),
    FOREIGN KEY (marca_id) REFERENCES marcas(id)
);

CREATE TABLE clientes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    apellido_paterno VARCHAR(255),
    apellido_materno VARCHAR(255),
    fecha_nacimiento DATE,
    direccion VARCHAR(255),
    telefono BIGINT,
    ciudad VARCHAR(255),
    estado VARCHAR(255),
    codigo_postal VARCHAR(10),
    estatus ENUM('activo', 'inactivo') NOT NULL,
    fecha_registro DATE,
    user_id INT,
    INDEX idx_user_id (user_id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE pedidos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    cliente_id INT,
    fecha_pedido DATE,
    estatus ENUM('aprobado', 'cancelado', 'en_espera') NOT NULL,
    cantidad_productos INT,
    total_pago DECIMAL(10, 2),
    metodo_pago ENUM('tarjeta', 'deposito', 'transferencia') NOT NULL,
    metodo_envio ENUM('estandar', 'express') NOT NULL,
    INDEX idx_cliente_id (cliente_id),
    FOREIGN KEY (cliente_id) REFERENCES clientes(id)
);

CREATE TABLE detalles_pedido (
    id INT PRIMARY KEY AUTO_INCREMENT,
    pedido_id INT,
    producto_id INT,
    cantidad INT,
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

CREATE TABLE ventas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    pedido_id INT,
    fecha_venta DATE,
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id)
);

CREATE TABLE tickets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    venta_id INT,
    informacion TEXT,
    INDEX idx_venta_id (venta_id),
    FOREIGN KEY (venta_id) REFERENCES ventas(id)
);

CREATE INDEX idx_categoria_estatus ON categorias(estatus);
CREATE INDEX idx_marca_estatus ON marcas(estatus);
CREATE INDEX idx_producto_estatus ON productos(estatus);
CREATE INDEX idx_cliente_estatus ON clientes(estatus);
CREATE INDEX idx_pedido_estatus ON pedidos(estatus);
CREATE INDEX idx_venta_pedido_id ON ventas(pedido_id);
CREATE INDEX idx_ticket_venta_id ON tickets(venta_id);
