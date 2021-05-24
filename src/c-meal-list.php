<?php
include_once "inc/inc.php";
include_once "vendor/autoload.php";


class MealList {

    public $mealList;

    public function loadMealList($search = null) {
        $dbc = DB::connect();
        if (isset($search)){
            $sql = "SELECT * FROM meal WHERE Meal LIKE ?;";            
            $stmt = $dbc->prepare($sql);
            $stmt->execute(['%'.$search.'%']);
            $this->mealList = $stmt->fetchAll();
        } else {
            $sql = "SELECT * FROM meal;";
            $res = $dbc->query($sql);
            $this->mealList = $res->fetchAll();
        }

    }

    public static function convertMarkdown($raw)
    {
        $parse = new Parsedown();
        echo $parse->text($raw);
    }


}


?>