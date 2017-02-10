-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 14/02/2016 às 11:38
-- Versão do servidor: 5.5.47-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `collulo_plugins`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `call_panel`
--

CREATE TABLE `call_panel` (
  `id` int(11) NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '0',
  `message` varchar(150) NOT NULL,
  `nunber` int(11) NOT NULL,
  `counter` int(11) DEFAULT NULL,
  `date_insert` datetime NOT NULL,
  `date_call` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `call_number` int(11) DEFAULT '0',
  `visualized` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `call_panel`
--
ALTER TABLE `call_panel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `call_panel`
--
ALTER TABLE `call_panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
