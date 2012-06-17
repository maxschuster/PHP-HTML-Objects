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

namespace de\maxschuster\htmlhaamr\flash;

use de\maxschuster\htmlhaamr\Attribute;
use de\maxschuster\htmlhaamr\tag\Object;
use de\maxschuster\htmlhaamr\tag\Param;
use de\maxschuster\htmlhaamr\tag\Embed;

/**
 * This class has no Description...
 * @author Max Schuster 
 * @package htmlhaamr
 */
class SwfElement extends Object {
    
    const WMODE_WINDOW = 'window';
    const WMODE_OPAQUE = 'opaque';
    const WMODE_TRANSPARENT = 'transparent';
    
    protected $src;
    protected $allowFullscreen;
    protected $allowScriptAccess;
    protected $flashVars;
    protected $wMode;


    /**
     *
     * @var Param
     */
    protected $paramMovie;
    
    /**
     *
     * @var Param
     */
    protected $paramAllowFullscreen;
    
    /**
     *
     * @var Param
     */
    protected $paramAllowScriptAccess;
    
    /**
     *
     * @var Param
     */
    protected $paramFlashVars;
    
    /**
     *
     * @var Param
     */
    protected $paramWMode;
    
    /**
     *
     * @var Param
     */
    protected $paramWidth;
    
    /**
     *
     * @var Param
     */
    protected $paramHeight;

    /**
     *
     * @var Embed
     */
    protected $embed;
    
    public function setSrc($src) {
        $this->src = $src;
        $this->embed->addAttribute(new Attribute('src', $src));
        if (!$this->paramMovie) {
            $this->paramMovie = new Param();
            $this->addContent($this->paramMovie);
            $this->paramMovie->setName('movie');
        }
        $this->paramMovie->setValue($src);
    }

    public function setAllowFullscreen($allowFullscreen) {
        $this->allowFullscreen = $allowFullscreen;
        $this->embed->addAttribute(new Attribute('allowfullscreen', $allowFullscreen));
        if (!$this->paramAllowFullscreen) {
            $this->paramAllowFullscreen = new Param();
            $this->addContent($this->paramAllowFullscreen);
            $this->paramAllowFullscreen->setName('allowfullscreen');
        }
        $this->paramAllowFullscreen->setValue($allowFullscreen);
    }

    public function setAllowScriptAccess($allowScriptAccess) {
        $this->allowScriptAccess = $allowScriptAccess;
        $this->embed->addAttribute(new Attribute('allowscriptaccess', $allowScriptAccess));
        if (!$this->paramAllowScriptAccess) {
            $this->paramAllowScriptAccess = new Param();
            $this->addContent($this->paramAllowScriptAccess);
            $this->paramAllowScriptAccess->setName('allowscriptaccess');
        }
        $this->paramAllowScriptAccess->setValue($allowScriptAccess);
    }

    public function setFlashVars($flashVars) {
        $this->flashVars = $flashVars;
        $this->embed->addAttribute(new Attribute('flashvars', $flashVars));
        if (!$this->paramFlashVars) {
            $this->paramFlashVars = new Param();
            $this->addContent($this->paramFlashVars);
            $this->paramFlashVars->setName('flashvars');
        }
        $this->paramFlashVars->setValue($flashVars);
    }
    
    public function setWMode($wMode) {
        $this->wMode = $wMode;
        $this->embed->addAttribute(new Attribute('wmode', $wMode));
        if (!$this->paramWMode) {
            $this->paramWMode = new Param();
            $this->addContent($this->paramWMode);
            $this->paramWMode->setName('wmode');
        }
        $this->paramWMode->setValue($wMode);
    }
    
    public function setHeight($height) {
        parent::setHeight($height);
        $this->embed->addAttribute(new Attribute('height', $height));
        if (!$this->paramHeight) {
            $this->paramHeight = new Param();
            $this->addContent($this->paramHeight);
            $this->paramHeight->setName('height');
        }
        $this->paramHeight->setValue($height);
    }

    public function setWidth($width) {
        parent::setWidth($width);
        $this->embed->addAttribute(new Attribute('width', $width));
        if (!$this->paramWidth) {
            $this->paramWidth = new Param();
            $this->addContent($this->paramWidth);
            $this->paramWidth->setName('width');
        }
        $this->paramWidth->setValue($width);
    }

        function __construct($src, $width, $height, $allowFullscreen = 'true', $allowScriptAccess = 'true', $flashVars = '', $wMode = self::WMODE_WINDOW) {
        parent::__construct();
        $this->embed = new Embed();
        $this->setClassId('clsid:D27CDB6E-AE6D-11cf-96B8-444553540000');
        $this->setSrc($src);
        $this->setWidth($width);
        $this->setHeight($height);
        $this->setAllowFullscreen($allowFullscreen);
        $this->setAllowScriptAccess($allowScriptAccess);
        $this->setFlashVars($flashVars);
        $this->setWMode($wMode);
        $this->addContent($this->embed);
    }

    
}

?>