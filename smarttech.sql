 Création de la base de données
CREATE DATABASE IF NOT EXISTS `smarttech` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `smarttech`;

-- --------------------------------------------------------
-- Structure de la table `employees`
CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `poste` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Données pour la table `employees`
INSERT INTO `employees` (`id`, `nom`, `email`, `poste`, `created_at`, `updated_at`) VALUES
(1, 'Moussa Ndiaye', 'moussa.ndiaye@gmail.com', 'Développeur', NOW(), NOW()),
(2, 'Awa Diop', 'awa.diop@esp.sn', 'Administrateur Système', NOW(), NOW()),
(3, 'Cheikh Fall', 'cheikh.fall@gmail.com', 'Technicien Réseau', NOW(), NOW());

-- --------------------------------------------------------
-- Structure de la table `clients`
CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `telephone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Données pour la table `clients`
INSERT INTO `clients` (`id`, `nom`, `email`, `telephone`, `created_at`, `updated_at`) VALUES
(1, 'Fatou Sy', 'fatou.sy@gmail.com', '778123456', NOW(), NOW()),
(2, 'Serigne Mbaye', 'serigne.mbaye@esp.sn', '764567890', NOW(), NOW()),
(3, 'Mariama Ba', 'mariama.ba@gmail.com', '771234567', NOW(), NOW());

-- --------------------------------------------------------
-- Structure de la table `documents`
CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('actif','archivé') NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Structure de la table `users` (optionnelle)
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Création des index
ALTER TABLE `documents`
  ADD KEY `user_id` (`user_id`);

-- Contraintes pour les tables exportées
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

-- Création d'un utilisateur dédié (à adapter)
CREATE USER 'smarttech_user'@'localhost' IDENTIFIED BY 'passer';
GRANT ALL PRIVILEGES ON smarttech.* TO 'smarttech_user'@'localhost';
FLUSH PRIVILEGES;
	
