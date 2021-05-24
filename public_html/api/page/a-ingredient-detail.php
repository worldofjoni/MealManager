<?php

    include_once "../../../inc/inc.php";
    include_once "src/c-ingredient.php";
    

    $iv = new Ingrediet();
    $iv->determineIngredient();
    include "templates/meal-edit/t-ingredient-detail.php";
