-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27/05/2019 às 19:43
-- Versão do servidor: 10.2.24-MariaDB
-- Versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u989534060_sae`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `afirmativa`
--

CREATE TABLE `afirmativa` (
  `IdAfirmativa` int(11) NOT NULL,
  `Descricao` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `afirmativa`
--

INSERT INTO `afirmativa` (`IdAfirmativa`, `Descricao`) VALUES
(1, 'Abertura ocular'),
(2, 'Taquipneico'),
(3, 'Nivel de cosnciencia'),
(4, 'Abertura ocular'),
(5, 'Resposta verbal'),
(6, 'Resposta motora');

-- --------------------------------------------------------

--
-- Estrutura para tabela `aplicacao`
--

CREATE TABLE `aplicacao` (
  `IdAplicacao` int(11) NOT NULL,
  `IdAvaliacao` int(11) NOT NULL,
  `IdFormulario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `aplicacao`
--

INSERT INTO `aplicacao` (`IdAplicacao`, `IdAvaliacao`, `IdFormulario`) VALUES
(8, 11, 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `IdAvaliacao` int(11) NOT NULL,
  `Descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `avaliacao`
--

INSERT INTO `avaliacao` (`IdAvaliacao`, `Descricao`) VALUES
(11, 'testeavaliação');

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacaoquestao`
--

CREATE TABLE `avaliacaoquestao` (
  `IdQuestao` int(11) NOT NULL,
  `IdAvaliacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `avaliacaoquestao`
--

INSERT INTO `avaliacaoquestao` (`IdQuestao`, `IdAvaliacao`) VALUES
(6, 11),
(7, 11),
(8, 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `diagnostico`
--

CREATE TABLE `diagnostico` (
  `IdDiagnostico` int(11) NOT NULL,
  `Descricao` varchar(300) NOT NULL,
  `IdUnidadeInternacao` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `diagnostico`
--

INSERT INTO `diagnostico` (`IdDiagnostico`, `Descricao`, `IdUnidadeInternacao`) VALUES
(8, 'CONTROLE INEFICAZ DA SAÚDE: Padrão de regulação e integração à vida diária de um regime terapêutico para tratamento de doenças e suas sequelas que é insatisfatório para alcançar metas específicas de saúde.', 1),
(9, 'DISPOSIÇÃO PARA CONTROLE DA SAÚDE MELHORADO: Padrão de regulação e integração à vida diária de um regime terapêutico para o tratamento de doenças e suas sequelas que pode ser melhorado.', 1),
(10, 'MANUTENÇÃO INEFICAZ DA SAÚDE: Incapacidade de identificar, controlar e/ou buscar ajuda para manter o bem-estar.', 1),
(11, 'PROTEÇÃO INEFICAZ: Diminuição na capacidade de se proteger de ameaças internas ou externas, como doenças ou lesões.', 1),
(12, 'SÍNDROME DO IDOSO FRÁGIL: Estado dinâmico de equilíbrio instável que afeta o idoso que passa por deterioração em um ou mais domínios de saúde (físico, funcional, psicológico ou social) e leva ao aumento da suscetibilidade a efeitos de saúde adversos, em particular a incapacidade.', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `diagnosticoprescricao`
--

CREATE TABLE `diagnosticoprescricao` (
  `IdDiagnostico` int(11) NOT NULL,
  `IdPrescricao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `diagnosticoprescricao`
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
-- Estrutura para tabela `formulario`
--

CREATE TABLE `formulario` (
  `IdFormulario` int(11) NOT NULL,
  `Descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `formulario`
--

INSERT INTO `formulario` (`IdFormulario`, `Descricao`) VALUES
(8, 'teste formulario');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `IdFuncionario` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `login` varchar(300) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `IdTipoFuncionario` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`IdFuncionario`, `nome`, `login`, `senha`, `IdTipoFuncionario`) VALUES
(21, 'Fabricia', 'fabricia', '123', 1),
(23, 'jose', 'jose', '123', 2),
(24, 'Fernanda Bicalho Amaral', 'febicalho', '02031984', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente`
--

CREATE TABLE `paciente` (
  `IdPaciente` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `dataInternacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `prescricao`
--

CREATE TABLE `prescricao` (
  `IdPrescricao` int(11) NOT NULL,
  `Descricao` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `prescricao`
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
-- Estrutura para tabela `questao`
--

CREATE TABLE `questao` (
  `IdQuestao` int(11) NOT NULL,
  `IdTipoQuestao` tinyint(4) NOT NULL,
  `Descricao` varchar(300) NOT NULL,
  `PossuiOutro` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `questao`
--

INSERT INTO `questao` (`IdQuestao`, `IdTipoQuestao`, `Descricao`, `PossuiOutro`) VALUES
(6, 3, 'Nível de consciência', 'N'),
(7, 3, 'Sistema Respiratório', 'N'),
(8, 3, 'Escala de coma de Glasgow', 'N'),
(12, 1, 'teste', 'N');

-- --------------------------------------------------------

--
-- Estrutura para tabela `questaoafirmativa`
--

CREATE TABLE `questaoafirmativa` (
  `IdAfirmativa` int(11) NOT NULL,
  `IdQuestao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `questaoafirmativa`
--

INSERT INTO `questaoafirmativa` (`IdAfirmativa`, `IdQuestao`) VALUES
(2, 12),
(4, 8),
(5, 8),
(6, 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `resultado`
--

CREATE TABLE `resultado` (
  `IdResultado` int(11) NOT NULL,
  `Descricao` varchar(300) NOT NULL,
  `IdDiagnostico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `resultado`
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
-- Estrutura para tabela `tipofuncionario`
--

CREATE TABLE `tipofuncionario` (
  `IdTipoFuncionario` tinyint(4) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tipofuncionario`
--

INSERT INTO `tipofuncionario` (`IdTipoFuncionario`, `descricao`) VALUES
(1, 'administrador'),
(2, 'funcionario');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoquestao`
--

CREATE TABLE `tipoquestao` (
  `IdTipoQuestao` tinyint(4) NOT NULL,
  `Descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tipoquestao`
--

INSERT INTO `tipoquestao` (`IdTipoQuestao`, `Descricao`) VALUES
(1, 'Aberta'),
(2, 'Fechada Escolha Única'),
(3, 'Fechada Escolha Múltipla'),
(4, 'Data'),
(5, 'Afirmação ou Negação');

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidadeinternacao`
--

CREATE TABLE `unidadeinternacao` (
  `IdUnidadeInternacao` tinyint(4) NOT NULL,
  `NomeUnidade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `unidadeinternacao`
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
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `afirmativa`
--
ALTER TABLE `afirmativa`
  ADD PRIMARY KEY (`IdAfirmativa`);

--
-- Índices de tabela `aplicacao`
--
ALTER TABLE `aplicacao`
  ADD PRIMARY KEY (`IdAplicacao`),
  ADD KEY `formulario_aplicacao_fk` (`IdFormulario`),
  ADD KEY `avaliacao_aplicacao_fk` (`IdAvaliacao`);

--
-- Índices de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`IdAvaliacao`);

--
-- Índices de tabela `avaliacaoquestao`
--
ALTER TABLE `avaliacaoquestao`
  ADD PRIMARY KEY (`IdQuestao`,`IdAvaliacao`),
  ADD KEY `avaliacao_avaliacaoquestao_fk` (`IdAvaliacao`);

--
-- Índices de tabela `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`IdDiagnostico`),
  ADD KEY `unidadeinternacao_diagnostico_fk` (`IdUnidadeInternacao`);

--
-- Índices de tabela `diagnosticoprescricao`
--
ALTER TABLE `diagnosticoprescricao`
  ADD PRIMARY KEY (`IdDiagnostico`,`IdPrescricao`),
  ADD KEY `prescricao_diagnosticoprescricao_fk` (`IdPrescricao`);

--
-- Índices de tabela `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`IdFormulario`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`IdFuncionario`),
  ADD KEY `IdTipoUsuario` (`IdTipoFuncionario`);

--
-- Índices de tabela `prescricao`
--
ALTER TABLE `prescricao`
  ADD PRIMARY KEY (`IdPrescricao`);

--
-- Índices de tabela `questao`
--
ALTER TABLE `questao`
  ADD PRIMARY KEY (`IdQuestao`),
  ADD KEY `tipoavaliacao_avaliacao_fk` (`IdTipoQuestao`);

--
-- Índices de tabela `questaoafirmativa`
--
ALTER TABLE `questaoafirmativa`
  ADD PRIMARY KEY (`IdAfirmativa`,`IdQuestao`),
  ADD KEY `questao_questaoafirmativa_fk` (`IdQuestao`);

--
-- Índices de tabela `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`IdResultado`),
  ADD KEY `diagnostico_resultado_fk` (`IdDiagnostico`);

--
-- Índices de tabela `tipofuncionario`
--
ALTER TABLE `tipofuncionario`
  ADD PRIMARY KEY (`IdTipoFuncionario`);

--
-- Índices de tabela `tipoquestao`
--
ALTER TABLE `tipoquestao`
  ADD PRIMARY KEY (`IdTipoQuestao`);

--
-- Índices de tabela `unidadeinternacao`
--
ALTER TABLE `unidadeinternacao`
  ADD PRIMARY KEY (`IdUnidadeInternacao`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `afirmativa`
--
ALTER TABLE `afirmativa`
  MODIFY `IdAfirmativa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `aplicacao`
--
ALTER TABLE `aplicacao`
  MODIFY `IdAplicacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `IdAvaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `IdDiagnostico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `formulario`
--
ALTER TABLE `formulario`
  MODIFY `IdFormulario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `IdFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `prescricao`
--
ALTER TABLE `prescricao`
  MODIFY `IdPrescricao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de tabela `questao`
--
ALTER TABLE `questao`
  MODIFY `IdQuestao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `resultado`
--
ALTER TABLE `resultado`
  MODIFY `IdResultado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `tipofuncionario`
--
ALTER TABLE `tipofuncionario`
  MODIFY `IdTipoFuncionario` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tipoquestao`
--
ALTER TABLE `tipoquestao`
  MODIFY `IdTipoQuestao` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `unidadeinternacao`
--
ALTER TABLE `unidadeinternacao`
  MODIFY `IdUnidadeInternacao` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `aplicacao`
--
ALTER TABLE `aplicacao`
  ADD CONSTRAINT `avaliacao_aplicacao_fk` FOREIGN KEY (`IdAvaliacao`) REFERENCES `avaliacao` (`IdAvaliacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `formulario_aplicacao_fk` FOREIGN KEY (`IdFormulario`) REFERENCES `formulario` (`IdFormulario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`IdAvaliacao`) REFERENCES `avaliacaoquestao` (`IdAvaliacao`);

--
-- Restrições para tabelas `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD CONSTRAINT `unidadeinternacao_diagnostico_fk` FOREIGN KEY (`IdUnidadeInternacao`) REFERENCES `unidadeinternacao` (`IdUnidadeInternacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `diagnosticoprescricao`
--
ALTER TABLE `diagnosticoprescricao`
  ADD CONSTRAINT `diagnostico_diagnosticoprescricao_fk` FOREIGN KEY (`IdDiagnostico`) REFERENCES `diagnostico` (`IdDiagnostico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `prescricao_diagnosticoprescricao_fk` FOREIGN KEY (`IdPrescricao`) REFERENCES `prescricao` (`IdPrescricao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`IdTipoFuncionario`) REFERENCES `tipofuncionario` (`IdTipoFuncionario`);

--
-- Restrições para tabelas `questao`
--
ALTER TABLE `questao`
  ADD CONSTRAINT `tipoavaliacao_avaliacao_fk` FOREIGN KEY (`IdTipoQuestao`) REFERENCES `tipoquestao` (`IdTipoQuestao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `questaoafirmativa`
--
ALTER TABLE `questaoafirmativa`
  ADD CONSTRAINT `questaoafirmativa_ibfk_1` FOREIGN KEY (`IdQuestao`) REFERENCES `questao` (`IdQuestao`),
  ADD CONSTRAINT `questaoafirmativa_ibfk_2` FOREIGN KEY (`IdAfirmativa`) REFERENCES `afirmativa` (`IdAfirmativa`);

--
-- Restrições para tabelas `resultado`
--
ALTER TABLE `resultado`
  ADD CONSTRAINT `diagnostico_resultado_fk` FOREIGN KEY (`IdDiagnostico`) REFERENCES `diagnostico` (`IdDiagnostico`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
