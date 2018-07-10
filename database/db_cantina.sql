-- MySQL Script generated by MySQL Workbench
-- Sat Jun 30 19:49:59 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema new_cantina
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema new_cantina
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `new_cantina` DEFAULT CHARACTER SET utf8 ;
USE `new_cantina` ;

-- -----------------------------------------------------
-- Table `new_cantina`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `new_cantina`.`funcionario` (
  `cpf` VARCHAR(15) NOT NULL,
  `senha_funcionario` VARCHAR(45) NOT NULL,
  `nome_funcionario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cpf`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `new_cantina`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `new_cantina`.`aluno` (
  `ra` INT NOT NULL,
  `nome_aluno` VARCHAR(45) NOT NULL,
  `email_resp` VARCHAR(45) NOT NULL,
  `nome_resp` VARCHAR(45) NOT NULL,
  `tel_resp` VARCHAR(45) NOT NULL,
  `senha_aluno` VARCHAR(45) NOT NULL,
  `funcionario_cpf` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`ra`),
  INDEX `fk_aluno_funcionario1_idx` (`funcionario_cpf` ASC),
  UNIQUE INDEX `ra_UNIQUE` (`ra` ASC),
  CONSTRAINT `fk_aluno_funcionario1`
    FOREIGN KEY (`funcionario_cpf`)
    REFERENCES `new_cantina`.`funcionario` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `new_cantina`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `new_cantina`.`produto` (
  `id_produto` INT NOT NULL AUTO_INCREMENT,
  `preco` DECIMAL(5,2) NOT NULL,
  `nome_produto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_produto`),
  UNIQUE INDEX `id_produto_UNIQUE` (`id_produto` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `new_cantina`.`registro_venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `new_cantina`.`registro_venda` (
  `id_registro` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `status` VARCHAR(10) NULL,
  `funcionario_cpf` VARCHAR(15) NOT NULL,
  `aluno_ra` INT NOT NULL,
  `valor_total` DECIMAL(5,2) NULL,
  PRIMARY KEY (`id_registro`),
  INDEX `fk_registro_venda_funcionario1_idx` (`funcionario_cpf` ASC),
  INDEX `fk_registro_venda_aluno1_idx` (`aluno_ra` ASC),
  UNIQUE INDEX `id_registro_UNIQUE` (`id_registro` ASC),
  CONSTRAINT `fk_registro_venda_funcionario1`
    FOREIGN KEY (`funcionario_cpf`)
    REFERENCES `new_cantina`.`funcionario` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_registro_venda_aluno1`
    FOREIGN KEY (`aluno_ra`)
    REFERENCES `new_cantina`.`aluno` (`ra`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `new_cantina`.`itens_venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `new_cantina`.`itens_venda` (
  `quantidade` INT NOT NULL,
  `registro_venda_id_registro` INT NOT NULL,
  `produto_id_produto` INT NOT NULL,
  INDEX `fk_itens_venda_registro_venda1_idx` (`registro_venda_id_registro` ASC),
  INDEX `fk_itens_venda_produto1_idx` (`produto_id_produto` ASC),
  CONSTRAINT `fk_itens_venda_registro_venda1`
    FOREIGN KEY (`registro_venda_id_registro`)
    REFERENCES `new_cantina`.`registro_venda` (`id_registro`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_itens_venda_produto1`
    FOREIGN KEY (`produto_id_produto`)
    REFERENCES `new_cantina`.`produto` (`id_produto`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;