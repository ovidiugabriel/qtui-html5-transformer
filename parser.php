<?php

require_once 'QPushButton.php';

$xml = simplexml_load_file('dialog.ui');  // my test file for now

$main_keys = array_keys((array) $xml);

$a = (array) $xml->widget;
foreach ($a['widget'] as $element) {
    $element = (array) $element;

    $type = $element['@attributes']['class'];
    $object = new $type($element['@attributes']['name'], $element['property']);

    echo (string) $object;
}
