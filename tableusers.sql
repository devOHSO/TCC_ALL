CREATE TABLE `askpets`.`contas` 
( 
    `name` VARCHAR(55) NOT NULL ,
    `nickname` VARCHAR(55) NOT NULL ,
    `iduser` INT NOT NULL AUTO_INCREMENT ,
    `email` VARCHAR(50) NOT NULL ,
    `userpassword` VARCHAR(20) NOT NULL ,
    `birthday` DATE NOT NULL ,
    `telnumber` INT NULL ,
    PRIMARY KEY (`iduser`),
    UNIQUE (`nickname`),
    UNIQUE (`email`),
    UNIQUE (`telnumber`)

) ENGINE = InnoDB;