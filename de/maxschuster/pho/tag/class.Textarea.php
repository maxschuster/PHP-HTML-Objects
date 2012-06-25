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

namespace de\maxschuster\pho\tag;

use de\maxschuster\pho\ContainigElement;
use de\maxschuster\pho\Attribute;

/**
 * This class has no Description...
 * @author Max Schuster 
 * @package pho
 */
class Textarea extends ContainigElement {

    protected $name;
    protected $rel;

    protected $tagname = 'textarea';

    public function setValue($val) {
        $this->clearContent();
        $this->addContent($val);
    }

    public function setName($val) {
        $this->name = new Attribute('name', $val);
        $this->addAttribute($this->name);
    }

    public function setRel($val) {
        $this->rel = new Attribute('rel', $val);
        $this->addAttribute($this->rel);
    }
    
    /**
     * Returns the element as String
     * Remove linebreaks inside this elementtype
     * @return string
     */
    public function __toString() {
        return sprintf("<%s%s%s>%s</%s>\n", $this->tagname, $this->attributesCount() > 0 ? ' ' : '', $this->attributesToString(), implode('', $this->content), $this->tagname);
    }

}

?>