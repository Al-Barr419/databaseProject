<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .content-wrapper {
          max-width: 800px; /* Sets the max width for the content */
          margin: 0 auto; /* Centers the content */
          padding: 20px; /* Adds padding inside the wrapper */
          background-color: #ffffff; /* Sets the background color to white */
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adds a subtle shadow for depth */
          border-radius: 10px; /* Rounds the corners of the content box */
          margin-top: 30px; /* Adds margin at the top for spacing */
        }

      h2 {
        text-align: center; /* Centers the heading */
        margin-bottom: 20px; /* Adds space below the heading */
        color: #00205b; /* Sets the color to a dark blue for contrast */
      }

      table {
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse; /* This combines adjacent table borders */
    }

      th, td {
          text-align: center;
          padding: 12px;
          border: 1px solid #ccc; /* Apply a light grey border to all cells */
      }

      th {
          background-color: #eaeaea;
          color: #333;
          border-top: 2px solid #666; /* Slightly darker border for the top row */
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
        font-size: 1.2em; /* Slightly smaller font size for the tagline */
        font-style: italic; /* Italicize the tagline for emphasis */
        color: white; /* Lighter color for the tagline */
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
        position: fixed;
        bottom: 0;
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
    <div class="content-wrapper">
    <h2>Average Rent for Apartments, Houses, and Rooms</h2>
    <table>
        <tr>
            <th>Apartment</th>
            <th>House</th>
            <th>Room</th>
        </tr>
    <?php
    include 'connectdb.php';
    $apartment_average = $connection->query("SELECT AVG(cost) as average FROM property as p RIGHT OUTER JOIN apartment as a ON a.rpid = p.id;");
    $house_average = $connection->query("SELECT AVG(cost) as average FROM property as p RIGHT OUTER JOIN house as h ON h.rpid = p.id;");
    $room_average = $connection->query("SELECT AVG(cost) as average FROM property as p RIGHT OUTER JOIN room as c ON c.rpid = p.id;");

    echo "<tr>";
    if ($apartment_average->rowCount() == 0) {
      echo "None";
    } else {
        echo "<td>".number_format($apartment_average->fetch()["average"], 2)."</td>";
    }

    if ($house_average->rowCount() == 0) {
      echo "None";
    } else {
      echo "<td>".number_format($house_average->fetch()["average"], 2)."</td>";
    }

    if ($room_average->rowCount() == 0) {
      echo "None";
    } else {
      echo "<td>".number_format($room_average->fetch()["average"], 2)."</td>";
    }
    echo "</tr>";

    $connection = NULL;
    ?>
    </table>
    </div>
    
</body>
    <footer class="footer">
      &copy; 2024 HourGlass Rentals | Queen's University
    </footer>
</html>