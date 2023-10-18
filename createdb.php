<?php
$pdo = new PDO('mysql:host=localhost;','root','root');
$sql = "CREATE DATABASE IF NOT EXISTS `Flowers-Shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "CREATE TABLE IF NOT EXISTS `Flowers-Shop`.`product` (
    `idProduct` INT NOT NULL AUTO_INCREMENT ,
    `nameProduct` VARCHAR(250) NOT NULL ,
    `photo` VARCHAR(200) NOT NULL ,
    `description` VARCHAR(1000) NOT NULL ,
    `price` FLOAT NOT NULL , 
    `idUser` INT NOT NULL , 
    `idCategory` INT NOT NULL , PRIMARY KEY (`idProduct`)) ENGINE = InnoDB;";
$pdo->exec($sql);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "CREATE TABLE IF NOT EXISTS `Flowers-Shop`.`user` (
    `idUser` INT NOT NULL AUTO_INCREMENT ,
    `mailUser` VARCHAR(200) NOT NULL ,
    `passwordUser` VARCHAR(150) NOT NULL , PRIMARY KEY (`idUser`)) ENGINE = InnoDB;";
$pdo->exec($sql);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "CREATE TABLE IF NOT EXISTS `Flowers-Shop`.`category` (
    `idCategory` INT NOT NULL AUTO_INCREMENT ,
    `nameCategory` VARCHAR(250) NOT NULL , PRIMARY KEY (`idCategory`)) ENGINE = InnoDB;";
$pdo->exec($sql);
