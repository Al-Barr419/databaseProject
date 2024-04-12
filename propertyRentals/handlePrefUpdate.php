<?php
    include 'connectdb.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the form data
        $id = $_POST['id']; // Retrieve $id from the form submission
        $numBedrooms = $_POST["numBedrooms"];
        $numBathrooms = $_POST["numBathrooms"];
        $maxRent = $_POST["maxRent"];
        $accommodationType = $_POST["accommodationType"];
        $laundry = $_POST["laundry"];
        $accessible = $_POST["accessible"];
        $parking = $_POST["parking"];

        if ($parking == "Yes") {
            $parking = 1;
        } else {
            $parking = 0;
        }
        if ($accessible == "Yes") {
            $accessible = 1;
        } else {
            $accessible = 0;
        }

        // TODO: Perform the necessary update operations with the retrieved data
        $query = "UPDATE rentalgroup SET accessibility = :accessibility, accomodation_type = :accomodation_type, num_beds = :num_beds, num_baths = :num_baths, parking = :parking, laundry = :laundry, max_cost = :max_cost WHERE id = $id";
        $stmt = $connection->prepare($query);

        // Bind the parameters to the query
        $stmt->bindParam(':accessibility', $accessible);
        $stmt->bindParam(':accomodation_type', $accommodationType);
        $stmt->bindParam(':num_beds', $numBedrooms);
        $stmt->bindParam(':num_baths', $numBathrooms);
        $stmt->bindParam(':num_beds', $numBedrooms);
        $stmt->bindParam(':parking', $parking);
        $stmt->bindParam(':laundry', $laundry);
        $stmt->bindParam(':max_cost', $maxRent);

        // Attempt to execute the prepared statement
        $result = $stmt->execute();

        // Check if the update was successful
        if ($result == true) {
            echo "Update Successful";
        } else {
            echo "Failed to update";
        }

        // Redirect to a success page
        $string_url =  "Location: displayPreferences.php?id=".$id."&update=success";
        header($string_url);
        exit;
    }
        $connection = NULL;
    ?>