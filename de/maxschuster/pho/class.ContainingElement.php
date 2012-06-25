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

namespace de\maxschuster\pho;

/**
 * Base class for all HTML elements that can contain other HTML elements
 * @author Max Schuster 
 * @package pho 
 * @abstract
 */
abstract class ContainigElement extends Element {

    /**
     * Contains evrything inside this elements
     * @var array 
     */
    protected $content = array();

    /**
     * Contains the length
     * @var int 
     */
    protected $contentLength = 0;

    /**
     * This element has content
     * @var boolean 
     */
    protected $hasContent = false;
    
    /**
     * Constructor
     * @param Element|string $content Content to add
     * @param string $id Unique id
     * @param string $class Elements class
     * @param boolean|Attributes[] $attributes An array of Attributes
     */
    public function __construct($content = false, $id = false, $class = false, $attributes = false) {
        if ($content) {
            $this->addContent($content);
        }
        parent::__construct($id, $class, $attributes);
    }

    /**
     * Returns the element as String
     * @return string
     */
    public function __toString() {
        return sprintf($this->hasContent ? "<%s%s%s>\n%s\n</%s>\n" : "<%s%s%s>%s</%s>\n", $this->tagname, $this->attributesCount() > 0 ? ' ' : '', $this->attributesToString(), implode('', $this->content), $this->tagname);
    }

    /**
     * Adds strings or elements to the content of this element
     * @param string|Element $cont Content for this element
     * @param string|Element $_ More optional content for this element
     */
    public function addContent($cont, $_ = null) {
        $this->hasContent = true;
        $argCount = func_num_args();
        for ($i = 0; $i < $argCount; $i++) {
            $this->contentLength++;
            $this->content[$this->contentLength] = func_get_arg($i);
        }
    }

    /**
     * Adds an array of contents to this element
     * @param array $elements 
     */
    public function addContents(array $elements) {
        $this->hasContent = true;
        foreach ($elements as &$element) {
            $this->contentLength++;
            $this->content[$this->contentLength] = $element;
        }
    }

    /**
     * Clears the content 
     */
    public function clearContent() {
        $this->content = array();
        $this->hasContent = false;
        $this->contentLength = 0;
    }

}

?>