<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace de\maxschuster\pho\js\jquery;

/**
 * Description of class
 *
 * @author maxschuster
 */
class jQueryElement {

    protected $selector = '';
    protected $function = '';
    protected $content = array();
    
    /**
     * 
     * @param string $selector
     * @param string $function
     * @param array $content 
     */
    function __construct($selector, $function, array $content = array()) {
        $this->selector = $selector;
        $this->function = $function;
        $this->content = $content;
    }

    public function addContent($content, $_ = null) {
        $numArgs = func_num_args();
        for ($i = 0; $i < $numArgs; $i++) {
            $this->content[] = func_get_arg($i);
        }
    }

    public function setSelector($selector) {
        $this->selector = $selector;
    }

    public function setFunction($function) {
        $this->function = $function;
    }

    public function __toString() {
        return sprintf('$(%s).%s(%s);', $this->selector, $this->function, implode('', $this->content));
    }

}

?>
