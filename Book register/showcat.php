<?php
            // Establish a database connection
            $connection = mysqli_connect('localhost', 'root', '', 'database');

            // Check the connection
            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch categories from the database
            $query = "SELECT category_id, category_Name FROM bookcategory";
            $result = mysqli_query($connection, $query);

            // Check if query was successful
            if ($result) {
                // Create the select dropdown
                echo '<div>
                        <label for="bookCategory">Book Category:</label>
                        <select id="bookCategory" name="bookCategory" required>
                            <option value="" disabled selected>Select Category</option>';

                // Populate dropdown with options
                while ($row = mysqli_fetch_assoc($result)) {
                    $categoryId = $row['category_id'];
                    $categoryName = $row['category_Name'];
                    echo "<option value=\"$categoryId\">$categoryName</option>";
                }

                echo '</select></div>';
            } else {
                // Handle error if the query fails
                echo "Error: " . mysqli_error($connection);
            }

            // Close the database connection
            mysqli_close($connection);
        ?>
