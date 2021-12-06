<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="LeadingChoiceGetaways.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet"><!--using google font-->
    <meta name="viewport" content="width=device-width, initial-scale=1">  <!--For mobile devices-->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />  <!--favicon (logo in tab)-->
    <script src="https://kit.fontawesome.com/cb47974c5e.js" crossorigin="anonymous"></script>  <!--using fontawesome for icons-->
    <script src="responsive_menu.js"></script>   <!--hamburger menu-->
    <title>Leading Choice Getaways</title>
</head>

<body>
     <!--Navigation and head of page with logo-->
    <header>
        <nav class="navigation">
            <a id="ham_menu">&#9776;</a><!--for mobile menu-->
            <ul id="main-nav">
                <li><a class="logo" href="index.html"><img class="logo" src="pictures/logo.png" alt="Companylogo"></a></li> <!--making the logo click home-->
                <li><a href="index.html">Home</a></li>
                <li><a href="view-holidays.php">View Holidays</a></li>
                <li><a class="active" href="admin.php">Admin</a></li><!--active shows current page underlined-->
                <li><a href="credits.html">Credits</a></li>
                <li><a href="wireframes.pdf">Wireframes</a></li>
            </ul>
        </nav>
        <img class="logo_main" src="pictures/logoadmin.png" alt="logo"><!--admin logo across waves image-->
    </header>
    
    <main>
        <!--using "label for" for accessability for screen readers and id in input type to match them-->
        <!--the "name" is what is shown on the php script response-->
        <!--the admin page form is fully responsive to changes in screen size-->
        <form action="adminProcess.php" method="GET">
            <h1 class="h1-admin">Enter details of a new holiday!</h1>
            <fieldset>
                <legend>New Holiday</legend>
                <div class="form-input">

                    <!--Holiday Title-->
                    <label for="holidayTitle">Holiday Title:</label>
                    <input type="text" name="holidayTitle" placeholder="Enter title" id="holidayTitle" required maxlength="50" accesskey="t" autofocus tabindex="1"><!--autofocus for quicker useability-->
                    
                    <!--Duration-->
                    <label for="duration">Duration:</label>
                    <input type="number" name="duration" placeholder="Enter duration in nights" id="duration" required min="1" max="14" accesskey="n" tabindex="2">
                    
                    <!--Price-->
                    <label for="price">Price:</label>
                    <input type="number" name="price" placeholder="Enter price in £GPB" id="price" required min="100" max="10000" accesskey="p" tabindex="3">
                    
                    <!--Holiday description-->
                    <label for="holidayDescription">Holiday description:</label>
                    <textarea name="holidayDescription" placeholder="Describe the holiday!" id="holidayDescription" required maxlength="300" accesskey="h" tabindex="4"></textarea><!--max length to make sure fits nicely with css-->
                   
                    <!--Holiday category-->
                    <label>Holiday category:</label>
                    <div class="hol-cat">

                        <!--php script to dynamically create categories from the database records-->
                        <?php
                            // make db connection
                            include 'database_conn.php';

                            $sql = "SELECT catDesc
                                    FROM LCG_category";

                            $queryResult = $dbConn->query($sql);

                            // Check for and handle query failure
                            if($queryResult === false) {
                                echo "<p>Query failed: ".$dbConn->error."</p>\n</body>\n</html>";
                                exit;
                                }

                            //categories created dynamically from the database records 
                            else{
                                $x=1;
                                $limit=7;
                                while($x <= $limit){//for the different access keys
                                    while($rowObj = $queryResult->fetch_object()){//looping through database
                                        echo "<div class='category'>\n";
                                        echo "    <label for='{$rowObj->catDesc}'>{$rowObj->catDesc}</label>\n";
                                        echo "    <input type='radio' name='holidayCat' value='{$rowObj->catDesc}' id='{$rowObj->catDesc}' required accesskey='$x' tabindex='5'>\n";//radio so only one category can be picked
                                        echo "</div>\n";
                                        $x++;
                                        }
                                    }
                                }
                            $queryResult->close();
                            $dbConn->close();
                        ?>    
                    </div>
                        
                    <!--Location-->
                    <label for="location">Location:</label>
                    <select name="location" tabindex="6" accesskey="i" id="location"><!--drop down rather than radio for useability-->
                        
                        <!--php script to dynamically create locations from the database records-->
                        <?php
                            // make db connection
                            include 'database_conn.php';

                            $sql = "SELECT locationName
                                    FROM LCG_location";

                            $queryResult = $dbConn->query($sql);

                            // Check for and handle query failure
                            if($queryResult === false) {
                                echo "<p>Query failed: ".$dbConn->error."</p>\n</body>\n</html>";
                                exit;
                            }
                            else{
                                while($rowObj = $queryResult->fetch_object()){//looping through database
                                    echo "<option value='{$rowObj->locationName}'>{$rowObj->locationName}</option>\n";
                                    }
                                }
                            $queryResult->close();
                            $dbConn->close();
                        ?>
                    </select>

                    <!--submit button-->
                    <input type="submit" value="Submit Holiday" accesskey="s" tabindex="7">
                </div>
            </fieldset>
        </form>
    </main>

    <!--Footer-->
    <footer>
        <div class="footerContainer">
            <img class="logo_footer" src="pictures/logo_footer.png" alt="logo">
            <div class="links_footer">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="view-holidays.php">View Holidays</a></li>
                    <li><a class="active" href="admin.html">Admin</a></li><!--active shows current page user is on-->
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