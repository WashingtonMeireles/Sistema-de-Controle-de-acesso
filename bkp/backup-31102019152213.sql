DROP TABLE IF EXISTS acessos;

CREATE TABLE `acessos` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `rg` varchar(12) NOT NULL,
  `identificador` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `hora` varchar(8) NOT NULL,
  `bloco` varchar(10) NOT NULL,
  `apto` varchar(10) NOT NULL,
  `autorizado` varchar(50) NOT NULL,
  `dentro_fora` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS despesas;

CREATE TABLE `despesas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` varchar(7) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS usuario;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='cadastrar usuario';




DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(520) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `situacoe_id` int(11) NOT NULL DEFAULT 0,
  `niveis_acesso_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO usuarios VALUES("3","USUARIO TESTE","demo@demo.com","62cc2d8b4bf2d8728120d052163a77df","1","1","2017-06-21 10:44:00","0000-00-00 00:00:00");



DROP TABLE IF EXISTS visitantes;

CREATE TABLE `visitantes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `identificador` varchar(50) NOT NULL,
  `rg` varchar(12) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `data_cadastro` date NOT NULL,
  `placa` varchar(8) NOT NULL,
  `obs` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;




