-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 26/06/2025 às 00:17
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
-- Banco de dados: `ultraviolet`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `books`
--

CREATE TABLE `books` (
  `id_books` int(11) NOT NULL,
  `title_books` varchar(255) NOT NULL,
  `author_books` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `pages_books` int(11) NOT NULL,
  `date_books` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `books`
--

INSERT INTO `books` (`id_books`, `title_books`, `author_books`, `id_category`, `pages_books`, `date_books`) VALUES
(10, 'THE DO OVER', 'PAINTER', 11, 100, '1111-11-11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `category`
--

INSERT INTO `category` (`id_category`, `category_name`, `category_description`) VALUES
(1, 'Romance', 'Romantic books'),
(7, 'culinary', 'talk about recepies and techniques'),
(11, 'Action', 'Action fiction is a genre in literature that focuses on stories involving high-stakes, high-energy, and fast-paced events. This genre includes a wide range of subgenres, such as spy novels, adventure stories, tales of terror, intrigue (\"cloak and dagger\")'),
(12, 'Romance', 'A romance novel is a genre of fiction where the central plot revolves around the development of a romantic relationship between two people, typically with a focus on the emotional journey and an emotionally satisfying and optimistic ending, often a \"Happi');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`id_user`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'mari', 'm4rimolima@gmail.com', '$2y$10$IPfyrYPeQO5g69zVJZYGaOXuQGphz8wv2t.kMdcjR5RRT/kuEIo.W'),
(2, 'mari', 'mari@gmail.com', '$2y$10$/vVuY5G8wdRuXNJuUcjqtevGR6c35IYMlPprJe9Ufl4wyIKiNY5su');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_books`),
  ADD KEY `fk_books_category_id` (`id_category`);

--
-- Índices de tabela `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `books`
--
ALTER TABLE `books`
  MODIFY `id_books` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_books_category_id` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
