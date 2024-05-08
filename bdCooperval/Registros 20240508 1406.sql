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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adm`
--

/*!40000 ALTER TABLE `adm` DISABLE KEYS */;
INSERT INTO `adm` (`idadm`,`nome`,`sobrenome`,`nascimento`,`celular`,`cpf`,`email`,`senha`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (2,'Arthur','Prates','0001-01-01','(20) 94002-8922','11111111111','ademir@gmail.com','$2y$12$UW.Ras1s1553g0KRojkHout.8lvjIZEsQ6g0Cj9w27UUtsi2dzAHO','0000-00-00 00:00:00','2024-05-08 13:42:20','A'),
 (3,'Marco','Oliveira','2005-04-05','(31) 3213-2156','191.816.516-45','Marco@gmail.com','$2y$12$Xr8G5M1Rh0MY5k3mO2e3IuuAOSFANg7siEVuVU0CfOpuE7RifDPBW','2024-05-08 14:05:22','2024-05-08 14:05:22','A');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aluno`
--

/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` (`idaluno`,`idturma`,`nomeAluno`,`sobrenomeAluno`,`nascimentoAluno`,`cpfAluno`,`emailAluno`,`celularAluno`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,2,'Luciano','Coelho','2000-01-01','12345678977','luciano@gmail.com','32544879844','0000-00-00 00:00:00','2024-05-08 15:41:52','A'),
 (2,2,'Fernando','Lopes','2000-05-02','345.353.453-45','Fernado@outlook.com','(33) 9543-5345','2024-05-08 14:00:28','2024-05-08 15:55:09','A'),
 (3,1,'Marco','Braga','1984-05-15','143.566.346-43','Marco@hotmail.com','(23) 9987-5532','2024-05-08 14:01:22','2024-05-08 14:01:22','A'),
 (4,2,'Junior','Rodrigues Campos','2000-09-20','124.135.622-36','Junior@gmail.com','(21) 9999-6543','2024-05-08 14:02:11','2024-05-08 15:50:54','A'),
 (5,3,'Ruan','Santos','2003-03-20','598.132.164-81','Ruan@gmail.com','(45) 9911-8612','2024-05-08 14:02:11','2024-05-08 15:56:15','A');
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calendario`
--

/*!40000 ALTER TABLE `calendario` DISABLE KEYS */;
INSERT INTO `calendario` (`idcalendario`,`idcurso`,`idturma`,`titulo`,`cor`,`dataIn`,`dataEnd`,`comentario`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (17,1,2,'Jandaia/Saude Mental','purple','2024-05-08T09:00','2024-05-08T18:00','Nenhum comentário adicionado!','2024-05-08 16:25:21','2024-05-08 16:32:54','A'),
 (18,2,1,'Bom Sucesso/ Motoristas','red','2024-05-15T09:00','2024-05-16T18:00','URGENTE','2024-05-08 16:26:26','2024-05-08 16:33:18','A'),
 (19,3,3,'Marumbi/Info','green','2024-05-24T09:00','2024-05-24T18:00','Nenhum comentário adicionado!','2024-05-08 16:27:55','2024-05-08 16:31:12','A'),
 (20,8,3,'Marumbi/Ed.Financeira','black','2024-05-27T09:00','2024-05-28T18:00','Nenhum comentário adicionado!','2024-05-08 16:29:04','2024-05-08 16:31:53','A');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `curso`
--

/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` (`idcurso`,`nomeCurso`,`localCurso`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,'Saúde Mental','Associval',NULL,NULL,'A'),
 (2,'Motoristas','Logística','2024-05-08 13:52:46',NULL,'A'),
 (3,'Informática','RH','2024-05-08 13:53:06',NULL,'A'),
 (8,'Educação Financeira','Caldeiraria','2024-05-08 16:29:28',NULL,'A');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `turma`
--

/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
INSERT INTO `turma` (`idturma`,`numeroTurma`,`nomeTurma`,`codigoTurma`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,'Turma 03','MOTORISTAS Bom Sucesso','1007','0000-00-00 00:00:00','2024-05-08 16:20:49','A'),
 (2,'Turma 02','MOTORISTAS Jandaía do Sul','1009','2024-05-08 13:21:07','2024-05-08 16:21:22','A'),
 (3,'Turma 01','MOTORISTAS Marumbi','1018','2024-05-08 15:55:48','2024-05-08 16:21:47','A');
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
