<!DOCTYPE html>

<html lang="en">

<head>

<title>Curriculum vitae</title>

<!-- Load header (styles, favicon, meta, etc.) -->
<?php
include '../builder/header.php';
?>

  <style>
    main {
      font-family: sans-serif;
      line-height: 1.6;
      color: #333;
      max-width: 900px;
      margin: 40px auto;
      padding: 20px;
    }
    h1, h2, h3 {
      color: #2c3e50;
      border-bottom: 2px solid #ecf0f1;
      padding-bottom: 10px;
    }
    h1 {
      text-align: center;
      border-bottom: none;
    }
    .smallcaps {
      font-variant: small-caps;
    }
    .contact-info {
      text-align: center;
      margin-bottom: 30px;
    }
    .contact-info p {
      margin: 5px 0;
    }
    .section {
      margin-bottom: 30px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }
    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    ul {
      list-style-type: disc;
      padding-left: 20px;
    }
    li {
      margin-bottom: 10px;
    }
    .two-column {
      display: grid;
      grid-template-columns: 1fr 2fr;
      gap: 20px;
    }
    .teaching-list ul {
      padding-left: 40px;
    }
  </style>

</head>

<body>

<header id="header">

<!-- Load navigation bar -->
<?php
    $activePage = 'CV';
    include '../builder/nav.php'
?>

</header>

<main id="main">

<div>
  <p style="font-size:24px;margin-top:0px;text-align:center">
    PDF CV is found <a href="files/cv.pdf" target="_blank">here</a>.
  </p>

<div class="contact-info">
  <p>
    School of Mathematics, University of Leeds, LS2 9JT, United Kingdom
  </p>

  <p>
    Email: <a href="mailto:c.Ryan-Smith@leeds.ac.uk">c.Ryan-Smith@leeds.ac.uk</a>
    |
    Website: <a href="https://calliope.mx">calliope.mx</a>
    |
    ORCID: <a href="https://orcid.org/0000-0003-2835-4268">0000-0003-2835-4268</a>
  </p>
</div>

<div id="education" class="section">
  <h2>Education</h2>
  <table>
    <tbody>
      <tr>
        <td>
          Oct. 2021&ndash;Present
        </td>
        <td>
          Ph.D. Mathematics (in progress)
        </td>
        <td>
          University of Leeds
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <em>Supervised by Dr Asaf Karagila, Dr Andrew Brooke-Taylor and Dr Vincenzo Mantova</em>
        </td>
      </tr>
      <tr>
        <td>
          Oct. 2020&ndash;Jun. 2021
        </td>
        <td>
          Master of Mathematics, Mathematics
        </td>
        <td>
          University of Cambridge
        </td>
      </tr>
      <tr>
        <td>
          Oct. 2017&ndash;Jun. 2020
        </td>
        <td>
          Bachelor of Arts, Mathematics
        </td>
        <td>
          University of Cambridge
        </td>
      </tr>
    </tbody>
  </table>
</div>

<div id="funding" class="section">
  <h2>Funding</h2>
  <ul>
    <li>
      <strong>2021&ndash;Present:</strong> EPSRC Mathematical Sciences Doctoral Training Partnership [EP/W523860/1], University of Leeds
    </li>
    <li>
      <strong>2019:</strong> Summer Research in Maths, University of Cambridge
    </li>
    <li>
      <strong>2018:</strong> Summer Research Program, King's College, University of Cambridge
    </li>
  </ul>
</div>

<div id="research-interests" class="section">
  <h2>Research interests</h2>
  <ul>
    <li>
      <strong>Mathematical logic:</strong> Intersections of model theory and set theory.
    </li>
    <li>
      <strong>Set theory:</strong> Cardinal characteristics, the theory of forcing and symmetric extensions, large cardinals, the axiom of choice.
    </li>
    <li>
      <strong>Model theory:</strong> Classification theory, abstract elementary classes, the independence property, homogeneous structures, permutation groups.
    </li>
  </ul>
</div>

<div id="publications" class="section">
  <h2>Publications</h2>
    <ul>
      <li>
        Local reflections of choice, in press (online-first available),
        Acta Math. Hung. (2025) <span class="smallcaps">doi</span>:<a href="https://doi.org/10.1007/s10474-025-01533-3">10.1007/s10474-025-01533-3</a>.
      </li>
      <li>
        The Hartogs&ndash;Lindenbaum spectrum of symmetric extensions,
        Math. Log. Quart. (2024) <span class="smallcaps">doi</span>:<a href="https://doi.org/10.1002/malq.202300047">10.1002/malq.202300047</a>.
      </li>
      <li>
        Which pairs of cardinals can be Hartogs and Lindenbaum numbers of a set? (with A. Karagila),
        Fund. Math. (2024) DOI:<a href="https://doi.org/10.4064/fm231006-14-8">10.4064/fm231006-14-8</a>.
      </li>
      <li>
        Stratifiable formulae are not context-free, in press,
        Notre Dame J. Form. Log. (2023) arXiv:<a href="https://arxiv.org/abs/2304.10291">2304.10291</a>.
      </li>
    </ul>
</div>

<div id="preprints" class="section">
  <h2>Preprints</h2>
  <ul>
    <li>
    Eccentricity, extendable choice and descending distributive forcing,
    arXiv:<a href="https://arxiv.org/abs/2506.11607">2506.11607</a>.
    </li>
    <li>
      Proper classes of maximal &theta;-independent families from large cardinals,
      arXiv:<a href="https://arxiv.org/abs/2408.10137">2408.10137</a>.
    </li>
    <li>
      Upwards homogeneity in iterated symmetric extensions
      (with J. Schilhan and Y. Wei),
      arXiv:<a href="https://arxiv.org/abs/2405.08639">2405.08639</a>.
    </li>
    <li>
      String dimension: VC dimension for infinite shattering,
      arXiv:<a href="https://arxiv.org/abs/2402.18250">2402.18250</a>.
    </li>
  </ul>
</div>

<div id="review-work" class="section">
  <h2>Review work</h2>
  <p>
    Fundamenta Mathematicae, Pacific Journal of Mathematics.
  </p>
</div>

<div id="talks" class="section">
  <h2> Seminars and conferences</h2>
  <p>See my <a href="/talks">talks page</a> for a full list of my talks.</p>
  <h3>Invited talks (external)</h3>
  <ul>
    <li>
      S&eacute;minaire G&eacute;n&eacute;ral de Logique,
      Sep. 2024,
      IMJ-PRG, Paris, France
    </li>
    <li>
      Logic Seminar,
      Feb. 2025,
      University of Manchester, Manchester, UK
    </li>
  </ul>
  
  <h3>Invited talks (internal)</h3>
  <ul>
    <li>
      Meeting Group of Model Theorists (Feb. 2022)
    </li>
    <li>
      Postgraduate Logic Seminar (eight talks 2022&ndash;25)
    </li>
    <li>
      Postgraduate Pure Seminar (Oct. 2022, Feb. 2024 and Oct. 2024)
    </li>
    <li>
      Sets Seminar (four talks 2024&ndash;25)
    </li>
    <li>
      Models and Sets Seminar (Oct. 2022 and Nov. 2023)
    </li>
    <li>
      Logic Seminar (Feb. 2025)
    </li>
  </ul>
</div>

<div id="contributed-talks" class="section">
  <h3>Select contributed talks</h3>
  <ul>
    <li>
      British Logic Colloquium, 2024, University of Birmingham, UK
    </li>
    <li>
      Winter School in Abstract Analysis, 2024 and 2025, Hejnice, Czech Republic
    </li>
    <li>
      Generalised Baire Spaces and Large Cardinals Workshop, 2024, Bristol, UK
    </li>
    <li>
      120 Years of Choice Conference, 2024, Leeds, UK (poster contribution)
    </li>
    <li>
      Postgraduate Researcher Conference 2022, 2023 and 2024, University of Leeds, UK
    </li>
    <li>
      Set Theory in the United Kingdom 9 and 12-14, 2023&ndash;24, various universities, UK
    </li>
    <li>
      Set Theory in the United Kingdom 16, 2025, University of Leeds, UK
    </li>
    <li>
      Postgraduate Researcher Conference 2025, University of Leeds, UK
    </li>
    <li>
      Logic Colloquium 2025, TU Wien, Austria
    </li>
  </ul>
</div>

<div id="organisation" class="section">
  <h2>Conference and seminar organisation</h2>
  <ul>
    <li>
      ArXiv Café, main organiser
      (weekly meeting of logicians, attendees select a paper uploaded to arXiv in the past week and give a brief overview of the work).
    </li>
    <li>
      Inner Model Theory, joint main organiser
      (weekly reading group).
    </li>
    <li>
      Postgraduate Research Conference 2022, organiser
      (conference for all mathematics Ph.D students at the University of Leeds to speak on their research to a general mathematical audience).
    </li>
    <li>
      British Postgraduate Model Theory Conference 2023, organiser
      (international conference for Ph.D students researching model theory to give talks, with additional tutorials by senior researchers).
    </li>
  </ul>
</div>

<div id="teaching" class="section">
  <h2>Teaching experience</h2>
  <p>
    <em>All at the University of Leeds. "2022" means "2022&ndash;23 academic year".</em>
  </p>
  <div class="two-column">
    <div>
      <h3>Workshop leader</h3>
      <ul>
        <li>
          <strong>2021-22:</strong>
          Discrete Mathematics (Course for 2nd year undergraduates)
        </li>
        <li>
          <strong>2022:</strong>
          Coding Theory (2nd year)
        </li>
        <li>
          <strong>2022&ndash;24:</strong>
          Logic (2nd year)
        </li>
        <li>
          <strong>2023:</strong>
          Introduction to Geometry (1st year)
        </li>
        <li>
          <strong>2023:</strong>
          Sets, Sequences and Series (1st year)
        </li>
        <li>
          <strong>2024:</strong>
          Core Mathematics (1st year)
        </li>
        <li>
          <strong>2024:</strong>
          Real Analysis (1st year)
        </li>
      </ul>
    </div>
    <div>
      <h3>Marking</h3>
      <ul>
        <li>
          <strong>2021&ndash;22:</strong>
          Discrete Mathematics (2nd year)
        </li>
        <li>
          <strong>2021&ndash;22:</strong>
          Combinatorics (3rd year)
        </li>
        <li>
          <strong>2022:</strong>
          Elementary Differential Calculus (Foundation year)
        </li>
        <li>
          <strong>2022:</strong>
          Coding Theory (3rd year)
        </li>
        <li>
          <strong>2022-24:</strong>
          Logic (2nd year)
        </li>
        <li>
          <strong>2022, 2024:</strong>
          Core Mathematics (1st year)
        </li>
        <li>
          <strong>2023:</strong>
          Real Analysis (2nd year)
        </li>
        <li>
          <strong>2023:</strong>
          Number Systems (1st year)
        </li>
        <li>
          <strong>2023:</strong>
          Introduction to Markov Processes (2nd year)
        </li>
        <li>
          <strong>2024:</strong>
          Real Analysis (1st year)
        </li>
        <li>
          <strong>2024:</strong>
          Rings and Polynomials (2nd year)
        </li>
      </ul>
    </div>
  </div>
</div>

</main>

</body>

</html>
