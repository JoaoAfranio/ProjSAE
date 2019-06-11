-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jun-2019 às 00:45
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
-- Database: `u989534060_sae`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `afirmativa`
--

CREATE TABLE `afirmativa` (
  `IdAfirmativa` int(11) NOT NULL,
  `Descricao` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `afirmativa`
--

INSERT INTO `afirmativa` (`IdAfirmativa`, `Descricao`) VALUES
(1, 'Abertura ocular'),
(2, 'Taquipneico'),
(3, 'Nivel de cosnciencia'),
(4, 'Abertura ocular'),
(5, 'Resposta verbal'),
(6, 'Resposta motora'),
(7, 'Masculino'),
(8, 'Feminino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aplicacao`
--

CREATE TABLE `aplicacao` (
  `IdAplicacao` int(11) NOT NULL,
  `IdAvaliacao` int(11) NOT NULL,
  `IdFormulario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aplicacao`
--

INSERT INTO `aplicacao` (`IdAplicacao`, `IdAvaliacao`, `IdFormulario`) VALUES
(8, 11, 8),
(9, 11, 12),
(10, 22, 13),
(12, 22, 12),
(14, 11, 10),
(15, 25, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `IdAvaliacao` int(11) NOT NULL,
  `Descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`IdAvaliacao`, `Descricao`) VALUES
(11, 'testeavaliação'),
(22, 'Dados Paciente - RN'),
(23, 'Dados Paciente - Pediátrico'),
(24, 'Dados Paciente - Adulto'),
(25, 'testeQuestaoMultipla');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacaoquestao`
--

CREATE TABLE `avaliacaoquestao` (
  `IdQuestao` int(11) NOT NULL,
  `IdAvaliacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacaoquestao`
--

INSERT INTO `avaliacaoquestao` (`IdQuestao`, `IdAvaliacao`) VALUES
(8, 11),
(8, 25),
(13, 22),
(14, 22),
(15, 22),
(16, 22),
(17, 22),
(18, 22),
(19, 22),
(20, 11),
(22, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `diagnostico`
--

CREATE TABLE `diagnostico` (
  `IdDiagnostico` int(11) NOT NULL,
  `Descricao` varchar(300) NOT NULL,
  `IdUnidadeInternacao` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `diagnostico`
--

INSERT INTO `diagnostico` (`IdDiagnostico`, `Descricao`, `IdUnidadeInternacao`) VALUES
(8, 'CONTROLE INEFICAZ DA SAÚDE: Padrão de regulação e integração à vida diária de um regime terapêutico para tratamento de doenças e suas sequelas que é insatisfatório para alcançar metas específicas de saúde.', 1),
(9, 'DISPOSIÇÃO PARA CONTROLE DA SAÚDE MELHORADO: Padrão de regulação e integração à vida diária de um regime terapêutico para o tratamento de doenças e suas sequelas que pode ser melhorado.', 1),
(10, 'MANUTENÇÃO INEFICAZ DA SAÚDE: Incapacidade de identificar, controlar e/ou buscar ajuda para manter o bem-estar.', 1),
(11, 'PROTEÇÃO INEFICAZ: Diminuição na capacidade de se proteger de ameaças internas ou externas, como doenças ou lesões.', 1),
(12, 'SÍNDROME DO IDOSO FRÁGIL: Estado dinâmico de equilíbrio instável que afeta o idoso que passa por deterioração em um ou mais domínios de saúde (físico, funcional, psicológico ou social) e leva ao aumento da suscetibilidade a efeitos de saúde adversos, em particular a incapacidade.', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `diagnosticoprescricao`
--

CREATE TABLE `diagnosticoprescricao` (
  `IdDiagnostico` int(11) NOT NULL,
  `IdPrescricao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `diagnosticoprescricao`
--

INSERT INTO `diagnosticoprescricao` (`IdDiagnostico`, `IdPrescricao`) VALUES
(8, 10),
(8, 11),
(8, 12),
(8, 13),
(8, 14),
(8, 15),
(8, 16),
(8, 17),
(8, 18),
(9, 19),
(9, 20),
(9, 21),
(9, 22),
(9, 23),
(9, 24),
(9, 25),
(9, 26),
(10, 27),
(10, 28),
(10, 29),
(10, 30),
(10, 31),
(11, 32),
(11, 33),
(11, 35),
(11, 36),
(11, 37),
(11, 38),
(11, 39),
(11, 40),
(11, 41),
(11, 42),
(11, 43),
(11, 44),
(12, 45),
(12, 46),
(12, 47),
(12, 48),
(12, 49),
(12, 50),
(12, 51),
(12, 52);

-- --------------------------------------------------------

--
-- Estrutura da tabela `formulario`
--

CREATE TABLE `formulario` (
  `IdFormulario` int(11) NOT NULL,
  `Descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `formulario`
--

INSERT INTO `formulario` (`IdFormulario`, `Descricao`) VALUES
(8, 'teste formulario'),
(9, 'dsadsa'),
(10, 'Instrumento de Anamnese e Exame Físico - RN'),
(11, 'Instrumento de Anamnese e Exame Físico - Pediátrico'),
(12, 'Instrumento de Anamnese e Exame Físico - Adulto'),
(13, 'Cadastro Paciente - RN'),
(14, 'Cadastro Paciente - Pediátrico'),
(15, 'Cadastro Paciente - Adulto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `IdFuncionario` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `login` varchar(300) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `IdTipoFuncionario` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`IdFuncionario`, `nome`, `login`, `senha`, `IdTipoFuncionario`) VALUES
(21, 'Fabricia', 'fabricia', '123', 1),
(23, 'jose', 'jose', '123', 2),
(24, 'Fernanda Bicalho Amaral', 'febicalho', '02031984', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `IdPaciente` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `IdUnidadeInternacao` tinyint(4) NOT NULL,
  `IdTipoPaciente` tinyint(4) NOT NULL,
  `CodigoPaciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`IdPaciente`, `Nome`, `IdUnidadeInternacao`, `IdTipoPaciente`, `CodigoPaciente`) VALUES
(1, 'Joao', 1, 1, 123),
(15, 'teste', 1, 1, 21321),
(16, 'dsadsa', 1, 3, 521321),
(17, 'joao', 1, 1, 55555),
(18, 'joao', 1, 1, 55555),
(19, 'fsaoias', 1, 1, 0),
(20, 'dsadsad', 1, 1, 321542151),
(21, 'hjfgjdf', 1, 1, 654654654),
(22, 'joao', 1, 3, 5343214),
(23, 'fdaas', 1, 3, 321421),
(24, 'teste', 1, 3, 123),
(25, 'Joao', 1, 3, 123),
(26, 'NomePaciente', 1, 1, 123),
(27, 'CadastroPacienteNome', 1, 3, 12321),
(28, 'theo', 1, 1, 45145),
(29, 'theo', 1, 1, 5463),
(30, 'theo', 1, 3, 5463),
(31, 'Vinicius', 1, 3, 669),
(32, 'TestePacientePediatrico', 4, 2, 3213);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientediagnostico`
--

CREATE TABLE `pacientediagnostico` (
  `IdDiagnostico` int(11) NOT NULL,
  `IdQuestionarioDiagPresc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pacientediagnostico`
--

INSERT INTO `pacientediagnostico` (`IdDiagnostico`, `IdQuestionarioDiagPresc`) VALUES
(8, 6),
(8, 8),
(8, 14),
(8, 15),
(9, 5),
(9, 6),
(9, 8),
(9, 12),
(9, 13),
(9, 14),
(9, 15),
(10, 4),
(10, 6),
(10, 7),
(10, 10),
(10, 11),
(10, 12),
(11, 4),
(11, 6),
(11, 7),
(11, 9),
(11, 11),
(11, 12),
(12, 5),
(12, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacienteprescricao`
--

CREATE TABLE `pacienteprescricao` (
  `IdDiagnostico` int(11) NOT NULL,
  `IdPrescricao` int(11) NOT NULL,
  `IdQuestionarioDiagPresc` int(11) NOT NULL,
  `Rotina` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pacienteprescricao`
--

INSERT INTO `pacienteprescricao` (`IdDiagnostico`, `IdPrescricao`, `IdQuestionarioDiagPresc`, `Rotina`) VALUES
(8, 10, 15, '1:30 Hr'),
(8, 11, 15, '0:30 Hr'),
(8, 12, 14, ''),
(8, 13, 14, ''),
(9, 19, 12, ''),
(9, 19, 15, '7:00 Hr'),
(9, 20, 5, ''),
(9, 20, 12, ''),
(9, 20, 15, '8:00 Hr'),
(9, 21, 5, ''),
(9, 21, 14, ''),
(9, 22, 5, ''),
(10, 27, 4, ''),
(10, 27, 12, ''),
(10, 28, 4, ''),
(10, 28, 12, ''),
(10, 29, 11, ''),
(10, 29, 12, ''),
(10, 30, 11, ''),
(11, 32, 4, ''),
(11, 33, 4, ''),
(11, 33, 7, ''),
(11, 33, 11, ''),
(11, 33, 12, ''),
(11, 35, 4, ''),
(11, 35, 7, ''),
(11, 35, 11, ''),
(11, 35, 12, ''),
(11, 36, 4, ''),
(11, 36, 7, ''),
(11, 36, 11, ''),
(11, 36, 12, ''),
(12, 46, 5, ''),
(12, 46, 7, ''),
(12, 47, 5, ''),
(12, 47, 7, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacienteresultado`
--

CREATE TABLE `pacienteresultado` (
  `IdResultado` int(11) NOT NULL,
  `IdQuestionarioDiagPresc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pacienteresultado`
--

INSERT INTO `pacienteresultado` (`IdResultado`, `IdQuestionarioDiagPresc`) VALUES
(13, 14),
(13, 15),
(14, 14),
(19, 5),
(20, 5),
(22, 15),
(23, 14),
(23, 15),
(24, 14),
(25, 14),
(29, 4),
(30, 4),
(31, 4),
(31, 7),
(32, 7),
(37, 4),
(39, 7),
(42, 7),
(43, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prescricao`
--

CREATE TABLE `prescricao` (
  `IdPrescricao` int(11) NOT NULL,
  `Descricao` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prescricao`
--

INSERT INTO `prescricao` (`IdPrescricao`, `Descricao`) VALUES
(10, 'Obter o histórico de saúde, conforme apropriado, inclusive a descrição dos hábitos de saúde, dos fatores de risco e dos medicamentos.      '),
(11, 'Monitorar a capacidade do paciente para realizar as atividades de autocuidado.'),
(12, 'Auxiliar e/ou realizar  cuidados de higiene corporal S/N (higiene oral, banho, higiene íntima).    '),
(13, 'Auxiliar e/ou realizar  durante  alimentação oral. '),
(14, 'Auxiliar e/ou realizar  durante locomoção.         '),
(15, 'Orientar sobre a importância do regime terapêutico para restabelecimento da saúde.      '),
(16, 'Incentivar adesão ao tratamento prescrito (dieta, medicação, terapia ocupacional, fisioterapia, etc.).  '),
(17, 'Capacitar o cliente e acompanhante quanto a necessidade de reabilitação (cuidados com ostomias, curativos, nutrição enteral, próteses, etc.). '),
(18, 'Encorajar  adaptação de acordo com suas necessidades físicas e emocionais.    '),
(19, 'Avaliar a adaptação do paciente a mudanças na imagem corporal, se indicado.'),
(20, 'Avaliar a compreensão que o paciente tem do processo de doença.'),
(21, 'Oferecer informações reais a respeito do diagnóstico, tratamento e prognóstico.'),
(22, 'Promover situações que encorajem a autonomia do paciente.'),
(23, 'Encorajar o envolvimento da família, conforme apropriado.  '),
(24, 'Incentivar adesão ao tratamento prescrito (dieta, medicação, terapia ocupacional, fisioterapia, etc.).   '),
(25, 'Capacitar o cliente e acompanhante quanto a necessidade de reabilitação (cuidados com ostomias, curativos, nutrição enteral, próteses, etc.).       '),
(26, 'Encorajar  adaptação de acordo com suas necessidades físicas e emocionais. '),
(27, 'Oferecer informações reais a respeito do diagnóstico, tratamento e prognóstico.'),
(28, 'Encorajar o envolvimento da família, conforme apropriado.'),
(29, 'Incentivar adesão do acompanhante ao tratamento prescrito (dieta, medicação, terapia ocupacional, fisioterapia, etc.).  '),
(30, 'Capacitar o  acompanhante quanto a realização de cuidados (ostomias, curativos, nutrição enteral, próteses, etc.). '),
(31, 'Encorajar  adaptação de acordo com suas necessidades físicas e emocionais.'),
(32, 'Manter lesões/ feridas com oclusão de acordo com recomendação do curativo necessário, quando indicado.   '),
(33, 'Realizar curativo com _________________________________.       '),
(35, 'Monitorar exames laboratoriais e comunicar/ anotar quando alterações.  '),
(36, 'Atentar-se para esquema vacinal. Comunicar ao NUVE S/N. '),
(37, 'Manter grades da cama elevadas.     '),
(38, 'Supervisionar deambulação.      '),
(39, 'Atentar-se para nível de consciência.  Anotar e comunicar, quando alteração sensorial. '),
(40, 'Oferecer informações reais a respeito do diagnóstico, tratamento e prognóstico.'),
(41, 'Encorajar o envolvimento da família, conforme apropriado.'),
(42, 'Avaliar a compreensão que o paciente tem do processo de doença.'),
(43, 'Oferecer informações reais a respeito do diagnóstico, tratamento e prognóstico.'),
(44, 'Orientar e capacitar o acompanhante/ cuidador quanto a necessidade de cuidados especiais.'),
(45, 'Avaliar a adaptação do paciente a mudanças e limitações da idade.'),
(46, 'Avaliar a compreensão que o paciente tem do processo de limitação e/ou incapacidade.'),
(47, 'Oferecer informações reais a respeito da limitação e/ou incapacidade.'),
(48, 'Promover situações que encorajem a autonomia do paciente.'),
(49, 'Encorajar o envolvimento da família, conforme apropriado.     '),
(50, 'Incentivar adesão as necessidades indicadas de acordo com sua limitação (dieta, medicação, terapia ocupacional, fisioterapia, etc.).     '),
(51, 'Encorajar  mudanças de hábito de acordo com suas necessidades físicas e emocionais.        '),
(52, 'Incentivar e promover  hábitos de vida saudável.  '),
(53, 'Avaliar a adaptação do paciente a mudanças e limitações da idade.'),
(54, 'Avaliar a compreensão que o paciente tem do processo de limitação e/ou incapacidade.'),
(55, 'Oferecer informações reais a respeito da limitação e/ou incapacidade.'),
(56, 'Promover situações que encorajem a autonomia do paciente.'),
(57, 'Encorajar o envolvimento da família, conforme apropriado. '),
(58, 'Incentivar adesão as necessidades indicadas de acordo com sua limitação (dieta, medicação, terapia ocupacional, fisioterapia, etc.). '),
(59, 'Encorajar  mudanças de hábito de acordo com suas necessidades físicas e emocionais. '),
(60, 'Incentivar e promover  hábitos de vida saudável.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questao`
--

CREATE TABLE `questao` (
  `IdQuestao` int(11) NOT NULL,
  `IdTipoQuestao` tinyint(4) NOT NULL,
  `Descricao` varchar(300) NOT NULL,
  `PossuiOutro` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `questao`
--

INSERT INTO `questao` (`IdQuestao`, `IdTipoQuestao`, `Descricao`, `PossuiOutro`) VALUES
(6, 3, 'Nível de consciência', 'N'),
(7, 3, 'Sistema Respiratório', 'N'),
(8, 3, 'Escala de coma de Glasgow', 'N'),
(12, 1, 'teste', 'N'),
(13, 1, 'Nome da mãe', 'N'),
(14, 1, 'Número de Gestações', 'N'),
(15, 1, 'Aborto', 'N'),
(16, 1, 'Filhos vivos', 'N'),
(17, 4, 'Data de Nascimento do RN', 'N'),
(18, 2, 'Sexo', 'N'),
(19, 1, 'Peso', 'N'),
(20, 1, 'questaoAberta', 'N'),
(21, 2, 'TesteUnica', 'N'),
(22, 2, 'TesteUnica2', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questaoafirmativa`
--

CREATE TABLE `questaoafirmativa` (
  `IdAfirmativa` int(11) NOT NULL,
  `IdQuestao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `questaoafirmativa`
--

INSERT INTO `questaoafirmativa` (`IdAfirmativa`, `IdQuestao`) VALUES
(4, 8),
(5, 6),
(5, 8),
(6, 8),
(6, 22),
(7, 18),
(8, 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionario`
--

CREATE TABLE `questionario` (
  `IdQuestionario` int(11) NOT NULL,
  `IdFormulario` int(11) NOT NULL,
  `IdPaciente` int(11) NOT NULL,
  `DataRealizado` date NOT NULL,
  `IdFuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `questionario`
--

INSERT INTO `questionario` (`IdQuestionario`, `IdFormulario`, `IdPaciente`, `DataRealizado`, `IdFuncionario`) VALUES
(1, 10, 22, '2019-05-28', 21),
(2, 10, 22, '2019-05-28', 21),
(3, 10, 22, '2019-05-28', 21),
(4, 10, 22, '2019-05-28', 21),
(5, 10, 22, '2019-05-28', 21),
(6, 10, 22, '2019-05-28', 21),
(7, 10, 22, '2019-05-28', 21),
(8, 10, 22, '2019-05-28', 21),
(9, 10, 22, '2019-05-28', 21),
(10, 10, 22, '2019-05-28', 21),
(11, 10, 22, '2019-05-28', 21),
(12, 10, 22, '2019-05-28', 21),
(13, 10, 22, '2019-05-28', 21),
(14, 10, 23, '2019-05-28', 21),
(15, 10, 23, '2019-05-28', 21),
(16, 10, 23, '2019-05-28', 21),
(17, 10, 1, '2019-05-28', 21),
(18, 10, 1, '2019-05-28', 21),
(19, 10, 1, '2019-05-28', 21),
(20, 10, 1, '2019-05-28', 21),
(21, 12, 1, '2019-05-28', 21),
(22, 10, 27, '2019-05-28', 21),
(23, 10, 27, '2019-05-28', 21),
(24, 12, 1, '2019-05-28', 21),
(25, 10, 29, '2019-05-30', 21),
(26, 10, 29, '2019-05-30', 21),
(27, 10, 29, '2019-05-30', 21),
(28, 10, 29, '2019-05-30', 21),
(29, 12, 28, '2019-05-30', 21),
(30, 11, 32, '2019-06-11', 21),
(31, 11, 32, '2019-06-11', 21),
(32, 11, 32, '2019-06-11', 21),
(33, 11, 32, '2019-06-11', 21),
(34, 11, 32, '2019-06-11', 21),
(35, 11, 32, '2019-06-11', 21),
(36, 11, 32, '2019-06-11', 21),
(37, 11, 32, '2019-06-11', 21),
(38, 11, 32, '2019-06-11', 21),
(39, 11, 32, '2019-06-11', 21),
(40, 11, 32, '2019-06-11', 21),
(41, 11, 32, '2019-06-11', 21),
(42, 11, 32, '2019-06-11', 21),
(43, 11, 32, '2019-06-11', 21),
(44, 11, 32, '2019-06-11', 21),
(45, 11, 32, '2019-06-11', 21),
(46, 11, 32, '2019-06-11', 21),
(47, 11, 32, '2019-06-11', 21),
(48, 11, 32, '2019-06-11', 21),
(49, 11, 32, '2019-06-11', 21),
(50, 11, 32, '2019-06-11', 21),
(51, 11, 32, '2019-06-11', 21),
(52, 11, 32, '2019-06-11', 21),
(53, 11, 32, '2019-06-11', 21),
(54, 11, 32, '2019-06-11', 21),
(55, 11, 32, '2019-06-11', 21),
(56, 11, 32, '2019-06-11', 21),
(57, 11, 32, '2019-06-11', 21),
(58, 11, 32, '2019-06-11', 21),
(59, 11, 32, '2019-06-11', 21),
(60, 11, 32, '2019-06-11', 21),
(61, 11, 32, '2019-06-11', 21),
(62, 11, 32, '2019-06-11', 21),
(63, 11, 32, '2019-06-11', 21),
(64, 11, 32, '2019-06-11', 21),
(65, 11, 32, '2019-06-11', 21),
(66, 11, 32, '2019-06-11', 21),
(67, 11, 32, '2019-06-11', 21),
(68, 11, 32, '2019-06-11', 21),
(69, 11, 32, '2019-06-11', 21),
(70, 11, 32, '2019-06-11', 21),
(71, 11, 32, '2019-06-11', 21),
(72, 11, 32, '2019-06-11', 21),
(73, 11, 32, '2019-06-11', 21),
(74, 11, 32, '2019-06-11', 21),
(75, 11, 32, '2019-06-11', 21),
(76, 11, 32, '2019-06-11', 21),
(77, 11, 32, '2019-06-11', 21),
(78, 11, 32, '2019-06-11', 21),
(79, 11, 32, '2019-06-11', 21),
(80, 11, 32, '2019-06-11', 21),
(81, 11, 32, '2019-06-11', 21),
(82, 11, 32, '2019-06-11', 21),
(83, 11, 32, '2019-06-11', 21),
(84, 11, 32, '2019-06-11', 21),
(85, 11, 32, '2019-06-11', 21),
(86, 11, 32, '2019-06-11', 21),
(87, 11, 32, '2019-06-11', 21),
(88, 11, 32, '2019-06-11', 21),
(89, 11, 32, '2019-06-11', 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionariodiagpresc`
--

CREATE TABLE `questionariodiagpresc` (
  `IdQuestionarioDiagPresc` int(11) NOT NULL,
  `DataRealizado` date NOT NULL,
  `Evolucao` varchar(500) NOT NULL,
  `IdPaciente` int(11) NOT NULL,
  `IdFuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `questionariodiagpresc`
--

INSERT INTO `questionariodiagpresc` (`IdQuestionarioDiagPresc`, `DataRealizado`, `Evolucao`, `IdPaciente`, `IdFuncionario`) VALUES
(4, '2019-06-04', 'aaaaaaaaaaaaaa', 1, 21),
(5, '2019-06-05', 'dsadsadsadsadsa', 1, 21),
(6, '2019-06-06', ' ', 1, 21),
(7, '2019-06-11', 'GDSAGDASGDASGDAS', 1, 21),
(8, '2019-06-11', ' ', 1, 21),
(9, '2019-06-11', ' ', 1, 21),
(10, '2019-06-11', ' ', 1, 21),
(11, '2019-06-11', ' ', 1, 21),
(12, '2019-06-11', ' ', 1, 21),
(13, '2019-06-11', 'gvfdgfd', 1, 21),
(14, '2019-06-11', 'DFSAXACASVASCA', 1, 21),
(15, '2019-06-12', 'fsacsacsafvsafdsa', 1, 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta`
--

CREATE TABLE `resposta` (
  `IdResposta` int(11) NOT NULL,
  `IdQuestionario` int(11) NOT NULL,
  `IdQuestao` int(11) NOT NULL,
  `IdAplicacao` int(11) NOT NULL,
  `IdAvaliacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `resposta`
--

INSERT INTO `resposta` (`IdResposta`, `IdQuestionario`, `IdQuestao`, `IdAplicacao`, `IdAvaliacao`) VALUES
(1, 14, 13, 10, 22),
(2, 15, 13, 10, 22),
(3, 16, 13, 10, 22),
(4, 16, 14, 10, 22),
(5, 16, 15, 10, 22),
(6, 16, 16, 10, 22),
(7, 16, 17, 10, 22),
(8, 16, 18, 10, 22),
(9, 17, 13, 10, 22),
(10, 17, 14, 10, 22),
(11, 17, 15, 10, 22),
(12, 17, 16, 10, 22),
(13, 17, 17, 10, 22),
(14, 17, 18, 10, 22),
(15, 17, 19, 10, 22),
(16, 18, 13, 10, 22),
(17, 18, 14, 10, 22),
(18, 18, 15, 10, 22),
(19, 18, 16, 10, 22),
(20, 18, 17, 10, 22),
(21, 18, 18, 10, 22),
(22, 18, 19, 10, 22),
(23, 19, 13, 10, 22),
(24, 19, 14, 10, 22),
(25, 19, 15, 10, 22),
(26, 19, 16, 10, 22),
(27, 19, 17, 10, 22),
(28, 19, 18, 10, 22),
(29, 19, 19, 10, 22),
(30, 20, 13, 10, 22),
(31, 20, 14, 10, 22),
(32, 20, 15, 10, 22),
(33, 20, 16, 10, 22),
(34, 20, 17, 10, 22),
(35, 20, 18, 10, 22),
(36, 20, 19, 10, 22),
(37, 21, 13, 12, 22),
(38, 21, 14, 12, 22),
(39, 21, 15, 12, 22),
(40, 21, 16, 12, 22),
(41, 21, 17, 12, 22),
(42, 21, 18, 12, 22),
(43, 21, 19, 12, 22),
(44, 21, 20, 9, 11),
(45, 22, 13, 10, 22),
(46, 22, 14, 10, 22),
(47, 22, 15, 10, 22),
(48, 22, 16, 10, 22),
(49, 22, 17, 10, 22),
(50, 22, 18, 10, 22),
(51, 22, 19, 10, 22),
(52, 23, 20, 14, 11),
(53, 24, 13, 12, 22),
(54, 24, 14, 12, 22),
(55, 24, 15, 12, 22),
(56, 24, 16, 12, 22),
(57, 24, 17, 12, 22),
(58, 24, 18, 12, 22),
(59, 24, 19, 12, 22),
(60, 24, 20, 9, 11),
(61, 24, 22, 9, 11),
(62, 25, 13, 10, 22),
(63, 26, 13, 10, 22),
(64, 27, 13, 10, 22),
(65, 27, 14, 10, 22),
(66, 27, 15, 10, 22),
(67, 27, 16, 10, 22),
(68, 27, 17, 10, 22),
(69, 27, 18, 10, 22),
(70, 28, 13, 10, 22),
(71, 28, 14, 10, 22),
(72, 28, 15, 10, 22),
(73, 28, 16, 10, 22),
(74, 28, 17, 10, 22),
(75, 28, 18, 10, 22),
(76, 28, 19, 10, 22),
(77, 29, 13, 12, 22),
(78, 29, 14, 12, 22),
(79, 29, 15, 12, 22),
(80, 29, 16, 12, 22),
(81, 29, 17, 12, 22),
(82, 29, 18, 12, 22),
(83, 29, 19, 12, 22),
(84, 29, 20, 9, 11),
(85, 29, 22, 9, 11),
(86, 31, 8, 15, 25),
(87, 32, 8, 15, 25),
(88, 33, 8, 15, 25),
(89, 34, 8, 15, 25),
(90, 35, 8, 15, 25),
(91, 36, 8, 15, 25),
(92, 37, 8, 15, 25),
(93, 38, 8, 15, 25),
(94, 40, 8, 15, 25),
(95, 41, 8, 15, 25),
(96, 84, 8, 15, 25),
(97, 85, 8, 15, 25),
(98, 86, 8, 15, 25),
(99, 87, 8, 15, 25),
(100, 88, 8, 15, 25),
(101, 89, 8, 15, 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostaaberta`
--

CREATE TABLE `respostaaberta` (
  `IdRespostaAberta` int(11) NOT NULL,
  `DescricaoRespostaAberta` varchar(300) COLLATE latin1_general_ci NOT NULL,
  `IdResposta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `respostaaberta`
--

INSERT INTO `respostaaberta` (`IdRespostaAberta`, `DescricaoRespostaAberta`, `IdResposta`) VALUES
(1, 'nomeMae', 3),
(2, '3', 4),
(3, '2', 5),
(4, '1', 6),
(5, '2019-05-28', 7),
(6, 'NomeMae', 9),
(7, '10', 10),
(8, '9', 11),
(9, '8', 12),
(10, '2019-05-27', 13),
(11, '2', 15),
(12, 'NomeMae', 16),
(13, '10', 17),
(14, '9', 18),
(15, '8', 19),
(16, '2019-05-27', 20),
(17, '2', 22),
(18, 'NomeMaeTeste', 23),
(19, '21', 24),
(20, '22', 25),
(21, '23', 26),
(22, '2019-05-29', 27),
(23, '2', 29),
(24, 'xsads', 30),
(25, '21', 31),
(26, '21', 32),
(27, '21', 33),
(28, '2019-05-31', 34),
(29, '23', 36),
(30, 'teste', 37),
(31, '123', 38),
(32, '123', 39),
(33, 'teste', 40),
(34, 'TestandoExameFisico', 43),
(35, 'NomeMaeCadastroPaciente', 45),
(36, '9', 46),
(37, '10', 47),
(38, '66', 48),
(39, '2019-05-28', 49),
(40, '1', 51),
(41, 'questaoAberta', 52),
(42, 'nomeAbertaRespostaTesteExameFisico', 53),
(43, '421321', 54),
(44, '421321', 55),
(45, '321321', 56),
(46, '2019-05-24', 57),
(47, '32', 59),
(48, 'questaoAbertaRespostaTesteAvaliacao1', 60),
(49, 'Joaquina', 64),
(50, '1', 65),
(51, '0', 66),
(52, '1', 67),
(53, '1999-03-26', 68),
(54, 'Joaquina', 70),
(55, '1', 71),
(56, '0', 72),
(57, '1', 73),
(58, '1999-03-26', 74),
(59, '65', 76),
(60, 'ana', 77),
(61, '5', 78),
(62, '8', 79),
(63, '20', 80),
(64, '2019-05-16', 81),
(65, '5', 83),
(66, 'jkmjk ', 84);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostamultipla`
--

CREATE TABLE `respostamultipla` (
  `IdResposta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `respostamultipla`
--

INSERT INTO `respostamultipla` (`IdResposta`) VALUES
(101);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostamultiplaafirmativa`
--

CREATE TABLE `respostamultiplaafirmativa` (
  `IdResposta` int(11) NOT NULL,
  `IdAfirmativa` int(11) NOT NULL,
  `IdQuestao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `respostamultiplaafirmativa`
--

INSERT INTO `respostamultiplaafirmativa` (`IdResposta`, `IdAfirmativa`, `IdQuestao`) VALUES
(101, 5, 8),
(101, 6, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostaunica`
--

CREATE TABLE `respostaunica` (
  `IdResposta` int(11) NOT NULL,
  `IdAfirmativa` int(11) NOT NULL,
  `IdQuestao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `respostaunica`
--

INSERT INTO `respostaunica` (`IdResposta`, `IdAfirmativa`, `IdQuestao`) VALUES
(61, 6, 22),
(85, 6, 22),
(14, 7, 18),
(21, 7, 18),
(42, 7, 18),
(58, 7, 18),
(75, 7, 18),
(82, 7, 18),
(28, 8, 18),
(35, 8, 18),
(50, 8, 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultado`
--

CREATE TABLE `resultado` (
  `IdResultado` int(11) NOT NULL,
  `Descricao` varchar(300) NOT NULL,
  `IdDiagnostico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `resultado`
--

INSERT INTO `resultado` (`IdResultado`, `Descricao`, `IdDiagnostico`) VALUES
(12, 'Aceitação: Estado de Saúde.', 9),
(13, 'Adaptação à Deficiência Física.', 9),
(14, 'Comportamento de Tratamento: Doença ou Lesão.', 9),
(15, 'Enfrentamento.', 9),
(16, 'Comportamento de Aceitação: Dieta Prescrita.', 9),
(18, 'Comportamento de Aceitação: Medicação Prescrita.', 9),
(19, 'Comportamento de Adesão.', 9),
(20, 'Nível de Estresse.', 9),
(21, 'Aceitação: Estado de Saúde.', 8),
(22, 'Adaptação à Deficiência Física.', 8),
(23, 'Comportamento de Tratamento: Doença ou Lesão.', 8),
(24, 'Enfrentamento.', 8),
(25, 'Comportamento de Aceitação: Dieta Prescrita.', 8),
(26, 'Comportamento de Aceitação: Medicação Prescrita.', 8),
(27, 'Comportamento de Adesão.', 8),
(28, 'Nível de Estresse.', 8),
(29, 'Aceitação: Estado de Saúde.', 10),
(30, 'Adaptação à Deficiência Física.', 10),
(31, 'Comportamento de Tratamento: Doença ou Lesão.', 10),
(32, 'Enfrentamento.', 10),
(33, 'Comportamento de Aceitação: Dieta Prescrita', 10),
(34, 'Comportamento de Aceitação: Medicação Prescrita.', 10),
(35, 'Comportamento de Adesão.', 10),
(36, 'Nível de Estresse.', 10),
(37, 'Aceitação: Estado de Saúde.', 11),
(38, 'Adaptação à Deficiência Física.', 11),
(39, 'Comportamento de Tratamento: Doença ou Lesão.', 11),
(40, 'Enfrentamento.', 11),
(41, 'Comportamento de Adesão.', 11),
(42, 'Aceitação: Estado de Saúde.', 12),
(43, 'Adaptação as limitações da terceira idade.', 12),
(44, 'Comportamento de Tratamento: Doença ou Lesão.', 12),
(45, 'Enfrentamento.', 12),
(46, 'Comportamento de Aceitação: Dieta Prescrita.', 12),
(47, 'Comportamento de Aceitação: Medicação Prescrita.', 12),
(48, 'Comportamento de Adesão.', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipofuncionario`
--

CREATE TABLE `tipofuncionario` (
  `IdTipoFuncionario` tinyint(4) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipofuncionario`
--

INSERT INTO `tipofuncionario` (`IdTipoFuncionario`, `descricao`) VALUES
(1, 'administrador'),
(2, 'funcionario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipopaciente`
--

CREATE TABLE `tipopaciente` (
  `IdTipoPaciente` tinyint(4) NOT NULL,
  `Descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipopaciente`
--

INSERT INTO `tipopaciente` (`IdTipoPaciente`, `Descricao`) VALUES
(1, 'Adulto'),
(2, 'Pediátrico'),
(3, 'Neonato');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoquestao`
--

CREATE TABLE `tipoquestao` (
  `IdTipoQuestao` tinyint(4) NOT NULL,
  `Descricao` varchar(50) NOT NULL
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
-- Indexes for table `diagnosticoprescricao`
--
ALTER TABLE `diagnosticoprescricao`
  ADD PRIMARY KEY (`IdDiagnostico`,`IdPrescricao`),
  ADD KEY `prescricao_diagnosticoprescricao_fk` (`IdPrescricao`);

--
-- Indexes for table `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`IdFormulario`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`IdFuncionario`),
  ADD KEY `IdTipoUsuario` (`IdTipoFuncionario`);

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
  ADD PRIMARY KEY (`IdDiagnostico`,`IdQuestionarioDiagPresc`),
  ADD KEY `questionariodiagpresc_pacientediagnostico_fk` (`IdQuestionarioDiagPresc`);

--
-- Indexes for table `pacienteprescricao`
--
ALTER TABLE `pacienteprescricao`
  ADD PRIMARY KEY (`IdDiagnostico`,`IdPrescricao`,`IdQuestionarioDiagPresc`),
  ADD KEY `questionariodiagpresc_pacienteprescricao_fk` (`IdQuestionarioDiagPresc`);

--
-- Indexes for table `pacienteresultado`
--
ALTER TABLE `pacienteresultado`
  ADD PRIMARY KEY (`IdResultado`,`IdQuestionarioDiagPresc`),
  ADD KEY `questionariodiagpresc_pacienteresultado_fk` (`IdQuestionarioDiagPresc`);

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
-- Indexes for table `questionario`
--
ALTER TABLE `questionario`
  ADD PRIMARY KEY (`IdQuestionario`),
  ADD KEY `funcionario_questionario_fk` (`IdFuncionario`),
  ADD KEY `paciente_questionario_fk` (`IdPaciente`),
  ADD KEY `formulario_questionario_fk` (`IdFormulario`);

--
-- Indexes for table `questionariodiagpresc`
--
ALTER TABLE `questionariodiagpresc`
  ADD PRIMARY KEY (`IdQuestionarioDiagPresc`),
  ADD KEY `paciente_questionariodiagpresc_fk` (`IdPaciente`),
  ADD KEY `funcionario_questionarioDiagPresc_fk` (`IdFuncionario`);

--
-- Indexes for table `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`IdResposta`),
  ADD KEY `questionario_resposta_fk` (`IdQuestionario`),
  ADD KEY `aplicacao_resposta_fk` (`IdAplicacao`),
  ADD KEY `questao_resposta_fk` (`IdQuestao`),
  ADD KEY `avaliacaoquestao_resposta_fk` (`IdAvaliacao`,`IdQuestao`);

--
-- Indexes for table `respostaaberta`
--
ALTER TABLE `respostaaberta`
  ADD PRIMARY KEY (`IdRespostaAberta`),
  ADD KEY `resposta_respostaaberta_fk` (`IdResposta`);

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
  ADD KEY `questaoafirmativa_respostamultiplaafirmativa_fk` (`IdQuestao`,`IdAfirmativa`);

--
-- Indexes for table `respostaunica`
--
ALTER TABLE `respostaunica`
  ADD PRIMARY KEY (`IdResposta`),
  ADD KEY `questaoafirmativa_respostaunica_fk` (`IdAfirmativa`,`IdQuestao`);

--
-- Indexes for table `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`IdResultado`),
  ADD KEY `diagnostico_resultado_fk` (`IdDiagnostico`);

--
-- Indexes for table `tipofuncionario`
--
ALTER TABLE `tipofuncionario`
  ADD PRIMARY KEY (`IdTipoFuncionario`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `afirmativa`
--
ALTER TABLE `afirmativa`
  MODIFY `IdAfirmativa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `aplicacao`
--
ALTER TABLE `aplicacao`
  MODIFY `IdAplicacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `IdAvaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `IdDiagnostico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `formulario`
--
ALTER TABLE `formulario`
  MODIFY `IdFormulario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `IdFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `paciente`
--
ALTER TABLE `paciente`
  MODIFY `IdPaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `prescricao`
--
ALTER TABLE `prescricao`
  MODIFY `IdPrescricao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `questao`
--
ALTER TABLE `questao`
  MODIFY `IdQuestao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `questionario`
--
ALTER TABLE `questionario`
  MODIFY `IdQuestionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `questionariodiagpresc`
--
ALTER TABLE `questionariodiagpresc`
  MODIFY `IdQuestionarioDiagPresc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `resposta`
--
ALTER TABLE `resposta`
  MODIFY `IdResposta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `respostaaberta`
--
ALTER TABLE `respostaaberta`
  MODIFY `IdRespostaAberta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `resultado`
--
ALTER TABLE `resultado`
  MODIFY `IdResultado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tipofuncionario`
--
ALTER TABLE `tipofuncionario`
  MODIFY `IdTipoFuncionario` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aplicacao`
--
ALTER TABLE `aplicacao`
  ADD CONSTRAINT `avaliacao_aplicacao_fk` FOREIGN KEY (`IdAvaliacao`) REFERENCES `avaliacao` (`IdAvaliacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `formulario_aplicacao_fk` FOREIGN KEY (`IdFormulario`) REFERENCES `formulario` (`IdFormulario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`IdTipoFuncionario`) REFERENCES `tipofuncionario` (`IdTipoFuncionario`);

--
-- Limitadores para a tabela `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `tipopaciente_paciente_fk` FOREIGN KEY (`IdTipoPaciente`) REFERENCES `tipopaciente` (`IdTipoPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `unidadeinternacao_paciente_fk` FOREIGN KEY (`IdUnidadeInternacao`) REFERENCES `unidadeinternacao` (`IdUnidadeInternacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pacientediagnostico`
--
ALTER TABLE `pacientediagnostico`
  ADD CONSTRAINT `diagnostico_pacientediagnostico_fk` FOREIGN KEY (`IdDiagnostico`) REFERENCES `diagnostico` (`IdDiagnostico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `questionariodiagpresc_pacientediagnostico_fk` FOREIGN KEY (`IdQuestionarioDiagPresc`) REFERENCES `questionariodiagpresc` (`IdQuestionarioDiagPresc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pacienteprescricao`
--
ALTER TABLE `pacienteprescricao`
  ADD CONSTRAINT `diagnosticoprescricao_pacienteprescricao_fk` FOREIGN KEY (`IdDiagnostico`,`IdPrescricao`) REFERENCES `diagnosticoprescricao` (`IdDiagnostico`, `IdPrescricao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `questionariodiagpresc_pacienteprescricao_fk` FOREIGN KEY (`IdQuestionarioDiagPresc`) REFERENCES `questionariodiagpresc` (`IdQuestionarioDiagPresc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pacienteresultado`
--
ALTER TABLE `pacienteresultado`
  ADD CONSTRAINT `questionariodiagpresc_pacienteresultado_fk` FOREIGN KEY (`IdQuestionarioDiagPresc`) REFERENCES `questionariodiagpresc` (`IdQuestionarioDiagPresc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `resultado_pacienteresultado_fk` FOREIGN KEY (`IdResultado`) REFERENCES `resultado` (`IdResultado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `questao`
--
ALTER TABLE `questao`
  ADD CONSTRAINT `tipoavaliacao_avaliacao_fk` FOREIGN KEY (`IdTipoQuestao`) REFERENCES `tipoquestao` (`IdTipoQuestao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `questaoafirmativa`
--
ALTER TABLE `questaoafirmativa`
  ADD CONSTRAINT `afirmativa_questaomultiplaescolhaafirmativa_fk` FOREIGN KEY (`IdAfirmativa`) REFERENCES `afirmativa` (`IdAfirmativa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `questaoafirmativa_ibfk_1` FOREIGN KEY (`IdQuestao`) REFERENCES `questao` (`IdQuestao`),
  ADD CONSTRAINT `questaoafirmativa_ibfk_2` FOREIGN KEY (`IdAfirmativa`) REFERENCES `afirmativa` (`IdAfirmativa`);

--
-- Limitadores para a tabela `questionario`
--
ALTER TABLE `questionario`
  ADD CONSTRAINT `formulario_questionario_fk` FOREIGN KEY (`IdFormulario`) REFERENCES `formulario` (`IdFormulario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `funcionario_questionario_fk` FOREIGN KEY (`IdFuncionario`) REFERENCES `funcionario` (`IdFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `paciente_questionario_fk` FOREIGN KEY (`IdPaciente`) REFERENCES `paciente` (`IdPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `questionariodiagpresc`
--
ALTER TABLE `questionariodiagpresc`
  ADD CONSTRAINT `funcionario_questionarioDiagPresc_fk` FOREIGN KEY (`IdFuncionario`) REFERENCES `funcionario` (`IdFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `paciente_questionariodiagpresc_fk` FOREIGN KEY (`IdPaciente`) REFERENCES `paciente` (`IdPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `resposta`
--
ALTER TABLE `resposta`
  ADD CONSTRAINT `aplicacao_resposta_fk` FOREIGN KEY (`IdAplicacao`) REFERENCES `aplicacao` (`IdAplicacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `avaliacaoquestao_resposta_fk` FOREIGN KEY (`IdAvaliacao`,`IdQuestao`) REFERENCES `avaliacaoquestao` (`IdAvaliacao`, `IdQuestao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `questao_resposta_fk` FOREIGN KEY (`IdQuestao`) REFERENCES `questao` (`IdQuestao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `questionario_resposta_fk` FOREIGN KEY (`IdQuestionario`) REFERENCES `questionario` (`IdQuestionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `respostaaberta`
--
ALTER TABLE `respostaaberta`
  ADD CONSTRAINT `resposta_respostaaberta_fk` FOREIGN KEY (`IdResposta`) REFERENCES `resposta` (`IdResposta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `respostamultipla`
--
ALTER TABLE `respostamultipla`
  ADD CONSTRAINT `resposta_respostamultipla_fk` FOREIGN KEY (`IdResposta`) REFERENCES `resposta` (`IdResposta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `respostamultiplaafirmativa`
--
ALTER TABLE `respostamultiplaafirmativa`
  ADD CONSTRAINT `questaoafirmativa_respostamultiplaafirmativa_fk` FOREIGN KEY (`IdQuestao`,`IdAfirmativa`) REFERENCES `questaoafirmativa` (`IdQuestao`, `IdAfirmativa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `respostamultipla_respostamultiplaafirmativa_fk` FOREIGN KEY (`IdResposta`) REFERENCES `respostamultipla` (`IdResposta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `respostaunica`
--
ALTER TABLE `respostaunica`
  ADD CONSTRAINT `questaoafirmativa_respostaunica_fk` FOREIGN KEY (`IdAfirmativa`,`IdQuestao`) REFERENCES `questaoafirmativa` (`IdAfirmativa`, `IdQuestao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `resposta_respostaunica_fk` FOREIGN KEY (`IdResposta`) REFERENCES `resposta` (`IdResposta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `resultado`
--
ALTER TABLE `resultado`
  ADD CONSTRAINT `diagnostico_resultado_fk` FOREIGN KEY (`IdDiagnostico`) REFERENCES `diagnostico` (`IdDiagnostico`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
