<?php

// include_once "../../inc/inc.php";

class IngredietView {

    public static function getUnits() {
        $sql = "SELECT * FROM unit";
        $dbc = DB::connect();
        foreach ($dbc->query($sql) as $unit) {
            echo '<option value="'.$unit['U_ID'].'">'.$unit['Unit'].'</option>';
        }
    }

    public static function getIngredients() {
        $sql = "SELECT * FROM ingredient";
        $dbc = DB::connect();
        foreach ($dbc->query($sql) as $ingr) {
            echo '<option value="'.$ingr['Ingredient'].'">';
        }
    }


    private $data = ['I_ID' => 0, 'Ingredient' => "", 'Vegetarian' => true];

    public function determineIngredient() {
        if (isset($_GET['id']) && $_GET['id'] != 0) {
            $sql = "SELECT * from ingredient WHERE I_ID = ?;";
            $dbc = DB::connect();
            $sth = $dbc->prepare($sql);
            $sth->execute([$_GET['id']]);
            $res = $sth->fetchAll();
            if (count($res) > 0 ) {
                $this->data = $res[0];
            }
        }
    }

    public function getData($key){
        return $this->data[$key];
    }
    
}
