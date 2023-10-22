-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Set-2023 às 13:40
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

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
-- Estrutura da tabela `permcargo`
--

CREATE TABLE `permcargo` (
  `idCargo` int(11) NOT NULL,
  `idPerm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postgrupo`
--

CREATE TABLE `postgrupo` (
  `idGrupo` int(11) NOT NULL,
  `idPostagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbbloqueado`
--

CREATE TABLE `tbbloqueado` (
  `idBloqueado` int(11) NOT NULL,
  `idPerfilBloqueador` int(11) NOT NULL,
  `idPerfilBloqueado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcargo`
--

CREATE TABLE `tbcargo` (
  `idCargo` int(11) NOT NULL,
  `nomeCargo` varchar(90) NOT NULL,
  `descCargo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcargos`
--

CREATE TABLE `tbcargos` (
  `idPerfil` int(11) NOT NULL,
  `idCargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcomentario`
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
-- Estrutura da tabela `tbconteudo`
--

CREATE TABLE `tbconteudo` (
  `idConteudo` int(11) NOT NULL,
  `idPostagem` int(11) NOT NULL,
  `arquivo` varchar(30) NOT NULL,
  `src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbgrupos`
--

CREATE TABLE `tbgrupos` (
  `idGrupo` int(11) NOT NULL,
  `idPerfilCriador` int(11) NOT NULL,
  `nomeGrupo` varchar(60) NOT NULL,
  `descGrupo` varchar(450) NOT NULL,
  `fotoGrupo` varchar(255) NOT NULL,
  `fotoBanner` varchar(255) NOT NULL,
  `dataCriação` date NOT NULL,
  `grupoPrivado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbperfil`
--

CREATE TABLE `tbperfil` (
  `idPerfil` int(11) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `apelido` varchar(50) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `idade` int(11) DEFAULT NULL,
  `fotoPerfil` varchar(255) DEFAULT NULL,
  `fotoBanner` varchar(255) DEFAULT NULL,
  `biografia` varchar(160) DEFAULT NULL,
  `perfilPrivado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tbperfil`
--

INSERT INTO `tbperfil` (`idPerfil`, `nome`, `apelido`, `email`, `senha`, `idade`, `fotoPerfil`, `fotoBanner`, `biografia`, `perfilPrivado`) VALUES
(1, 'Goes', NULL, 'gabrielgaldino205@outlook.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbperm`
--

CREATE TABLE `tbperm` (
  `idPerm` int(11) NOT NULL,
  `descPerm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpostagem`
--

CREATE TABLE `tbpostagem` (
  `idPostagem` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `Conteudo` tinyint(1) NOT NULL,
  `Grupo` tinyint(1) NOT NULL,
  `legenda` varchar(450) NOT NULL,
  `dataPost` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbreação`
--

CREATE TABLE `tbreação` (
  `idReação` int(11) NOT NULL,
  `idPostagem` int(11) DEFAULT NULL,
  `idComentario` int(11) DEFAULT NULL,
  `idPerfil` int(11) NOT NULL,
  `reação` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbseguidor`
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
-- Índices para tabela `permcargo`
--
ALTER TABLE `permcargo`
  ADD KEY `fk_idCargo` (`idCargo`),
  ADD KEY `fk_idPerm` (`idPerm`);

--
-- Índices para tabela `postgrupo`
--
ALTER TABLE `postgrupo`
  ADD KEY `fk_idGrupo` (`idGrupo`),
  ADD KEY `fk_idPostagem` (`idPostagem`);

--
-- Índices para tabela `tbbloqueado`
--
ALTER TABLE `tbbloqueado`
  ADD PRIMARY KEY (`idBloqueado`),
  ADD KEY `fk_Perfil_bloqueador` (`idPerfilBloqueador`),
  ADD KEY `fk_Perfil_bloqueado` (`idPerfilBloqueado`);

--
-- Índices para tabela `tbcargo`
--
ALTER TABLE `tbcargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Índices para tabela `tbcargos`
--
ALTER TABLE `tbcargos`
  ADD KEY `fk_idPerfil` (`idPerfil`),
  ADD KEY `fk_idCargo` (`idCargo`);

--
-- Índices para tabela `tbcomentario`
--
ALTER TABLE `tbcomentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `fk_idPostagem` (`idPostagem`),
  ADD KEY `fk_idPerfil` (`idPerfil`);

--
-- Índices para tabela `tbconteudo`
--
ALTER TABLE `tbconteudo`
  ADD PRIMARY KEY (`idConteudo`),
  ADD KEY `fk_idPostagem` (`idPostagem`);

--
-- Índices para tabela `tbgrupos`
--
ALTER TABLE `tbgrupos`
  ADD PRIMARY KEY (`idGrupo`),
  ADD KEY `fk_Perfil_Criador` (`idPerfilCriador`);

--
-- Índices para tabela `tbperfil`
--
ALTER TABLE `tbperfil`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Índices para tabela `tbperm`
--
ALTER TABLE `tbperm`
  ADD PRIMARY KEY (`idPerm`);

--
-- Índices para tabela `tbpostagem`
--
ALTER TABLE `tbpostagem`
  ADD PRIMARY KEY (`idPostagem`),
  ADD KEY `fk_idPerfil` (`idPerfil`);

--
-- Índices para tabela `tbreação`
--
ALTER TABLE `tbreação`
  ADD PRIMARY KEY (`idReação`),
  ADD KEY `fk_idPostagem` (`idPostagem`),
  ADD KEY `fk_idComentario` (`idComentario`),
  ADD KEY `fk_idPerfil` (`idPerfil`);

--
-- Índices para tabela `tbseguidor`
--
ALTER TABLE `tbseguidor`
  ADD PRIMARY KEY (`idSeguidor`),
  ADD KEY `fk_Perfil_Seguidor` (`idPerfilSeguidor`),
  ADD KEY `fk_Perfil_Seguido` (`idPerfilSeguido`);

--
-- AUTO_INCREMENT de tabelas despejadas
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
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbconteudo`
--
ALTER TABLE `tbconteudo`
  MODIFY `idConteudo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbgrupos`
--
ALTER TABLE `tbgrupos`
  MODIFY `idGrupo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbperfil`
--
ALTER TABLE `tbperfil`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbperm`
--
ALTER TABLE `tbperm`
  MODIFY `idPerm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbpostagem`
--
ALTER TABLE `tbpostagem`
  MODIFY `idPostagem` int(11) NOT NULL AUTO_INCREMENT;

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
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `permcargo`
--
ALTER TABLE `permcargo`
  ADD CONSTRAINT `permcargo_ibfk_1` FOREIGN KEY (`idPerm`) REFERENCES `tbperm` (`idPerm`),
  ADD CONSTRAINT `permcargo_ibfk_2` FOREIGN KEY (`idCargo`) REFERENCES `tbcargo` (`idCargo`);

--
-- Limitadores para a tabela `postgrupo`
--
ALTER TABLE `postgrupo`
  ADD CONSTRAINT `postgrupo_ibfk_1` FOREIGN KEY (`idGrupo`) REFERENCES `tbgrupos` (`idGrupo`),
  ADD CONSTRAINT `postgrupo_ibfk_2` FOREIGN KEY (`idPostagem`) REFERENCES `tbpostagem` (`idPostagem`);

--
-- Limitadores para a tabela `tbbloqueado`
--
ALTER TABLE `tbbloqueado`
  ADD CONSTRAINT `tbbloqueado_ibfk_1` FOREIGN KEY (`idPerfilBloqueador`) REFERENCES `tbperfil` (`idPerfil`),
  ADD CONSTRAINT `tbbloqueado_ibfk_2` FOREIGN KEY (`idPerfilBloqueado`) REFERENCES `tbperfil` (`idPerfil`);

--
-- Limitadores para a tabela `tbcargos`
--
ALTER TABLE `tbcargos`
  ADD CONSTRAINT `tbcargos_ibfk_1` FOREIGN KEY (`idCargo`) REFERENCES `tbcargo` (`idCargo`),
  ADD CONSTRAINT `tbcargos_ibfk_2` FOREIGN KEY (`idPerfil`) REFERENCES `tbperfil` (`idPerfil`);

--
-- Limitadores para a tabela `tbcomentario`
--
ALTER TABLE `tbcomentario`
  ADD CONSTRAINT `tbcomentario_ibfk_1` FOREIGN KEY (`idPostagem`) REFERENCES `tbpostagem` (`idPostagem`),
  ADD CONSTRAINT `tbcomentario_ibfk_2` FOREIGN KEY (`idPerfil`) REFERENCES `tbperfil` (`idPerfil`);

--
-- Limitadores para a tabela `tbconteudo`
--
ALTER TABLE `tbconteudo`
  ADD CONSTRAINT `tbconteudo_ibfk_1` FOREIGN KEY (`idPostagem`) REFERENCES `tbpostagem` (`idPostagem`);

--
-- Limitadores para a tabela `tbgrupos`
--
ALTER TABLE `tbgrupos`
  ADD CONSTRAINT `tbgrupos_ibfk_1` FOREIGN KEY (`idPerfilCriador`) REFERENCES `tbperfil` (`idPerfil`);

--
-- Limitadores para a tabela `tbpostagem`
--
ALTER TABLE `tbpostagem`
  ADD CONSTRAINT `tbpostagem_ibfk_1` FOREIGN KEY (`idPerfil`) REFERENCES `tbperfil` (`idPerfil`);

--
-- Limitadores para a tabela `tbreação`
--
ALTER TABLE `tbreação`
  ADD CONSTRAINT `tbreação_ibfk_1` FOREIGN KEY (`idPostagem`) REFERENCES `tbpostagem` (`idPostagem`),
  ADD CONSTRAINT `tbreação_ibfk_2` FOREIGN KEY (`idComentario`) REFERENCES `tbcomentario` (`idComentario`),
  ADD CONSTRAINT `tbreação_ibfk_3` FOREIGN KEY (`idPerfil`) REFERENCES `tbperfil` (`idPerfil`);

--
-- Limitadores para a tabela `tbseguidor`
--
ALTER TABLE `tbseguidor`
  ADD CONSTRAINT `tbseguidor_ibfk_1` FOREIGN KEY (`idPerfilSeguidor`) REFERENCES `tbperfil` (`idPerfil`),
  ADD CONSTRAINT `tbseguidor_ibfk_2` FOREIGN KEY (`idPerfilSeguido`) REFERENCES `tbperfil` (`idPerfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
