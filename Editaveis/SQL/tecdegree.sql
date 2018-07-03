-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 02/07/2018 às 21:32
-- Versão do servidor: 5.7.22-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tecdegree`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `campus`
--

CREATE TABLE `campus` (
  `id` int(6) UNSIGNED NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `id_instituicao` int(6) UNSIGNED DEFAULT NULL,
  `aprovado` tinyint(1) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `campus`
--

INSERT INTO `campus` (`id`, `cidade`, `estado`, `telefone`, `id_instituicao`, `aprovado`, `endereco`, `nome`, `descricao`) VALUES
(3, 'presidente prudente', 'SP', '(018) 3229-5909', 7, NULL, 'R. Roberto Símonsen, 305 - Centro Educacional', 'UNESP - presidente prudente', NULL),
(4, 'presidente prudente', 'SP', '(18) 3229-2025', 8, NULL, 'Km 572, SP-270 - Bairro Limoeiro', 'UNOESTE - presidente prudente', NULL),
(5, 'Bauru', 'SP', '(014)3103-6008', 7, NULL, 'Av Eng Luiz Edmundo Carrijo Coube, nº 14-01. Bairro: Vargem Limpa', 'UNESP - Bauru', 'O Campus de Bauru é um dos mais novos incorporados à Unesp, nasceu da encampação dos cursos mantidos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `id` int(6) UNSIGNED NOT NULL,
  `periodo` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `duracao` varchar(30) NOT NULL,
  `avaliacao_enade` varchar(50) DEFAULT NULL,
  `id_campus` int(6) UNSIGNED DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `aprovado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `curso`
--

INSERT INTO `curso` (`id`, `periodo`, `tipo`, `duracao`, `avaliacao_enade`, `id_campus`, `titulo`, `aprovado`) VALUES
(2, 'Vespertino-Noturno', 'Ciência da Computação', '4', '5', 3, NULL, 1),
(3, 'Integral', 'Ciência da Computação', '5', '4', 4, NULL, 1),
(4, 'Noturno', 'Sistemas de Informação', '4', '5', 4, NULL, 1),
(5, 'Integral', 'Ciência da Computação', '4', '4', 5, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `instituicao`
--

CREATE TABLE `instituicao` (
  `id` int(6) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sigla` varchar(30) NOT NULL,
  `categoria_adm` varchar(100) DEFAULT NULL,
  `site` varchar(100) DEFAULT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `aprovado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `instituicao`
--

INSERT INTO `instituicao` (`id`, `nome`, `sigla`, `categoria_adm`, `site`, `descricao`, `aprovado`) VALUES
(7, 'Universidade Estadual Paulista', 'UNESP', 'Publica - Estadual', 'https://www2.unesp.br/', 'Universidade Estadual Paulista "Júlio de Mesquita Filho" (UNESP) é uma universidade pública brasileira, com atuação no ensino, na pesquisa e na extensão de serviços à comunidade. A instituição é uma das quatro universidades mantidas pelo governo do estado de São Paulo, ao lado da Universidade de São Paulo (USP), Universidade Estadual de Campinas (Unicamp) e da Universidade Virtual do Estado de São Paulo (Univesp).', 1),
(8, 'Universidade do Oeste Paulista', 'UNOESTE', 'Privada - Com fins lucrativos', 'http://www.unoeste.br/', 'A Universidade do Oeste Paulista nasceu do sonho dos professores Agripino de Oliveira Lima Filho e Ana Cardoso Maia de Oliveira Lima para oferecer ensino superior de qualidade em Presidente Prudente e região. Isso se tornou realidade em 1972, quando foi criada a primeira faculdade da Associação Prudentina de Educação e Cultura (Apec), a Faculdade de Artes, Ciências, Letras e Educação de Presidente Prudente (Faclepp). O primeiro vestibular foi realizado e 536 candidatos se inscreveram para as 350 vagas ofertadas. A aula inaugural aconteceu provisoriamente no Colégio Cristo Rei, no dia 21 de outubro deste mesmo ano.', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(6) UNSIGNED NOT NULL,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `nivel` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `email`, `senha`, `nivel`) VALUES
(1, 'felipe', 'tanji', 'felipetanji@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'teste teste', '', 'teste@teste', 'e10adc3949ba59abbe56e057f20f883e', 0);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idinstituicao` (`id_instituicao`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idcampus` (`id_campus`);

--
-- Índices de tabela `instituicao`
--
ALTER TABLE `instituicao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `campus`
--
ALTER TABLE `campus`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `instituicao`
--
ALTER TABLE `instituicao`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `campus`
--
ALTER TABLE `campus`
  ADD CONSTRAINT `fk_idinstituicao` FOREIGN KEY (`id_instituicao`) REFERENCES `instituicao` (`id`);

--
-- Restrições para tabelas `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_idcampus` FOREIGN KEY (`id_campus`) REFERENCES `campus` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
