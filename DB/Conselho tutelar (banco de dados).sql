create database conselho_tutelar
default character set utf8
default collate utf8_general_ci;

use conselho_tutelar;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Fev-2018 às 13:54
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conselho_tutelar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agressor`
--

CREATE TABLE `agressor` (
  `idagressor` int(10) UNSIGNED NOT NULL,
  `crianca_idcrianca` int(10) UNSIGNED NOT NULL,
  `suposto_agressor` varchar(255) DEFAULT NULL,
  `observacoes` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `agressor`
--

INSERT INTO `agressor` (`idagressor`, `crianca_idcrianca`, `suposto_agressor`, `observacoes`) VALUES
(1, 5, 'Tio Paterno', ''),
(2, 5, 'AvÃ³ Paterna', ''),
(3, 5, 'AvÃ´ Paterna', ''),
(4, 8, 'AvÃ´ Paterna', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conselheiro`
--

CREATE TABLE `conselheiro` (
  `idconselheiro` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `conselheiro`
--

INSERT INTO `conselheiro` (`idconselheiro`, `nome`, `usuario`, `senha`) VALUES
(1, 'Test', 'test', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `crianca`
--

CREATE TABLE `crianca` (
  `idcrianca` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `sexo` enum('masculino','feminino') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `crianca`
--

INSERT INTO `crianca` (`idcrianca`, `nome`, `nascimento`, `sexo`) VALUES
(1, 'beleleu', '2017-11-01', 'masculino'),
(2, 'beleleu', '2017-11-06', 'masculino'),
(3, 'beleleu', '2017-11-06', 'masculino'),
(4, 'beleleu', '2017-11-06', 'masculino'),
(5, 'eu ', '2017-11-06', 'masculino'),
(6, 'Arthur Rodrigues Araujo de Melo', '2007-02-07', 'masculino'),
(7, 'ele', '2007-05-02', 'masculino'),
(8, 'ela', '2002-01-12', 'feminino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disk_100`
--

CREATE TABLE `disk_100` (
  `id_disk_100` int(10) UNSIGNED NOT NULL,
  `registro_idregistro` int(10) UNSIGNED NOT NULL,
  `disk_100_100` varchar(30) DEFAULT 'NÂO'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disk_100`
--

INSERT INTO `disk_100` (`id_disk_100`, `registro_idregistro`, `disk_100_100`) VALUES
(1, 1, ''),
(2, 2, ''),
(3, 3, ''),
(4, 4, ''),
(5, 5, 'Sim'),
(6, 6, 'Sim'),
(7, 7, ''),
(8, 8, 'Sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ipd`
--

CREATE TABLE `ipd` (
  `idipd` int(10) UNSIGNED NOT NULL,
  `crianca_idcrianca` int(10) UNSIGNED NOT NULL,
  `infrigiram_direitos` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ipd`
--

INSERT INTO `ipd` (`idipd`, `crianca_idcrianca`, `infrigiram_direitos`) VALUES
(1, 5, 'Briga na Escola'),
(2, 5, 'EvasÃ£o Escolar'),
(3, 6, 'Ameacas'),
(4, 6, 'EvasÃ£o Escolar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medidas`
--

CREATE TABLE `medidas` (
  `idmedidas` int(10) UNSIGNED NOT NULL,
  `crianca_idcrianca` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `tipo` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `medidas`
--

INSERT INTO `medidas` (`idmedidas`, `crianca_idcrianca`, `descricao`, `comentario`, `tipo`) VALUES
(1, 1, 'cri_I', '', 3),
(2, 1, 'cri_IV', '', 3),
(3, 1, 'adu_II', '', 3),
(4, 1, 'adu_III', '', 3),
(5, 1, 'CAPS', '', 3),
(6, 1, 'CRAMSV', '', 3),
(7, 1, 'UNIDADE DE ENSINO', '', 3),
(8, 4, 'cri_I', '', 1),
(9, 4, 'cri_II', '', 1),
(10, 4, 'adu_I', '', 2),
(11, 4, 'adu_II', '', 2),
(12, 4, 'CREAS', '', 3),
(13, 4, 'CAPS', '', 3),
(14, 4, 'CAPS AD', '', 3),
(15, 4, 'CAPS TRANSTORNO', '', 3),
(16, 5, 'cri_I', '', 1),
(17, 5, 'cri_IV', '', 1),
(18, 5, 'adu_I', '', 2),
(19, 6, 'cri_I', 'Ã© nois', 1),
(20, 6, 'cri_III', 'Ã© nois', 1),
(21, 6, 'adu_I', 'Ã© nois', 2),
(22, 6, 'adu_IV', 'Ã© nois', 2),
(23, 6, 'adu_VII', 'Ã© nois', 2),
(24, 6, 'CAPS TRANSTORNO', 'Ã© nois', 3),
(25, 6, 'CRAS', 'Ã© nois', 3),
(26, 6, 'UNIDADE DE SAUDE', 'Ã© nois', 3),
(27, 6, 'PROGRAMA DE TRATAMENTO DE DROGADICAO', 'Ã© nois', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `procedencia`
--

CREATE TABLE `procedencia` (
  `idprocedencia` int(10) UNSIGNED NOT NULL,
  `registro_idregistro` int(10) UNSIGNED NOT NULL,
  `procede` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `procedencia`
--

INSERT INTO `procedencia` (`idprocedencia`, `registro_idregistro`, `procede`) VALUES
(1, 1, ''),
(2, 2, ''),
(3, 3, ''),
(4, 4, ''),
(5, 5, 'Improcedente'),
(6, 6, 'Improcedente'),
(7, 7, ''),
(8, 8, 'Improcedente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

CREATE TABLE `registro` (
  `idregistro` int(10) UNSIGNED NOT NULL,
  `crianca_idcrianca` int(11) NOT NULL,
  `data_ocorrencia` date DEFAULT NULL,
  `pendencia` varchar(30) NOT NULL,
  `idade` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `registro`
--

INSERT INTO `registro` (`idregistro`, `crianca_idcrianca`, `data_ocorrencia`, `pendencia`, `idade`) VALUES
(3, 2, '2017-07-20', 'sim', 0),
(2, 1, '2000-01-20', 'nao', 0),
(4, 3, '2017-07-13', 'nao', 0),
(5, 4, '2017-07-13', 'sim', 0),
(6, 0, '2015-12-02', '', 0),
(7, 0, '2016-10-02', '', 0),
(8, 5, '2017-07-25', 'sim', 0),
(9, 6, '2011-11-11', '', 0),
(10, 7, '2000-11-11', 'sim', 0),
(11, 8, '2017-11-15', 'Pendente', 0),
(23, 9, '2017-11-21', 'Concluida', 0),
(17, 10, '2017-11-13', 'Concluida', 0),
(24, 12, '2017-11-21', 'Pendente', 17),
(25, 13, '2017-11-21', '', 16),
(26, 14, '2017-11-10', 'Pendente', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro_has_conselheiro`
--

CREATE TABLE `registro_has_conselheiro` (
  `registro_idregistro` int(10) UNSIGNED NOT NULL,
  `conselheiro_idconselheiro` int(10) UNSIGNED NOT NULL,
  `data_modificacao` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `registro_has_conselheiro`
--

INSERT INTO `registro_has_conselheiro` (`registro_idregistro`, `conselheiro_idconselheiro`, `data_modificacao`) VALUES
(1, 1, NULL),
(2, 1, NULL),
(4, 1, NULL),
(5, 1, NULL),
(6, 1, NULL),
(7, 1, NULL),
(8, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel`
--

CREATE TABLE `responsavel` (
  `idresponsavel` int(10) UNSIGNED NOT NULL,
  `crianca_idcrianca` int(10) UNSIGNED NOT NULL,
  `pai` varchar(255) DEFAULT NULL,
  `mae` varchar(255) DEFAULT NULL,
  `outro_responsavel` varchar(255) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `referencia` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `outro_endereco` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `responsavel`
--

INSERT INTO `responsavel` (`idresponsavel`, `crianca_idcrianca`, `pai`, `mae`, `outro_responsavel`, `rua`, `numero`, `referencia`, `bairro`, `telefone`, `outro_endereco`) VALUES
(1, 1, '', '', '', '', 0, '', 'NÃ£o Informado', '', ''),
(2, 2, '', '', '', '', 0, '', 'NÃ£o Informado', '', ''),
(3, 3, '', '', '', '', 0, '', 'NÃ£o Informado', '', ''),
(4, 4, '', '', '', '', 0, '', 'NÃ£o Informado', '', ''),
(5, 5, 'nos', 'ela', '', 'brasilia', 12, '', 'Caititus', '82994466', ''),
(6, 6, 'Aldo RogÃ©rio Rodrigues de Melo', 'Jane Kelly AraÃºjo de Melo', '', 'Rua Santa Rita', 646, '', 'Brasilia', '82999635747', ''),
(7, 7, '', '', '', '', 0, '', 'NÃ£o Informado', '', ''),
(8, 8, '', '', '', '', 0, '', 'NÃ£o Informado', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `violencia`
--

CREATE TABLE `violencia` (
  `idviolencia` int(10) UNSIGNED NOT NULL,
  `crianca_idcrianca` int(10) UNSIGNED NOT NULL,
  `tipo_violencia` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `violencia`
--

INSERT INTO `violencia` (`idviolencia`, `crianca_idcrianca`, `tipo_violencia`) VALUES
(1, 5, 'Abuso Sexual'),
(2, 5, 'Agressao Verbal'),
(3, 5, 'Bullying'),
(4, 6, 'Abandono de Incapaz'),
(5, 6, 'Agressao Fisica'),
(6, 6, 'Ameaca Morte'),
(7, 8, 'Abandono de Incapaz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agressor`
--
ALTER TABLE `agressor`
  ADD PRIMARY KEY (`idagressor`),
  ADD KEY `agressor_FKIndex1` (`crianca_idcrianca`);

--
-- Indexes for table `conselheiro`
--
ALTER TABLE `conselheiro`
  ADD PRIMARY KEY (`idconselheiro`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `crianca`
--
ALTER TABLE `crianca`
  ADD PRIMARY KEY (`idcrianca`);

--
-- Indexes for table `disk_100`
--
ALTER TABLE `disk_100`
  ADD PRIMARY KEY (`id_disk_100`),
  ADD KEY `disk_100_FKIndex1` (`registro_idregistro`);

--
-- Indexes for table `ipd`
--
ALTER TABLE `ipd`
  ADD PRIMARY KEY (`idipd`),
  ADD KEY `ipd_FKIndex1` (`crianca_idcrianca`);

--
-- Indexes for table `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`idmedidas`),
  ADD KEY `medidas_FKIndex1` (`crianca_idcrianca`);

--
-- Indexes for table `procedencia`
--
ALTER TABLE `procedencia`
  ADD PRIMARY KEY (`idprocedencia`),
  ADD KEY `procedencia_FKIndex1` (`registro_idregistro`);

--
-- Indexes for table `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`idregistro`);

--
-- Indexes for table `registro_has_conselheiro`
--
ALTER TABLE `registro_has_conselheiro`
  ADD PRIMARY KEY (`registro_idregistro`,`conselheiro_idconselheiro`),
  ADD KEY `registro_has_conselheiro_FKIndex1` (`registro_idregistro`),
  ADD KEY `registro_has_conselheiro_FKIndex2` (`conselheiro_idconselheiro`);

--
-- Indexes for table `responsavel`
--
ALTER TABLE `responsavel`
  ADD PRIMARY KEY (`idresponsavel`),
  ADD KEY `responsavel_FKIndex1` (`crianca_idcrianca`);

--
-- Indexes for table `violencia`
--
ALTER TABLE `violencia`
  ADD PRIMARY KEY (`idviolencia`),
  ADD KEY `violencia_FKIndex1` (`crianca_idcrianca`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agressor`
--
ALTER TABLE `agressor`
  MODIFY `idagressor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `conselheiro`
--
ALTER TABLE `conselheiro`
  MODIFY `idconselheiro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crianca`
--
ALTER TABLE `crianca`
  MODIFY `idcrianca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `disk_100`
--
ALTER TABLE `disk_100`
  MODIFY `id_disk_100` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ipd`
--
ALTER TABLE `ipd`
  MODIFY `idipd` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medidas`
--
ALTER TABLE `medidas`
  MODIFY `idmedidas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `procedencia`
--
ALTER TABLE `procedencia`
  MODIFY `idprocedencia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registro`
--
ALTER TABLE `registro`
  MODIFY `idregistro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `responsavel`
--
ALTER TABLE `responsavel`
  MODIFY `idresponsavel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `violencia`
--
ALTER TABLE `violencia`
  MODIFY `idviolencia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
