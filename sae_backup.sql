-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Maio-2019 às 21:43
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
-- Database: `noticias`
--
CREATE DATABASE IF NOT EXISTS `noticias` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `noticias`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE `noticia` (
  `idNoticia` int(11) NOT NULL,
  `nomeNoticia` varchar(100) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `dataNoticia` date NOT NULL,
  `tag` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`idNoticia`, `nomeNoticia`, `autor`, `dataNoticia`, `tag`) VALUES
(1, 'dsadsa', 'joao', '2019-04-25', 'Futebol');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `senha`, `nome`, `email`) VALUES
(1, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'mislene', 'mislenedalila@gmail.com'),
(2, '8cb2237d0679ca88db6464eac60da96345513964', 'Maria', 'mis.lila@hotmail.com'),
(3, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Mislene', 'mislenedalila@gmail.com'),
(4, '1ce5394c37c814fadbf5d8151c63d22dd52a799c', 'mirian', 'mislene@unipam.edu.br'),
(5, '2e6f9b0d5885b6010f9167787445617f553a735f', 'Teste', 'teste@gmail.com'),
(6, '2e6f9b0d5885b6010f9167787445617f553a735f', 'Mirian', 'miriancs@unipam.edu.br'),
(7, '2e6f9b0d5885b6010f9167787445617f553a735f', 'Teste', 'teste@gmail.com'),
(8, '2e6f9b0d5885b6010f9167787445617f553a735f', 'Mislene', 'teste2@gmail.com'),
(9, '2e6f9b0d5885b6010f9167787445617f553a735f', 'Mislene Dalila da Silva', 'mis.lila@hotmail.com'),
(10, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'joao', 'joao@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`idNoticia`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `noticia`
--
ALTER TABLE `noticia`
  MODIFY `idNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Extraindo dados da tabela `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"angular_direct\":\"direct\",\"relation_lines\":\"true\",\"snap_to_grid\":\"off\",\"full_screen\":\"off\"}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Extraindo dados da tabela `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"sae\",\"table\":\"afirmativa\"},{\"db\":\"sae\",\"table\":\"avaliacao\"},{\"db\":\"sae\",\"table\":\"avaliacaoquestao\"},{\"db\":\"sae\",\"table\":\"formulario\"},{\"db\":\"sae\",\"table\":\"aplicacao\"},{\"db\":\"sae\",\"table\":\"questaoafirmativa\"},{\"db\":\"sae\",\"table\":\"questao\"},{\"db\":\"sae\",\"table\":\"tipoquestao\"},{\"db\":\"sae\",\"table\":\"tipofuncionario\"},{\"db\":\"sae\",\"table\":\"diagnosticoprescricao\"}]');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Extraindo dados da tabela `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'sae', 'questao', '[]', '2019-04-24 16:32:20'),
('root', 'sae', 'tipoquestao', '[]', '2019-04-24 16:28:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Extraindo dados da tabela `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2019-05-27 19:43:17', '{\"lang\":\"pt\",\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `sae`
--
CREATE DATABASE IF NOT EXISTS `sae` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sae`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `afirmativa`
--

CREATE TABLE `afirmativa` (
  `IdAfirmativa` int(11) NOT NULL,
  `Descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `afirmativa`
--

INSERT INTO `afirmativa` (`IdAfirmativa`, `Descricao`) VALUES
(1, 'afirmativa'),
(2, 'afirmativa2');

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
(4, 9, 1),
(5, 10, 1),
(6, 9, 1),
(7, 9, 1);

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
(9, 'Avaliação teste'),
(10, 'teste');

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
(5, 9),
(6, 9),
(6, 10),
(7, 9),
(11, 9),
(12, 9);

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
(1, 'Diagnostico1', 1),
(2, 'teste', 1),
(3, 'diarreia', 4);

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
(1, 3);

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
(1, 'formulario teste'),
(2, 'dasdsadsa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `IdFuncionario` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `login` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `IdTipoFuncionario` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`IdFuncionario`, `nome`, `login`, `senha`, `IdTipoFuncionario`) VALUES
(21, 'Fabricia', 'fabricia', '123', 1),
(23, 'jose', 'jose', '123', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `IdPaciente` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `dataInternacao` datetime NOT NULL
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
(3, 'prescricao2'),
(4, 'beber agua');

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
(5, 2, 'PrimeiraPergunta', 'N'),
(6, 1, 'questaoAberta', 'N'),
(7, 2, 'QuestaoEscolhaUnica', 'N'),
(8, 3, 'FechadaEscolhaMultipla', 'N'),
(9, 5, 'QuestaoAfirmativaNegativa', 'N'),
(10, 1, 'dsadsadsa', 'N'),
(11, 4, 'Data', 'N'),
(12, 5, 'SimNao', 'N');

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
(1, 5),
(1, 7),
(1, 8),
(2, 5);

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
-- Estrutura da tabela `tipofuncionario`
--

CREATE TABLE `tipofuncionario` (
  `IdTipoFuncionario` tinyint(4) NOT NULL,
  `descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipofuncionario`
--

INSERT INTO `tipofuncionario` (`IdTipoFuncionario`, `descricao`) VALUES
(1, 'administrador'),
(2, 'funcionario');

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
-- Indexes for table `tipofuncionario`
--
ALTER TABLE `tipofuncionario`
  ADD PRIMARY KEY (`IdTipoFuncionario`);

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
  MODIFY `IdAfirmativa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aplicacao`
--
ALTER TABLE `aplicacao`
  MODIFY `IdAplicacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `IdAvaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `IdDiagnostico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `formulario`
--
ALTER TABLE `formulario`
  MODIFY `IdFormulario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `IdFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `prescricao`
--
ALTER TABLE `prescricao`
  MODIFY `IdPrescricao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questao`
--
ALTER TABLE `questao`
  MODIFY `IdQuestao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `resultado`
--
ALTER TABLE `resultado`
  MODIFY `IdResultado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipofuncionario`
--
ALTER TABLE `tipofuncionario`
  MODIFY `IdTipoFuncionario` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Limitadores para a tabela `avaliacaoquestao`
--
ALTER TABLE `avaliacaoquestao`
  ADD CONSTRAINT `avaliacao_avaliacaoquestao_fk` FOREIGN KEY (`IdAvaliacao`) REFERENCES `avaliacao` (`IdAvaliacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `questao_avaliacaoquestao_fk` FOREIGN KEY (`IdQuestao`) REFERENCES `questao` (`IdQuestao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Limitadores para a tabela `questao`
--
ALTER TABLE `questao`
  ADD CONSTRAINT `tipoavaliacao_avaliacao_fk` FOREIGN KEY (`IdTipoQuestao`) REFERENCES `tipoquestao` (`IdTipoQuestao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `resultado`
--
ALTER TABLE `resultado`
  ADD CONSTRAINT `diagnostico_resultado_fk` FOREIGN KEY (`IdDiagnostico`) REFERENCES `diagnostico` (`IdDiagnostico`) ON DELETE NO ACTION ON UPDATE NO ACTION;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
