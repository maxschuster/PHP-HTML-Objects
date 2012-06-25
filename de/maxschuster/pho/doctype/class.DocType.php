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

namespace de\maxschuster\pho\doctype;

/**
 * Baseclass for doctypes
 * @author Max Schuster 
 * @package pho
 * @abstract
 */
abstract class DocType {
    /**
     * Defines if doctype and xml prefix should be switched
     * @var boolean
     */
    protected $doctypeSwitch = false;
    
    /**
     * The doctype text
     * @var string
     */
    protected $doctype = '';
    
    /**
     * Defines if the xml prefix should be used
     * @var boolean
     */
    protected $useXmlPrefix = false;
    
    /**
     * XML prefix
     * @var string
     */
    protected $xmlPrefix = '<?xml version="1.0" standalone="yes"%s ?>';
    
    /**
     * Encoding
     * @var string
     */
    protected $encoding = '';
    
    /**
     * Defines if self closing tags must be closed with a slash
     * @var boolean
     */
    protected $closeTagsWithSlash = true;
    
    /**
     * Sets encoding
     * @param string $encoding Encoding
     */
    public function setEncoding($encoding) {
        $this->encoding = $encoding;
    }
    
    /**
     * Returns true if SelfClosingElements should be closed with a slash
     * @return boolean
     */
    public function getCloseTagsWithSlash() {
        return $this->closeTagsWithSlash;
    }
    
    /**
     * Returns the xml prefix with encoding
     * @return string
     */
    protected function getXmlPrefix() {
        $encoding = $this->encoding ? 'encoding="'.$this->encoding.'"' : '';
        return sprintf($this->xmlPrefix, $encoding);
    }
    
    /**
     * Sets doctype switch activation
     * @param boolean $val
     */
    public function useDoctypeSwitch($val = true) {
        $this->doctypeSwitch = $val;
    }
    
    /**
     * @return string
     */
    public function __toString() {
        return
                ($this->doctypeSwitch || !$this->useXmlPrefix ? "" : $this->getXmlPrefix() . "\n") .
                $this->doctype .
                ($this->doctypeSwitch && $this->useXmlPrefix ? "\n" . $this->getXmlPrefix() : "")
        ;
    }
    
    /**
     * Gets the encoding
     * @return string
     */
    public function getEncoding() {
        return $this->encoding;
    }
    
    /**
     * Constructor
     * @param string $encoding
     */
    function __construct($encoding = 'UTF-8') {
        $this->encoding = $encoding;
    }

}

?>