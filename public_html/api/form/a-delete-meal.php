<?php
include_once "../../../inc/inc.php";

if (isset($_GET['id'])) {

    $con = DB::connect();
    $sql = "DELETE FROM meal WHERE M_ID = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$_GET['id']]);
    echo "deleted Meal #".$_GET['id'];
    Header("Location: ../..");

}
