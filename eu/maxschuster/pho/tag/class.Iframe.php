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

use eu\maxschuster\pho\ContainigElement;
use eu\maxschuster\pho\Attribute;

/**
 * This class has no Description...
 * @author Max Schuster 
 * @package pho
 */
class Iframe extends ContainigElement {
    protected $tagname = 'iframe';
    
    /**
     * The frames border
     * @var Attribute
     */
    protected $frameBorder;
    
    /**
     * The frames source
     * @var Attribute
     */
    protected $src;

    /**
     * Set the frames border visibility
     * @param integer $frameBorder
     */
    public function setFrameBorder($frameBorder) {
        $this->frameBorder = new Attribute('frameborder', $frameBorder);
        $this->addAttribute($this->frameBorder);
    }
    
    /**
     * Set frames source
     * @param string $src
     */
    public function setSrc($src) {
        $this->src = new Attribute('src', $src);
        $this->addAttribute($this->src);
    }

}

?>