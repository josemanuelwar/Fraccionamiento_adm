ALTER TABLE `users`
	ADD CONSTRAINT `FK_users_roles` FOREIGN KEY (`rol_us`) REFERENCES `roles` (`ID_ROL`);