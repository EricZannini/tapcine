-- MySQL dump 10.13  Distrib 8.4.3, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_pweb2_cinema
-- ------------------------------------------------------
-- Server version	8.4.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `db_pweb2_cinema`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `db_pweb2_cinema` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_pweb2_cinema`;

--
-- Table structure for table `atores`
--

DROP TABLE IF EXISTS `atores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `atores` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacionalidade` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fichas`
--

DROP TABLE IF EXISTS `fichas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fichas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `filme_id` bigint unsigned NOT NULL,
  `diretor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ano` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sinopse` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fichas_filme_id_unique` (`filme_id`),
  CONSTRAINT `fichas_filme_id_foreign` FOREIGN KEY (`filme_id`) REFERENCES `filmes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `filmes`
--

DROP TABLE IF EXISTS `filmes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `filmes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duracao` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classificacao` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nota` decimal(3,1) NOT NULL DEFAULT '0.0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ingressos`
--

DROP TABLE IF EXISTS `ingressos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ingressos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sessao_id` bigint unsigned NOT NULL,
  `cliente_nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assento` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_ingresso` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `data_venda` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ingressos_sessao_id_foreign` (`sessao_id`),
  CONSTRAINT `ingressos_sessao_id_foreign` FOREIGN KEY (`sessao_id`) REFERENCES `sessoes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` decimal(6,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantidade_vendida` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sessoes`
--

DROP TABLE IF EXISTS `sessoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessoes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `filme_id` bigint unsigned NOT NULL,
  `sala` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_sessao` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `preco` decimal(6,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sessoes_filme_id_foreign` (`filme_id`),
  CONSTRAINT `sessoes_filme_id_foreign` FOREIGN KEY (`filme_id`) REFERENCES `filmes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_login_unique` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-10-23 19:14:12
-- MySQL dump 10.13  Distrib 8.4.3, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_pweb2_cinema
-- ------------------------------------------------------
-- Server version	8.4.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `atores`
--

LOCK TABLES `atores` WRITE;
/*!40000 ALTER TABLE `atores` DISABLE KEYS */;
INSERT INTO `atores` VALUES (1,'Tom Hanks','Estados Unidos','1956-07-09','2026-10-23 01:54:23','2026-10-23 01:54:23','imagem/ator/tom-hanks.jpg'),(2,'Fernanda Montenegro','Brasil','1929-10-16','2026-10-23 01:54:23','2026-10-23 01:54:23','imagem/ator/fernanda-montenegro.jpg'),(3,'Scarlett Johansson','Estados Unidos','1984-11-22','2026-10-23 01:54:23','2026-10-23 01:54:23','imagem/ator/scarlett-johansson.jpg'),(4,'Wagner Moura','Brasil','1976-06-27','2026-10-23 01:54:23','2026-10-23 01:54:23','imagem/ator/wagner-moura.jpg'),(8,'Jackson','Brasileira','1932-10-03','2026-10-23 20:19:08','2026-10-23 20:19:08','imagem/ator/20261023171907.jpg');
/*!40000 ALTER TABLE `atores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fichas`
--

LOCK TABLES `fichas` WRITE;
/*!40000 ALTER TABLE `fichas` DISABLE KEYS */;
INSERT INTO `fichas` VALUES (1,1,'Aaron Horvath','2023','O encanador Mario embarca em uma aventura pelo Reino dos Cogumelos.','2026-10-23 01:54:23','2026-10-23 01:54:23'),(2,2,'Catherine Hardwicke','2008','Uma jovem se apaixona por um vampiro em uma pequena cidade.','2026-10-23 01:54:23','2026-10-23 01:54:23'),(3,3,'Roberto Santucci','2023','Uma comédia sobre confusões e trocas inesperadas.','2026-10-23 01:54:23','2026-10-23 01:54:23');
/*!40000 ALTER TABLE `fichas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `filmes`
--

LOCK TABLES `filmes` WRITE;
/*!40000 ALTER TABLE `filmes` DISABLE KEYS */;
INSERT INTO `filmes` VALUES (1,'Super Mario Galaxy O Filme','Ação e Aventura','1h39','6+','2026-10-23 01:54:23','2026-10-23 01:54:23','imagem/filme/super-mario-galaxy.jpg',8.2),(2,'Crepúsculo (Relançamento)','Fantasia e Romance','2h02','12+','2026-10-23 01:54:23','2026-10-23 01:54:23','imagem/filme/crepusculo.jpg',6.5),(3,'Cara de Um, Focinho de Outro','Animação, Aventura e Comédia','1h45','6+','2026-10-23 01:54:23','2026-10-23 01:54:23','imagem/filme/cara-de-um-focinho-de-outro.jpg',7.0),(4,'Pânico 7','Terror e Mistério','1h54','18+','2026-10-23 01:54:23','2026-10-23 01:54:23','imagem/filme/panico-7.jpg',7.8),(5,'Devoradores de Estrelas','Ação e Aventura','2h02','12+','2026-10-23 01:54:23','2026-10-23 01:54:23','imagem/filme/devoradores-de-estrelas.jpg',8.0),(6,'Velhos Bandidos','Policial, Ação e Comédia','1h33','14+','2026-10-23 01:54:23','2026-10-23 01:54:23','imagem/filme/velhos-bandidos.jpg',7.3),(7,'Backrooms','Terror','1h50','16+','2026-10-23 01:54:23','2026-10-23 01:54:23','imagem/filme/backrooms.jpg',6.9),(8,'Scarface','Ação e Aventura','2h50','18+','2026-10-23 01:54:23','2026-10-23 01:54:23','imagem/filme/scarface.jpg',9.2),(9,'Todo Mundo em Pânico 6','Comédia','1h35','18+','2026-10-23 01:54:23','2026-10-23 01:54:23','imagem/filme/todo-mundo-em-panico-6.jpg',6.0),(10,'Dia D','Suspense','2h30','12+','2026-10-23 01:54:23','2026-10-23 01:54:23','imagem/filme/dia-d.jpg',7.5),(11,'Vingadores','Ação e Aventura','2h30','14+','2026-10-23 01:54:23','2026-10-23 01:54:23','imagem/filme/vingadores.jpg',9.0),(12,'Vingadores: Guerra Infinita','Super-Herói','1h30','12+','2026-10-23 01:54:23','2026-10-23 01:56:44','imagem/filme/vingadores-3.jpg',8.7),(14,'Django Livre','cxzcz','1h30','12','2026-10-23 20:31:07','2026-10-23 20:31:20','imagem/filme/20261023173120.jpg',1.4);
/*!40000 ALTER TABLE `filmes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ingressos`
--

LOCK TABLES `ingressos` WRITE;
/*!40000 ALTER TABLE `ingressos` DISABLE KEYS */;
INSERT INTO `ingressos` VALUES (1,3,'Carlos Pereira','B10','Meia','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-13'),(2,4,'João Silva','F7','Inteira','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-14'),(3,1,'Júlia Alves','F2','Meia','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-15'),(4,3,'Júlia Alves','F8','Meia','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-15'),(5,3,'Ana Lima','F10','Inteira','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-16'),(6,2,'Ana Lima','B8','Meia','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-16'),(7,1,'Carlos Pereira','B8','Meia','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-16'),(8,2,'Pedro Rocha','B1','Inteira','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-17'),(9,3,'Bruno Dias','D8','Meia','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-17'),(10,4,'Júlia Alves','E2','Meia','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-17'),(11,2,'Eric Zannini','F10','Inteira','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-17'),(12,4,'João Silva','B8','Meia','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-17'),(13,4,'Júlia Alves','B10','Meia','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-18'),(14,2,'Júlia Alves','A9','Inteira','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-18'),(15,4,'Júlia Alves','B9','Inteira','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-18'),(16,1,'Júlia Alves','E1','Inteira','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-19'),(17,4,'Bruno Dias','F3','Meia','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-19'),(18,4,'Carlos Pereira','E3','Inteira','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-20'),(19,2,'Ana Lima','A4','Meia','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-20'),(20,4,'Carlos Pereira','E4','Meia','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-20'),(21,3,'Ana Lima','C7','Meia','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-20'),(22,1,'Carlos Pereira','B2','Inteira','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-21'),(23,1,'Ana Lima','B4','Meia','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-22'),(24,4,'Eric Zannini','E9','Inteira','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-22'),(25,1,'Júlia Alves','F10','Meia','2026-10-23 01:54:23','2026-10-23 01:54:23','2026-10-22');
/*!40000 ALTER TABLE `ingressos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_08_27_000001_create_filmes_table',1),(5,'2026_08_27_000002_create_sessoes_table',1),(6,'2026_08_27_000003_create_ingressos_table',1),(7,'2026_08_27_000004_create_usuarios_table',1),(8,'2026_09_04_000001_create_fichas_table',1),(9,'2026_10_15_000001_create_atores_table',1),(10,'2026_10_15_000002_create_produtos_table',1),(11,'2026_10_16_000001_add_imagem_to_filmes_and_atores',1),(12,'2026_10_16_000002_add_campos_graficos',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'Pipoca Grande','Pipoca',25.00,'2026-10-23 01:54:23','2026-10-23 01:54:23',120),(2,'Pipoca Média','Pipoca',20.00,'2026-10-23 01:54:23','2026-10-23 01:54:23',95),(3,'Refrigerante 500ml','Bebida',12.00,'2026-10-23 01:54:23','2026-10-23 01:54:23',150),(4,'Água Mineral','Bebida',7.00,'2026-10-23 01:54:23','2026-10-23 01:54:23',60),(5,'Chocolate','Doce',10.00,'2026-10-23 01:54:23','2026-10-23 01:54:23',80),(6,'Combo Casal','Combo',55.00,'2026-10-23 01:54:23','2026-10-23 01:54:23',45);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sessoes`
--

LOCK TABLES `sessoes` WRITE;
/*!40000 ALTER TABLE `sessoes` DISABLE KEYS */;
INSERT INTO `sessoes` VALUES (1,1,'Sala 1','2026-09-10','14:00:00',25.00,'2026-10-23 01:54:23','2026-10-23 01:54:23'),(2,2,'Sala 2','2026-09-10','16:30:00',25.00,'2026-10-23 01:54:23','2026-10-23 01:54:23'),(3,3,'Sala 3','2026-09-11','19:00:00',30.00,'2026-10-23 01:54:23','2026-10-23 01:54:23'),(4,4,'Sala VIP','2026-09-12','20:00:00',45.00,'2026-10-23 01:54:23','2026-10-23 01:54:23');
/*!40000 ALTER TABLE `sessoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Administrador','(49) 99999-0000','admin@tapcine.com','admin','$2y$12$5X6QkvtAbWKNHweTRLlHSOxEYujuSCu4n9mshCGoL3YnSIId6OPTS','2026-10-23 01:54:22','2026-10-23 01:54:22');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-10-23 19:14:12
