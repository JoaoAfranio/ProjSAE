-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Abr-2019 às 00:31
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sae`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `afirmativa`
--

CREATE TABLE `afirmativa` (
  `IdAfirmativa` int(11) NOT NULL,
  `Descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `diagnostico`
--

CREATE TABLE `diagnostico` (
  `IdDiagnostico` int(11) NOT NULL,
  `Descricao` varchar(100) NOT NULL,
  `IdUnidadeInternacao` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `diagnostico`
--

INSERT INTO `diagnostico` (`IdDiagnostico`, `Descricao`, `IdUnidadeInternacao`) VALUES
(1, 'Diagnostico1', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `diagnosticoprescricao`
--

CREATE TABLE `diagnosticoprescricao` (
  `IdDiagnostico` int(11) NOT NULL,
  `IdPrescricao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prescricao`
--

CREATE TABLE `prescricao` (
  `IdPrescricao` int(11) NOT NULL,
  `Descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prescricao`
--

INSERT INTO `prescricao` (`IdPrescricao`, `Descricao`) VALUES
(2, 'prescrição'),
(3, 'prescricao2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questao`
--

CREATE TABLE `questao` (
  `IdQuestao` int(11) NOT NULL,
  `IdTipoQuestao` tinyint(4) NOT NULL,
  `Descricao` varchar(200) NOT NULL,
  `PossuiOutro` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `questao`
--

INSERT INTO `questao` (`IdQuestao`, `IdTipoQuestao`, `Descricao`, `PossuiOutro`) VALUES
(5, 2, 'PrimeiraPergunta', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questaoafirmativa`
--

CREATE TABLE `questaoafirmativa` (
  `IdAfirmativa` int(11) NOT NULL,
  `IdQuestao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultado`
--

CREATE TABLE `resultado` (
  `IdResultado` int(11) NOT NULL,
  `Descricao` varchar(100) NOT NULL,
  `IdDiagnostico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoquestao`
--

CREATE TABLE `tipoquestao` (
  `IdTipoQuestao` tinyint(4) NOT NULL,
  `Descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipoquestao`
--

INSERT INTO `tipoquestao` (`IdTipoQuestao`, `Descricao`) VALUES
(1, 'Aberta'),
(2, 'Fechada Escolha Única'),
(3, 'Fechada Escolha Múltipla'),
(4, 'Data'),
(5, 'Afirmação ou Negação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidadeinternacao`
--

CREATE TABLE `unidadeinternacao` (
  `IdUnidadeInternacao` tinyint(4) NOT NULL,
  `NomeUnidade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `unidadeinternacao`
--

INSERT INTO `unidadeinternacao` (`IdUnidadeInternacao`, `NomeUnidade`) VALUES
(1, 'UTI Adulto'),
(2, 'UTI Pediátrico'),
(3, 'UTI Neonato'),
(4, 'Pediatria'),
(5, 'Cirurgica 1'),
(6, 'Cirurgica 2'),
(7, 'Clínica Médica'),
(8, 'Alojamento Conjunto');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afirmativa`
--
ALTER TABLE `afirmativa`
  ADD PRIMARY KEY (`IdAfirmativa`);

--
-- Indexes for table `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`IdDiagnostico`),
  ADD KEY `unidadeinternacao_diagnostico_fk` (`IdUnidadeInternacao`);

--
-- Indexes for table `diagnosticoprescricao`
--
ALTER TABLE `diagnosticoprescricao`
  ADD PRIMARY KEY (`IdDiagnostico`,`IdPrescricao`),
  ADD KEY `prescricao_diagnosticoprescricao_fk` (`IdPrescricao`);

--
-- Indexes for table `prescricao`
--
ALTER TABLE `prescricao`
  ADD PRIMARY KEY (`IdPrescricao`);

--
-- Indexes for table `questao`
--
ALTER TABLE `questao`
  ADD PRIMARY KEY (`IdQuestao`),
  ADD KEY `tipoavaliacao_avaliacao_fk` (`IdTipoQuestao`);

--
-- Indexes for table `questaoafirmativa`
--
ALTER TABLE `questaoafirmativa`
  ADD PRIMARY KEY (`IdAfirmativa`,`IdQuestao`),
  ADD KEY `questao_questaoafirmativa_fk` (`IdQuestao`);

--
-- Indexes for table `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`IdResultado`),
  ADD KEY `diagnostico_resultado_fk` (`IdDiagnostico`);

--
-- Indexes for table `tipoquestao`
--
ALTER TABLE `tipoquestao`
  ADD PRIMARY KEY (`IdTipoQuestao`);

--
-- Indexes for table `unidadeinternacao`
--
ALTER TABLE `unidadeinternacao`
  ADD PRIMARY KEY (`IdUnidadeInternacao`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `afirmativa`
--
ALTER TABLE `afirmativa`
  MODIFY `IdAfirmativa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `IdDiagnostico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prescricao`
--
ALTER TABLE `prescricao`
  MODIFY `IdPrescricao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questao`
--
ALTER TABLE `questao`
  MODIFY `IdQuestao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resultado`
--
ALTER TABLE `resultado`
  MODIFY `IdResultado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipoquestao`
--
ALTER TABLE `tipoquestao`
  MODIFY `IdTipoQuestao` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unidadeinternacao`
--
ALTER TABLE `unidadeinternacao`
  MODIFY `IdUnidadeInternacao` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD CONSTRAINT `unidadeinternacao_diagnostico_fk` FOREIGN KEY (`IdUnidadeInternacao`) REFERENCES `unidadeinternacao` (`IdUnidadeInternacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `diagnosticoprescricao`
--
ALTER TABLE `diagnosticoprescricao`
  ADD CONSTRAINT `diagnostico_diagnosticoprescricao_fk` FOREIGN KEY (`IdDiagnostico`) REFERENCES `diagnostico` (`IdDiagnostico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `prescricao_diagnosticoprescricao_fk` FOREIGN KEY (`IdPrescricao`) REFERENCES `prescricao` (`IdPrescricao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `questao`
--
ALTER TABLE `questao`
  ADD CONSTRAINT `tipoavaliacao_avaliacao_fk` FOREIGN KEY (`IdTipoQuestao`) REFERENCES `tipoquestao` (`IdTipoQuestao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `resultado`
--
ALTER TABLE `resultado`
  ADD CONSTRAINT `diagnostico_resultado_fk` FOREIGN KEY (`IdDiagnostico`) REFERENCES `diagnostico` (`IdDiagnostico`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
