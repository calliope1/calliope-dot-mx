<?php

// To do: Add some type checking and other sanity checks to avoid nonsense

function tabulateBibEntry($entryName,$spaces,$entryData) {
    $tab = "&emsp;";
    return $tab . "\t" . $entryName . str_repeat("&nbsp;",$spaces) . "= {" . $entryData . "},<br>";
}

// Decodes the raw json $row['coauthor_json'] into an alphabetised list of SURNAME, FIRSTNAME (and) authors
function decodeCoauthors($authors) {
    if ($authors != null) {
    $authorsArray = json_decode($authors,true);
    // Add me
    $calliope = [
        'first' => 'Calliope',
        'last' => 'Ryan-Smith'
        ];
    $authorsArray[] = $calliope;

    usort($authorsArray, function($a,$b) {
        return strcmp($a['last'], $b['last']);
    });

    $outString = '';

    foreach ($authorsArray as $author) {
        $outString .= $author['last'] . ", " . $author['first'] . ' and ';
    }

    // Remove trailing " and "
    return substr($outString,0,-5);

    } else {
        return "Ryan-Smith, Calliope";
    }
}

// I mostly coded this on my phone at a conference, so it could definitely be optimised.
// I'll get around to doing that if I have to include more cases or when I get more papers.

function bibEntry($row) {
    $tab = "&emsp;";
    $title = $row['bib_title'];
    if ($title == '') {
        $title = $row['title'];
    }
    $author = decodeCoauthors($row['coauthor_json']);
    $publicationStage = $row['publication_stage'];
    $url = "arxiv.org/abs/" . $row['arxiv_prefix'] . "." . $row['arxiv_suffix'];
    $note = "";
    if ($publicationStage == 0) {
        $journal = "ar{X}iv";
        $fjournal = "ar{X}iv";
        $volume = $row['arxiv_prefix'] . "." . $row['arxiv_suffix'];
        $year = $row['year_released'];
    } else {
        $journal = $row['short_journal'];
        $fjournal = $row['full_journal'];
        $doi = $row['doi'];
        if ($publicationStage == 1) {
            $note = "In press. Preprint available on ar{X}iv";
            $year = $row['year_accepted'];
        } elseif ($publicationStage == 2) {
            $note = "Online-first";
            $year = $row['year_published'];
        } elseif ($publicationStage == 3) {
            $volume = $row['volume'];
            $year = $row['year_published'];
            $number = $row['number'];
            $pages = $row['pages_start'] . "--" . $row['pages_end'];
        } else {
            return "Error in entry " . $row['title'];
        }
    }
    $entryUniversal = "@article{RS"
        . $row['release_index'] . "-"
        . max($row['year_released'],$row['year_accepted'],$row['year_published']) . ",<br>"
        . tabulateBibEntry("title",4,$title)
        . tabulateBibEntry("author",3,$author)
        . tabulateBibEntry("journal",2,$journal)
        . tabulateBibEntry("fjournal",1,$fjournal)
        . tabulateBibEntry("year",5,$year);
    if ($publicationStage == 0) {
        $entryFinal = $entryUniversal . tabulateBibEntry("volume",3,$volume)
            . tabulateBibEntry("url",6,$url);
    } elseif ($publicationStage == 1) {
        $entryFinal = $entryUniversal . tabulateBibEntry("note",5,$note)
            . tabulateBibEntry("url",6,$url);
    } elseif ($publicationStage == 2) {
        $entryFinal = $entryUniversal . tabulateBibEntry("note",5,$note)
            . tabulateBibEntry("doi",6,$doi);
    } elseif ($publicationStage == 3) {
        $entryFinal = $entryUniversal . tabulateBibEntry("volume",3,$volume)
            . tabulateBibEntry("number",3,$number)
            . tabulateBibEntry("pages",4,$pages)
            . tabulateBibEntry("doi",6,$doi);
    } else {
        return "Error with entry " . $title . "!";
    }
    return substr($entryFinal,0,-5) . "<br>\n}";
}
?>
