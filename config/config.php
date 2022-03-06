<?php

function config() { 
    $pagename = "MealManager";
    
    if (isset($_ENV["DB_NAME"])) {
        return array(
            'pagename'  => $pagename,
            'dbHost'    => $_ENV["DB_HOST"],
            'dbUser'    => $_ENV["DB_USER"],
            'dbPw'      => $_ENV["DB_PW"],
            'dbName'    => $_ENV["DB_NAME"],
        );  
        
    } else {
        return array(
            'pagename'  => $pagename,
            'dbHost'    => "localhost",
            'dbUser'    => "user",
            'dbPw'      => "password",
            'dbName'    => "mealmanager",
        );  

    }

}



