-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/12/2023 às 03:37
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbtalktech`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `permcargo`
--

CREATE TABLE `permcargo` (
  `idCargo` int(11) NOT NULL,
  `idPerm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbbloqueado`
--

CREATE TABLE `tbbloqueado` (
  `idBloqueado` int(11) NOT NULL,
  `idPerfilBloqueador` int(11) NOT NULL,
  `idPerfilBloqueado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcargo`
--

CREATE TABLE `tbcargo` (
  `idCargo` int(11) NOT NULL,
  `nomeCargo` varchar(90) NOT NULL,
  `descCargo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcargos`
--

CREATE TABLE `tbcargos` (
  `idPerfil` int(11) NOT NULL,
  `idCargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcomentario`
--

CREATE TABLE `tbcomentario` (
  `idComentario` int(11) NOT NULL,
  `idPostagem` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `comentario` varchar(600) NOT NULL,
  `dataComentario` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbcomentario`
--

INSERT INTO `tbcomentario` (`idComentario`, `idPostagem`, `idPerfil`, `comentario`, `dataComentario`) VALUES
(19, 85, 26, 'Tenho vontade de aprender a utilizar melhor ele no meu dia a dia', '2023-12-06'),
(20, 86, 25, 'já estou com saudades de SE e montar o Winguinho! ', '2023-12-06'),
(21, 94, 25, 'Sim, mas felizmente não foi pra frente!!!', '2023-12-06'),
(22, 94, 27, 'Ainda bem que não deu certo, mó medo de ser cobrado por hora jogada kkk', '2023-12-06'),
(23, 96, 28, 'Amigo!! vou dar uma olhada depois', '2023-12-06'),
(24, 85, 28, 'Uso muito para fazer resumos !!', '2023-12-06'),
(25, 99, 25, 'Sou péssimo com front ', '2023-12-06'),
(26, 99, 29, 'Eu salvo o Goes no front toda tarefa de PW!! kkkkk', '2023-12-06'),
(27, 93, 29, 'tão viciado que vai começar a fazer jogo tambem kkk', '2023-12-06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbconteudo`
--

CREATE TABLE `tbconteudo` (
  `idConteudo` int(11) NOT NULL,
  `idPostagem` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `arquivo` varchar(30) NOT NULL,
  `src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbconteudo`
--

INSERT INTO `tbconteudo` (`idConteudo`, `idPostagem`, `idPerfil`, `arquivo`, `src`) VALUES
(21, 85, 23, 'png', '../user/alinemendonca/posts/85.png'),
(22, 86, 23, 'png', '../user/alinemendonca/posts/86.png'),
(23, 93, 25, 'png', '../user/SrGoes/posts/93.png'),
(24, 96, 27, 'png', '../user/Caio/posts/96.png'),
(26, 99, 28, 'png', '../user/Yolanda/posts/99.png'),
(27, 101, 29, 'png', '../user/Lorena/posts/101.png'),
(28, 102, 30, 'jpg', '../user/Inina/posts/102.jpg'),
(29, 103, 30, 'jpg', '../user/Inina/posts/103.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbperfil`
--

CREATE TABLE `tbperfil` (
  `idPerfil` int(11) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `apelido` varchar(50) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `fotoPerfil` varchar(255) DEFAULT NULL,
  `biografia` varchar(160) DEFAULT NULL,
  `perfilPrivado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbperfil`
--

INSERT INTO `tbperfil` (`idPerfil`, `nome`, `apelido`, `email`, `senha`, `fotoPerfil`, `biografia`, `perfilPrivado`) VALUES
(23, 'alinemendonca', 'Prof Aline', 'profalinemendonca@gmail.com', '8278bc2ab97087aaa05a705e9c5d9dfa392b985b', 'user/alinemendonca/fotoperfil.png', 'Sou Prof. na área de tecnologia há 20 anos', 0),
(25, 'SrGoes', 'Steve', 'gabrielgaldino205@outlook.com', '01391009769ac79e51e75a3bd6821ac71564d7f7', 'user/SrGoes/fotoperfil.jpg', ':D ', 0),
(26, 'Eduardo', 'Dudu', 'eduardoalvesazevedo12@gmail.com', '4d750439e3f39848345c6ef74ef3d719e34e7111', 'user/Eduardo/fotoperfil.jpg', 'Estudo na ETEC CT\r\nIdade 18\r\n', 0),
(27, 'Caio', NULL, 'caiorasgabucho@gmail.com', '4d750439e3f39848345c6ef74ef3d719e34e7111', 'user/Caio/fotoperfil.jpg', 'Tenho 18 Anos\r\nSP-Capital', 0),
(28, 'Yolanda', 'Landa', 'narutozx222@gmail.com', '4d750439e3f39848345c6ef74ef3d719e34e7111', 'user/Yolanda/fotoperfil.jpg', 'Idade: 18\r\nSou da CT\r\n', 0),
(29, 'Lorena', 'Lolo', 'lorenaarj0@gmail.com', '4d750439e3f39848345c6ef74ef3d719e34e7111', 'user/Lorena/fotoperfil.jpg', 'Tenho 18 Anos\r\nSou da ETEC CT\r\nSou Fullstack', 0),
(30, 'Inina', 'Isis', 'inina2005@gmail.com', '4d750439e3f39848345c6ef74ef3d719e34e7111', 'user/Inina/fotoperfil.jpg', 'Assistente em Teltec Solutions São Paulo\r\n', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbperm`
--

CREATE TABLE `tbperm` (
  `idPerm` int(11) NOT NULL,
  `descPerm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbpostagem`
--

CREATE TABLE `tbpostagem` (
  `idPostagem` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `Conteudo` tinyint(1) NOT NULL,
  `legenda` varchar(450) NOT NULL,
  `dataPost` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbpostagem`
--

INSERT INTO `tbpostagem` (`idPostagem`, `idPerfil`, `Conteudo`, `legenda`, `dataPost`) VALUES
(85, 23, 1, 'Como o chat GPT poderá impactar na carreira de desenvolvedor nós próximos anos', '2023-11-30 01:12:46'),
(86, 23, 1, 'Como a robótica vem se tornando primordial na automatização de processos \r\n', '2023-11-30 01:16:50'),
(93, 25, 1, 'Recomendo d+ o Game Maker pra quem quer começar a desenvolver um game!\r\n', '2023-12-06 02:06:09'),
(94, 26, 0, 'Mano, vocês viram que estão querendo fazer ser pago a Unreal Engine?', '2023-12-06 02:09:25'),
(96, 27, 1, 'Recomendo muito o Sass, bem mais facil de estilizar as paginas!', '2023-12-06 02:32:35'),
(99, 28, 1, 'Codando!!', '2023-12-06 02:56:02'),
(101, 29, 1, 'já viram esse novo navegador?? ele tem diversas funções para devs', '2023-12-06 03:11:18'),
(102, 30, 1, 'Iai, gostou? Vem!', '2023-12-06 03:21:29'),
(103, 30, 1, 'Vi uma matéria do G1 hoje que dizia que tecnologia em Análise e Desenvolvimento de Sistemas, é a profissão do momento!', '2023-12-06 03:23:50');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbreação`
--

CREATE TABLE `tbreação` (
  `idReação` int(11) NOT NULL,
  `idPostagem` int(11) DEFAULT NULL,
  `idComentario` int(11) DEFAULT NULL,
  `idPerfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbreação`
--

INSERT INTO `tbreação` (`idReação`, `idPostagem`, `idComentario`, `idPerfil`) VALUES
(73, 86, NULL, 26),
(74, 93, NULL, 26),
(75, 94, NULL, 25),
(76, 86, NULL, 25),
(77, 85, NULL, 25),
(79, 94, NULL, 27),
(80, 93, NULL, 27),
(81, 86, NULL, 27),
(82, 96, NULL, 27),
(83, 99, NULL, 28),
(84, 96, NULL, 28),
(85, 94, NULL, 28),
(86, 93, NULL, 28),
(87, 86, NULL, 28),
(88, 85, NULL, 28),
(89, 99, NULL, 25),
(90, 99, NULL, 29),
(91, 93, NULL, 29),
(92, 96, NULL, 29),
(93, 86, NULL, 29),
(94, 85, NULL, 29),
(95, 102, NULL, 30);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbseguidor`
--

CREATE TABLE `tbseguidor` (
  `idSeguidor` int(11) NOT NULL,
  `idPerfilSeguidor` int(11) NOT NULL,
  `idPerfilSeguido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbseguidor`
--

INSERT INTO `tbseguidor` (`idSeguidor`, `idPerfilSeguidor`, `idPerfilSeguido`) VALUES
(21, 28, 23),
(22, 29, 25),
(23, 29, 23),
(24, 30, 29),
(25, 30, 25),
(26, 30, 23);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `permcargo`
--
ALTER TABLE `permcargo`
  ADD KEY `fk_idCargo` (`idCargo`),
  ADD KEY `fk_idPerm` (`idPerm`);

--
-- Índices de tabela `tbbloqueado`
--
ALTER TABLE `tbbloqueado`
  ADD PRIMARY KEY (`idBloqueado`),
  ADD KEY `fk_Perfil_bloqueador` (`idPerfilBloqueador`),
  ADD KEY `fk_Perfil_bloqueado` (`idPerfilBloqueado`);

--
-- Índices de tabela `tbcargo`
--
ALTER TABLE `tbcargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Índices de tabela `tbcargos`
--
ALTER TABLE `tbcargos`
  ADD KEY `fk_idPerfil` (`idPerfil`),
  ADD KEY `fk_idCargo` (`idCargo`);

--
-- Índices de tabela `tbcomentario`
--
ALTER TABLE `tbcomentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `fk_idPostagem` (`idPostagem`),
  ADD KEY `fk_idPerfil` (`idPerfil`);

--
-- Índices de tabela `tbconteudo`
--
ALTER TABLE `tbconteudo`
  ADD PRIMARY KEY (`idConteudo`),
  ADD KEY `fk_idPostagem` (`idPostagem`),
  ADD KEY `fk_idPerfil` (`idPerfil`);

--
-- Índices de tabela `tbperfil`
--
ALTER TABLE `tbperfil`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Índices de tabela `tbperm`
--
ALTER TABLE `tbperm`
  ADD PRIMARY KEY (`idPerm`);

--
-- Índices de tabela `tbpostagem`
--
ALTER TABLE `tbpostagem`
  ADD PRIMARY KEY (`idPostagem`),
  ADD KEY `fk_idPerfil` (`idPerfil`);

--
-- Índices de tabela `tbreação`
--
ALTER TABLE `tbreação`
  ADD PRIMARY KEY (`idReação`),
  ADD KEY `fk_idPostagem` (`idPostagem`),
  ADD KEY `fk_idComentario` (`idComentario`),
  ADD KEY `fk_idPerfil` (`idPerfil`);

--
-- Índices de tabela `tbseguidor`
--
ALTER TABLE `tbseguidor`
  ADD PRIMARY KEY (`idSeguidor`),
  ADD KEY `fk_Perfil_Seguidor` (`idPerfilSeguidor`),
  ADD KEY `fk_Perfil_Seguido` (`idPerfilSeguido`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbbloqueado`
--
ALTER TABLE `tbbloqueado`
  MODIFY `idBloqueado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcargo`
--
ALTER TABLE `tbcargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcomentario`
--
ALTER TABLE `tbcomentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `tbconteudo`
--
ALTER TABLE `tbconteudo`
  MODIFY `idConteudo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tbperfil`
--
ALTER TABLE `tbperfil`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `tbperm`
--
ALTER TABLE `tbperm`
  MODIFY `idPerm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbpostagem`
--
ALTER TABLE `tbpostagem`
  MODIFY `idPostagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de tabela `tbreação`
--
ALTER TABLE `tbreação`
  MODIFY `idReação` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de tabela `tbseguidor`
--
ALTER TABLE `tbseguidor`
  MODIFY `idSeguidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `permcargo`
--
ALTER TABLE `permcargo`
  ADD CONSTRAINT `permcargo_ibfk_1` FOREIGN KEY (`idPerm`) REFERENCES `tbperm` (`idPerm`),
  ADD CONSTRAINT `permcargo_ibfk_2` FOREIGN KEY (`idCargo`) REFERENCES `tbcargo` (`idCargo`);

--
-- Restrições para tabelas `tbbloqueado`
--
ALTER TABLE `tbbloqueado`
  ADD CONSTRAINT `tbbloqueado_ibfk_1` FOREIGN KEY (`idPerfilBloqueador`) REFERENCES `tbperfil` (`idPerfil`),
  ADD CONSTRAINT `tbbloqueado_ibfk_2` FOREIGN KEY (`idPerfilBloqueado`) REFERENCES `tbperfil` (`idPerfil`);

--
-- Restrições para tabelas `tbcargos`
--
ALTER TABLE `tbcargos`
  ADD CONSTRAINT `tbcargos_ibfk_1` FOREIGN KEY (`idCargo`) REFERENCES `tbcargo` (`idCargo`),
  ADD CONSTRAINT `tbcargos_ibfk_2` FOREIGN KEY (`idPerfil`) REFERENCES `tbperfil` (`idPerfil`);

--
-- Restrições para tabelas `tbcomentario`
--
ALTER TABLE `tbcomentario`
  ADD CONSTRAINT `tbcomentario_ibfk_1` FOREIGN KEY (`idPostagem`) REFERENCES `tbpostagem` (`idPostagem`),
  ADD CONSTRAINT `tbcomentario_ibfk_2` FOREIGN KEY (`idPerfil`) REFERENCES `tbperfil` (`idPerfil`);

--
-- Restrições para tabelas `tbconteudo`
--
ALTER TABLE `tbconteudo`
  ADD CONSTRAINT `tbconteudo_ibfk_1` FOREIGN KEY (`idPostagem`) REFERENCES `tbpostagem` (`idPostagem`),
  ADD CONSTRAINT `tbconteudo_ibfk_2` FOREIGN KEY (`idPerfil`) REFERENCES `tbperfil` (`idPerfil`);

--
-- Restrições para tabelas `tbpostagem`
--
ALTER TABLE `tbpostagem`
  ADD CONSTRAINT `tbpostagem_ibfk_1` FOREIGN KEY (`idPerfil`) REFERENCES `tbperfil` (`idPerfil`);

--
-- Restrições para tabelas `tbreação`
--
ALTER TABLE `tbreação`
  ADD CONSTRAINT `tbreação_ibfk_1` FOREIGN KEY (`idPostagem`) REFERENCES `tbpostagem` (`idPostagem`),
  ADD CONSTRAINT `tbreação_ibfk_2` FOREIGN KEY (`idComentario`) REFERENCES `tbcomentario` (`idComentario`),
  ADD CONSTRAINT `tbreação_ibfk_3` FOREIGN KEY (`idPerfil`) REFERENCES `tbperfil` (`idPerfil`);

--
-- Restrições para tabelas `tbseguidor`
--
ALTER TABLE `tbseguidor`
  ADD CONSTRAINT `tbseguidor_ibfk_1` FOREIGN KEY (`idPerfilSeguidor`) REFERENCES `tbperfil` (`idPerfil`),
  ADD CONSTRAINT `tbseguidor_ibfk_2` FOREIGN KEY (`idPerfilSeguido`) REFERENCES `tbperfil` (`idPerfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
