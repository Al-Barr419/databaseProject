<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .property-list {
            display: flex;
            flex-direction: column;
            margin: 20px;
        }

        .property-item {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            margin-bottom: 10px; /* space between rows */
            padding: 10px;
            background: #fff;
        }

        .property-image {
            width: 100px; /* Adjust size as needed */
            height: auto;
            margin-right: 20px;
        }

        .property-info {
            flex-grow: 1;
        }

        .property-info h3 {
            margin: 0 0 10px 0;
            color: #00205b; /* Queen's University blue */
        }

        .property-info p {
            margin: 5px 0;
        }
        body {
            font-family: "Arial", sans-serif;
            margin: 0;
            padding: 0;
            background: #f7f7f7;
      }
      .header {
        background: #4484ce;
        color: #fff;
        padding: 20px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: space-between; /* Spread the elements apart */
      }

      .header .title {
        margin: 0;
        padding: 0;
        font-size: 2em; /* Larger font size for the title */
      }

      .header {
        font-size: 1.2em; /* Slightly smaller font size for the tagline */
        font-style: italic; /* Italicize the tagline for emphasis */
        margin: 5px 0; /* Space out the tagline from the title */
        color: white; /* Lighter color for the tagline */
      }

      .nav {
        padding: 0;
        margin: 0;
        list-style-type: none;
        background-color: #4484ce;
        overflow: hidden;
        display: flex;
        align-items: center;
      }
      .nav li {
        float: left;
      }
      .nav li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }
      .nav li a:hover {
        background-color: #8c8787; /* even lighter for hover effect */
      }
      .main-content {
        padding: 20px;
        background: #fff; /* white for the main content background */
        margin-top: 10px;
      }
      .footer {
        background-color: #4484ce; /* same as the header */
        color: white;
        text-align: center;
        padding: 20px 0;
        position: relative; /* Changed from fixed to relative */
        width: 100%;
        }

      .hero {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: left;
        padding: 50px; /* Adjust padding as needed */
        background: white; /* Light background color */
      }

      /* Container for the text to control its width and spacing */
      .hero-text {
        max-width: 50%;
        margin-right: 20px; /* Adjust the space between text and image */
      }

      /* Styles for the main heading */
      .hero-text h1 {
        font-size: 4em; /* Large font size for the main heading */
        color: #00205b; /* Queen's University blue for contrast */
        margin-bottom: 0.5em; /* Space below the heading */
      }

      /* Styles for the subtitle or additional text */
      .hero-text p {
        font-size: 1.5em;
        color: #444; /* Darker grey color for readability */
        margin-top: 0; /* Reduce space above the paragraph if needed */
      }

      /* Styles for the image */
      .hero img {
        max-width: 50%; /* Maximum width of the image */
        height: auto; /* Keep image aspect ratio */
      }

      /* Ensure that the header and footer do not have margins that push the .hero down */
      .header,
      .footer {
        margin: 0;
      }
      .hero-text {
        text-align: left;
        color: black;
      }
      .hero-text h1 {
        font-size: 3em;
        color: black; 
      }
      h2 {
        margin: 20px; /* Adds space around the heading */
        padding: 10px; /* Additional padding inside the heading container */
        background-color: #f2f2f2; /* Light background for the title area */
        display: inline-block; /* Allows the background to only take up the necessary space */
        border-radius: 5px; /* Softens the corners */
        box-shadow: 0 2px 5px rgba(0,0,0,0.2); /* Subtle shadow for depth */
        }
        .header .title a {
            text-decoration: none; /* Removes the underline */
            color: inherit; /* Keeps the color the same as the parent, if you've set one */
        }

            /* Or, if the <a> tag is directly inside the .header */
        .header a {
            text-decoration: none;
            color: inherit;
        }

      </style>
    <title>HG Rentals</title>
</head>
<body>
<header class="header">
      <div>
      <a href="rental.html"><h1 class="title">HourGlass Rentals</h1></a>
      </div>
      <ul class="nav">
        <li><a href="propertyInfo.php">Properties</a></li>
        <li><a href="listRentalGroups.php">View Rental Groups</a></li>
        <li><a href="avgRent.php">Property Average Rents</a></li>
      </ul>

    </header>
    <h2>Below is a list of info regarding the properties in our database</h2>
    <div class="property-list">
        <?php
            include 'connectdb.php';
            
            $result = $connection->query("SELECT * from (SELECT id as propertyId, fname as manager_fname, lname as manager_lname from (SELECT id as managerId, fname, lname FROM propertymanager) as pm NATURAL JOIN property) as manager_property NATURAL JOIN (SELECT propertyId, fname as owner_fname, lname as owner_lname FROM (ownsproperty as op) join propertyowner as po on po.id = op.ownerId) as owner_property ORDER BY propertyId ASC;");
            if ($result->rowCount() == 0) {
              echo "Sorry, there are no properties to display.";
            } else {
                while ($row = $result->fetch()) {
                    echo "<div class='property-item'>";
                    echo "<img src='images/images.jpeg' alt='Property Image' class='property-image'>";
                    echo "<div class='property-info'>";
                    echo "<h3>" . $row["propertyId"] . "</h3>";
                    echo "<p>Owner: " . $row["owner_fname"] . " " . $row["owner_lname"] . "</p>";
                    echo "<p>Manager: " . $row["manager_fname"] . " " . $row["manager_lname"] . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
              }
            $connection = NULL;
        ?>
    </div>
</body>
<footer class="footer">
    &copy; 2024 HourGlass Rentals | Queen's University
</footer>
</html>