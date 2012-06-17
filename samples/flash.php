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

require '../de/maxschuster/htmlhaamr/inc.htmlhaamr.php';

use de\maxschuster\htmlhaamr\WebPage;
use de\maxschuster\htmlhaamr\tag;
use de\maxschuster\htmlhaamr\Attribute;
use de\maxschuster\htmlhaamr\doctype\Html401Transitional;
use de\maxschuster\htmlhaamr\flash\SwfElement;

// Create a HTML 4.01 doctype
$doctype = new Html401Transitional();

// Create the webpage with the doctype
$webPage = new WebPage($doctype);

// Create a new div
$div = new tag\Div();

$p = new tag\P('This is the test.swf I took from the project ');
$a = new tag\A('swfobject');
$a->setHref('http://code.google.com/p/swfobject/');
$a->setTarget(tag\A::TARGET_BLANK);
$p->addContent($a);

// Create a new flash element
$swf = new SwfElement('res/test.swf', 50, 50);

// Add the link to the div
$div->addContent($p, $swf);

// Set some options
$div->addAttribute(new Attribute('style', 'background:#ccc'));
$swf->setWidth('100%');
$swf->setHeight('100%');

// Add the div to the pages content
$webPage->body->addContent($div);

// Set the pages favicon
$webPage->setFaviconHref('res/favicon.ico');

// Echo the webpage
echo $webPage;

?>