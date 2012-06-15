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
$webPage->addStylesheet('http://de.wikipedia.org/bits.wikimedia.org/de.wikipedia.org/load.php?debug=false&amp;lang=de&amp;modules=site&amp;only=styles&amp;skin=vector&amp;*');
$webPage->addScript('http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');

$startTime = microtime(true);

for ($i = 0; $i < 1000; $i++) {
    $div = new tag\Div();
    $content = new tag\A('Hello World! (' . $i . ')');
    $div->addContent($content);
    $content->setHref('http://www.google.com');
    $content->setOnClick("alert('Computer sagt: NEEEEEEIN'); return false;");
    $div->addAttribute(new Attribute('style', 'margin: 5px; background: #ccc;'));
    $div->setClass('test-class');
    $webPage->body->addContent($div);
}

$endTime = microtime(true);

$totalTime = $endTime - $startTime;

$webPage->body->addContent('<p>Total time: ' . $totalTime . ' s</p>');

echo $webPage;
?>