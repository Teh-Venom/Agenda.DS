-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Fev-2018 às 23:55
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
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `idCidade` int(11) NOT NULL,
  `idEstado` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `email`
--

CREATE TABLE `email` (
  `idEmail` int(11) NOT NULL,
  `idEntidade_Email` int(11) NOT NULL,
  `endereco` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idEndereco` int(11) NOT NULL,
  `idEntidade_Endereco` int(11) NOT NULL,
  `idCidade_Endereco` int(11) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(15) NOT NULL,
  `bairro` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entidade`
--

CREATE TABLE `entidade` (
  `idEntidade` int(11) NOT NULL,
  `IdListaGrupo_Entidade` int(11) NOT NULL,
  `IdListaSufixo_Entidade` int(11) NOT NULL,
  `primeiroNome` varchar(50) NOT NULL,
  `sobreNome` varchar(50) DEFAULT NULL,
  `ultimoNome` varchar(50) DEFAULT NULL,
  `apelido` varchar(50) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `flagEntidadeJuridica` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `listagrupo`
--

CREATE TABLE `listagrupo` (
  `idListaGrupo` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `listasufixo`
--

CREATE TABLE `listasufixo` (
  `idListaSufixo` int(11) NOT NULL,
  `nome` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `listatipotelefone`
--

CREATE TABLE `listatipotelefone` (
  `idListaTipoTelefone` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE `telefone` (
  `idTelefone` int(11) NOT NULL,
  `idEntidade_Telefone` int(11) NOT NULL,
  `idListaTipoTelefone_Telefone` int(11) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `ddd` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`idCidade`),
  ADD KEY `idEstado_idx` (`idEstado`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`idEmail`),
  ADD KEY `idEntidade_idx` (`idEntidade_Email`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idEndereco`),
  ADD KEY `idEntidade_idx` (`idEntidade_Endereco`),
  ADD KEY `idCidade_idx` (`idCidade_Endereco`);

--
-- Indexes for table `entidade`
--
ALTER TABLE `entidade`
  ADD PRIMARY KEY (`idEntidade`),
  ADD KEY `IdListaSufixo_idx` (`IdListaSufixo_Entidade`),
  ADD KEY `IdListaGrupo_idx` (`IdListaGrupo_Entidade`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indexes for table `listagrupo`
--
ALTER TABLE `listagrupo`
  ADD PRIMARY KEY (`idListaGrupo`);

--
-- Indexes for table `listasufixo`
--
ALTER TABLE `listasufixo`
  ADD PRIMARY KEY (`idListaSufixo`);

--
-- Indexes for table `listatipotelefone`
--
ALTER TABLE `listatipotelefone`
  ADD PRIMARY KEY (`idListaTipoTelefone`);

--
-- Indexes for table `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`idTelefone`),
  ADD KEY `idEntidade_idx` (`idEntidade_Telefone`),
  ADD KEY `idListaTipoTelefone_idx` (`idListaTipoTelefone_Telefone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `idCidade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entidade`
--
ALTER TABLE `entidade`
  MODIFY `idEntidade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listagrupo`
--
ALTER TABLE `listagrupo`
  MODIFY `idListaGrupo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listasufixo`
--
ALTER TABLE `listasufixo`
  MODIFY `idListaSufixo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listatipotelefone`
--
ALTER TABLE `listatipotelefone`
  MODIFY `idListaTipoTelefone` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `telefone`
--
ALTER TABLE `telefone`
  MODIFY `idTelefone` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `idEstado` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `idEntidade_Email` FOREIGN KEY (`idEntidade_Email`) REFERENCES `entidade` (`idEntidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `idCidade` FOREIGN KEY (`idCidade_Endereco`) REFERENCES `cidade` (`idCidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idEntidade` FOREIGN KEY (`idEntidade_Endereco`) REFERENCES `entidade` (`idEntidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `entidade`
--
ALTER TABLE `entidade`
  ADD CONSTRAINT `IdListaGrupo` FOREIGN KEY (`IdListaGrupo_Entidade`) REFERENCES `listagrupo` (`idListaGrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `IdListaSufixo` FOREIGN KEY (`IdListaSufixo_Entidade`) REFERENCES `listasufixo` (`idListaSufixo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `idEntidade_Telefone` FOREIGN KEY (`idEntidade_Telefone`) REFERENCES `entidade` (`idEntidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idListaTipoTelefone_Telefone` FOREIGN KEY (`idListaTipoTelefone_Telefone`) REFERENCES `listatipotelefone` (`idListaTipoTelefone`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
