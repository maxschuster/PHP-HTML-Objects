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
use de\maxschuster\htmlhaamr\doctype\Html401Transitional;

// Create a HTML 4.01 doctype
$doctype = new Html401Transitional();

// Create the webpage with the doctype
$webPage = new WebPage($doctype);

// Create a new div
$div = new tag\Div();

// Create a new link
$link = new tag\A('Visit Google!');

// Create an Image
$image = new tag\Img();
$image->setSrc('res/htmlhaamr.png');

// Add the link to the div
$div->addContent($link, $image);



// Set some options
$div->setStyle('background', '#ccc');
$link->setHref('http://www.google.de/');
$link->setOnClick("return confirm('Want to visit Google in a new tab?');");
$link->setTarget(tag\A::TARGET_BLANK);

// Add the div to the pages content
$webPage->body->addContent($div);

// Set the pages favicon
$webPage->setFaviconHref('res/favicon.ico');

$webPage->setMetaRobots(WebPage::ROBOTS_NOINDEX_NOFOLLOW);

// Echo the webpage
echo $webPage;

?>