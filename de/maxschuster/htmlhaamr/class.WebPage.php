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
use de\maxschuster\htmlhaamr\doctype\XHtmlTransitional;

/**
 * Represents the whole webpage with its parts (the html, body and head blocks)
 * and offers some shortcuts to set different options of the page
 * @author Max Schuster <m.schuster@neo7even.de>
 * @package htmlhaamr
 */
class WebPage {
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
    public $encoding;

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
     * Pages doctype
     * @var DocType
     */
    protected $doctype;

    /**
     * jQueryContainer
     * @var jQueryCointainer
     */
    public $jQueryContainer;

    /**
     * Constructor
     * Fills the properties of this class with some default values.
     */
    public function __construct(DocType $docType = null, $encoding = 'UTF-8') {
        $this->doctype = $docType ? $docType : new XHtmlTransitional();
        $this->html = new Html();
        $this->body = new Body();
        $this->head = new Head();
        $this->html->addContent($this->head, $this->body);
        $this->encoding = $encoding;
        $this->setMetaGenerator('PHP htmlhaamr');
        $this->setMetaContentScriptType('text/javascript');
        $this->setMetaContentStyleType('text/css');
    }

    /**
     * Returns this page as string
     * Prints the encoding headers, too!
     * @return string
     */
    public function __toString() {
        $this->setMetaContentType('text/html; charset=' . $this->encoding);
        $this->doctype->setEncoding($this->encoding);
        header('Content-type: text/html; charset=' . $this->encoding);
        return sprintf("%s\n%s", $this->doctype, $this->html);
    }

    /**
     * Sets the encoding of the page
     * @param string $encodingType 
     */
    public function setEncoding($encoding) {
        $this->encoding = $encoding;
    }

    /**
     * Sets the doctype of the page
     * @param DocType $doctype
     */
    public function setDoctype(DocType $doctype) {
        $doctype->setEncoding($this->encoding);
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
    public function addScript($src) {
        $script = new Script();
        $script->setSrc($src);
        $this->head->addContent($script);
    }

    /**
     * Adds a stylesheet to the page
     * @param string $href 
     */
    public function addStylesheet($href) {
        $style = new LinkStylesheet();
        $style->setHref($href);
        $this->head->addContent($style);
    }

}

?>