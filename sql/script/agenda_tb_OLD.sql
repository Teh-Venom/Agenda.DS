-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Fev-2018 às 22:55
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_tb`
--

CREATE TABLE `agenda_tb` (
  `idAgenda` int(4) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `grupo` varchar(15) NOT NULL,
  `operadora` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fixo` varchar(15) NOT NULL,
  `dataNascimento` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `obs` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda_tb`
--
ALTER TABLE `agenda_tb`
  ADD PRIMARY KEY (`idAgenda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda_tb`
--
ALTER TABLE `agenda_tb`
  MODIFY `idAgenda` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
