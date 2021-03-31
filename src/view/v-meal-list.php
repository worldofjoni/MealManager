<?php
include_once "inc/inc.php";
include_once "vendor/autoload.php";


class MealListView {

    public $mealList;

    public function loadMealList() {
        $dbc = DB::connect();
        $sql = "SELECT * FROM meal;";
        $res = $dbc->query($sql);
        $this->mealList = $res->fetchAll();

    }

    public static function convertMarkdown($raw)
    {
        $parse = new Parsedown();
        echo $parse->text($raw);
    }


}


?>