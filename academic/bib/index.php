<?php
// Load database and return results
    // Load credentials and connect
    require_once __DIR__ . '/../config.php';
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Grab papers in reverse order of release
    $sql = "SELECT * FROM papers ORDER BY release_index DESC";
    $result = $conn->query($sql);

// bib-builder is some php functions that produce the bib output 
include '../builder/bib-builder.php';
?>

<!DOCTYPE html>

<html>
<head>

<base href="..">

<title>Bibliography</title>

<!-- Include header (mostly styles and favicons) -->
<?php
    include '../builder/header.php';
?>

<!-- At some point I want to implement copying some/all of the bib entries to clipboard -->
<script>
function sendToClipboard() {
  var copyText = document.getElementById("bibText");
  copyText.select();
  copyText.setSelectionRange(0,99999); // apparently this helps with mobile
  navigator.clipboard.writeText(copyText.value);
}
</script>

</head>

<body id="body">

<header id="header">

<?php
$activePage = '.bib';
include '../builder/nav.php';
?>

</header>

<main id="main">

<p>
  This is .bib code for my papers. A downloadable file version can be found <a href='files/RyanSmith.bib' target='_blank'>here</a> (opens in a new tab).<br>
  All these entries are automatically constructed from my database, please let me know if you find any errors.
</p>

<!-- This is where that copying infrastructure will go.
<p>
  Click this button to copy the entire .bib code: <button onclick="sendToClipboard()">Copy</button>
</p>
-->

<span id="bibText">
<code>
<?php
// Check if there are results
if ($result && $result->num_rows > 0) {
// Loop through each row and display in an ordered list item
while ($row = $result->fetch_assoc()) {
    echo bibEntry($row);
    echo "<br><br>\n\n";
}
} else {
echo "<li>No data found</li>";
}
?>
</code>
</span>

</main>

<footer>

<button class="button buttonb" onclick='document.getElementById("body").style.backgroundColor = "black";document.getElementById("body").style.color = "white"'>Black background.</button>
<button class="button buttonw" onclick='document.getElementById("body").style.backgroundColor = "white";document.getElementById("body").style.color = "black"'>White background.</button>

</footer>

</html>

<?php
$conn->close();
?>
