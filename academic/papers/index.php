<?php
// Load database and return results
    // Load credentials and connect
    require_once __DIR__ . '/../config.php';
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Grab the papers by reverse order of release
    $sql = "SELECT * FROM papers ORDER BY release_index DESC";
    $result = $conn->query($sql);

// papers-presentation is some long php functions that presents the papers how I like
include '../builder/papers-presentation.php';

?>

<!DOCTYPE html>

<html lang="en">
<head>

<base href="..">

<title>Papers</title>

<?php
include '../builder/header.php';
?>
</head>

<body id="body">

<header id="header">

<?php
$activePage = 'Papers';
include '../builder/nav.php';
?>

</header>

<main id="main">

<p>
	This is a list of my papers and preprints, listed in reverse order of initial completion.
</p>

<ol reversed="">
<?php
// Check if there are results
if ($result && $result->num_rows > 0) {
// Loop through each row and display in an ordered list item
while ($row = $result->fetch_assoc()) {

    echo "\t<li>\n";

    $publicationStage = $row['publication_stage'];

    if ($publicationStage == 0) {
        echo preprintListItem($row);
    } else {
        echo inPressListItem($row);
    }

    echo "\n\t</li>\n";

}
} else {
echo "<li>No data found</li>";
}
?>

</ol>

</main>

<footer>

<button class="button buttonb" onclick='document.getElementById("body").style.backgroundColor = "black";document.getElementById("body").style.color = "white"'>Black background.</button>
<button class="button buttonw" onclick='document.getElementById("body").style.backgroundColor = "white";document.getElementById("body").style.color = "black"'>White background.</button>

</footer>

</html>

<?php
$conn->close();
?>
