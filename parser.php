<?php

class QPushButton {
    private $name;
    private $value;

    public function __construct($name, $properties) {
        $this->name = $name;
        $this->value = $properties[1]->string;
    }

    public function __toString() {
        return '<input type="button" id="'.$this->name.'" name="'.$this->name.'" value="'.$this->value.'" />' . "\n";
    }
}

$xml = simplexml_load_file('dialog.ui');  // my test file for now

$main_keys = array_keys((array) $xml);

$a = (array) $xml->widget;
foreach ($a['widget'] as $element) {
    $element = (array) $element;

    $type = $element['@attributes']['class'];
    $object = new $type($element['@attributes']['name'], $element['property']);

    echo (string) $object;
}
