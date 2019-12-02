-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Maio-2019 às 05:22
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trabalho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(8) NOT NULL,
  `descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `descricao`) VALUES
(5, 'Problema'),
(6, 'ConfiguraÃ§Ã£o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamados`
--

CREATE TABLE `chamados` (
  `id` int(8) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` varchar(5000) NOT NULL,
  `idrequerente` int(8) DEFAULT NULL,
  `idtecnico` int(8) DEFAULT NULL,
  `idcomputador` int(8) DEFAULT NULL,
  `idcategoria` int(8) DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT NULL,
  `solucao` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `chamados`
--

INSERT INTO `chamados` (`id`, `titulo`, `descricao`, `idrequerente`, `idtecnico`, `idcomputador`, `idcategoria`, `STATUS`, `solucao`) VALUES
(1, 'Urgente', 'urgente', 1, 1, NULL, NULL, 'Novo', NULL),
(2, 'chamado', 'chamado chamado chamado chamado chamado', 1, 1, NULL, NULL, 'Novo', NULL),
(3, 'titulo', 'desc', 1, NULL, 1, 0, 'Fechado', NULL),
(4, 'yggyg ALterado', 'slsl', 1, NULL, 1, 0, 'Fechado', ''),
(5, 'kkkk ALterado', 'kkkk', 1, NULL, 1, 0, 'Novo', ''),
(6, 'sksksk', 'skksksksk', 1, NULL, 1, 0, 'Fechado', 'solucÃ§ao'),
(8, 'ss', 'ss', 1, NULL, 1, 0, 'Fechado', 'dd'),
(9, 'Teste', 'Primeiro teste com Fechamento', 1, NULL, 1, 0, 'Fechado', 'Solucionado'),
(10, 'Chamado', 'Chamado do Paulo', 4, NULL, 2, 6, 'Fechado', 'Solucap'),
(11, 'Erro', 'Erroooo', 4, NULL, 2, 5, 'Fechado', 'AAcerto'),
(12, 'Titulo', 'Descricao', 4, NULL, 2, 6, 'Fechado', 'SoluÃ§Ã£o'),
(13, 'Outro Erro', 'Erooooooor', 4, NULL, 2, 6, 'Fechado', 'SoluÃ§Ã£o'),
(14, 'Novo', 'Chamado de aÃ§ao', 4, NULL, 3, 6, 'Fechado', 'solu'),
(15, 'Chamado', 'Teste', 4, NULL, 2, 6, 'Novo', NULL),
(16, 'Pedro', 'Pedro abriu um chamado', 3, NULL, 2, 6, 'Fechado', 'solved'),
(17, 'Chamado', 'Do Billy', 5, NULL, 2, 6, 'Novo', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `computador`
--

CREATE TABLE `computador` (
  `id` int(8) NOT NULL,
  `nome` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `computador`
--

INSERT INTO `computador` (`id`, `nome`) VALUES
(2, 'PC001'),
(3, 'PC012'),
(4, 'PC022');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(8) NOT NULL,
  `user` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `senha`, `tipo`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(3, 'PedroAlmeida', 'c6cc8094c2dc07b700ffcc36d64e2138', 'requerente'),
(4, 'Paulo', 'dd41cb18c930753cbecf993f828603dc', 'admin'),
(5, 'Billy', '89c246298be2b6113fb10ba80f3c6956', 'requerente'),
(6, '', 'd41d8cd98f00b204e9800998ecf8427e', 'requerente'),
(7, 'Joao', 'dd41cb18c930753cbecf993f828603dc', 'requerente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_requerente` (`idrequerente`),
  ADD KEY `fk_tecnico` (`idtecnico`),
  ADD KEY `fk_categoria` (`idcategoria`),
  ADD KEY `fk_computador` (`idcomputador`);

--
-- Indexes for table `computador`
--
ALTER TABLE `computador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chamados`
--
ALTER TABLE `chamados`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `computador`
--
ALTER TABLE `computador`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
