-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/07/2024 às 03:20
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_projeto`
--
CREATE DATABASE IF NOT EXISTS `bd_projeto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_projeto`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_jogos`
--

CREATE TABLE `tb_jogos` (
  `id` int(11) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `titulo` varchar(1000) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `categoria` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_jogos`
--

INSERT INTO `tb_jogos` (`id`, `img`, `titulo`, `descricao`, `link`, `categoria`) VALUES
(16, '66833b1f3e80d.jpg', 'The king of fighter 2002', 'É o segundo jogo não-canônico da série The King of Fighters, ou seja, não tem parte na sequência real da história da série, assim como The King of Fighters \'98. Reúne 43 lutadores selecionáveis que participaram dos jogos anteriores, que se unem em grupos de três lutadores e se enfrentam para decidir qual equipe lutará contra Rugal Bernstein, o primeiro chefe da série.', 'https://pt.wikipedia.org/wiki/The_King_of_Fighters_2002', 'classicos'),
(17, '66833c3c2d489.jpg', 'Fatal fury', 'Fatal Fury conta a trajetória do herói Terry Bogard em sua missão de vingar a morte de seu pai adotivo Jeff Bogard. A série tornou-se famosa por popularizar o estilo de jogos de luta junto com Street Fighter II da concorrente Capcom.', 'https://pt.wikipedia.org/wiki/Fatal_Fury', 'classicos'),
(18, '66833cf0cf688.jpg', 'Tekken 3 ', 'Quinze anos depois, Heihachi estabeleceu a Tekken Force: uma organização paramilitar dedicada à proteção da Mishima Zaibatsu. Usando a influência da companhia, Heihachi é o responsável por muitos eventos que levaram, no fim, o mundo à paz mundial. Um dia, um esquadrão da Tekken Force faz buscas em um templo antigo, localizado no México, sob a premissa de trabalho de um projeto de escavações. Logo depois de chegar ao local, Heihachi descobre que todo o time foi obliterado por uma criatura maligna e misteriosa denominada Ogre.', 'https://pt.wikipedia.org/wiki/Tekken_3', 'classicos'),
(23, '66834feec3469.png', 'Terry bogard', 'Quando Terry tinha 10 anos, ele testemunhou a morte de seu pai nas mãos de Geese Howard. Sabendo que precisavam de mais treinamento para confrontar Geese, os irmãos juraram passar uma década para aperfeiçoar suas artes marciais antes de tentar vingar seu pai. Ao contrário de seu irmão Andy, que deixou Southtown para treinar no Japão, Terry escolheu perambular em seu país de origem, combinando as habilidades aprendidas com seu pai, o mentor de seu pai Tung Fu Rue e as habilidades adquiridas nas ruas.', 'https://tkoc.fandom.com/pt-br/wiki/Terry_Bogard', 'personagem'),
(24, '668350f23d9d3.png', 'Leona Heidern', 'Leona nasceu em uma aldeia, residindo com sua família. Quando era criança, Goenitz chegou a sua casa e exigiu falar com Gaidel, o líder da aldeia. Ele pediu que Gaidel se juntasse a ele em seus deveres para servir a Orochi, já que todos na aldeia eram membros da linhagem de Orochi.', 'https://tkoc.fandom.com/pt-br/wiki/Leona_Heidern', 'personagem'),
(27, '66848a9785a57.png', 'Seiya de pegasus', 'Seiya é um cavaleiro impulsivo, generoso, de coração ardente e sincero. Por ser espontâneo e franco, Seiya é, muitas vezes, visto como uma pessoa atrevida e insolente, mas isso se trata de uma impressão errada. Na verdade, Seiya é um dos cavaleiros mais bondosos e justos. Seu senso de justiça e amor aos amigos se mostra durante todas as batalhas. Sua piedade e preocupação se estende até aos inimigos, como visto durante as mortes de Cassius e Siegfried de Doube.', 'https://saintseiya.fandom.com/pt-br/wiki/Seiya_de_P%C3%A9gaso', 'personagem');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_jogos`
--
ALTER TABLE `tb_jogos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_jogos`
--
ALTER TABLE `tb_jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
