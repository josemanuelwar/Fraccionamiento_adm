ALTER TABLE `users`
	CHANGE COLUMN `rfc_us` `rfc_us` VARCHAR(191) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci' AFTER `nick_us`,
	CHANGE COLUMN `contrasena_us` `contrasena_us` VARCHAR(191) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci' AFTER `email_verified_at`,
	ADD COLUMN `tipo_us` ENUM('Fisica','Moral') NULL DEFAULT NULL AFTER `contrasena_us`;
