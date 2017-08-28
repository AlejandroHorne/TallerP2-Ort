-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-08-2017 a las 16:15:06
-- Versión del servidor: 5.5.31
-- Versión de PHP: 5.4.4-14+deb7u5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `UGS`
--

-- --------------------------------------------------------



-- INSERT INTO `FamiliaProducto` (`Id`, `Nombre`) VALUES
-- (1, 'Fiambreria'),
-- (2, 'Entretenimiento'),
-- (3, 'Hogar'),
-- (4, 'Tecologia'),
-- (5, 'Veterinaria'),
-- (6, 'Panaderia');

-- INSERT INTO `Proveedor` (`Id`, `Nombre`) VALUES
-- (1, 'Cativell'),
-- (2, 'Centenaria'),
-- (3, 'Fifa'),
-- (4, 'EASports'),
-- (5, 'Zara Home'),
-- (6, 'Ikea'),
-- (7, 'Samsong'),
-- (8, 'Doguis'),
-- (9, 'Cats'),
-- (10, 'Aguada');



INSERT INTO `Producto`(`ID_Producto`, `Nombre`, `Foto`, `Precio`, `EsDestacado`, `Proovedor`, `FamiliaProducto`) VALUES
(1,'Jamon','jamon.jpg', 150, true, 'Cativell','Fiambreria'),
(2,'Mortadela' ,'mortadela.jpg',120,false,'Centenaria','Fiambreria'),
(3,'Longaniza','longaniza.jpg' ,160,false,'Centenaria','Fiambreria'),
(4,'Jamon' ,'jamon.jpg',170,false,'Cativell','Fiambreria'),
(5,'Jamon','jamon.jpg', 180,false,'Cativell', 'Fiambreria'),
(6,'Mortadela' ,'mortadela.jpg',150,false,'Centenaria','Fiambreria'),
(7,'Longaniza','longaniza.jpg' ,260,false,'Centenaria','Fiambreria'),
(8,'Longaniza' ,'longaniza.jpg',270,false,'Cativell','Fiambreria'),
(9,'Jamon','jamon.jpg', 140, true,'Centenaria','Fiambreria'),
(10,'Mortadela' ,'mortadela.jpg',120,false,'Cativell','Fiambreria'),
(11,'Pictionary','pictionary.jpg' ,160,false,'EASports','Entretenimiento'),
(12,'Caras' ,'caras.jpg',170,true,'EASports','Entretenimiento'),
(13,'Cubo Magic','cubomagic.jpg' ,200,false,'Fifa','Entretenimiento'),
(14,'Fifa2013' ,'fifa2013.jpg',600,false,'Fifa','Entretenimiento'),
(15,'ContraStraiker','contraStraiker.jpg' ,500,false,'EASports','Entretenimiento'),
(16,'Fifa2018', 'fifa2018.jpg' ,500,true,'Fifa','Entretenimiento'),
(17,'Manteles','manteles.jpg', 150,false,'Zara Home','Hogar' ),
(18,'Sillas' ,'sillas.jpg',120,false,'Zara Home','Hogar'),
(19,'Mesa','mesa.jpg' ,160,true,'Ikea','Hogar'),
(20,'Cuadros' ,'cuadros.jpg',170,false,'Ikea','Hogar'),
(21,'MesaRatona','mesaRatona.jpg', 180,false,'Ikea','Hogar' ),
(22,'Adornos' ,'adornos.jpg',150,true,'Zara Home','Hogar'),
(23,'Play Station','playstation.jpg' ,260,false,'Samsong','Tecologia'),
(24,'Celular' ,'celular.jpg',270,false,'Samsong','Tecologia'),
(25,'Celular','celular.jpg', 140,false,'Samsong','Tecologia' ),
(26,'Cargador' ,'cargador.jpg',120,true,'Samsong','Tecologia'),
(27,'Comida de Perros','comidadeperros.jpg' ,160,false,'Doguis','Veterinaria'),
(28,'Comida de gato' ,'comidadegato.jpg',170,false,'Cats','Veterinaria'),
(29,'Collar','collar.jpg' ,200,false,'Doguis','Veterinaria'),
(30,'Correa' ,'correa.jpg',600,false,'Cats','Veterinaria'),
(31,'Remedios','remedios.jpg' ,100,false,'Cats','Veterinaria'),
(32,'Pan','pan.jpg' ,12,false,'Aguada','Panaderia');



