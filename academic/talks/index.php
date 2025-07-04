<?php
// Load DB credentials
require_once __DIR__ . '/../config.php'; // Adjust path if config.php is elsewhere

// Connect to the database
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the 'talks' table to get the relevant columns (Name, Location, Country, Date)
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
<html>
<head>

<base href="..">

<title>Talks</title>
<link rel="apple-touch-icon" sizes="180x180" href="files/icons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="files/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="files/icons/favicon-16x16.png">
<link rel="manifest" href="site.webmanifest">
<link rel="stylesheet" type="text/css" href="css/styles/main.css">

<meta name="viewport" content="width=device width, initial-scale=1">

</head>

<body id="body">

<header id="header">

<div class="header">

	<a href="" class="logo">Calliope Ryan-Smith</a>

	<div class="header-right-nopad">
		<a href="https://www.srcf.net/"><img src="https://www.srcf.net/images/poweredby-dark.svg" alt="Powered by the Student-Run Computing Facility (SRCF)"></a>
	</div>

	<div class="header-right">
		<a href="files/cv.pdf" target="_blank">CV</a>
		<a href="index.html#section-papers">Papers</a>
		<a href="talks" class="active">Talks</a>
		<a href="files/RyanSmith.bib" target="_blank"><code>.bib</code></a>
		<a href="index.html#section-links">Links</a>
		<a href="index.html#section-contact">Contact</a>
		<a href="index.html#section-aob">AOB</a>
	</div>

</div>

</header>

<main id="main">

This is an (incomplete) list of talks that I have given at seminars and conferences. Unfortunately, I did not keep records well early in my career, so some entries from before April 2025 may be inaccurate (or entirely missing).

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

	echo "\t<li>\n";
	echo "\t\t<b>" . html_entity_decode($row['Title']) . "</b>.\n";
	echo "\t\t<i>" . html_entity_decode($row['Event']) . "</i>,\n";
	echo "\t\t" . html_entity_decode($row['Location']) . ", ";
	echo html_entity_decode($row['Country']) . ",\n";
//	echo "<strong>Date:</strong> " . htmlspecialchars($row['Date']) . "\n";
	echo "\t\t" . html_entity_decode($dateFormatted) . ".\n";
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
