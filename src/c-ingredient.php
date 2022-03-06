<?php

// include_once "../../inc/inc.php";

class Ingrediet {

    public function getUnits() {
        $sql = "SELECT * FROM unit";
        $dbc = DB::connect();
        foreach ($dbc->query($sql) as $unit) {
            echo '<option value="'.$unit['U_ID'].'"'.($this->getData('U_ID') == $unit['U_ID']? ' selected':'').'>'.$unit['Unit'].'</option>';
        }
    }

    public static function getIngredients() {
        $sql = "SELECT * FROM ingredient WHERE I_ID NOT IN (SELECT I_ID FROM mealingredient WHERE M_ID = ?)";
        $dbc = DB::connect();
        $sth = $dbc->prepare($sql);
        $sth->execute([$_GET['m_id']]);
        foreach ($sth->fetchAll() as $ingr) {
            echo '<option value="'.$ingr['Ingredient'].'">';
        }
    }


    private $data = ['I_ID' => 0, 'M_ID' => 0, 'Amount' => "", 'I_ID' => 0, 'Main' => false, 'Ingredient' => "", 'Vegetarian' => true, 'U_ID' => 0, 'Unit' => ""];

    public function determineIngredient() {
        if (isset($_GET['i_id']) && $_GET['i_id'] != 0) {
            $sql = "SELECT * FROM (mealingredient mi INNER JOIN ingredient i ON mi.I_ID = i.I_ID) LEFT OUTER JOIN Unit u ON mi.U_ID = u.U_ID WHERE mi.I_ID = ? AND mi.M_ID = ?;";
            $dbc = DB::connect();
            $sth = $dbc->prepare($sql);
            $sth->execute([$_GET['i_id'], $_GET['m_id']]);
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
