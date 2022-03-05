<?php

function config() { 
    
    if (isset($_ENV["DB_NAME"])) {
        return array(
            'pagename'  => "mealmanager",
            'dbHost'    => $_ENV["DB_HOST"],
            'dbUser'    => $_ENV["DB_USER"],
            'dbPw'      => $_ENV["DB_PW"],
            'dbName'    => $_ENV["DB_NAME"],
        );  
        
    } else {
        return array(
            'pagename'  => "mealmanager",
            'dbHost'    => "localhost",
            'dbUser'    => "user",
            'dbPw'      => "password",
            'dbName'    => "mealmanager",
        );  

    }

}



