-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 09:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latrenza`
--

-- --------------------------------------------------------

--
-- Table structure for table `clasificacion`
--

CREATE TABLE `clasificacion` (
  `IDClasificacion` int(11) NOT NULL,
  `Clasificacion` varchar(100) NOT NULL,
  `Sabor_o_Producto` varchar(100) NOT NULL,
  `Costo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clasificacion`
--

INSERT INTO `clasificacion` (`IDClasificacion`, `Clasificacion`, `Sabor_o_Producto`, `Costo`) VALUES
(1, 'Pastel', 'Chocolate', '225'),
(2, 'Pan', 'Concha', '16'),
(3, 'Pastel', 'Vainilla', '200'),
(4, 'Pan', 'Dona', '20'),
(5, 'Pan', 'Torcido', '16');

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `IDVenta` int(11) NOT NULL,
  `IDProducto` int(11) NOT NULL,
  `IDCliente` int(11) NOT NULL,
  `IDEmpleado` int(11) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Importe` int(11) NOT NULL,
  `FechaVenta` varchar(100) NOT NULL,
  `FechaCancelacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`IDVenta`, `IDProducto`, `IDCliente`, `IDEmpleado`, `Precio`, `Cantidad`, `Importe`, `FechaVenta`, `FechaCancelacion`) VALUES
(1, 0, 0, 0, 0, 0, 0, '14/02/2024', '15/02/2024'),
(2, 0, 0, 0, 0, 0, 0, '12/02/2024', '12/02/2024'),
(3, 0, 0, 0, 0, 0, 0, '27/02/2024', '28/02/2024'),
(4, 0, 0, 0, 0, 0, 0, '09/02/2024', '10/02/2024'),
(5, 0, 0, 0, 0, 0, 0, '01/03/2024', '02/03/2024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD PRIMARY KEY (`IDClasificacion`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`IDVenta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clasificacion`
--
ALTER TABLE `clasificacion`
  MODIFY `IDClasificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `IDVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
