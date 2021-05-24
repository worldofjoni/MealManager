<?php
include_once "../../inc/inc.php";

if (isset($_POST['m_id']) && isset($_POST['i_id'])) {

    $con = DB::connect();
    $sql = "DELETE FROM mealingredient WHERE M_ID = ? AND I_ID = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$_POST['m_id'], $_POST['i_id']]);
    echo "deleted Ingredient #".$_POST['i_id']." from Meal #".$_POST['m_id'];


}
