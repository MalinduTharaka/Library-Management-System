<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Registration</title>
    <link rel="stylesheet" href="styles.css">
    
</head>

<body>
    
    <?php include_once '..\login\includes\header.php'; ?>

    <?php

        $connection = mysqli_connect('localhost', 'root', '', 'database');

        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT book_id FROM book ORDER BY book_id DESC LIMIT 1";
        $result = mysqli_query($connection, $query);

        if ($result) {

            $row = mysqli_fetch_assoc($result);

            mysqli_free_result($result);

            mysqli_close($connection);

            $lastBookID = $row['book_id'];
        } else {
            // Handle the case where the query fails
            $lastBookID = "Error fetching Book ID";
        }

    ?> 
    <div class="content-wrapper">
    <form id="bookForm" method="post" action="regbook.php">
        <h1>Book Registration</h1>
        <p id="p2"><?php echo "Last Book ID : ". htmlspecialchars($lastBookID); ?></p>
        <div>
            <label for="bookId">Book ID:</label>
            <input type="text" id="bookId" name="bookId" pattern="B[0-9]{3}"
                title="Please enter Book ID in 'B001' format" required>
        </div>


        <div>
            <label for="bookName">Book Name:</label>
            <input type="text" id="bookName" name="bookName" required>
        </div>


        <div>
            <?php include_once 'showcat.php' ?>
        </div>


        <button type="submit">Register Book</button><br><br>
        <a href="index2.php">Show the records</a><br>
        <button id="b2" type="reset">Delete Book</button><br><br>
        <button id="b3" type="reset">Update Book</button><br>
    </form>

    <form id="f2" style="display: none;" action="deletebook.php" method="post">
        <label for="">Delete Book</label>
        <input type="text" name="bookid" id="bookid">
        <button type="submit">Delete</button>
    </form>
    <form id="f3" style="display: none;" action="updatebook.php" method="post">
        <h1>Book Update</h1>
        <div>
            <label for="bookId">Book ID:</label>
            <input type="text" id="bookId" name="bookId" pattern="B[0-9]{3}"
                title="Please enter Book ID in 'B001' format" required>
        </div>
        <div>
            <label for="bookName">Book Name:</label>
            <input type="text" id="bookName" name="bookName" required>
        </div>
        <div>
            <?php include 'showcat.php' ?>
        </div>

        <button type="submit">Update Book</button><br><br>
    </form>
    <img src="im.jpg" alt="Your Image Description">
    </div>


<script>
    document.getElementById("b2").onclick=function(){
        document.getElementById("f2").style.display="block";
        document.getElementById("f3").style.display="none";
    }
    document.getElementById("b3").onclick=function(){
        document.getElementById("f3").style.display="block";
        document.getElementById("f2").style.display="none";

    }
</script>
</body>

</html>