-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 27/11/2019 às 00:54
-- Versão do servidor: 10.3.16-MariaDB
-- Versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cagevile`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `contato`
--

CREATE TABLE `contato` (
  `id_contato` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `assunto` varchar(60) NOT NULL,
  `mensagem` longtext NOT NULL,
  `tipo_contato` enum('SUGESTAO','REPORTAR_ERRO','OUTROS') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `especie`
--

CREATE TABLE `especie` (
  `id_especie` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `descricao` longtext DEFAULT NULL,
  `id_habitat` int(11) DEFAULT NULL,
  `motivo_extincao` longtext NOT NULL,
  `populacao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `especie`
--

INSERT INTO `especie` (`id_especie`, `nome`, `descricao`, `id_habitat`, `motivo_extincao`, `populacao`) VALUES
(1, 'Onça Pintada', 'A onça pintada, o maior felino das Américas, está na lista das espécies ameaçadas de extinção na categoria vulnerável. Esta é uma espécie que pode ser encontrada em diferentes biomas brasileiros, porém é considerada símbolo do Pantanal.', 8, 'As principais causas que ameaçam a extinção da onça-pintada está relacionada à caça. Além disso, o desmatamento também reduz o seu habitat natural e compromete a conservação da espécie.', '10.000 indivíduos'),
(2, 'Arara-Azul', 'A arara-azul, também chamada arara-azul-grande, é uma espécie de ave, encontrada no Brasil, que se caracteriza por ser a maior entre os psitacídeos (família Psittacidae), chegando a atingir mais de um metro de n, medindo-se da ponta do bico à ponta da cauda. Essa espécie habita diferentes formações vegetais, sendo encontrada em formações savânicas e até em ambientes de floresta no Brasil, Paraguai e Bolívia. As maiores populações dessa espécie de arara são encontradas no Pantanal.', 8, 'A arara-azul (Anodorhynchus hyacinthinus) é uma espécie que não se encontra extinta, porém está classificada como vulnerável na Lista Vermelha de Espécies Ameaçadas, da União Internacional para a Conservação da Natureza e dos Recursos Naturais (IUCN). Ainda de acordo com essa lista, a população dessa espécie está em decréscimo. As principais ameaças contra ela são a destruição de habitat e a captura para comércio ilegal.', 'Espécie foi estimada em apenas 2500 indivíduos.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `foto_especie`
--

CREATE TABLE `foto_especie` (
  `id_foto` int(11) NOT NULL,
  `urlFoto` varchar(70) NOT NULL,
  `principal` tinyint(1) DEFAULT 0,
  `id_especie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `foto_especie`
--

INSERT INTO `foto_especie` (`id_foto`, `urlFoto`, `principal`, `id_especie`) VALUES
(3, '/img/trigrinho.png', 1, 1),
(4, '/img/arazul.png', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `habitat_especie`
--

CREATE TABLE `habitat_especie` (
  `id_habitat` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `bioma` varchar(80) NOT NULL,
  `pais` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `habitat_especie`
--

INSERT INTO `habitat_especie` (`id_habitat`, `nome`, `bioma`, `pais`) VALUES
(6, 'Cerrado', 'Savana', 'Brasil'),
(7, 'Anhara', 'Savana', 'Angola'),
(8, 'Pantanal', 'Pântano', 'Brasil'),
(9, 'Floresta Amazônica', 'Floresta', 'Brasil'),
(10, 'Mata Atlântica', 'Floresta', 'Brasil');

-- --------------------------------------------------------

--
-- Estrutura para tabela `recomendacao`
--

CREATE TABLE `recomendacao` (
  `id_recomendacao` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `habitat` varchar(80) NOT NULL,
  `descricao` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `recomendacao`
--

INSERT INTO `recomendacao` (`id_recomendacao`, `nome`, `habitat`, `descricao`) VALUES
(1, 'Boto cor de rosa', 'Aguas doces', 'É um golfinho rosa, ele tá sendo morto pela caça ilegal, esse bando de #$@$@#!');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id_contato`);

--
-- Índices de tabela `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`id_especie`),
  ADD KEY `id_habitat` (`id_habitat`);

--
-- Índices de tabela `foto_especie`
--
ALTER TABLE `foto_especie`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_especie` (`id_especie`);

--
-- Índices de tabela `habitat_especie`
--
ALTER TABLE `habitat_especie`
  ADD PRIMARY KEY (`id_habitat`);

--
-- Índices de tabela `recomendacao`
--
ALTER TABLE `recomendacao`
  ADD PRIMARY KEY (`id_recomendacao`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id_contato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `especie`
--
ALTER TABLE `especie`
  MODIFY `id_especie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `foto_especie`
--
ALTER TABLE `foto_especie`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `habitat_especie`
--
ALTER TABLE `habitat_especie`
  MODIFY `id_habitat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `recomendacao`
--
ALTER TABLE `recomendacao`
  MODIFY `id_recomendacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `especie`
--
ALTER TABLE `especie`
  ADD CONSTRAINT `especie_ibfk_1` FOREIGN KEY (`id_habitat`) REFERENCES `habitat_especie` (`id_habitat`);

--
-- Restrições para tabelas `foto_especie`
--
ALTER TABLE `foto_especie`
  ADD CONSTRAINT `foto_especie_ibfk_1` FOREIGN KEY (`id_especie`) REFERENCES `especie` (`id_especie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
