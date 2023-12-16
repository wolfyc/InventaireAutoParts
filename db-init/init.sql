-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Dec 16, 2023 at 09:19 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaireAutoParts`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categorie`
--

CREATE TABLE `Categorie` (
  `ID_Categorie` int NOT NULL,
  `Nom_Categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Categorie`
--

INSERT INTO `Categorie` (`ID_Categorie`, `Nom_Categorie`) VALUES
(4, 'pneumatiques');

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
  `ID_Client` int NOT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  `Téléphone` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Client`
--

INSERT INTO `Client` (`ID_Client`, `Nom`, `Adresse`, `Téléphone`, `Email`) VALUES
(12, 'achraf', 'setif', '0620386764', 'kjh@lkjh.com'),
(13, 'zaidi', 'paris', '06231262', 'kljkjl@lkjlj.com'),
(27, 'hello', 'lkjlj', '06203565', 'azlekrj@lzekj.com');

-- --------------------------------------------------------

--
-- Table structure for table `Commande_Client`
--

CREATE TABLE `Commande_Client` (
  `ID_Commande_Client` int NOT NULL,
  `Date_Commande` date DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL,
  `ID_Client` int DEFAULT NULL,
  `reglé` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Commande_Fournisseur`
--

CREATE TABLE `Commande_Fournisseur` (
  `ID_Commande_Fournisseur` int NOT NULL,
  `Date_Commande` date DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL,
  `ID_Fournisseur` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Détail_Commande_Client`
--

CREATE TABLE `Détail_Commande_Client` (
  `ID_Commande_Client` int NOT NULL,
  `ID_Pièce` int NOT NULL,
  `Quantité` int NOT NULL,
  `Prix_Unitaire` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Détail_Commande_Fournisseur`
--

CREATE TABLE `Détail_Commande_Fournisseur` (
  `ID_Commande_Fournisseur` int NOT NULL,
  `ID_Pièce` int NOT NULL,
  `Quantité` int NOT NULL,
  `Prix_Unitaire` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Fournisseur`
--

CREATE TABLE `Fournisseur` (
  `ID_Fournisseur` int NOT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  `Téléphone` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Fournisseur`
--

INSERT INTO `Fournisseur` (`ID_Fournisseur`, `Nom`, `Adresse`, `Téléphone`, `Email`) VALUES
(1, 'four100000', 'boob2', '220620386764', 'zaidimedh@gmail.com'),
(4, 'AKram', 'setif', '0620386764', 'akrame@hotmai.com'),
(7, 'AKram', 'setif', '0620386764', 'akrame2@hotmai.com'),
(9, ';:sdfm', 'lkqmsjdfm', '1613513sdf', 'mlkj@mlkj.com');

-- --------------------------------------------------------

--
-- Table structure for table `Pièce`
--

CREATE TABLE `Pièce` (
  `ID_Pièce` int NOT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `ID_Categorie` int DEFAULT NULL,
  `Référence` varchar(50) DEFAULT NULL,
  `Prix_achat_TTC` decimal(10,2) DEFAULT NULL,
  `prix_vente_TTC` decimal(10,2) DEFAULT NULL,
  `Quantité_en_stock` int DEFAULT NULL,
  `Quantité_minimale` int DEFAULT NULL,
  `ID_Fournisseur` int DEFAULT NULL,
  `Marque` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Pièce`
--

INSERT INTO `Pièce` (`ID_Pièce`, `Nom`, `ID_Categorie`, `Référence`, `Prix_achat_TTC`, `prix_vente_TTC`, `Quantité_en_stock`, `Quantité_minimale`, `ID_Fournisseur`, `Marque`) VALUES
(7, 'sdfssdffd', 9, '1235645', 12.00, 15.00, 12, 2, 1, '12'),
(10, 'melo', 4, '101000', 10.00, 15.00, 20, 3, 7, 'vw'),
(11, 'jointeeee', 4, '1235645df', 10.00, 105.00, 10, 2, 1, 'vw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`ID_Categorie`),
  ADD UNIQUE KEY `nom` (`Nom_Categorie`);

--
-- Indexes for table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`ID_Client`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `Commande_Client`
--
ALTER TABLE `Commande_Client`
  ADD PRIMARY KEY (`ID_Commande_Client`),
  ADD KEY `ID_Client` (`ID_Client`);

--
-- Indexes for table `Commande_Fournisseur`
--
ALTER TABLE `Commande_Fournisseur`
  ADD PRIMARY KEY (`ID_Commande_Fournisseur`),
  ADD KEY `ID_Fournisseur` (`ID_Fournisseur`);

--
-- Indexes for table `Détail_Commande_Client`
--
ALTER TABLE `Détail_Commande_Client`
  ADD KEY `ID_Commande_Client` (`ID_Commande_Client`),
  ADD KEY `ID_Pièce` (`ID_Pièce`);

--
-- Indexes for table `Détail_Commande_Fournisseur`
--
ALTER TABLE `Détail_Commande_Fournisseur`
  ADD KEY `ID_Commande_Fournisseur` (`ID_Commande_Fournisseur`),
  ADD KEY `ID_Pièce` (`ID_Pièce`);

--
-- Indexes for table `Fournisseur`
--
ALTER TABLE `Fournisseur`
  ADD PRIMARY KEY (`ID_Fournisseur`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `Pièce`
--
ALTER TABLE `Pièce`
  ADD PRIMARY KEY (`ID_Pièce`),
  ADD UNIQUE KEY `Référence` (`Référence`),
  ADD KEY `ID_Categorie` (`ID_Categorie`),
  ADD KEY `ID_Fournisseur` (`ID_Fournisseur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `ID_Categorie` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Client`
--
ALTER TABLE `Client`
  MODIFY `ID_Client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `Commande_Client`
--
ALTER TABLE `Commande_Client`
  MODIFY `ID_Commande_Client` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Commande_Fournisseur`
--
ALTER TABLE `Commande_Fournisseur`
  MODIFY `ID_Commande_Fournisseur` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Fournisseur`
--
ALTER TABLE `Fournisseur`
  MODIFY `ID_Fournisseur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Pièce`
--
ALTER TABLE `Pièce`
  MODIFY `ID_Pièce` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Commande_Client`
--
ALTER TABLE `Commande_Client`
  ADD CONSTRAINT `Commande_Client_ibfk_1` FOREIGN KEY (`ID_Client`) REFERENCES `Client` (`ID_Client`);

--
-- Constraints for table `Commande_Fournisseur`
--
ALTER TABLE `Commande_Fournisseur`
  ADD CONSTRAINT `Commande_Fournisseur_ibfk_1` FOREIGN KEY (`ID_Fournisseur`) REFERENCES `Fournisseur` (`ID_Fournisseur`);

--
-- Constraints for table `Détail_Commande_Client`
--
ALTER TABLE `Détail_Commande_Client`
  ADD CONSTRAINT `Détail_Commande_Client_ibfk_1` FOREIGN KEY (`ID_Commande_Client`) REFERENCES `Commande_Client` (`ID_Commande_Client`),
  ADD CONSTRAINT `Détail_Commande_Client_ibfk_2` FOREIGN KEY (`ID_Pièce`) REFERENCES `Pièce` (`ID_Pièce`);

--
-- Constraints for table `Détail_Commande_Fournisseur`
--
ALTER TABLE `Détail_Commande_Fournisseur`
  ADD CONSTRAINT `Détail_Commande_Fournisseur_ibfk_1` FOREIGN KEY (`ID_Commande_Fournisseur`) REFERENCES `Commande_Fournisseur` (`ID_Commande_Fournisseur`),
  ADD CONSTRAINT `Détail_Commande_Fournisseur_ibfk_2` FOREIGN KEY (`ID_Pièce`) REFERENCES `Pièce` (`ID_Pièce`);

--
-- Constraints for table `Pièce`
--
ALTER TABLE `Pièce`
  ADD CONSTRAINT `Pièce_ibfk_2` FOREIGN KEY (`ID_Fournisseur`) REFERENCES `Fournisseur` (`ID_Fournisseur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;