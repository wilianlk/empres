-- MySQL dump 10.16  Distrib 10.2.15-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: atributos
-- ------------------------------------------------------
-- Server version	10.2.15-MariaDB-10.2.15+maria~xenial-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tienda_inventario`
--

DROP TABLE IF EXISTS `tienda_inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tienda_inventario` (
  `id_tienda_inventario` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` bigint(20) NOT NULL,
  `id_tienda` int(11) NOT NULL,
  `precio` double NOT NULL,
  `precio_promocion` double DEFAULT 0,
  `tax` double NOT NULL DEFAULT 0,
  `inventario_stock` int(11) NOT NULL DEFAULT 0,
  `inventario_hold` int(11) NOT NULL DEFAULT 0,
  `inventario_vendido` int(11) NOT NULL DEFAULT 0,
  `inventario_total` int(11) NOT NULL DEFAULT 0,
  `en_venta` tinyint(1) NOT NULL DEFAULT 1,
  `en_promocion` tinyint(1) NOT NULL DEFAULT 0,
  `locacion` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `descuento` decimal(10,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id_tienda_inventario`),
  UNIQUE KEY `id_producto_uniq` (`id_producto`,`id_tienda`),
  KEY `id_producto_idx` (`id_producto`),
  KEY `id_tienda_idx` (`id_tienda`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`),
  CONSTRAINT `tienda_inventario_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  CONSTRAINT `tienda_inventario_id_producto_producto_id_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  CONSTRAINT `tienda_inventario_id_tienda_tienda_id_tienda` FOREIGN KEY (`id_tienda`) REFERENCES `tienda` (`id_tienda`),
  CONSTRAINT `tienda_inventario_updated_by_sf_guard_user_id` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=213256 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-26 10:16:49
