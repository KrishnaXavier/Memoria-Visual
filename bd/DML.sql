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

-- Extraindo dados da tabela `trabalhos`
INSERT INTO `trabalhos` (`idTrabalho`, `autor`, `data`, `tipo`, `tituloTrabalho`, `semestre`, `ativo`) VALUES
(560, 'Exemplo, Kris FX', '2016-05-25', 'Animais da Vida', 'Gatos na Janela', 4, 0),
(561, 'Exemplo, nome autor 40 12jan2017', '2016-12-08', 'trabalho voluntario 40 12jan2017', 'titulo do trabalho 40 12jan2017', 4, 0),
(562, 'Exemplo, NomeAutor teste 4 abril', '2017-04-26', 'Estudo V', 'TituloTrabalho teste 4 abril', 7, 1),
(563, 'Exemplo, NomeAutor teste 4 abril', '2017-04-19', 'Estudo v', 'T teste 4 abril', 7, 1),
(568, 'Exemplo, x2 teste 4 abril', '2017-04-19', 'x2 teste 4 abril', 'x2 teste 4 abril', 5, 1),
(569, 'Exemplo, teste 5 abril', '2017-04-19', 'teste 5 abril', 'teste 5 abril', 8, 1),
(570, 'Exemplo, codTeste1', '2000-01-01', 'codTeste1', 'codTeste1', 1, 1),
(571, 'Exemplo, codTeste2', '2000-01-01', 'codTeste2', 'codTeste2', 1, 1);

-- Extraindo dados da tabela `disciplinas`
INSERT INTO `disciplinas` (`codigo`, `nomeDisciplina`, `horaAulaSemanal`, `cargaHorarioTeoria`, `cargaHorarioPratica`, `cargaHorarioTotal`, `semestre`, `ativa`, `matriz`) VALUES
('códiçãoNome 84', 'códiçãoNome 84', 3.5, 100, 60, 160, 1, 1, '123_444'),
('códiçãoNome 85', 'códiçãoNome 85v3', 3.5, 100, 60, 160, 1, 1, '123_444'),
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
('DES.041', 'Seminário de TCC I', 5, 20, 40, 60, 7, 1, '5290_2014_1'),
('DES.042', 'Metodologia de Pesquisa II', NULL, NULL, NULL, 30, 7, 1, '5290_2014_1'),
('DES.043', 'Laboratório Design', NULL, NULL, NULL, 150, 7, 1, '5290_2014_1'),
('DES.044', 'Seminário de TCC II', NULL, NULL, NULL, 90, 8, 1, '5290_2014_1'),
('DES.045', 'Design e inovação', NULL, NULL, NULL, 45, 7, 1, '5290_2014_1'),
('DES.093', 'Desenho Técnico I', NULL, NULL, NULL, 30, 1, 1, '5290_2014_1'),
('DES.095', 'Laboratório de Estudos Volumétricos', NULL, NULL, NULL, 45, 3, 1, '5290_2014_1');

-- Extraindo dados da tabela `diciplinas_trabalhos`
INSERT INTO `diciplinas_trabalhos` (`codigo`, `idTrabalho`) VALUES
('DES.027', 560),
('DES.029', 560),
('DES.030', 560),
('DES.027', 561),
('DES.029', 561),
('DES.041', 562),
('DES.042', 562),
('DES.033', 568),
('DES.034', 568),
('DES.035', 568),
('DES.001', 570),
('DES.002', 570),
('DES.003', 570),
('DES.001', 571),
('DES.041', 563),
('DES.042', 563),
('DES.039', 569),
('DES.040', 569);

-- Extraindo dados da tabela `imagens`
INSERT INTO `imagens` (`data`, `imagem`, `titulo`, `idImagem`, `idTrabalho`, `ativa`) VALUES
('2016-05-25', 'be8c398642275c84ce9bbe18cd9f4ca1.jpg', 'Gatos na Janela', 73, 560, 1),
('2016-05-25', 'a35665fa6ebf617d60598e8da39749c7.jpg', 'Gatos na Janela', 74, 560, 1),
('2016-05-25', '78965a366a20e8aa84f423fbd8bd896b.jpg', 'Gatos na Janela', 75, 560, 1),
('2016-05-25', 'ff984646bc0a676905898b2979a1dfc8.jpg', 'Gatos na Janela', 76, 560, 1),
('2016-12-08', '5a6ae7d7d53ee004984399ee2a6d4832.jpg', 'titulo do trabalho 40 12jan2017', 77, 561, 1),
('2016-12-08', 'a6b4cae36bb314b587b16b0fa259791f.jpg', 'titulo do trabalho 40 12jan2017', 78, 561, 1),
('2016-12-08', 'f7e891e5316935800bf45b5e219db555.jpg', 'titulo do trabalho 40 12jan2017', 79, 561, 1),
('2016-12-08', '0814173303de57bdc6b0e18fdf36e71b.jpg', 'titulo do trabalho 40 12jan2017', 80, 561, 1),
('2016-12-08', '3bd570a146505ae338906a384102e3cd.jpg', 'titulo do trabalho 40 12jan2017', 81, 561, 1),
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
('2017-04-19', 'aaa98d1ae8ec493d8b5d0dce4252815f.jpg', 'teste 5 abril', 119, 569, 1),
('2000-01-01', '23356104472a423b961bf94cd3ea3635.png', 'codTeste1', 120, 570, 1),
('2000-01-01', 'e4021a9cc16c25787ac56ccb376182cb.png', 'codTeste1', 121, 570, 1),
('2000-01-01', 'b9af47a69c55fa53e385c7641dd0378e.png', 'codTeste1', 122, 570, 1),
('2000-01-01', '5226771c493db9a24a354445cab17727.png', 'codTeste1', 123, 570, 1),
('2000-01-01', 'aaa61e0989a2a0c57ad1f25771421260.png', 'codTeste1', 124, 570, 1),
('2000-01-01', 'ea4421cbeb3c3b6758b99fb47c6916e3.png', 'codTeste2', 125, 571, 1),

-- Extraindo dados da tabela `noticias`
INSERT INTO `noticias` (`idNoticia`, `noticia`, `titulo`, `imagem`) VALUES
(2, '<p>texto</p>\r\n\r\n<p>texto</p>\r\n\r\n<p>texto</p>\r\n\r\n<p>texto</p>\r\n\r\n<p>texto</p>\r\n\r\n<p><br />\r\ntexto</p>\r\n', 'Exemplo, Noticia 1, teste ediÃ§Ã£o 3', 'df64fb6b01f3d715c1fd5b5bbaec89c9.jpg'),
(3, '<p>Temas como a Opera&ccedil;&atilde;o Lava Jato, trajet&oacute;ria pol&iacute;tica e casamento gay foram tratados. Outras pol&ecirc;micas, como descriminaliza&ccedil;&atilde;o do aborto e do porte de maconha, por sua vez, foram evitadas, em raz&atilde;o de julgamentos pendentes no STF sobre estes assuntos. Veja abaixo as principais respostas de Moraes na sabatina: Lava Jato Moraes prometeu atuar com &ldquo;absoluta imparcialidade e independ&ecirc;ncia&rdquo; e sem &ldquo;nenhuma vincula&ccedil;&atilde;o pol&iacute;tico-partid&aacute;ria&rdquo; na Corte, inclusive nos casos relacionados &agrave; Opera&ccedil;&atilde;o Lava Jato. &ldquo;Assim como no hist&oacute;rico do STF, posso garantir que se aprovado for pelo Senado, atuarei com absoluta imparcialidade e liberdade no momento de vota&ccedil;&atilde;o&rdquo;, afirmou. Ele acrescentou que n&atilde;o deve atuar na maioria das a&ccedil;&otilde;es, j&aacute; que vai integrar a Primeira e n&atilde;o a Segunda Turma da Corte, respons&aacute;vel pela opera&ccedil;&atilde;o. Tamb&eacute;m disse que, eventualmente, poder&aacute; ser revisor nos casos levados a plen&aacute;rio (n&atilde;o h&aacute; nenhum atualmente). &ldquo;Em havendo algum caso no plen&aacute;rio, o revisor n&atilde;o participa da abertura da investiga&ccedil;&atilde;o, na investiga&ccedil;&atilde;o, n&atilde;o h&aacute; revisoria na den&uacute;ncia e ao final vota como qualquer outro dos ministros&rdquo;, disse.</p>\r\n', 'Exemplo, Lava Jato', '6d1d6d135b4b676e3c2756f8836fd3f0.jpg'),
(5, '<p>feira (22) com pedido de recupera&ccedil;&atilde;o judicial perante a Comarca da Capital do Estado de S&atilde;o Paulo, segundo fato relevante (comunicado ao mercado). Veja perguntas e respostas sobre recupera&ccedil;&atilde;o judicial De acordo com o documento, a decis&atilde;o foi tomada porque o acordo de reestrutura&ccedil;&atilde;o de d&iacute;vidas celebrado com os bancos n&atilde;o surtiu o efeito esperado. O plano previa prorroga&ccedil;&atilde;o de pagamentos de juros e amortiza&ccedil;&atilde;o de principal, al&eacute;m de novo financiamento para cobrir despesas gerais e administrativas. &quot;O Grupo PDG continuou a enfrentar s&eacute;rias dificuldades na gest&atilde;o e continuidade de seus empreendimentos imobili&aacute;rios, tais como o crescente n&uacute;mero de distratos de unidades vendidas, a queda nas vendas em todo Brasil, a interrup&ccedil;&atilde;o de obras em andamento, o ac&uacute;mulo de d&iacute;vidas condominiais, de IPTU e com fornecedores de produtos e servi&ccedil;os, e ainda o grande volume de a&ccedil;&otilde;es judiciais movidas por clientes, ex-clientes e funcion&aacute;rios de prestadores de servi&ccedil;o&quot;, disse a empresa. Por isso, o conselho de administra&ccedil;&atilde;o da PDG concluiu que o ajuizamento da recupera&ccedil;&atilde;o judicial &eacute; a &quot;medida mais adequada&quot; neste momento. Ainda segundo o fato relevante, uma Assembleia Geral Extraordin&aacute;ria foi convocada para ratifica&ccedil;&atilde;o do pedido.</p>\r\n', 'Exemplo, noticia 22fev, edit 2', '2c9899af1b93e0f39743dcf63e4d56a5.jpg'),
(6, '<h1>3.2X Ramifica&ccedil;&atilde;o (Branching) no Git - B&aacute;sico de Branch e Merge</h1>\r\n\r\n<h2>B&aacute;sico de Branch e Merge</h2>\r\n\r\n<p>Vamos ver um exemplo simples de uso de branch e merge com um fluxo de trabalho que voc&ecirc; pode usar no mundo real. Voc&ecirc; seguir&aacute; esses passos:</p>\r\n\r\n<ol>\r\n	<li>Trabalhar em um web site.</li>\r\n	<li>Criar um branch para uma nova hist&oacute;ria em que est&aacute; trabalhando.</li>\r\n	<li>Trabalhar nesse branch.</li>\r\n</ol>\r\n\r\n<p>Nesse etapa, voc&ecirc; receber&aacute; um telefonema informando que outro problema cr&iacute;tico existe e precisa de corre&ccedil;&atilde;o. Voc&ecirc; far&aacute; o seguinte:</p>\r\n\r\n<ol>\r\n	<li>Voltar ao seu branch de produ&ccedil;&atilde;o.</li>\r\n	<li>Criar um branch para adicionar a corre&ccedil;&atilde;o.</li>\r\n	<li>Depois de testado, fazer o merge do branch da corre&ccedil;&atilde;o, e enviar para produ&ccedil;&atilde;o.</li>\r\n	<li>Retornar &agrave; sua hist&oacute;ria anterior e continuar trabalhando.</li>\r\n</ol>\r\n\r\n<h3><a href="https://git-scm.com/book/pt-br/v1/Ramifica%C3%A7%C3%A3o-Branching-no-Git-B%C3%A1sico-de-Branch-e-Merge#Branch-BÃ¡sico">Branch B&aacute;sico</a></h3>\r\n\r\n<p>Primeiro, digamos que voc&ecirc; esteja trabalhando no seu projeto e j&aacute; tem alguns commits (veja Figura 3-10).</p>\r\n', 'Exemplo, Notica 4 Abril, edit', '4aff296c25082f2b17cca0a57978cb51.jpg'),
(7, '<p>Rio de Janeiro deve reunir cerca de 70 mil f&atilde;s de games e da cultura pop na Barra da Tijuca, na Zona Oeste, durante o festival Geek &amp; Game Rio. O evento ser&aacute; realizado entre os dias 21 e 23 de abril e ter&aacute; como destaque o Gamer Stadium, uma arena onde equipes profissionais ir&atilde;o proporcionar batalhas para o p&uacute;blico assistir.</p>\r\n\r\n<p>Entre as atividades, o Geek &amp; Game ter&aacute; a presen&ccedil;a de personalidades internacionais que atuam no mundo geek, concurso de cosplay e encontro de youtubers. A diretora da Fagga, empresa que organiza o festival, Tatiana Zaccaro, afirmou que o evento pretende atingir tanto os especialistas no assunto e como pessoas que querem come&ccedil;ar a se familiarizar com o tema.</p>\r\n\r\n<p>&ldquo;O Geek &amp; Game &eacute; um evento de programa&ccedil;&atilde;o, o p&uacute;blico poder&aacute; visitar uma arena de game onde teremos campeonatos. Ser&aacute; uma arena de 900 m&sup2; onde as equipes v&atilde;o se enfrentar. O evento ter&aacute; tamb&eacute;m um audit&oacute;rio com encontro de youtubers, uma &aacute;rea de concurso de cosplay, uma &aacute;rea infantil para as crian&ccedil;as e teremos esta&ccedil;&otilde;es de fliperama. O evento &eacute; bem abrangente, quer atingir tanto fam&iacute;lias quanto os apaixonados por game&rdquo;, afirmou Tatiana Zacaaro.</p>\r\n', 'Exemplo, noticia 23 maio, edit 0', '0662955ce7c45e097519c86993c993df.jpg');

-- Extraindo dados da tabela `usuarios`
INSERT INTO `usuarios` (`idUsuario`, `usuario`, `senha`, `email`, `criadoEm`, `modificadoEm`) VALUES
(1, 'testeusuario', 'testesenha', 'testeemail@gmail.com', '2017-03-02', '0000-00-00');