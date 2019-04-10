-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 05:45 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

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
-- Table structure for table `afirmativa`
--

CREATE TABLE `afirmativa` (
  `IdAfirmativa` int(11) NOT NULL,
  `Descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `afirmativa`
--

INSERT INTO `afirmativa` (`IdAfirmativa`, `Descricao`) VALUES
(1, 'Reativo frente a estímulo'),
(2, 'Hipoativo'),
(3, 'Busca'),
(4, 'Sucção'),
(5, 'Preensão palmar'),
(6, 'Preensão plantar'),
(7, 'Cutâneo plantar/babinsk'),
(8, 'de Moro'),
(9, 'Marcha Reflexa'),
(10, 'Simétrico'),
(11, 'Assimétrico'),
(12, 'Bossa'),
(13, 'Cefalohematoma'),
(14, 'Escoriações'),
(15, 'Máscara equimótica'),
(16, 'Planas'),
(17, 'Deprimida'),
(18, 'Abaulada'),
(19, 'Mucosa corada'),
(20, 'Mucosa hipocorada'),
(21, 'Secreção purulenta'),
(22, 'Hiperemia'),
(23, 'Edema'),
(24, 'Mesmo nível dos olhos'),
(25, 'Acima dos olhos'),
(26, 'Abaixo dos olhos'),
(27, 'Sem alterações'),
(28, 'Malformado'),
(29, 'Palato íntegro'),
(30, 'Lábios íntegros'),
(31, 'Dentes neonatais'),
(32, 'Móvel'),
(33, 'Torcicolo Congênito'),
(34, 'Bócio'),
(35, 'Aquecidas'),
(36, 'Frias'),
(37, 'Cianose periférica'),
(38, 'Pulsos periféricos presentes'),
(39, 'Ausente'),
(40, '1'),
(41, '2'),
(42, '3'),
(43, 'Regular'),
(44, 'Irregular'),
(45, 'Com clamp'),
(46, 'Sem clamp'),
(47, 'Bom aspecto'),
(48, 'Hiperemiado'),
(49, 'Exsudato'),
(50, 'Plano'),
(51, 'Globoso'),
(52, 'Distendido'),
(53, 'Tenso'),
(54, 'Flácido'),
(55, 'RHA+'),
(56, 'RHA Diminuídos'),
(57, 'RHA-'),
(58, '<24 h'),
(59, '24-48 h'),
(60, 'Masculino'),
(61, 'Feminino'),
(62, 'V.O'),
(63, 'aleitamento materno exclusivo'),
(64, 'complemento'),
(65, 'fórmula'),
(66, 'SOG'),
(67, 'NPP/T'),
(68, 'SIM'),
(69, 'Não'),
(70, 'Negativa'),
(71, 'Positiva'),
(75, 'Íntegros'),
(76, 'Alterações'),
(77, 'Presente em 24h'),
(78, 'Presente entre 24-48h'),
(79, 'Ausente'),
(80, 'Corada'),
(81, 'Descorada'),
(82, 'Hidratada'),
(83, 'Desitrada'),
(84, 'Pletora'),
(85, 'Lanugo'),
(86, 'Hemangioma'),
(87, 'Descamativa'),
(88, 'Icterícia'),
(89, 'Millium'),
(91, 'Pé torto');

-- --------------------------------------------------------

--
-- Table structure for table `aplicacao`
--

CREATE TABLE `aplicacao` (
  `IdAplicacao` int(11) NOT NULL,
  `IdAvaliacao` int(11) NOT NULL,
  `IdFormulario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aplicacao`
--

INSERT INTO `aplicacao` (`IdAplicacao`, `IdAvaliacao`, `IdFormulario`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 4),
(6, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `avaliacao`
--

CREATE TABLE `avaliacao` (
  `IdAvaliacao` int(11) NOT NULL,
  `Descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avaliacao`
--

INSERT INTO `avaliacao` (`IdAvaliacao`, `Descricao`) VALUES
(1, 'Avaliação Neurólogica - RN'),
(2, 'Avaliação Respiratória - RN'),
(3, 'Avaliação Cardiovascular - RN'),
(4, 'Avaliação Abdome - RN'),
(5, 'Dados Paciente - RN'),
(6, 'Dados Paciente - Pediátrico'),
(7, 'Dados Paciente - Adulto'),
(8, 'Avaliação Músculo Esquelético');

-- --------------------------------------------------------

--
-- Table structure for table `avaliacaoquestao`
--

CREATE TABLE `avaliacaoquestao` (
  `IdQuestao` int(11) NOT NULL,
  `IdAvaliacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avaliacaoquestao`
--

INSERT INTO `avaliacaoquestao` (`IdQuestao`, `IdAvaliacao`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 3),
(23, 3),
(24, 3),
(25, 4),
(26, 4),
(27, 4),
(28, 4),
(29, 4),
(30, 4),
(31, 4),
(32, 4),
(33, 4),
(34, 5),
(35, 5),
(36, 5),
(37, 5),
(38, 5),
(39, 5),
(40, 5),
(42, 4),
(43, 4),
(48, 8),
(49, 8),
(50, 8),
(51, 8),
(52, 8),
(53, 8),
(54, 8),
(55, 8),
(56, 8),
(57, 8),
(58, 8);

-- --------------------------------------------------------

--
-- Table structure for table `diagnostico`
--

CREATE TABLE `diagnostico` (
  `IdDiagnostico` int(11) NOT NULL,
  `Descricao` varchar(100) NOT NULL,
  `IdUnidadeInternacao` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnostico`
--

INSERT INTO `diagnostico` (`IdDiagnostico`, `Descricao`, `IdUnidadeInternacao`) VALUES
(1, 'Diagnostico de UTI Adulto I', 1),
(2, 'Diagnostico de UTI Adulto II', 1),
(3, 'Diagnostico de UTI Adulto III', 1),
(4, 'Diagnostico de UTI Adulto IV', 1),
(5, 'Deglutinação', 5),
(6, 'Deglutinação', 6),
(7, 'Deglutinação', 7),
(8, 'Obesidade', 5),
(9, 'Obesidade', 6),
(10, 'Obesidade', 7),
(11, 'Risco de Glicemia Instável', 5),
(12, 'Risco de Glicemia Instável', 6),
(13, 'Risco de Glicêmia Instável', 7),
(14, 'Risco de Incontinência urinária de Urgencia', 5),
(15, 'Risco de Incontinência urinária de Urgencia', 6),
(16, 'Risco de Incontinência urinária de Urgencia', 7),
(17, 'Retenção Urinária', 5),
(18, 'Retenção Urinária', 6),
(19, 'Retenção Urinária', 7),
(20, 'Constipação', 5),
(21, 'Constipação', 6),
(22, 'Constipação', 7),
(23, 'Diarréia', 5),
(24, 'Diarréia', 6),
(25, 'Diarréia', 7),
(26, 'Proteção Ineficaz', 3),
(27, 'Proteção Ineficaz', 1),
(28, 'Proteção Ineficaz', 8),
(29, 'Deglutinação Prejudicada', 1),
(30, 'Deglutinação Prejudicada', 3),
(31, 'Deglutinação Prejudicada', 8),
(32, 'Nutrição desequilibrada: menor que as necessidades corporais', 1),
(33, 'Nutrição desequilibrada: menor que as necessidades corporais', 3),
(34, 'Nutrição desequilibrada: menor que as necessidades corporais', 8),
(35, 'Risco de função hepática prejudicada', 1),
(36, 'Risco de função hepática prejudicada', 3),
(37, 'Risco de função hepática prejudicada', 8);

-- --------------------------------------------------------

--
-- Table structure for table `formulario`
--

CREATE TABLE `formulario` (
  `IdFormulario` int(11) NOT NULL,
  `Descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formulario`
--

INSERT INTO `formulario` (`IdFormulario`, `Descricao`) VALUES
(1, 'Instrumento de Anamnese e Exame Físico - RN'),
(2, 'Instrumento de Anamnese e Exame Físico - Pediátrico'),
(3, 'Instrumento de Anamnese e Exame Físico - Adulto'),
(4, 'Cadastro Paciente - RN'),
(5, 'Cadastro Paciente - Pediátrico'),
(6, 'Cadastro Paciente - Adulto');

-- --------------------------------------------------------

--
-- Table structure for table `paciente`
--

CREATE TABLE `paciente` (
  `IdPaciente` int(11) NOT NULL,
  `Nome` varchar(200) NOT NULL,
  `IdUnidadeInternacao` tinyint(4) NOT NULL,
  `CodigoPaciente` int(4) NOT NULL,
  `IdTipoPaciente` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paciente`
--

INSERT INTO `paciente` (`IdPaciente`, `Nome`, `IdUnidadeInternacao`, `CodigoPaciente`, `IdTipoPaciente`) VALUES
(1, 'José João da Silva', 1, 100, 1),
(2, 'Gustavo Olivera Bessa', 3, 101, 3),
(3, 'João Victor Santos', 5, 102, 3),
(4, 'João Batista Feranandes', 7, 103, 3),
(5, 'João pedro Lucas Gançalves', 3, 104, 3),
(6, 'Luisa Fernanades Costa', 6, 105, 3),
(7, 'Ana Valentina de Almeida', 7, 106, 3),
(8, 'Enzo Gabriel Silva Rosa', 3, 107, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pacientediagnostico`
--

CREATE TABLE `pacientediagnostico` (
  `IdDiagnostico` int(11) NOT NULL,
  `idQuestionarioDiagPresc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pacientediagnostico`
--

INSERT INTO `pacientediagnostico` (`IdDiagnostico`, `idQuestionarioDiagPresc`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(10, 8),
(12, 7),
(22, 5),
(23, 4),
(26, 6),
(27, 1),
(32, 2),
(36, 3),
(36, 9);

-- --------------------------------------------------------

--
-- Table structure for table `pacienteprescricao`
--

CREATE TABLE `pacienteprescricao` (
  `IdPrescricao` int(11) NOT NULL,
  `idQuestionarioDiagPresc` int(11) NOT NULL,
  `Rotina` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prescricao`
--

CREATE TABLE `prescricao` (
  `IdPrescricao` int(11) NOT NULL,
  `Descricao` varchar(300) NOT NULL,
  `IdDiagnostico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescricao`
--

INSERT INTO `prescricao` (`IdPrescricao`, `Descricao`, `IdDiagnostico`) VALUES
(1, 'Prescrição (I) para Diag I', 1),
(2, 'Prescrição (II) para Diag I\r\n', 1),
(3, 'Prescrição (III) para Diag I\r\n', 1),
(4, 'Prescrição (I) para Diag II\r\n', 2),
(5, 'Monitorar a capacidade de deglutir e falar', 5),
(6, 'Monitorar a capacidade de deglutir e falar', 6),
(7, 'Monitorar a capacidade de deglutir e falar', 7),
(8, 'Realizar uma avaliação nutricional, conforme apropriado', 5),
(9, 'Realizar uma avaliação nutricional, conforme apropriado', 6),
(10, 'Realizar uma avaliação nutricional, conforme apropriado', 7),
(11, 'Determinar a necessidade de alimentaçãovia sonda entereal', 5),
(12, 'Determinar a necessidade de alimentaçãovia sonda entereal', 6),
(13, 'Determinar a necessidade de alimentaçãovia sonda entereal', 7),
(14, 'Avaliar o nível atual do de conhecimentos do paciente sobre a dieta prescrita', 10),
(15, 'Avaliar o nível atual do de conhecimentos do paciente sobre a dieta prescrita', 9),
(16, 'Avaliar o nível atual do de conhecimentos do paciente sobre a dieta prescrita', 8),
(17, 'Orientar o paciente sobre alimentos permitidos e proibidos', 10),
(18, 'Orientar o paciente sobre alimentos permitidos e proibidos', 9),
(19, 'Orientar o paciente sobre alimentos permitidos e proibidos', 8),
(20, 'Determinar a presença de sons intestinais', 20),
(21, 'Determinar a presença de sons intestinais', 21),
(22, 'Determinar a presença de sons intestinais', 22),
(23, 'Monitorar o aparecimento de sinais e sintomas de constipação', 20),
(24, 'Monitorar o aparecimento de sinais e sintomas de constipação', 21),
(25, 'Monitorar o aparecimento de sinais e sintomas de constipação', 22),
(26, 'Monitorar o aparecimento de sinais e sintomas de impactação', 20),
(27, 'Monitorar o aparecimento de sinais e sintomas de impactação', 21),
(28, 'Monitorar o aparecimento de sinais e sintomas de impactação', 22),
(29, 'Determinar o histórico da diarreia', 23),
(30, 'Determinar o histórico da diarreia', 24),
(31, 'Determinar o histórico da diarreia', 25),
(32, 'orientar o paciente para que notifique a enfermagem a cada episódio de diarréias', 23),
(33, 'orientar o paciente para que notifique a enfermagem a cada episódio de diarréias', 24),
(34, 'orientar o paciente para que notifique a enfermagem a cada episódio de diarréias', 25),
(35, 'Determinar a presença de sons intestinais, Monitorar a tolerância á evolução da dieta', 23),
(36, 'Determinar a presença de sons intestinais, Monitorar a tolerância á evolução da dieta', 24),
(37, 'Determinar a presença de sons intestinais, Monitorar a tolerância á evolução da dieta', 25),
(38, 'Instituir NP se necessário. Monitorar os níveis de albumina sérica, linfócitos e eletrólitos', 32),
(39, 'Instituir NP se necessário. Monitorar os níveis de albumina sérica, linfócitos e eletrólitos', 33),
(40, 'Instituir NP se necessário. Monitorar os níveis de albumina sérica, linfócitos e eletrólitos', 34);

-- --------------------------------------------------------

--
-- Table structure for table `questao`
--

CREATE TABLE `questao` (
  `IdQuestao` int(11) NOT NULL,
  `IdTipoQuestao` tinyint(4) NOT NULL,
  `Descricao` varchar(200) NOT NULL,
  `PossuiOutro` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questao`
--

INSERT INTO `questao` (`IdQuestao`, `IdTipoQuestao`, `Descricao`, `PossuiOutro`) VALUES
(1, 2, 'Atividade', 'N'),
(2, 3, 'Reflexos', 'S'),
(3, 3, 'Crânio', 'S'),
(4, 2, 'Fontanelas', 'N'),
(5, 3, 'Olhos', 'N'),
(6, 1, 'Pupilas', 'N'),
(7, 2, 'Inserção da orelha', 'N'),
(8, 2, 'Lóbulo', 'N'),
(9, 3, 'Boca', 'N'),
(10, 3, 'Pescoço', 'S'),
(11, 5, 'Dispneia', 'N'),
(14, 5, 'Tiragem Intercostal', 'N'),
(15, 5, 'Retração Xifóide', 'N'),
(16, 5, 'Batimento de Aleta Nasal', 'N'),
(17, 5, 'Gemido Expiratório', 'N'),
(18, 5, 'Tosse', 'N'),
(19, 5, 'Enfisema Subcutâneo', 'N'),
(20, 1, 'Secreção', 'N'),
(21, 1, 'Imagem Radiológica', 'N'),
(22, 3, 'Extremidades', 'N'),
(23, 2, 'Bulhas', 'N'),
(24, 2, 'Ritmo', 'N'),
(25, 2, 'Coto Umbilical', 'N'),
(26, 5, 'Presença de cateter umbilical', 'N'),
(27, 4, 'Data da inserção', 'N'),
(28, 4, 'Data do curativo', 'N'),
(29, 2, 'Aspecto', 'S'),
(30, 3, 'Abdome', 'N'),
(31, 5, 'Hepatomegalia', 'N'),
(32, 5, 'Esplenomegalia', 'N'),
(33, 2, 'Mecônio', 'N'),
(34, 1, 'Nome da mãe', 'N'),
(35, 1, 'Número de Gestações', 'N'),
(36, 1, 'Aborto', 'N'),
(37, 1, 'Filhos vivos', 'N'),
(38, 4, 'Data de nascimento do RN', 'N'),
(39, 2, 'Sexo', 'N'),
(40, 1, 'Peso', 'N'),
(41, 5, 'Já fez ou está fazendo algum tratamento?', 'S'),
(42, 3, 'Alimentação', 'N'),
(43, 2, 'Suga Bem?', 'N'),
(44, 1, 'Leito', 'N'),
(45, 1, 'Hora', 'N'),
(46, 1, 'Idade Materna', 'N'),
(47, 1, 'Nome do Recém Nascido', 'N'),
(48, 1, 'Coluna', 'N'),
(49, 3, 'Manobra de Ortoloni', 'S'),
(50, 1, 'Sindactilia', 'N'),
(51, 1, 'Polidactilia', 'N'),
(52, 1, 'Fraturas', 'N'),
(53, 1, 'Luxações', 'N'),
(54, 3, 'Urina', 'N'),
(55, 2, 'Genito Urinario', 'S'),
(56, 3, 'PELE E MUCOSAS', 'S'),
(57, 1, 'Lesão Cutânea', 'N'),
(58, 1, 'Má formações', 'N'),
(59, 1, 'Pé torto', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `questaoaberta`
--

CREATE TABLE `questaoaberta` (
  `IdQuestao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questaoaberta`
--

INSERT INTO `questaoaberta` (`IdQuestao`) VALUES
(6),
(20),
(21),
(27),
(28),
(34),
(35),
(36),
(37),
(38),
(40),
(48),
(50),
(51),
(52),
(53),
(57),
(58),
(59);

-- --------------------------------------------------------

--
-- Table structure for table `questaoafirmativa`
--

CREATE TABLE `questaoafirmativa` (
  `IdAfirmativa` int(11) NOT NULL,
  `IdQuestao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questaoafirmativa`
--

INSERT INTO `questaoafirmativa` (`IdAfirmativa`, `IdQuestao`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 3),
(12, 3),
(16, 4),
(17, 4),
(18, 4),
(19, 5),
(19, 9),
(20, 5),
(20, 9),
(21, 5),
(22, 5),
(23, 5),
(24, 7),
(25, 7),
(26, 7),
(27, 8),
(28, 8),
(29, 9),
(30, 9),
(31, 9),
(32, 10),
(33, 10),
(34, 10),
(35, 22),
(36, 22),
(37, 22),
(38, 22),
(39, 22),
(39, 33),
(40, 23),
(41, 23),
(42, 23),
(43, 24),
(44, 24),
(45, 25),
(46, 25),
(47, 29),
(48, 29),
(49, 29),
(50, 30),
(51, 30),
(52, 30),
(53, 30),
(54, 30),
(55, 30),
(56, 30),
(57, 30),
(58, 30),
(58, 33),
(59, 33),
(60, 39),
(61, 39),
(68, 11),
(68, 14),
(68, 15),
(68, 16),
(68, 17),
(68, 18),
(68, 19),
(68, 31),
(68, 32);

-- --------------------------------------------------------

--
-- Table structure for table `questaofechadaescolhaunica`
--

CREATE TABLE `questaofechadaescolhaunica` (
  `IdQuestao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questaofechadaescolhaunica`
--

INSERT INTO `questaofechadaescolhaunica` (`IdQuestao`) VALUES
(1),
(4),
(7),
(8),
(11),
(14),
(15),
(16),
(17),
(18),
(19),
(23),
(24),
(25),
(29),
(33),
(39),
(55);

-- --------------------------------------------------------

--
-- Table structure for table `questaofechadamultiplaescolha`
--

CREATE TABLE `questaofechadamultiplaescolha` (
  `IdQuestao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questaofechadamultiplaescolha`
--

INSERT INTO `questaofechadamultiplaescolha` (`IdQuestao`) VALUES
(2),
(3),
(5),
(9),
(10),
(22),
(30);

-- --------------------------------------------------------

--
-- Table structure for table `questionario`
--

CREATE TABLE `questionario` (
  `IdQuestionario` int(11) NOT NULL,
  `IdFormulario` int(11) NOT NULL,
  `IdPaciente` int(11) NOT NULL,
  `DataRealizado` date NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionario`
--

INSERT INTO `questionario` (`IdQuestionario`, `IdFormulario`, `IdPaciente`, `DataRealizado`, `IdUsuario`) VALUES
(1, 1, 1, '2018-11-21', 1),
(4, 1, 2, '2018-09-16', 2),
(5, 1, 3, '2018-10-07', 2),
(6, 1, 4, '2018-08-28', 2),
(7, 1, 5, '2018-08-30', 1),
(8, 1, 6, '2018-07-14', 2),
(9, 1, 7, '2018-11-16', 1),
(10, 1, 8, '2018-10-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questionariodiagpres`
--

CREATE TABLE `questionariodiagpres` (
  `idQuestionarioDiagPresc` int(11) NOT NULL,
  `IdPaciente` int(11) NOT NULL,
  `DataRealizado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionariodiagpres`
--

INSERT INTO `questionariodiagpres` (`idQuestionarioDiagPresc`, `IdPaciente`, `DataRealizado`) VALUES
(1, 1, '2018-11-20'),
(2, 1, '2018-11-22'),
(3, 2, '2018-09-16'),
(4, 3, '2018-10-07'),
(5, 4, '2018-08-28'),
(6, 5, '2018-08-30'),
(7, 6, '2018-07-14'),
(8, 7, '2018-11-16'),
(9, 8, '2018-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `resposta`
--

CREATE TABLE `resposta` (
  `IdResposta` int(11) NOT NULL,
  `IdAplicacao` int(11) NOT NULL,
  `IdAvaliacao` int(11) NOT NULL,
  `IdQuestao` int(11) NOT NULL,
  `IdQuestionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resposta`
--

INSERT INTO `resposta` (`IdResposta`, `IdAplicacao`, `IdAvaliacao`, `IdQuestao`, `IdQuestionario`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 1, 4, 1),
(3, 1, 1, 5, 1),
(4, 1, 1, 6, 1),
(5, 1, 1, 1, 4),
(6, 1, 1, 2, 4),
(7, 1, 1, 3, 4),
(8, 1, 1, 4, 4),
(9, 1, 1, 5, 4),
(10, 1, 1, 6, 4),
(11, 1, 1, 7, 4),
(12, 1, 1, 8, 4),
(13, 1, 1, 9, 4),
(14, 1, 1, 10, 4),
(15, 2, 2, 11, 4),
(16, 2, 2, 14, 4),
(17, 2, 2, 15, 4),
(18, 2, 2, 16, 4),
(19, 2, 2, 17, 4),
(20, 2, 2, 18, 4),
(21, 3, 3, 22, 4),
(22, 3, 3, 23, 4),
(23, 4, 4, 25, 4),
(24, 4, 4, 30, 4),
(25, 4, 4, 31, 4),
(26, 4, 4, 32, 4),
(28, 6, 8, 48, 4),
(29, 6, 8, 49, 4),
(30, 6, 8, 50, 4),
(31, 6, 8, 51, 4),
(32, 6, 8, 52, 4),
(33, 6, 8, 53, 4),
(34, 6, 8, 54, 4),
(35, 6, 8, 55, 4),
(36, 6, 8, 56, 4);

-- --------------------------------------------------------

--
-- Table structure for table `respostaaberta`
--

CREATE TABLE `respostaaberta` (
  `IdResposta` int(11) NOT NULL,
  `DescricaoRespostaAberta` varchar(200) NOT NULL,
  `IdQuestao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `respostaaberta`
--

INSERT INTO `respostaaberta` (`IdResposta`, `DescricaoRespostaAberta`, `IdQuestao`) VALUES
(4, 'Exemplo de resposta aberta - pupilas', 6),
(10, 'Pupilas dilatadas ao extremo', 6),
(28, 'Coluna lesionada na L2', 48),
(30, 'Presença Positiva', 50),
(31, 'Presença Abundante', 51),
(32, 'Nenhuma', 52),
(33, 'Presentes em pequenos pontos', 53);

-- --------------------------------------------------------

--
-- Table structure for table `respostamultipla`
--

CREATE TABLE `respostamultipla` (
  `IdResposta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `respostamultipla`
--

INSERT INTO `respostamultipla` (`IdResposta`) VALUES
(3),
(6),
(7),
(9),
(13),
(21),
(24),
(29),
(34),
(36);

-- --------------------------------------------------------

--
-- Table structure for table `respostamultiplaafirmativa`
--

CREATE TABLE `respostamultiplaafirmativa` (
  `IdResposta` int(11) NOT NULL,
  `IdAfirmativa` int(11) NOT NULL,
  `IdQuestao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `respostamultiplaafirmativa`
--

INSERT INTO `respostamultiplaafirmativa` (`IdResposta`, `IdAfirmativa`, `IdQuestao`) VALUES
(3, 19, 5),
(3, 21, 5),
(6, 4, 2),
(6, 6, 2),
(7, 10, 3),
(7, 12, 3),
(9, 19, 5),
(9, 22, 5),
(13, 19, 9),
(13, 29, 9),
(21, 35, 22),
(21, 37, 22),
(21, 39, 22),
(24, 50, 30),
(24, 53, 30),
(24, 55, 30);

-- --------------------------------------------------------

--
-- Table structure for table `respostaoutro`
--

CREATE TABLE `respostaoutro` (
  `IdResposta` int(11) NOT NULL,
  `DescricaoOutro` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `respostaunica`
--

CREATE TABLE `respostaunica` (
  `IdResposta` int(11) NOT NULL,
  `IdAfirmativa` int(11) NOT NULL,
  `IdQuestao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `respostaunica`
--

INSERT INTO `respostaunica` (`IdResposta`, `IdAfirmativa`, `IdQuestao`) VALUES
(1, 1, 1),
(5, 1, 1),
(2, 16, 4),
(8, 16, 4),
(11, 24, 7),
(12, 27, 8),
(22, 40, 23),
(23, 45, 25),
(15, 68, 11),
(16, 68, 14),
(17, 68, 15),
(18, 68, 16),
(19, 68, 17),
(20, 68, 18),
(25, 68, 31),
(26, 68, 32);

-- --------------------------------------------------------

--
-- Table structure for table `tipopaciente`
--

CREATE TABLE `tipopaciente` (
  `IdTipoPaciente` tinyint(4) NOT NULL,
  `Descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipopaciente`
--

INSERT INTO `tipopaciente` (`IdTipoPaciente`, `Descricao`) VALUES
(1, 'Adulto'),
(2, 'Pediátrico'),
(3, 'Neonato');

-- --------------------------------------------------------

--
-- Table structure for table `tipoquestao`
--

CREATE TABLE `tipoquestao` (
  `IdTipoQuestao` tinyint(4) NOT NULL,
  `Descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipoquestao`
--

INSERT INTO `tipoquestao` (`IdTipoQuestao`, `Descricao`) VALUES
(1, 'Aberta'),
(2, 'Fechada Escolha Única'),
(3, 'Fechada Escolha Múltipla'),
(4, 'Data'),
(5, 'Afirmação ou Negação');

-- --------------------------------------------------------

--
-- Table structure for table `unidadeinternacao`
--

CREATE TABLE `unidadeinternacao` (
  `IdUnidadeInternacao` tinyint(4) NOT NULL,
  `NomeUnidade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unidadeinternacao`
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

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `login` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `administrador` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `nome`, `login`, `senha`, `administrador`) VALUES
(1, 'Fabricia', 'fabricia', '123', 's'),
(2, 'Jose', 'jose', '123', 'n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afirmativa`
--
ALTER TABLE `afirmativa`
  ADD PRIMARY KEY (`IdAfirmativa`);

--
-- Indexes for table `aplicacao`
--
ALTER TABLE `aplicacao`
  ADD PRIMARY KEY (`IdAplicacao`),
  ADD KEY `formulario_aplicacao_fk` (`IdFormulario`),
  ADD KEY `avaliacao_aplicacao_fk` (`IdAvaliacao`);

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`IdAvaliacao`);

--
-- Indexes for table `avaliacaoquestao`
--
ALTER TABLE `avaliacaoquestao`
  ADD PRIMARY KEY (`IdQuestao`,`IdAvaliacao`),
  ADD KEY `avaliacao_avaliacaoquestao_fk` (`IdAvaliacao`);

--
-- Indexes for table `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`IdDiagnostico`),
  ADD KEY `unidadeinternacao_diagnostico_fk` (`IdUnidadeInternacao`);

--
-- Indexes for table `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`IdFormulario`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`IdPaciente`),
  ADD KEY `tipopaciente_paciente_fk` (`IdTipoPaciente`),
  ADD KEY `unidadeinternacao_paciente_fk` (`IdUnidadeInternacao`);

--
-- Indexes for table `pacientediagnostico`
--
ALTER TABLE `pacientediagnostico`
  ADD PRIMARY KEY (`IdDiagnostico`,`idQuestionarioDiagPresc`),
  ADD KEY `questionariodiagpres_pacientediagnostico_fk` (`idQuestionarioDiagPresc`);

--
-- Indexes for table `pacienteprescricao`
--
ALTER TABLE `pacienteprescricao`
  ADD PRIMARY KEY (`IdPrescricao`,`idQuestionarioDiagPresc`),
  ADD KEY `questionariodiagpres_pacienteprescricao_fk` (`idQuestionarioDiagPresc`);

--
-- Indexes for table `prescricao`
--
ALTER TABLE `prescricao`
  ADD PRIMARY KEY (`IdPrescricao`),
  ADD KEY `diagnostico_prescricao_fk` (`IdDiagnostico`);

--
-- Indexes for table `questao`
--
ALTER TABLE `questao`
  ADD PRIMARY KEY (`IdQuestao`),
  ADD KEY `tipoavaliacao_avaliacao_fk` (`IdTipoQuestao`);

--
-- Indexes for table `questaoaberta`
--
ALTER TABLE `questaoaberta`
  ADD PRIMARY KEY (`IdQuestao`);

--
-- Indexes for table `questaoafirmativa`
--
ALTER TABLE `questaoafirmativa`
  ADD PRIMARY KEY (`IdAfirmativa`,`IdQuestao`),
  ADD KEY `questao_questaoafirmativa_fk` (`IdQuestao`);

--
-- Indexes for table `questaofechadaescolhaunica`
--
ALTER TABLE `questaofechadaescolhaunica`
  ADD PRIMARY KEY (`IdQuestao`);

--
-- Indexes for table `questaofechadamultiplaescolha`
--
ALTER TABLE `questaofechadamultiplaescolha`
  ADD PRIMARY KEY (`IdQuestao`);

--
-- Indexes for table `questionario`
--
ALTER TABLE `questionario`
  ADD PRIMARY KEY (`IdQuestionario`),
  ADD KEY `formulario_questionario_fk` (`IdFormulario`),
  ADD KEY `paciente_questionario_fk` (`IdPaciente`),
  ADD KEY `usuario_questionario_fk` (`IdUsuario`);

--
-- Indexes for table `questionariodiagpres`
--
ALTER TABLE `questionariodiagpres`
  ADD PRIMARY KEY (`idQuestionarioDiagPresc`),
  ADD KEY `paciente_questionariodiagpres_fk` (`IdPaciente`);

--
-- Indexes for table `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`IdResposta`),
  ADD KEY `aplicacao_resposta_fk` (`IdAplicacao`),
  ADD KEY `avaliacaoquestao_resposta_fk` (`IdAvaliacao`,`IdQuestao`),
  ADD KEY `questionario_resposta_fk` (`IdQuestionario`);

--
-- Indexes for table `respostaaberta`
--
ALTER TABLE `respostaaberta`
  ADD PRIMARY KEY (`IdResposta`),
  ADD KEY `questaoaberta_respostaaberta_fk` (`IdQuestao`);

--
-- Indexes for table `respostamultipla`
--
ALTER TABLE `respostamultipla`
  ADD PRIMARY KEY (`IdResposta`);

--
-- Indexes for table `respostamultiplaafirmativa`
--
ALTER TABLE `respostamultiplaafirmativa`
  ADD PRIMARY KEY (`IdResposta`,`IdAfirmativa`,`IdQuestao`),
  ADD KEY `questaoafirmativa_respostamultiplaafirmativa_fk` (`IdAfirmativa`,`IdQuestao`);

--
-- Indexes for table `respostaoutro`
--
ALTER TABLE `respostaoutro`
  ADD PRIMARY KEY (`IdResposta`);

--
-- Indexes for table `respostaunica`
--
ALTER TABLE `respostaunica`
  ADD PRIMARY KEY (`IdResposta`),
  ADD KEY `questaoafirmativa_respostaunica_fk` (`IdAfirmativa`,`IdQuestao`);

--
-- Indexes for table `tipopaciente`
--
ALTER TABLE `tipopaciente`
  ADD PRIMARY KEY (`IdTipoPaciente`);

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
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `afirmativa`
--
ALTER TABLE `afirmativa`
  MODIFY `IdAfirmativa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `aplicacao`
--
ALTER TABLE `aplicacao`
  MODIFY `IdAplicacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `IdAvaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `IdDiagnostico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `formulario`
--
ALTER TABLE `formulario`
  MODIFY `IdFormulario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `paciente`
--
ALTER TABLE `paciente`
  MODIFY `IdPaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prescricao`
--
ALTER TABLE `prescricao`
  MODIFY `IdPrescricao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `questao`
--
ALTER TABLE `questao`
  MODIFY `IdQuestao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `questionario`
--
ALTER TABLE `questionario`
  MODIFY `IdQuestionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `questionariodiagpres`
--
ALTER TABLE `questionariodiagpres`
  MODIFY `idQuestionarioDiagPresc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `resposta`
--
ALTER TABLE `resposta`
  MODIFY `IdResposta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tipopaciente`
--
ALTER TABLE `tipopaciente`
  MODIFY `IdTipoPaciente` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aplicacao`
--
ALTER TABLE `aplicacao`
  ADD CONSTRAINT `avaliacao_aplicacao_fk` FOREIGN KEY (`IdAvaliacao`) REFERENCES `avaliacao` (`IdAvaliacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `formulario_aplicacao_fk` FOREIGN KEY (`IdFormulario`) REFERENCES `formulario` (`IdFormulario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `avaliacaoquestao`
--
ALTER TABLE `avaliacaoquestao`
  ADD CONSTRAINT `avaliacao_avaliacaoquestao_fk` FOREIGN KEY (`IdAvaliacao`) REFERENCES `avaliacao` (`IdAvaliacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `questao_avaliacaoquestao_fk` FOREIGN KEY (`IdQuestao`) REFERENCES `questao` (`IdQuestao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD CONSTRAINT `unidadeinternacao_diagnostico_fk` FOREIGN KEY (`IdUnidadeInternacao`) REFERENCES `unidadeinternacao` (`IdUnidadeInternacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `tipopaciente_paciente_fk` FOREIGN KEY (`IdTipoPaciente`) REFERENCES `tipopaciente` (`IdTipoPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `unidadeinternacao_paciente_fk` FOREIGN KEY (`IdUnidadeInternacao`) REFERENCES `unidadeinternacao` (`IdUnidadeInternacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pacientediagnostico`
--
ALTER TABLE `pacientediagnostico`
  ADD CONSTRAINT `diagnostico_pacientediagnostico_fk` FOREIGN KEY (`IdDiagnostico`) REFERENCES `diagnostico` (`IdDiagnostico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `questionariodiagpres_pacientediagnostico_fk` FOREIGN KEY (`idQuestionarioDiagPresc`) REFERENCES `questionariodiagpres` (`idQuestionarioDiagPresc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pacienteprescricao`
--
ALTER TABLE `pacienteprescricao`
  ADD CONSTRAINT `prescricao_pacienteprescricao_fk` FOREIGN KEY (`IdPrescricao`) REFERENCES `prescricao` (`IdPrescricao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `questionariodiagpres_pacienteprescricao_fk` FOREIGN KEY (`idQuestionarioDiagPresc`) REFERENCES `questionariodiagpres` (`idQuestionarioDiagPresc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prescricao`
--
ALTER TABLE `prescricao`
  ADD CONSTRAINT `diagnostico_prescricao_fk` FOREIGN KEY (`IdDiagnostico`) REFERENCES `diagnostico` (`IdDiagnostico`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questao`
--
ALTER TABLE `questao`
  ADD CONSTRAINT `tipoavaliacao_avaliacao_fk` FOREIGN KEY (`IdTipoQuestao`) REFERENCES `tipoquestao` (`IdTipoQuestao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questaoaberta`
--
ALTER TABLE `questaoaberta`
  ADD CONSTRAINT `questao_questaoaberta_fk` FOREIGN KEY (`IdQuestao`) REFERENCES `questao` (`IdQuestao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questaoafirmativa`
--
ALTER TABLE `questaoafirmativa`
  ADD CONSTRAINT `afirmativa_questaomultiplaescolhaafirmativa_fk` FOREIGN KEY (`IdAfirmativa`) REFERENCES `afirmativa` (`IdAfirmativa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `questao_questaoafirmativa_fk` FOREIGN KEY (`IdQuestao`) REFERENCES `questao` (`IdQuestao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questaofechadaescolhaunica`
--
ALTER TABLE `questaofechadaescolhaunica`
  ADD CONSTRAINT `questao_questaofechadaescolhaunida_fk` FOREIGN KEY (`IdQuestao`) REFERENCES `questao` (`IdQuestao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questaofechadamultiplaescolha`
--
ALTER TABLE `questaofechadamultiplaescolha`
  ADD CONSTRAINT ` questao_questaofechadamultiplaescolha_fk` FOREIGN KEY (`IdQuestao`) REFERENCES `questao` (`IdQuestao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questionario`
--
ALTER TABLE `questionario`
  ADD CONSTRAINT `formulario_questionario_fk` FOREIGN KEY (`IdFormulario`) REFERENCES `formulario` (`IdFormulario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `paciente_questionario_fk` FOREIGN KEY (`IdPaciente`) REFERENCES `paciente` (`IdPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_questionario_fk` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questionariodiagpres`
--
ALTER TABLE `questionariodiagpres`
  ADD CONSTRAINT `paciente_questionariodiagpres_fk` FOREIGN KEY (`IdPaciente`) REFERENCES `paciente` (`IdPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `resposta`
--
ALTER TABLE `resposta`
  ADD CONSTRAINT `aplicacao_resposta_fk` FOREIGN KEY (`IdAplicacao`) REFERENCES `aplicacao` (`IdAplicacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `avaliacaoquestao_resposta_fk` FOREIGN KEY (`IdAvaliacao`,`IdQuestao`) REFERENCES `avaliacaoquestao` (`IdAvaliacao`, `IdQuestao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `questionario_resposta_fk` FOREIGN KEY (`IdQuestionario`) REFERENCES `questionario` (`IdQuestionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `respostaaberta`
--
ALTER TABLE `respostaaberta`
  ADD CONSTRAINT `questaoaberta_respostaaberta_fk` FOREIGN KEY (`IdQuestao`) REFERENCES `questaoaberta` (`IdQuestao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `resposta_respostaaberta_fk` FOREIGN KEY (`IdResposta`) REFERENCES `resposta` (`IdResposta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `respostamultipla`
--
ALTER TABLE `respostamultipla`
  ADD CONSTRAINT `resposta_respostamultipla_fk` FOREIGN KEY (`IdResposta`) REFERENCES `resposta` (`IdResposta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `respostamultiplaafirmativa`
--
ALTER TABLE `respostamultiplaafirmativa`
  ADD CONSTRAINT `questaoafirmativa_respostamultiplaafirmativa_fk` FOREIGN KEY (`IdAfirmativa`,`IdQuestao`) REFERENCES `questaoafirmativa` (`IdAfirmativa`, `IdQuestao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `respostamultipla_respostamultiplaafirmativa_fk` FOREIGN KEY (`IdResposta`) REFERENCES `respostamultipla` (`IdResposta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `respostaoutro`
--
ALTER TABLE `respostaoutro`
  ADD CONSTRAINT `resposta_respostaoutro_fk` FOREIGN KEY (`IdResposta`) REFERENCES `resposta` (`IdResposta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `respostaunica`
--
ALTER TABLE `respostaunica`
  ADD CONSTRAINT `questaoafirmativa_respostaunica_fk` FOREIGN KEY (`IdAfirmativa`,`IdQuestao`) REFERENCES `questaoafirmativa` (`IdAfirmativa`, `IdQuestao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `resposta_respostaunica_fk` FOREIGN KEY (`IdResposta`) REFERENCES `resposta` (`IdResposta`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
