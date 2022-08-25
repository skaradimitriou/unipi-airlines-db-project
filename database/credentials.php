<?php
    /*
     * This file is used when the program needs to connect to the postgresql db.
     * It contains the nessessary data to connect to the db without polluting the other files.
     */


    /* DEV ENV (Localhost)
        //db login data
        define('DB_PASS','postgres');
        define('DB_USER','postgres'); 
        //db name defined in postgresql
        define('DB_BASE','airlinesDatabasesProject');
        //db server
        define('DB_SERVER','localhost');
    */

    /* PROD ENV (Heroku) */
    
    define('DB_USER','metelkkbhljphk'); 
    define('DB_PASS','d99b85a36cb70c5826d0d022298037df42afed0903a507744a9702d7b3267081');
    define('DB_BASE','dcbplkc372oija');
    define('DB_SERVER','ec2-54-228-125-183.eu-west-1.compute.amazonaws.com');
?>