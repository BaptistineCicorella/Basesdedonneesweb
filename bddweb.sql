-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 08 mai 2023 à 17:57
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bddweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `Id_consult` int(11) NOT NULL,
  `Date_consult` date NOT NULL,
  `H_dbt_consult` datetime NOT NULL,
  `H_fin_consult` datetime NOT NULL,
  `Id_med` int(11) NOT NULL,
  `Id_pat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `consultation`
--

INSERT INTO `consultation` (`Id_consult`, `Date_consult`, `H_dbt_consult`, `H_fin_consult`, `Id_med`, `Id_pat`) VALUES
(0, '0000-00-00', '2023-05-29 11:00:00', '2023-05-29 11:15:00', 3, 2),
(1, '2023-05-08', '2023-05-08 17:47:12', '2023-05-08 17:47:12', 2, 1),
(2, '2023-05-05', '2023-05-08 17:47:12', '2023-05-08 17:47:12', 1, 2),
(3, '2023-05-08', '2023-05-10 15:00:00', '2023-05-08 16:00:00', 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `Id_med` int(11) NOT NULL,
  `Nom_med` varchar(50) CHARACTER SET ascii NOT NULL,
  `Prenom_med` varchar(25) CHARACTER SET ascii NOT NULL,
  `Adresse_med` varchar(60) CHARACTER SET ascii NOT NULL,
  `Tel_med` varchar(10) CHARACTER SET ascii NOT NULL,
  `Mail_mes` varchar(50) CHARACTER SET ascii NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`Id_med`, `Nom_med`, `Prenom_med`, `Adresse_med`, `Tel_med`, `Mail_mes`) VALUES
(1, 'Bernard', 'Sylvie', '5 av Pierre Mend?s France, 69500 Bron', '6546', 'sylvie.bernard@gmail.com'),
(2, 'Macron', 'Emmanuel', '5 av Pierre Mend?s France, 69500 Bron', '55478', 'emmanuel.macron@gmail.com'),
(3, 'Prix', 'Franck', '5 av Pierre Mend?s France, 69500 Bron', '7654', 'franck.prix@gmail.com'),
(14, 'Loups', 'Noah', '5 av Pierre Mend?s France, 69500 Bron', '8765', 'noah.loups@gmail.com'),
(16, 'Darmanin', 'Gerard', '5 av Pierre Mend?s France, 69500 Bron', '76589', 'gerard.darmanin@gmail.com'),
(17, 'Prix', 'Franck', '5 av Pierre Mend?s France, 69500 Bron', '1234', 'franck.prix@gmail.com'),
(20, 'Lepen', 'Marine', '5 avenue pierre mendes', '7654', 'marine.lepen@gmail.com'),
(21, 'Dusop', 'Philippe', '5 avenue pierre mendes', '1675', 'philippe.dusop@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `Id_pat` int(11) NOT NULL,
  `Nom_pat` varchar(50) CHARACTER SET ascii NOT NULL,
  `Prenom_pat` varchar(25) CHARACTER SET ascii NOT NULL,
  `Adresse_pat` varchar(60) CHARACTER SET ascii NOT NULL,
  `Tel_pat` varchar(10) CHARACTER SET ascii NOT NULL,
  `Mail_pat` varchar(50) CHARACTER SET ascii NOT NULL,
  `Date_naiss_pat` date NOT NULL,
  `Sexe_pat` varchar(1) CHARACTER SET ascii NOT NULL,
  `Mutu_pat` varchar(20) CHARACTER SET ascii NOT NULL,
  `GS_pat` varchar(3) CHARACTER SET ascii NOT NULL,
  `Date_Crea_dossier` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`Id_pat`, `Nom_pat`, `Prenom_pat`, `Adresse_pat`, `Tel_pat`, `Mail_pat`, `Date_naiss_pat`, `Sexe_pat`, `Mutu_pat`, `GS_pat`, `Date_Crea_dossier`) VALUES
(1, 'Recard', 'Anouchka', '300 avenue Einstein Lyon 5 ', '1234', 'anouchka.recard@gmail.com', '2000-08-01', 'F', 'Apivia', 'A', '2012-12-12'),
(2, 'Cicorella', 'Noah', '310 avenue Einstein Lyon 5 ', '7654', 'noah.cicorella@gmail.com', '2004-09-17', 'F', 'Mutmut', 'O', '2012-12-12'),
(3, 'Cicorella', 'Sylvie', '8 avenue Pierre Lyon 7', '9886', 'sylvie.cicorella@gmail.com', '1971-01-01', 'F', 'Lol', 'B', '2013-05-05');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`Id_consult`),
  ADD KEY `Id_med_consult` (`Id_med`) USING BTREE,
  ADD KEY `Id_pat_consult` (`Id_pat`) USING BTREE;

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`Id_med`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Id_pat`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `Id_med` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `Id_pat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
