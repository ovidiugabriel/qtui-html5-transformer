<?php

/**
 * Used to convert a QPushButton into a <input> HTML tag with type="button"
 * https://www.w3schools.com/tags/tag_input.asp
 */
class QPushButton {
    private $name;
    private $value;
    
    /** 
     * @param string $name
     * @param array $properties
     */
    public function __construct($name, array $properties) {
        $this->name = $name;
        $this->value = $properties[1]->string;
    }
    
    /** 
     * @return string
     */
    public function __toString() {
        return '<input type="button" id="'.$this->name.'" name="'.$this->name.'" value="'.$this->value.'" />' . "\n";
    }
}

// EOF
