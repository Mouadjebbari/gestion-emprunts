-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 21 mars 2023 à 02:16
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_emprunts`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `id_adherent` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `cin` varchar(20) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `date_incription` date DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`id_adherent`, `nom`, `adresse`, `email`, `telephone`, `cin`, `date_naissance`, `type`, `nickname`, `mot_de_passe`, `date_incription`, `prenom`) VALUES
(1, 'mouad', 'jirari01 rue23', 'jebbari.mouad.solicode@gmail.com', '0698926631', 'KB2048702', '2023-02-28', 'etudiant', 'mouadjbr', '1912', '2023-03-13', 'jebbari'),
(2, 'nina', 'dfghj', 'jebbari.mouad.solicode@gmail.com', '0698926631', 'KB2048702', '2023-02-28', 'employe', 'ninanono', '2004', '2023-03-13', 'nani'),
(3, 'komira', 'jirari01 rue23', 'jebbari.mouad.solicode@gmail.com', '0698926631', 'kb2344', '2023-03-01', 'femme-au-foyer', 'hafsa', '555', '2023-03-13', 'jebbari'),
(4, 'imad', 'awama', 'barbar@gmail.com', '0771176641', 'kb123456', '2023-03-06', 'employe', 'imadmad', '2004', '2023-03-20', 'bakali');

-- --------------------------------------------------------

--
-- Structure de la table `bibliothecaire`
--

CREATE TABLE `bibliothecaire` (
  `id_bibliothecaire` int(11) NOT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id_emprunt` int(11) NOT NULL,
  `date_emprunt` date DEFAULT NULL,
  `date_retour_effectif` date DEFAULT NULL,
  `id_reservation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ouvrage`
--

CREATE TABLE `ouvrage` (
  `id_ouvrage` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `auteur` varchar(255) DEFAULT NULL,
  `image_couverture` varchar(255) DEFAULT NULL,
  `etat` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `date_edition` date DEFAULT NULL,
  `date_achat` date DEFAULT NULL,
  `nombre_pages` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ouvrage`
--

INSERT INTO `ouvrage` (`id_ouvrage`, `code`, `titre`, `auteur`, `image_couverture`, `etat`, `type`, `date_edition`, `date_achat`, `nombre_pages`) VALUES
(1, NULL, ' mervelle', 'ahmed sefroui', 'https://i2.wp.com/www.rjeem.com/wp-content/uploads/2018/12/79971273_o-1.jpg?fit=239%2C320&ssl=1', 'Déchiré', 'roman', '2023-03-07', '2023-03-08', 500),
(2, NULL, 'boite a mervelle', 'ahmed sefroui', 'https://i2.wp.com/www.rjeem.com/wp-content/uploads/2018/12/79971273_o-1.jpg?fit=239%2C320&ssl=1', 'Déchiré', 'roman', '2023-03-07', '2023-03-08', 500),
(3, NULL, 'boite a mervelle', 'ahmed sefroui', 'https://i2.wp.com/www.rjeem.com/wp-content/uploads/2018/12/79971273_o-1.jpg?fit=239%2C320&ssl=1', NULL, 'roman', '2023-03-07', '2023-03-08', 500),
(4, NULL, 'hilighted in yellow', NULL, 'https://harpercollins-christian.imgix.net/covers/9781558538344.jpg?auto=format&w=800', 'Déchiré', 'book', NULL, NULL, 400),
(5, NULL, 'yellow', NULL, 'https://harpercollins-christian.imgix.net/covers/9781558538344.jpg?auto=format&w=800', 'good', 'book', NULL, NULL, 400),
(6, NULL, 'hilighted in yellow', NULL, 'https://harpercollins-christian.imgix.net/covers/9781558538344.jpg?auto=format&w=800', 'good', 'book', NULL, NULL, 400),
(7, NULL, 'hilighted in yellow', NULL, 'https://harpercollins-christian.imgix.net/covers/9781558538344.jpg?auto=format&w=800', 'good', 'book', NULL, NULL, 400),
(8, '123456', 'Le Petit Prince', 'Antoine de Saint-Exupéry', 'https://example.com/le-petit-prince.jpg', 'Neuf', 'Livre', '1943-04-06', '2022-02-01', 96),
(9, '234567', 'Harry Potter à l\'école des sorciers', 'J.K. Rowling', 'https://example.com/harry-potter-1.jpg', 'Bon état', 'Roman', '1997-06-26', '2021-07-15', 332),
(10, 'LIV1234', 'Le Comte de Monte Cristo', 'Alexandre Dumas', 'montecristo.jpg', 'Bon état', 'roman', '0000-00-00', '0000-00-00', 650),
(11, 'DVD5678', 'Pulp Fiction', 'Quentin Tarantino', 'pulpfiction.jpg', 'Neuf', 'DVD', '0000-00-00', '0000-00-00', NULL),
(12, 'MAG9012', 'National Geographic', NULL, 'natgeo.jpg', 'Bon état', 'magazine', '0000-00-00', '0000-00-00', NULL),
(13, 'ROM3456', 'Orgueil et Préjugés', 'Jane Austen', 'orgueilprejuges.jpg', 'Acceptable', 'roman', '0000-00-00', '0000-00-00', 416),
(14, 'LIV7890', 'L\'Étranger', 'Albert Camus', 'letranger.jpg', 'Assez usé', 'livre', '0000-00-00', '0000-00-00', 123),
(15, 'MAG3456', 'Vogue', NULL, 'vogue.jpg', 'Déchiré', 'magazine', '0000-00-00', '0000-00-00', NULL),
(16, 'DVD7890', 'Le Parrain', 'Francis Ford Coppola', 'leparrain.jpg', 'Neuf', 'DVD', '0000-00-00', '0000-00-00', NULL),
(17, 'DVD0123', 'Le Seigneur des Anneaux : La Communauté de l\'Anneau', 'J.R.R. Tolkien', 'seigneurdesanneaux.jpg', 'Bon état', 'DVD', '0000-00-00', '0000-00-00', NULL),
(18, 'ROM4567', 'Les Misérables', 'Victor Hugo', 'lesmiserables.jpg', 'Assez usé', 'roman', '0000-00-00', '0000-00-00', 1463),
(19, 'LIV8901', 'Le Petit Prince', 'Antoine de Saint-Exupéry', 'lepetitprince.jpg', 'Bon état', 'livre', '0000-00-00', '0000-00-00', 96),
(20, 'DVD7890', 'Le Parrain', 'Francis Ford Coppola', 'https://cps-static.rovicorp.com/1/adg/cov584/drt400/t424/t42439rm5xt.jpg', 'Neuf', 'DVD', '0000-00-00', '0000-00-00', NULL),
(21, 'DVD7891', 'Forrest Gump', 'Robert Zemeckis', 'https://images-na.ssl-images-amazon.com/images/I/51v5ZpFyaFL.AC.jpg', 'Neuf', 'DVD', '0000-00-00', '0000-00-00', NULL),
(22, 'DVD7892', 'Star Wars: Episode IV - A New Hope', 'George Lucas', 'https://images-na.ssl-images-amazon.com/images/I/81r+LN-YvRL.ACSL1500.jpg', 'Neuf', 'DVD', '0000-00-00', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `penalite`
--

CREATE TABLE `penalite` (
  `id_penalite` int(11) NOT NULL,
  `date_penalite` date DEFAULT NULL,
  `id_adherent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `date_reservation` date DEFAULT NULL,
  `date_expire` datetime DEFAULT NULL,
  `id_adherent` int(11) DEFAULT NULL,
  `id_ouvrage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `date_reservation`, `date_expire`, `id_adherent`, `id_ouvrage`) VALUES
(3, '2023-03-21', NULL, 4, 20),
(4, '2023-03-21', NULL, 4, 21),
(5, '2023-03-21', NULL, 4, 1),
(6, '2023-03-21', NULL, 4, 1),
(7, '2023-03-21', NULL, 4, 2),
(8, '2023-03-21', NULL, 4, 20),
(9, '2023-03-21', NULL, 4, 5),
(10, '2023-03-21', '2023-03-21 02:09:36', 4, 8);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id_adherent`);

--
-- Index pour la table `bibliothecaire`
--
ALTER TABLE `bibliothecaire`
  ADD PRIMARY KEY (`id_bibliothecaire`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id_emprunt`),
  ADD KEY `emprunt_ibfk_1` (`id_reservation`);

--
-- Index pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD PRIMARY KEY (`id_ouvrage`);

--
-- Index pour la table `penalite`
--
ALTER TABLE `penalite`
  ADD PRIMARY KEY (`id_penalite`),
  ADD KEY `penalite_ibfk_1` (`id_adherent`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `reservation_ibfk_2` (`id_ouvrage`),
  ADD KEY `reservation_ibfk_3` (`id_adherent`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id_adherent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `bibliothecaire`
--
ALTER TABLE `bibliothecaire`
  MODIFY `id_bibliothecaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id_emprunt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  MODIFY `id_ouvrage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `penalite`
--
ALTER TABLE `penalite`
  MODIFY `id_penalite` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`id_reservation`) REFERENCES `reservation` (`id_reservation`);

--
-- Contraintes pour la table `penalite`
--
ALTER TABLE `penalite`
  ADD CONSTRAINT `penalite_ibfk_1` FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_ouvrage`) REFERENCES `ouvrage` (`id_ouvrage`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
