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

// Include htmlhaamr
require 'de/maxschuster/htmlhaamr/inc.htmlhaamr.php';

use de\maxschuster\htmlhaamr\WebPage;
use de\maxschuster\htmlhaamr\tag;
use de\maxschuster\htmlhaamr\Attribute;
use de\maxschuster\htmlhaamr\doctype\Html5;

// Create a HTML5 doctype
$html5DocType = new Html5();

// Create a new webpage with the doctype and UTF-8 encoding
$webPage = new WebPage($html5DocType, 'UTF-8');

// Set the pages author
$webPage->setMetaAuthor('Max Schuster');

// Add the jquery js-file
$webPage->addScript('http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');

$startTime = microtime(true);

for ($i = 0; $i < 100; $i++) {
    // Create a new div
    $div = new tag\Div();
    
    // Create a new Link
    $link = new tag\A('Hello World! (' . $i . ')');
    
    // Add the link to the div
    $div->addContent($link);
    
    // Set some options of the link
    $link->setHref('http://www.google.com');
    $link->setOnClick("alert('Computer sagt: NEEEEEEIN'); return false;");
    $div->addAttribute(new Attribute('style', 'margin: 5px; background: #ccc;'));
    $div->setClass('test-class');
    
    // Add the div to the webpages body tag
    $webPage->body->addContent($div);
}

$endTime = microtime(true);

$totalTime = $endTime - $startTime;

$webPage->body->addContent(new tag\P('Total time: ' . $totalTime . ' s'))   ;

echo $webPage;
?>