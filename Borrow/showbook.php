<?php
            // Establish a database connection
            $connection = mysqli_connect('localhost', 'root', '', 'database');

            // Check the connection
            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch categories from the database
            $query = "SELECT book_id, book_name FROM book";
            $result = mysqli_query($connection, $query);

            // Check if query was successful
            if ($result) {
                // Create the select dropdown
                echo '<select id="bookID" name="bookID" required style="margin-bottom:5px">
                            <option value="" disabled selected>Select Category</option>';

                // Populate dropdown with options
                while ($row = mysqli_fetch_assoc($result)) {
                    $bookid = $row['book_id'];
                    $bookName = $row['book_name'];
                    echo "<option value=\"$bookid\">$bookName</option>";
                }

                echo '</select>';
            } else {
                // Handle error if the query fails
                echo "Error: " . mysqli_error($connection);
            }

            // Close the database connection
            mysqli_close($connection);
        ?>
