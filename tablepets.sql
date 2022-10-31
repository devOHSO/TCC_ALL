
CREATE TABLE `askpets`.`pets` 
( 
    `name` VARCHAR(30) NOT NULL ,
    `idpet` INT(11) NOT NULL AUTO_INCREMENT ,
    `iduser` INT NOT NULL,
    `birthday` DATE NULL,
    `breed` VARCHAR(30) NULL ,
    `castrated` BOOLEAN NULL ,
    PRIMARY KEY (`idpet`),
    FOREIGN KEY (`iduser`) REFERENCES contas(`iduser`)
) ENGINE = InnoDB;