-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema cooperval
--

CREATE DATABASE IF NOT EXISTS cooperval;
USE cooperval;

--
-- Definition of table `adm`
--

DROP TABLE IF EXISTS `adm`;
CREATE TABLE `adm` (
  `idadm` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(75) NOT NULL,
  `sobrenome` varchar(75) NOT NULL,
  `nascimento` date NOT NULL,
  `celular` varchar(16) DEFAULT NULL,
  `cpf` varchar(15) NOT NULL,
  `email` varchar(145) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idadm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adm`
--

/*!40000 ALTER TABLE `adm` DISABLE KEYS */;
INSERT INTO `adm` (`idadm`,`nome`,`sobrenome`,`nascimento`,`celular`,`cpf`,`email`,`senha`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,'Marco','Nobre','2003-05-23','(33) 98866-1359','12345678977','marco@gmail.com','$2y$12$S8Cxvs7FVm2h7YECziyLC.1.3kcwnEayB3GZfTM.1f9RGt/Vhyc/O','0000-00-00 00:00:00','2024-05-06 13:14:04','A'),
 (2,'Arthur','Prates','0001-01-01','(20) 94002-8922','11111111111','ademir@gmail.com','$2y$12$S8Cxvs7FVm2h7YECziyLC.1.3kcwnEayB3GZfTM.1f9RGt/Vhyc/O','0000-00-00 00:00:00','2024-05-06 13:14:04','A');
/*!40000 ALTER TABLE `adm` ENABLE KEYS */;


--
-- Definition of table `agendamentocurso`
--

DROP TABLE IF EXISTS `agendamentocurso`;
CREATE TABLE `agendamentocurso` (
  `idagendamentoCurso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `curso_idcurso` int(10) unsigned NOT NULL,
  `calendario_idcalendario` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idagendamentoCurso`,`curso_idcurso`,`calendario_idcalendario`),
  KEY `curso_has_calendario_FKIndex1` (`curso_idcurso`),
  KEY `curso_has_calendario_FKIndex2` (`calendario_idcalendario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agendamentocurso`
--

/*!40000 ALTER TABLE `agendamentocurso` DISABLE KEYS */;
/*!40000 ALTER TABLE `agendamentocurso` ENABLE KEYS */;


--
-- Definition of table `agendamentoturma`
--

DROP TABLE IF EXISTS `agendamentoturma`;
CREATE TABLE `agendamentoturma` (
  `idagendamentoTurma` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `turma_idturma` int(10) unsigned NOT NULL,
  `curso_idcurso` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idagendamentoTurma`,`turma_idturma`,`curso_idcurso`),
  KEY `turma_has_curso_FKIndex1` (`turma_idturma`),
  KEY `turma_has_curso_FKIndex2` (`curso_idcurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agendamentoturma`
--

/*!40000 ALTER TABLE `agendamentoturma` DISABLE KEYS */;
/*!40000 ALTER TABLE `agendamentoturma` ENABLE KEYS */;


--
-- Definition of table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE `aluno` (
  `idaluno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idturma` int(10) unsigned NOT NULL DEFAULT 0,
  `nomeAluno` varchar(75) NOT NULL,
  `sobrenomeAluno` varchar(75) NOT NULL,
  `nascimentoAluno` date NOT NULL,
  `cpfAluno` varchar(15) NOT NULL,
  `emailAluno` varchar(145) NOT NULL,
  `celularAluno` varchar(16) NOT NULL,
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idaluno`,`idturma`),
  KEY `FK_aluno_turma` (`idturma`),
  CONSTRAINT `FK_aluno_turma` FOREIGN KEY (`idturma`) REFERENCES `turma` (`idturma`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aluno`
--

/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` (`idaluno`,`idturma`,`nomeAluno`,`sobrenomeAluno`,`nascimentoAluno`,`cpfAluno`,`emailAluno`,`celularAluno`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,1,'Luciano','Coelho','2000-01-01','12345678977','luciano@gmail.com','32544879844','0000-00-00 00:00:00','2024-05-04 17:35:09','A');
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;


--
-- Definition of table `calendario`
--

DROP TABLE IF EXISTS `calendario`;
CREATE TABLE `calendario` (
  `idcalendario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcurso` int(10) unsigned NOT NULL DEFAULT 0,
  `idturma` int(10) unsigned NOT NULL DEFAULT 0,
  `titulo` varchar(200) NOT NULL,
  `cor` varchar(20) NOT NULL,
  `dataIn` varchar(40) NOT NULL,
  `dataEnd` varchar(40) NOT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcalendario`,`idcurso`,`idturma`),
  KEY `FK_calendario_turma` (`idturma`),
  KEY `FK_calendario_curso` (`idcurso`),
  CONSTRAINT `FK_calendario_curso` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`idcurso`),
  CONSTRAINT `FK_calendario_turma` FOREIGN KEY (`idturma`) REFERENCES `turma` (`idturma`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calendario`
--

/*!40000 ALTER TABLE `calendario` DISABLE KEYS */;
INSERT INTO `calendario` (`idcalendario`,`idcurso`,`idturma`,`titulo`,`cor`,`dataIn`,`dataEnd`,`comentario`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (12,1,1,'dasdf','purple','2024-05-07T13:12','2024-05-26T13:12','yyy','2024-05-07 13:12:15','2024-05-07 13:12:36','A');
/*!40000 ALTER TABLE `calendario` ENABLE KEYS */;


--
-- Definition of table `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE `curso` (
  `idcurso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomeCurso` varchar(200) DEFAULT NULL,
  `localCurso` varchar(100) DEFAULT NULL,
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NULL DEFAULT NULL,
  `ativo` char(1) DEFAULT 'A',
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `curso`
--

/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` (`idcurso`,`nomeCurso`,`localCurso`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,'Dev','GV',NULL,NULL,'A');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;


--
-- Definition of table `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE `turma` (
  `idturma` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numeroTurma` varchar(45) NOT NULL,
  `nomeTurma` varchar(75) NOT NULL,
  `codigoTurma` varchar(15) NOT NULL,
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idturma`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `turma`
--

/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
INSERT INTO `turma` (`idturma`,`numeroTurma`,`nomeTurma`,`codigoTurma`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,'Turma 03','Manutencao','0001000','0000-00-00 00:00:00','2024-05-04 17:28:42','A');
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
