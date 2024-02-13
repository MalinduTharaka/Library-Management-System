<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>Learning Management System</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="adding borrow details,detele details and update borrowed book records" />
	<!-- css files -->
	<link rel="stylesheet" href="fstyle.css">
	<!-- //web-fonts -->
	<link rel="stylesheet" type="text/css" href="..\login\css\style.css">

	<script src="js/nav.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css">

</head>
<body>
</div>
</div>
</div>
	<div>
		<div  class="main-bg">
			<?php include_once '..\login\includes\header.php'; ?>

		<!-- title -->
		<h1 style="color:white">LMS</h1>

		<div class="sub-main-w3">
			<!-- vertical tabs -->
			<div class="vertical-tab">
				<div id="section1" class="section-w3ls">
					<input type="radio" name="sections" id="option1" checked>
					<label for="option1" class="icon-left-w3pvt"><span class="fa fa-plus-square-o" aria-hidden="true"></span>Add borrow details</label>
					<article>
						
						<form  method="post" action="php\input.php" id="f1">
							
							<h3 class="legend">Update borrow details here</h3>
							
							<div class="input">
								<span class="fa fa-id-badge" aria-hidden="true"></span>
								<input type="text" placeholder="BorrowID" name="borrowid" id="brid" required />
								<span class="error">* </span>  
   								 <br><br> 
							</div>
							<div>
								<?php include 'showbook.php' ?>
							</div>
							<div class="input">
								<span class="fa fa-id-badge" aria-hidden="true"></span>
								<input type="text" placeholder="MemberID" name="Memberid" id="mid" required />
								<span class="error">* </span>
							</div>
							<div>
								<select  name="Borrowstatus" id="Borrowstatus">
									<option value="borrowed">borrowed</option>
									<option value="available">available</option>
								  </select>
							</div>
							<button type="submit" class="btn submit">SUBMIT</button>
							
						</form>
						<script>
							 document.getElementById("f1").addEventListener("submit", function (event) {
        						var borrowIdInput = document.getElementById("brid");
        						var borrowIdValue = borrowIdInput.value.trim();

        						// Regular expression to match the required format (BR followed by 3 digits)
        						var borrowIdRegex = /^BR\d{3}$/;

        							if (!borrowIdRegex.test(borrowIdValue)) {
            							alert("Please enter a valid Borrow ID in BR001 format");
            							event.preventDefault(); // Prevent form submission
        							}
   								 });


								document.getElementById("f1").addEventListener("submit", function (event) {
									var memberIdInput = document.getElementById("mid");
        							var memberIdValue = memberIdInput.value.trim();

        							// Regular expression to match the required format (BR followed by 3 digits)
        							var memberIdRegex = /^M\d{3}$/;

        							if (!memberIdRegex.test(memberIdValue)) {
            							alert("Please enter a valid Member ID in M001 format");
            							event.preventDefault(); // Prevent form submission
        							}
   								 });
						</script>



					</article>
				</div>
				<div id="section2" class="section-w3ls">
					<input type="radio" name="sections" id="option2">
					<label for="option2" class="icon-left-w3pvt"><span class="fa fa-trash-o" aria-hidden="true"></span>Delete Details</label>
					<article>
						<form action="php\delete_borrow.php" method="post">
							<h3 class="legend">Delete Here</h3>
							<div class="input">
								<span class="fa fa-id-badge" aria-hidden="true"></span>
								<input type="text" placeholder="borrowid" name="borrowid" required />
							</div>
							<button type="submit" class="btn submit" name="delete_btn">DELETE</button>
						</form>
					</article>
				</div>
						<?php
							// Assuming you already have a database connection
							$connection = mysqli_connect('localhost', 'root', '', 'database');

							// Check the connection
							if (!$connection) {
								die("Connection failed: " . mysqli_connect_error());
							}

							// Fetch records from the bookborrower table
							$query = "SELECT * FROM bookborrower";
							$result = mysqli_query($connection, $query);

							// Check if the query was successful
							if ($result) {
								// Fetch data and create an HTML table
								$table = '<table border="1">
											<tr>
												<th>Borrow ID</th>
												<th>Book ID</th>
												<th>Member ID</th>
												<th>Borrow Status</th>
												<th>Date Modified</th>
											</tr>';

								while ($row = mysqli_fetch_assoc($result)) {
									$table .= '<tr>
													<td>' . $row['borrow_id'] . '</td>
													<td>' . $row['book_id'] . '</td>
													<td>' . $row['member_id'] . '</td>
													<td>' . $row['borrow_status'] . '</td>
													<td>' . $row['borrower_date_modified'] . '</td>
												</tr>';
								}

								$table .= '</table>';
							} else {
								// Handle the case where the query fails
								$table = '<p>Error fetching data from the database.</p>';
							}

							mysqli_close($connection);
						?>

							<div id="section3" class="section-w3ls">
								<input type="radio" name="sections" id="option3">
								<label for="option3" class="icon-left-w3pvt">
									<span class="fa fa-book" aria-hidden="true"></span>Borrowed books Records
								</label>
								<article>
									<form method="post">
										<h3 class="legend last">Borrowed books Records</h3>
										<?php echo $table; ?>
									</form>
								</article>
							</div>



				<div id="section4" class="section-w3ls">
					<input type="radio" name="sections" id="option4">
					<label for="option4" class="icon-left-w3pvt"><span class="fa fa-book" aria-hidden="true"></span>Update books Records</label>
					<article>
						<form  method="post">
							<h3 class="legend">Add borrow details here</h3>
							
							<div class="input">
								<span class="fa fa-id-badge" aria-hidden="true"></span>
								<input type="text" placeholder="Borrow ID" name="borrowid" id="brid" required />
								<span class="error">* </span>  
   								 <br><br> 
							</div>
							<div class="input">
								<span class="fa fa-id-badge" aria-hidden="true"></span>
								<input type="text" placeholder="New Book ID" name="Bookid" id="bid" required />
								<span class="error">*</span>
							</div>
							<div class="input">
								<span class="fa fa-id-badge" aria-hidden="true"></span>
								<input type="text" placeholder="New Member ID" name="Memberid" id="mid" required />
								<span class="error">* </span>
							</div>
							<div>
								<select  name="Borrowstatus" id="Borrowstatus">
									<option value="borrowed">borrowed</option>
									<option value="available">available</option>
								  </select>
							</div>
							<button type="submit" class="btn submit">Update</button>
						</form>
					</article>
				</div>
				</div>
			</div>
			</div>
		</div>
</body>
</html>