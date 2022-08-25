<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <head>
        <link rel="stylesheet" href="plane_form_styles.css">
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
            <form action="plane_result.php" method="post" id="aircraft_form">
                <p class="container_title">Συμπλήρωσε τις παρακάτω πληροφορίες</p>

                <label>Επιλογή ενέργειας στη βάση (Εισαγωγή, Ενημέρωση, Διαγραφή)</label><br>
                    <select name="operation" id="operation">
                    <option value="Εισαγωγή" name="operation">Εισαγωγή</option>
                    <option value="Ενημέρωση" name="operation">Ενημέρωση</option>
                    <option value="Διαγραφή" name="operation">Διαγραφή</option>
                </select>

                <p class="header">Πληροφορίες Αεροσκάφους</p>

                <label>Κωδικός Αεροσκάφους (Αποδεκτές τιμές: 100 - 999)</label><br>
                <input id="aircraft_code" name="aircraft_code" type="text" oninput="containsOnlyNumbers('aircraft_code')" placeholder="Εισάγετε τον κωδικό του αεροσκάφους"><br>

                <label>Όνομα Μοντέλου Αεροσκάφους</label><br>
                <input id="aircraft_model" name="aircraft_model" type="text" placeholder="Εισάγετε το όνομα μοντέλου του αεροσκάφους"><br>

                <label>Χωρητικότητα Αεροσκάφους</label><br>
                <input id="capacity" name="capacity" type="text" oninput="containsOnlyNumbers('capacity')" placeholder="Εισάγετε την χωρητικότητα του αεροσκάφους"><br>

                <label>Εμβέλεια Αεροσκάφους (σε χιλιόμετρα)</label><br>
                <input id="range" name="range" type="text" oninput="containsOnlyNumbers('range')" placeholder="Εισάγετε την εμβέλεια του αεροσκάφους"><br>

                <br>
                <label>Σε ποιό αεροδρόμιο βρίσκεται το αεροσκάφος αυτή τη στιγμή;</label><br>
                    <select name="aircraft_location" id="aircraft_location">
                    <option value="ATH" name="aircraft_location">ATH</option>
                    <option value="AXD" name="aircraft_location">AXD</option>
                    <option value="CHQ" name="aircraft_location">CHQ</option>
                    <option value="GPA" name="aircraft_location">GPA</option>
                    <option value="HER" name="aircraft_location">HER</option>
                    <option value="JKH" name="aircraft_location">JKH</option>
                    <option value="JKL" name="aircraft_location">JKL</option>
                    <option value="JMX" name="aircraft_location">JMX</option>
                    <option value="JNX" name="aircraft_location">JNX</option>
                    <option value="JSI" name="aircraft_location">JSI</option>
                    <option value="JSY" name="aircraft_location">JSY</option>
                    <option value="JTR" name="aircraft_location">JTR</option>
                    <option value="KGS" name="aircraft_location">KGS</option>
                    <option value="MLO" name="aircraft_location">MLO</option>
                    <option value="PAS" name="aircraft_location">PAS</option>
                    <option value="PVK" name="aircraft_location">PVK</option>
                    <option value="RHO" name="aircraft_location">RHO</option>
                    <option value="SKG" name="aircraft_location">SKG</option>
                    <option value="SKU" name="aircraft_location">SKU</option>
                    <option value="VOL" name="aircraft_location">VOL</option>
                    <option value="ZTH" name="aircraft_location">ZTH</option>
                </select>

                <input id="submit_btn" type="button" class="form_btn_save" onclick="validateUserInput()" value="Υποβολή Ερωτήματος στη Βάση Δεδομένων">
            </form>
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