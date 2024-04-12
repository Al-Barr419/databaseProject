<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
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
      .header .title a {
        text-decoration: none; /* Removes the underline */
        color: inherit; /* Keeps the color the same as the parent, if you've set one */
      }

      /* Or, if the <a> tag is directly inside the .header */
      .header a {
        text-decoration: none;
        color: inherit;
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
      /* Add styles for the h2 heading */
      h2 {
        text-align: center;
        color: #00205b; /* Dark blue for contrast */
        padding-bottom: 10px; /* Space below the heading */
        border-bottom: 2px solid #00205b; /* Line under the heading */
        margin-bottom: 30px; /* Space between the heading and the list */
      }

      /* Add styles for the list of rental groups */
      .group-list {
        list-style-type: none; /* Remove default list styling */
        padding: 0; /* Remove default padding */
        margin: 0; /* Remove default margin */
      }

      .group-item {
        display: flex;
        align-items: center; /* Vertically center the content */
        justify-content: center; /* Horizontally center the content */
        border: 1px solid #ddd; /* Slight border for the item */
        margin-bottom: 10px; /* Space between items */
        padding: 10px; /* Padding inside each item */
        background: #f2f2f2; /* Light gray background for each item */
      }

      .group-item a {
        text-decoration: none;
        color: #00205b; /* Dark blue color for the text */
        font-weight: bold;
      }

      .group-item img {
        width: 50px; /* Small thumbnail for property image */
        height: auto;
        margin-right: 10px; /* Space to the right of the image */
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
        color: black; /* Queen's Gold */
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
    <div class="main-content">
    <h2>List of Rental Groups</h2>
    <div class="group-list">
      <?php
      include 'connectdb.php';
      $result = $connection->query("SELECT * FROM rentalgroup"); 
      if ($result->rowCount() == 0) {
        echo "Sorry, there are no properties to display.";
      } else {
          while ($row = $result->fetch()) {
            echo "<div class='group-item'>";
            echo "<img src='images/multiple-users.png' alt='Group Thumbnail' />";
            echo "<a href='displayPreferences.php?id=".$row["id"]."'>Group ".$row["id"]."</a>";
            echo "</div>";
          }
        }

      $connection = NULL;
      ?>
    </div>
  </div>
  </body>
  <footer class="footer">
      &copy; 2024 HourGlass Rentals | Queen's University
  </footer>
</html>
