<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="LeadingChoiceGetaways.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet"><!--using google font-->
    <meta name="viewport" content="width=device-width, initial-scale=1"><!--For mobile devices-->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png"><!--favicon (logo in tab)-->
    <script src="https://kit.fontawesome.com/cb47974c5e.js" crossorigin="anonymous"></script><!--using fontawesome for icons-->
    <script src="responsive_menu.js"></script>  <!--hamburger menu-->
    <title>Leading Choice Getaways</title>
</head>

<body>
     <!--Navigation and head of page with logo-->
    <header>
        <nav class="navigation">
            <a id="ham_menu">&#9776;</a><!--for mobile menu-->
            <ul id="main-nav">
                <li><a class="logo" href="index.html"><img class="logo" src="pictures/logo.png" alt="Companylogo"></a></li><!--making the logo click home-->
                <li><a href="index.html">Home</a></li>
                <li><a class="active" href="view-holidays.php">View Holidays</a></li><!--active shows current page underlined-->
                <li><a href="admin.php">Admin</a></li>
                <li><a href="credits.html">Credits</a></li>
                <li><a href="wireframes.pdf">Wireframes</a></li>
            </ul>
        </nav>
        <img class="logo_main" src="pictures/logoholidays.png" alt="logo"><!--view holidays picture across waves image-->
    </header>

    <main>
        <!--Introduciton to the holidays available-->
        <section class="about">
            <h1>View Holidays Here!</h1>
            <p>View our vast selection of holidays here! We offer experiences that are simply unforgettable. From Safaris and Walking Holidays
            to Tours and Weddings, there is the perfect holiday here for you. Every holiday is hand picked and made sure to fufill our 5
            star reviews. Don't hesitate and book now to secure your 5 star luxury getaway!</p>
        </section>

        <!--Dynamically display a listing of all holidays held in LCG_holidays-->
        <?php
            // make db connection
            include 'database_conn.php';

            $sql = "SELECT catDesc, holidayTitle, holidayDescription, locationName, country, holidayDuration, holidayPrice
                    FROM LCG_holidays
                    INNER JOIN LCG_category ON LCG_category.catID = LCG_holidays.catID
                    INNER JOIN LCG_location ON LCG_location.locationID = LCG_holidays.locationID
                    ORDER BY holidayTitle";

            $queryResult = $dbConn->query($sql);

            // Check for and handle query failure
            if ($queryResult === false) {
                echo "<p>Query failed: " . $dbConn->error . "</p>\n</body>\n</html>";
                exit;
            }

            // Otherwise fetch all the rows returned by the query one by one
            else{
                echo "        <section class='view-holiday'>\n"; //spacing after echo" to create fluid indenting throughout the html source code
                echo "            <h2>Holidays</h2>\n";
                echo "            <div class='view-holidays-container'>\n"; //container for all the holidays

                while ($rowObj = $queryResult->fetch_object()) { //looping through database
                    echo "<div class='holiday-container'>\n"; //container for a singluar holiday
                    echo "  <div class='holiday-image-container'>\n"; //image and catDesc over it

                    //selecting image based relevant to the holiday
                    if ($rowObj->holidayTitle == "A Coast of Many Colours"){
                        echo "<img class='holiday-image' src='pictures/holiday1.jpg' alt='$rowObj->holidayTitle'>\n";
                    } elseif ($rowObj->holidayTitle == "A Taste of Kenya"){
                        echo "<img class='holiday-image' src='pictures/holiday2.jpg' alt='$rowObj->holidayTitle'>\n";
                    } elseif ($rowObj->holidayTitle == "Baraza Resort & Spa"){
                        echo "<img class='holiday-image' src='pictures/holiday3.jpg' alt='$rowObj->holidayTitle'>\n";
                    } elseif ($rowObj->holidayTitle == "Colours of New England"){
                        echo "<img class='holiday-image' src='pictures/holiday4.jpg' alt='$rowObj->holidayTitle'>\n";
                    } elseif ($rowObj->holidayTitle == "Conrad Maldives Rangali Island"){
                        echo "<img class='holiday-image' src='pictures/holiday5.jpg' alt='$rowObj->holidayTitle'>\n";
                    } elseif ($rowObj->holidayTitle == "Dom Pedro Golf Offers"){
                        echo "<img class='holiday-image' src='pictures/holiday6.jpg' alt='$rowObj->holidayTitle'>\n";
                    } elseif ($rowObj->holidayTitle == "Masai Explorer"){
                        echo "<img class='holiday-image' src='pictures/holiday7.jpg' alt='$rowObj->holidayTitle'>\n";
                    } elseif ($rowObj->holidayTitle == "Milaidhoo Island Maldives"){
                        echo "<img class='holiday-image' src='pictures/holiday8.jpg' alt='$rowObj->holidayTitle'>\n";
                    } elseif ($rowObj->holidayTitle == "Sorrento"){
                        echo "<img class='holiday-image' src='pictures/holiday9.jpg' alt='$rowObj->holidayTitle'>\n";
                    } elseif ($rowObj->holidayTitle == "Top of the Rock Wedding - Deluxe"){
                        echo "<img class='holiday-image' src='pictures/holiday10.jpg' alt='$rowObj->holidayTitle'>\n";
                    } elseif ($rowObj->holidayTitle == "Verona Opera Festival"){
                        echo "<img class='holiday-image' src='pictures/holiday11.jpg' alt='$rowObj->holidayTitle'>\n";
                    } elseif ($rowObj->holidayTitle == "Western Highlights"){
                        echo "<img class='holiday-image' src='pictures/holiday12.jpg' alt='$rowObj->holidayTitle'>\n";
                    
                    //accounting for displaying the new holiday added through the admin form which needs an image based on the category
                    } elseif($rowObj->catDesc == "Luxury"){
                        echo "<img class='holiday-image' src=pictures/luxury.jpg alt='luxury'>\n";
                    } elseif($rowObj->catDesc =="Tour"){
                        echo "<img class='holiday-image' src=pictures/tour.jpg alt='tour'>\n";
                    } elseif($rowObj->catDesc =="Safari"){
                        echo "<img class='holiday-image' src=pictures/safari1.jpg alt='safari'>\n";
                    } elseif($rowObj->catDesc =="Golf"){
                        echo "<img class='holiday-image' src=pictures/golf.jpg alt='golf'>\n";
                    } elseif($rowObj->catDesc =="Weddings"){
                        echo "<img class='holiday-image' src=pictures/weddings.jpg alt='weddings'>\n";
                    } elseif($rowObj->catDesc =="Walking"){
                        echo "<img class='holiday-image' src=pictures/walking.jpg alt='walking'>\n";
                    } elseif($rowObj->catDesc =="Opera"){
                        echo "<img class='holiday-image' src=pictures/opera.jpg alt='opera'>\n";
                    }
                    
                    echo "      <div class='holiday-image-text'>\n";
                    echo "          <p>{$rowObj->catDesc}</p>\n"; //input catDesc from db over image
                    echo "      </div>\n";
                    echo "  </div>\n";
                    echo "  <div class='holiday-details'>\n";
                    echo "      <div class='holiday-title-container'>\n"; //title container
                    echo "          <div class='holiday-title'>\n";
                    echo "              <h3 class='h3-holiday'>{$rowObj->holidayTitle}</h3>\n"; //input holidayTitle from db
                    echo "              <i class='fas fa-map-marker-alt'></i><span>  {$rowObj->locationName}, {$rowObj->country}</span>\n"; //input location and country from db
                    echo "          </div>\n";
                    echo "          <div class='holiday-rating'>\n"; //rating
                    echo "              <p>Rating:</p>\n";
                    echo "              <i class='fas fa-star'></i>\n";
                    echo "              <i class='fas fa-star'></i>\n";
                    echo "              <i class='fas fa-star'></i>\n";
                    echo "              <i class='fas fa-star'></i>\n";
                    echo "              <i class='fas fa-star'></i>\n";
                    echo "          </div>\n";
                    echo "      </div>\n";
                    echo "      <div class='holiday-icons'>\n"; //icons section
                    echo "          <div class='holiday-icon'>\n";
                    echo "              <i class='fas fa-moon'></i><span>{$rowObj->holidayDuration} Nights</span>\n"; //input holidayDuration from db
                    echo "          </div>\n";
                    echo "          <div class='holiday-icon'>\n";
                    echo "              <i class='fas fa-utensils'></i><span>All Inclusive</span>\n";
                    echo "          </div>\n";
                    echo "          <div class='holiday-icon'>\n";
                    echo "              <i class='fas fa-calendar-alt'></i><span>Flexible Booking</span>\n";
                    echo "          </div>\n";
                    echo "      </div>\n";
                    echo "      <div class='holiday-description'>\n"; //description
                    echo "          <p>{$rowObj->holidayDescription}</p>\n"; //input holidayDescription from db
                    echo "      </div>\n";
                    echo "      <div class='holiday-book'>\n"; //price and book now button
                    echo "          <p class='price'>£{$rowObj->holidayPrice}</p>\n"; //input holidayPrice from db
                    echo "          <a class='book' href='#'>Book Now!</a>\n";
                    echo "      </div>\n";
                    echo "  </div>\n";
                    echo "</div>\n";
                    }
                }
            echo "            </div>\n";
            echo "        </section>\n";
            $queryResult->close();
            $dbConn->close();
        ?>

    </main>

    <!--Footer-->
    <footer>
        <div class="footerContainer">
            <img class="logo_footer" src="pictures/logo_footer.png" alt="logo">
            <div class="links_footer">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a class="active" href="view-holidays.php">View Holidays</a></li><!--active to highlight current page user is on-->
                    <li><a href="admin.php">Admin</a></li>
                    <li><a href="credits.html">Credits</a></li>
                    <li><a href="wireframes.pdf">Wireframes</a></li>
                </ul>
            </div>
            <div class="contact_footer">
                <h4>Contact Us</h4>
                <ul class="footer_contactlist">
                    <li>
                        <i class="far fa-envelope"></i>
                        <span class="contact">‎‏‏‎ ‎‎‎‎‎enquiries@LCGholidays.co.uk</span><!--span for inline with text-->
                    </li>
                    <li>
                        <i class="fas fa-phone"></i>
                        <span class="contact">‏‏‎ ‎07419742229</span>
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="contact">‏‏‎ ‎Northumbria University</span>
                    </li>
                </ul>
            </div>
            <div class="followContainer">
                <div class="follow_footer">
                    <h4>Follow Us</h4>
                    <ul class="follow_footer"><!--links would take user to socials-->
                        <li><a href='#'><i class="fab fa-facebook-square"></i></a></li>
                        <li><a href='#'><i class="fab fa-twitter"></i></a></li>
                        <li><a href='#'><i class="fab fa-instagram"></i></a></li>
                        <li><a href='#'><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                </div>
                <img class="trustpilot" src="pictures/trustpilot.png" alt="trustpilot">
            </div>
        </div>
    </footer>

    <!--Very bottom footer-->
    <section class="copyright">
        <h5>Leading Choice Getaways &copy; 2021 | Designed by Jack Gooday</h5>
    </section>
</body>

</html>