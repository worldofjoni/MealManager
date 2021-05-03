<?php
 include_once "../../inc/inc.php";

 $sql = "SELECT * FROM ingredient;";
 $dbc = DB::connect();
 $res = $dbc->query($sql);
 echo json_encode($res->fetchAll());