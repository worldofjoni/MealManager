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

    public function getIngredients() {
        if (isset($_GET['id']))
        {
            
            $sql = "SELECT * FROM (mealingredient mi INNER JOIN ingredient i ON mi.I_ID = i.I_ID) LEFT OUTER JOIN unit u ON mi.U_ID = u.U_ID WHERE mi.M_ID = ? ORDER BY Main DESC, Ingredient";
            $dbc = DB::connect();
            $sth = $dbc->prepare($sql);
            $sth->execute([$_GET['id']]);
            foreach ($sth->fetchAll() as $res)
            {
                echo '<button type="button" data-ingredient-id="'.$res['I_ID'].'" class="ingredient list-group-item list-group-item-action">'.($res['Main'] ? '<b>':'').$res['Ingredient'].($res['Main'] ? '</b>':'');
                if ($res['U_ID'] != 0) echo '<span class="badge '.($res['Vegetarian'] == 1 ? 'bg-success' : 'bg-warning text-dark').' ms-2">'.$res['Amount'].' '.$res['Unit'].'</span>';
                else echo '<span class="badge '.($res['Vegetarian'] == 1 ? 'bg-success' : 'bg-warning text-dark').' ms-2">-</span>';
                echo '</button>';
            }
        }
    }
    

    public function getData($key)
    {
        return $this->data[$key];
    }
}