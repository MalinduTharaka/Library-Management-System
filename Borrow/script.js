function addRow() {
    var tableBody = document.getElementById("userTableBody");
    var newRow = tableBody.insertRow(tableBody.rows.length);

    var nameCell = newRow.insertCell(0);
    var emailCell = newRow.insertCell(1);

    nameCell.innerHTML = '<input type="text" name="name[]" required>';
    emailCell.innerHTML = '<input type="email" name="email[]" required>';
  }
  