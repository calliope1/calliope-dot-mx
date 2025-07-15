<?php

// To do: Add some type checking and other sanity checks to avoid nonsense

function tabulateBibEntry($entryName,$spaces,$entryData) {
    $tab = "&emsp;";
    return "{$tab}\t{$entryName}" . str_repeat("&nbsp;", $spaces) . "= {{$entryData}},<br>\n";
}

// Decodes the raw json $row['coauthor_json'] into an alphabetised list of SURNAME, FIRSTNAME (and) authors
function decodeCoauthors($authors) {
    if ($authors != null) {
    $authorsArray = json_decode($authors,true);
    // Add me
    $calliope = [
        "first" => "Calliope",
        "last" => "Ryan-Smith"
        ];
    $authorsArray[] = $calliope;

    usort($authorsArray, function($a,$b) {
        return strcmp($a['last'], $b['last']);
    });

    $outString = '';

    foreach ($authorsArray as $author) {
        $outString .= "{$author['last']}, {$author['first']} and ";
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
    $title = $row['bib_title'];
    if ($title == '') {
        $title = $row['title'];
    }
    $author = decodeCoauthors($row['coauthor_json']);
    $publicationStage = $row['publication_stage'];
    $arxivNumber = "{$row['arxiv_prefix']}.{$row['arxiv_suffix']}";
    $url = "arxiv.org/abs/{$arxivNumber}";
    $note = '';
    $journal = $row['short_journal'];
    $fjournal = $row['full_journal'];
    $doi = $row['doi'];
    switch ($publicationStage) {
        case 0:
            $journal = "ar{X}iv";
            $fjournal = "ar{X}iv";
            $volume = $arxivNumber;
            $year = $row['year_released'];
            break;
        case 1:
            $note = "In press. Preprint available on ar{X}iv";
            $year = $row['year_accepted'];
            break;
        case 2:
            $note = "Online-first";
            $year = $row['year_published'];
            break;
        case 3:
            $volume = $row['volume'];
            $year = $row['year_published'];
            $number = $row['number'];
            $pages = $row['pages_start'] . "--" . $row['pages_end'];
            break;
        default:
            return "Error in entry " . $row['title'];
            break;
    }
    $entryUniversal = "@article{RS"
        . $row['release_index'] . "-"
        . max($row['year_released'],$row['year_accepted'],$row['year_published']) . ",<br>\n"
        . tabulateBibEntry("title",4,$title)
        . tabulateBibEntry("author",3,$author)
        . tabulateBibEntry("journal",2,$journal)
        . tabulateBibEntry("fjournal",1,$fjournal)
        . tabulateBibEntry("year",5,$year);
    switch ($publicationStage) {
        case 0:
            $entryFinal = $entryUniversal
                . tabulateBibEntry("volume", 3, $volume)
                . tabulateBibEntry("url", 6, $url);
            break;
        case 1:
            $entryFinal = $entryUniversal
                . tabulateBibEntry("note",5,$note)
                . tabulateBibEntry("url",6,$url);
            break;
        case 2:
            $entryFinal = $entryUniversal
                . tabulateBibEntry("note",5,$note)
                . tabulateBibEntry("doi",6,$doi);
            break;
        case 3:
            $entryFinal = $entryUniversal
                . tabulateBibEntry("volume",3,$volume)
                . tabulateBibEntry("number",3,$number)
                . tabulateBibEntry("pages",4,$pages)
                . tabulateBibEntry("doi",6,$doi);
            break;
        default:
            return "Error with entry " . $title . "!";
            break;
    }

    return substr($entryFinal,0,-5) . "<br>\n}";
}
?>
