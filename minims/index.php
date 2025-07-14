<!DOCTYPE html>
<html>
<head>

<title>Minims calculator</title>

<!--
  Include header (mostly styles and favicons)
  At some point this will need to be changed to a local non-academic webpage
-->
<?php
    include '../academic/builder/header.php';
?>

</head>

<body id="body">

<header id="header">

<?php
include '../academic/builder/nav.php';
?>

</header>

<main id="main">

<script>
function minims(N) {

  if (N < 0) {
    return [];
  } else {
    if (N === 0) {
      return [""];
    } else {
      var listMinusOne = minims(N - 1);
      var listMinusTwo = minims(N - 2);
      var listMinusThree = minims(N - 3);
      var outList = []
      for (var i=0; i<listMinusOne.length; i++) {
        outList.push(listMinusOne[i] + "I")
      }
      for (var j=0; j<listMinusTwo.length; j++) {
        outList.push(listMinusTwo[j] + "U")
        outList.push(listMinusTwo[j] + "V")
        outList.push(listMinusTwo[j] + "N")
      }
      for (var k=0; k<listMinusThree.length; k++) {
        outList.push(listMinusThree[k] + "M")
      }
    return outList
    }
  }
}

function listSand(s,e,L) {
  var outList = []
  for (var i=0; i<L.length; i++) {
    outList.push("\n"+s.toUpperCase()+L[i]+e.toUpperCase())
  }
  return outList
}
</script>
<noscript>You'll need to enable JavaScript to use this webpage.</noscript>

<label for="preText">Text before:</label>
<input type="text" id="preText"><br>
<label for="valueN"># Minims:</label>
<input type="number" id="valueN"><br>
<label for="postText">Text after:</label>
<input type="text" id="postText"><br>

<button type="button"
onclick="document.getElementById('display').innerHTML = listSand(document.getElementById('preText').value,document.getElementById('postText').value,minims(document.getElementById('valueN').value))">
Generate answers.</button>

<p id="display"></p>

</main>

</body>
</html>
