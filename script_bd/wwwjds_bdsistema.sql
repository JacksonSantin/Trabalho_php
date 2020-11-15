-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jun-2020 às 03:29
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `wwwjds_bdsistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `dt_nascimento` date NOT NULL,
  `telefone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nome_contatoFone` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `celular1` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nome_contatoCelular1` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `celular2` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nome_contatoCelular2` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `obs_contato` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `id_perfil_interesse` int(11) NOT NULL,
  `facebook` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `instagram` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `estado_civil` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `obs` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `uf` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `rua` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `rg` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `cnpj` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cnpj` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `telefone1` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `telefone2` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `telefone3` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `celular1` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `celular2` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `celular3` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email1` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email2` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email3` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `uf` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `rua` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `instagram` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nome` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`id_marca`, `nome`) VALUES
(1, 'Citroën'),
(2, 'GM'),
(3, 'Fiat'),
(4, 'Ford'),
(5, 'Honda'),
(6, 'Peugeot'),
(7, 'Renault'),
(8, 'Toyota'),
(9, 'VolksWagem'),
(10, 'Citroën');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `tipo_perfil` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `tipo_perfil`) VALUES
(1, 'Interessado'),
(2, 'Comprador'),
(3, 'Proprietário'),
(4, 'Locatário'),
(5, 'Fiador'),
(6, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `fone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_venda` int(11) NOT NULL,
  `veiculo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ano` int(11) NOT NULL,
  `id_marca_veiculo` int(11) NOT NULL,
  `potencia` int(11) NOT NULL,
  `cor` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `combustivel` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `vidro_eletrico` tinyint(1) NOT NULL,
  `trava_eletrica` tinyint(1) NOT NULL,
  `ar_condicionado` tinyint(1) NOT NULL,
  `radio` tinyint(1) NOT NULL,
  `descricao` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `perfil_fk` (`id_perfil_interesse`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices para tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `marca_fk` (`id_marca_veiculo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `perfil_fk` FOREIGN KEY (`id_perfil_interesse`) REFERENCES `perfil` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `marca_fk` FOREIGN KEY (`id_marca_veiculo`) REFERENCES `marca` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
