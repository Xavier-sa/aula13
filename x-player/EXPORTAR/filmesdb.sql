-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/11/2024 às 04:51
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `filmesdb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `filme`
--

CREATE TABLE `filme` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `ano` int(11) NOT NULL,
  `descricao` text DEFAULT NULL,
  `favorito` tinyint(1) DEFAULT 0,
  `imagem_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `filme`
--

INSERT INTO `filme` (`id`, `titulo`, `ano`, `descricao`, `favorito`, `imagem_url`) VALUES
(27, 'O Poderoso Chefão', 1972, 'Um drama épico sobre a máfia italiana, focando na família Corleone e seu patriarca, Vito Corleone.', 1, 'https://br.web.img3.acsta.net/c_310_420/medias/nmedia/18/90/93/20/20120876.jpg'),
(28, 'A Origem', 2010, 'Dom Cobb é um ladrão habilidoso, especializado em roubar segredos através da invasão dos sonhos das pessoas.', 1, 'https://br.web.img3.acsta.net/c_310_420/medias/nmedia/18/87/32/31/20028688.jpg'),
(29, 'Vingadores: Ultimato', 2019, 'Os Vingadores se reúnem para enfrentar Thanos e tentar reverter a destruição que ele causou ao universo.', 0, 'https://br.web.img2.acsta.net/c_310_420/pictures/19/04/26/17/30/2428965.jpg'),
(30, 'O Senhor dos Anéis: A Sociedade do Anel', 2001, 'Frodo Bolseiro inicia sua jornada para destruir o Um Anel, com a ajuda de seus amigos e companheiros.', 1, 'https://br.web.img3.acsta.net/c_310_420/medias/nmedia/18/92/91/32/20224832.jpg'),
(31, 'Matrix', 1999, 'Neo descobre a verdade sobre a realidade em que vive e se junta à resistência para lutar contra máquinas que dominam o mundo.', 1, 'https://br.web.img3.acsta.net/c_310_420/medias/nmedia/18/91/08/82/20128877.JPG');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Teste Usuario', 'teste@gmail.com', '$2a$12$g7YR9I5L3o9.OOfe5CRT5O3ypNuf.VqE8qZL3XY8oRSEnCL8RUMI6'),
(2, 'xavier', 'xavier@gmail.com', '123456');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `filme`
--
ALTER TABLE `filme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
