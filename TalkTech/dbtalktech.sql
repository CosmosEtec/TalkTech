-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/11/2023 às 23:22
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
  `comentario` varchar(225) NOT NULL,
  `dataComentario` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(8, 56, 16, 'png', '../user/Goes/posts/56.png'),
(9, 58, 16, 'jpg', '../user/Goes/posts/58.jpg');

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
(14, 'UserTeste', NULL, 'Teste@Teste', '4d750439e3f39848345c6ef74ef3d719e34e7111', 'user/UserTeste/fotoperfil.png', NULL, 0),
(15, 'LerO', NULL, 'Lero@Lero', '4d750439e3f39848345c6ef74ef3d719e34e7111', 'user/LerO/fotoperfil.png', NULL, 0),
(16, 'Goes', NULL, 'gabrielgaldino205@outlook.com', '01391009769ac79e51e75a3bd6821ac71564d7f7', 'user/Goes/fotoperfil.png', NULL, 0);

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
(55, 16, 0, 'Eu Amo programar :D ', '2023-11-20 23:01:33'),
(56, 16, 1, 'DARE', '2023-11-20 23:10:17'),
(57, 16, 0, 'Só texto', '2023-11-20 23:13:17'),
(58, 16, 1, '', '2023-11-20 23:16:50');

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
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbconteudo`
--
ALTER TABLE `tbconteudo`
  MODIFY `idConteudo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbperfil`
--
ALTER TABLE `tbperfil`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tbperm`
--
ALTER TABLE `tbperm`
  MODIFY `idPerm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbpostagem`
--
ALTER TABLE `tbpostagem`
  MODIFY `idPostagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `tbreação`
--
ALTER TABLE `tbreação`
  MODIFY `idReação` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbseguidor`
--
ALTER TABLE `tbseguidor`
  MODIFY `idSeguidor` int(11) NOT NULL AUTO_INCREMENT;

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
