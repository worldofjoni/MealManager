<?php
include_once dirname(__FILE__, 2).'/inc/inc.php';

if (in_array("help", $argv) || in_array("-h", $argv) || in_array("--help", $argv))
{
    echo "Help page for setup.php\n";
    echo "This comand sets up initial database tables\n";
    echo "there are the following opotions for this command:\n";
    echo "\t--help               \t-h   \t show help\n";
    echo "\t--delete             \t-d   \t delets existing tables and data!\n";
    echo "\t--no-default-entries \t-e   \t prevents Data initialization!\n";

    exit();
}

$con = DB::connect();

// +++++++++++++++++++++ Delete old Database ++++++++++++++++++++++++++++++
if (in_array("--delete", $argv) || in_array("-d", $argv) )
{
    echo "deleting old tables...\n";
    try {
        $sql = "SET FOREIGN_KEY_CHECKS = 0;
        DROP TABLE IF EXISTS Category;
        DROP TABLE IF EXISTS Meal;
        DROP TABLE IF EXISTS Ingredient;
        DROP TABLE IF EXISTS History;
        DROP TABLE IF EXISTS Unit;
        DROP TABLE IF EXISTS MealIngredient;";
        $con->query($sql);
    } catch (Exception $e)
    {
        echo "Error: ".$e->getMessage()."\n";
        echo "SQL: ".$sql."\n";
        exit();
    }

    echo "deleting old files..\n";
    define("UPLOAD_DIR", "public_html/uploads");
    $files = array_filter(scandir(UPLOAD_DIR), function ($a) {return !str_starts_with($a, ".");});
    array_walk($files, function($a) {unlink(UPLOAD_DIR."/".$a);});
}



// ++++++++++++++++++++ Create database Tables ++++++++++++++++++++++++++++
echo "Creating Database Tables .... <br>\n";



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



// ++++++++++++++++++++ Adding default entries ++++++++++++++++++++++++++++
if (in_array("--no-default-entries", $argv) || in_array("-e", $argv)) {}
else {

    echo "Adding default entries .... <br>\n";
    
    
    try {
        // categories
        $sql = 'INSERT IGNORE INTO category (C_ID, Category) VALUES (1, "Noodles"), (2, "Rice"), (3, "Potato"), (4, "Dough");';
        $con->query($sql);

        // meals
        $sql = 'INSERT IGNORE INTO meal (M_ID, C_ID, Meal, Description, Rating, Picture, RecipeURL, Portions) VALUES (1, 1, "Spagetti Bolognese", "my favorite meal", 5, "", "https://google.de", 1), (2, 3, "Pommes", "also tasty", 4, "", "", 1)';
        $con->query($sql);
        
    } catch (Exception $e)
    {
        echo "Error: ".$e->getMessage()."\n";
        echo "SQL: ".$sql."\n";
    }
}