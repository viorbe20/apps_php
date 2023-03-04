-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 01:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `obras`
--

CREATE TABLE `obras` (
  `id` int(11) NOT NULL,
  `titulo` varchar(256) NOT NULL,
  `nombre_autor` varchar(256) NOT NULL,
  `apellidos_autor` varchar(256) NOT NULL,
  `editorial` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obras`
--

INSERT INTO `obras` (`id`, `titulo`, `nombre_autor`, `apellidos_autor`, `editorial`) VALUES
(1, 'El Quijote', 'Miguel', 'de Cervantes', 'Anaya'),
(2, 'La sombra del viento', 'Carlos ', 'Ruiz Zafón', 'Planeta'),
(3, 'Cien años de soledad', 'Gabriel', 'García Márquez', 'Círculo de Lectores'),
(4, 'Nada', 'Carmen', 'Laforet', 'Destino'),
(5, 'La Regenta', 'Leopoldo', 'Alas Clarín', 'Cátedra');

-- --------------------------------------------------------

--
-- Table structure for table `perfiles`
--

CREATE TABLE `perfiles` (
  `perfil` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perfiles`
--

INSERT INTO `perfiles` (`perfil`) VALUES
('admin'),
('employee'),
('user');

-- --------------------------------------------------------

--
-- Table structure for table `prestamos`
--

CREATE TABLE `prestamos` (
  `id` int(11) NOT NULL,
  `id_obra` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_prestamo` date NOT NULL DEFAULT current_timestamp(),
  `fecha_devolucion` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestamos`
--

INSERT INTO `prestamos` (`id`, `id_obra`, `id_usuario`, `fecha_prestamo`, `fecha_devolucion`, `estado`) VALUES
(1, 1, 1, '2023-03-04', '2023-03-11', 1),
(2, 1, 2, '2023-03-04', '2023-03-05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `dni` varchar(15) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `perfil` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `psw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombre`, `apellidos`, `perfil`, `username`, `psw`) VALUES
(1, '44362508Q', 'Virginia', 'Ordoño Bernier', 3, 'vuser', 'vuser'),
(2, '44362538Q', 'Daniel', 'Ayala Cantador', 3, 'duser', 'duser'),
(3, '44362508Q', 'Virginia', 'Ordoño Bernier', 1, 'vadmin', 'vadmin'),
(4, '44362508Q', 'Virginia', 'Ordoño Bernier', 2, 'vemployee', 'vemployee'),
(5, '44362538Q', 'Daniel', 'Ayala Cantador', 1, 'dadmin', 'dadmin'),
(6, '44362538Q', 'Daniel', 'Ayala Cantador', 2, 'demployee', 'demployee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`perfil`);

--
-- Indexes for table `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `obras`
--
ALTER TABLE `obras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
