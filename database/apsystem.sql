
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `apsystem`


-- tabla de usuarios administradores 
CREATE TABLE `super_administrador` (`id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `tipo` varchar(60) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB -- motor que va a usar la BD
DEFAULT CHARSET=latin1 -- caracteres que va a usar
;
INSERT INTO `super_administrador` (`id`,  `usuario`, `password`,`tipo`, `fecha_creacion`) VALUES
 (1, 'Administrador1', '$2y$10$M.1mhBtqOSy2wvqZh4VC1.77jGL.GsPS9Ou59iTrOOYidrol0QrVe', 'Administrador', sysdate()),
 (2, 'Administrador2', '$2y$10$cbc.C2jUOR/cTMukgd67TODSzd08F/JTUzj9utG25dSl6aaQ3rYha', 'Administrador', sysdate()),
 (3, 'Administrador3', '$2y$10$0OMeUU9YmyXzXQQ4G53/KuHqz/Y1gnTubXe1n0h4SeTfX8vRRiE8m', 'Administrador',sysdate());


-- usuarios adiminstrador y empleados
CREATE TABLE `administrador` (`id` int(11) NOT NULL,
  `id_empleado` int(15) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `tipo` varchar(60) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB -- motor que va a usar la BD
DEFAULT CHARSET=latin1 -- caracteres que va a usar
;
INSERT INTO `administrador` (`id`, `id_empleado`, `usuario`, `password`,`tipo`, `fecha_creacion`) VALUES
(1, 11,'Cliente_Admin1', '$2y$10$ixCXndUoG43O4S7EYnMzzOpWRkpiDBuHzGgMcotMeaXazgKQSBVcO', 'Cliente', sysdate()),
(2, 33,'Operario1', '$2y$10$SjJRldn6l6izGU/l74JH5Ojqc6e9MUpBBAYli3K9mK.nJJ7eGl9fu', 'Cliente', sysdate()),
(3, 55, 'Operario2', '$2y$10$iP9kOafweUyq0nPFzssvvOK/sn0K0pkKmD0K995c764Lx/p3uFog.', 'Cliente', sysdate());

--tipo de cargos 
CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `Sueldo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
 
INSERT INTO `cargos` (`id_cargo`, `descripcion`, `Sueldo`) VALUES
(1, 'Administrador', 3000000),
(2, 'Operario', 1500000),
(3, 'Mensajero' , 1200000);

-- Estructura de tabla para la tabla horario
 
CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `Hora_ingreso` time NOT NULL,
  `Hora_salida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
 
INSERT INTO `horario` (`id_horario`, `Hora_ingreso`, `Hora_salida`) VALUES
(1, '07:00:00', '16:00:00'),
(2, '08:00:00', '17:00:00'),
(3,' 09:00:00', '18:00:00'),
(4, '10:00:00', '19:00:00');


-- Estructura de tabla para la tabla empleado
--
 
CREATE TABLE `empleado` (
  `id` int(15) NOT NULL,
  `id_empleado` int(15) NOT NULL,
  `tipo_doc` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `direccion` text NOT NULL,
  `fecha_nacto` date NOT NULL,
  `info_contacto` varchar(100) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
-------------------------------------------------------  Aca validar que es cada campo
-- Volcado de datos para la tabla employees
-- incluir tipo y numero de doc
 
INSERT INTO `empleado` (`id`, `id_empleado`,`tipo_doc`, `nombres`, `apellidos`, `direccion`, `fecha_nacto`, `info_contacto`, `genero`, `id_cargo`, `id_horario`, `fecha_creacion`) VALUES
(1, 11,'cedula ciudadania', 'Winder Alexander','Reyes Suarez' , 'Calle 54 N° 12-23', '1989-07-12','Sandra Suarez - 3008217777' , 'Masculino', 1, 1 , sysdate()),
(2, 22,'cedula extranjeria','Dayana Carolina','Campos Diaz' , 'Carrera 21 N° 22-33', '1987-09-21','Camilo Jimenez - 9075621' , 'Femenino', 1, 4 ,sysdate()),
(3, 33,'cedula ciudadania', 'Raul Ernesto', 'Perez Gomez', 'Av 15 12-72', '1979-06-01', 'Ernesto Perez - 3058879233', 'Masculino', 2, 2, sysdate()),
(4, 44,'cedula ciudadania',  'Tatiana Carolina', 'Rodriguez Bayona', 'Tv 98a 15a-77', '1981-02-21', 'Ana Martinez - 3112089976', 'Femenino', 2, 3, sysdate()),
(5, 55,'cedula extranjeria', 'Pedro Antonio', 'Sosa Pardo', 'Dg 21a 48-98', '1986-12-11', 'Luis Diaz - 3228776690', 'Masculino', 3, 4, sysdate());
-- Estructura de tabla para la tabla gerente y empleados
--

 
 -- Estructura de tabla para la tabla logueo
--
 
CREATE TABLE `logueo` (
  `id_logueo` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_ingreso` time NOT NULL,
  status int(1) NOT NULL,
  `hora_salida` time NOT NULL,
  `numero_horas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
--
-- Volcado de datos para la tabla logueo
--
 
INSERT INTO `logueo` (`id_logueo`, `id_empleado`, `fecha`, `hora_ingreso`, status, `hora_salida`, `numero_horas`) VALUES
(1, 11, '2022-03-22', '07:00:00', 0, '16:00:00', 9),
(2, 22, '2022-03-22', '10:11:26', 0, '19:00:00', 9),
(3, 33, '2022-03-22', '08:05:00', 0, '17:00:00', 9),
(4, 44, '2022-03-22', '09:00:00', 0, '18:00:00', 9),
(5, 55, '2022-03-22', '10:11:26', 0, '19:00:00', 9);

--  tabla avances de dinero
CREATE TABLE `movimientos` (
  `id_movimientos` int(11) NOT NULL,
  `fecha_movimiento` date NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `monto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
--
-- Volcado de datos para la tabla avances de dinero
--
 
INSERT INTO `movimientos` (`id_movimientos`, `fecha_movimiento`, `id_empleado`, `monto`) VALUES
(1, '2022-03-28', 22, 20000),
(2, '2022-03-28', 33, 30000),
(3, '2022-03-28', 44, 50000),
(4, '2022-03-28', 55, 50000);
 
-- Estructura de tabla para la tabla tiempo_extra
--
 
CREATE TABLE `tiempo_extra` (
  `id` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `Cantidad_horas` double NOT NULL,
  `tipo_hora` varchar(35) NOT NULL,
  `Fecha_hora_extra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- tabla productos

CREATE TABLE `productos` (
`id_producto` int(11) NOT NULL,
`descripcion` int(11) NOT NULL,
`Cantidad` int(11) NOT NULL,
`valor_costo` int(11) NOT NULL,
`valor_venta` int(11) NOT NULL,
`fecha_insercion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--

INSERT INTO `productos` VALUE (1,'panel led sobreponer 18w',8,16000,22400,sysdate());
INSERT INTO `productos` VALUE (2,'panel led incrustar 18w',9,13000,18200,sysdate());
INSERT INTO `productos` VALUE (3,'candado  25 eco',5,2000,2800,sysdate());
INSERT INTO `productos` VALUE (4,'candado  32 eco',6,3200,4480,sysdate());
INSERT INTO `productos` VALUE (5,'candado 30 eco',6,3400,4760,sysdate());
INSERT INTO `productos` VALUE (6,'candado 38 eco',6,4500,6300,sysdate());
INSERT INTO `productos` VALUE (7,'candado 40 eco',6,5500,7700,sysdate());
INSERT INTO `productos` VALUE (8,'candado 50 eco',8,6800,9520,sysdate());
INSERT INTO `productos` VALUE (9,'candado 63 eco',4,7300,10220,sysdate());
INSERT INTO `productos` VALUE (10,'candado gongli 60',4,9500,13300,sysdate());
INSERT INTO `productos` VALUE (11,'candado gongli 50',5,9000,12600,sysdate());
INSERT INTO `productos` VALUE (12,'candado gongli 40',3,8500,11900,sysdate());
INSERT INTO `productos` VALUE (13,'candado gongli 30',4,8000,11200,sysdate());
INSERT INTO `productos` VALUE (14,'candado hermet 50',4,12000,16800,sysdate());
INSERT INTO `productos` VALUE (15,'candado yale 850',2,35000,49000,sysdate());
INSERT INTO `productos` VALUE (16,'candado yale 870',1,32000,44800,sysdate());
INSERT INTO `productos` VALUE (17,'candado gato 60',1,13500,18900,sysdate());
INSERT INTO `productos` VALUE (18,'candado gato 30',3,9500,13300,sysdate());
INSERT INTO `productos` VALUE (19,'candado gato 40',1,11000,15400,sysdate());
INSERT INTO `productos` VALUE (20,'candado egret  30',4,4500,6300,sysdate());
INSERT INTO `productos` VALUE (21,'bombillos luz amarilla 100w',11,2000,2800,sysdate());
INSERT INTO `productos` VALUE (22,'bombillos pimpom colores',5,2200,3080,sysdate());
INSERT INTO `productos` VALUE (23,'bombillos led guio',8,3500,4900,sysdate());
INSERT INTO `productos` VALUE (24,'bombillo perfume nevera',8,1800,2520,sysdate());
INSERT INTO `productos` VALUE (25,'bombillo led nevera',4,2000,2800,sysdate());
INSERT INTO `productos` VALUE (26,'bombillo led de  3w',9,4500,6300,sysdate());
INSERT INTO `productos` VALUE (27,'bombillo led 9w mercuri',6,5500,7700,sysdate());
INSERT INTO `productos` VALUE (28,'bombillo led 12w',1,7500,10500,sysdate());
INSERT INTO `productos` VALUE (29,'bombillo recargable',1,12000,16800,sysdate());
INSERT INTO `productos` VALUE (30,'bombillo bi pin lexmana',2,4500,6300,sysdate());
INSERT INTO `productos` VALUE (31,'bombillo espiral global',2,5000,7000,sysdate());
INSERT INTO `productos` VALUE (32,'soportes cortina doble café, plateado y dorado',27,700,980,sysdate());
INSERT INTO `productos` VALUE (33,'manija tiradera vera',8,1500,2100,sysdate());
INSERT INTO `productos` VALUE (34,'taco luminex de 50 amp',2,11000,15400,sysdate());
INSERT INTO `productos` VALUE (35,'taco luminex de 60 amp',4,11000,15400,sysdate());
INSERT INTO `productos` VALUE (36,'taco liminex de 40 amp',6,11000,15400,sysdate());
INSERT INTO `productos` VALUE (37,'taco luminex de 30 amp',7,11000,15400,sysdate());
INSERT INTO `productos` VALUE (38,'taco luminex de 20 amp',11,11000,15400,sysdate());
INSERT INTO `productos` VALUE (39,'pacha taco 50 amp luminex',1,18000,25200,sysdate());
INSERT INTO `productos` VALUE (40,'taco riel steck de 63 amp',1,18000,25200,sysdate());
INSERT INTO `productos` VALUE (41,'taco riel steck de 40 amp',3,18000,25200,sysdate());
INSERT INTO `productos` VALUE (42,'taco riel chint 50 amp',1,18000,25200,sysdate());
INSERT INTO `productos` VALUE (43,'taco riel chint 32 amp',3,18000,25200,sysdate());
INSERT INTO `productos` VALUE (44,'panel led de 3w',12,4500,6300,sysdate());
INSERT INTO `productos` VALUE (45,'panel led de 6w ',9,5000,7000,sysdate());
INSERT INTO `productos` VALUE (46,'panel led de 9w',8,6500,9100,sysdate());
INSERT INTO `productos` VALUE (47,'panel led de 12w',1,7500,10500,sysdate());
INSERT INTO `productos` VALUE (48,'panel led de 12 w cuadrado',3,8500,11900,sysdate());
INSERT INTO `productos` VALUE (49,'panel led de 6w cuadrado',2,5500,7700,sysdate());
INSERT INTO `productos` VALUE (50,'panel led de 24w sobreponer',4,18000,25200,sysdate());
INSERT INTO `productos` VALUE (51,'bombillero plastico',50,1800,2520,sysdate());
INSERT INTO `productos` VALUE (52,'soportes cortina pared café, plateado y dorado',100,700,980,sysdate());
INSERT INTO `productos` VALUE (53,'soportes cortina techo  café, plateado y dorado',100,700,980,sysdate());
INSERT INTO `productos` VALUE (54,'flajon cerrado y abierto 5/8 cortina',295,700,980,sysdate());
INSERT INTO `productos` VALUE (55,'flajon cerrado y abierto 3/4 cortina',150,700,980,sysdate());
INSERT INTO `productos` VALUE (56,'terminal cortina 3/4 surtido',84,500,700,sysdate());
INSERT INTO `productos` VALUE (57,'terminal cortina 5/8 surtido',84,500,700,sysdate());
INSERT INTO `productos` VALUE (58,'wd-40 si 5 onzas',1,12000,16800,sysdate());
INSERT INTO `productos` VALUE (59,'afloja todotruper de 235 ml',3,18000,25200,sysdate());
INSERT INTO `productos` VALUE (60,'afloja todotruper de 110 ml',2,11000,15400,sysdate());
INSERT INTO `productos` VALUE (61,'limpia contacto 3 en 1',1,16000,22400,sysdate());
INSERT INTO `productos` VALUE (62,'limpiador electronico meercury',3,19000,26600,sysdate());
INSERT INTO `productos` VALUE (63,'spray adesivo 77 3 en 1',2,21000,29400,sysdate());
INSERT INTO `productos` VALUE (64,'registro ducha gricol bolsa',3,25000,35000,sysdate());
INSERT INTO `productos` VALUE (65,'registro ducha gerfor',1,26000,36400,sysdate());
INSERT INTO `productos` VALUE (66,'registro ducha gricol helis pala',1,27000,37800,sysdate());
INSERT INTO `productos` VALUE (67,'registro ducha L y 6',2,19000,26600,sysdate());
INSERT INTO `productos` VALUE (68,'masilla metal 9in',5,2500,3500,sysdate());
INSERT INTO `productos` VALUE (69,'crema ruby pequeño',2,1800,2520,sysdate());
INSERT INTO `productos` VALUE (70,'crema ruby mediano',2,2800,3920,sysdate());
INSERT INTO `productos` VALUE (71,'silicona liquida 60 ml',3,3500,4900,sysdate());
INSERT INTO `productos` VALUE (72,'silicona liquida 30 ml',7,2200,3080,sysdate());
INSERT INTO `productos` VALUE (73,'carpincol de 250 gr',3,8000,11200,sysdate());
INSERT INTO `productos` VALUE (74,'supertak de 250 gramos',3,7000,9800,sysdate());
INSERT INTO `productos` VALUE (75,'pegante la pega 117 gramos',6,5000,7000,sysdate());
INSERT INTO `productos` VALUE (76,'pegante la pega 46 gramos',13,3500,4900,sysdate());
INSERT INTO `productos` VALUE (77,'supertack en 1/4',1,21000,29400,sysdate());
INSERT INTO `productos` VALUE (78,'cinta enmascarar 1`` x 50 mt 3m',9,3500,4900,sysdate());
INSERT INTO `productos` VALUE (79,'cinta automotriz enmascarar 1/2',6,1500,2100,sysdate());
INSERT INTO `productos` VALUE (80,'cinta automotriz enmascarar 3/4',1,1800,2520,sysdate());
INSERT INTO `productos` VALUE (81,'cinta enmascarar 1`` x 24 mt 3m',4,2100,2940,sysdate());
INSERT INTO `productos` VALUE (82,'cinta ducto pretul',8,3500,4900,sysdate());
INSERT INTO `productos` VALUE (83,'cinta empaque x 40 mtr pretul',5,3800,5320,sysdate());
INSERT INTO `productos` VALUE (84,'cinta empaque x 150 mtr pretul',3,3900,5460,sysdate());
INSERT INTO `productos` VALUE (85,'bala blanca',1,5500,7700,sysdate());
INSERT INTO `productos` VALUE (86,'cinta enmascarar de 1 1/2',1,2500,3500,sysdate());
INSERT INTO `productos` VALUE (87,'cinta enmascarar de 2``',1,2800,3920,sysdate());
INSERT INTO `productos` VALUE (88,'cinta enmascarar de 1/2',13,1500,2100,sysdate());
INSERT INTO `productos` VALUE (89,'cinta enmascarar de 3/4',4,1800,2520,sysdate());
INSERT INTO `productos` VALUE (90,'cinta enmascarar de 1``',16,2000,2800,sysdate());
INSERT INTO `productos` VALUE (91,'llave tubo 14`',1,17000,23800,sysdate());
INSERT INTO `productos` VALUE (92,'llave tubo 12`',2,15000,21000,sysdate());
INSERT INTO `productos` VALUE (93,'llave tubo 10`',1,13000,18200,sysdate());
INSERT INTO `productos` VALUE (94,'llave tubo 8`',2,12000,16800,sysdate());
INSERT INTO `productos` VALUE (95,'mezclador ducah gerfor',2,55000,77000,sysdate());
INSERT INTO `productos` VALUE (96,'resistencia estufa haceb',2,32000,44800,sysdate());
INSERT INTO `productos` VALUE (97,'juego de copas x 39 piezas pretul',1,22000,30800,sysdate());
INSERT INTO `productos` VALUE (98,'juego de copas x 40 piezas',1,18000,25200,sysdate());
INSERT INTO `productos` VALUE (99,'reberbero loza',1,5800,8120,sysdate());
INSERT INTO `productos` VALUE (100,'soportes cortina pared plasrtico doble',18,700,980,sysdate());
INSERT INTO `productos` VALUE (101,'control tv',7,3800,5320,sysdate());
INSERT INTO `productos` VALUE (102,'manija cajon metalica',10,2200,3080,sysdate());
INSERT INTO `productos` VALUE (103,'manija cajon plastica',20,1500,2100,sysdate());
INSERT INTO `productos` VALUE (104,'boton cajon ciolores',21,700,980,sysdate());
INSERT INTO `productos` VALUE (105,'estabilizadores',2,28000,39200,sysdate());
INSERT INTO `productos` VALUE (106,'piedra copa carborun grano 120',1,15000,21000,sysdate());
INSERT INTO `productos` VALUE (107,'piedra copa truper grano 80, 60',4,13000,18200,sysdate());
INSERT INTO `productos` VALUE (108,'siliconas barra gruesa',32,1100,1540,sysdate());
INSERT INTO `productos` VALUE (109,'silicona barra delgada',83,600,840,sysdate());
INSERT INTO `productos` VALUE (110,'balastro electronico de 48',2,18000,25200,sysdate());
INSERT INTO `productos` VALUE (111,'llave fraudal agua ',5,8000,11200,sysdate());
INSERT INTO `productos` VALUE (112,'llave pretul agua',9,9500,13300,sysdate());
INSERT INTO `productos` VALUE (113,'llave truper agua',5,10500,14700,sysdate());
INSERT INTO `productos` VALUE (114,'llave grival bronce',3,18000,25200,sysdate());
INSERT INTO `productos` VALUE (115,'llave gato agua',5,17000,23800,sysdate());
INSERT INTO `productos` VALUE (116,'llave con miple agua',1,11000,15400,sysdate());
INSERT INTO `productos` VALUE (117,'llave registro pep',2,12000,16800,sysdate());
INSERT INTO `productos` VALUE (118,'quita oxidio',6,15000,21000,sysdate());
INSERT INTO `productos` VALUE (119,'cortavidrio lubricadio',7,4500,6300,sysdate());
INSERT INTO `productos` VALUE (120,'aceite 3 en 1 pequeño',3,2800,3920,sysdate());
INSERT INTO `productos` VALUE (121,'aceite 3 en 1 grande',5,4800,6720,sysdate());
INSERT INTO `productos` VALUE (122,'aceite 3 en 1 spray',1,9800,13720,sysdate());
INSERT INTO `productos` VALUE (123,'soldadura pavco 1/8',2,6000,8400,sysdate());
INSERT INTO `productos` VALUE (124,'soldadura pavco 1/4',1,9800,13720,sysdate());
INSERT INTO `productos` VALUE (125,'soldadura pavco 1/16',1,16000,22400,sysdate());
INSERT INTO `productos` VALUE (126,'soldadura gerfor 1/16',2,15000,21000,sysdate());
INSERT INTO `productos` VALUE (127,'juego copas 42 piezas eco',1,18000,25200,sysdate());
INSERT INTO `productos` VALUE (128,'soporte plastico con chazo',7,1500,2100,sysdate());
INSERT INTO `productos` VALUE (129,'llave italy',1,7500,10500,sysdate());
INSERT INTO `productos` VALUE (130,'limpiador pavco 12 onzas',1,12000,16800,sysdate());
INSERT INTO `productos` VALUE (131,'limpiador enar 1/16',2,8000,11200,sysdate());
INSERT INTO `productos` VALUE (132,'soldaduras cpvc pavco 1/128',4,5000,7000,sysdate());
INSERT INTO `productos` VALUE (133,'soldaduras cpvc pavco 1/64',6,6000,8400,sysdate());
INSERT INTO `productos` VALUE (134,'soldadura pavco 1/128',9,5500,7700,sysdate());
INSERT INTO `productos` VALUE (135,'soldadura pavco 1/164',7,6000,8400,sysdate());
INSERT INTO `productos` VALUE (136,'limpiador pavco 1/32',1,6500,9100,sysdate());
INSERT INTO `productos` VALUE (137,'limpiador pavco 1/64',3,7000,9800,sysdate());
INSERT INTO `productos` VALUE (138,'limpiador pavco 1/128',7,5500,7700,sysdate());
INSERT INTO `productos` VALUE (139,'soldadura pavco 1/32',9,7800,10920,sysdate());
INSERT INTO `productos` VALUE (140,'limpiador enar 1/128',35,2500,3500,sysdate());
INSERT INTO `productos` VALUE (141,'imanes transparentes',3,700,980,sysdate());
INSERT INTO `productos` VALUE (142,'chapa cajon 4 tornillos disel tool',6,3800,5320,sysdate());
INSERT INTO `productos` VALUE (143,'chapa cajon2 tornillo drawer lock',2,2500,3500,sysdate());
INSERT INTO `productos` VALUE (144,'chapa cajon 4 tornillo HAO',1,2600,3640,sysdate());
INSERT INTO `productos` VALUE (145,'chapa cajon gato',5,4000,5600,sysdate());
INSERT INTO `productos` VALUE (146,'chapa cajon 2 tornillo gato 1560',6,3800,5320,sysdate());
INSERT INTO `productos` VALUE (147,'chapa cajon 4 tornillos vera 1550',3,3900,5460,sysdate());
INSERT INTO `productos` VALUE (148,'chapa gabeta brickell',3,7500,10500,sysdate());
INSERT INTO `productos` VALUE (149,'ojo magico',6,2500,3500,sysdate());
INSERT INTO `productos` VALUE (150,'cerradura vitrina gato',4,4000,5600,sysdate());
INSERT INTO `productos` VALUE (151,'chapa cajon larga cam lock',1,3900,5460,sysdate());
INSERT INTO `productos` VALUE (152,'toma hospitalaria mercury',7,4500,6300,sysdate());
INSERT INTO `productos` VALUE (153,'toma sobreponer osblack',4,3800,5320,sysdate());
INSERT INTO `productos` VALUE (154,'toma levinton',17,2800,3920,sysdate());
INSERT INTO `productos` VALUE (155,'cuchilla para bisturi',70,800,1120,sysdate());
INSERT INTO `productos` VALUE (156,'brillametal brasso grande',2,5000,7000,sysdate());
INSERT INTO `productos` VALUE (157,'brillametal fortex pequeño',2,2200,3080,sysdate());
INSERT INTO `productos` VALUE (158,'piedra de afilar 6`',1,1900,2660,sysdate());
INSERT INTO `productos` VALUE (159,'piedra afilar 8`',3,2500,3500,sysdate());
INSERT INTO `productos` VALUE (160,'juego destornillador relojero',3,2500,3500,sysdate());
INSERT INTO `productos` VALUE (161,'pila alkalina aa tronex',12,1900,2660,sysdate());
INSERT INTO `productos` VALUE (162,'pilas tipo c tronex',12,2800,3920,sysdate());
INSERT INTO `productos` VALUE (163,'pares pila tipo d tronex',5,3500,4900,sysdate());
INSERT INTO `productos` VALUE (164,'pilas tipo d energizer',4,4000,5600,sysdate());
INSERT INTO `productos` VALUE (165,'pila cuadrada',6,1800,2520,sysdate());
INSERT INTO `productos` VALUE (166,'juego destornillador piña',4,4500,6300,sysdate());
INSERT INTO `productos` VALUE (167,'bombillo para carro 1141',49,1100,1540,sysdate());
INSERT INTO `productos` VALUE (168,'bombillo para carro prlla',54,1200,1680,sysdate());
INSERT INTO `productos` VALUE (169,'bombillos carro en colores naranja',8,1300,1820,sysdate());
INSERT INTO `productos` VALUE (170,'bombillos linterna 611',27,700,980,sysdate());
INSERT INTO `productos` VALUE (171,'pila tronex aa eco',15,1800,2520,sysdate());
INSERT INTO `productos` VALUE (172,'bombillo carro 6 18',7,,0,sysdate());
INSERT INTO `productos` VALUE (173,'bombillo carro 5 w',4,1100,1540,sysdate());
INSERT INTO `productos` VALUE (174,'bombillo carro 21 w doble filamento',12,1800,2520,sysdate());
INSERT INTO `productos` VALUE (175,'bombillo carro 1034 solo filamento',10,1800,2520,sysdate());
INSERT INTO `productos` VALUE (176,'bombillo moto',19,2000,2800,sysdate());
INSERT INTO `productos` VALUE (177,'y metalica lavadora truper',2,3900,5460,sysdate());
INSERT INTO `productos` VALUE (178,'y lavadora plastica pretul',6,3200,4480,sysdate());
INSERT INTO `productos` VALUE (179,'y lavadora buldog plastica',3,3000,4200,sysdate());
INSERT INTO `productos` VALUE (180,'calentador agua',7,2200,3080,sysdate());
INSERT INTO `productos` VALUE (181,'herraje de 4 tacos amoblado',1,4500,6300,sysdate());
INSERT INTO `productos` VALUE (182,'herraje de 2 tacos eco',1,3500,4900,sysdate());
INSERT INTO `productos` VALUE (183,'herraje de polo a tierra eco',1,3200,4480,sysdate());
INSERT INTO `productos` VALUE (184,'llave mixta  10 y 11 federally ',4,2800,3920,sysdate());
INSERT INTO `productos` VALUE (185,'destornillador 1/8 x 2.50 casalli',15,2300,3220,sysdate());
INSERT INTO `productos` VALUE (186,'punta taladro',53,2000,2800,sysdate());
INSERT INTO `productos` VALUE (187,'bombillo carro # 67',4,1500,2100,sysdate());
INSERT INTO `productos` VALUE (188,'cinta malla',2,3800,5320,sysdate());


-- tabla ventas

CREATE TABLE ventas (
id_ventas int(11) NOT NULL,
id_producto int(11) NOT NULL,
Cantidad int(11) NOT NULL,
valor_por_venta double NOT NULL,
fecha_venta date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--

INSERT INTO ventas (id_ventas, id_producto, Cantidad, valor_por_venta, fecha_venta) VALUES
(1, 111, 12 ,24000, sysdate());
