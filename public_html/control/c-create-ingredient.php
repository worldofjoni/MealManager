<?php
include_once "../../inc/inc.php";


if (isset($_POST['i_name']) && isset($_POST['i_vegetarian'])) {

    $con = DB::connect();
    $sql = "INSERT INTO ingredient (Ingredient, Vegetarian) VALUES (?,?)";
    $stmt = $con->prepare($sql);
    try {
        $stmt->execute([$_POST['i_name'], $_POST['i_vegetarian']]);
        echo $con->lastInsertId();
    } catch (PDOException $e) {
        echo 0;
    }

} else {
    echo 0;
}

