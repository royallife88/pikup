-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 12:26 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(52, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:55;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:2;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574836850, 1574836850),
(53, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:55;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:2;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574836850, 1574836850),
(54, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:55;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574836850, 1574836850),
(55, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:55;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574836850, 1574836850),
(56, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:55;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574836850, 1574836850),
(57, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:56;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:1;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574836850, 1574836850),
(58, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:2;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574837309, 1574837309),
(59, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:2;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574837309, 1574837309),
(60, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574837309, 1574837309),
(61, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574837309, 1574837309),
(62, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574837309, 1574837309),
(63, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:1;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574837309, 1574837309),
(64, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:2;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574837659, 1574837659),
(65, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:2;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574837659, 1574837659),
(66, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574837659, 1574837659),
(67, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574837659, 1574837659),
(68, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574837659, 1574837659),
(69, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:1;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574837659, 1574837659),
(70, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:2;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574837900, 1574837900),
(71, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:2;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574837900, 1574837900),
(72, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574837900, 1574837900),
(73, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574837900, 1574837900),
(74, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574837900, 1574837900),
(75, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:4;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:1;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574837900, 1574837900),
(76, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:2;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574838234, 1574838234),
(77, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:2;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574838234, 1574838234),
(78, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574838234, 1574838234),
(79, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574838234, 1574838234),
(80, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574838234, 1574838234),
(81, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:6;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:1;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574838234, 1574838234),
(82, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:2;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574841669, 1574841669),
(83, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:2;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574841669, 1574841669),
(84, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574841669, 1574841669),
(85, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574841669, 1574841669),
(86, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574841669, 1574841669),
(87, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:1;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574841669, 1574841669),
(88, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:2;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574851078, 1574851078),
(89, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:2;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574851078, 1574851078),
(90, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574851078, 1574851078),
(91, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574851078, 1574851078),
(92, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:3;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574851078, 1574851078),
(93, 'default', '{\"displayName\":\"App\\\\Events\\\\newOrderCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:26:\\\"App\\\\Events\\\\newOrderCreated\\\":3:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:34:\\\"App\\\\Laravelproject_new_goods_order\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:8:\\\"store_id\\\";i:1;s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1574851078, 1574851078);

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_add_products`
--

CREATE TABLE `laravelproject_new_add_products` (
  `p_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `if_food` tinyint(1) DEFAULT '0',
  `title` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laravelproject_new_add_products`
--

INSERT INTO `laravelproject_new_add_products` (`p_id`, `store_id`, `store_name`, `if_food`, `title`, `price`, `discount_price`, `description`, `featured_image`, `category`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'JohnStore', 0, 'T-Shirt', 12, 10, 'NA', 'uploads/products/1574671048.jpg', 1, '1', '2019-11-25 08:37:28', '2019-11-28 07:37:16'),
(2, 2, 'MikeStore', 0, 'Pent Shirt', 123, 10, 'NA', 'uploads/products/1574671048.jpg', 1, '1', '2019-11-25 08:37:28', '2019-11-25 08:46:10'),
(6, 3, 'GeorgeStore', 0, 'Shoes', 89, 10, 'NA', 'uploads/products/1574671048.jpg', 1, '1', '2019-11-25 08:37:28', '2019-11-25 08:46:28'),
(7, 3, 'GeorgeStore', 0, 'Sleeper', 33, 10, 'NA', 'uploads/products/1574671048.jpg', 1, '1', '2019-11-25 08:37:28', '2019-11-25 08:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_add_to_carts`
--

CREATE TABLE `laravelproject_new_add_to_carts` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_admins`
--

CREATE TABLE `laravelproject_new_admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `social_security_number` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `age` int(2) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `date_started_working` date NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `bank_routing_number` varchar(20) NOT NULL,
  `bank_account_number` varchar(50) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laravelproject_new_admins`
--

INSERT INTO `laravelproject_new_admins` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `social_security_number`, `dob`, `age`, `address`, `phone_number`, `date_started_working`, `job_description`, `bank_routing_number`, `bank_account_number`, `profile_image`, `created_at`, `updated_at`) VALUES
(1, 'super', 'admin', 'admin@admin.com', '$2y$10$Pj8owppTqrd9tj7Vnt9xD.cY8.GD5og.Oc/iy/LSX2kHNWprqS8ES', '1', '12365478585', '2016-04-08', 23, 'Califton Rangor wala Chowk Lahore', '654123987', '2019-11-01', 'NA', '987456321', '987456321', '', '2019-11-25 08:29:42', '2019-11-25 08:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_customers`
--

CREATE TABLE `laravelproject_new_customers` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validation_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `blocked` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `social_account_login` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laravelproject_new_customers`
--

INSERT INTO `laravelproject_new_customers` (`id`, `name`, `email`, `password`, `validation_code`, `email_verified_at`, `remember_token`, `status`, `blocked`, `social_account_login`, `created_at`, `updated_at`) VALUES
(1, 'ab cd', 'abcd@gmail.com', '$2y$10$hSGVCjY61.v4gAGArNhBruDgKUs7XFsajIsz4dDt.qeQQJ4GRmuo6', '0b399c277e16e5513b03e09d2dae66d54393ed13', NULL, NULL, '0', '0', NULL, '2019-11-25 03:49:51', '2019-11-25 03:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_drivers`
--

CREATE TABLE `laravelproject_new_drivers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `social_security_number` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `age` int(2) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_started_working` date NOT NULL,
  `license_number` varchar(30) NOT NULL,
  `licence_expiry_date` varchar(15) NOT NULL,
  `license_image` varchar(255) NOT NULL,
  `home_region` varchar(255) NOT NULL,
  `driver_level` int(2) NOT NULL,
  `bank_account_number` varchar(255) DEFAULT NULL,
  `bank_routing_number` varchar(255) DEFAULT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `firebase_token` varchar(255) NOT NULL,
  `booked` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laravelproject_new_drivers`
--

INSERT INTO `laravelproject_new_drivers` (`id`, `first_name`, `last_name`, `email`, `password`, `social_security_number`, `dob`, `age`, `phone_number`, `address`, `date_started_working`, `license_number`, `licence_expiry_date`, `license_image`, `home_region`, `driver_level`, `bank_account_number`, `bank_routing_number`, `latitude`, `longitude`, `firebase_token`, `booked`, `created_at`, `updated_at`) VALUES
(1, 'Driver', 'One', 'driver1@gmail.com', '$2y$10$hSGVCjY61.v4gAGArNhBruDgKUs7XFsajIsz4dDt.qeQQJ4GRmuo6', '123654789', '2016-04-08', 25, '2365897', 'Near Jamia Mosque', '2019-10-11', '987654312', '2019-10-15', 'na.jpg', 'Muslim Town', 2, '98764444', '11252525', '31.577918', '74.344536', 'euQ_D3120UM:APA91bGBuA_31rXJeF-Kvj22wuGBPKa7XdtAmLIBmpwsPS8W1FwbvUSLR-BVZU2JEJ2b05grb3EruWChUJQf6XRYWkagNX0BJzMpx2F03hj8kByUAN_8VnvGZAYxH2dTAWhxIFM629la', '0', '2019-11-25 10:48:22', '2019-11-25 10:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_driver_logs`
--

CREATE TABLE `laravelproject_new_driver_logs` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `laravelproject_new_driver_logs`
--
DELIMITER $$
CREATE TRIGGER `Update Driver Current Location` AFTER INSERT ON `laravelproject_new_driver_logs` FOR EACH ROW UPDATE laravelproject_new_drivers SET longitude = NEW.longitude, latitude = NEW.latitude WHERE id = NEW.driver_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_goods_colors_sizes`
--

CREATE TABLE `laravelproject_new_goods_colors_sizes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sizes` varchar(255) NOT NULL,
  `colors` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laravelproject_new_goods_colors_sizes`
--

INSERT INTO `laravelproject_new_goods_colors_sizes` (`id`, `product_id`, `sizes`, `colors`, `created_at`, `updated_at`) VALUES
(1, 1, 'S', 'red,black,green', '2019-11-25 08:37:28', '2019-11-25 08:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_goods_favourites`
--

CREATE TABLE `laravelproject_new_goods_favourites` (
  `id` int(11) NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_goods_orders`
--

CREATE TABLE `laravelproject_new_goods_orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `dropoff_location` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_price` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `order_rejected_by_drivers` varchar(255) NOT NULL,
  `driver_notification` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laravelproject_new_goods_orders`
--

INSERT INTO `laravelproject_new_goods_orders` (`id`, `customer_id`, `dropoff_location`, `date_time`, `total_price`, `payment_method`, `payment_status`, `order_rejected_by_drivers`, `driver_notification`, `created_at`, `updated_at`) VALUES
(1, 1, 3456, '2019-11-27 06:54:19', 25, 'paypal', 'completed', '', 1, '0000-00-00 00:00:00', '2019-11-27 06:57:03'),
(2, 1, 3456, '2019-11-27 06:54:19', 25, 'paypal', 'completed', '', 1, '0000-00-00 00:00:00', '2019-11-27 07:12:47'),
(3, 1, 3456, '2019-11-27 06:58:20', 25, 'paypal', 'completed', '', 1, '0000-00-00 00:00:00', '2019-11-27 07:28:00'),
(4, 1, 3456, '2019-11-27 06:58:20', 25, 'paypal', 'completed', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 3456, '2019-11-27 07:03:54', 25, 'paypal', 'completed', '', 1, '0000-00-00 00:00:00', '2019-11-27 07:28:05'),
(6, 1, 3456, '2019-11-27 07:03:54', 25, 'paypal', 'completed', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 3456, '2019-11-27 08:01:09', 25, 'paypal', 'completed', '', 1, '0000-00-00 00:00:00', '2019-11-28 06:56:51'),
(8, 1, 3456, '2019-11-27 08:01:09', 25, 'paypal', 'completed', '', 1, '0000-00-00 00:00:00', '2019-11-28 06:56:56'),
(9, 1, 3456, '2019-11-27 10:37:57', 25, 'paypal', 'completed', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 3456, '2019-11-27 10:37:58', 25, 'paypal', 'completed', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_goods_order_items`
--

CREATE TABLE `laravelproject_new_goods_order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `accept_or_reject` tinyint(1) DEFAULT '2',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laravelproject_new_goods_order_items`
--

INSERT INTO `laravelproject_new_goods_order_items` (`id`, `order_id`, `product_id`, `qty`, `store_id`, `accept_or_reject`, `created_at`) VALUES
(1, 1, 2, 7, 2, 1, '2019-11-27 06:54:47'),
(2, 1, 3, 4, 2, 1, '2019-11-27 06:54:52'),
(3, 1, 4, 2, 3, 1, '2019-11-27 06:55:22'),
(4, 1, 5, 2, 3, 1, '2019-11-27 06:55:25'),
(5, 1, 6, 3, 3, 1, '2019-11-27 06:55:19'),
(6, 2, 1, 3, 1, 0, '2019-11-27 07:02:39'),
(7, 3, 2, 7, 2, 1, '2019-11-27 06:59:09'),
(8, 3, 3, 4, 2, 1, '2019-11-27 06:59:12'),
(9, 3, 4, 2, 3, 0, '2019-11-27 07:02:39'),
(10, 3, 5, 2, 3, 0, '2019-11-27 07:02:39'),
(11, 3, 6, 3, 3, 0, '2019-11-27 07:02:39'),
(12, 4, 1, 3, 1, 0, '2019-11-27 07:02:39'),
(13, 5, 2, 7, 2, 0, '2019-11-27 07:08:06'),
(14, 5, 3, 4, 2, 0, '2019-11-27 07:08:06'),
(15, 5, 4, 2, 3, 1, '2019-11-27 07:04:08'),
(16, 5, 5, 2, 3, 1, '2019-11-27 07:04:11'),
(17, 5, 6, 3, 3, 1, '2019-11-27 07:04:05'),
(18, 6, 1, 3, 1, 0, '2019-11-27 07:08:06'),
(19, 7, 2, 7, 2, 1, '2019-11-27 08:01:43'),
(20, 7, 3, 4, 2, 1, '2019-11-27 08:01:40'),
(21, 7, 4, 2, 3, 0, '2019-11-28 06:56:51'),
(22, 7, 5, 2, 3, 0, '2019-11-28 06:56:51'),
(23, 7, 6, 3, 3, 0, '2019-11-28 06:56:51'),
(24, 8, 1, 3, 1, 1, '2019-11-28 06:56:12'),
(25, 9, 2, 7, 2, 0, '2019-11-28 06:56:51'),
(26, 9, 3, 4, 2, 0, '2019-11-28 06:56:51'),
(27, 9, 4, 2, 3, 0, '2019-11-28 06:56:51'),
(28, 9, 5, 2, 3, 0, '2019-11-28 06:56:51'),
(29, 9, 6, 3, 3, 0, '2019-11-28 06:56:51'),
(30, 10, 1, 3, 1, 0, '2019-11-28 06:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_goods_ratings`
--

CREATE TABLE `laravelproject_new_goods_ratings` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_home_slider`
--

CREATE TABLE `laravelproject_new_home_slider` (
  `id` int(11) NOT NULL,
  `slider_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `activate` enum('yes','no') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_password_resets`
--

CREATE TABLE `laravelproject_new_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_product_trips`
--

CREATE TABLE `laravelproject_new_product_trips` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `fare_price` float NOT NULL,
  `pickup_location` double NOT NULL,
  `dropoff_location` double NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `if_object` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_restaurant_availability_timing`
--

CREATE TABLE `laravelproject_new_restaurant_availability_timing` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `saturday` varchar(255) NOT NULL,
  `sunday` varchar(255) NOT NULL,
  `monday` varchar(255) NOT NULL,
  `tuesday` varchar(255) NOT NULL,
  `wednesday` varchar(255) NOT NULL,
  `thursday` varchar(255) NOT NULL,
  `friday` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_restaurant_category`
--

CREATE TABLE `laravelproject_new_restaurant_category` (
  `category_id` int(11) NOT NULL,
  `restaurant_owner_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `admin_approve` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_restaurant_register`
--

CREATE TABLE `laravelproject_new_restaurant_register` (
  `restaurant_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `merchant_type` varchar(255) NOT NULL,
  `no_of_locations` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `link_to_menu` varchar(255) NOT NULL,
  `menus_images` varchar(255) NOT NULL,
  `tablet_require` enum('yes','no') NOT NULL,
  `free_ordering_type` enum('email','sms') NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_dob` varchar(255) NOT NULL,
  `routing_number` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `blocked` enum('0','1') NOT NULL,
  `admin_approve` enum('0','1','2') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_service_availability_timing`
--

CREATE TABLE `laravelproject_new_service_availability_timing` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `saturday` varchar(255) NOT NULL,
  `sunday` varchar(255) NOT NULL,
  `monday` varchar(255) NOT NULL,
  `tuesday` varchar(255) NOT NULL,
  `wednesday` varchar(255) NOT NULL,
  `thursday` varchar(255) NOT NULL,
  `friday` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_service_category`
--

CREATE TABLE `laravelproject_new_service_category` (
  `category_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `admin_approve` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laravelproject_new_service_category`
--

INSERT INTO `laravelproject_new_service_category` (`category_id`, `store_id`, `category_name`, `image`, `admin_approve`, `created_at`, `updated_at`) VALUES
(2, 1, 'Worker', 'uploads/categories/1574922909.jpg', '1', '2019-11-28 06:35:09', '2019-11-28 07:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_service_orders`
--

CREATE TABLE `laravelproject_new_service_orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `appointment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `appointment_location` int(11) NOT NULL,
  `if_PPS` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_service_order_items`
--

CREATE TABLE `laravelproject_new_service_order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_service_register`
--

CREATE TABLE `laravelproject_new_service_register` (
  `service_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_phone` varchar(255) NOT NULL,
  `service_charges` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `service_category` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `service_desc` varchar(255) NOT NULL,
  `service_approve_status` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laravelproject_new_service_register`
--

INSERT INTO `laravelproject_new_service_register` (`service_id`, `store_id`, `service_name`, `company_name`, `company_phone`, `service_charges`, `company_address`, `latitude`, `longitude`, `service_category`, `country`, `city`, `state`, `featured_image`, `banner`, `rating`, `service_desc`, `service_approve_status`, `created_at`, `updated_at`) VALUES
(1, 2, 'adfdf', 'ahmedCompany', '0252525252', '23', 'uet lahore', NULL, NULL, 'ac_wash', 'Bangladesh', 'lahore', 'punjab', 'uploads/services/1574923441.jpg', NULL, NULL, 'na', '0', '2019-11-27 05:05:45', '2019-11-28 06:49:48'),
(2, 3, 'na', 'asdfasdf', '0728980269', '23', 'sdf, asdfasdf', NULL, NULL, 'clothe_wash', 'Albania', 'lahore', 'Kucove', 'uploads/services/1574923441.jpg', NULL, NULL, 'na', '0', '2019-11-27 06:06:30', '2019-11-28 06:49:45'),
(4, 1, 'Plumber', 'JohnCompany', '12345678', '35', 'Sing Pura, Lahore, Punjab, Pakistan', NULL, NULL, 'Worker', 'Pakistan', '', 'Punjab', 'uploads/services/1574924146.jpg', NULL, NULL, 'na', '1', '2019-11-28 06:44:01', '2019-11-28 07:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_store_availability_timing`
--

CREATE TABLE `laravelproject_new_store_availability_timing` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `saturday` varchar(255) NOT NULL,
  `sunday` varchar(255) NOT NULL,
  `monday` varchar(255) NOT NULL,
  `tuesday` varchar(255) NOT NULL,
  `wednesday` varchar(255) NOT NULL,
  `thursday` varchar(255) NOT NULL,
  `friday` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated-at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laravelproject_new_store_availability_timing`
--

INSERT INTO `laravelproject_new_store_availability_timing` (`id`, `user_id`, `store_id`, `saturday`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `created_at`, `updated-at`) VALUES
(1, 1, 1, '{\"saturday_opening_time\":\"02:00\",\"saturday_closing_time\":\"01:00\"}', '{\"sunday_opening_time\":\"01:00\",\"sunday_closing_time\":\"01:00\"}', '{\"monday_opening_time\":\"01:00\",\"monday_closing_time\":\"01:00\"}', '{\"tuesday_opening_time\":\"13:00\",\"tuesday_closing_time\":\"01:00\"}', '{\"wednesday_opening_time\":\"01:00\",\"wednesday_closing_time\":\"01:00\"}', '{\"thursday_opening_time\":\"01:00\",\"thursday_closing_time\":\"01:00\"}', '{\"friday_opening_time\":\"01:00\",\"friday_closing_time\":\"01:00\"}', '2019-11-25 08:26:30', '2019-11-25 08:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_store_category`
--

CREATE TABLE `laravelproject_new_store_category` (
  `category_id` int(11) NOT NULL,
  `store_owner_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `admin_approve` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laravelproject_new_store_category`
--

INSERT INTO `laravelproject_new_store_category` (`category_id`, `store_owner_id`, `category_name`, `image`, `admin_approve`, `created_at`, `updated_at`) VALUES
(1, 1, 'sports_&_outdoors', 'https://www.insertcart.com/wp-content/uploads/2016/09/category.png', '1', '2019-11-25 08:26:30', '2019-11-25 08:26:30'),
(2, 1, 'Gifts', 'uploads/categories/1574919412.jpg', '1', '2019-11-28 05:35:43', '2019-11-28 07:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_store_register`
--

CREATE TABLE `laravelproject_new_store_register` (
  `store_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `store_type` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `store_phone_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `store_featured_image` varchar(255) DEFAULT NULL,
  `store_banner` varchar(255) DEFAULT NULL,
  `store_total_reviews` varchar(255) DEFAULT NULL,
  `admin_approve_status` enum('0','1') NOT NULL,
  `commission_type` varchar(255) NOT NULL,
  `commission_percentage` varchar(255) DEFAULT NULL,
  `commission_price` varchar(255) DEFAULT NULL,
  `store_desc` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laravelproject_new_store_register`
--

INSERT INTO `laravelproject_new_store_register` (`store_id`, `user_id`, `store_name`, `company_name`, `store_type`, `country`, `store_phone_no`, `address`, `latitude`, `longitude`, `city`, `state`, `zip_code`, `store_featured_image`, `store_banner`, `store_total_reviews`, `admin_approve_status`, `commission_type`, `commission_percentage`, `commission_price`, `store_desc`, `created_at`, `updated_at`) VALUES
(1, 1, 'JohnStore', 'JohnCompany', 'goods', 'Pakistan', '12345678', 'Sing Pura, Lahore, Punjab, Pakistan', '31.373443', '74.179961', 'Lahore', 'Punjab', 24244, NULL, NULL, NULL, '0', 'percentage', '10%', '', 'Na', '2019-11-25 08:26:30', '2019-11-25 10:38:36'),
(2, 2, 'MikeStore', 'MikeCompany', 'goods', 'Pakistan', '12345678', 'Sing Pura, Lahore, Punjab, Pakistan', '31.5770191', '74.3573943', 'Lahore', 'Punjab', 24244, NULL, NULL, NULL, '0', 'percentage', '10%', '', 'Na', '2019-11-25 08:26:30', '2019-11-27 05:37:28'),
(3, 3, 'GeorgeStore', 'GeorgeCompany', 'goods', 'Pakistan', '12345678', 'Sing Pura, Lahore, Punjab, Pakistan', '31.577788', '74.350879', 'Lahore', 'Punjab', 24244, NULL, NULL, NULL, '0', 'percentage', '10%', '', 'Na', '2019-11-25 08:26:30', '2019-11-25 10:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_subscribers`
--

CREATE TABLE `laravelproject_new_subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laravelproject_new_users`
--

CREATE TABLE `laravelproject_new_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validation_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_owner` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_owner` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_owner` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_owner` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_store_owner_approve` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `blocked` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_account_login` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission_level` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laravelproject_new_users`
--

INSERT INTO `laravelproject_new_users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `salt`, `validation_code`, `status`, `admin`, `store_owner`, `service_owner`, `restaurant_owner`, `pickup_owner`, `admin_store_owner_approve`, `blocked`, `social_account_login`, `permission_level`, `created_at`, `updated_at`) VALUES
(1, 'John Ray', 'john', 'john@gmail.com', '$2y$10$Pj8owppTqrd9tj7Vnt9xD.cY8.GD5og.Oc/iy/LSX2kHNWprqS8ES', '', NULL, 'fb9a0de76cd8c15e3ece11864bdb7af456735e36', '1', NULL, '1', '1', NULL, '0', '1', '0', NULL, NULL, '2019-11-25 03:26:30', '2019-11-25 03:26:30'),
(2, 'Mike Ray', 'Mike', 'mike@gmail.com', '$2y$10$Pj8owppTqrd9tj7Vnt9xD.cY8.GD5og.Oc/iy/LSX2kHNWprqS8ES', '', NULL, 'fb9a0de76cd8c15e3ece11864bdb7af456735e36', '1', NULL, '1', '1', NULL, '0', '1', '0', NULL, NULL, '2019-11-25 03:26:30', '2019-11-25 03:26:30'),
(3, 'George Ray', 'George ', 'george@gmail.com', '$2y$10$Pj8owppTqrd9tj7Vnt9xD.cY8.GD5og.Oc/iy/LSX2kHNWprqS8ES', '', NULL, 'fb9a0de76cd8c15e3ece11864bdb7af456735e36', '1', NULL, '1', '1', NULL, '0', '1', '0', NULL, NULL, '2019-11-25 03:26:30', '2019-11-25 03:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2018_12_17_073544_create_persias_table', 1),
(8, '2018_12_17_074058_create_companys_table', 1),
(9, '2018_12_18_063802_new_field_to_persias', 2),
(10, '2018_12_18_065525_new_field_to_persias', 3),
(11, '2019_01_25_110110_create__uploadimage_table', 4),
(12, '2019_01_25_110909_create__uploadimages_table', 5),
(13, '2019_01_25_113105_create_uploadimages_table', 6),
(14, '2019_01_25_113105_create__uploadimages_table', 7),
(15, '2019_02_06_061129_create_shoppingcart_table', 7),
(19, '2019_10_22_071057_create_permission_tables', 8),
(20, '2019_11_25_113746_create_jobs_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Laravelproject_new_admin', 1),
(3, 'App\\Laravelproject_new_admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'categories_menu', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45'),
(2, 'store_categories_submenu', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45'),
(3, 'service_categories_submenu', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45'),
(4, 'user_menu', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45'),
(5, 'all_users_submenu', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45'),
(6, 'store_owner_submenu', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45'),
(7, 'service_owner_submenu', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45'),
(8, 'customers_submenu', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45'),
(9, 'blocked_submenu', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45'),
(10, 'products_menu', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45'),
(11, 'all_products_submenu', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45'),
(12, 'all_services_submenu', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45'),
(13, 'admins_menu', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45'),
(14, 'add_admin_submenu', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45'),
(15, 'all_admin_submenu', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45'),
(16, 'roles_menu', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45'),
(17, 'change_permission_submenu', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45'),
(18, 'orders_menu', 'web', '2019-10-24 23:58:35', '2019-10-24 23:58:35'),
(19, 'all_orders_submenu', 'web', '2019-10-24 23:58:35', '2019-10-24 23:58:35'),
(20, 'drivers_menu', 'web', '2019-10-28 03:11:56', '2019-10-28 03:11:56'),
(21, 'add_driver_submenu', 'web', '2019-10-28 03:11:57', '2019-10-28 03:11:57'),
(22, 'all_driver_submenu', 'web', '2019-10-28 03:11:57', '2019-10-28 03:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Top Level', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45'),
(2, 'Mid Level', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45'),
(3, 'Low Level', 'web', '2019-10-23 01:49:45', '2019-10-23 01:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(14, 2),
(14, 3),
(15, 1),
(15, 2),
(15, 3),
(16, 1),
(17, 1),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `_uploadimages`
--

CREATE TABLE `_uploadimages` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `laravelproject_new_add_products`
--
ALTER TABLE `laravelproject_new_add_products`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `laravelproject_new_add_to_carts`
--
ALTER TABLE `laravelproject_new_add_to_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravelproject_new_admins`
--
ALTER TABLE `laravelproject_new_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `laravelproject_new_customers`
--
ALTER TABLE `laravelproject_new_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravelproject_new_drivers`
--
ALTER TABLE `laravelproject_new_drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravelproject_new_driver_logs`
--
ALTER TABLE `laravelproject_new_driver_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `laravelproject_new_goods_colors_sizes`
--
ALTER TABLE `laravelproject_new_goods_colors_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `laravelproject_new_goods_favourites`
--
ALTER TABLE `laravelproject_new_goods_favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laravelproject_new_goods_favourite_ibfk_1` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `laravelproject_new_goods_orders`
--
ALTER TABLE `laravelproject_new_goods_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `laravelproject_new_goods_order_items`
--
ALTER TABLE `laravelproject_new_goods_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laravelproject_new_order_goods_items_ibfk_1` (`store_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `laravelproject_new_goods_ratings`
--
ALTER TABLE `laravelproject_new_goods_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `laravelproject_new_home_slider`
--
ALTER TABLE `laravelproject_new_home_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravelproject_new_password_resets`
--
ALTER TABLE `laravelproject_new_password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `laravelproject_new_product_trips`
--
ALTER TABLE `laravelproject_new_product_trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravelproject_new_restaurant_availability_timing`
--
ALTER TABLE `laravelproject_new_restaurant_availability_timing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravelproject_new_restaurant_category`
--
ALTER TABLE `laravelproject_new_restaurant_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `laravelproject_new_restaurant_register`
--
ALTER TABLE `laravelproject_new_restaurant_register`
  ADD PRIMARY KEY (`restaurant_id`),
  ADD UNIQUE KEY `business_name` (`business_name`);

--
-- Indexes for table `laravelproject_new_service_availability_timing`
--
ALTER TABLE `laravelproject_new_service_availability_timing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravelproject_new_service_category`
--
ALTER TABLE `laravelproject_new_service_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `laravelproject_new_service_orders`
--
ALTER TABLE `laravelproject_new_service_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravelproject_new_service_order_items`
--
ALTER TABLE `laravelproject_new_service_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `laravelproject_new_service_register`
--
ALTER TABLE `laravelproject_new_service_register`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `laravelproject_new_store_availability_timing`
--
ALTER TABLE `laravelproject_new_store_availability_timing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravelproject_new_store_category`
--
ALTER TABLE `laravelproject_new_store_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `laravelproject_new_store_register`
--
ALTER TABLE `laravelproject_new_store_register`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `laravelproject_new_subscribers`
--
ALTER TABLE `laravelproject_new_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravelproject_new_users`
--
ALTER TABLE `laravelproject_new_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `_uploadimages`
--
ALTER TABLE `_uploadimages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `laravelproject_new_add_products`
--
ALTER TABLE `laravelproject_new_add_products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `laravelproject_new_add_to_carts`
--
ALTER TABLE `laravelproject_new_add_to_carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravelproject_new_admins`
--
ALTER TABLE `laravelproject_new_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laravelproject_new_customers`
--
ALTER TABLE `laravelproject_new_customers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laravelproject_new_drivers`
--
ALTER TABLE `laravelproject_new_drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laravelproject_new_driver_logs`
--
ALTER TABLE `laravelproject_new_driver_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravelproject_new_goods_colors_sizes`
--
ALTER TABLE `laravelproject_new_goods_colors_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laravelproject_new_goods_favourites`
--
ALTER TABLE `laravelproject_new_goods_favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravelproject_new_goods_orders`
--
ALTER TABLE `laravelproject_new_goods_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `laravelproject_new_goods_order_items`
--
ALTER TABLE `laravelproject_new_goods_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `laravelproject_new_goods_ratings`
--
ALTER TABLE `laravelproject_new_goods_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravelproject_new_home_slider`
--
ALTER TABLE `laravelproject_new_home_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravelproject_new_product_trips`
--
ALTER TABLE `laravelproject_new_product_trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravelproject_new_restaurant_availability_timing`
--
ALTER TABLE `laravelproject_new_restaurant_availability_timing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravelproject_new_restaurant_category`
--
ALTER TABLE `laravelproject_new_restaurant_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravelproject_new_restaurant_register`
--
ALTER TABLE `laravelproject_new_restaurant_register`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravelproject_new_service_availability_timing`
--
ALTER TABLE `laravelproject_new_service_availability_timing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravelproject_new_service_category`
--
ALTER TABLE `laravelproject_new_service_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laravelproject_new_service_orders`
--
ALTER TABLE `laravelproject_new_service_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravelproject_new_service_order_items`
--
ALTER TABLE `laravelproject_new_service_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravelproject_new_service_register`
--
ALTER TABLE `laravelproject_new_service_register`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laravelproject_new_store_availability_timing`
--
ALTER TABLE `laravelproject_new_store_availability_timing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laravelproject_new_store_category`
--
ALTER TABLE `laravelproject_new_store_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laravelproject_new_store_register`
--
ALTER TABLE `laravelproject_new_store_register`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laravelproject_new_subscribers`
--
ALTER TABLE `laravelproject_new_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravelproject_new_users`
--
ALTER TABLE `laravelproject_new_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `_uploadimages`
--
ALTER TABLE `_uploadimages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laravelproject_new_add_products`
--
ALTER TABLE `laravelproject_new_add_products`
  ADD CONSTRAINT `laravelproject_new_add_products_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `laravelproject_new_store_register` (`store_id`);

--
-- Constraints for table `laravelproject_new_driver_logs`
--
ALTER TABLE `laravelproject_new_driver_logs`
  ADD CONSTRAINT `laravelproject_new_driver_logs_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `laravelproject_new_drivers` (`id`),
  ADD CONSTRAINT `laravelproject_new_driver_logs_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `laravelproject_new_goods_orders` (`id`);

--
-- Constraints for table `laravelproject_new_goods_colors_sizes`
--
ALTER TABLE `laravelproject_new_goods_colors_sizes`
  ADD CONSTRAINT `laravelproject_new_goods_colors_sizes_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `laravelproject_new_add_products` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laravelproject_new_goods_favourites`
--
ALTER TABLE `laravelproject_new_goods_favourites`
  ADD CONSTRAINT `laravelproject_new_goods_favourites_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `laravelproject_new_add_products` (`p_id`),
  ADD CONSTRAINT `laravelproject_new_goods_favourites_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `laravelproject_new_customers` (`id`);

--
-- Constraints for table `laravelproject_new_goods_orders`
--
ALTER TABLE `laravelproject_new_goods_orders`
  ADD CONSTRAINT `laravelproject_new_goods_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `laravelproject_new_customers` (`id`);

--
-- Constraints for table `laravelproject_new_goods_order_items`
--
ALTER TABLE `laravelproject_new_goods_order_items`
  ADD CONSTRAINT `laravelproject_new_goods_order_items_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `laravelproject_new_store_register` (`store_id`),
  ADD CONSTRAINT `laravelproject_new_goods_order_items_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `laravelproject_new_goods_orders` (`id`);

--
-- Constraints for table `laravelproject_new_goods_ratings`
--
ALTER TABLE `laravelproject_new_goods_ratings`
  ADD CONSTRAINT `laravelproject_new_goods_ratings_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `laravelproject_new_customers` (`id`),
  ADD CONSTRAINT `laravelproject_new_goods_ratings_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `laravelproject_new_add_products` (`p_id`);

--
-- Constraints for table `laravelproject_new_service_order_items`
--
ALTER TABLE `laravelproject_new_service_order_items`
  ADD CONSTRAINT `laravelproject_new_service_order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `laravelproject_new_service_orders` (`id`),
  ADD CONSTRAINT `laravelproject_new_service_order_items_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `laravelproject_new_service_register` (`service_id`),
  ADD CONSTRAINT `laravelproject_new_service_order_items_ibfk_3` FOREIGN KEY (`store_id`) REFERENCES `laravelproject_new_store_register` (`store_id`);

--
-- Constraints for table `laravelproject_new_service_register`
--
ALTER TABLE `laravelproject_new_service_register`
  ADD CONSTRAINT `laravelproject_new_service_register_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `laravelproject_new_store_register` (`store_id`);

--
-- Constraints for table `laravelproject_new_store_register`
--
ALTER TABLE `laravelproject_new_store_register`
  ADD CONSTRAINT `laravelproject_new_store_register_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `laravelproject_new_users` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
