<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <head>
        <link rel="stylesheet" href="planes_styles.css">

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
                <p class="website_banner_desc">Ανακάλυψε τα μοναδικά αεροσκάφη μας που σας κάνουν το επόμενο ταξίδι σας πραγματικότητα. <br> Αν επιθυμείς να προθέσεις, επεξεργαστείς ή διαγράψεις κάποιο αεροσκάφος, πάτησε παρακάτω</p>
                <p class="website_banner_btn"><a class="btn_link" href="plane_form.php">Επεξεργάσου τα αεροσκάφη</a></p>

                <p><a href="#categories"><img class="go_to_categories" src="../img/icons/ic_go_to_top.png" alt="go_to_top_btn"></a></p>
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

        //sql query to get all airplanes from the database
        $sql = "SELECT * FROM airplanes;";
        
        // this line prints the sql query in the browser tab.
        // it is commented out because it is used for debugging purposes.
        //echo $sql;

        //execute query to the database
        $result = pg_query($dbconn, $sql) ;

        //count results and set appropriate header
        $countResults = pg_num_rows($result);
        if($countResults > 0){
            //<!-- Takes up all div space-->
            echo '<p class="container_title">Όλα τα αεροσκάφη</p>';
            echo '<div id="flights_table" class="responsive_table">
                <div style="overflow-x:auto;">
                <table  style="width:100%; padding-top:32px; text-align: center; overflow-x:auto;">';
            echo '<tr>
                <th>Κωδικός Αεροσκάφους (Aircraft Code)</td>
                <th>Όνομα Μοντέλου (Model Name)</th>
                <th>Χωρητικότητα (Capacity)</td>
                <th>Εμβέλεια (Range)</th></td>
            </tr>';
            
            while($row = pg_fetch_array($result)){
                    echo("<tr>");
                    echo"<td>".$row['aircraft_code']."</td>";
                    echo"<td>".$row['model_name']."</td>";
                    echo"<td>".$row['capacity']."</td>";
                    echo"<td>".$row['range']."</td>";
                    echo("</tr>");
            }
            echo '</table></div></div>';
        } else {
            echo '<p class="container_title">Δεν βρέθηκαν αεροσκάφη στη βάση δεδομένων</p>';
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