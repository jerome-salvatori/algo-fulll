<?php

include 'fizzbuzz.php';
include 'template/TemplateBuilder.php';

if (empty($_GET)) {
    $bodyMainContent = file_get_contents('template/form_template.html');
} else {
    $bodyMainContent = "";

    try {
        foreach (fizzbuzz((int) $_GET["N"]) as $fbLine) {
            $bodyMainContent .= $fbLine;
        }
    } catch (InvalidArgumentException $e) {
        $bodyMainContent = '<p class="error">'.$e->getMessage().'</p>';
    }
}

$templateBuilder = new TemplateBuilder($bodyMainContent);
$templateBuilder->displayWhole();