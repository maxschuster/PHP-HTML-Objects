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

/**
 * Base class for all HTML elements.
 * @author Max Schuster 
 * @package htmlhaamr
 */
abstract class Element {
    /**
     * Array containing the elements attributes
     * @var Attribute[string]
     */
    protected $attributes = array();
    
    /**
     * The elements tag name
     * @var string
     */
    protected $tagname = 'element';
    
    /**
     * The elements id
     * @var Attribute
     */
    protected $id;
    
    /**
     * The elements name
     * @var Attribute
     */
    protected $name;


    /**
     * The elements class
     * @var Attribute
     */
    protected $class;
    
    /**
     * Global unique id storage
     * @var integer
     */
    protected static $idStore = 1;

    /**
     * Javascript onclick
     * @var Attribute 
     */
    protected $onClick;

    /**
     * Javascript onAbort
     * @var Attribute 
     */
    protected $onAbort;

    /**
     * Javascript onblur
     * @var Attribute 
     */
    protected $onBlur;

    /**
     * Javascript onchange
     * @var Attribute 
     */
    protected $onChange;

    /**
     * Javascript ondblclick
     * @var Attribute 
     */
    protected $onDblClick;

    /**
     * Javascript onerror
     * @var Attribute 
     */
    protected $onError;

    /**
     * Javascript onfocus
     * @var Attribute 
     */
    protected $onFocus;

    /**
     * Javascript onkeydown
     * @var Attribute 
     */
    protected $onKeyDown;

    /**
     * Javascript onkeypress
     * @var Attribute 
     */
    protected $onKeyPress;

    /**
     * Javascript onkeyup
     * @var Attribute 
     */
    protected $onKeyUp;

    /**
     * Javascript onload
     * @var Attribute 
     */
    protected $onLoad;

    /**
     * Javascript onmousedown
     * @var Attribute 
     */
    protected $onMouseDown;

    /**
     * Javascript onmousemove
     * @var Attribute 
     */
    protected $onMouseMove;

    /**
     * Javascript onmouseout
     * @var Attribute 
     */
    protected $onMouseOut;

    /**
     * Javascript onmouseover
     * @var Attribute 
     */
    protected $onMouseOver;

    /**
     * Javascript onmouseup
     * @var Attribute 
     */
    protected $onMouseUp;

    /**
     * Javascript onreset
     * @var Attribute 
     */
    protected $onReset;

    /**
     * Javascript onselect
     * @var Attribute 
     */
    protected $onSelect;

    /**
     * Javascript onsubmit
     * @var Attribute 
     */
    protected $onSubmit;

    /**
     * Javascript onunload
     * @var Attribute 
     */
    protected $onUnload;

    /**
     * Constructor
     * If set, it fills the attributes of this element.
     * @param string $id
     * @param string $class
     * @param array $attributes An array of Attributes
     */
    public function __construct($id = false, $class = false, $attributes = false) {
        if ($id) {
            $this->setId($id);
        }
        if ($class) {
            $this->setClass($class);
        }
        if ($attributes) {
            $this->addAttributes($attributes);
        }
    }
    
    /**
     * Returns the element as string
     * @return string HTML
     * @abstract
     */
    abstract public function __toString();

    /**
     * Adds or replaces an attribute
     * @param Attribute $attr 
     */
    public function addAttribute(Attribute $attr) {
        $this->attributes[$attr->getName()] = $attr;
    }

    /**
     * Sets the id attribute of the object
     * @param int $id 
     */
    public function setId($id) {
        $this->id = new Attribute('id', $id);
        $this->addAttribute($this->id);
    }
    
    /**
     * Sets the id attribute of the object
     * @param int $id 
     */
    public function setName($name) {
        $this->name = new Attribute('name', $name);
        $this->addAttribute($this->name);
    }

    /**
     * Gets (or sets a default id) the Id of the Element
     * @return string Id 
     */
    public function getId() {
        (!$this->id) ? $this->getDefaultId() : null;
        return $this->id->getValue();
    }

    /**
     * Sets a default id for this element 
     */
    protected function getDefaultId() {
        $this->setId('htmlhaamrElement' . self::$idStore);
        self::$idStore++;
    }

    /**
     * Sets the class attribute of this element
     * @param type $class 
     */
    public function setClass($class) {
        $this->class = new Attribute('class', $class);
        $this->addAttribute($this->class);
    }

    /**
     * Adds an array of Attributes
     * @param Attribute[] $attrs 
     */
    public function addAttributes(array $attrs) {
        foreach ($attrs as $attr) {
            if ($attr instanceof Attribute) {
                $this->addAttribute($attr);
            }
        }
    }

    /**
     * Converts all attributes to string
     * @return string All attributes as string
     */
    protected function attributesToString() {
        return implode(' ', $this->attributes);
    }

    /**
     * Counts the elements attributes
     * @return integer Attribute count
     */
    protected function attributesCount() {
        return count($this->attributes);
    }

    /**
     * Sets the onclick js for this element
     * @param string $onClick Some js code
     */
    public function setOnClick($onClick) {
        $this->onClick = new Attribute('onclick', $onClick);
        $this->addAttribute($this->onClick);
    }

    /**
     * Sets the onabort js for this element
     * @param string $onAbort Some js code
     */
    public function setOnAbort($onAbort) {
        $this->onAbort = new Attribute('onabort', $onAbort);
        $this->addAttribute($this->onAbort);
    }

    /**
     * Sets the onblur js for this element
     * @param string $onBlur Some js code
     */
    public function setOnBlur($onBlur) {
        $this->onBlur = new Attribute('onblur', $onBlur);
        $this->addAttribute($this->onBlur);
    }

    /**
     * Sets the onclick js for this element
     * @param string $onClick Some js code
     */
    public function setOnChange($onChange) {
        $this->onChange = new Attribute('onchange', $onChange);
        $this->addAttribute($this->onChange);
    }

    /**
     * Sets the ondblclick js for this element
     * @param string $onDblClick Some js code
     */
    public function setOnDblClick($onDblClick) {
        $this->onDblClick = new Attribute('ondblclick', $onDblClick);
        $this->addAttribute($this->onDblClick);
    }

    /**
     * Sets the onerror js for this element
     * @param string $onError Some js code
     */
    public function setOnError($onError) {
        $this->onError = new Attribute('onerror', $onError);
        $this->addAttribute($this->onError);
    }

    /**
     * Sets the onfocus js for this element
     * @param string $onFocus Some js code
     */
    public function setOnFocus($onFocus) {
        $this->onFocus = new Attribute('onfocus', $onFocus);
        $this->addAttribute($this->onFocus);
    }

    /**
     * Sets the onkeydown js for this element
     * @param string $onKeyDown Some js code
     */
    public function setOnKeyDown($onKeyDown) {
        $this->onKeyDown = new Attribute('onkeydown', $onKeyDown);
        $this->addAttribute($this->onKeyDown);
    }

    /**
     * Sets the onkeypress js for this element
     * @param string $onKeyPress Some js code
     */
    public function setOnKeyPress($onKeyPress) {
        $this->onKeyPress = new Attribute('onkeypress', $onKeyPress);
        $this->addAttribute($this->onKeyPress);
    }

    /**
     * Sets the onkeyup js for this element
     * @param string $onKeyUp Some js code
     */
    public function setOnKeyUp($onKeyUp) {
        $this->onKeyUp = new Attribute('onkeyup', $onKeyUp);
        $this->addAttribute($this->onKeyUp);
    }

    /**
     * Sets the onload js for this element
     * @param string $onClick Some js code
     */
    public function setOnLoad($onLoad) {
        $this->onLoad = new Attribute('onload', $onLoad);
        $this->addAttribute($this->onLoad);
    }
    
    /**
     * Sets the onmousedown js for this element
     * @param string $onMouseDown Some js code
     */
    public function setOnMouseDown($onMouseDown) {
        $this->onMouseDown = new Attribute('onmousedown', $onMouseDown);
        $this->addAttribute($this->onMouseDown);
    }
    
    /**
     * Sets the onmousemove js for this element
     * @param string $onMouseMove Some js code
     */
    public function setOnMouseMove($onMouseMove) {
        $this->onMouseMove = new Attribute('onmousemove', $onMouseMove);
        $this->addAttribute($this->onMouseMove);
    }
    
    /**
     * Sets the onmouseout js for this element
     * @param string $onMouseOut Some js code
     */
    public function setOnMouseOut($onMouseOut) {
        $this->onMouseOut = new Attribute('onmouseout', $onMouseOut);
        $this->addAttribute($this->onMouseOut);
    }
    
    /**
     * Sets the onmouseover js for this element
     * @param string $onMouseOver Some js code
     */
    public function setOnMouseOver($onMouseOver) {
        $this->onMouseOver = new Attribute('onmouseover', $onMouseOver);
        $this->addAttribute($this->onMouseOver);
    }
    
    /**
     * Sets the onmouseup js for this element
     * @param string $onMouseUp Some js code
     */
    public function setOnMouseUp($onMouseUp) {
        $this->onMouseUp = new Attribute('onmouseup', $onMouseUp);
        $this->addAttribute($this->onMouseUp);
    }
    
    /**
     * Sets the onreset js for this element
     * @param string $onReset Some js code
     */
    public function setOnReset($onReset) {
        $this->onReset = new Attribute('onreset', $onReset);
        $this->addAttribute($this->onReset);
    }
    
    /**
     * Sets the onselect js for this element
     * @param string $onSelect Some js code
     */
    public function setOnSelect($onSelect) {
        $this->onSelect = new Attribute('onselect', $onSelect);
        $this->addAttribute($this->onSelect);
    }
    
    /**
     * Sets the onsubmit js for this element
     * @param string $onSubmit Some js code
     */
    public function setOnSubmit($onSubmit) {
        $this->onSubmit = new Attribute('onsubmit', $onSubmit);
        $this->addAttribute($this->onSubmit);
    }

    /**
     * Sets the onunload js for this element
     * @param string $onUnload Some js code
     */
    public function setOnUnload($onUnload) {
        $this->onUnload = new Attribute('onunload', $onUnload);
        $this->addAttribute($this->onUnload);
    }

}

?>