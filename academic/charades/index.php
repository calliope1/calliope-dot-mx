<!DOCTYPE html>

<html lang="en">

<head>
  <!--Load header (styles, favicon, meta, etc.)-->
  <?php include "../builder/header.php" ?>
  <title>Set-theoretic charades</title>
</head>

<header id="header">
  <!--Load navigation bar-->
  <?php include "../builder/nav.php" ?>
</header>

<body id="body">
<main id="main">

<h1>Set-theoretic charades</h1>

  <p>Press the button below to show a random entry from the index of <i>Set Theory</i> by Jech. This includes sub-headings.</p>
  <p>The data for this was produced and cleaned with a mixture of human and machine effort and is still un-finished (there are 1803 entries at time of writing). Some results may be wrong or confusing.</p>

  <button onclick="showRandomLine()">Roll the dice</button>
  <p id="output"></p>

  <script>
    let lines = [];

    fetch('charades/lines.txt')
    .then(response => {
      if (!response.ok) throw new Error('Failed to load text file.');
      return response.text();
    })
    .then(text => {
      lines = text.split(/\r?\n/).filter(line => line.trim() !== '');
    })
    .catch(error => {
      console.error('Error loading file:', error);
      document.getElementById('output').textContent = 'Failed to load text file.';
    });

    function showRandomLine() {
      if (lines.length === 0) {
      document.getElementById('output').textContent = 'Text file not loaded yet.';
        return;
      // 'else' here not strictly necessary due to the return on previous line
      } else {
        const randomIndex = Math.floor(Math.random() * lines.length);
        document.getElementById('output').textContent = lines[randomIndex];
      }
    }
  </script>

</main>
</body>

</html>
