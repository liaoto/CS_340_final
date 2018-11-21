-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema Recipe_App
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Recipe_App
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Recipe_App` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `Recipe_App` ;

-- -----------------------------------------------------
-- Table `Recipe_App`.`ingredient`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Recipe_App`.`ingredient` (
  `Ingredient_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Measurement_unit` VARCHAR(100) NOT NULL,
  `Measurement_qty` BIGINT(10) NOT NULL,
  `Ingredient_Name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Ingredient_ID`),
  UNIQUE INDEX `Ingredient_ID` (`Ingredient_ID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `Recipe_App`.`recipe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Recipe_App`.`recipe` (
  `RecipeID` INT(11) NOT NULL AUTO_INCREMENT,
  `RecipeName` VARCHAR(100) NOT NULL,
  `RecipeDescription` VARCHAR(100) NULL DEFAULT NULL,
  `Prep_time` FLOAT(4,2) NOT NULL,
  `Cook_time` FLOAT(4,2) NOT NULL,
  PRIMARY KEY (`RecipeID`),
  UNIQUE INDEX `RecipeID` (`RecipeID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `Recipe_App`.`recipe_instruction`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Recipe_App`.`recipe_instruction` (
  `Recipe_Instruction_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `RecipeID` INT(11) NOT NULL,
  `Step_Number` INT(11) NOT NULL,
  `Instruction_Description` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Recipe_Instruction_ID`),
  UNIQUE INDEX `Recipe_Instruction_ID` (`Recipe_Instruction_ID` ASC) VISIBLE,
  INDEX `RecipeID` (`RecipeID` ASC) VISIBLE,
  CONSTRAINT `recipe_instruction_ibfk_1`
    FOREIGN KEY (`RecipeID`)
    REFERENCES `Recipe_App`.`recipe` (`RecipeID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `Recipe_App`.`recipeingredient`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Recipe_App`.`recipeingredient` (
  `RecipeIngredientID` INT(11) NOT NULL AUTO_INCREMENT,
  `RecipeID` INT(11) NOT NULL,
  `Ingredient_ID` INT(11) NOT NULL,
  PRIMARY KEY (`RecipeIngredientID`),
  UNIQUE INDEX `RecipeIngredientID` (`RecipeIngredientID` ASC) VISIBLE,
  INDEX `RecipeID` (`RecipeID` ASC) VISIBLE,
  INDEX `Ingredient_ID` (`Ingredient_ID` ASC) VISIBLE,
  CONSTRAINT `recipeingredient_ibfk_1`
    FOREIGN KEY (`RecipeID`)
    REFERENCES `Recipe_App`.`recipe` (`RecipeID`),
  CONSTRAINT `recipeingredient_ibfk_2`
    FOREIGN KEY (`Ingredient_ID`)
    REFERENCES `Recipe_App`.`ingredient` (`Ingredient_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `Recipe_App`.`Tags`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Recipe_App`.`Tags` (
  `TagID` INT NOT NULL AUTO_INCREMENT,
  `recipe_RecipeID` INT(11) NOT NULL,
  `Title` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`TagID`),
  INDEX `fk_Tags_recipe1_idx` (`recipe_RecipeID` ASC) VISIBLE,
  CONSTRAINT `fk_Tags_recipe1`
    FOREIGN KEY (`recipe_RecipeID`)
    REFERENCES `Recipe_App`.`recipe` (`RecipeID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
