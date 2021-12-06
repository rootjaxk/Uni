<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="LeadingChoiceGetaways.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet"><!--using google font-->
    <meta name="viewport" content="width=device-width, initial-scale=1">  <!--For mobile devices-->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />  <!--favicon (logo in tab)-->
    <script src="https://kit.fontawesome.com/cb47974c5e.js" crossorigin="anonymous"></script>  <!--using fontawesome for icons-->
    <title>New Holiday Confirmation</title>
</head>

<body>
    <!--Create confirmation page for new holiday-->
    <h1 class="h1-newholiday">Here is the new holiday you have created!</h1>

    <!--Display the new holiday-->
    <?php
        //include database connection file
        include 'database_conn.php';

        //Getting variables from admin.php
        $holidayTitle = isset($_REQUEST['holidayTitle']) ? $_REQUEST['holidayTitle'] : null;//preventing undefined index error notice messages$holiday-title = $_GET['holiday-title'];
        $duration = isset($_REQUEST['duration']) ? $_REQUEST['duration'] : null;
        $price = isset($_REQUEST['price']) ? $_REQUEST['price'] : null;
        $holidayDescription = isset($_REQUEST['holidayDescription']) ? $_REQUEST['holidayDescription'] : null;
        $holidayCat = isset($_REQUEST['holidayCat']) ? $_REQUEST['holidayCat'] : null;
        $location = isset($_REQUEST['location']) ? $_REQUEST['location'] : null;

        //Escape any special characters that may have been entered by the user
        $holidayTitle = $dbConn->real_escape_string($holidayTitle);
        $duration = $dbConn->real_escape_string($duration);
        $price = $dbConn->real_escape_string($price);
        $holidayDescription = $dbConn->real_escape_string($holidayDescription);
        $holidayCat = $dbConn->real_escape_string($holidayCat);
        $location = $dbConn->real_escape_string($location);
        
        //starting the html (which should make the holiday with the same design as that in the view holidays page)
        echo "<div class='view-holidays-container'>\n";
        echo "  <div class='holiday-container'>\n";
        echo "      <div class='holiday-image-container'>\n";//container for the image
        
        //including image relevant to choice of holiday category and generate catID to pass into database based on holidayCat chosen in admin.php
        if($holidayCat == "Luxury"){
            $catID = "c1";
            echo "<img class='holiday-image' src=pictures/luxury.jpg alt='luxury'>\n";
        } elseif($holidayCat =="Tour"){
            $catID = "c2";
            echo "<img class='holiday-image' src=pictures/tour.jpg alt='tour'>\n";
        } elseif($holidayCat =="Safari"){
            $catID = "c3";
            echo "<img class='holiday-image' src=pictures/safari1.jpg alt='safari'>\n";
        } elseif($holidayCat =="Golf"){
            $catID = "c4";
            echo "<img class='holiday-image' src=pictures/golf.jpg alt='golf'>\n";
        } elseif($holidayCat =="Weddings"){
            $catID = "c5";
            echo "<img class='holiday-image' src=pictures/weddings.jpg alt='weddings'>\n";
        } elseif($holidayCat =="Walking"){
            $catID = "c6";
            echo "<img class='holiday-image' src=pictures/walking.jpg alt='walking'>\n";
        } elseif($holidayCat =="Opera"){
            $catID = "c7";
            echo "<img class='holiday-image' src=pictures/opera.jpg alt='opera'>\n";
        }

        //Category
        echo "          <div class='holiday-image-text'>\n";

        if (empty($holidayCat)) {
            echo "<p>You have not selected the holiday category. Please try again.</p>\n";//prompting the user to enter data/make a choice (eg if call the php script without the form input)
        }
        else{
            echo "<p>$holidayCat</p>\n";//holiday category displayed over image
        }

        //section of html
        echo "          </div>\n";
        echo "      </div>\n";
        echo "      <div class='holiday-details'>\n";//container for the section under the image
        echo "          <div class='holiday-title-container'>\n";//container for the title section
        echo "              <div class='holiday-title'>\n";

        //Holiday Title
        if (empty($holidayTitle)) {
            echo "<p>You have not selected the holiday title. Please try again.</p>\n";//prompting the user to enter data/make a choice
        }
        else{
            echo "<h3 class='h3-holiday'>$holidayTitle</h3>\n";//holiday title
        }

        //Location
        if (empty($location)) {
            echo "<p>You have not selected the location. Please try again.</p>\n";//prompting the user to enter data/make a choice
        }
        else{
            echo "<i class='fas fa-map-marker-alt'></i><span>  $location</span>\n";//location
        }

        //Another section of html
        echo "              </div>\n";
        echo "              <div class='holiday-rating'>\n";//rating
        echo "                  <p>Rating:</p>\n";
        echo "                  <i class='fas fa-star'></i>\n";
        echo "                  <i class='fas fa-star'></i>\n";
        echo "                  <i class='fas fa-star'></i>\n";
        echo "                  <i class='fas fa-star'></i>\n";
        echo "                  <i class='fas fa-star'></i>\n";
        echo "              </div>\n";
        echo "          </div>\n";
        echo "          <div class='holiday-icons'>\n";//icons section
        echo "              <div class='holiday-icon'>\n";

        //Duration
        if (empty($duration)) {
            echo "<p>You have not selected the duration. Please try again.</p>\n";//prompting the user to enter data/make a choice
        }
        else{
            echo "<i class='fas fa-moon'></i><span>$duration Nights</span>\n";//duration
        }

        //Another section of html
        echo "              </div>\n";
        echo "              <div class='holiday-icon'>\n";//icons
        echo "                  <i class='fas fa-utensils'></i><span>All Inclusive</span>\n";
        echo "              </div>\n";
        echo "              <div class='holiday-icon'>\n";
        echo "                  <i class='fas fa-calendar-alt'></i><span>Flexible Booking</span>\n";
        echo "              </div>\n";
        echo "          </div>\n";
        echo "          <div class='holiday-description'>\n";//description

        //Holiday Description
        if (empty($holidayDescription)) {
            echo "<p>You have not selected the holiday description. Please try again.</p>\n";//prompting the user to enter data/make a choice
        }
        else{
            echo "<p>$holidayDescription</p>\n";
        }

        echo "          </div>\n";
        echo "          <div class='holiday-book'>\n";//last section of holiday

        //Price
        if (empty($price)) {
            echo "<p>You have not selected the price. Please try again.</p>\n";//prompting the user to enter data/make a choice
        }
        else{
            echo "<p class='price'>£$price</p>\n";//price
        }

        //Last section of html
        echo "              <a class='book' href='#'>Book Now!</a>\n";//book now button
        echo "          </div>\n";
        echo "      </div>\n";
        echo "  </div>\n";
        echo "</div>\n";
       
        //Generate locationID to pass into database based on location chosen in admin.php
        if($location == "Milaidhoo Island"){
            $locationID = "l1";
        } elseif($location == "Rangali Island"){
            $locationID = "l2";
        } elseif($location == "Zanzibar"){
            $locationID = "l3";
        } elseif($location == "Boston"){
            $locationID = "l4";
        } elseif($location == "San Francisco"){
            $locationID = "l5";
        } elseif($location == "Nairobi"){
            $locationID = "l6";
        } elseif($location == "Algarve"){
            $locationID = "l7";
        } elseif($location == "New York"){
            $locationID = "l8";
        } elseif($location == "Sorrento"){
            $locationID = "l9";
        } elseif($location == "Verona"){
            $locationID = "l10";
        }
        
        //Insert new holiday into database
        $insertSQL = "INSERT INTO LCG_holidays (holidayTitle, holidayDescription, holidayDuration, locationID, catID, holidayPrice) 
        VALUES ('$holidayTitle', '$holidayDescription', '$duration', '$locationID', '$catID', '$price')"; 
        
        //Execute the query
        $success = $dbConn->query($insertSQL);
        if ($success === false) {
        echo "<p class='database'>Sorry, problem when saving holiday to the database</p>";
        exit;
        } 
        else {
        echo "<p class='database'>$holidayTitle has been successfully added to the database. You can now view it on the View Holidays page!</p>\n";
        }
        
        $dbConn->close();
    ?>

    <!--Go back button-->
    <a class="go-back" href="view-holidays.php">Go back!</a>

</body>
</html>