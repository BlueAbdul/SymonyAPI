-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 04 mai 2021 à 07:38
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `api`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `description`) VALUES
(1, 'La simplicité de changer plus rapidement', 'Non omnis aspernatur aliquid ad nihil id. Quisquam explicabo velit nihil error atque. Mollitia ipsam delectus quia. Voluptas sint ut molestias ipsam iusto quia.'),
(2, 'L\'assurance d\'atteindre vos buts sans soucis', 'Aut voluptate quos tempora in debitis. Ut atque praesentium ut aliquam id ex accusamus. Deserunt debitis quo nihil omnis eos et. Voluptas sed reiciendis quisquam perspiciatis ea modi dolore nostrum.'),
(3, 'Le plaisir de rouler en toute tranquilité', 'Rerum placeat eius neque amet itaque quia. Earum non voluptatibus nam quisquam beatae. Aut omnis ea et voluptates quos amet distinctio.'),
(4, 'La sécurité d\'évoluer plus rapidement', 'Autem quia sit eveniet sequi. Numquam vel deserunt natus numquam optio ut. Sit non ipsam dignissimos est. Omnis sunt laudantium commodi rerum voluptatem sit.'),
(5, 'Article depuis html', 'ezfezfezfze'),
(6, 'oahzrohazor', 'fzegzegzegez'),
(7, 'oahzrohazor', 'fzegzegzegez'),
(8, 'Bonjour', 'Je suis postman');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
