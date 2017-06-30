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
