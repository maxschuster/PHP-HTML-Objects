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

namespace de\mschuster\htmlhaamr;

/**
 * This class has no Description...
 * @author Max Schuster <m.schuster@neo7even.de>
 * @package htmlhaamr
 */
class DocType {

    const DOCTYPE_HTML_TRANSITIONAL = 0;
    const DOCTYPE_XHTML_TRANSITIONAL = 1;

    protected $doctypeSwitch = false;
    protected $doctype = 0;
    protected $doctypeHtml = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
       "http://www.w3.org/TR/html4/loose.dtd">';
    protected $doctypeXHtml = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
    protected $useXmlPrefix = false;
    protected $xmlPrefix = '<?xml version="1.0" ?>';

    public function setType($type) {
        $this->doctype = $type;
        switch ($this->doctype) {
            case self::DOCTYPE_XHTML_TRANSITIONAL:
                $this->useXmlPrefix = true;
                break;
            case self::DOCTYPE_HTML_TRANSITIONAL:
                $this->useXmlPrefix = false;
                break;
        }
    }

    public function setEncoding($encoding = null) {
        switch ($encoding) {
            case WebPage::ENCODING_LATIN1:
                $this->xmlPrefix = '<?xml version="1.0" encoding="ISO-8859-1" standalone="yes" ?>';
                break;
            case WebPage::ENCODING_UTF8:
                $this->xmlPrefix = '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';
                break;
            default:
                $this->xmlPrefix = '<?xml version="1.0" standalone="yes" ?>';
                break;
        }
    }

    public function useDoctypeSwitch($val = true) {
        $this->doctypeSwitch = $val;
    }

    protected function getDocTypeStr() {
        switch ($this->doctype) {
            case 0:
                return $this->doctypeHtml;
                break;

            default:
                return $this->doctypeXHtml;
                break;
        }
    }

    public function __toString() {
        return
                ($this->doctypeSwitch || !$this->useXmlPrefix ? "" : $this->xmlPrefix . "\n") .
                $this->getDocTypeStr() .
                ($this->doctypeSwitch && $this->useXmlPrefix ? "\n" . $this->xmlPrefix : "")
        ;
    }

}

?>