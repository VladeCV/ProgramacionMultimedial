-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 20, 2020 at 03:24 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examen`
--

-- --------------------------------------------------------

--
-- Table structure for table `idetificador`
--

DROP TABLE IF EXISTS `idetificador`;
CREATE TABLE IF NOT EXISTS `idetificador` (
  `id` int NOT NULL,
  `nombrec` varchar(120) DEFAULT NULL,
  `fechanac` date DEFAULT NULL,
  `residencia` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `idetificador`
--

INSERT INTO `idetificador` (`id`, `nombrec`, `fechanac`, `residencia`) VALUES
(165465, 'Fausto Aguilar', '1998-12-11', '04'),
(651613, 'Claudia Arias', '1989-04-12', '03'),
(4646511, 'Carlos Arandia', '1998-05-15', '02'),
(513131, 'Andrea Morales', '2000-11-02', '04'),
(1446177, 'Luisa Choque', '1998-04-06', '03'),
(7132135, 'Ramiro Suarez', '1991-01-13', '03'),
(8616, 'Jose Torrez', '2000-10-13', '03'),
(913154, 'Mariana Gonzales', '1990-04-22', '01'),
(10131546, 'Gonzalo Chipana', '1997-01-13', '02'),
(1454871, 'Lionel Ara', '1999-04-16', '02'),
(1132, 'Lucas Farias', '1995-02-28', '04'),
(15493, 'Rodrigo Choque', '1992-04-26', '03'),
(1414519, 'Pablo Suarez', '1998-09-20', '03');

-- --------------------------------------------------------

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
CREATE TABLE IF NOT EXISTS `notas` (
  `id` int NOT NULL,
  `materia` varchar(10) DEFAULT NULL,
  `nota` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notas`
--

INSERT INTO `notas` (`id`, `materia`, `nota`) VALUES
(165465, 'INF-333', 87),
(651613, 'INF-317', 12),
(4646511, 'INF-333', 31),
(513131, 'INF-317', 99),
(1446177, 'INF-333', 12),
(7132135, 'INF-319', 87),
(8616, 'INF-319', 78),
(913154, 'INF-317', 12),
(1454871, 'INF-333', 13),
(1132, 'INF-325', 65),
(15493, 'INF-333', 54),
(1414519, 'INF-325', 98);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL,
  `usuario` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `contrasena` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `contrasena`) VALUES
(4646511, 'carandia', '$2y$10$T9gpIDxkeUQBhSm3ZpuAi.hJiduaXuQCZQE1hkhGpoYhDIGb9xedG'),
(651613, 'carias', '$2y$10$.OG.yfwXVDaGAcwwdy84Kuynr6N0LCnNudIW8PO/uDh3N1K7UrjWe'),
(165465, 'faguilar', '$2y$10$bL3z8P1w7SMXHmU0GU0mZu2Al10bue/gGwqyEIqetH.KzG3dApdDi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

SELECT COUNT(*) cantaprobados, idetificador.residencia
FROM notas
INNER JOIN idetificador ON notas.id=idetificador.id
WHERE notas.nota>=51
GROUP BY idetificador.residencia;

SELECT COUNT(*) cantaprobados, idetificador.residencia
FROM notas, idetificador
WHERE notas.id=idetificador.id AND notas.nota>=51
GROUP BY idetificador.residencia;


select 
SUM(case when notas.nota >= '51' AND idetificador.residencia ='01' then 1 ELSE 0 END) CH,
SUM(case when notas.nota >= '51' AND idetificador.residencia = '02' then 1 ELSE 0 END) LP,
SUM(case when notas.nota >= '51' AND idetificador.residencia = '03' then 1 ELSE 0 END) CBBA,
SUM(case when notas.nota >= '51' AND idetificador.residencia = '04' then 1 ELSE 0 END) ORU,
SUM(case when notas.nota >= '51' AND idetificador.residencia = '05' then 1 ELSE 0 END) PT,
SUM(case when notas.nota >= '51' AND idetificador.residencia = '06' then 1 ELSE 0 END) TJ,
SUM(case when notas.nota >= '51' AND idetificador.residencia = '07' then 1 ELSE 0 END) SCZ,
SUM(case when notas.nota >= '51' AND idetificador.residencia = '08' then 1 ELSE 0 END) BEN,
SUM(case when notas.nota >= '51' AND idetificador.residencia = '09' then 1 ELSE 0 END) PN
from idetificador, notas
WHERE idetificador.id=notas.id;
