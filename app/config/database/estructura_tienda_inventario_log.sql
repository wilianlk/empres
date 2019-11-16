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
-- Table structure for table `tienda_inventario_log`
--

DROP TABLE IF EXISTS `tienda_inventario_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tienda_inventario_log` (
  `id_tienda_inventario_log` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_tienda` int(11) NOT NULL,
  `id_producto` bigint(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `tipo` char(1) NOT NULL DEFAULT 'I' COMMENT 'I => IN; O => OUT',
  `id_tipo_movim_inventario_log` int(11) NOT NULL,
  `procesado` tinyint(1) NOT NULL DEFAULT 0,
  `locacion` varchar(10) DEFAULT NULL,
  `id_proveedor_despacho` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_tienda_inventario_log`),
  KEY `deleted_by` (`deleted_by`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`),
  KEY `id_tienda` (`id_tienda`),
  KEY `id_producto` (`id_producto`),
  KEY `id_tienda_2` (`id_tienda`,`id_producto`),
  KEY `id_tipo_movim_inventario_log` (`id_tipo_movim_inventario_log`),
  KEY `id_proveedor_factura` (`id_proveedor_despacho`),
  CONSTRAINT `tienda_inventario_log_ibfk_1` FOREIGN KEY (`id_tienda`) REFERENCES `tienda` (`id_tienda`),
  CONSTRAINT `tienda_inventario_log_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  CONSTRAINT `tienda_inventario_log_ibfk_3` FOREIGN KEY (`id_tipo_movim_inventario_log`) REFERENCES `gen_tipo_movim_inventario_log` (`id_tipo_movim_inventario_log`),
  CONSTRAINT `tienda_inventario_log_ibfk_4` FOREIGN KEY (`created_by`) REFERENCES `users` (`id_user`),
  CONSTRAINT `tienda_inventario_log_ibfk_5` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id_user`),
  CONSTRAINT `tienda_inventario_log_ibfk_6` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=102941 DEFAULT CHARSET=latin1 COMMENT='Log con los movimiento de Inventario';
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
