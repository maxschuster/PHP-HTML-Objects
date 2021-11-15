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
use eu\maxschuster\pho\exception\EmptyValueException;

/**
 * Collects StyleDefinitions
 *
 * @author Max Schuster
 * @package pho
 */
class StyleCollection {
    /**
     * Collecton of styles
     * @var StyleDefinition[string]
     */
    protected $styles = array();
    
    /**
     * @return string
     */
    public function __toString() {
        return implode(' ', $this->styles);
    }
    
    /**
     * Sets a style
     * @param string|StyleDefinition $style
     * Name of the style or a Style object
     * @param string $value
     * The styles value. Ignored if $style
     * is instance of StyleDefinition
     */
    public function setStyle($style, $value = false) {
        if (empty($style)) {
            throw new EmptyValueException('$style must not be empty!');
        }
        if ($style instanceof Style) {
            $this->styles[$style->getName()] = $style;
            return;
        }
        if (empty($value)) {
            throw new EmptyValueException('If $style is no instance of StyleDefinition $value must not be empty!');
        }
        $this->styles[$style] = new StyleDefinition($style, $value);
    }
}

?>
