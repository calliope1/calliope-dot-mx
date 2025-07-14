<?php
// Load database and return results
    // Load credentials and connect
    require_once __DIR__ . '/../config.php'; // Adjust path if config.php is elsewhere
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// Grab relevant columns from talks table in reverse order of release
$sql = "SELECT Title, Event, Location, Country, Date FROM talks ORDER BY Date DESC";
$result = $conn->query($sql);

// Function to add ordinal suffix to the day
function getOrdinalSuffix($day) {
    if ($day >= 11 && $day <= 13) {
        return $day . 'th';
    }
    switch ($day % 10) {
        case 1:  return $day . 'st';
        case 2:  return $day . 'nd';
        case 3:  return $day . 'rd';
        default: return $day . 'th';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<base href="..">

<title>Talks</title>

<?php
include '../builder/header.php';
?>
</head>

<body id="body">

<header id="header">

<?php
$activePage = 'Talks';
include '../builder/nav.php';
?>
</header>

<main id="main">

This is a list of talks that I have given at seminars and conferences. Unfortunately, I did not keep records well early in my career, so some entries from before April 2025 may be inaccurate (or entirely missing).

<ol reversed="">
<?php
// Check if there are results
if ($result && $result->num_rows > 0) {
// Loop through each row and display in an ordered list item
while ($row = $result->fetch_assoc()) {
    $date = new DateTime($row['Date']);
    $day = $date->format('d');
    $dayTrim = ltrim($day, '0');
    $dayFancy = getOrdinalSuffix($dayTrim);
    $dateFormatted = $dayFancy . ' ' . $date->format('F Y');

    // Lots of html_entity_decodes here because the database entries are coded in html itself
    echo "\t<li>\n";
    echo "\t\t<b>" . html_entity_decode($row['Title']) . "</b>.\n";
    echo "\t\t<i>" . html_entity_decode($row['Event']) . "</i>,\n";
    echo "\t\t" . html_entity_decode($row['Location']) . ", ";
    echo html_entity_decode($row['Country']) . ",\n";
    echo "\t\t" . $dateFormatted . ".\n";
    echo "\t</li>\n";
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
