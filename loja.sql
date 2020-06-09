-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Jun-2020 às 17:54
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nomefantasia` varchar(255) NOT NULL,
  `razaosocial` varchar(255) NOT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `telefone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` char(2) NOT NULL,
  `cep` char(8) NOT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `pedidoid` int(11) NOT NULL,
  `usuarioid` int(11) NOT NULL,
  `clienteid` int(11) NOT NULL,
  `codigopedido` varchar(20) NOT NULL,
  `valorbruto` varchar(20) NOT NULL,
  `valorliquido` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidoitens`
--

CREATE TABLE `pedidoitens` (
  `pedidoitemid` int(11) NOT NULL,
  `pedidoid` int(11) NOT NULL,
  `clienteid` int(11) NOT NULL,
  `usuarioid` int(11) NOT NULL,
  `produtoid` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valormercadoria` decimal(10,2) NOT NULL,
  `valorvenda` decimal(10,2) NOT NULL,
  `desconto` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `perfilid` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`perfilid`, `descricao`, `status`) VALUES
(1, 'SUPER ADMINISTRADOR', 1),
(2, 'ADMINISTRADOR (EMPRESA)', 1),
(3, 'DIRETOR', 1),
(4, 'GERENTE', 1),
(5, 'SUPERVISOR', 1),
(6, 'REPRESENTANTE (VENDEDOR)', 1),
(7, 'CLIENTE', 1),
(8, 'VISITANTE', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nomeproduto` varchar(50) NOT NULL,
  `unidade` int(11) NOT NULL,
  `valormercadoria` float NOT NULL,
  `valorvenda` float NOT NULL,
  `qtdeestoque` int(11) NOT NULL,
  `descontopermitido` int(11) NOT NULL,
  `descricaoproduto` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `img`, `nomeproduto`, `unidade`, `valormercadoria`, `valorvenda`, `qtdeestoque`, `descontopermitido`, `descricaoproduto`) VALUES
(12, '', 'carro', 1, 12, 12, 5, 10, 'este produto é de qualidade'),
(13, '', 'moto', 5, 100, 50, 10, 0, 'segundo produto e melhor ainda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `datacadastro` datetime DEFAULT NULL,
  `dataultimoacesso` datetime DEFAULT NULL,
  `perfilid` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `email`, `senha`, `datacadastro`, `dataultimoacesso`, `perfilid`, `status`) VALUES
(19, 'teste', 'j', 'j@j.j', '202cb962ac59075b964b07152d234b70', NULL, NULL, 7, 1),
(20, 'teste', 'miguel', 'miguel@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, 7, 1),
(15, 'admin', 'admin', 'admin@admin.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`pedidoid`);

--
-- Indexes for table `pedidoitens`
--
ALTER TABLE `pedidoitens`
  ADD PRIMARY KEY (`pedidoitemid`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`perfilid`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `pedidoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pedidoitens`
--
ALTER TABLE `pedidoitens`
  MODIFY `pedidoitemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `perfilid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
