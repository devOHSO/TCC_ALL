CREATE TABLE `askpets`.`posts` (
`idpost` INT(12) NOT NULL AUTO_INCREMENT , 
`img` BOOLEAN NOT NULL , 
`video` BOOLEAN NOT NULL , 
`caption` TEXT NOT NULL , 
`idpet` INT NOT NULL , 
`date` DATE NOT NULL , 
`coments` BOOLEAN NOT NULL , 
`likes` INT NOT NULL , 
`views` INT NOT NULL , 
`content` TEXT NULL , 
`title` TEXT NULL , 
PRIMARY KEY (`idpost`),
FOREIGN KEY (`idpet`) REFERENCES pets(`idpet`)
)ENGINE = InnoDB;