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

namespace de\maxschuster\htmlhaamr\tag;

use de\maxschuster\htmlhaamr\SelfClosingElement;
use de\maxschuster\htmlhaamr\Attribute;

/**
 * This class has no Description...
 * @author Max Schuster 
 * @package htmlhaamr
 */
class Embed extends SelfClosingElement {

    protected $tagname = 'embed';
    protected $src;
    protected $width;
    protected $height;
    protected $allowScriptAccess;
    protected $allowFullScreen;
    protected $flashVars;
    
    public function setSrc($src) {
        $this->src = new Attribute('src', $src);
        $this->addAttribute($this->src);
    }
    
    public function setWidth($width) {
        $this->width = new Attribute('width', $width);
        $this->addAttribute($this->width);
    }
    
    public function setHeight($height) {
        $this->value = new Attribute('height', $height);
        $this->addAttribute($this->height);
    }
    
    public function setAllowScriptAccess($allowScriptAccess) {
        $this->allowScriptAccess = new Attribute('allowScriptAccess', $allowScriptAccess);
        $this->addAttribute($this->allowScriptAccess);
    }
    
    public function setAllowFullScreen($allowFullScreen) {
        $this->allowFullScreen = new Attribute('allowFullScreen', $allowFullScreen);
        $this->addAttribute($this->allowFullScreen);
    }
    
    public function setFlashVars($flashVars) {
        $this->flashVars = new Attribute('flashVars', $flashVars);
        $this->addAttribute($this->flashVars);
    }
}

?>