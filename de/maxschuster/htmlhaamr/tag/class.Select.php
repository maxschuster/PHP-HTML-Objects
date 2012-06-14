<?php

/*
 * Copyright 2012 Max Schuster <sirmaxelot@me.com>
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
class Select extends ContainigElement {
    /**
     * Name of the element
     * @var Attribute
     */
    protected $name = false;
    protected $tagname = 'select';
    
    public function setName($name) {
        $this->name = new Attribute('name', $name);
        $this->addAttribute($this->name);
    }
    
    /**
     * Adds an option to this select element.
     * Accepst the following parameter formats:
     * - 1 object of the type Option
     * - An array with two elements (array(Content, Value))
     * - A string used for value and content
     * - Two strings for content and value
     * @param Option|array|string $option
     * @param string [optional] $value
     */
    public function addOption($option) {
        $paramNum = func_num_args();
        if ($paramNum == 1) {
            if ($option instanceof Option) {
                $this->addContent($option);
                return;
            }

            if (is_array($option) && count($option) == 2) {
                $opt = new Option();
                $opt->setValue($option[1]);
                $opt->addContent($option[]);
                return;
            }

            if (is_string($option)) {
                $opt = new Option();
                $opt->setValue($option);
                $opt->addContent($option);
                return;
            }
        } elseif ($paramNum == 2) {
            $opt = new Option();
            $opt->setValue(func_get_arg(1));
            $opt->addContent($option);
            return;
        }
    }
}

?>