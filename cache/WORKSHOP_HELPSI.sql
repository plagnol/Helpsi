-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 22 Mars 2018 à 23:43
-- Version du serveur :  10.1.23-MariaDB-9+deb9u1
-- Version de PHP :  7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `helpsi`
--

-- --------------------------------------------------------

--
-- Structure de la table `available`
--

CREATE TABLE `available` (
  `available_id` int(11) NOT NULL,
  `startdate` datetime DEFAULT NULL,
  `duration` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `available`
--

INSERT INTO `available` (`available_id`, `startdate`, `duration`, `user_id`) VALUES
(3, '2018-03-23 16:00:00', '2018-03-23 18:00:00', 4),
(4, '2019-01-01 18:00:00', '2019-01-01 20:00:00', 8);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Développement dapplications informatiques'),
(2, 'Administration infrastructure système et réseau gestion des données'),
(3, 'Gestion des données'),
(7, 'Gestion de Données et Business intelligence'),
(8, 'Etudes et Dévelopement'),
(9, 'Infrastructure Système et Réseaux');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `user_tutor_id` int(11) NOT NULL,
  `roaster` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`event_id`, `startdate`, `enddate`, `type_id`, `user_tutor_id`, `roaster`) VALUES
(53, '2018-03-22 22:13:00', '2018-03-22 22:15:00', 2, 7, 2),
(54, '2018-02-23 10:10:00', '2018-02-23 11:11:00', 2, 5, 2),
(56, '2018-03-23 15:00:00', '2018-03-23 17:00:00', 2, 7, 1),
(57, '2018-03-25 20:00:00', '2018-03-25 22:00:00', 2, 7, 0);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `eventPastList`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `eventPastList` (
`event_id` int(11)
,`skill_id` int(11)
,`user_id` int(11)
,`mark` int(11)
,`startdate` datetime
,`enddate` datetime
,`user_tutor_id` int(11)
);

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `grade`
--

INSERT INTO `grade` (`grade_id`, `name`) VALUES
(1, 'B1'),
(2, 'B2'),
(3, 'B3'),
(4, 'I4'),
(5, 'I5');

-- --------------------------------------------------------

--
-- Structure de la table `l_event_skill_user`
--

CREATE TABLE `l_event_skill_user` (
  `event_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mark` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `l_event_skill_user`
--

INSERT INTO `l_event_skill_user` (`event_id`, `skill_id`, `user_id`, `mark`) VALUES
(53, 5, 7, NULL),
(53, 5, 8, 0),
(54, 5, 5, NULL),
(54, 5, 7, 0),
(56, 5, 7, 0);

-- --------------------------------------------------------

--
-- Structure de la table `l_project_user`
--

CREATE TABLE `l_project_user` (
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `istutor` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `l_project_user`
--

INSERT INTO `l_project_user` (`user_id`, `project_id`, `istutor`) VALUES
(4, 1, 0),
(4, 4, 0),
(4, 36, 1),
(5, 1, 0),
(5, 4, 0),
(5, 35, 0),
(5, 36, 0),
(7, 36, 0),
(8, 4, 0),
(9, 37, 1);

-- --------------------------------------------------------

--
-- Structure de la table `l_skill_project`
--

CREATE TABLE `l_skill_project` (
  `project_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `l_skill_project`
--

INSERT INTO `l_skill_project` (`project_id`, `skill_id`) VALUES
(1, 1),
(34, 3),
(35, 3),
(37, 3),
(34, 4),
(35, 4),
(34, 5),
(35, 5),
(4, 6),
(34, 6),
(35, 6),
(36, 13),
(37, 13),
(36, 14),
(36, 15),
(36, 16),
(36, 18),
(37, 18),
(37, 19),
(37, 21),
(37, 22);

-- --------------------------------------------------------

--
-- Structure de la table `l_user_skill`
--

CREATE TABLE `l_user_skill` (
  `mark` int(11) DEFAULT NULL,
  `open` tinyint(1) DEFAULT NULL,
  `skill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `l_user_skill`
--

INSERT INTO `l_user_skill` (`mark`, `open`, `skill_id`, `user_id`) VALUES
(5, 1, 1, 4),
(5, 1, 1, 6),
(5, 1, 1, 8),
(4, 1, 3, 4),
(1, 0, 3, 5),
(5, 1, 3, 6),
(3, 1, 3, 7),
(4, 1, 3, 8),
(5, 1, 4, 4),
(5, 1, 4, 6),
(2, 0, 5, 4),
(5, 1, 5, 6),
(4, 1, 6, 4),
(4, 1, 6, 6),
(4, 1, 7, 5),
(4, 0, 7, 7),
(3, 1, 9, 5),
(4, 1, 10, 8),
(4, 0, 12, 6),
(4, 1, 12, 7),
(3, 1, 13, 5),
(5, 1, 13, 6),
(3, 0, 14, 6),
(5, 1, 16, 5);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `nextAvailable`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `nextAvailable` (
`available_id` int(11)
,`startdate` datetime
,`duration` datetime
,`user_id` int(11)
,`lname` varchar(255)
,`fname` varchar(255)
,`phone` varchar(25)
,`mail` varchar(25)
,`password` varchar(255)
,`bio` varchar(255)
,`avatar` varchar(255)
,`website` varchar(255)
,`discord` varchar(255)
,`facebook` varchar(255)
,`linkedin` varchar(255)
,`skype` varchar(25)
,`git` varchar(255)
,`auth` int(11)
,`grade_id` int(11)
,`school_id` int(11)
,`user_key` varchar(25)
);

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `askingHelp` tinyint(1) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `slack` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `project`
--

INSERT INTO `project` (`project_id`, `name`, `askingHelp`, `description`, `github`, `slack`, `img`) VALUES
(1, 'Sweet', 1, 'Romain a sweet', '', '', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/42/David_Douillet.jpg/800px-David_Douillet.jpg'),
(4, 'Bibliorange', 0, 'biblio de merde', '', '', 'http://ville-sussargues.fr/wordpress/wp-content/uploads/2014/10/bibliotheque-web.jpg'),
(34, 'Helspi', 1, 'Aide communautaire', 'https://github.com/plagnol', 'https://slack.com', 'https://www.vitalchek.com/cms/images/contactus.jpg'),
(35, 'Projet Test', 0, 'Ceci est un test', 'https://github.com/plagnol', 'https://slack.com', 'https://cdn.shopify.com/s/files/1/1103/1414/products/Crash_Test_Approval_Logo_jpg_format_large.jpg?v=1495764380'),
(36, 'pol é for', 1, 'mention bien c fou', 'https://github.com/plagnol', 'https://slack.com', 'https://static.lexpress.fr/min/images/palmares/exam_results/bien+72fd4deacca74367b3469cc2d8643d2e26becdcdab7376c5fc0d6d3f5c0024b0.png'),
(37, 'Le projet nul', 0, 'Bof Bof', 'test', 'test', 'http://mihacolner.com/wp-content/uploads/2015/07/Tadej-Vaukman-07.jpg');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `ProjectList`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `ProjectList` (
`project_id` int(11)
,`name` varchar(255)
,`askingHelp` tinyint(1)
,`description` varchar(255)
,`github` varchar(255)
,`slack` varchar(255)
,`img` varchar(255)
,`user_id` int(11)
,`lname` varchar(255)
,`fname` varchar(255)
,`phone` varchar(25)
,`mail` varchar(25)
,`password` varchar(255)
,`bio` varchar(255)
,`avatar` varchar(255)
,`website` varchar(255)
,`discord` varchar(255)
,`facebook` varchar(255)
,`linkedin` varchar(255)
,`skype` varchar(25)
,`git` varchar(255)
,`auth` int(11)
,`grade_id` int(11)
,`school_id` int(11)
,`user_key` varchar(25)
,`skill_id` int(11)
,`SkillName` varchar(255)
,`category_id` int(11)
,`city` varchar(25)
,`grade_name` varchar(25)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `ProjectSkills`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `ProjectSkills` (
`project_id` int(11)
,`name` varchar(255)
,`askingHelp` tinyint(1)
,`description` varchar(255)
,`github` varchar(255)
,`slack` varchar(255)
,`img` varchar(255)
,`skill_id` int(11)
,`Skillname` varchar(255)
,`category_id` int(11)
,`CategoryName` varchar(255)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `projetOk`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `projetOk` (
`project_id` int(11)
,`name` varchar(255)
,`askingHelp` tinyint(1)
,`description` varchar(255)
,`github` varchar(255)
,`slack` varchar(255)
,`img` varchar(255)
,`user_id` int(11)
,`istutor` tinyint(1)
);

-- --------------------------------------------------------

--
-- Structure de la table `school`
--

CREATE TABLE `school` (
  `school_id` int(11) NOT NULL,
  `city` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `school`
--

INSERT INTO `school` (`school_id`, `city`) VALUES
(1, 'Arras'),
(2, 'Bordeaux'),
(3, 'Brest'),
(4, 'Grenoble'),
(5, 'Lille'),
(6, 'Lyon'),
(7, 'Montpellier'),
(8, 'Nantes'),
(9, 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

CREATE TABLE `skill` (
  `skill_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `skill`
--

INSERT INTO `skill` (`skill_id`, `name`, `category_id`) VALUES
(1, 'C', 1),
(2, 'C++', 1),
(3, 'PHP', 1),
(4, 'HTML', 1),
(5, 'CSS', 1),
(6, 'MySQL', 1),
(7, 'Windows', 2),
(8, 'Linux', 2),
(9, 'Merise', 3),
(10, 'UML', 3),
(11, 'SQL Server', 3),
(12, 'C#', 1),
(13, 'PHP Symphony', 1),
(14, 'Javascript', 1),
(15, 'JQuery', 1),
(16, 'UX Design', 1),
(17, 'Réseau topologies', 2),
(18, 'Java', 1),
(19, 'JEE', 1),
(21, 'SGBD Oracle', 3),
(22, 'Algorithmique', 1),
(23, 'Modélisation décisionnelle', 7),
(24, 'NoSQL', 7),
(26, 'Mobilité et systèmes embarqués', 8),
(27, 'Intelligence artificielle', 8),
(28, 'Virtualisation et cloud computing', 9),
(29, 'Sécurité infrastructure', 9),
(30, 'Qualité des données', 7);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `SkillByCategory`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `SkillByCategory` (
`category` varchar(255)
,`skillname` varchar(255)
,`skill_id` int(11)
,`category_id` int(11)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `TotalMarkByTutor`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `TotalMarkByTutor` (
`mark` decimal(14,4)
,`user_id` int(11)
,`lname` varchar(255)
,`fname` varchar(255)
,`phone` varchar(25)
,`mail` varchar(25)
,`password` varchar(255)
,`bio` varchar(255)
,`avatar` varchar(255)
,`website` varchar(255)
,`discord` varchar(255)
,`facebook` varchar(255)
,`linkedin` varchar(255)
,`skype` varchar(25)
,`git` varchar(255)
,`auth` int(11)
,`grade_id` int(11)
,`school_id` int(11)
,`user_key` varchar(25)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `TutorList`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `TutorList` (
`grade_name` varchar(25)
,`user_id` int(11)
,`lname` varchar(255)
,`fname` varchar(255)
,`phone` varchar(25)
,`mail` varchar(25)
,`password` varchar(255)
,`bio` varchar(255)
,`avatar` varchar(255)
,`website` varchar(255)
,`discord` varchar(255)
,`facebook` varchar(255)
,`linkedin` varchar(255)
,`skype` varchar(25)
,`git` varchar(255)
,`auth` int(11)
,`grade_id` int(11)
,`school_id` int(11)
,`user_key` varchar(25)
,`city` varchar(25)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `TutorsBySkills`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `TutorsBySkills` (
`skillname` varchar(255)
,`user_id` int(11)
,`lname` varchar(255)
,`fname` varchar(255)
,`phone` varchar(25)
,`mail` varchar(25)
,`password` varchar(255)
,`bio` varchar(255)
,`avatar` varchar(255)
,`website` varchar(255)
,`discord` varchar(255)
,`facebook` varchar(255)
,`linkedin` varchar(255)
,`skype` varchar(25)
,`git` varchar(255)
,`auth` int(11)
,`grade_id` int(11)
,`school_id` int(11)
,`user_key` varchar(25)
,`mark` int(11)
,`city` varchar(25)
,`gradename` varchar(25)
,`skill_id` int(11)
);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`type_id`, `name`) VALUES
(1, 'Visioconférence'),
(2, 'Réel'),
(3, 'Textuel');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `mail` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `discord` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `skype` varchar(25) DEFAULT NULL,
  `git` varchar(255) DEFAULT NULL,
  `auth` int(11) DEFAULT NULL,
  `grade_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `user_key` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`user_id`, `lname`, `fname`, `phone`, `mail`, `password`, `bio`, `avatar`, `website`, `discord`, `facebook`, `linkedin`, `skype`, `git`, `auth`, `grade_id`, `school_id`, `user_key`) VALUES
(4, 'Plagnol', 'Antoine', '0652982835', 'antoine.plagnol@epsi.fr', '57045c9761d0115d6b0b338b424f47b59274a2c5', 'Je suis sympa, montpellier', 'https://ih0.redbubble.net/image.192092202.0973/flat,800x800,075,f.u1.jpg', 'Modifier', 'Tutti', 'Antoine Plagnol', '$linkedin', '$skype', '$git', 1, 1, 1, 'sgXeIQoXPgE2bbAbpF6yrBY1Q'),
(5, 'douillet', 'david', '0132656530', 'd.douillet@epsi.fr', 'f946d00daac3b58f8609fe57710a7d4e5d2db973', 'Je suis david ', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/42/David_Douillet.jpg/800px-David_Douillet.jpg', '', '', '', '', '', '', 1, 3, 7, 'mdCpHCI3W6pcVuJvFuG3okdiT'),
(6, 'Perrin', 'Anthony', '0631785656', 'anthonyperrinff@gmail.com', 'd35b359a6b08400cceeeb9e61a79906b309f0fec', 'J\'ai toujours été passioné par l\'informatique, assez, du moins, pour avoir une question en tête depuis maintenant des années: \" Comment ça fonctione ? \". La grande question qui pousse ma grande curiosité, celle qui a fait de moi, celui qui en cherchera la', 'https://pbs.twimg.com/profile_images/839900475205955585/FMzXSOkV_400x400.jpg', 'https://www.anthony-perrin.fr', 'SerahF#6374', 'anthony.perrin.ff', 'anthony-perrin-epsi', 'dopeultony', 'anthonyperrin', 1, 1, 7, '7Qk8thrOSVQ4MLifVKE82LG7z'),
(7, 'Noble', 'Pierre', '0625534218', 'pierre.noble@epsi.fr', 'd5d546ae2b0340c491e77aba201aa36ede61d51e', 'Yoyoyo', 'https://www.google.fr/search?q=saitama&client=firefox-b-ab&dcr=0&source=lnms&tbm=isch&sa=X&ved=0ahUKEwiJsZaC4_3ZAhXCAJoKHavFCWgQ_AUICigB&biw=1536&bih=727#imgrc=zPopVyU4z8QOUM:', '', '', '', '', '', '', 1, 1, 7, 'mhbRMjrkb5VkUaLsMjPlWmiVf'),
(8, 'Saunier', 'Tom', '01234567869', 'tomsaunier@orange.fr', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'test tom', 'https://pbs.twimg.com/profile_images/824716853989744640/8Fcd0bji_400x400.jpg', '', '', '', '', '', '', 1, 1, 7, 'rkxsSmJSvYFBv2SgHZPCkTd1F'),
(9, 'pierre', 'Henri', '1589658478', 'pierre.henri@hotmail.fr', '9cf95dacd226dcf43da376cdb6cbba7035218921', '', 'a', '', '', '', '', '', '', 1, 1, 7, 'FjuI4hTmK4bVBHMizST8vZPXk');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `UserProject`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `UserProject` (
`user_key` varchar(25)
,`user_id` int(11)
,`project_id` int(11)
,`istutor` tinyint(1)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `WeeksEvents`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `WeeksEvents` (
`event_id` int(11)
,`startdate` datetime
,`enddate` datetime
,`type_id` int(11)
,`user_tutor_id` int(11)
,`roaster` int(11)
);

-- --------------------------------------------------------

--
-- Structure de la vue `eventPastList`
--
DROP TABLE IF EXISTS `eventPastList`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `eventPastList`  AS  select `l_event_skill_user`.`event_id` AS `event_id`,`l_event_skill_user`.`skill_id` AS `skill_id`,`l_event_skill_user`.`user_id` AS `user_id`,`l_event_skill_user`.`mark` AS `mark`,`event`.`startdate` AS `startdate`,`event`.`enddate` AS `enddate`,`event`.`user_tutor_id` AS `user_tutor_id` from (`event` join `l_event_skill_user`) where (`event`.`event_id` = `l_event_skill_user`.`event_id`) having (`event`.`enddate` < now()) ;

-- --------------------------------------------------------

--
-- Structure de la vue `nextAvailable`
--
DROP TABLE IF EXISTS `nextAvailable`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nextAvailable`  AS  select `available`.`available_id` AS `available_id`,`available`.`startdate` AS `startdate`,`available`.`duration` AS `duration`,`user`.`user_id` AS `user_id`,`user`.`lname` AS `lname`,`user`.`fname` AS `fname`,`user`.`phone` AS `phone`,`user`.`mail` AS `mail`,`user`.`password` AS `password`,`user`.`bio` AS `bio`,`user`.`avatar` AS `avatar`,`user`.`website` AS `website`,`user`.`discord` AS `discord`,`user`.`facebook` AS `facebook`,`user`.`linkedin` AS `linkedin`,`user`.`skype` AS `skype`,`user`.`git` AS `git`,`user`.`auth` AS `auth`,`user`.`grade_id` AS `grade_id`,`user`.`school_id` AS `school_id`,`user`.`user_key` AS `user_key` from (`available` join `user`) where ((`available`.`duration` > now()) and (`user`.`user_id` = `available`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `ProjectList`
--
DROP TABLE IF EXISTS `ProjectList`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ProjectList`  AS  select `project`.`project_id` AS `project_id`,`project`.`name` AS `name`,`project`.`askingHelp` AS `askingHelp`,`project`.`description` AS `description`,`project`.`github` AS `github`,`project`.`slack` AS `slack`,`project`.`img` AS `img`,`user`.`user_id` AS `user_id`,`user`.`lname` AS `lname`,`user`.`fname` AS `fname`,`user`.`phone` AS `phone`,`user`.`mail` AS `mail`,`user`.`password` AS `password`,`user`.`bio` AS `bio`,`user`.`avatar` AS `avatar`,`user`.`website` AS `website`,`user`.`discord` AS `discord`,`user`.`facebook` AS `facebook`,`user`.`linkedin` AS `linkedin`,`user`.`skype` AS `skype`,`user`.`git` AS `git`,`user`.`auth` AS `auth`,`user`.`grade_id` AS `grade_id`,`user`.`school_id` AS `school_id`,`user`.`user_key` AS `user_key`,`skill`.`skill_id` AS `skill_id`,`skill`.`name` AS `SkillName`,`skill`.`category_id` AS `category_id`,`school`.`city` AS `city`,`grade`.`name` AS `grade_name` from ((((((`project` join `user`) join `l_project_user`) join `l_skill_project`) join `skill`) join `school`) join `grade`) where ((`l_project_user`.`user_id` = `user`.`user_id`) and (`l_project_user`.`project_id` = `project`.`project_id`) and (`l_skill_project`.`project_id` = `project`.`project_id`) and (`l_skill_project`.`skill_id` = `skill`.`skill_id`) and (`user`.`school_id` = `school`.`school_id`) and (`grade`.`grade_id` = `user`.`grade_id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `ProjectSkills`
--
DROP TABLE IF EXISTS `ProjectSkills`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ProjectSkills`  AS  select `project`.`project_id` AS `project_id`,`project`.`name` AS `name`,`project`.`askingHelp` AS `askingHelp`,`project`.`description` AS `description`,`project`.`github` AS `github`,`project`.`slack` AS `slack`,`project`.`img` AS `img`,`skill`.`skill_id` AS `skill_id`,`skill`.`name` AS `Skillname`,`skill`.`category_id` AS `category_id`,`category`.`name` AS `CategoryName` from (((`project` join `skill`) join `l_skill_project`) join `category`) where ((`l_skill_project`.`project_id` = `project`.`project_id`) and (`l_skill_project`.`skill_id` = `skill`.`skill_id`) and (`skill`.`category_id` = `category`.`category_id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `projetOk`
--
DROP TABLE IF EXISTS `projetOk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `projetOk`  AS  select `project`.`project_id` AS `project_id`,`project`.`name` AS `name`,`project`.`askingHelp` AS `askingHelp`,`project`.`description` AS `description`,`project`.`github` AS `github`,`project`.`slack` AS `slack`,`project`.`img` AS `img`,`l_project_user`.`user_id` AS `user_id`,`l_project_user`.`istutor` AS `istutor` from (`project` join `l_project_user`) where (`project`.`project_id` = `l_project_user`.`project_id`) having (`l_project_user`.`istutor` = 1) ;

-- --------------------------------------------------------

--
-- Structure de la vue `SkillByCategory`
--
DROP TABLE IF EXISTS `SkillByCategory`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `SkillByCategory`  AS  select `category`.`name` AS `category`,`skill`.`name` AS `skillname`,`skill`.`skill_id` AS `skill_id`,`category`.`category_id` AS `category_id` from (`category` join `skill`) where (`skill`.`category_id` = `category`.`category_id`) order by `category`.`name` ;

-- --------------------------------------------------------

--
-- Structure de la vue `TotalMarkByTutor`
--
DROP TABLE IF EXISTS `TotalMarkByTutor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `TotalMarkByTutor`  AS  select avg(`l_event_skill_user`.`mark`) AS `mark`,`user`.`user_id` AS `user_id`,`user`.`lname` AS `lname`,`user`.`fname` AS `fname`,`user`.`phone` AS `phone`,`user`.`mail` AS `mail`,`user`.`password` AS `password`,`user`.`bio` AS `bio`,`user`.`avatar` AS `avatar`,`user`.`website` AS `website`,`user`.`discord` AS `discord`,`user`.`facebook` AS `facebook`,`user`.`linkedin` AS `linkedin`,`user`.`skype` AS `skype`,`user`.`git` AS `git`,`user`.`auth` AS `auth`,`user`.`grade_id` AS `grade_id`,`user`.`school_id` AS `school_id`,`user`.`user_key` AS `user_key` from ((`l_event_skill_user` join `user`) join `event`) where ((`l_event_skill_user`.`event_id` = `event`.`event_id`) and (`l_event_skill_user`.`user_id` = `user`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `TutorList`
--
DROP TABLE IF EXISTS `TutorList`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `TutorList`  AS  select distinct `grade`.`name` AS `grade_name`,`user`.`user_id` AS `user_id`,`user`.`lname` AS `lname`,`user`.`fname` AS `fname`,`user`.`phone` AS `phone`,`user`.`mail` AS `mail`,`user`.`password` AS `password`,`user`.`bio` AS `bio`,`user`.`avatar` AS `avatar`,`user`.`website` AS `website`,`user`.`discord` AS `discord`,`user`.`facebook` AS `facebook`,`user`.`linkedin` AS `linkedin`,`user`.`skype` AS `skype`,`user`.`git` AS `git`,`user`.`auth` AS `auth`,`user`.`grade_id` AS `grade_id`,`user`.`school_id` AS `school_id`,`user`.`user_key` AS `user_key`,`school`.`city` AS `city` from ((((`TotalMarkByTutor` join `grade`) join `user`) join `l_user_skill`) join `school`) where ((`user`.`school_id` = `school`.`school_id`) and (`user`.`user_id` = `l_user_skill`.`user_id`) and (`grade`.`grade_id` = `user`.`grade_id`) and (`l_user_skill`.`open` = 1)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `TutorsBySkills`
--
DROP TABLE IF EXISTS `TutorsBySkills`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `TutorsBySkills`  AS  select `skill`.`name` AS `skillname`,`user`.`user_id` AS `user_id`,`user`.`lname` AS `lname`,`user`.`fname` AS `fname`,`user`.`phone` AS `phone`,`user`.`mail` AS `mail`,`user`.`password` AS `password`,`user`.`bio` AS `bio`,`user`.`avatar` AS `avatar`,`user`.`website` AS `website`,`user`.`discord` AS `discord`,`user`.`facebook` AS `facebook`,`user`.`linkedin` AS `linkedin`,`user`.`skype` AS `skype`,`user`.`git` AS `git`,`user`.`auth` AS `auth`,`user`.`grade_id` AS `grade_id`,`user`.`school_id` AS `school_id`,`user`.`user_key` AS `user_key`,`l_user_skill`.`mark` AS `mark`,`school`.`city` AS `city`,`grade`.`name` AS `gradename`,`skill`.`skill_id` AS `skill_id` from ((((`user` join `l_user_skill`) join `skill`) join `school`) join `grade`) where ((`l_user_skill`.`open` = 1) and (`l_user_skill`.`user_id` = `user`.`user_id`) and (`l_user_skill`.`skill_id` = `skill`.`skill_id`) and (`user`.`school_id` = `school`.`school_id`) and (`user`.`grade_id` = `grade`.`grade_id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `UserProject`
--
DROP TABLE IF EXISTS `UserProject`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `UserProject`  AS  select `user`.`user_key` AS `user_key`,`l_project_user`.`user_id` AS `user_id`,`l_project_user`.`project_id` AS `project_id`,`l_project_user`.`istutor` AS `istutor` from ((`user` join `l_project_user`) join `project`) where ((`project`.`project_id` = `l_project_user`.`project_id`) and (`user`.`user_id` = `l_project_user`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `WeeksEvents`
--
DROP TABLE IF EXISTS `WeeksEvents`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `WeeksEvents`  AS  select `event`.`event_id` AS `event_id`,`event`.`startdate` AS `startdate`,`event`.`enddate` AS `enddate`,`event`.`type_id` AS `type_id`,`event`.`user_tutor_id` AS `user_tutor_id`,`event`.`roaster` AS `roaster` from `event` where (`event`.`enddate` > now()) ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `available`
--
ALTER TABLE `available`
  ADD PRIMARY KEY (`available_id`),
  ADD KEY `FK_available_user_id` (`user_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `FK_l_event_skill_user_user_tutor_id` (`user_tutor_id`),
  ADD KEY `FK_type_id` (`type_id`);

--
-- Index pour la table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Index pour la table `l_event_skill_user`
--
ALTER TABLE `l_event_skill_user`
  ADD PRIMARY KEY (`event_id`,`skill_id`,`user_id`),
  ADD KEY `FK_l_event_skill_user_skill_id` (`skill_id`),
  ADD KEY `FK_l_event_skill_user_user_id` (`user_id`);

--
-- Index pour la table `l_project_user`
--
ALTER TABLE `l_project_user`
  ADD PRIMARY KEY (`user_id`,`project_id`),
  ADD KEY `FK_l_project_user_project_id` (`project_id`);

--
-- Index pour la table `l_skill_project`
--
ALTER TABLE `l_skill_project`
  ADD PRIMARY KEY (`skill_id`,`project_id`),
  ADD KEY `FK_l_skill_project_project_id` (`project_id`);

--
-- Index pour la table `l_user_skill`
--
ALTER TABLE `l_user_skill`
  ADD PRIMARY KEY (`skill_id`,`user_id`),
  ADD KEY `FK_l_user_skill_user_id` (`user_id`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Index pour la table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- Index pour la table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`skill_id`),
  ADD KEY `FK_skill_category_id` (`category_id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `FK_user_grade_id` (`grade_id`),
  ADD KEY `FK_user_school_id` (`school_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `available`
--
ALTER TABLE `available`
  MODIFY `available_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT pour la table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT pour la table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `skill`
--
ALTER TABLE `skill`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `available`
--
ALTER TABLE `available`
  ADD CONSTRAINT `FK_available_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_l_event_skill_user_user_tutor_id` FOREIGN KEY (`user_tutor_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_type_id` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `l_event_skill_user`
--
ALTER TABLE `l_event_skill_user`
  ADD CONSTRAINT `FK_l_event_skill_user_event_id` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_l_event_skill_user_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`skill_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_l_event_skill_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `l_project_user`
--
ALTER TABLE `l_project_user`
  ADD CONSTRAINT `FK_l_project_user_project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_l_project_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `l_skill_project`
--
ALTER TABLE `l_skill_project`
  ADD CONSTRAINT `FK_l_skill_project_project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_l_skill_project_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`skill_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `l_user_skill`
--
ALTER TABLE `l_user_skill`
  ADD CONSTRAINT `FK_l_user_skill_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`skill_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_l_user_skill_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_grade_id` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`grade_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_user_school_id` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
