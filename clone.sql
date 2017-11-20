-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.25-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5174
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para twitter_clone
CREATE DATABASE IF NOT EXISTS `twitter_clone` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `twitter_clone`;

-- Copiando estrutura para tabela twitter_clone.tweet
CREATE TABLE IF NOT EXISTS `tweet` (
  `ID_TWEET` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) NOT NULL,
  `TWEET` varchar(140) NOT NULL,
  `DATA_INCLUSAO` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_TWEET`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela twitter_clone.tweet: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tweet` DISABLE KEYS */;
INSERT INTO `tweet` (`ID_TWEET`, `ID_USUARIO`, `TWEET`, `DATA_INCLUSAO`) VALUES
	(1, 6, 'testetet', '2017-11-19 02:01:46'),
	(2, 6, 'ola teste', '2017-11-19 02:13:31'),
	(3, 6, 'teste do claiton', '2017-11-19 03:13:33');
/*!40000 ALTER TABLE `tweet` ENABLE KEYS */;

-- Copiando estrutura para tabela twitter_clone.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela twitter_clone.usuarios: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `usuario`, `email`, `senha`) VALUES
	(1, 'claiton', 'claiton@londero.com.br', '123456'),
	(2, 'jose da silva', 'jose@gmail.com', '123456'),
	(3, 'Adão', 'adao@gmail.com', '123456'),
	(5, 'sdfsd', 'admin@teste.com', 'fsdfsdfsd'),
	(6, 'pedro', 'pedro@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
	(7, 'pedro', 'pedro@email.com.br', 'c36af63f87acebba1c23498809db7537'),
	(8, 'CLAITON LONDERO', 'claitonlc@gmail.com', '202cb962ac59075b964b07152d234b70');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Copiando estrutura para tabela twitter_clone.usuarios_seguidores
CREATE TABLE IF NOT EXISTS `usuarios_seguidores` (
  `id_usuario_seguidor` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `seguindo_id_usuario` int(11) NOT NULL,
  `data_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario_seguidor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela twitter_clone.usuarios_seguidores: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios_seguidores` DISABLE KEYS */;
INSERT INTO `usuarios_seguidores` (`id_usuario_seguidor`, `id_usuario`, `seguindo_id_usuario`, `data_registro`) VALUES
	(1, 6, 1, '2017-11-20 00:14:52'),
	(2, 6, 8, '2017-11-20 00:15:02');
/*!40000 ALTER TABLE `usuarios_seguidores` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
