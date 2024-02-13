function confirmLogout() {
  var confirmation = confirm("Are you sure you want to logout?");
  if (confirmation) {
    // Redirect to the logout page or perform logout actions
    window.location.href = "logout.php";
  }
}