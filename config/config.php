<?php

function config() { return array(
    'pagename'  => "mealmanager",

    'dbHost'    => $_ENV["DB_HOST"],
    'dbUser'    => $_ENV["DB_USER"],
    'dbPw'      => $_ENV["DB_PW"],
    'dbName'    => $_ENV["DB_NAME"],

);
}



