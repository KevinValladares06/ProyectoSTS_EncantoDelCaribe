-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2025 at 08:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `reservas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
    `id` int(11) NOT NULL,
    `admin_nom` int(11) NOT NULL,
    `admin_pass` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO
    `admin_cred` (
        `id`,
        `admin_nom`,
        `admin_pass`
    )
VALUES (3, 1234, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
    `sr_no` int(11) NOT NULL,
    `image` varchar(150) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
    `id` int(11) NOT NULL,
    `categoria` varchar(100) NOT NULL,
    `estado` int(11) NOT NULL DEFAULT 1
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configuraciones`
--

CREATE TABLE `configuraciones` (
    `sr_no` int(11) NOT NULL,
    `site_title` varchar(50) NOT NULL,
    `site_about` varchar(250) NOT NULL,
    `shutdown` tinyint(1) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `configuraciones`
--

INSERT INTO
    `configuraciones` (
        `sr_no`,
        `site_title`,
        `site_about`,
        `shutdown`
    )
VALUES (
        1,
        'Hola',
        'Este es mi sitio web',
        0
    );

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
    `sr_no` int(11) NOT NULL,
    `address` varchar(50) NOT NULL,
    `gmap` varchar(100) NOT NULL,
    `pn1` bigint(20) NOT NULL,
    `pn2` bigint(20) NOT NULL,
    `email` varchar(100) NOT NULL,
    `fb` varchar(100) NOT NULL,
    `ig` varchar(100) NOT NULL,
    `tt` varchar(100) NOT NULL,
    `iframe` varchar(300) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO
    `contact_details` (
        `sr_no`,
        `address`,
        `gmap`,
        `pn1`,
        `pn2`,
        `email`,
        `fb`,
        `ig`,
        `tt`,
        `iframe`
    )
VALUES (
        1,
        'Calle, de Los Alcaldes, F.M',
        'https://maps.app.goo.gl/iyNSe7dE7R5DmbQd6',
        22459631,
        98416500,
        'ask.encantodelcaribe@gmail.com',
        'https://www.facebook.com/?locale=es_LA',
        'https://www.instagram.com/?flo=true',
        'https://www.tiktok.com/foryou?lang=es',
        'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3497.6148620344256!2d-87.2366535!3d14.061301400000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f6f97e03b9d6069:0x11d5cc5575958857!2sC. de Los Alcaldes, Tegucigalpa, Francisco Morazán!5e1!3m2!1ses!2shn!4v17632540'
    );

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
--

CREATE TABLE `empresa` (
    `id` int(11) NOT NULL,
    `num_identidad` varchar(50) NOT NULL,
    `nombre` varchar(255) NOT NULL,
    `telefono` varchar(30) NOT NULL,
    `direccion` varchar(255) NOT NULL,
    `correo` varchar(150) NOT NULL,
    `mensaje` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entradas`
--

CREATE TABLE `entradas` (
    `id` int(11) NOT NULL,
    `titulo` varchar(255) NOT NULL,
    `slug` varchar(255) NOT NULL,
    `descripcion` longtext NOT NULL,
    `foto` varchar(100) NOT NULL,
    `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `categorias` varchar(255) NOT NULL,
    `estado` int(11) NOT NULL DEFAULT 1,
    `id_usuario` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `habitaciones`
--

CREATE TABLE `habitaciones` (
    `id` int(11) NOT NULL,
    `estilo` varchar(200) NOT NULL,
    `numero` int(11) NOT NULL,
    `capacidad` int(11) NOT NULL,
    `slug` varchar(200) NOT NULL,
    `foto` varchar(100) NOT NULL,
    `video` varchar(255) DEFAULT NULL,
    `descripcion` text NOT NULL,
    `precio` decimal(10, 2) NOT NULL,
    `estado` int(11) NOT NULL DEFAULT 1,
    `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservas`
--

CREATE TABLE `reservas` (
    `id` int(11) NOT NULL,
    `monto` decimal(10, 2) NOT NULL,
    `num_transaccion` varchar(50) NOT NULL,
    `cod_reserva` varchar(50) NOT NULL,
    `fecha_ingreso` date NOT NULL,
    `fecha_salida` date NOT NULL,
    `fecha_reserva` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `descripcion` text NOT NULL,
    `estado` int(11) NOT NULL DEFAULT 1,
    `metodo` int(11) NOT NULL,
    `facturacion` text NOT NULL,
    `id_habitacion` int(11) NOT NULL,
    `id_usuario` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
    `id` int(11) NOT NULL,
    `titulo` varchar(200) NOT NULL,
    `subtitulo` varchar(255) NOT NULL,
    `url` varchar(255) DEFAULT NULL,
    `foto` varchar(100) NOT NULL,
    `estado` int(11) NOT NULL DEFAULT 1
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
    `sr_no` int(11) NOT NULL,
    `name` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `subject` varchar(100) NOT NULL,
    `message` varchar(500) NOT NULL,
    `date` date NOT NULL DEFAULT current_timestamp(),
    `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `user_queries`
--

INSERT INTO
    `user_queries` (
        `sr_no`,
        `name`,
        `email`,
        `subject`,
        `message`,
        `date`,
        `seen`
    )
VALUES (
        13,
        'pedro',
        'pedro@gmail.com',
        'Masculino',
        'Hola soy karen',
        '2025-11-23',
        0
    ),
    (
        14,
        'juan',
        'Karen@gmail.com',
        'F',
        'hola',
        '2025-11-23',
        0
    ),
    (
        15,
        'juan',
        'Ameth.mejia@yahoo.com',
        'F',
        'Informacion',
        '2025-11-23',
        0
    ),
    (
        16,
        'kevin',
        'Karen@gmail.com',
        'Masculino',
        'hola a todos',
        '2025-11-23',
        0
    );

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
    `id` int(11) NOT NULL,
    `nombre` varchar(150) NOT NULL,
    `correo` varchar(150) NOT NULL,
    `clave` varchar(150) NOT NULL,
    `token` varchar(100) DEFAULT NULL,
    `verify` int(11) NOT NULL DEFAULT 0,
    `rol` int(11) NOT NULL,
    `foto` varchar(100) DEFAULT NULL,
    `estado` int(11) NOT NULL DEFAULT 1,
    `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel` ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuraciones`
--
ALTER TABLE `configuraciones`
ADD PRIMARY KEY (`sr_no`) USING BTREE;

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details` ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entradas`
--
ALTER TABLE `entradas`
ADD PRIMARY KEY (`id`),
ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `habitaciones`
--
ALTER TABLE `habitaciones` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservas`
--
ALTER TABLE `reservas`
ADD PRIMARY KEY (`id`),
ADD KEY `id_habitacion` (`id_habitacion`),
ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries` ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios` ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configuraciones`
--
ALTER TABLE `configuraciones`
MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entradas`
--
ALTER TABLE `entradas` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `habitaciones`
--
ALTER TABLE `habitaciones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservas`
--
ALTER TABLE `reservas` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 17;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entradas`
--
ALTER TABLE `entradas`
ADD CONSTRAINT `entradas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservas`
--
ALTER TABLE `reservas`
ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_habitacion`) REFERENCES `habitaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;