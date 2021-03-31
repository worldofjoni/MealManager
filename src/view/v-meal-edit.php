<?php

include_once "inc/inc.php";


class MealEditView {

    public static function doesMealExist($id) {
        $sql = "SELECT * from meal WHERE M_ID = ?;";
        $dbc = DB::connect();
        $sth = $dbc->prepare($sql);
        $sth->execute([$id]);
        $res = $sth->fetchAll();
        if (count($res) > 0 ) {
            return true;
        }
        return false;
    }

    // output html:
    // <option value="1">Potato</option>
    public function getCategories() {
        $dbc = DB::connect();
        $sql = "SELECT * FROM category;";
        foreach ($dbc->query($sql) as $result)
        {
            if ($result['C_ID'] == $this->data['C_ID'])
            {
                echo '<option value="'.$result['C_ID'].'" selected>'.$result['Category'].'</option>';
            }
            else {
                echo '<option value="'.$result['C_ID'].'">'.$result['Category'].'</option>';
            }
        }
    }

    private $data = ['M_ID' => 0, 'C_ID' => 0, 'Meal' => "", 'Description' => "", 'Rating' => 3, 'Picture' => "", 'RecipeURL' => "", 'Portions' => 1];

    // public $recipeID = 0;
    // public $categoryID = 0;
    // public $meal = "";
    // public $description = "";
    // public $rating = 0;
    // public $picture = "";
    // public $recipeURL = "";
    // public $portions = 1;

    public function determineMeal() {
        if (isset($_GET['id']))
        {
            $sql = "SELECT * from meal WHERE M_ID = ?;";
            $dbc = DB::connect();
            $sth = $dbc->prepare($sql);
            $sth->execute([$_GET['id']]);
            $res = $sth->fetchAll();
            if (count($res) > 0 ) {
                $this->data = $res[0];
            }

        }
    }

    public function getData($key)
    {
        return $this->data[$key];
    }
}