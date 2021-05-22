SELECT * FROM HorariosBus.Usuarios;
INSERT INTO `HorariosBus`.`Usuarios` (`idUsuario`, `nombre`, `apellido1`, `apellido2`, `correo`, `telefono`, `clave`, `nacionalidad`) VALUES ('207460988', 'Oscar', 'Quesada', 'Calderon', 'oscardanielq6@gmail.com', '62001032', md5('12345'), 'Costarricense');
DELETE FROM `HorariosBus`.`Usuarios` WHERE (`idUsuario` = '207460988');
SELECT * FROM  HorariosBus.Usuarios WHERE idUsuario='207460988';
SELECT * FROM  HorariosBus.Usuarios WHERE correo='oscardanielq5@gmail.com' AND clave=md5('12345');

SELECT * FROM HorariosBus.Tarjetas;
INSERT INTO `HorariosBus`.`Tarjetas` (`idTarjetas`, `tarjeta`, `ccv`, `fechaVencimineto`,`Usuarios_idUsuario`) VALUES ('1234567890', 'OSCAR QUESADA', '578', '12/23','207460988');
DELETE FROM `HorariosBus`.`Tarjetas` WHERE (`idTarjetas` = '1232220');
SELECT * FROM HorariosBus.Tarjetas WHERE (Usuarios_idUsuario = '207460988');

SELECT * FROM HorariosBus.Rutas;
INSERT INTO `HorariosBus`.`Rutas` (`idRutas`, `destino`, `origen`) VALUES ('CR-NI', 'Costa Rica', 'Nicaragua');
SELECT * FROM HorariosBus.Rutas WHERE (idRutas='CR-NI');

SELECT * FROM HorariosBus.Buses;
INSERT INTO `HorariosBus`.`Buses` (`numPlaca`, `marca`, `modelo`, `cantPasajeros`) VALUES ('CR-54909', 'MAN', 'XF1', '52');
DELETE FROM `HorariosBus`.`Buses` WHERE (`idBus` = '5');
SELECT * FROM HorariosBus.Buses WHERE (idBus='1');

INSERT INTO `HorariosBus`.`Espacios` (`estado`, `Buses_idBus`, `numAsiento`) VALUES ('Ocupado', '9', '53');
UPDATE `HorariosBus`.`Espacios` SET `estado` = 'Ocupado' WHERE (`idEspacio` = '1') and (`Buses_idBus` = '1');
DELETE FROM `HorariosBus`.`Espacios` WHERE (`idEspacio` = '209');
SELECT * FROM HorariosBus.Espacios WHERE (idEspacio ='50');
SELECT * FROM HorariosBus.Espacio
SELECT * FROM HorariosBus.Espacios WHERE (Buses_idBus=3 AND numAsiento=3);
SELECT idEspacio FROM HorariosBus.Espacios WHERE ( Buses_idBus=3 AND numAsiento=3);
SELECT Buses_idBus FROM HorariosBus.Espacios WHERE ( idEspacio=1  );
SELECT * FROM HorariosBus.Espacios WHERE (Buses_idBus=3 AND estado='Disponible');
SELECT * FROM HorariosBus.Espacios WHERE (Buses_idBus=1);
UPDATE `HorariosBus`.`Espacios` SET `numAsiento` = '27' WHERE (`idEspacio` = '80') and (`Buses_idBus` = '2');


INSERT INTO `HorariosBus`.`Horarios` (`horario`, `precio`, `Buses_idBus`, `Rutas_idRutas`) VALUES ('3AM', '80', '1', 'CR-NI');
INSERT INTO `HorariosBus`.`Horarios` (`horario`, `precio`, `Buses_idBus`, `Rutas_idRutas`) VALUES ('6AM', '120', '2', 'CR-ES');
INSERT INTO `HorariosBus`.`Horarios` (`horario`, `precio`, `Buses_idBus`, `Rutas_idRutas`) VALUES ('6AM', '140', '3', 'CR-GUA');
INSERT INTO `HorariosBus`.`Horarios` (`horario`, `precio`, `Buses_idBus`, `Rutas_idRutas`) VALUES ('6AM', '80', '4', 'CR-NI');
INSERT INTO `HorariosBus`.`Horarios` (`horario`, `precio`, `Buses_idBus`, `Rutas_idRutas`) VALUES ('6AM', '110', '5', 'CR-HN');
INSERT INTO `HorariosBus`.`Horarios` (`horario`, `precio`, `Buses_idBus`, `Rutas_idRutas`) VALUES ('5AM', '80', '6', 'CR-PN');
INSERT INTO `HorariosBus`.`Horarios` (`horario`, `precio`, `Buses_idBus`, `Rutas_idRutas`) VALUES ('8AM', '80', '7', 'PN-CR');
INSERT INTO `HorariosBus`.`Horarios` (`horario`, `precio`, `Buses_idBus`, `Rutas_idRutas`) VALUES ('5AM', '140', '8', 'GUA-CR');
INSERT INTO `HorariosBus`.`Horarios` (`horario`, `precio`, `Buses_idBus`, `Rutas_idRutas`) VALUES ('5AM', '80', '9', 'GUA-ES');
INSERT INTO `HorariosBus`.`Horarios` (`horario`, `precio`, `Buses_idBus`, `Rutas_idRutas`) VALUES ('5AM', '110', '1', 'GUA-HN');
INSERT INTO `HorariosBus`.`Horarios` (`horario`, `precio`, `Buses_idBus`, `Rutas_idRutas`) VALUES ('5AM', '120', '2', 'GUA-NI');
INSERT INTO `HorariosBus`.`Horarios` (`horario`, `precio`, `Buses_idBus`, `Rutas_idRutas`) VALUES ('3AM', '80', '3', 'NI-CR');
INSERT INTO `HorariosBus`.`Horarios` (`horario`, `precio`, `Buses_idBus`, `Rutas_idRutas`) VALUES ('6AM', '80', '4', 'NI-CR');

SELECT * FROM HorariosBus.Horarios WHERE (Rutas_idRutas=13);
SELECT * FROM HorariosBus.Horarios;
SELECT * FROM HorariosBus.Horarios WHERE ();
SELECT * FROM HorariosBus.Horarios WHERE (horario='3AM' AND Rutas_idRutas ='CR-NI');
SELECT idhorario FROM HorariosBus.Horarios WHERE (horario='3AM' AND Rutas_idRutas ='CR-NI');
UPDATE `HorariosBus`.`Horarios` SET `horario` = '12AM', `precio` = '80' WHERE (`idhorario` = '14') and (`Rutas_idRutas` = 'NI-CR');
DELETE FROM `HorariosBus`.`Horarios` WHERE (`idhorario` = '14') and (`Rutas_idRutas` = 'NI-CR');


SELECT * FROM HorariosBus.Tiquetes;
INSERT INTO HorariosBus.Tiquetes (idTiquetes, Espacios_idEspacio, Espacios_Buses_idBus, Horarios_idhorario, Horarios_Rutas_idRutas, Usuarios_idUsuario, fechaEmision, fechaSalida ) VALUES ('1', '108', '3', '1', 'CR-NI', '207460988', current_timestamp(), current_timestamp());
SELECT * FROM HorariosBus.Horarios WHERE ();
SELECT * FROM HorariosBus.Tiquetes WHERE (Usuarios_idUsuario='207460988');

