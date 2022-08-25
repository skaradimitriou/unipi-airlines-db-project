<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <head>
        <link rel="stylesheet" href="flight_details_styles.css">
        <script type="text/javascript" src="search_flight_scripts.js"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        <title>Αναζήτηση Πτήσεων - Stathis Airlines</title>
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
                <a class="top_bar_link active_destination" href="search_flight.php">Αναζήτηση Πτήσεων</a>
                <a class="top_bar_link" href="../famous_destinations/famous_destinations.php">Δημοφιλείς Προορισμοί</a>
                <a class="top_bar_link" href="../planes/planes.php">Αεροσκάφη</a>
            </div>

            <div>
                <p class="website_banner_title">Αναζήτηση Πτήσεων</p>
                <p class="website_banner_desc">Τα αποτελέσματα της αναζήτησης σου παρουσιάζονται παρακάτω</p>
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
                
                //sql query to get all airplanes from the database

                
                $sql = "SELECT passenger_name, flight_no, arrival_airport, airports.name, airports.city, departure_date,book_ref,book_date
                        FROM bookings
                        INNER JOIN passengers
                            ON bookings.passenger_id = passengers.passenger_id
                        INNER JOIN flights
                            ON flights.passenger_id = passengers.passenger_id
                        INNER JOIN airports
                            ON flights.arrival_airport = airports.code
                            
                        WHERE flights.flight_no = '".$_POST['flight_code']."' AND departure_date = '".$_POST['flight_reservation_date']."' AND flights.flight_status = 'Arrived'
                        LIMIT 1;";


                // this line prints the sql query in the browser tab.
                // it is commented out because it is used for debugging purposes.
                //echo $sql;

                //execute query to the database
                $result = pg_query($dbconn, $sql) ;

                //count results and set appropriate header
                $countResults = pg_num_rows($result);
                if($countResults > 0){
                    //<!-- Takes up all div space-->
                    echo '<p class="container_title">Αποτελέσματα Αναζήτησης</p>';
                    echo '<div id="flights_table" class="responsive_table">
                        <div style="overflow-x:auto;">
                        <table  style="width:100%; padding-top:32px; text-align: center;">';
                    echo '<tr>
                        <th>Όνοματεπώνυμο Επιβάτη</td>
                        <th>Κωδικός Πτήσης</th>
                        <th>Προορισμός</td>
                        <th>Ημερομηνία Άφιξης</th>
                        <th>Αεροδρόμιο</th>
                        <th>Κωδικός Κράτησης</th>
                        <th>Ημερομηνία Κράτησης</th>
                    </tr>';
                    
                    while($row = pg_fetch_array($result)){
                            echo("<tr>");
                            echo"<td>".$row['passenger_name']."</td>";
                            echo"<td>".$row['flight_no']."</td>";
                            echo"<td>".$row['city']."</td>";
                            echo"<td>".$row['departure_date']."</td>";
                            echo"<td>(".$row['arrival_airport'].") ".$row['name']."</td>";
                            echo"<td>".$row['book_ref']."</td>";
                            echo"<td>".$row['book_date']."</td>";
                            echo("</tr>");
                    }
                    echo '</table></div></div>';
                } else {
                    echo '<p class="container_title" style="text-align:center;">Δεν βρέθηκαν αποτελέσματα αναζήτησης για τα στοιχεία που εισάγατε</p>';
                }
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
                <a href="search_flight.php"><p class="footer_sitemap_item">Αναζήτηση Πτήσεων</p></a>
                <a href="../famous_destinations/famous_destinations.php"><p class="footer_sitemap_item">Δημοφιλείς Προορισμοί</p></a>
                <a href="../planes/planes.php"><p class="footer_sitemap_item">Αεροσκάφη</p></a>
            </div>
            
            <a href="#navigation_menu"><img class="footer_go_up_btn" src="../img/icons/ic_go_to_top.png" alt="go_to_top_btn"></a>

            <p class="developed_by">Developed by Stathis Karadimitriou as a semester capstone project in the Databases Management Course at University of Piraeus, 2022</p>
        </div>
    </body>
</html>
