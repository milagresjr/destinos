-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 08-Abr-2023 às 02:14
-- Versão do servidor: 10.5.18-MariaDB-0+deb11u1
-- versão do PHP: 8.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bilheteria`
--
CREATE DATABASE IF NOT EXISTS `bilheteria` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bilheteria`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agencias`
--

CREATE TABLE `agencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `agencias`
--

INSERT INTO `agencias` (`id`, `nome`, `logo`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 'Macon', 'macon.png', 'Descricao da Macon...', NULL, NULL),
(2, 'Huambo-Expresso', 'huambo-expresso.png', 'Descricao do huambo-expresso..', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` int(11) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `clients`
--

INSERT INTO `clients` (`id`, `nome`, `email`, `telefone`, `senha`, `created_at`, `updated_at`) VALUES
(1, 'Milagres Junior', 'milagres@gmail.com', 941608052, '$2y$10$qBxIXEurcdSO1OPgY8Zne.gyERHLmMgg0.3h5YakM37lNPeRek71W', '2023-01-25 05:24:00', '2023-01-25 05:24:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_06_145723_create_table_clients', 1),
(6, '2023_01_07_033234_create_agencias_table', 1),
(7, '2023_01_07_034521_create_provincias_table', 1),
(8, '2023_01_08_193640_create_viagens_table', 1),
(9, '2023_01_08_194104_create_clients_table', 1),
(10, '2023_01_11_214152_create_travels_table', 1),
(11, '2023_01_24_105750_add_campos_viagens', 2),
(12, '2023_02_12_161031_create_viagem_poltronas_table', 3),
(13, '2023_03_08_121226_create_reservas_table', 4),
(14, '2023_03_14_141747_add_column_reservas_table', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `provincias`
--

CREATE TABLE `provincias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `provincias`
--

INSERT INTO `provincias` (`id`, `nome`, `descricao`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Cunene', 'Descricao da Provi..', 'Cunene-1.jpg', NULL, NULL),
(2, 'Uige', 'Descricao do huambo..', 'Uige-Angola.jpg', NULL, NULL),
(3, 'Zaire', 'Descricao da Provi..', 'zaire.jpg', NULL, NULL),
(4, 'Malanje', 'Descricao do huambo..', 'malanje.JPG', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `viagem_id` int(10) UNSIGNED NOT NULL,
  `numero_poltrona` int(11) NOT NULL,
  `preco_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nome_passageiro` varchar(255) NOT NULL,
  `idade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`id`, `client_id`, `viagem_id`, `numero_poltrona`, `preco_total`, `created_at`, `updated_at`, `nome_passageiro`, `idade`) VALUES
(1, 1, 7, 19, 2000, '2023-03-14 16:45:06', '2023-03-14 16:45:06', 'Franscico Cabrao', 31),
(2, 1, 7, 15, 2000, '2023-03-14 16:45:07', '2023-03-14 16:45:07', 'Tiago SImao', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `table_clients`
--

CREATE TABLE `table_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` int(11) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `travels`
--

CREATE TABLE `travels` (
  `id` int(10) UNSIGNED NOT NULL,
  `ponto_partida` varchar(255) NOT NULL,
  `destino` varchar(255) NOT NULL,
  `preco_bilhete` decimal(10,2) NOT NULL,
  `data_partida` date NOT NULL,
  `hora_partida` time NOT NULL,
  `agencia_id` int(10) UNSIGNED NOT NULL,
  `terminal` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `viagem_poltronas`
--

CREATE TABLE `viagem_poltronas` (
  `id` int(10) UNSIGNED NOT NULL,
  `viagem_id` int(10) UNSIGNED NOT NULL,
  `numero_poltrona` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `viagem_poltronas`
--

INSERT INTO `viagem_poltronas` (`id`, `viagem_id`, `numero_poltrona`, `created_at`, `updated_at`) VALUES
(1, 3, 38, '2023-02-12 17:04:24', '2023-02-12 17:04:24'),
(2, 3, 30, '2023-02-12 17:04:24', '2023-02-12 17:04:24'),
(3, 3, 26, '2023-02-12 17:04:24', '2023-02-12 17:04:24'),
(4, 3, 9, '2023-02-13 07:11:08', '2023-02-13 07:11:08'),
(5, 3, 34, '2023-02-13 07:11:18', '2023-02-13 07:11:18'),
(6, 3, 25, '2023-02-13 07:43:09', '2023-02-13 07:43:09'),
(7, 3, 20, '2023-02-13 07:43:17', '2023-02-13 07:43:17'),
(8, 3, 24, '2023-02-13 07:43:28', '2023-02-13 07:43:28'),
(9, 3, 19, '2023-02-13 08:47:52', '2023-02-13 08:47:52'),
(10, 3, 43, '2023-02-13 08:48:52', '2023-02-13 08:48:52'),
(14, 3, 44, '2023-02-13 09:00:32', '2023-02-13 09:00:32'),
(17, 3, 16, '2023-02-13 09:02:39', '2023-02-13 09:02:39'),
(19, 3, 41, '2023-02-13 09:02:57', '2023-02-13 09:02:57'),
(24, 3, 33, '2023-02-14 22:28:55', '2023-02-14 22:28:55'),
(28, 3, 31, '2023-02-15 18:05:22', '2023-02-15 18:05:22'),
(34, 3, 39, '2023-02-15 18:06:41', '2023-02-15 18:06:41'),
(54, 3, 11, '2021-07-13 13:42:45', '2021-07-13 13:42:45'),
(58, 3, 22, '2021-07-13 14:23:50', '2021-07-13 14:23:50'),
(59, 3, 18, '2021-07-13 14:23:51', '2021-07-13 14:23:51'),
(94, 2, 21, '2021-07-13 14:40:02', '2021-07-13 14:40:02'),
(95, 2, 18, '2021-07-13 14:40:04', '2021-07-13 14:40:04'),
(96, 2, 40, '2021-07-13 14:40:18', '2021-07-13 14:40:18'),
(106, 3, 13, '2021-07-13 14:12:28', '2021-07-13 14:12:28'),
(110, 3, 17, '2021-07-13 14:24:30', '2021-07-13 14:24:30'),
(114, 3, 3, '2021-07-13 14:29:06', '2021-07-13 14:29:06'),
(115, 3, 7, '2021-07-13 14:29:09', '2021-07-13 14:29:09'),
(125, 3, 15, '2021-07-13 14:35:28', '2021-07-13 14:35:28'),
(126, 3, 4, '2021-07-13 14:35:41', '2021-07-13 14:35:41'),
(127, 3, 12, '2021-07-13 14:35:46', '2021-07-13 14:35:46'),
(131, 3, 10, '2021-07-13 14:39:40', '2021-07-13 14:39:40'),
(135, 3, 32, '2021-07-13 14:40:37', '2021-07-13 14:40:37'),
(142, 3, 21, '2021-07-13 14:42:34', '2021-07-13 14:42:34'),
(143, 3, 8, '2021-07-13 14:42:52', '2021-07-13 14:42:52'),
(144, 3, 1, '2021-07-13 14:42:59', '2021-07-13 14:42:59'),
(155, 5, 6, '2023-03-07 05:53:26', '2023-03-07 05:53:26'),
(161, 5, 17, '2023-03-07 07:26:35', '2023-03-07 07:26:35'),
(162, 5, 25, '2023-03-07 07:26:36', '2023-03-07 07:26:36'),
(163, 5, 9, '2023-03-07 07:50:09', '2023-03-07 07:50:09'),
(164, 5, 13, '2023-03-07 07:50:10', '2023-03-07 07:50:10'),
(175, 7, 29, '2023-03-07 08:47:00', '2023-03-07 08:47:00'),
(176, 7, 33, '2023-03-07 08:47:01', '2023-03-07 08:47:01'),
(179, 5, 30, '2023-03-07 08:54:19', '2023-03-07 08:54:19'),
(180, 5, 34, '2023-03-07 08:54:19', '2023-03-07 08:54:19'),
(185, 6, 6, '2023-03-07 08:58:55', '2023-03-07 08:58:55'),
(186, 6, 5, '2023-03-07 08:58:55', '2023-03-07 08:58:55'),
(187, 6, 9, '2023-03-07 08:59:25', '2023-03-07 08:59:25'),
(188, 6, 13, '2023-03-07 08:59:26', '2023-03-07 08:59:26'),
(189, 5, 18, '2023-03-08 09:48:25', '2023-03-08 09:48:25'),
(190, 5, 22, '2023-03-08 09:48:26', '2023-03-08 09:48:26'),
(191, 5, 15, '2023-03-08 09:48:38', '2023-03-08 09:48:38'),
(192, 5, 31, '2023-03-14 10:26:48', '2023-03-14 10:26:48'),
(193, 5, 27, '2023-03-14 10:26:49', '2023-03-14 10:26:49'),
(196, 5, 16, '2023-03-14 14:02:36', '2023-03-14 14:02:36'),
(197, 5, 20, '2023-03-14 14:02:37', '2023-03-14 14:02:37'),
(198, 5, 19, '2023-03-14 14:05:45', '2023-03-14 14:05:45'),
(199, 5, 24, '2023-03-14 14:05:46', '2023-03-14 14:05:46'),
(207, 5, 29, '2023-03-14 14:19:17', '2023-03-14 14:19:17'),
(208, 5, 33, '2023-03-14 14:19:18', '2023-03-14 14:19:18'),
(213, 5, 32, '2023-03-14 14:23:14', '2023-03-14 14:23:14'),
(214, 5, 36, '2023-03-14 14:23:17', '2023-03-14 14:23:17'),
(215, 5, 35, '2023-03-14 14:28:17', '2023-03-14 14:28:17'),
(216, 5, 11, '2023-03-14 14:28:18', '2023-03-14 14:28:18'),
(217, 7, 19, '2023-03-14 14:33:17', '2023-03-14 14:33:17'),
(218, 7, 15, '2023-03-14 14:33:17', '2023-03-14 14:33:17'),
(219, 6, 29, '2023-03-14 23:56:53', '2023-03-14 23:56:53'),
(220, 6, 33, '2023-03-14 23:56:54', '2023-03-14 23:56:54'),
(223, 2, 7, '2023-03-15 23:59:05', '2023-03-15 23:59:05'),
(224, 2, 15, '2023-03-15 23:59:10', '2023-03-15 23:59:10'),
(225, 2, 23, '2023-03-15 23:59:11', '2023-03-15 23:59:11'),
(226, 2, 10, '2023-03-15 23:59:14', '2023-03-15 23:59:14'),
(227, 2, 15, '2023-03-15 23:59:14', '2023-03-15 23:59:14'),
(228, 2, 36, '2023-03-15 23:59:22', '2023-03-15 23:59:22'),
(229, 3, 37, '2023-04-07 10:37:14', '2023-04-07 10:37:14'),
(230, 3, 29, '2023-04-07 10:37:16', '2023-04-07 10:37:16'),
(231, 13, 17, '2023-04-07 21:38:25', '2023-04-07 21:38:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `viagens`
--

CREATE TABLE `viagens` (
  `id` int(10) UNSIGNED NOT NULL,
  `ponto_partida` int(10) UNSIGNED NOT NULL,
  `destino` int(10) UNSIGNED NOT NULL,
  `preco_bilhete` decimal(10,2) NOT NULL,
  `data_partida` date NOT NULL,
  `hora_partida` time NOT NULL,
  `agencia_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hora_chegada` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `viagens`
--

INSERT INTO `viagens` (`id`, `ponto_partida`, `destino`, `preco_bilhete`, `data_partida`, `hora_partida`, `agencia_id`, `created_at`, `updated_at`, `hora_chegada`) VALUES
(1, 3, 1, '3000.00', '2023-01-31', '12:07:51', 2, NULL, NULL, '00:00:00'),
(2, 1, 2, '4000.00', '2023-01-30', '14:07:51', 1, NULL, NULL, '00:00:00'),
(3, 2, 1, '3000.00', '2023-01-31', '12:07:51', 2, NULL, NULL, '00:00:00'),
(4, 3, 2, '4000.00', '2023-01-30', '14:07:51', 1, NULL, NULL, '00:00:00'),
(5, 2, 1, '4000.00', '2023-01-27', '10:19:17', 1, NULL, NULL, '19:00:00'),
(6, 2, 1, '4500.00', '2023-01-29', '14:19:17', 1, NULL, NULL, '00:00:00'),
(7, 2, 1, '2000.00', '2023-01-25', '15:19:17', 1, NULL, NULL, '20:00:00'),
(9, 2, 3, '2500.00', '2023-01-26', '12:19:51', 2, NULL, NULL, '00:00:00'),
(10, 4, 3, '3000.00', '2023-02-08', '15:00:51', 2, NULL, NULL, '00:00:00'),
(11, 1, 3, '2500.00', '2023-01-26', '12:19:51', 2, NULL, NULL, '00:00:00'),
(12, 4, 2, '3000.00', '2023-02-08', '15:00:51', 2, NULL, NULL, '00:00:00'),
(13, 2, 1, '12000.00', '2023-01-27', '12:00:00', 2, NULL, NULL, '19:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agencias`
--
ALTER TABLE `agencias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservas_client_id_foreign` (`client_id`),
  ADD KEY `reservas_viagem_id_foreign` (`viagem_id`);

--
-- Índices para tabela `table_clients`
--
ALTER TABLE `table_clients`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `travels`
--
ALTER TABLE `travels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `travels_agencia_id_foreign` (`agencia_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Índices para tabela `viagem_poltronas`
--
ALTER TABLE `viagem_poltronas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `viagem_poltronas_viagem_id_foreign` (`viagem_id`);

--
-- Índices para tabela `viagens`
--
ALTER TABLE `viagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `viagens_agencia_id_foreign` (`agencia_id`),
  ADD KEY `viagens_ponto_partida_foreign` (`ponto_partida`),
  ADD KEY `viagens_destino_foreign` (`destino`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agencias`
--
ALTER TABLE `agencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `table_clients`
--
ALTER TABLE `table_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `travels`
--
ALTER TABLE `travels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `viagem_poltronas`
--
ALTER TABLE `viagem_poltronas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT de tabela `viagens`
--
ALTER TABLE `viagens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservas_viagem_id_foreign` FOREIGN KEY (`viagem_id`) REFERENCES `viagens` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `travels`
--
ALTER TABLE `travels`
  ADD CONSTRAINT `travels_agencia_id_foreign` FOREIGN KEY (`agencia_id`) REFERENCES `agencias` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `viagem_poltronas`
--
ALTER TABLE `viagem_poltronas`
  ADD CONSTRAINT `viagem_poltronas_viagem_id_foreign` FOREIGN KEY (`viagem_id`) REFERENCES `viagens` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `viagens`
--
ALTER TABLE `viagens`
  ADD CONSTRAINT `viagens_agencia_id_foreign` FOREIGN KEY (`agencia_id`) REFERENCES `agencias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `viagens_destino_foreign` FOREIGN KEY (`destino`) REFERENCES `provincias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `viagens_ponto_partida_foreign` FOREIGN KEY (`ponto_partida`) REFERENCES `provincias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
