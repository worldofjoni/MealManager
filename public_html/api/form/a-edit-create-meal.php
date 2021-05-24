<?php

include_once("../../../inc/inc.php");
include_once "src/c-meal-edit.php";

print_r($_POST);
echo "<br>";
print_r($_FILES);


if (isset($_POST['submit'])) {
    if ($_POST['id'] == "0" || MealEdit::doesMealExist($_POST['id'])) {
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
        if (($_POST['id'] == "0")) {
            $sql = "INSERT INTO Meal (C_ID, Meal, Description, Rating, Picture, RecipeURL, Portions) VALUES (:category, :recipeName, :description, :stars, :recipePic, :recipeURL, :portions)";
            $stmt = $dbc->prepare($sql);
            $vals = array(':category' => $_POST['category'], ':recipeName' => $_POST['recipeName'], ':description' => $_POST['description'], ':stars' => $_POST['stars'], ':recipePic' => $recipePic, ':recipeURL' => $_POST['recipeURL'], ':portions' => $_POST['portions']);
            $stmt->execute($vals);

        } else { // meal does already exist
            $sql = "UPDATE Meal SET C_ID = :category, Meal = :recipeName, Description = :description, Rating = :stars, RecipeURL = :recipeURL, Portions = :portions WHERE M_ID = :id";
            $stmt = $dbc->prepare($sql);
            $vals = array(':category' => $_POST['category'], ':recipeName' => $_POST['recipeName'], ':description' => $_POST['description'], ':stars' => $_POST['stars'], ':recipeURL' => $_POST['recipeURL'], ':portions' => $_POST['portions'], ':id' => $_POST['id']);
            $stmt->execute($vals);

            if ($recipePic != "") // if a new picture was uploaded
            {
                // delete old one
                $sql = "SELECT Picture FROM Meal WHERE M_ID = ?";
                $stmt = $dbc->prepare($sql);
                $stmt->execute([$_POST['id']]);
                $res = $stmt->fetchAll();
                if (count($res) > 0)
                {
                    $picture = $res[0]['Picture'];
                    if ($picture != "")
                    {
                        unlink(BASE_PATH."public_html/uploads/".$picture);
                        echo $picture;
                    }
                    else {
                        echo "no picture!";
                    }
                    
                }

                // link new one
                $sql = "UPDATE Meal SET Picture = :recipePic WHERE M_ID = :id";
                $stmt = $dbc->prepare($sql);
                $vals = array(':id' => $_POST['id'], ':recipePic' => $recipePic);
                $stmt->execute($vals);
            }
        }

    } else if (MealEdit::doesMealExist($_POST['id'])) {
        echo "<br>meal exists! prepare editing";
    }
}

header("Location: ../..");