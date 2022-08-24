<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <head>
        <link rel="stylesheet" href="search_flight_styles.css">
        <script type="text/javascript" src="search_flight_scripts.js"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        <title>Αναζήτηση Επιβάτη - Stathis Airlines</title>
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
                <p class="website_banner_desc">Ποιος ταξιδεψε με μια συγκεκριμενη πτήση και πότε έγινε η κράτηση του εισιτηρίου</p>
            </div>

            <div id="search_by_flight">
                    <form id="search_flight_form" method="post" action="flight_details.php">
                        <input id="flight_code" name="flight_code" type="text" maxlength="6" placeholder="Εισάγετε τον κωδικό πτήσης (π.χ. LM1632)"><br>
                        <input id="flight_reservation_date" name="flight_reservation_date" type="text" placeholder="Εισάγετε την ημερομηνία που πετάξατε με την πτήση (π.χ 22/8/2022)"><br>

                        <input class="promo_banner_btn btn_link" type="button" onclick="submitQuery()" value="Αναζήτηση">
                        <input class="promo_banner_btn_clean" type="button"  onclick="clearSearchBox()" value="Καθαρισμός">
                    </form>
            </div>
        </div>

        <!-- Start of website's content -->

        

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
