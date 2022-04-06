-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2020 a las 17:09:43
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apsystem`
--

-- --------------------------------------------------------

--

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
-
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

 
 /*-- Estructura de tabla para la tabla logueo
--
 
CREATE TABLE logueo (
  id_logueo int(11) NOT NULL,
  id_empleado int(11) NOT NULL,
  fecha date NOT NULL,
  hora_ingreso time NOT NULL,
  status int(1) NOT NULL,
  hora_salida time NOT NULL,
  numero_horas double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
--
-- Volcado de datos para la tabla logueo
--
 
INSERT INTO logueo (id_logueo, id_empleado, fecha, hora_ingreso, status, hora_salida, numero_horas) VALUES
(1, 11, '2022-03-22', '07:00:00', 0, '16:00:00', 9),
(2, 22, '2022-03-22', '10:11:26', 0, '19:00:00', 9),
(3, 33, '2022-03-22', '08:05:00', 0, '17:00:00', 9),
(4, 44, '2022-03-22', '09:00:00', 0, '18:00:00', 9),
(5, 55, '2022-03-22', '10:11:26', 0, '19:00:00', 9);

--  tabla avances de dinero
CREATE TABLE movimientos (
  id_movimientos int(11) NOT NULL,
  fecha_movimiento date NOT NULL,
  id_empleado int(11) NOT NULL,
  monto double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
--
-- Volcado de datos para la tabla avances de dinero
--
 
INSERT INTO movimientos (id_movimientos, fecha_movimiento, id_empleado, monto) VALUES
(1, '2022-03-28', 22, 20000),
(2, '2022-03-28', 33, 30000),
(3, '2022-03-28', 44, 50000),
(4, '2022-03-28', 55, 50000);
 
-- Estructura de tabla para la tabla tiempo_extra
--
 
CREATE TABLE tiempo_extra (
  id int(11) NOT NULL,
  id_empleado int(11) NOT NULL,
  Cantidad_horas double NOT NULL,
  tipo_hora varchar(35) NOT NULL,
  Fach_hora_extra date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- tabla productos

CREATE TABLE productos (
id_producto int(11) NOT NULL,
descripcion int(11) NOT NULL,
Cantidad int(11) NOT NULL,
valor_costo int(11) NOT NULL,
valor_unitario int(11) NOT NULL,
fecha_insercion date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--

INSERT INTO productos (id_producto, descripcion, Cantidad, valor_costo, valor_unitario, fecha_insercion) VALUES
(111, 'Tornillo auto 1/8 * 3/4',1000 ,10, 30, sysdate());

-- tabla ventas

CREATE TABLE ventas (
id_ventas int(11) NOT NULL,
id_producto int(11) NOT NULL,
Cantidad int(11) NOT NULL,
fecha_venta date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--

INSERT INTO ventas (id_ventas, id_producto, Cantidad, fecha_venta) VALUES
(1, 111, 12 , sysdate());

 **/
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'admin', '$2y$10$UrGSvHTWm8.ZK4BzPmo8iuqsK6XF5RfHay6ooC5D50y/nShon5wqe', 'Mauricio', 'Sevilla', 'logo1.jpg', '2019-12-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `status` int(1) NOT NULL,
  `time_out` time NOT NULL,
  `num_hr` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `date`, `time_in`, `status`, `time_out`, `num_hr`) VALUES
(119, 24, '2020-01-07', '10:11:26', 0, '00:00:00', 0),
(120, 25, '2020-01-07', '10:17:04', 0, '00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cashadvance`
--

CREATE TABLE `cashadvance` (
  `id` int(11) NOT NULL,
  `date_advance` date NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cashadvance`
--

INSERT INTO `cashadvance` (`id`, `date_advance`, `employee_id`, `amount`) VALUES
(1, '2020-01-07', '25', 50000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deductions`
--

CREATE TABLE `deductions` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `deductions`
--

INSERT INTO `deductions` (`id`, `description`, `amount`) VALUES
(5, 'Pago de EPS 4%', 2500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `birthdate` date NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `position_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `firstname`, `lastname`, `address`, `birthdate`, `contact_info`, `gender`, `position_id`, `schedule_id`, `photo`, `created_on`) VALUES
(24, 'MAW817094635', 'Abelardo', 'Mejia', 'Calle 54 N 12-23', '1989-07-12', '', 'Female', 2, 2, '', '2020-01-07'),
(25, 'PJO724930615', 'Roberto', 'Velasquez', 'Av 15 12-72', '1989-06-13', '', 'Male', 1, 4, '', '2020-01-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `overtime`
--

CREATE TABLE `overtime` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `hours` double NOT NULL,
  `rate` double NOT NULL,
  `date_overtime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `position`
--

INSERT INTO `position` (`id`, `description`, `rate`) VALUES
(1, 'Programador', 100000),
(2, 'Escritor', 28000),
(3, 'Marketing ', 42000),
(4, 'DiseÃ±ador GrÃ¡fico', 35000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `schedules`
--

INSERT INTO `schedules` (`id`, `time_in`, `time_out`) VALUES
(1, '07:00:00', '16:00:00'),
(2, '08:00:00', '17:00:00'),
(3, '09:00:00', '18:00:00'),
(4, '10:00:00', '19:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cashadvance`
--
ALTER TABLE `cashadvance`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de la tabla `cashadvance`
--
ALTER TABLE `cashadvance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
