<?php

    include_once "../../inc/inc.php";
    include_once "src/view/v-ingredient.php";
    include_once "src/view/v-meal-edit.php";
    
    $mev = new MealEditView();
    $mev->determineMeal();

    include "templates/meal-edit/ingredients-list.php";

