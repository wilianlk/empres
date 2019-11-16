DROP PROCEDURE IF EXISTS usebenefis;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `usebenefis`()
BEGIN
DECLARE empfullname VARCHAR(100);
DECLARE finish bool;
DECLARE cursor1 CURSOR FOR

SELECT e.empfullname FROM info i
INNER JOIN employees e ON e.id_employee = i.id_employee
GROUP BY e.empfullname;

DECLARE CONTINUE HANDLER FOR NOT FOUND SET finish = true;
 OPEN cursor1;
    benefit : LOOP
        FETCH cursor1
        INTO
           empfullname;

          IF finish THEN LEAVE benefit;
          END IF;

			 SELECT
			 fullname,
			 HOUR(from_unixtime(946702800+timeee)) HORAS,
			 MINUTE( from_unixtime(946702800+timeee))
			 MINUTOS,SECOND(from_unixtime(946702800+timeee))
			 SEGUNDOS,DATE_FORMAT(from_unixtime					(946702800+timeee),'%H:%i') time,timeee FROM (

			 SELECT fullname, SUM(tiempo) as timeee FROM(
		    select info.fullname, info.in_out,
			 if(punchlist.in_or_out = 0, (info.timestamp),(-1*info.timestamp)) as tiempo,
			 info.notes, info.ipaddress, punchlist.in_or_out, punchlist.punchitems,
			 punchlist.color
			 FROM info, punchlist, employees
			 where info.fullname = empfullname
			 and info.timestamp >= '1548928800'
			 and info.timestamp <= '1549015200'
		    and info.in_out = punchlist.punchitems
			 and employees.empfullname = empfullname
			 and employees.empfullname <> 'admin'
		    order by info.timestamp desc) a
			 ) b;


          INSERT INTO prueba1 (fullname,hours,minutes,seconds)
			 SELECT
			 fullname,
			 HOUR(from_unixtime(946702800+timeee)) HORAS,
			 MINUTE( from_unixtime(946702800+timeee))
			 MINUTOS,SECOND(from_unixtime(946702800+timeee))
			 SEGUNDOS
			 FROM (

			 SELECT fullname, SUM(tiempo) as timeee FROM(
		    select info.fullname, info.inout,
			 if(punchlist.in_or_out = 0, (info.timestamp),(-1*info.timestamp)) as tiempo,
			 info.notes, info.ipaddress, punchlist.in_or_out, punchlist.punchitems,
			 punchlist.color
			 FROM info, punchlist, employees
			 where info.fullname = empfullname
			 and info.timestamp >= '1548928800'
			 and info.timestamp <= '1549015200'
		    and info.in_out = punchlist.punchitems
			 and employees.empfullname = empfullname
			 and employees.empfullname <> 'admin'
		    order by info.timestamp desc) a
			 ) b;

    END LOOP benefit;
 CLOSE cursor1;
 END$$
DELIMITER ;

##############

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `descuentos2`()
BEGIN
  DECLARE
         id_descuento,id_departamento,tipo,
         nuevaColeccion,linea,superoferta,
         liquidacion,extraliquidacion INT;
 DECLARE fecha_inicial,fecha_final DATE;
 DECLARE departamento,estilo,campos,fiels,estado,icampos VARCHAR(100);
 DECLARE finish bool;
 DECLARE cursor1 CURSOR FOR

   SELECT ds.id_descuento,ds.id_departamento,ds.departamento,ds.tiendas,
	ds.nuevaColeccion,ds.linea,ds.superoferta,ds.liquidacion,ds.extraliquidacion,
	ds.fecha_inicial,ds.fecha_final,ds.estilo,ds.campo,ds.estado
	FROM Z_descuentos_ska ds
	WHERE ds.tiendas = CONVERT('FISICA' USING utf8)
	ORDER BY estilo DESC;

 DECLARE CONTINUE HANDLER FOR NOT FOUND SET finish = true;
 OPEN cursor1;
    leer_descuento : LOOP
        FETCH cursor1
        INTO
           id_descuento,id_departamento,departamento,tipo,
           nuevaColeccion,linea,superoferta,
           liquidacion,extraliquidacion,
           fecha_inicial,fecha_final,estilo,campos,estado;

          IF finish THEN LEAVE leer_descuento;
          END IF;

          SELECT id_descuento,id_departamento,departamento,tipo as 'tienda fisica',
                 CONCAT(nuevaColeccion,'|', '   0-4') as nuevaColeccion,
                 CONCAT(linea,' |', '     5-12') as linea,
                 CONCAT(superoferta,'|', '     13-24') as superoferta,
                 CONCAT(liquidacion,'|', '     25-48') as liquidacion,
                 CONCAT(extraliquidacion,'|', '   > 48') as extraliquidacion,fecha_inicial,fecha_final,estilo,campos;

          IF CURDATE() BETWEEN fecha_inicial AND fecha_final THEN

          IF estilo IS NULL THEN

           SELECT "Estilo null";

           UPDATE tienda_inventario ti
			 	   JOIN Z_producto_compras zp on ti.id_producto = zp.id_producto and zp.departamento = departamento
				   JOIN coleccion_detalle c on zp.id_producto_referencia = c.id_producto_referencia
				   JOIN Z_calendario_descuentosSka d on c.id_producto_referencia = d.id_producto_referencia

				   SET ti.precio_promocion= ROUND((ti.precio-ti.precio*(nuevaColeccion/100)),4)

				   WHERE zp.descripcion NOT LIKE  '%clasico%'
				   AND ti.id_tienda in (2,3,4,5,6,12,13,14,15)
				   AND ti.inventario_stock > 0
				   AND d.dif BETWEEN 0 AND 4;

				   UPDATE tienda_inventario ti
			 	   JOIN Z_producto_compras zp on ti.id_producto = zp.id_producto and zp.departamento = departamento
				   JOIN coleccion_detalle c on zp.id_producto_referencia = c.id_producto_referencia
				   JOIN Z_calendario_descuentosSka d on c.id_producto_referencia = d.id_producto_referencia

				   SET ti.precio_promocion= ROUND((ti.precio-ti.precio*(linea/100)),4)

				   WHERE zp.descripcion NOT LIKE  '%clasico%'
				   AND ti.id_tienda in (2,3,4,5,6,12,13,14,15)
				   AND ti.inventario_stock > 0
				   AND d.dif BETWEEN 5 AND 12;

				   UPDATE tienda_inventario ti
			 	   JOIN Z_producto_compras zp on ti.id_producto = zp.id_producto and zp.departamento = departamento
				   JOIN coleccion_detalle c on zp.id_producto_referencia = c.id_producto_referencia
				   JOIN Z_calendario_descuentosSka d on c.id_producto_referencia = d.id_producto_referencia

				   set ti.precio_promocion= ROUND((ti.precio-ti.precio*(superoferta/100)),4)

				   WHERE zp.descripcion NOT LIKE  '%clasico%'
				   AND ti.id_tienda in (2,3,4,5,6,12,13,14,15)
				   AND ti.inventario_stock > 0
				   AND d.dif BETWEEN 13 AND 24;

				   UPDATE tienda_inventario ti
			 	   JOIN Z_producto_compras zp on ti.id_producto = zp.id_producto and zp.departamento = departamento
				   JOIN coleccion_detalle c on zp.id_producto_referencia = c.id_producto_referencia
				   JOIN Z_calendario_descuentosSka d on c.id_producto_referencia = d.id_producto_referencia

				   set ti.precio_promocion= ROUND((ti.precio-ti.precio*(liquidacion/100)),4)

				   WHERE zp.descripcion NOT LIKE  '%clasico%'
				   AND ti.id_tienda in (2,3,4,5,6,12,13,14,15)
				   AND ti.inventario_stock > 0
				   AND d.dif BETWEEN 25 AND 48;

				   UPDATE tienda_inventario ti
			 	   JOIN Z_producto_compras zp on ti.id_producto = zp.id_producto and zp.departamento = departamento
				   JOIN coleccion_detalle c on zp.id_producto_referencia = c.id_producto_referencia
				   JOIN Z_calendario_descuentosSka d on c.id_producto_referencia = d.id_producto_referencia

				   set ti.precio_promocion= ROUND((ti.precio-ti.precio*(extraliquidacion/100)),4)

				   WHERE zp.descripcion NOT LIKE  '%clasico%'
				   AND ti.id_tienda in (2,3,4,5,6,12,13,14,15)
				   AND ti.inventario_stock > 0
				   AND d.dif > 48;

				   SELECT ti.precio_promocion,ti.precio-(ti.precio*(superoferta/100)),ROUND((ti.precio-(ti.precio*(superoferta/100))),4),ti.inventario_stock,zp.departamento,zp.descripcion,zp.id_producto,zp.referencia,d.dif FROM tienda_inventario ti
           JOIN Z_producto_compras zp ON ti.id_producto = zp.id_producto AND  zp.departamento = departamento
           JOIN coleccion_detalle c ON zp.id_producto_referencia = c.id_producto_referencia
           JOIN Z_calendario_descuentosSka d ON c.id_producto_referencia = d.id_producto_referencia
           WHERE zp.descripcion NOT LIKE  '%clasico%'
           AND ti.id_tienda in (2,3,4,5,6,12,13,14,15)
           AND ti.inventario_stock > 0
           AND d.dif BETWEEN 13 AND 24
           LIMIT 5;

				ELSE

				SELECT "Con estilo ";

				   UPDATE tienda_inventario ti
			 	   JOIN Z_producto_compras zp on ti.id_producto = zp.id_producto and zp.departamento = departamento
				   JOIN coleccion_detalle c on zp.id_producto_referencia = c.id_producto_referencia
				   JOIN Z_calendario_descuentosSka d on c.id_producto_referencia = d.id_producto_referencia

				   set ti.precio_promocion= ROUND((ti.precio-ti.precio*(nuevaColeccion/100)),4)

				   WHERE zp.descripcion = estilo
				   AND ti.id_tienda in (2,3,4,5,6,12,13,14,15)
				   AND ti.inventario_stock > 0
				   AND d.dif BETWEEN 0 AND 4;

				   UPDATE tienda_inventario ti
			 	   JOIN Z_producto_compras zp on ti.id_producto = zp.id_producto and zp.departamento = departamento
				   JOIN coleccion_detalle c on zp.id_producto_referencia = c.id_producto_referencia
				   JOIN Z_calendario_descuentosSka d on c.id_producto_referencia = d.id_producto_referencia

				   SET ti.precio_promocion= ROUND((ti.precio-ti.precio*(linea/100)),4)

				   WHERE zp.descripcion = estilo
				   AND ti.id_tienda in (2,3,4,5,6,12,13,14,15)
				   AND ti.inventario_stock > 0
				   AND d.dif BETWEEN 5 AND 12;

				   UPDATE tienda_inventario ti
			 	   JOIN Z_producto_compras zp on ti.id_producto = zp.id_producto and zp.departamento = departamento
				   JOIN coleccion_detalle c on zp.id_producto_referencia = c.id_producto_referencia
				   JOIN Z_calendario_descuentosSka d on c.id_producto_referencia = d.id_producto_referencia

				   SET ti.precio_promocion= ROUND((ti.precio-ti.precio*(superoferta/100)),4)

				   WHERE zp.descripcion = estilo
				   AND ti.id_tienda in (2,3,4,5,6,12,13,14,15)
				   AND ti.inventario_stock > 0
				   AND d.dif BETWEEN 13 AND 24;

				   UPDATE tienda_inventario ti
			 	   JOIN Z_producto_compras zp on ti.id_producto = zp.id_producto and zp.departamento = departamento
				   JOIN coleccion_detalle c on zp.id_producto_referencia = c.id_producto_referencia
				   JOIN Z_calendario_descuentosSka d on c.id_producto_referencia = d.id_producto_referencia

				   SET ti.precio_promocion= ROUND((ti.precio-ti.precio*(liquidacion/100)),4)

				   WHERE zp.descripcion = estilo
				   AND ti.id_tienda in (2,3,4,5,6,12,13,14,15)
				   AND ti.inventario_stock > 0
				   AND d.dif BETWEEN 25 AND 48;

				   UPDATE tienda_inventario ti
			 	   JOIN Z_producto_compras zp on ti.id_producto = zp.id_producto and zp.departamento = departamento
				   JOIN coleccion_detalle c on zp.id_producto_referencia = c.id_producto_referencia
				   JOIN Z_calendario_descuentosSka d on c.id_producto_referencia = d.id_producto_referencia

				   SET ti.precio_promocion= ROUND((ti.precio-ti.precio*(extraliquidacion/100)),4)

				   WHERE zp.descripcion = estilo
				   AND ti.id_tienda in (2,3,4,5,6,12,13,14,15)
				   AND ti.inventario_stock > 0
				   AND d.dif > 48;

				   SELECT ti.precio_promocion,ti.precio-(ti.precio*(superoferta/100)),ROUND((ti.precio-(ti.precio*(superoferta/100))),4),ti.inventario_stock,zp.departamento,zp.descripcion,zp.id_producto,zp.referencia,d.dif FROM tienda_inventario ti
           JOIN Z_producto_compras zp ON ti.id_producto = zp.id_producto AND  zp.departamento = departamento
           JOIN coleccion_detalle c ON zp.id_producto_referencia = c.id_producto_referencia
           JOIN Z_calendario_descuentosSka d ON c.id_producto_referencia = d.id_producto_referencia
           WHERE zp.descripcion = estilo
           AND ti.id_tienda in (2,3,4,5,6,12,13,14,15)
           AND ti.inventario_stock > 0
           AND d.dif BETWEEN 13 AND 24
           LIMIT 5;

        END IF;

        IF campos IS NOT NULL THEN

        WHILE (LOCATE(',', campos) > 0) DO
         SET icampos = SUBSTRING(left (campos,7),1);
         SET fiels = SUBSTRING(campos,8, LOCATE(',',campos)-8);
         SET campos = SUBSTRING(campos, LOCATE(',',campos) + 1);

         SET @truncate = "TRUNCATE TABLE descuentos_campos_ska";
         PREPARE trun FROM @truncate;
         EXECUTE trun;
         DEALLOCATE PREPARE trun;

        IF icampos = "campo#1"  THEN
				  SET @campo1 = fiels;
        END IF;

        IF icampos = "campo#2"  THEN
          SET @campo2 = fiels;
        END IF;

        IF icampos = "campo#3"  THEN
          SET @campo3 = fiels;
        END IF;

        IF icampos = "campo#4"  THEN
          SET @campo4 = fiels;
        END IF;

        SELECT "Insertar Campos";
        SELECT icampos,@campo1,@campo2,@campo3,@campo4;

         UPDATE tienda_inventario ti
				 JOIN Z_producto_compras zp on ti.id_producto = zp.id_producto and zp.departamento = departamento
				 JOIN coleccion_detalle c on zp.id_producto_referencia = c.id_producto_referencia
				 JOIN Z_calendario_descuentosSka d on c.id_producto_referencia = d.id_producto_referencia

				 SET ti.precio_promocion= ROUND((ti.precio-ti.precio*(nuevaColeccion/100)),4)

			   WHERE zp.descripcion NOT LIKE  '%clasico%'
			   AND ti.id_tienda in (2,3,4,5,6,12,13,14,15)
			   AND ti.inventario_stock > 0
				 AND zp.campo1 = fiels
				 AND d.dif BETWEEN 0 AND 4;

				 UPDATE tienda_inventario ti
				 JOIN Z_producto_compras zp on ti.id_producto = zp.id_producto and zp.departamento = departamento
				 JOIN coleccion_detalle c on zp.id_producto_referencia = c.id_producto_referencia
				 JOIN Z_calendario_descuentosSka d on c.id_producto_referencia = d.id_producto_referencia

				 SET ti.precio_promocion= ROUND((ti.precio-ti.precio*(linea/100)),4)

			   WHERE zp.descripcion NOT LIKE  '%clasico%'
			   AND ti.id_tienda in (2,3,4,5,6,12,13,14,15)
			   AND ti.inventario_stock > 0
				 AND zp.campo1 = fiels
				 AND d.dif BETWEEN 5 AND 12;

				 UPDATE tienda_inventario ti
				 JOIN Z_producto_compras zp on ti.id_producto = zp.id_producto and zp.departamento = departamento
				 JOIN coleccion_detalle c on zp.id_producto_referencia = c.id_producto_referencia
				 JOIN Z_calendario_descuentosSka d on c.id_producto_referencia = d.id_producto_referencia

				 SET ti.precio_promocion= ROUND((ti.precio-ti.precio*(superoferta/100)),4)

			   WHERE zp.descripcion NOT LIKE  '%clasico%'
			   AND ti.id_tienda in (2,3,4,5,6,12,13,14,15)
			   AND ti.inventario_stock > 0
				 AND zp.campo1 = fiels
				 AND d.dif BETWEEN 13 AND 24;

				 UPDATE tienda_inventario ti
				 JOIN Z_producto_compras zp on ti.id_producto = zp.id_producto and zp.departamento = departamento
				 JOIN coleccion_detalle c on zp.id_producto_referencia = c.id_producto_referencia
				 JOIN Z_calendario_descuentosSka d on c.id_producto_referencia = d.id_producto_referencia

				 SET ti.precio_promocion= ROUND((ti.precio-ti.precio*(liquidacion/100)),4)

			   WHERE zp.descripcion NOT LIKE  '%clasico%'
			   AND ti.id_tienda in (2,3,4,5,6,12,13,14,15)
			   AND ti.inventario_stock > 0
				 AND zp.campo1 = fiels
				 AND d.dif BETWEEN 25 AND 48;

				 UPDATE tienda_inventario ti
				 JOIN Z_producto_compras zp on ti.id_producto = zp.id_producto and zp.departamento = departamento
				 JOIN coleccion_detalle c on zp.id_producto_referencia = c.id_producto_referencia
				 JOIN Z_calendario_descuentosSka d on c.id_producto_referencia = d.id_producto_referencia

				 SET ti.precio_promocion= ROUND((ti.precio-ti.precio*(extraliquidacion/100)),4)

			   WHERE zp.descripcion NOT LIKE  '%clasico%'
			   AND ti.id_tienda in (2,3,4,5,6,12,13,14,15)
			   AND ti.inventario_stock > 0
				 AND zp.campo1 = fiels
				 AND d.dif > 48;

         SELECT ti.precio_promocion,ti.precio-(ti.precio*(10/100)),ROUND((ti.precio-(ti.precio*(15/100))),4),ti.inventario_stock,zp.departamento,zp.descripcion,zp.id_producto,zp.referencia,
         zp.campo1,zp.campo2,zp.campo3,zp.campo4,d.dif
         FROM tienda_inventario ti
         JOIN Z_producto_compras zp ON ti.id_producto = zp.id_producto AND  zp.departamento = departamento
         JOIN coleccion_detalle c ON zp.id_producto_referencia = c.id_producto_referencia
         JOIN Z_calendario_descuentosSka d ON c.id_producto_referencia = d.id_producto_referencia
         WHERE zp.descripcion NOT LIKE  '%clasico%'
         AND ti.id_tienda in (2,3,4,5,6,12,13,14,15)
         AND ti.inventario_stock > 0
         AND zp.campo1 = fiels
         LIMIT 10;

       INSERT INTO descuentos_campos_ska(id_descuento,campo1,campo2,campo3,campo4,estilo) VALUES (id_descuento,@campo1,@campo2,@campo3,@campo4,estilo);

       END WHILE;

       END IF;
       END IF;

    END LOOP leer_descuento;
 CLOSE cursor1;
 END$$
DELIMITER ;