<?php
include_once dirname(__FILE__, 2).'/inc/inc.php';



// ++++++++++++++++++++ Create database Tables ++++++++++++++++++++++++++++
echo "Creating Database Tables .... <br>\n";

$con = DB::connect();


// Meal Table
try {
    // Category
    $sql = "CREATE TABLE IF NOT EXISTS Category (
            C_ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
            Category VARCHAR(256) NOT NULL
        );";
    $con->query($sql);

    // Meal
    $sql = "CREATE TABLE IF NOT EXISTS Meal (
            M_ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
            C_ID INT NOT NULL,
            Meal VARCHAR(256) NOT NULL,
            Description TEXT NOT NULL,
            Rating TINYINT NOT NULL,
            Picture VARCHAR(128) NOT NULL,
            RecipeURL VARCHAR(2083) NOT NULL,
            Portions TINYINT NOT NULL
        );";
    $con->query($sql);
    
    // Ingredient
    $sql = "CREATE TABLE IF NOT EXISTS Ingredient (
            I_ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
            Ingredient VARCHAR(256) NOT NULL,
            Vegetarian BOOLEAN NOT NULL

        );";
    $con->query($sql);


    // 
    $sql = "CREATE TABLE IF NOT EXISTS Ingredient (
            I_ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT
        );";
    $con->query($sql);

    // History
    $sql = "CREATE TABLE IF NOT EXISTS History (
            H_ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
            M_ID INT NOT NULL,
            Date DATE NOT NULL
        );";
    $con->query($sql);

    // Unit
    $sql = "CREATE TABLE IF NOT EXISTS Unit (
            U_ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
            Unit VARCHAR(256) NOT NULL

        );";
    $con->query($sql);

    // MealIngredient
    $sql = "CREATE TABLE IF NOT EXISTS MealIngredient (
        M_ID INT NOT NULL AUTO_INCREMENT,
        I_ID INT NOT NULL,
        Amount SMALLINT NOT NULL,
        U_ID INT NOT NULL,
        PRIMARY KEY(M_ID, I_ID)

    );";
    $con->query($sql);

    echo "sucsessfully created tables (if not existed) <br>\n";

} catch (Exception $e)
{
    echo "Error: ".$e->getMessage()."\n";
    echo "SQL: ".$sql."\n";
}