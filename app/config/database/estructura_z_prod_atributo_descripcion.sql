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
-- Temporary table structure for view `Z_prod_atributo_descripcion`
--

DROP TABLE IF EXISTS `Z_prod_atributo_descripcion`;
/*!50001 DROP VIEW IF EXISTS `Z_prod_atributo_descripcion`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `Z_prod_atributo_descripcion` (
  `id_producto_referencia` tinyint NOT NULL,
  `orden` tinyint NOT NULL,
  `nombre_tipo` tinyint NOT NULL,
  `nombre_tipo_ing` tinyint NOT NULL,
  `nombre` tinyint NOT NULL,
  `nombre_ing` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `Z_prod_atributo_descripcion`
--

/*!50001 DROP TABLE IF EXISTS `Z_prod_atributo_descripcion`*/;
/*!50001 DROP VIEW IF EXISTS `Z_prod_atributo_descripcion`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`java`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `Z_prod_atributo_descripcion` AS select `pa`.`id_producto_referencia` AS `id_producto_referencia`,`pdoa`.`orden` AS `orden`,`pdt`.`nombre` AS `nombre_tipo`,`pdt`.`nombre_ing` AS `nombre_tipo_ing`,group_concat(`pda`.`nombre` order by `pda`.`orden_tipo` ASC separator ', ') AS `nombre`,group_concat(`pda`.`nombre_ing` order by `pda`.`orden_tipo` ASC separator ', ') AS `nombre_ing` from (((`prod_depto_atributo` `pda` join `prod_atributo` `pa` on(`pda`.`id_atributo` = `pa`.`id_atributo`)) join `prod_depto_orden_atributo` `pdoa` on(`pda`.`id_departamento` = `pdoa`.`id_departamento` and `pda`.`id_tipo` = `pdoa`.`id_tipo_atributo`)) join `prod_depto_tipo_atributo` `pdt` on(`pdoa`.`id_tipo_atributo` = `pdt`.`id`)) group by `pa`.`id_producto_referencia`,`pdt`.`nombre` order by `pa`.`id_producto_referencia`,`pdoa`.`orden` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-26 15:57:39
