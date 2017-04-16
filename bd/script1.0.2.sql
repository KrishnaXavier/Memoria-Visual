-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Abr-2017 às 23:39
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projetodesign`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivos`
--

CREATE TABLE IF NOT EXISTS `arquivos` (
  `idArquivo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) DEFAULT NULL,
  `tipo` varchar(120) DEFAULT NULL,
  `arquivo` varchar(120) DEFAULT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`idArquivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `diciplinas_trabalhos`
--

CREATE TABLE IF NOT EXISTS `diciplinas_trabalhos` (
  `codigo` varchar(120) NOT NULL,
  `idTrabalho` int(11) NOT NULL,
  KEY `codigo` (`codigo`),
  KEY `idTrabalho` (`idTrabalho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `diciplinas_trabalhos`
--

INSERT INTO `diciplinas_trabalhos` (`codigo`, `idTrabalho`) VALUES
('DES.027', 560),
('DES.029', 560),
('DES.030', 560),
('DES.027', 561),
('DES.029', 561),
('DES.041', 562),
('DES.042', 562),
('DES.041', 563),
('DES.042', 563),
('DES.039', 557),
('DES.040', 557),
('DES.044', 557),
('DES.041', 559),
('DES.043', 559),
('DES.033', 568),
('DES.034', 568),
('DES.035', 568),
('DES.039', 569),
('DES.040', 569);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE IF NOT EXISTS `disciplinas` (
  `codigo` varchar(120) NOT NULL,
  `nomeDisciplina` varchar(300) DEFAULT NULL,
  `horaAulaSemanal` float DEFAULT NULL,
  `cargaHorarioTeoria` float DEFAULT NULL,
  `cargaHorarioPratica` float DEFAULT NULL,
  `cargaHorarioTotal` float DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `ativa` tinyint(1) DEFAULT NULL,
  `emenda` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`codigo`, `nomeDisciplina`, `horaAulaSemanal`, `cargaHorarioTeoria`, `cargaHorarioPratica`, `cargaHorarioTotal`, `semestre`, `ativa`, `emenda`) VALUES
('DES.001', 'História da Arte I ', NULL, NULL, NULL, 30, 1, 1, '5290_2014_1'),
('DES.002', 'Desenho Geométrico', NULL, NULL, NULL, 45, 1, 1, '5290_2014_1'),
('DES.003', 'Geometria Descritiva', NULL, NULL, NULL, 45, 1, 1, '5290_2014_1'),
('DES.004', 'Perspectiva', NULL, NULL, NULL, 30, 1, 1, '5290_2014_1'),
('DES.005', 'Fundamentos do Design', NULL, NULL, NULL, 30, 1, 1, '5290_2014_1'),
('DES.006', 'Introdução ao Design', NULL, NULL, NULL, 30, 1, 1, '5290_2014_1'),
('DES.007', 'Desenho de Observação e Expressão I', NULL, NULL, NULL, 45, 1, 1, '5290_2014_1'),
('DES.010', 'História da Arte II', NULL, NULL, NULL, 30, 2, 1, '5290_2014_1'),
('DES.011', 'História do Design I', NULL, NULL, NULL, 30, 2, 1, '5290_2014_1'),
('DES.012', 'Percepção e Cognição', NULL, NULL, NULL, 30, 2, 1, '5290_2014_1'),
('DES.014', 'Perspectiva e Sombras', NULL, NULL, NULL, 30, 2, 1, '5290_2014_1'),
('DES.015', 'Teoria e Prática da Cor', NULL, NULL, NULL, 30, 2, 1, '5290_2014_1'),
('DES.016', 'Desenho de Observação e Expressão II', NULL, NULL, NULL, 45, 2, 1, '5290_2014_1'),
('DES.017', 'Metodologia de Projeto', NULL, NULL, NULL, 45, 2, 1, '5290_2014_1'),
('DES.020', 'Estética', NULL, NULL, NULL, 30, 3, 1, '5290_2014_1'),
('DES.021', 'História do Design II', NULL, NULL, NULL, 30, 3, 1, '5290_2014_1'),
('DES.022', 'Técnicas de Representação Gráfica', NULL, NULL, NULL, 45, 3, 1, '5290_2014_1'),
('DES.023', 'Leitura e Produção Textual I', NULL, NULL, NULL, 30, 3, 1, '5290_2014_1'),
('DES.025', 'Tipografia', NULL, NULL, NULL, 45, 3, 1, '5290_2014_1'),
('DES.026', 'Fotografia e Imagem Digital', NULL, NULL, NULL, 45, 3, 1, '5290_2014_1'),
('DES.027', 'Semiótica', NULL, NULL, NULL, 30, 4, 1, '5290_2014_1'),
('DES.028', 'Leitura e Produção Textual II', NULL, NULL, NULL, 30, 4, 1, '5290_2014_1'),
('DES.029', 'Ergonomia I', NULL, NULL, NULL, 30, 4, 1, '5290_2014_1'),
('DES.030', 'Design de Identidade', NULL, NULL, NULL, 45, 4, 1, '5290_2014_1'),
('DES.033', 'Marketing e Design', NULL, NULL, NULL, 30, 5, 1, '5290_2014_1'),
('DES.034', 'Design e Sustentabilidade', NULL, NULL, NULL, 30, 5, 1, '5290_2014_1'),
('DES.035', 'Antropologia', NULL, NULL, NULL, 30, 5, 1, '5290_2014_1'),
('DES.036', 'Teoria e Crítica do Design', NULL, NULL, NULL, 30, 6, 1, '5290_2014_1'),
('DES.037', 'Metodologia de Pesquisa I', NULL, NULL, NULL, 30, 6, 1, '5290_2014_1'),
('DES.038', 'Gestão do Design', NULL, NULL, NULL, 30, 6, 1, '5290_2014_1'),
('DES.039', 'Legislação e Ética', NULL, NULL, NULL, 30, 8, 1, '5290_2014_1'),
('DES.040', 'Agenciamento e Empreendedorismo', NULL, NULL, NULL, 45, 8, 1, '5290_2014_1'),
('DES.041', 'Seminário de TCC I', NULL, NULL, NULL, 60, 7, 1, '5290_2014_1'),
('DES.042', 'Metodologia de Pesquisa II', NULL, NULL, NULL, 30, 7, 1, '5290_2014_1'),
('DES.043', 'Laboratório Design', NULL, NULL, NULL, 150, 7, 1, '5290_2014_1'),
('DES.044', 'Seminário de TCC II', NULL, NULL, NULL, 90, 8, 1, '5290_2014_1'),
('DES.045', 'Design e inovação', NULL, NULL, NULL, 45, 7, 1, '5290_2014_1'),
('DES.093', 'Desenho Técnico I', NULL, NULL, NULL, 30, 1, 1, '5290_2014_1'),
('DES.095', 'Laboratório de Estudos Volumétricos', NULL, NULL, NULL, 45, 3, 1, '5290_2014_1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos`
--

CREATE TABLE IF NOT EXISTS `documentos` (
  `idDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idDocumento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos_arquivos`
--

CREATE TABLE IF NOT EXISTS `documentos_arquivos` (
  `idDocumento` int(11) DEFAULT NULL,
  `idArquivo` int(11) DEFAULT NULL,
  KEY `idDocumento` (`idDocumento`),
  KEY `idArquivo` (`idArquivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `idEvento` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `local` varchar(120) DEFAULT NULL,
  `infsAdicionais` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`idEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE IF NOT EXISTS `imagens` (
  `data` date DEFAULT NULL,
  `imagem` varchar(120) DEFAULT NULL,
  `titulo` varchar(120) DEFAULT NULL,
  `idImagem` int(11) NOT NULL AUTO_INCREMENT,
  `idTrabalho` int(11) DEFAULT NULL,
  `ativa` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idImagem`),
  KEY `idTrabalho` (`idTrabalho`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=120 ;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`data`, `imagem`, `titulo`, `idImagem`, `idTrabalho`, `ativa`) VALUES
('2016-12-08', '0e3cdd48f87b7595fcb415d08db38ab9.jpg', 'titulo do trabalho 37x', 66, 557, 1),
('2016-12-08', 'f0b83872e6728ce591bd980fbdd91026.jpg', 'titulo do trabalho 37', 67, 557, 0),
('2016-12-08', '64f15ab3b4208823dfcb55568482ab89.jpg', 'titulo do trabalho 37', 68, 557, 0),
('2016-12-22', 'c4d51c1511541a78028fdfdcae4ef7c8.jpg', 'SensaÃ§Ãµes e Dores', 71, 559, 1),
('2016-12-22', '10a243caf5cf56daf117f77c5071e69c.jpg', 'SensaÃ§Ãµes e Dores', 72, 559, 1),
('2016-05-25', 'be8c398642275c84ce9bbe18cd9f4ca1.jpg', 'Gatos na Janela', 73, 560, 1),
('2016-05-25', 'a35665fa6ebf617d60598e8da39749c7.jpg', 'Gatos na Janela', 74, 560, 1),
('2016-05-25', '78965a366a20e8aa84f423fbd8bd896b.jpg', 'Gatos na Janela', 75, 560, 1),
('2016-05-25', 'ff984646bc0a676905898b2979a1dfc8.jpg', 'Gatos na Janela', 76, 560, 1),
('2016-12-08', '5a6ae7d7d53ee004984399ee2a6d4832.jpg', 'titulo do trabalho 40 12jan2017', 77, 561, 1),
('2016-12-08', 'a6b4cae36bb314b587b16b0fa259791f.jpg', 'titulo do trabalho 40 12jan2017', 78, 561, 1),
('2016-12-08', 'f7e891e5316935800bf45b5e219db555.jpg', 'titulo do trabalho 40 12jan2017', 79, 561, 1),
('2016-12-08', '0814173303de57bdc6b0e18fdf36e71b.jpg', 'titulo do trabalho 40 12jan2017', 80, 561, 1),
('2016-12-08', '3bd570a146505ae338906a384102e3cd.jpg', 'titulo do trabalho 40 12jan2017', 81, 561, 1),
('2016-12-08', '0ebdd91299890541ca8566fc5671f22d.jpg', ' Editado - titulo do trabalho 37-edit', 82, 557, 1),
('2016-12-08', '3640841544286aee57dd1b07737e82f9.jpg', ' Editado - titulo do trabalho 37-edit', 83, 557, 0),
('2016-12-08', '6b1b8493b4eedabdee13f1246846111a.jpg', ' Editado - titulo do trabalho 37-edit', 84, 557, 0),
('2017-04-26', '0b54fc425372b19433e50e8751c054ab.jpg', 'TituloTrabalho teste 4 abril', 85, 562, 1),
('2017-04-26', 'e777ec6bfd7220d9d57d69697daa57d6.jpg', 'TituloTrabalho teste 4 abril', 86, 562, 1),
('2017-04-26', '1b7d9bcb63d3a71718fcb8645337744b.jpg', 'TituloTrabalho teste 4 abril', 87, 562, 1),
('2017-04-26', '6997abfc32d2a5d6c2c6950af6805f6a.jpg', 'TituloTrabalho teste 4 abril', 88, 562, 1),
('2017-04-26', '92d99b32002f97b4cc618c638f17305f.jpg', 'TituloTrabalho teste 4 abril', 89, 562, 1),
('2017-04-26', '3bf2a334d32b5d3d8d8b0713a81f22d0.jpg', 'TituloTrabalho teste 4 abril', 90, 562, 1),
('2017-04-26', '0571e4a9f79533e3abeb31bc9694ad0f.jpg', 'TituloTrabalho teste 4 abril', 91, 562, 1),
('2017-04-19', '37688e15f653fa7d9936440b56d75334.jpg', 'T teste 4 abril', 92, 563, 1),
('2017-04-19', 'b20ccdbe8d2186bab3db540976cfccbb.jpg', 'T teste 4 abril', 93, 563, 1),
('2017-04-19', 'ff23edfee892402ddbf3393f1e7278dd.jpg', 'T teste 4 abril', 94, 563, 1),
('2017-04-19', '80db0c47f5309dd3dc75b38750cb5fa8.jpg', 'x2 teste 4 abril', 110, 568, 1),
('2017-04-19', '0c86b5efc16925b738ded2612012aaad.jpg', 'x2 teste 4 abril', 111, 568, 1),
('2017-04-19', '02e078897ec93539478d08c27565774f.jpg', 'x2 teste 4 abril', 112, 568, 1),
('2017-04-19', '66c88fc176a9b5e11a45d59f360c0098.jpg', 'teste 5 abril', 113, 569, 1),
('2017-04-19', 'ac35be941e12e8bb253508e2770f2b59.jpg', 'teste 5 abril', 114, 569, 1),
('2017-04-19', '6318eca3b9f04de290f8d552367f612a.jpg', 'teste 5 abril', 115, 569, 1),
('2017-04-19', 'ce188f9387251d3474bd358c0dbf77d3.jpg', 'teste 5 abril', 116, 569, 1),
('2017-04-19', 'cb6e1850a82a4a6e0f15df7538b3bc6a.jpg', 'teste 5 abril', 117, 569, 1),
('2017-04-19', '4824a9209315a1b0d5b128a7d44738e9.jpg', 'teste 5 abril', 118, 569, 1),
('2017-04-19', 'aaa98d1ae8ec493d8b5d0dce4252815f.jpg', 'teste 5 abril', 119, 569, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `idNoticia` int(11) NOT NULL AUTO_INCREMENT,
  `noticia` varchar(4000) DEFAULT NULL,
  `titulo` varchar(300) DEFAULT NULL,
  `imagem` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`idNoticia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`idNoticia`, `noticia`, `titulo`, `imagem`) VALUES
(2, '<h3>Anime:&nbsp; Suisei No Gargantia<br />\r\nPor:&nbsp;Lucas Carvalho</h3>\r\n\r\n<p>G&ecirc;nero:A&ccedil;&atilde;o , Mecha<br />\r\nEp: 13 (2) ovas<br />\r\nTemporadas: 2<br />\r\nAno: 2013</p>\r\n\r\n<p>Sinopse: Num long&iacute;nquo futuro, a Alian&ccedil;a Gal&aacute;ctica Humana t&ecirc;m lutado constantemente pela sua sobreviv&ecirc;ncia contra uma grotesca ra&ccedil;a de seres conhecidos como &ldquo;Hidiaasu&rdquo;. Durante uma batalha intensa, Redo e o seu mech Chamber s&atilde;o engolidos por uma distor&ccedil;&atilde;o no tempo e no espa&ccedil;o. Ao acordar do seu estado de hiberna&ccedil;&atilde;o artificialmente induzido, Redo apercebe-se que chegou &agrave; Terra, um planeta fronteiri&ccedil;o completamente inundado onde as pessoas vivem em navios gigantes, recolhendo rel&iacute;quias das profundezas dos oceanos. Redo chega a uma das frotas chamada Gargantia onde &eacute; for&ccedil;ado a conviver com Amy, uma garota de 15 anos que trabalha como mensageira.</p>\r\n\r\n<p>Nota : 9,5/10 ( Super Recomendo, Nunca curti anime mecha mas eu abri uma exce&ccedil;&atilde;o. Me chamou bastante aten&ccedil;&atilde;o por ter uma tecnologia no estilo meio Steampunk com Futurista e a Hist&oacute;ria do anime &eacute; bem interessante. Ele Est&aacute; no meu top 5 )</p>\r\n', 'Noticia 1, teste ediÃ§Ã£o 2', 'df64fb6b01f3d715c1fd5b5bbaec89c9.jpg'),
(3, '<p>Temas como a Opera&ccedil;&atilde;o Lava Jato, trajet&oacute;ria pol&iacute;tica e casamento gay foram tratados. Outras pol&ecirc;micas, como descriminaliza&ccedil;&atilde;o do aborto e do porte de maconha, por sua vez, foram evitadas, em raz&atilde;o de julgamentos pendentes no STF sobre estes assuntos. Veja abaixo as principais respostas de Moraes na sabatina: Lava Jato Moraes prometeu atuar com &ldquo;absoluta imparcialidade e independ&ecirc;ncia&rdquo; e sem &ldquo;nenhuma vincula&ccedil;&atilde;o pol&iacute;tico-partid&aacute;ria&rdquo; na Corte, inclusive nos casos relacionados &agrave; Opera&ccedil;&atilde;o Lava Jato. &ldquo;Assim como no hist&oacute;rico do STF, posso garantir que se aprovado for pelo Senado, atuarei com absoluta imparcialidade e liberdade no momento de vota&ccedil;&atilde;o&rdquo;, afirmou. Ele acrescentou que n&atilde;o deve atuar na maioria das a&ccedil;&otilde;es, j&aacute; que vai integrar a Primeira e n&atilde;o a Segunda Turma da Corte, respons&aacute;vel pela opera&ccedil;&atilde;o. Tamb&eacute;m disse que, eventualmente, poder&aacute; ser revisor nos casos levados a plen&aacute;rio (n&atilde;o h&aacute; nenhum atualmente). &ldquo;Em havendo algum caso no plen&aacute;rio, o revisor n&atilde;o participa da abertura da investiga&ccedil;&atilde;o, na investiga&ccedil;&atilde;o, n&atilde;o h&aacute; revisoria na den&uacute;ncia e ao final vota como qualquer outro dos ministros&rdquo;, disse.</p>\r\n', 'Lava Jato', '6d1d6d135b4b676e3c2756f8836fd3f0.jpg'),
(5, '<p>feira (22) com pedido de recupera&ccedil;&atilde;o judicial perante a Comarca da Capital do Estado de S&atilde;o Paulo, segundo fato relevante (comunicado ao mercado). Veja perguntas e respostas sobre recupera&ccedil;&atilde;o judicial De acordo com o documento, a decis&atilde;o foi tomada porque o acordo de reestrutura&ccedil;&atilde;o de d&iacute;vidas celebrado com os bancos n&atilde;o surtiu o efeito esperado. O plano previa prorroga&ccedil;&atilde;o de pagamentos de juros e amortiza&ccedil;&atilde;o de principal, al&eacute;m de novo financiamento para cobrir despesas gerais e administrativas. &quot;O Grupo PDG continuou a enfrentar s&eacute;rias dificuldades na gest&atilde;o e continuidade de seus empreendimentos imobili&aacute;rios, tais como o crescente n&uacute;mero de distratos de unidades vendidas, a queda nas vendas em todo Brasil, a interrup&ccedil;&atilde;o de obras em andamento, o ac&uacute;mulo de d&iacute;vidas condominiais, de IPTU e com fornecedores de produtos e servi&ccedil;os, e ainda o grande volume de a&ccedil;&otilde;es judiciais movidas por clientes, ex-clientes e funcion&aacute;rios de prestadores de servi&ccedil;o&quot;, disse a empresa. Por isso, o conselho de administra&ccedil;&atilde;o da PDG concluiu que o ajuizamento da recupera&ccedil;&atilde;o judicial &eacute; a &quot;medida mais adequada&quot; neste momento. Ainda segundo o fato relevante, uma Assembleia Geral Extraordin&aacute;ria foi convocada para ratifica&ccedil;&atilde;o do pedido.</p>\r\n', 'noticia 22fev, edit 2', '2c9899af1b93e0f39743dcf63e4d56a5.jpg'),
(6, '<h1>3.2X Ramifica&ccedil;&atilde;o (Branching) no Git - B&aacute;sico de Branch e Merge</h1>\r\n\r\n<h2>B&aacute;sico de Branch e Merge</h2>\r\n\r\n<p>Vamos ver um exemplo simples de uso de branch e merge com um fluxo de trabalho que voc&ecirc; pode usar no mundo real. Voc&ecirc; seguir&aacute; esses passos:</p>\r\n\r\n<ol>\r\n	<li>Trabalhar em um web site.</li>\r\n	<li>Criar um branch para uma nova hist&oacute;ria em que est&aacute; trabalhando.</li>\r\n	<li>Trabalhar nesse branch.</li>\r\n</ol>\r\n\r\n<p>Nesse etapa, voc&ecirc; receber&aacute; um telefonema informando que outro problema cr&iacute;tico existe e precisa de corre&ccedil;&atilde;o. Voc&ecirc; far&aacute; o seguinte:</p>\r\n\r\n<ol>\r\n	<li>Voltar ao seu branch de produ&ccedil;&atilde;o.</li>\r\n	<li>Criar um branch para adicionar a corre&ccedil;&atilde;o.</li>\r\n	<li>Depois de testado, fazer o merge do branch da corre&ccedil;&atilde;o, e enviar para produ&ccedil;&atilde;o.</li>\r\n	<li>Retornar &agrave; sua hist&oacute;ria anterior e continuar trabalhando.</li>\r\n</ol>\r\n\r\n<h3><a href="https://git-scm.com/book/pt-br/v1/Ramifica%C3%A7%C3%A3o-Branching-no-Git-B%C3%A1sico-de-Branch-e-Merge#Branch-BÃ¡sico">Branch B&aacute;sico</a></h3>\r\n\r\n<p>Primeiro, digamos que voc&ecirc; esteja trabalhando no seu projeto e j&aacute; tem alguns commits (veja Figura 3-10).</p>\r\n', 'Notica 4 Abril, edit', '4aff296c25082f2b17cca0a57978cb51.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias_tag`
--

CREATE TABLE IF NOT EXISTS `noticias_tag` (
  `idTag` int(11) NOT NULL,
  `idNoticia` int(11) NOT NULL,
  KEY `idTag` (`idTag`),
  KEY `idNoticia` (`idNoticia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE IF NOT EXISTS `professores` (
  `idProfessor` int(11) NOT NULL AUTO_INCREMENT,
  `lattes` varchar(120) DEFAULT NULL,
  `nome` varchar(120) DEFAULT NULL,
  `imagem` varchar(120) DEFAULT NULL,
  `areasInteresse` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idProfessor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `idTag` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(120) NOT NULL,
  PRIMARY KEY (`idTag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalhos`
--

CREATE TABLE IF NOT EXISTS `trabalhos` (
  `idTrabalho` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(120) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `tipo` varchar(120) DEFAULT NULL,
  `tituloTrabalho` varchar(120) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idTrabalho`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=570 ;

--
-- Extraindo dados da tabela `trabalhos`
--

INSERT INTO `trabalhos` (`idTrabalho`, `autor`, `data`, `tipo`, `tituloTrabalho`, `semestre`, `ativo`) VALUES
(557, 'Teste 4 abril', '2016-12-08', 'trabalho voluntario 37-edit', ' Editado - titulo do trabalho 37-edit', 8, 1),
(559, 'XXX Kris 26dez', '2016-12-22', 'Trabalhos de Vidas', 'SensaÃ§Ãµes e Dores', 7, 1),
(560, 'Kris FX', '2016-05-25', 'Animais da Vida', 'Gatos na Janela', 4, 1),
(561, 'nome autor 40 12jan2017', '2016-12-08', 'trabalho voluntario 40 12jan2017', 'titulo do trabalho 40 12jan2017', 4, 1),
(562, 'NomeAutor teste 4 abril', '2017-04-26', 'Estudo V', 'TituloTrabalho teste 4 abril', 7, 1),
(563, 'NomeAutor teste 4 abril', '2017-04-19', 'Estudo v', 'T teste 4 abril', 7, 0),
(568, 'x2 teste 4 abril', '2017-04-19', 'x2 teste 4 abril', 'x2 teste 4 abril', 5, 1),
(569, 'teste 5 abril', '2017-04-19', 'teste 5 abril', 'teste 5 abril', 8, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(240) NOT NULL,
  `senha` varchar(240) NOT NULL,
  `email` varchar(240) NOT NULL,
  `criadoEm` date NOT NULL,
  `modificadoEm` date NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `senha`, `email`, `criadoEm`, `modificadoEm`) VALUES
(1, 'testeusuario', 'testesenha', 'testeemail@gmail.com', '2017-03-02', '0000-00-00');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `diciplinas_trabalhos`
--
ALTER TABLE `diciplinas_trabalhos`
  ADD CONSTRAINT `diciplinas_trabalhos_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `disciplinas` (`codigo`),
  ADD CONSTRAINT `diciplinas_trabalhos_ibfk_2` FOREIGN KEY (`idTrabalho`) REFERENCES `trabalhos` (`idTrabalho`);

--
-- Limitadores para a tabela `documentos_arquivos`
--
ALTER TABLE `documentos_arquivos`
  ADD CONSTRAINT `documentos_arquivos_ibfk_1` FOREIGN KEY (`idDocumento`) REFERENCES `documentos` (`idDocumento`),
  ADD CONSTRAINT `documentos_arquivos_ibfk_2` FOREIGN KEY (`idArquivo`) REFERENCES `arquivos` (`idArquivo`);

--
-- Limitadores para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `imagens_ibfk_1` FOREIGN KEY (`idTrabalho`) REFERENCES `trabalhos` (`idTrabalho`);

--
-- Limitadores para a tabela `noticias_tag`
--
ALTER TABLE `noticias_tag`
  ADD CONSTRAINT `noticias_tag_ibfk_1` FOREIGN KEY (`idTag`) REFERENCES `tags` (`idTag`),
  ADD CONSTRAINT `noticias_tag_ibfk_2` FOREIGN KEY (`idNoticia`) REFERENCES `noticias` (`idNoticia`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
