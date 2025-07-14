<?php
// Function defining what paper entries look like

function arxivDisplay($row) {
    $arxivIdentifier = $row['arxiv_prefix'] . '.' . $row['arxiv_suffix'];
    return "<a href='https://arxiv.org/abs/"
        . $arxivIdentifier . "'>arXiv:"
        . $arxivIdentifier . "</a> (<a href='files/papers/"
        . $arxivIdentifier . ".pdf' target='_blank'>pdf</a>).";
}

function preprintListItem($row) {
    $rowTitle = html_entity_decode($row['title']);
    $coauthors = html_entity_decode($row['coauthors']);
    $yearReleased = $row['year_released'];
    $titlePresentation = '<b>' . $rowTitle . '</b>.';
    if ($coauthors != '') {
        $authorsPresentation = '(with ' . $coauthors . ')' . "<br>\n\t\t";
    } else {
        $authorsPresentation = '';
    }
    return "\t\t" . $titlePresentation
        . "<br>\n\t\t" . $authorsPresentation
        . $yearReleased . ".\n\t\t"
        . arxivDisplay($row);
}

function inPressListItem($row) {
    $rowTitle = html_entity_decode($row['title']);
    $journal = html_entity_decode($row['short_journal']);
    $rowDoi = html_entity_decode($row['doi']);
    $rowIndex = $row['release_index'];
    $coauthors = html_entity_decode($row['coauthors']);
    $publicationStage = $row['publication_stage'];

    $titlePresentation = '<b>' . $rowTitle . '</b>';
    if (preg_match("/[!?,]/", $rowTitle) == 0) {
        $titlePresentation .= ".";
    }
    $journalPresentation = '<i>' . $journal . '</i>';
    if ($rowDoi != '') {
        $doiPresentation = "<a href='https://doi.org/"
            . $rowDoi
            . "'>doi.org/"
            . $rowDoi . "</a>";
    } else {
        $doiPresentation = '<span class=no-doi>No doi yet</span>';
    }
    $filePresentation = "(<a href='files/papers/RS"
        . html_entity_decode($rowIndex)
        . ".pdf' target='_blank'>pdf</a>).";
    $arxivPresentation = arxivDisplay($row);

    if ($coauthors != '') {
        $authorsPresentation = '(with ' . $coauthors . ') ';
    } else {
        $authorsPresentation = '';
    }

    if ($publicationStage == 1) {
        return "\t\t" . $titlePresentation
            . "<br>\n\t\t" . $authorsPresentation
            . "In press (" . $row['year_accepted']
            . "). " . $journalPresentation
            . "<br>\n\t\t" . arxivDisplay($row);
    } elseif ($publicationStage == 2) {
        return "\t\t" . $titlePresentation
            . "<br>\n\t\t" . $authorsPresentation . $journalPresentation
            . " Online-first version (" . $row['year_published']
            . ").<br>\n\t\t" . $doiPresentation
            . " " . $filePresentation
            . "<br>\n\t\t" . $arxivPresentation;
    } elseif ($publicationStage == 3) {
        $mrNumber = $row['MR_number'];
        if ($mrNumber != 0) {
            $mrPresentation = "\n\t\t"
                . "<a href='https://mathscinet.ams.org/mathscinet-getitem?mr="
                . $mrNumber . "'>MR"
                . $mrNumber . "</a>.";
        } else {
            $mrPresentation = "";
        }
        return "\t\t" . $titlePresentation
            . "<br>\n\t\t" . $authorsPresentation
            . " " . $journalPresentation
            . " <b>" . $row['volume'] . "</b>"
            . " (" . $row['year_published'] . "),"
            . " no. " . $row['number'] . ", "
            . $row['pages_start'] . "&ndash;"
            . $row['pages_end'] . "."
            . "<br>\n\t\t" . $doiPresentation
            . " " . $filePresentation
            . "<br>\n\t\t" . $arxivPresentation
            . $mrPresentation;
    } else {
        return "Error in database for entry " . $row['title'] . ". Please let me know if you spot this message!";
    }
}
?>
