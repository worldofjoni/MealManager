<?php

    include_once "../../inc/inc.php";
    include_once "src/view/v-ingredient.php";
    

    $iv = new IngredietView();
    $iv->determineIngredient();
    include "templates/meal-edit/ingredient-detail.php";
