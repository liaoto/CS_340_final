-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema cookingapplication
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cookingapplication
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cookingapplication` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `cookingapplication` ;

-- -----------------------------------------------------
-- Table `cookingapplication`.`ingredient`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cookingapplication`.`ingredient` (
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
-- Table `cookingapplication`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cookingapplication`.`users` (
  `User_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(45) NOT NULL,
  `Password_hash` VARCHAR(255) NOT NULL,
  `firstName` VARCHAR(45) NOT NULL,
  `lastName` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `age` INT NULL,
  PRIMARY KEY (`User_id`),
  UNIQUE INDEX `User_id_UNIQUE` (`User_id` ASC) VISIBLE,
  UNIQUE INDEX `Username_UNIQUE` (`Username` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `cookingapplication`.`recipe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cookingapplication`.`recipe` (
  `RecipeID` INT(11) NOT NULL AUTO_INCREMENT,
  `RecipeName` VARCHAR(100) NOT NULL,
  `RecipeDescription` VARCHAR(100) NULL DEFAULT NULL,
  `Prep_time` INT(4) NOT NULL,
  `Cook_time` YEAR(4) NOT NULL,
  `User_id` INT(10) UNSIGNED NOT NULL,
  `Tag_title` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`RecipeID`),
  UNIQUE INDEX `RecipeID` (`RecipeID` ASC) VISIBLE,
  INDEX `fk_recipe_Users1_idx` (`User_id` ASC) VISIBLE,
  CONSTRAINT `fk_recipe_Users1`
    FOREIGN KEY (`User_id`)
    REFERENCES `cookingapplication`.`users` (`User_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `cookingapplication`.`recipe_instruction`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cookingapplication`.`recipe_instruction` (
  `Recipe_Instruction_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `RecipeID` INT(11) NOT NULL,
  `Step_Number` INT(11) NOT NULL,
  `Instruction_Description` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Recipe_Instruction_ID`),
  UNIQUE INDEX `Recipe_Instruction_ID` (`Recipe_Instruction_ID` ASC) VISIBLE,
  INDEX `RecipeID` (`RecipeID` ASC) VISIBLE,
  CONSTRAINT `recipe_instruction_ibfk_1`
    FOREIGN KEY (`RecipeID`)
    REFERENCES `cookingapplication`.`recipe` (`RecipeID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `cookingapplication`.`recipeingredient`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cookingapplication`.`recipeingredient` (
  `RecipeIngredientID` INT(11) NOT NULL AUTO_INCREMENT,
  `RecipeID` INT(11) NOT NULL,
  `Ingredient_ID` INT(11) NOT NULL,
  PRIMARY KEY (`RecipeIngredientID`),
  UNIQUE INDEX `RecipeIngredientID` (`RecipeIngredientID` ASC) VISIBLE,
  INDEX `RecipeID` (`RecipeID` ASC) VISIBLE,
  INDEX `Ingredient_ID` (`Ingredient_ID` ASC) VISIBLE,
  CONSTRAINT `recipeingredient_ibfk_1`
    FOREIGN KEY (`RecipeID`)
    REFERENCES `cookingapplication`.`recipe` (`RecipeID`),
  CONSTRAINT `recipeingredient_ibfk_2`
    FOREIGN KEY (`Ingredient_ID`)
    REFERENCES `cookingapplication`.`ingredient` (`Ingredient_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
