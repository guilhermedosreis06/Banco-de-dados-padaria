-- -----------------------------------------------------
-- Schema padaria
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `padaria` DEFAULT CHARACTER SET utf8 ;
USE `padaria` ;

-- -----------------------------------------------------
-- Tabela `padaria`.`cliente` (Definição correta)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `padaria`.`cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `nome_cliente` VARCHAR(100) NOT NULL,
  `cpf_cliente` CHAR(11) UNIQUE NULL, 
  `email_cliente` VARCHAR(100) NULL,
  `telefone_cliente` VARCHAR(20) NULL,
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabela `padaria`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `padaria`.`funcionario` (
  `id_funcionario` INT NOT NULL AUTO_INCREMENT,
  `nome_funcionario` VARCHAR(100) NOT NULL,
  `telefone_funcionario` VARCHAR(20) NULL,
  `email_funcionario` VARCHAR(100) NULL,
  PRIMARY KEY (`id_funcionario`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabela `padaria`.`fornecedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `padaria`.`fornecedor` (
  `id_fornecedor` INT NOT NULL AUTO_INCREMENT,
  `nome_fornecedor` VARCHAR(100) NOT NULL,
  `cnpj_fornecedor` VARCHAR(14) UNIQUE NULL,
  `telefone_fornecedor` VARCHAR(20) NULL,
  `endereco_fornecedor` VARCHAR(150) NULL,
  PRIMARY KEY (`id_fornecedor`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabela `padaria`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `padaria`.`produto` (
  `id_produto` INT NOT NULL AUTO_INCREMENT,
  `nome_produto` VARCHAR(100) NOT NULL,
  `tipo_produto` VARCHAR(45) NULL, 
  `preco_venda` DECIMAL(10,2) NOT NULL,
  `estoque_atual` INT NOT NULL DEFAULT 0,
  `fornecedor_id_fornecedor` INT NOT NULL,
  PRIMARY KEY (`id_produto`), 
  INDEX `fk_produto_fornecedor_idx` (`fornecedor_id_fornecedor` ASC),
  CONSTRAINT `fk_produto_fornecedor`
    FOREIGN KEY (`fornecedor_id_fornecedor`)
    REFERENCES `padaria`.`fornecedor` (`id_fornecedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabela `padaria`.`venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `padaria`.`venda` (
  `id_venda` INT NOT NULL AUTO_INCREMENT,
  `data_venda` DATETIME NOT NULL,
  `valor_total` DECIMAL(10,2) NOT NULL,
  `cliente_id_cliente` INT NULL, 
  `funcionario_id_funcionario` INT NOT NULL,
  PRIMARY KEY (`id_venda`), 
  INDEX `fk_venda_cliente_idx` (`cliente_id_cliente` ASC),
  INDEX `fk_venda_funcionario_idx` (`funcionario_id_funcionario` ASC),
  CONSTRAINT `fk_venda_cliente`
    FOREIGN KEY (`cliente_id_cliente`)
    REFERENCES `padaria`.`cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_funcionario`
    FOREIGN KEY (`funcionario_id_funcionario`)
    REFERENCES `padaria`.`funcionario` (`id_funcionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabela `padaria`.`item_venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `padaria`.`item_venda` (
  `venda_id_venda` INT NOT NULL,
  `produto_id_produto` INT NOT NULL,
  `quantidade` INT NOT NULL,
  `preco_unitario` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`venda_id_venda`, `produto_id_produto`),
  INDEX `fk_item_venda_produto_idx` (`produto_id_produto` ASC),
  CONSTRAINT `fk_item_venda_venda`
    FOREIGN KEY (`venda_id_venda`)
    REFERENCES `padaria`.`venda` (`id_venda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_venda_produto`
    FOREIGN KEY (`produto_id_produto`)
    REFERENCES `padaria`.`produto` (`id_produto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;