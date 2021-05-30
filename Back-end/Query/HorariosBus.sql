-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema HorariosBus
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema HorariosBus
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `HorariosBus` DEFAULT CHARACTER SET utf8 ;
USE `HorariosBus` ;



-- -----------------------------------------------------
-- Table `HorariosBus`.`Buses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `HorariosBus`.`Buses` (
  `idBus` INT NOT NULL AUTO_INCREMENT,
  `numPlaca` VARCHAR(45) NOT NULL,
  `marca` VARCHAR(45) NULL DEFAULT NULL,
  `modelo` VARCHAR(45) NULL DEFAULT NULL,
  `cantPasajeros` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idBus`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `HorariosBus`.`Espacios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `HorariosBus`.`Espacios` (
  `idEspacio` INT NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(45) NOT NULL,
  `Buses_idBus` INT NOT NULL,
  PRIMARY KEY (`idEspacio`, `Buses_idBus`),
  INDEX `fk_Espacios_Buses_idx` (`Buses_idBus` ASC) VISIBLE,
  CONSTRAINT `fk_Espacios_Buses`
    FOREIGN KEY (`Buses_idBus`)
    REFERENCES `HorariosBus`.`Buses` (`idBus`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `HorariosBus`.`Rutas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `HorariosBus`.`Rutas` (
  `idRutas` VARCHAR(20) NOT NULL,
  `destino` VARCHAR(45) NULL DEFAULT NULL,
  `origen` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idRutas`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `HorariosBus`.`Horarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `HorariosBus`.`Horarios` (
  `idhorario` INT NOT NULL AUTO_INCREMENT,
  `horario` VARCHAR(10) NOT NULL,
  `precio` INT NOT NULL,
  `Buses_idBus` INT NOT NULL,
  `Rutas_idRutas` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idhorario`, `Rutas_idRutas`),
  INDEX `fk_Horarios_Rutas1_idx` (`Rutas_idRutas` ASC) VISIBLE,
  CONSTRAINT `fk_Horarios_Rutas1`
    FOREIGN KEY (`Rutas_idRutas`)
    REFERENCES `HorariosBus`.`Rutas` (`idRutas`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `HorariosBus`.`Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `HorariosBus`.`Usuarios` (
  `idUsuario` VARCHAR(20) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido1` VARCHAR(45) NOT NULL,
  `apellido2` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `clave` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `HorariosBus`.`Tiquetes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `HorariosBus`.`Tiquetes` (
  `idTiquetes` VARCHAR(45) NOT NULL,
  `Espacios_idEspacio` INT NOT NULL,
  `Espacios_Buses_idBus` INT NOT NULL,
  `Horarios_idhorario` INT NOT NULL,
  `Horarios_Rutas_idRutas` VARCHAR(20) NOT NULL,
  `Usuarios_idUsuario` VARCHAR(20) NOT NULL,


  PRIMARY KEY (`idTiquetes`, `Espacios_idEspacio`,`Espacios_Buses_idBus`, `Horarios_idhorario`, `Horarios_Rutas_idRutas`, `Usuarios_idUsuario`),
  INDEX `fk_Tiquetes_Espacios1_idx` (`Espacios_idEspacio` ASC, `Espacios_Buses_idBus` ASC) VISIBLE,
  INDEX `fk_Tiquetes_Horarios1_idx` (`Horarios_idhorario` ASC, `Horarios_Rutas_idRutas` ASC) VISIBLE,
  INDEX `fk_Tiquetes_Usuarios1_idx` (`Usuarios_idUsuario` ASC) VISIBLE,
  CONSTRAINT `fk_Tiquetes_Espacios1`
    FOREIGN KEY (`Espacios_idEspacio`,`Espacios_Buses_idBus`)
    REFERENCES `HorariosBus`.`Espacios` (`idEspacio`,`Buses_idBus`),
  CONSTRAINT `fk_Tiquetes_Horarios1`
    FOREIGN KEY (`Horarios_idhorario` , `Horarios_Rutas_idRutas`)
    REFERENCES `HorariosBus`.`Horarios` (`idhorario` , `Rutas_idRutas`),
  CONSTRAINT `fk_Tiquetes_Usuarios1`
    FOREIGN KEY (`Usuarios_idUsuario`)
    REFERENCES `HorariosBus`.`Usuarios` (`idUsuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;
-- -----------------------------------------------------
-- Table `HorariosBus`.`Tarjetas`
-- -----------------------------------------------------
CREATE TABLE `HorariosBus`.`Tarjetas` (
  `idTarjetas` INT NOT NULL,
  `tarjeta` VARCHAR(45) NOT NULL,
  `ccv` VARCHAR(45) NOT NULL,
  `fechaVencimineto` VARCHAR(45) NOT NULL,
  `Usuarios_idUsuario` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idTarjetas`));
  INDEX `fk_Tiquetes_Usuarios1_idx` (`Usuarios_idUsuario` ASC) VISIBLE,
  CONSTRAINT `fk_Tarjetas_Usuarios1`
    FOREIGN KEY (`Usuarios_idUsuario`)
    REFERENCES `HorariosBus`.`Usuarios` (`idUsuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

ALTER TABLE `HorariosBus`.`Tiquetes` 
ADD COLUMN `fechaEmision` DATETIME NOT NULL AFTER `Usuarios_idUsuario`,
ADD COLUMN `fechaSalida` DATETIME NOT NULL AFTER `fechaEmision`;

ALTER TABLE `HorariosBus`.`Usuarios` 
ADD COLUMN `nacionalidad` VARCHAR(45) NOT NULL AFTER `clave`;
ALTER TABLE `HorariosBus`.`Horarios` 
CHANGE COLUMN `horario` `horario` VARCHAR(10) NOT NULL ;
ALTER TABLE `HorariosBus`.`Espacios` 
ADD COLUMN `numAsiento` VARCHAR(5) NOT NULL AFTER `Buses_idBus`;

ALTER TABLE `HorariosBus`.`Tiquetes` 
CHANGE COLUMN `fechaSalida` `fechaSalida` DATE NOT NULL ;


UPDATE `HorariosBus`.`Espacios` SET `numAsiento` = '1' WHERE (`idEspacio` = '1') and (`Buses_idBus` = '1');
UPDATE `HorariosBus`.`Espacios` SET `numAsiento` = '2' WHERE (`idEspacio` = '2') and (`Buses_idBus` = '1');
UPDATE `HorariosBus`.`Espacios` SET `numAsiento` = '3' WHERE (`idEspacio` = '3') and (`Buses_idBus` = '1');
UPDATE `HorariosBus`.`Espacios` SET `numAsiento` = '4' WHERE (`idEspacio` = '4') and (`Buses_idBus` = '1');
UPDATE `HorariosBus`.`Espacios` SET `numAsiento` = '5' WHERE (`idEspacio` = '5') and (`Buses_idBus` = '1');
UPDATE `HorariosBus`.`Espacios` SET `numAsiento` = '6' WHERE (`idEspacio` = '6') and (`Buses_idBus` = '1');
UPDATE `HorariosBus`.`Espacios` SET `numAsiento` = '7' WHERE (`idEspacio` = '7') and (`Buses_idBus` = '1');
UPDATE `HorariosBus`.`Espacios` SET `numAsiento` = '8' WHERE (`idEspacio` = '8') and (`Buses_idBus` = '1');


UPDATE `HorariosBus`.`Espacios` SET `numAsiento` = '8' WHERE (`idEspacio` = '1') and (`Buses_idBus` = '1');
UPDATE `HorariosBus`.`Espacios` SET `numAsiento` = '8' WHERE (`idEspacio` = '2') and (`Buses_idBus` = '1');
UPDATE `HorariosBus`.`Espacios` SET `numAsiento` = '8' WHERE (`idEspacio` = '3') and (`Buses_idBus` = '1');
UPDATE `HorariosBus`.`Espacios` SET `numAsiento` = '8' WHERE (`idEspacio` = '4') and (`Buses_idBus` = '1');
UPDATE `HorariosBus`.`Espacios` SET `numAsiento` = '8' WHERE (`idEspacio` = '5') and (`Buses_idBus` = '1');
UPDATE `HorariosBus`.`Espacios` SET `numAsiento` = '8' WHERE (`idEspacio` = '6') and (`Buses_idBus` = '1');
UPDATE `HorariosBus`.`Espacios` SET `numAsiento` = '8' WHERE (`idEspacio` = '7') and (`Buses_idBus` = '1');
UPDATE `HorariosBus`.`Espacios` SET `numAsiento` = '8' WHERE (`idEspacio` = '8') and (`Buses_idBus` = '1');
UPDATE `HorariosBus`.`Espacios` SET `numAsiento` = '8' WHERE (`idEspacio` = '9') and (`Buses_idBus` = '1');
UPDATE `HorariosBus`.`Espacios` SET `numAsiento` = '8' WHERE (`idEspacio` = '10') and (`Buses_idBus` = '1');
