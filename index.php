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

require 'de/maxschuster/htmlhaamr/inc.htmlhaamr.php';

use de\mschuster\htmlhaamr\WebPage;
use de\mschuster\htmlhaamr\tag;
use de\mschuster\htmlhaamr\Attribute;

$webPage = new WebPage();
$webPage->setMetaAuthor('Max Schuster');
//$webPage->addStylesheet('acssfile.css');
$webPage->addScript('http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');

$startTime = microtime(true);

for ($i = 0; $i < 10000; $i++) {
    $div = new tag\Div();
    $link = new tag\A('Hello World! (' . $i . ')');
    $div->addContent($link);
    $link->setHref('http://www.google.com');
    $link->setOnClick("alert('Computer sagt: NEEEEEEIN'); return false;");
    $div->addAttribute(new Attribute('style', 'margin: 5px; background: #ccc;'));
    $div->setClass('test-class');
    $webPage->body->addContent($div);
}

$endTime = microtime(true);

$totalTime = $endTime - $startTime;

$webPage->body->addContent('<p>Total time: ' . $totalTime . ' s</p>');

echo $webPage;
?>