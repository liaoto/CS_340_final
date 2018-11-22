DROP DATABASE IF EXISTs RecipeApplication;
CREATE SCHEMA RecipeApplication;
USE RecipeApplication;


CREATE TABLE Users
(
User_id INT NOT NULL UNIQUE,
Username VARCHAR(45),
Password_hash VARCHAR(45),
PRIMARY KEY(User_id)
);

CREATE TABLE Recipe
(
RecipeID INT NOT NULL UNIQUE,
RecipeName VARCHAR(100) NOT NULL,
RecipeDescription VARCHAR(100),
Prep_time FLOAT(4,2),
Cook_time FLOAT(4,2),
Tag_title VARCHAR(45),
User_id INT,
PRIMARY KEY(RecipeID)
FOREIGN KEY(User_id) REFERENCES Users()
);

