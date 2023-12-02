-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2023 a las 03:16:03
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vanyla`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id_customer` int(11) NOT NULL,
  `email_customer` varchar(200) NOT NULL,
  `password_customer` varchar(255) NOT NULL,
  `name_customer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details`
--

CREATE TABLE `details` (
  `id_detail` int(11) NOT NULL,
  `id_product_detail` int(5) NOT NULL,
  `id_sale_detail` int(5) NOT NULL,
  `quantity_detail` int(5) NOT NULL,
  `price_detail` double NOT NULL,
  `subtotal_detail` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `category_product` varchar(200) NOT NULL,
  `subcategory_product` varchar(200) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `description_product` text NOT NULL,
  `made_of_product` varchar(255) NOT NULL,
  `image_product` varchar(255) NOT NULL,
  `price_product` double NOT NULL,
  `exist_product` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_product`, `category_product`, `subcategory_product`, `name_product`, `description_product`, `made_of_product`, `image_product`, `price_product`, `exist_product`) VALUES
(14, 'tartas', '', 'Tarta de Manzana Sin Gluten', 'Deliciosa tarta de manzana sin gluten con una base crujiente y relleno de manzanas frescas.', 'Harina de almendra, manzanas, azúcar, canela', 'img_products/tarta_manzana.jpeg', 1200, 30),
(15, 'tartas', '', 'Tartaletas de Frutas Sin Gluten', 'Mini tartaletas rellenas de frutas frescas y una base sin gluten.', 'Harina de arroz, frutas frescas, azúcar', 'img_products/tartasFrutas.jpeg', 950, 300),
(16, 'tartas', '', 'Tartaletas de Limón y Frambuesa Sin Gluten', 'Mini tartaletas de limón y frambuesa sin gluten con un toque ácido y dulce.\r\n\r\n', 'Harina de almendra, limón, frambuesas, azúcar', 'img_products/tartasFrambuesa.jpeg', 2500, 60),
(17, 'tortas', '', 'Pastel de Fresa Sin Gluten', 'Pastel suave y esponjoso de fresa sin gluten con relleno de fresas frescas.', 'Harina de almendra, fresas, azúcar, crema de fresa', 'img_products/pastelFresas.jpeg', 3200, 5),
(18, 'tortas', '', 'Pastel de Chocolate Sin Gluten', 'Pastel de chocolate sin gluten con un intenso sabor a chocolate.', 'Harina de almendra, chocolate, azúcar, cacao', 'img_products/pastelChocolate.webp', 5000, 10),
(19, 'tortas', '', 'Pastel de Chocolate y Frambuesa Sin Gluten', 'Pastel de chocolate y frambuesa sin gluten con una capa de frambuesas frescas.', 'Harina de almendra, chocolate, frambuesas, azúcar', 'img_products/pastelFrambuesas.jpeg', 5600, 15),
(20, 'cupcakes', '', 'Cupcakes de Vainilla Sin Gluten', 'Cupcakes esponjosos de vainilla sin gluten con frosting de crema de vainilla.', 'Harina de arroz, vainilla, azúcar, crema de vainilla', 'img_products/cupcakes_vainilla.jpg', 1500, 30),
(21, 'cupcakes', '', 'Cupcakes de Chocolate Sin Gluten', 'Cupcakes de chocolate sin gluten con frosting de chocolate cremoso.\r\n\r\n', 'Harina de almendra, chocolate, azúcar, crema de chocolate', 'img_products/cupcakes_chocolate.jpg', 1200, 25),
(22, 'cupcakes', '', 'Cupcakes de Zanahoria Sin Gluten', 'Cupcakes de zanahoria sin gluten con frosting de queso crema.', 'Harina de arroz, zanahorias, azúcar, queso crema', 'img_products/cupcakesZanahoria.jpg', 1200, 30),
(23, 'cupcakes', '', 'Cupcakes de Chocolate y Banana Sin Gluten', 'Magdalenas esponjosas de chocolate y banana sin gluten, perfectas para el desayuno.', 'Harina de almendra, chocolate, banana, azúcar', 'img_products/cupcakesBanana.jpeg', 1200, 50),
(24, 'cupcakes', '', 'Cupcakes de Vainilla y Fresa Sin Gluten', 'Cupcakes de vainilla y fresa sin gluten con frosting de fresa.', 'Harina de almendra, vainilla, fresas, azúcar', 'img_products/cupcakesFrambuesa.webp', 1200, 60),
(25, 'brownie', '', 'Brownie de Nuez Sin Gluten', 'Brownie denso y rico en nueces, perfecto para los amantes de los frutos secos.', 'Harina de almendra, nueces, chocolate, azúcar', 'img_products/brownieNuez.webp', 900, 120),
(26, 'brownie', '', 'Brownie de Chocolate Blanco Sin Gluten', 'Brownie decadente de chocolate blanco sin gluten con trozos de chocolate blanco.', 'Harina de almendra, chocolate blanco, azúcar.', 'img_products/brownieChocoBlanco.jpeg', 950, 300),
(27, 'brownie', '', 'Brownie de Menta Sin Gluten', 'Brownie de menta sin gluten con un refrescante sabor a menta.', 'Harina de almendra, menta, azúcar, chocolate', 'img_products/brownieMenta.jpeg', 1200, 90),
(28, 'galletas', '', 'Galletas de Chocolate y Almendra Sin Gluten', 'Galletas crujientes con trozos de chocolate y almendras, perfectas para los amantes del chocolate.', 'Harina de almendra, chocolate, almendras, azúcar', 'img_products/galletas_chocolate.jpg', 600, 50),
(29, 'galletas', '', 'Galletas de Avena y Pasas Sin Gluten', 'Galletas de avena sin gluten con pasas jugosas para un snack saludable.', 'Harina de avena, pasas, azúcar, canela.', 'img_products/galletasPasas.jpeg', 950, 60),
(30, 'galletas', '', 'Galletas de Coco Sin Gluten', 'Galletas de coco sin gluten con un toque tropical.', ' Harina de coco, coco rallado, azúcar', 'img_products/galletasCoco.jpeg', 950, 75),
(31, 'galletas', '', 'Galletas de Mantequilla de Maní Sin Gluten', 'Galletas crujientes de mantequilla de maní sin gluten, ideales para los amantes de los frutos secos.', 'Harina de almendra, mantequilla de maní, azúcar', 'img_products/galletasMani.jpeg', 950, 55),
(32, 'pan', '', 'Pan Sin Gluten Multigrano', 'Pan sin gluten con semillas de chía, lino y girasol para un toque saludable.', 'Harina de arroz, semillas de chía, lino, girasol.', 'img_products/panMultigrano.jpeg', 650, 90),
(33, 'cupcakes', '', 'Magdalenas de Limón Sin Gluten', 'Magdalenas esponjosas de limón sin gluten con un toque cítrico.', 'Harina de almendra, limón, azúcar, huevos', 'img_products/magdalenasLimon.webp', 200, 125);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id_sale` int(11) NOT NULL,
  `id_client_sale` int(5) NOT NULL,
  `date_sale` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email_user` varchar(200) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `name_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `email_user`, `password_user`, `name_user`) VALUES
(1, 'info@vanyla.com', '123', 'Romina Varela'),
(29, 'lucas@lucas.com', '123', 'Lucas'),
(30, 'nico_elkpo@hotmail.com', '123', 'Nicolas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indices de la tabla `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_id_products` (`id_product_detail`),
  ADD KEY `fk_id_sales` (`id_sale_detail`) USING BTREE;

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sale`),
  ADD KEY `fk_id_client` (`id_client_sale`) USING BTREE;

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `details`
--
ALTER TABLE `details`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sale` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `id_product` FOREIGN KEY (`id_product_detail`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_sale` FOREIGN KEY (`id_sale_detail`) REFERENCES `sales` (`id_sale`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `id_client_sales` FOREIGN KEY (`id_client_sale`) REFERENCES `customers` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
