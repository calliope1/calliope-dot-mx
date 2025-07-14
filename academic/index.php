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

<title>Academia</title>

<?php
include 'builder/header.php';
?>

</head>

<body id="body">

<header id="header">

<?php
$activePage = 'Main';
include 'builder/nav.php';
?>

</header>

<main id="main">

<p>
This is an academic webpage for me, Calliope Ryan-Smith.<br>
Articles are presented in reverse order by initial release.<br>
<i>Fun fact:</i> <a href="https://calliope.mx">calliope.mx</a> redirects to this page!<br>
</p>

<p>
  <b>Research interests:</b> the theory of forcing and symmetric extensions, the axiom of choice, cardinal characteristics, large cardinals, and intersections of model theory and set theory.
</p>

<p>
  While I strive to keep the data on this website accurate, this is not guaranteed.
</p>

<h2 id="section-papers">Papers</h2>

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

<h3>Other works</h3>

<ul>
	<li>
		A heavily abridged version of <i>Maximal &theta;-independent families from large cardinals</i> in one-page zine form is available <a href="/files/proper_classes_reader.pdf" target="_blank">here</a>.<br>
		For a printed version, print <a href="/files/proper_classes_print.pdf" target="_blank">this file</a>. Instructions for constructing the zine can be found at, say, <a href="https://mymodernmet.com/how-to-make-a-zine/">https://mymodernmet.com/how-to-make-a-zine/</a>.
	</li>
</ul>

<h2 id="section-links">Links</h2>

<ul>
	<li>
		My PhD student page at the University of Leeds can be found at <a href="https://eps.leeds.ac.uk/maths/pgr/9635/calliope-ryan-smith/">https://eps.leeds.ac.uk/maths/pgr/9635/calliope-ryan-smith/</a><br>
	</li>
	<li>
		My ORCID iD is <a href="https://orcid.org/0000-0003-2835-4268">0000-0003-2835-4268</a>.<br>
	</li>
	<li>
		My CV can be found <a href="files/cv" target="_blank">here</a>.
	</li>
	<li>
		My MathSciNet author ID is <a href="https://mathscinet.ams.org/mathscinet/author?authorId=1625058">1625058</a>.
	</li>
	<li>
		A list of talks can be found <a href="/talks">here</a>.
	</li>
	<li>
		A <code>.bib</code> file for my papers can be found <a href="/files/RyanSmith.bib" target="_blank">here</a>.
	</li>
</ul>

<h2 id="section-contact">Contact</h2>

<p>
	I can be contacted through my university email,<br>
	c.Ryan-Smith<span style="display: none; color: black">@fbi.com and so on and so forth</span>@leeds.ac.uk
</p>

<h2 id="section-aob">Any other business</h2>

<ul>
	<li>
		<a href="https://calliope.mx/minims">Minims calculator</a>. Put in the number of minims and this will spit out all of the possible combinations of letters that those minims could represent.
	</li>
	<li>
		<a href="https://mathoverflow.net/users/478588/calliope-ryan-smith">MathOverflow account</a>. Where I dwell on MathOverflow.
	</li>
	<li>
		<a href="https://en.wikipedia.org/wiki/Mx_(title)">Why .mx?</a>
	</li>
	<li>
		Set theory charades is <a href="charades">here</a> (work-in-progress).
	</li>
</ul>

</main>

<footer>

<button class="button buttonb" onclick='document.getElementById("body").style.backgroundColor = "black";document.getElementById("body").style.color = "white"'>Black background.</button>
<button class="button buttonw" onclick='document.getElementById("body").style.backgroundColor = "white";document.getElementById("body").style.color = "black"'>White background.</button>

</footer>

</body>
</html>

<?php
	$conn->close();
?>
