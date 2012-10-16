<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace eu\maxschuster\pho\js\jquery\event;

/**
 * Description of class
 *
 * @author maxschuster
 */
class jQueryEventHandlerFunction {
    /**
     * The params that the function receives
     * as comma separated string
     * @var string
     */
    protected $params = 'e';
    
    /**
     * The Content of the function
     * @var string 
     */
    protected $content = '';
    
    function __construct($params, $content) {
        $this->params = $params;
        $this->content = $content;
    }
    
    /**
     * The function
     * @param string $params 
     */
    public function setParams($params) {
        $this->params = $params;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function __toString() {
        return sprintf('function(%s){%s}', $this->params, $this->content);
    }

}
?>
