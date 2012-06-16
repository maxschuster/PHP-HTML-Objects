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

namespace de\maxschuster\htmlhaamr;
use de\maxschuster\htmlhaamr\exception\HtmlHaamrExeption;

/**
 * This class has no Description...
 * @author Max Schuster 
 * @package htmlhaamr
 */
class Attribute {
    const QUOTESTYLE_SINGLE = 0;
    const QUOTESTYLE_DOUBLE = 1;
    
    /**
     * Name of the Attribute
     * @var string
     */
    protected $name;
    
    /**
     * Attributes value
     * @var string 
     */
    protected $value;
    
    /**
     * Attributes quote style
     * @var string
     */
    protected $quoteStyle;

    public function __construct($name, $value, $quoteStyle = self::QUOTESTYLE_DOUBLE) {
        $this->name = &$name;
        $this->value = $this->htmlentities($value);
        $this->setQuoteStyle($quoteStyle);
    }
    public function setQuoteStyle($quoteStyle) {
        if ($quoteStyle == self::QUOTESTYLE_DOUBLE) {
            $this->quoteStyle = '"';
            return;
        }
        if ($quoteStyle == self::QUOTESTYLE_SINGLE) {
            $this->quoteStyle = '\'';
            return;
        }
        throw new HtmlHaamrExeption('Unknown quotesyle! ('.$quoteStyle.')');
    }

    protected function htmlentities($string) {
        return htmlentities($string, ENT_COMPAT, 'UTF-8');
    }

    public function __toString() {
        return sprintf('%s=%s%s%s', $this->name, $this->quoteStyle, $this->value, $this->quoteStyle);
    }

    public function getName() {
        return $this->name;
    }

    public function getValue() {
        return $this->value;
    }

}

?>