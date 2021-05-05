<?php
include_once "../../inc/inc.php";


if (isset($_POST['i_id']) && isset($_POST['m_id']) && isset($_POST['main']) && isset($_POST['amount']) && isset($_POST['u_type'])) {

    $con = DB::connect();
    $sql = "REPLACE INTO mealingredient (M_ID, I_ID, Main, Amount, U_ID) VALUES (?,?,?,?,?)";
    $stmt = $con->prepare($sql);
    try {
        $stmt->execute([$_POST['m_id'], $_POST['i_id'], ($_POST['main'] == "true" ? 1 : 0), $_POST['amount'], $_POST['u_type']]);
        echo "true";

    } catch (PDOException $e)
    {
        echo "error ".$e->getMessage();
    }

} else echo "error";