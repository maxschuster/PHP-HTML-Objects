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

use de\maxschuster\htmlhaamr\tag\Html;
use de\maxschuster\htmlhaamr\tag\Head;
use de\maxschuster\htmlhaamr\tag\Body;
use de\maxschuster\htmlhaamr\tag\Title;
use de\maxschuster\htmlhaamr\doctype\DocType;
use de\maxschuster\htmlhaamr\tag\Meta;
use de\maxschuster\htmlhaamr\tag\Script;
use de\maxschuster\htmlhaamr\tag\ext\LinkStylesheet;
use de\maxschuster\htmlhaamr\doctype\XHtml10Transitional;
use de\maxschuster\htmlhaamr\tag\Link;
use de\maxschuster\htmlhaamr\exception\UnknownMimeTypeException;

/**
 * Represents the whole webpage with its parts (the html, body and head blocks)
 * and offers some shortcuts to set different options of the page
 * @author Max Schuster 
 * @package htmlhaamr
 */
class WebPage {
    /**
     * Deny robots to index the page
     */
    const ROBOTS_NOINDEX = 'noindex';
    
    /**
     * Allow robots to index the page
     */
    const ROBOTS_INDEX = 'index';
    
    /**
     * Deny robots tho follow links on the page
     */
    const ROBOTS_NOFOLLOW = 'nofollow';
    
    /**
     * Deny robots to index the page and any of its links
     */
    const ROBOTS_NOINDEX_NOFOLLOW = 'noindex, nofollow';
    
    /**
     * Allow robots to index and follow your page
     */
    const ROBOTS_ALL = 'all';

    /**
     * Defines if self closing elements should be closed with a slash
     * @var boolean 
     */
    protected static $closeHtmlTagsWithSlash = true;
    
    /**
     * Global encoding standard is 'UTF-8'
     * @var string
     */
    protected static $globalEncoding = 'UTF-8';

    /**
     * The pages HTML block
     * @var Html 
     */
    public $html;

    /**
     * The pages Body block
     * @var Body
     */
    public $body;

    /**
     * The pages Head block
     * @var Head
     */
    public $head;

    /**
     * The pages title
     * @var Title
     */
    public $title;

    /**
     * Content-Type meta tag
     * @var Meta 
     */
    protected $metaContentType = false;

    /**
     * Creator meta tag
     * @var Meta
     */
    protected $metaGenerator = false;

    /**
     * Author meta tag
     * @var Meta 
     */
    protected $metaAuthor = false;

    /**
     * Keywords meta tag
     * @var Meta 
     */
    protected $metaKeywords = false;

    /**
     * Description meta tag
     * @var Meta 
     */
    protected $metaDescription = false;

    /**
     * Robots meta tag
     * @var Meta 
     */
    protected $metaRobots = false;

    /**
     * Content Script Type meta tag
     * @var Meta
     */
    protected $metaContentScriptType = false;

    /**
     * Content Style Type meta tag
     * @var Meta 
     */
    protected $metaContentStyleType = false;
    
    /**
     * Pages shortcut icon
     * for IE...
     * @var Link
     */
    protected $shortcutIcon;
    
    /**
     * Pages icon
     * @var Link
     */
    protected $icon;

    /**
     * Pages doctype
     * @var DocType
     */
    protected $doctype;

    /**
     * Constructor
     * Fills the properties of this class with some default values.
     */
    public function __construct(DocType $docType = null, $globalEncoding = 'UTF-8') {
        $this->html = new Html();
        $this->body = new Body();
        $this->head = new Head();
        $this->html->addContent($this->head, $this->body);
        self::setGlobalEncoding($globalEncoding);
        $this->setMetaGenerator('PHP htmlhaamr; https://github.com/maxschuster/htmlhaamr');
        $this->setMetaContentScriptType('text/javascript');
        $this->setMetaContentStyleType('text/css');
        $this->setDoctype($docType ? $docType : new XHtml10Transitional());
    }

    /**
     * Returns this page as string
     * Prints the encoding headers, too!
     * @return string
     */
    public function __toString() {
        $this->setMetaContentType('text/html; charset=' . self::$globalEncoding);
        $this->doctype->setEncoding(self::$globalEncoding);
        header('Content-type: text/html; charset=' . self::$globalEncoding);
        return sprintf("%s\n%s", $this->doctype, $this->html);
    }

    /**
     * Sets the global encoding
     * @param string $encodingType Type The encoding
     */
    public static function setGlobalEncoding($globalEncoding) {
        self::$globalEncoding = $globalEncoding;
    }
    
    /**
     * Gets the global encoding
     * @return string Type The encoding
     */
    public static function getGlobalEncoding() {
        return self::$globalEncoding;
    }
    
    /**
     * Sets close html tags with slash
     * @param boolean $closeHtmlTagsWithSlash Use it yes or no
     */
    public static function setCloseHtmlTagsWithSlash($closeHtmlTagsWithSlash) {
        self::$closeHtmlTagsWithSlash = $closeHtmlTagsWithSlash;
    }
    
    /**
     * Gets close html tags with slash
     * @return boolean
     */
    public static function getCloseHtmlTagsWithSlash() {
        return self::$closeHtmlTagsWithSlash;
    }

    /**
     * Sets the doctype of the page
     * @param DocType $doctype
     */
    public function setDoctype(DocType $doctype) {
        $doctype->setEncoding(self::$globalEncoding);
        self::$closeHtmlTagsWithSlash = $doctype->getCloseTagsWithSlash();
        $this->doctype = $doctype;
    }

    /**
     * Sets the pages title
     * @param string $title 
     */
    public function setTitle($title) {
        if (!$this->title) {
            $this->title = new Title();
            $this->head->addContent($this->title);
        } else {
            $this->title->clearContent();
        }
        $this->title->addContent($title);
    }

    /**
     * Sets the content of the pages 'generator' meta tag for
     * @param string $metaGenerator 
     */
    public function setMetaGenerator($metaGenerator) {
        if (!$this->metaGenerator) {
            $this->metaGenerator = new Meta();
            $this->metaGenerator->setName('generator');
            $this->head->addContent($this->metaGenerator);
        }
        $this->metaGenerator->setContent($metaGenerator);
    }

    /**
     * Sets the content of the pages 'author' meta tag
     * @param string $metaAuthor 
     */
    public function setMetaAuthor($metaAuthor) {
        if (!$this->metaAuthor) {
            $this->metaAuthor = new Meta();
            $this->metaAuthor->setName('author');
            $this->head->addContent($this->metaAuthor);
        }
        $this->metaAuthor->setContent($metaAuthor);
    }

    /**
     * Sets the content of the pages 'keywords' meta tag
     * @param string $metaKeywords 
     */
    public function setMetaKeywords($metaKeywords) {
        if (!$this->metaKeywords) {
            $this->metaKeywords = new Meta();
            $this->metaKeywords->setName('keywords');
            $this->head->addContent($this->metaKeywords);
        }
        $this->metaKeywords->setContent($metaKeywords);
    }

    /**
     * Sets the content of the pages 'description' meta tag
     * @param string $metaDescription 
     */
    public function setMetaDescription($metaDescription) {
        if (!$this->metaDescription) {
            $this->metaDescription = new Meta();
            $this->metaDescription->setName('description');
            $this->head->addContent($this->metaDescription);
        }
        $this->metaDescription->setContent($metaDescription);
    }

    /**
     * Sets the content of the pages 'robots' meta tag
     * @param string $metaRobots 
     */
    public function setMetaRobots($metaRobots) {
        if (!$this->metaRobots) {
            $this->metaRobots = new Meta();
            $this->metaRobots->setName('robots');
            $this->head->addContent($this->metaRobots);
        }
        $this->metaRobots->setContent($metaRobots);
    }

    /**
     * Sets the content of the pages 'Content-Script-Type' meta tag
     * @param string $metaContentScriptType 
     */
    public function setMetaContentScriptType($metaContentScriptType) {
        if (!$this->metaContentScriptType) {
            $this->metaContentScriptType = new Meta();
            $this->metaContentScriptType->setHttpEquiv('Content-Script-Type');
            $this->head->addContent($this->metaContentScriptType);
        }
        $this->metaContentScriptType->setContent($metaContentScriptType);
    }

    /**
     * Sets the content of the pages 'Content-Style-Type' meta tag
     * @param string $metaContentStyleType 
     */
    public function setMetaContentStyleType($metaContentStyleType) {
        if (!$this->metaContentStyleType) {
            $this->metaContentStyleType = new Meta();
            $this->metaContentStyleType->setHttpEquiv('Content-Style-Type');
            $this->head->addContent($this->metaContentStyleType);
        }
        $this->metaContentStyleType->setContent($metaContentStyleType);
    }

    /**
     * Sets the content of the pages 'Content-Type' meta tag
     * @param string $metaContentType 
     */
    public function setMetaContentType($metaContentType) {
        if (!$this->metaContentType) {
            $this->metaContentType = new Meta();
            $this->metaContentType->setHttpEquiv('Content-Type');
            $this->head->addContent($this->metaContentType);
        }
        $this->metaContentType->setContent($metaContentType);
    }

    /**
     * Adds a script url to the page
     * @param string $src 
     */
    public function addScriptSrc($src) {
        $script = new Script();
        $script->setSrc($src);
        $this->head->addContent($script);
    }
    
    /**
     * Adds some js code to the pages header
     * @param string $jsCode Code to add
     */
    public function addScript($jsCode) {
        $this->head->addContent(new Script($jsCode));
    }

    /**
     * Adds a stylesheet to the page
     * @param string $href Url of the stylesheet
     */
    public function addStylesheet($href) {
        $style = new LinkStylesheet();
        $style->setHref($href);
        $this->head->addContent($style);
    }
    
    /**
     * Set the pages favicon
     * @param string $href Url of the favicon file
     * @param string $mime [optional]
     * The favicons mimetype. If not set the method
     * will try to resolve it by the filename
     * @throws UnknownMimeTypeException
     */
    public function setFaviconHref($href, $mime = false) {
        if (empty($mime)) {
            $mime = MimeAnalyser::getByUrl($href);
            if (empty($mime)) {
                throw new UnknownMimeTypeException('Could not resolve mimetype! Please use the $mime parameter, too');
            }
        }
        if (!$this->shortcutIcon) {
            // IE Extrawurst -.-
            $this->shortcutIcon = new Link();
            $this->shortcutIcon->setRel('shortcut icon');
            $this->head->addContent($this->shortcutIcon);
        }
        if (!$this->icon) {
            $this->icon = new Link();
            $this->icon->setRel('icon');
            $this->head->addContent($this->icon);
        }
        $this->shortcutIcon->setHref($href);
        $this->shortcutIcon->setType($mime);
        $this->icon->setHref($href);
        $this->icon->setType($mime);
    }

}

?>
