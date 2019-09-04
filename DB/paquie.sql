-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 29 août 2019 à 11:51
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `paquie`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id`, `user_id`, `title`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(3, 1, 'Barbecue partie', 'Profitez-en! Pour ce vendredi magnifique, nous organisons une \"Barbecue partie\" à l\'occasion de notre 10ème anniversaire. Venez nombreux pour cette occasion!!!! Il y aura une réduction de prix pour tous les plats quotidien.', 'mPGbJb6YAE2nphgljDZUGMfUuiwmOST36QH20cVs.jpg', '2019-08-04 18:07:47', '2019-08-04 18:07:47'),
(2, 1, 'Crème au chocolat', 'Une nouvelle recette, venez goutez le crème au chocolat spéciale RestoMenu', 'cmnn22NIoXT5NcmiR77aizvLXo1QwFWNXDxKVint.jpg', '2019-07-25 09:28:12', '2019-07-25 09:46:46'),
(4, 1, 'Cocktail de bienvenu', 'En outre de plat que vous commandez chez nous, nous vous offrons un cocktail de bienvenu. Vous pouvez choisir votre fruit préféré.', 'v768phUY30u4MtJIGIQGmfNJ0Wgf1zRz2G6s9r7N.jpg', '2019-08-04 18:18:14', '2019-08-04 18:18:14'),
(5, 1, 'Riz cantonais avec œuf sur plat', 'Commandez dès maintenant! Notre chef vous propose un plat spécial RestoMenu \"Riz cantonais avec oeuf sur plat. C\'est une vraie délice.', 'SY0H45zNR9EvV1GmoUrSW5XsnvCMtMmk3OwTlxVy.jpg', '2019-08-04 18:35:22', '2019-08-04 18:35:22');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `title`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(22, 'Boissons et Jus', 'Vin, Jus naturel, jus star,...', 'W3WSP7f40668pDouFrW6lIJXZFgUKr6HERUlvdJR.jpg', '2019-07-17 08:59:21', '2019-07-17 08:59:21'),
(21, 'Fast food', 'Pizza, humberger,...', 'keJ2uAcydanNtF0PlgSNADZjXGy0Co2jdgrURS71.jpg', '2019-07-17 08:58:06', '2019-07-17 08:58:06'),
(20, 'Dessert', 'Les desserts existants', 'vfjwmIGjXkReMBCRiM3sESvfxgrFfFJVKUzmPLqR.jpg', '2019-07-17 08:55:56', '2019-07-17 08:55:56'),
(19, 'Plat de résistance', 'Plat Malagasy, Pâtes,...', '3eqFtyoCz9eVdLzrh9WcqrtLvX7XsC1bqXdg7mRy.jpg', '2019-07-17 08:49:58', '2019-07-17 09:01:55'),
(18, 'Entrer', 'Crudité, salade,...', 'oPCtYnzbA2uCYUSc7Q8Hpbv4aD5zFopVWQoBQqfJ.jpg', '2019-07-17 08:48:22', '2019-07-17 10:46:26');

-- --------------------------------------------------------

--
-- Structure de la table `command`
--

DROP TABLE IF EXISTS `command`;
CREATE TABLE IF NOT EXISTS `command` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `num_command` int(11) NOT NULL,
  `nbre_product` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `command`
--

INSERT INTO `command` (`id`, `num_command`, `nbre_product`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 3, 22, 20000, '2019-07-12 11:40:39', '2019-07-15 11:20:50'),
(3, 2, 4, 20000, '2019-07-15 11:20:23', '2019-07-15 11:20:23');

-- --------------------------------------------------------

--
-- Structure de la table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `questions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_07_02_135428_create_category', 2),
(5, '2019_07_10_140225_create_product', 3),
(6, '2019_07_12_120132_create_commande', 4),
(7, '2019_07_12_145629_create_order_product', 5),
(8, '2019_07_21_215145_create_blog', 6),
(9, '2019_08_09_043014_create_faqs', 7);

-- --------------------------------------------------------

--
-- Structure de la table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE IF NOT EXISTS `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `sous_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `quantity`, `price`, `sous_total`, `created_at`, `updated_at`) VALUES
(1, 4, 6, 10, 10000, 10000, '2019-07-15 01:57:33', '2019-07-15 01:57:33'),
(2, 3, 2, 5, 20000, 10000, '2019-07-15 03:23:43', '2019-07-15 11:58:44'),
(3, 4, 3, 8, 6000, 6000, '2019-07-15 03:35:54', '2019-07-15 03:35:54'),
(4, 10, 6, 5, 3000, 3000, '2019-07-15 11:47:34', '2019-07-15 11:47:34');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `user_id`, `category_id`, `title`, `description`, `prix`, `photo`, `created_at`, `updated_at`) VALUES
(15, 1, 22, 'Hamburger', 'Hamburger', '8000', 'wntl6wECKjh3xwSY9wTW6e2ckG97i266OfekRbRb.jpg', '2019-07-17 11:47:00', '2019-07-24 15:49:55'),
(11, 1, 18, 'Salade', 'Salade', '2000', 'NLEuHKnhz1iDnnbDcatTMUCkWsgm6sRMncs9thnb.jpg', '2019-07-17 11:24:34', '2019-07-17 11:24:34'),
(14, 1, 19, 'Riz au crevette', 'Riz avec crevette sauce', '15000', '6BgRyzCj7KtP8u7sETdBhhXVo4altvqRmQG0b5o0.jpg', '2019-07-17 11:44:14', '2019-07-17 11:45:59'),
(13, 1, 22, 'Jus d\'orange', 'Jus d\'orange', '1500', 'u7mo9gXbtvnXduPddBDeIwok2L0wuB9NAWjNIydH.jpg', '2019-07-17 11:42:56', '2019-07-17 11:42:56'),
(12, 1, 21, 'Pizza au fromage', 'Pizza avec fromage', '12000', 'QnNraHDsMzsJ8SJSny6JiTDQ04AIbgz3BkKllItw.jpg', '2019-07-17 11:35:49', '2019-07-17 11:35:49'),
(16, 1, 21, 'Steak au frite', 'Steak au frite', '5000', 'GovrUws8I9ycSI9PP1sIPRJDA0lqRX5ZeiezW1x9.jpg', '2019-07-17 11:53:22', '2019-07-17 11:53:22'),
(17, 1, 20, 'Glace', 'Glace', '3000', 'nu4vQk1QQYVOSQmK6tVg2t4Mcv3nrj42Ko1URLje.jpg', '2019-07-17 11:54:42', '2019-07-17 11:54:42'),
(18, 1, 20, 'Gateau', 'Gateau', '6000', 'jSEe7TriBr8IT7MbFFPAhOpl94duwIywrz0l5jFs.jpg', '2019-07-17 11:55:46', '2019-07-17 11:55:46'),
(19, 1, 21, 'Cookies', 'Cookies', '7000', 'k4fBWi13oGxO6K41RRL7VQ2iIQjimzQ2l9o4y6ex.jpg', '2019-07-17 11:57:05', '2019-07-17 11:57:05'),
(25, 1, 22, 'Pomme frite', 'pomme frite', '7000', 'ZoL5bjwAmqOi6b1G4tZG2XAqiQPWe9SKkOkqXCRV.jpg', '2019-07-21 06:28:01', '2019-07-24 15:38:11'),
(28, 1, 21, 'Croissant au chocolat', 'C\'bon', '1000', 'vmhQMEGPG0ZT5TChaib8bvDc7AHoiUcta3LDz3hZ.jpg', '2019-08-03 15:14:28', '2019-08-03 15:14:28'),
(29, 1, 18, 'Entrée', 'entre salade', '1000', 'mBBqXJXdbnBx2lMUXoYgXsYCK3QuuHTaQ1gaLVoW.jpg', '2019-08-29 08:47:12', '2019-08-29 08:47:12');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` blob NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `photo`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Marietta', '0323457138', 'mariettaodile4@gmail.com', NULL, '$2y$10$fc0xMSSATbqQn7oxUSDXXOTEVRIqzpqSK1FQQ7wM8rRk7opK3iDiG', 'x7aLcKWtcjRLTG0pBksukVPLsNFUdsRieweH2CqU.jpg', 0x31, NULL, '2019-07-02 05:42:07', '2019-08-06 05:22:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
