ALTER TABLE `users`
	ADD CONSTRAINT `FK_users_roles` FOREIGN KEY (`rol_us`) REFERENCES `roles` (`ID_ROL`);

ALTER TABLE `estados`
	ADD CONSTRAINT `FK_estados_pais` FOREIGN KEY (`PAIS_ESSTADO`) REFERENCES `pais` (`ID_PAIS`);

ALTER TABLE `municipios`
	ADD CONSTRAINT `FK_municipios_estados` FOREIGN KEY (`ESTADO_MUNICIPIO`) REFERENCES `estados` (`ID_ESTADO`);

ALTER TABLE `fracionamientos`
	ADD CONSTRAINT `FK_fracionamientos_municipios` FOREIGN KEY (`MUNICIPIO_FRAC`) REFERENCES `municipios` (`ID_MUNICIPIO`),
	ADD CONSTRAINT `FK_fracionamientos_users` FOREIGN KEY (`ADMIN_FRAC`) REFERENCES `users` (`id_us`);

ALTER TABLE `pagos`
	CHANGE COLUMN `ID_MULTAS` `ID_MULTAS` BIGINT(20) UNSIGNED NULL AFTER `FECHAFINAL_PAGO`,
	ADD CONSTRAINT `FK_pagos_users` FOREIGN KEY (`ID_USUARIO`) REFERENCES `users` (`id_us`),
	ADD CONSTRAINT `FK_pagos_cuotas` FOREIGN KEY (`ID_CUOTA`) REFERENCES `cuotas` (`ID_CUOTA`),
	ADD CONSTRAINT `FK_pagos_tipo_pagos` FOREIGN KEY (`ID_TIPO_PAGOS`) REFERENCES `tipo_pagos` (`ID_PAGOS`),
	ADD CONSTRAINT `FK_pagos_multas` FOREIGN KEY (`ID_MULTAS`) REFERENCES `multas` (`ID_MULTA`);

ALTER TABLE `users`
	ADD CONSTRAINT `FK_users_fracionamientos` FOREIGN KEY (`id_fracionamiento`) REFERENCES `fracionamientos` (`ID_FRAC`);
