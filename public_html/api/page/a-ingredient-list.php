<?php

    include_once "../../../inc/inc.php";
    include_once "src/c-ingredient.php";
    include_once "src/c-meal-edit.php";
    
    $mev = new MealEdit();
    $mev->determineMeal();

    include "templates/meal-edit/t-ingredients-list.php";

