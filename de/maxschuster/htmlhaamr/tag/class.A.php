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

namespace de\mschuster\htmlhaamr\tag;

use de\mschuster\htmlhaamr\ContainigElement;
use de\mschuster\htmlhaamr\Attribute;

/**
 * This class has no Description...
 * @author Max Schuster <m.schuster@neo7even.de>
 * @package htmlhaamr
 */
class A extends ContainigElement {
    const TARGET_BLANK = '_blank';
    const TARGET_TOP = '_top';
    const TARGET_SELF = '_self';
    const TARGET_PARENT = '_parent';
    
    protected $href;
    protected $alt;
    protected $title;
    protected $target;
    protected $tagname = 'a';
    
    public function setJavascript($js) {
        $js = 'javascript:'.$js;
        $this->setHref($js);
    }
    
    public function setMailTo($mail) {
        $mail = 'mailto:'.$mail;
        $this->setHref($mail);
    }

    public function setHref($val) {
        $this->href = new Attribute('href', $val);
        $this->addAttribute($this->href);
    }

    public function setAlt($val) {
        $this->alt = new Attribute('alt', $val);
        $this->addAttribute($this->alt);
    }

    public function setTitle($val) {
        $this->title = new Attribute('title', $val);
        $this->addAttribute($this->title);
    }
    
    public function setTarget($val) {
        $this->target = new Attribute('target', $val);
        $this->addAttribute($this->target);
    }

}

?>