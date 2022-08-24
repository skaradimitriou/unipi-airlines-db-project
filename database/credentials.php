<?php
    /*
     * This file is used when the program needs to connect to the postgresql db.
     * It contains the nessessary data to connect to the db without polluting the other files.
     */


    /* DEV */
        //db login data
        define('DB_PASS','postgres');
        define('DB_USER','postgres'); 
        //db name defined in postgresql
        define('DB_BASE','airlinesDatabasesProject');
        //db server
        define('DB_SERVER','localhost');
    
?>