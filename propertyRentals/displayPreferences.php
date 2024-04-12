<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      .footer {
        background-color: #4484ce; /* same as the header */
        color: white;
        text-align: center;
        padding: 20px 0;
        position: relative; /* Changed from fixed to relative */
        width: 100%;
        }
        .content-section {
  background: #fff; /* White background for content */
  border-radius: 10px; /* Rounded corners */
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
  margin: 20px auto; /* Centering and adding margin */
  padding: 20px; /* Padding inside the sections */
  max-width: 800px; /* Max width for optimal reading */
}

.content-section h2 {
  color: #00205b; /* Queen's University blue */
  border-bottom: 2px solid #00205b; /* Adds a line under the title */
  padding-bottom: 10px; /* Spacing under the title */
}

.content-section p, .content-section a {
  font-size: 1em; /* Standard font size for paragraphs and links */
  line-height: 1.5; /* Space between lines for readability */
  color: #333; /* Dark grey for text */
  padding: 5px 0; /* Spacing around paragraphs and links */
}

.content-section a {
  display: inline-block; /* Allows setting padding and margin */
  background: #4484ce; /* Button background */
  color: #fff; /* White text */
  text-decoration: none; /* No underline on links */
  padding: 10px 15px; /* Button padding */
  margin-top: 20px; /* Space above the button */
  border-radius: 5px; /* Rounded corners for the button */
  transition: background-color 0.3s; /* Smooth transition for hover effect */
}

.content-section a:hover {
  background-color: #366ba8; /* Slightly darker blue on hover */
}

/* Apply the .content-section styles to the main body tag */
body .content-section:first-of-type {
  margin-top: 50px; /* Adds space on top of the first section */
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
    <?php
    include 'connectdb.php';

    $id = $_GET['id'];

    $result = $connection->query("SELECT * FROM rentalgroup WHERE id = $id");
    $result2 = $connection->query("SELECT * FROM student WHERE groupId = $id");
    echo "<div class='content-section'>";
    echo "<h2>Members of Rental Group $id</h2>";   
    while ($row = $result2->fetch()) {
        echo "<p>".$row["fname"]." ".$row["lname"]."</p>";
    } 
    echo "</div>";

    echo "<div class='content-section'>";
    echo "<h2>Preferences for Rental Group $id</h2>";

    while ($row = $result->fetch()) {
        echo "<p>Number of Bedrooms: ".$row["num_beds"]."</p>";
        echo "<p>Number of Bathrooms: ".$row["num_baths"]."</p>";
        echo "<p>Maximum Rent: ".$row["max_cost"]."</p>";
        echo "<p>Accomodation type: ".$row["accomodation_type"]."</p>";
        echo "<p>Laundry: ".$row["laundry"]."</p>";
        if ($row["accessibility"] == 1) {
            echo "<p>accessible: Yes</p>";
        } else {
            echo "<p>accessible: No</p>";
        }
        if ($row["parking"] == 1) {
            echo "<p>parking: Yes</p>";
        } else {
            echo "<p>parking: No</p>";
        }
    }
    if (isset($_GET['update']) && $_GET['update'] == 'success') {
        echo '<p>Your preferences have been updated successfully.</p>';
    }
    
    echo "<a href='updateGroupPreferences.php?id=".$id."''>Update Preferences</a>";
    echo "</div>";
    $connection = NULL;

    ?>
</body>
<footer class="footer">
      &copy; 2024 HourGlass Rentals | Queen's University
  </footer>
</html>