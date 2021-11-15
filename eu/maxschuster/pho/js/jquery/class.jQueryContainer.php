<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace eu\maxschuster\pho\js\jquery;

use eu\maxschuster\pho\tag\Script;
use eu\maxschuster\pho\js\jquery\jQueryElement;
use eu\maxschuster\pho\Element;

/**
 * Description of class
 *
 * @author maxschuster
 */
class jQueryContainer extends Script {
    /**
     * The Root Element
     * @var jQueryElement 
     */
    protected $element;

    public function __construct() {
        parent::__construct(array());
        $this->setId('jQueryContainer');
        $this->element = new jQueryElement('document', 'ready');
        $this->addContent($this->element);
    }
    
    public function addJQueryContent(jQueryElement $jqe) {
        $this->element->addContent($jqe);
    }
    
    public function addEvent($selector, $eventType, $content) {
        $jqElement = new jQueryElement($s, $eventType, array('function(e){'.$content.'};'));
    }
    
    public function addEventForItem(Element $item, $eventType, $content) {
        $id = $item->getId();
        $jqElement = new jQueryElement('\'#'.$id.'\'', $eventType, array('function(e){'.$content.'};'));
        $this->addJQueryContent($jqElement);
    }
    
}
?>
