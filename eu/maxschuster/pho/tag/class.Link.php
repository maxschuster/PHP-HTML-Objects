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

namespace eu\maxschuster\pho\tag;

use eu\maxschuster\pho\SelfClosingElement;
use eu\maxschuster\pho\Attribute;

/**
 * This class has no Description...
 * @author Max Schuster 
 * @package pho
 */
class Link extends SelfClosingElement {

    protected $rel;
    protected $href;
    protected $media;
    protected $type;
    protected $tagname = 'link';

    public function setRel($rel) {
        $this->rel = new Attribute('rel', $rel);
        $this->addAttribute($this->rel);
    }

    public function setHref($href) {
        $this->href = new Attribute('href', $href);
        $this->addAttribute($this->href);
    }
    
    public function setMedia($media) {
        $this->media = new Attribute('media', $media);
        $this->addAttribute($this->media);
    }
    
    public function setType($type) {
        $this->type = new Attribute('type', $type);
        $this->addAttribute($this->type);
    }

}

?>