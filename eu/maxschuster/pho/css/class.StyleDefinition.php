<?php

/*
 * Copyright 2012 Max Schuster 
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace eu\maxschuster\pho\css;

/**
 * Description of Style
 *
 * @author Max
 * @package pho
 */
class StyleDefinition {
    /**
     * Name of the style
     * @var string 
     */
    protected $name;
    
    /**
     * Value of the style
     * @var string 
     */
    protected $value;
    
    /**
     * Constructor
     * @param string $name Style name
     * @param string $value Style value
     */
    function __construct($name, $value) {
        $this->name = $name;
        $this->value = $value;
    }
    
    /**
     * Style name
     * @return string
     */
    public function getName() {
        return $this->name;
    }
    
    /**
     * Sets the style name
     * @param string $name Style name
     */
    public function setName($name) {
        $this->name = $name;
    }
    
    /**
     * Style value
     * @return type
     */
    public function getValue() {
        return $this->value;
    }
    
    /**
     * Sets the style value
     * @param string $value Style value
     */
    public function setValue($value) {
        $this->value = $value;
    }
    
    /**
     * @return string
     */
    public function __toString() {
        return sprintf('%s: %s;', $this->getName(), $this->getValue());
    }
}

?>
