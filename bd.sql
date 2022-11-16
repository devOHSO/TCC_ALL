CREATE DATABASE askpets;
CREATE TABLE `askpets`.`contas` 
( 
    `name` VARCHAR(55) NOT NULL ,
    `nickname` VARCHAR(55) NOT NULL ,
    `iduser` INT NOT NULL AUTO_INCREMENT ,
    `email` VARCHAR(50) NOT NULL ,
    `userpassword` VARCHAR(20) NOT NULL ,
    `birthday` DATE NOT NULL ,
    `telnumber` VARCHAR(11) NULL ,
    `extimg` VARCHAR(4) NULL ,
    PRIMARY KEY (`iduser`),
    UNIQUE (`nickname`),
    UNIQUE (`email`),
    UNIQUE (`telnumber`)

);
CREATE TABLE `askpets`.`pets` 
( 
    `name` VARCHAR(30) NOT NULL ,
    `idpet` INT(11) NOT NULL AUTO_INCREMENT ,
    `iduser` INT NOT NULL,
    `birthday` DATE NULL,
    `breed` VARCHAR(30) NULL ,
    `castrated` BOOLEAN NULL ,
    `extimg` VARCHAR(4) NULL ,
    PRIMARY KEY (`idpet`),
    FOREIGN KEY (`iduser`) REFERENCES contas(`iduser`)
);
CREATE TABLE `askpets`.`comunities` ( 
    `creator` INT NOT NULL , 
    `name` VARCHAR(50) NOT NULL , 
    `data` DATE NOT NULL , 
    `description` VARCHAR(255) NOT NULL , 
    `comunityid` INT NOT NULL AUTO_INCREMENT , 
    `extimg` VARCHAR(4) NOT NULL ,
    PRIMARY KEY (`comunityid`),
    FOREIGN KEY (`creator`) REFERENCES contas(`iduser`)
);
CREATE TABLE `askpets`.`comuuser` ( 
    `comid` INT NOT NULL , 
    `userid` INT NOT NULL , /*tabela de relacionamentos*/
    `type` INT NOT NULL,
    FOREIGN KEY (`comid`) REFERENCES comunities(`comunityid`),
    FOREIGN KEY (`userid`) REFERENCES contas(`iduser`)
);
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
    `imgext` VARCHAR(4) NOT NULL,
    `comunity` INT NOT NULL,
    PRIMARY KEY (`idpost`),
    FOREIGN KEY (`idpet`) REFERENCES pets(`idpet`),
    FOREIGN KEY (`comunity`) REFERENCES comunities(`comunityid`)
);

CREATE TABLE `askpets`.`coments` ( 
    `iduser` INT NOT NULL , 
    `idpost` INT NOT NULL , 
    `content` TINYTEXT NOT NULL , 
    `idpet` INT NOT NULL , 
    `idcome` BIGINT NOT NULL AUTO_INCREMENT , 
    PRIMARY KEY (`idcome`),
    FOREIGN KEY (`idpet`) REFERENCES pets(`idpet`),
    FOREIGN KEY (`iduser`) REFERENCES contas(`iduser`),
    FOREIGN KEY (`idpost`) REFERENCES posts(`idpost`)
);
