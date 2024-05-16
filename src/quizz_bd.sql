-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 16 mai 2024 à 01:11
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `quizz_bd`
--

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id_matiere` int(2) NOT NULL,
  `nom_matiere` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id_matiere`, `nom_matiere`) VALUES
(1, 'Anglais'),
(2, 'Informatique'),
(3, 'Mathematique');

-- --------------------------------------------------------

--
-- Structure de la table `passed`
--

CREATE TABLE `passed` (
  `id_passed` int(11) NOT NULL,
  `passed` int(11) DEFAULT 0,
  `id_user` int(11) DEFAULT NULL,
  `id_matiere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `qcontenu` varchar(255) DEFAULT NULL,
  `matiere_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `qcontenu`, `matiere_id`) VALUES
(1, 'Quelle est la traduction anglaise du mot  maison\' ?', 1),
(2, 'Quel est le participe passé du verbe manger ?', 1),
(3, 'Quel est le synonyme du mot \'heureux\' ?', 1),
(4, 'Quel est l\'antonyme du mot \'grand\' ?', 1),
(5, 'Qui a écrit la pièce de théâtre \'Romeo and Juliet\' ?', 1),
(6, 'Qu\'est-ce que HTML ?', 2),
(7, 'Qu\'est-ce que CSS ?', 2),
(8, 'Qu\'est-ce que PHP ?', 2),
(9, 'Qu\'est-ce que JavaScript ?', 2),
(10, 'Qu\'est-ce que SQL ?', 2);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id_reponse` int(11) NOT NULL,
  `rcontenu` varchar(255) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `is_correct` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id_reponse`, `rcontenu`, `question_id`, `is_correct`) VALUES
(1, 'House', 1, 1),
(2, 'Car', 1, 0),
(3, 'Dog', 1, 0),
(4, 'Eaten', 2, 1),
(5, 'Drank', 2, 0),
(6, 'Played', 2, 0),
(7, 'Sad', 3, 0),
(8, 'Happy', 3, 1),
(9, 'Angry', 3, 0),
(10, 'Tall', 4, 0),
(11, 'Big', 4, 0),
(12, 'Small', 4, 1),
(13, 'William Shakespeare', 5, 1),
(14, 'Charles Dickens', 5, 0),
(15, 'Jane Austen', 5, 0),
(16, 'Hyperlink and Text Markup Language', 6, 0),
(17, 'Hypertext Markup Language', 6, 1),
(18, 'Home Tool Markup Language', 6, 0),
(19, 'Cascading Style Sheet', 7, 1),
(20, 'Creative Style Sheet', 7, 0),
(21, 'Computer Style Sheet', 7, 0),
(23, 'Private Hosting Platform', 8, 0),
(24, 'Personal Home Page', 8, 0),
(25, 'Hypertext Preprocessor', 8, 1),
(26, 'Structured Query Language', 10, 1),
(27, 'Simple Query Language', 10, 0),
(28, 'System Query Language', 10, 0);

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

CREATE TABLE `score` (
  `id_score` int(11) NOT NULL,
  `matiere_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `date_naiss` date NOT NULL,
  `niveau` varchar(10) NOT NULL,
  `isAdmin` int(1) NOT NULL DEFAULT 0,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `date_naiss`, `niveau`, `isAdmin`, `email`, `password`) VALUES
(1, 'Peughouia', 'Ange', '2002-11-14', 'CSI 2 ', 1, 'peughouia.44@gmail.com', 'bcdf387982c12c0ece866cfba5a7a663'),
(2, 'Tchoutang ', 'Euranie', '2006-01-15', 'CSI 2 ', 0, 'euranie@gmail.com', '5695f2f0b9a31e331befe144d2f2f304'),
(3, 'kaze', 'cedric', '2003-04-16', 'Niveau 3', 0, 'kaze@gmail.com', '660ad340bb006ec93fe78f0f5f7631b2'),
(4, 'toto', 'fred', '2024-05-09', 'Niveau 2', 0, 'toto@gmail.com', 'f71dbe52628a3f83a77ab494817525c6');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id_matiere`);

--
-- Index pour la table `passed`
--
ALTER TABLE `passed`
  ADD PRIMARY KEY (`id_passed`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_matiere` (`id_matiere`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matiere_id` (`matiere_id`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id_reponse`),
  ADD KEY `question_id` (`question_id`);

--
-- Index pour la table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id_score`),
  ADD KEY `matiere_id` (`matiere_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id_matiere` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `passed`
--
ALTER TABLE `passed`
  MODIFY `id_passed` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id_reponse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `score`
--
ALTER TABLE `score`
  MODIFY `id_score` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `passed`
--
ALTER TABLE `passed`
  ADD CONSTRAINT `passed_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `passed_ibfk_2` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id_matiere`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id_matiere`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`);

--
-- Contraintes pour la table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id_matiere`),
  ADD CONSTRAINT `score_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
