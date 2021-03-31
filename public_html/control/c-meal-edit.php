<?php

include_once("../../inc/inc.php");

print_r($_POST);
echo "<br>";
print_r($_FILES);


if (isset($_POST['submit'])) {
    if ($_POST['id'] == "0") {
        $dbc = DB::connect();

        // Check category and create new
        if($_POST['category'] == 0){ // create new category
            $sql = "INSERT INTO category (category) VALUES (?)";
            $stmt = $dbc->prepare($sql);
            $stmt->execute(array($_POST['newCategory']));
            $_POST['category'] = $dbc->lastInsertId();
        }

        //upload picture
        $recipePic = "";
        if($_FILES['recipePic']['error'] == 0){
            $targetDir = BASE_PATH."public_html/uploads/";
            $tmp = explode(".", basename($_FILES['recipePic']['name']));
            $picName = uniqid().".".end($tmp);
            $uploadfile = $targetDir . $picName;
            if (move_uploaded_file($_FILES['recipePic']['tmp_name'], $uploadfile)) {
                $recipePic = $picName;
                echo "Datei ist valide und wurde erfolgreich hochgeladen.\n";
            } else {
                echo "Möglicherweise eine Dateiupload-Attacke!\n";
            }

        }

        $sql = "INSERT INTO Meal (C_ID, Meal, Description, Rating, Picture, RecipeURL, Portions) VALUES (:category, :recipeName, :description, :stars, :recipePic, :recipeURL, :portions)";
        $stmt = $dbc->prepare($sql);
        $vals = array(':category' => $_POST['category'], ':recipeName' => $_POST['recipeName'], ':description' => $_POST['description'], ':stars' => $_POST['stars'], ':recipePic' => $recipePic, ':recipeURL' => $_POST['recipeURL'], ':portions' => $_POST['portions']);
        $stmt->execute($vals);
    } else {
        echo "<br>Nothing done!";
    }
}
