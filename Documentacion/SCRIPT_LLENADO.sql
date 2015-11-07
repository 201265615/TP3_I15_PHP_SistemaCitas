-- ---------- SCRIPT LLENADO ---------------
-- Autores: Kevin Alonso Escobar Miranda
--			Maria Fernanda Chaves Munoz
-- Creacion: 3-jun-2015
-- -----------------------------------------
use ProyectoIII;
-- ---------------------------------------------------------------------------
-- -------------------------------- Idiomas ----------------------------------
-- ---------------------------------------------------------------------------
INSERT INTO Idiomas(Nombre,idIdioma) VALUES('Espanol','es');
INSERT INTO Idiomas(Nombre,idIdioma) VALUES('English','en');
INSERT INTO Idiomas(Nombre,idIdioma) VALUES('Français','fr');

-- ---------------------------------------------------------------------------
-- -------------------------------- USUARIOS ---------------------------------
-- ---------------------------------------------------------------------------
INSERT INTO Usuarios(NombreCompleto,Telefono,CorreoElectronico,Contrasena,Idiomas_idIdioma) VALUES('admin','88884444','admin','$2y$13$AKlalWt5AdVmQcFEc9reHuUlfK9UiQ4eO8sKmhDsO3yvS7/fRhukG','en'); -- contrasena es 'admin' con el hash aplicado
INSERT INTO Usuarios(NombreCompleto,Telefono,CorreoElectronico,Contrasena,Idiomas_idIdioma) VALUES('Kevin Escobar Miranda','83124269','kevem94@hotmail.com','$2y$13$DYWnteKrU2mRmv/65LMU0uskk4ZmjN3Cy7s8mvSIh1yhClSaPZ8ju','es'); -- contrasena es 'prueba' con el hash aplicado
INSERT INTO Usuarios(NombreCompleto,Telefono,CorreoElectronico,Contrasena,Idiomas_idIdioma) VALUES('Maria Fernanda Chaves','81234567','mafer@hotmail.com','$2y$13$DYWnteKrU2mRmv/65LMU0uskk4ZmjN3Cy7s8mvSIh1yhClSaPZ8ju','fr'); -- contrasena es 'prueba' con el hash aplicado


-- ---------------------------------------------------------------------------
-- -------------------------------- DOCTORES ---------------------------------
-- ---------------------------------------------------------------------------
INSERT INTO Doctores(NombreCompleto,EspecialidadMedica) VALUES('Juan Perez Villata','Medico General');
INSERT INTO Doctores(NombreCompleto,EspecialidadMedica) VALUES('Rosaura Chaves Mejia','Pediatra');
INSERT INTO Doctores(NombreCompleto,EspecialidadMedica) VALUES('Pedro Mendoza Suarez','Medico General');
INSERT INTO Doctores(NombreCompleto,EspecialidadMedica) VALUES('Laura Quesada Oconitrillo','Psicologa');


-- ---------------------------------------------------------------------------
-- ---------------------------- HORARIOSDOCTOR -------------------------------
-- ---------------------------------------------------------------------------

-- ---------------------------------------------------------------------------
-- SP_CrearHorariosDoctor
-- Crea horarios para todos los doctores existentes
-- Parametros:
--				pCantidadDias: dias a generar
--				pHoraInicial: hora en la que inician todas las citas
--				pHoraFinal: hora en la que finalizan las citas
-- ---------------------------------------------------------------------------
DROP PROCEDURE IF EXISTS SP_CrearHorariosDoctor; 
DELIMITER //
CREATE PROCEDURE SP_CrearHorariosDoctor(pCantidadDias INT, pHoraInicial INT, pHoraFinal INT)

BEGIN

	-- Declaración de variables
	DECLARE var_idDoctor INT;

	DECLARE var_ContadorDias INT;
	DECLARE var_ContadorHoras INT;
	DECLARE var_ContadorMinutos INT;

	DECLARE var_FechaHoraInicio DATETIME;
	DECLARE var_FechaHoraFin DATETIME;
	
	-- Definición de la consulta
	DECLARE cursor_doctores CURSOR FOR SELECT idDoctor FROM Doctores;

	-- Declaración de un manejador de error tipo NOT FOUND
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET @hecho = TRUE;

	-- Abrimos el cursor
	OPEN cursor_doctores;

		-- Comenzamos nuestro bucle de lectura
		loop1: LOOP

			-- Obtenemos la primera fila en la variables correspondientes
			FETCH cursor_doctores INTO var_idDoctor;

			-- Si el cursor se quedó sin elementos,
			-- entonces nos salimos del bucle
			IF @hecho THEN
				LEAVE loop1;
			END IF;

			set var_ContadorDias = 0;
			set var_ContadorHoras = pHoraInicial;
			set var_ContadorMinutos = 0;
			-- Ciclo para los dias
			wDias: WHILE var_ContadorDias < pCantidadDias DO

				set var_ContadorHoras = pHoraInicial;
		    
		    	wHoras: WHILE var_ContadorHoras <= pHoraFinal DO		
			    	-- Seteamos las nuevas fechas horas
					SET var_FechaHoraInicio = ADDTIME(DATE_ADD(CURDATE(), INTERVAL var_ContadorDias DAY),CONCAT('0 ',var_ContadorHoras,':',var_ContadorMinutos,':0.000000'));
					SET var_FechaHoraFin = ADDTIME(DATE_ADD(CURDATE(), INTERVAL var_ContadorDias DAY),CONCAT('0 ',var_ContadorHoras+1,':',var_ContadorMinutos,':0.000000'));
					
					-- Insertamos el nuevo horario
					INSERT INTO HorariosDoctor(FechaHoraInicio,FechaHoraFin,Doctores_idDoctor) VALUES(var_FechaHoraInicio,var_FechaHoraFin,var_idDoctor);
				
					SET var_ContadorHoras = var_ContadorHoras + 1;
				END WHILE wHoras;

				set var_ContadorDias = var_ContadorDias + 1;

		  	END WHILE wDias;

			
		END LOOP loop1;

	-- Cerramos el cursor
	CLOSE cursor_doctores;

END//

DELIMITER ;

CALL SP_CrearHorariosDoctor(10,10,13);

