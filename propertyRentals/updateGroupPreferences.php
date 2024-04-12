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
        /* Section Heading */
        h2 {
            text-align: center;
            padding-top: 10px;
        }
        /* Ensure that the header and footer do not have margins that push the .hero down */
      .header,
      .footer {
        margin: 0;
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
        /* Form and Input Styling */
        form {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            margin-top: 20px;
            color: #333;
            font-size: 1.1em;
        }

        input[type="number"],
        select,
        input[type="radio"] + label {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="radio"] {
            display: inline-block;
        }

        input[type="submit"] {
            background-color: #4484ce;
            color: #fff;
            border: none;
            padding: 10px 15px;
            margin-top: 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 1.1em;
            transition: background-color 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #366ba8;
        }

        /* Accessibility Improvements */
        input[type="radio"]:focus + label,
        input[type="radio"]:hover + label,
        input[type="submit"]:focus,
        input[type="submit"]:hover {
            background-color: #f1f1f1;
        }

        /* Adjustments for inline elements */
        .radio-group {
            display: flex;
            justify-content: start;
            gap: 20px;
        }

        .radio-group label {
            width: auto;
            padding: 10px 15px;
            background: #f8f8f8;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Styling for the labels next to radio buttons */
        input[type="radio"] + label {
            display: inline-block;
            margin-top: 0;
            margin-left: 5px;
            cursor: pointer;
        }
    </style>
    <title>Document</title>
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
    <div class='form-container'>
    <form action="handlePrefUpdate.php" method="POST">
    
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET["id"]); ?>">

    <label for="numBedrooms">Number of Bedrooms:</label>
    <input type="number" name="numBedrooms" id="numBedrooms">

    <label for="numBathrooms">Number of Bathrooms:</label>
    <input type="number" name="numBathrooms" id="numBathrooms">

    <label for="maxRent">Maximum Rent:</label>
    <input type="number" name="maxRent" id="maxRent">

    <label for="accommodationType">Accommodation Type:</label>
    <select name="accommodationType" id="accommodationType">
        <option value="Apartment">Apartment</option>
        <option value="House">House</option>
        <option value="Room">Room</option>
    </select>

    <label for="laundry">Laundry:</label>
    <select name="laundry" id="laundry">
        <option value="Ensuite">Ensuite</option>
        <option value="Shared">Shared</option>
    </select>


    <label for="accessible">Accessible:</label>
    <input type="radio" name="accessible" id="accessibleYes" value="Yes">
    <label for="accessibleYes">Yes</label>
    <input type="radio" name="accessible" id="accessibleNo" value="No">
    <label for="accessibleNo">No</label>

    <label for="parking">Parking:</label>
    <input type="radio" name="parking" id="parkingYes" value="Yes">
    <label for="parkingYes">Yes</label>
    <input type="radio" name="parking" id="parkingNo" value="No">
    <label for="parkingNo">No</label>

    <input type="submit" value="Update Preferences">
    </form>
    </div>
</body>
<footer class="footer">
    &copy; 2024 HourGlass Rentals | Queen's University
</footer>
</html>