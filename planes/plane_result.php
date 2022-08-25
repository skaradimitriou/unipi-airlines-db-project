<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <head>
        <link rel="stylesheet" href="plane_result_styles.css">
        <script type="text/javascript" src="plane_form_scripts.js"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        <title>Αεροσκάφη - Stathis Airlines</title>
        <link rel="icon" type="image/x-icon" href="../img/icons/stathis_airlines_logo_white.ico">

        <!-- Allows Media Queries-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>

        <!-- Website's Banner -->

        <div id="navigation_menu" class="website_banner home_banner">
            <a href="../index.php">
                <img class="website_logo" src="../img/icons/stathis_airlines_logo_white.png" alt="stathis_airlines_logo_sm"/>
            </a>

            <div class="my_top_bar">
                <a class="top_bar_link" href="../index.php">Αρχική</a>
                <a class="top_bar_link" href="../search_flight/search_flight.php">Αναζήτηση Πτήσεων</a>
                <a class="top_bar_link" href="../famous_destinations/famous_destinations.php">Δημοφιλείς Προορισμοί</a>
                <a class="top_bar_link active_destination" href="planes.php">Αεροσκάφη</a>
            </div>

            <div>
                <p class="website_banner_title">Ο Στόλος μας</p>
                <p class="website_banner_desc">Συμπλήρωσε την φόρμα ανάλογα με την ενέργεια που επιθυμεις (Εισαγωγή, Ενημέρωση, Διαγραφή)</p>
                <a href="#categories"><img class="go_to_categories" src="../img/icons/ic_go_to_top.png" alt="go_to_top_btn"></a>
            </div>
        </div>

        <!-- Start of website's content -->

        <div id ="categories" class="container">

            <?php

            //reads the connection data from the my_db_credentials.php file in the same directory.
            require_once '../database/credentials.php';

            //Attempt to connect to the database.
            $connection="host=".DB_SERVER." port=5432 dbname=".DB_BASE."
            user=".DB_USER." password=".DB_PASS." options='--client_encoding=UTF8'";
            $dbconn = pg_connect($connection);

            //check if db connection is successful. If it isn't, then the program closes the connection by throwing a connection error.
            if (!$dbconn) {
                die("Connection to the database has failed: " . pg_connect_error());
            }

            if($_SERVER["REQUEST_METHOD"] == "POST"){

                //decision based on operation
                if($_POST['operation'] == "Εισαγωγή"){
                    //Insert data to postgres

                    $sql = "INSERT INTO airplanes(aircraft_code, model_name, capacity, range, airport_id) 
                    VALUES('".$_POST['aircraft_code']."','".$_POST['aircraft_model']."','".$_POST['capacity']."','".$_POST['range']."','".$_POST['aircraft_location']."') ";
                } else if($_POST['operation'] == "Ενημέρωση"){
                    $sql = "UPDATE airplanes  SET model_name = '".$_POST['aircraft_model']."', capacity ='".$_POST['capacity']."',range = '".$_POST['range']."', airport_id = '".$_POST['aircraft_location']."'
                     WHERE aircraft_code = '".$_POST['aircraft_code']."'";
                } else if($_POST['operation'] == "Διαγραφή"){
                    $sql = "DELETE FROM airplanes WHERE aircraft_code = '".$_POST['aircraft_code']."' AND model_name = '".$_POST['aircraft_model']."' AND capacity ='".$_POST['capacity']."'AND range = '".$_POST['range']."' AND airport_id = '".$_POST['aircraft_location']."'";
                } else {
                    echo 'Unsupported operation';
                }   
            }

            // this line prints the sql query in the browser tab.
            // it is commented out because it is used for debugging purposes.
            //echo $sql;

            //execute query to the database
            $result = pg_query($dbconn, $sql) ;

            //notifies if the insert sql query has been successful
            if ($result) {
                echo '<div class="container"';
                echo '</p>';
                echo '<p class="description" style="text-align: center;">';
            
                $message = "Η ".$_POST['operation']." των δεδομένων στη βάση ήταν επιτυχής";
                echo $message;
                echo '</p>';
                echo('</div>');
            } else {
                echo '<div class="container"';
                echo '</p>';
                echo '<p class="description" style="text-align: center;">';
                $message = "Υπήρξε κάποιο σφάλμα κατα την".$_POST['operation']." των στοιχείων στη βάση δεδομένων. Δοκιμάστε ξανά";
                echo $message;
                echo '</p>';
                echo('</div>');
            }

            //close database connection to avoid leaks
            pg_close($dbconn);
            ?>

        </div>

        <!-- End of website's content -->

        <!--Footer-->

        <div class="footer">
            <p class="footer_text"><strong>Ευχόμαστε να σας ξαναδούμε </strong> σε κάποιο απο τα επόμενα ταξίδια μας!</p>

            <!-- Sitemap -->
            <div class="footer_sitemap">
                <p class="footer_sitemap_header">Sitemap</p>
                <a href="../index.php"><p class="footer_sitemap_item">Αρχική</p></a>
                <a href="../search_flight/search_flight.php"><p class="footer_sitemap_item">Αναζήτηση Πτήσεων</p></a>
                <a href="../famous_destinations/famous_destinations.php"><p class="footer_sitemap_item">Δημοφιλείς Προορισμοί</p></a>
                <a href="planes.php"><p class="footer_sitemap_item">Αεροσκάφη</p></a>
            </div>
            
            <a href="#navigation_menu"><img class="footer_go_up_btn" src="../img/icons/ic_go_to_top.png" alt="go_to_top_btn"></a>

            <p class="developed_by">Developed by Stathis Karadimitriou as a semester capstone project in the Databases Management Course at University of Piraeus, 2022</p>
        </div>
    </body>
</html>