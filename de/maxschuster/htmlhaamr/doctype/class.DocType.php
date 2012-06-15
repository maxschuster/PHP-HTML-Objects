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

namespace de\maxschuster\htmlhaamr\doctype;

/**
 * This class has no Description...
 * @author Max Schuster <m.schuster@neo7even.de>
 * @package htmlhaamr
 */
abstract class DocType {
    protected $doctypeSwitch = false;
    protected $doctype = '';
    protected $useXmlPrefix = false;
    protected $xmlPrefix = '<?xml version="1.0" standalone="yes"%s ?>';
    protected $encoding = '';

    public function setEncoding($encoding) {
        $this->encoding = $encoding;
    }
    
    protected function getXmlPrefix() {
        $encoding = $this->encoding ? 'encoding="'.$this->encoding.'"' : '';
        return sprintf($this->xmlPrefix, $encoding);
    }

    public function useDoctypeSwitch($val = true) {
        $this->doctypeSwitch = $val;
    }

    public function __toString() {
        return
                ($this->doctypeSwitch || !$this->useXmlPrefix ? "" : $this->getXmlPrefix() . "\n") .
                $this->doctype .
                ($this->doctypeSwitch && $this->useXmlPrefix ? "\n" . $this->getXmlPrefix() : "")
        ;
    }
    
    public function getEncoding() {
        return $this->encoding;
    }

    function __construct($encoding = 'UTF-8') {
        $this->encoding = $encoding;
    }

}

?>