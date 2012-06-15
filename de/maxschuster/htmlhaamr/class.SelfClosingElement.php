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

namespace de\mschuster\htmlhaamr;

/**
 * Base class for all HTML elements that can not contain content
 * @author Max Schuster <m.schuster@neo7even.de>
 * @abstract
 * @package htmlhaamr
 */
abstract class SelfClosingElement extends Element {

    /**
     * Returns this element as String
     * @return string
     */
    public function __toString() {
        //return "<" . $this->tagname . " " . $this->attributesToString() . " />\n";
        return sprintf("<%s %s />\n", $this->tagname, $this->attributesToString());
    }

}

?>
