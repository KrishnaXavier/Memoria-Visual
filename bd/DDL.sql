-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Abr-2017 às 01:56
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Estrutura da tabela `trabalhos`
CREATE TABLE IF NOT EXISTS `trabalhos` (
  `idTrabalho` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(120) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `tipo` varchar(120) DEFAULT NULL,
  `tituloTrabalho` varchar(120) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idTrabalho`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- Estrutura da tabela `imagens`
CREATE TABLE IF NOT EXISTS `imagens` (
  `data` date DEFAULT NULL,
  `imagem` varchar(120) DEFAULT NULL,
  `titulo` varchar(120) DEFAULT NULL,
  `idImagem` int(11) NOT NULL AUTO_INCREMENT,
  `idTrabalho` int(11) DEFAULT NULL,
  `ativa` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idImagem`),
  KEY `idTrabalho` (`idTrabalho`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- Estrutura da tabela `noticias`
CREATE TABLE IF NOT EXISTS `noticias` (
  `idNoticia` int(11) NOT NULL AUTO_INCREMENT,
  `noticia` varchar(4000) DEFAULT NULL,
  `titulo` varchar(300) DEFAULT NULL,
  `imagem` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`idNoticia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- Estrutura da tabela `disciplinas`
CREATE TABLE IF NOT EXISTS `disciplinas` (
  `codigo` varchar(120) NOT NULL,
  `nomeDisciplina` varchar(300) DEFAULT NULL,
  `horaAulaSemanal` float DEFAULT NULL,
  `cargaHorarioTeoria` float DEFAULT NULL,
  `cargaHorarioPratica` float DEFAULT NULL,
  `cargaHorarioTotal` float DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `ativa` tinyint(1) DEFAULT NULL,
  `matriz` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- Estrutura da tabela `diciplinas_trabalhos`
CREATE TABLE IF NOT EXISTS `diciplinas_trabalhos` (
  `codigo` varchar(120) NOT NULL,
  `idTrabalho` int(11) NOT NULL,
  KEY `codigo` (`codigo`),
  KEY `idTrabalho` (`idTrabalho`)  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Estrutura da tabela `arquivos`
CREATE TABLE IF NOT EXISTS `arquivos` (
  `idArquivo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) DEFAULT NULL,
  `tipo` varchar(120) DEFAULT NULL,
  `arquivo` varchar(120) DEFAULT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`idArquivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- Estrutura da tabela `documentos`
CREATE TABLE IF NOT EXISTS `documentos` (
  `idDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idDocumento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- Estrutura da tabela `documentos_arquivos`
CREATE TABLE IF NOT EXISTS `documentos_arquivos` (
  `idDocumento` int(11) DEFAULT NULL,
  `idArquivo` int(11) DEFAULT NULL,
  KEY `idDocumento` (`idDocumento`),
  KEY `idArquivo` (`idArquivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Estrutura da tabela `eventos`
CREATE TABLE IF NOT EXISTS `eventos` (
  `idEvento` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `local` varchar(120) DEFAULT NULL,
  `infsAdicionais` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`idEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- Estrutura da tabela `noticias_tag`
CREATE TABLE IF NOT EXISTS `noticias_tag` (
  `idTag` int(11) NOT NULL,
  `idNoticia` int(11) NOT NULL,
  KEY `idTag` (`idTag`),
  KEY `idNoticia` (`idNoticia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Estrutura da tabela `professores`
CREATE TABLE IF NOT EXISTS `professores` (
  `idProfessor` int(11) NOT NULL AUTO_INCREMENT,
  `lattes` varchar(120) DEFAULT NULL,
  `nome` varchar(120) DEFAULT NULL,
  `imagem` varchar(120) DEFAULT NULL,
  `areasInteresse` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idProfessor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- Estrutura da tabela `tags`
CREATE TABLE IF NOT EXISTS `tags` (
  `idTag` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(120) NOT NULL,
  PRIMARY KEY (`idTag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- Estrutura da tabela `usuarios`
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(240) NOT NULL,
  `senha` varchar(240) NOT NULL,
  `email` varchar(240) NOT NULL,
  `criadoEm` date NOT NULL,
  `modificadoEm` date NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- Limitadores para a tabela `diciplinas_trabalhos`
ALTER TABLE `diciplinas_trabalhos`
  ADD CONSTRAINT `diciplinas_trabalhos_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `disciplinas` (`codigo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  ADD CONSTRAINT `diciplinas_trabalhos_ibfk_2` FOREIGN KEY (`idTrabalho`) REFERENCES `trabalhos` (`idTrabalho`)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

-- Limitadores para a tabela `documentos_arquivos`
ALTER TABLE `documentos_arquivos`
  ADD CONSTRAINT `documentos_arquivos_ibfk_1` FOREIGN KEY (`idDocumento`) REFERENCES `documentos` (`idDocumento`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  ADD CONSTRAINT `documentos_arquivos_ibfk_2` FOREIGN KEY (`idArquivo`) REFERENCES `arquivos` (`idArquivo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

-- Limitadores para a tabela `imagens`
ALTER TABLE `imagens`
  ADD CONSTRAINT `imagens_ibfk_1` FOREIGN KEY (`idTrabalho`) REFERENCES `trabalhos` (`idTrabalho`)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

-- Limitadores para a tabela `noticias_tag`
ALTER TABLE `noticias_tag`
  ADD CONSTRAINT `noticias_tag_ibfk_1` FOREIGN KEY (`idTag`) REFERENCES `tags` (`idTag`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  ADD CONSTRAINT `noticias_tag_ibfk_2` FOREIGN KEY (`idNoticia`) REFERENCES `noticias` (`idNoticia`)
    ON DELETE CASCADE
    ON UPDATE CASCADE;