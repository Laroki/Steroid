CREATE DATABASE projet_img CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE projet_img;

CREATE TABLE liens (
  id      INT(3) NOT NULL AUTO_INCREMENT,
  source  VARCHAR(255) NOT NULL,
  lien_mobile   VARCHAR(255) NOT NULL,
  lien_tablette   VARCHAR(255) NOT NULL,
  lien_desktop   VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)

)ENGINE=INNODB;

-- INSERT INTO utilisateur (
--   pseudo,
--   email,
--   mdp,
--   type
-- ) VALUES (
--   'admin',
--   'admin@boutique.fr',
--   '$2y$10$JLQVIj9Rvp9VpNgCAAhDrOZNSSh13.OfZBwX3CifDglC6x9poX80W',
--   'admin'
-- );

