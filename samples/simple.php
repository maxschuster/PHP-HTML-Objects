<?php

require '../de/maxschuster/htmlhaamr/inc.htmlhaamr.php';

use de\maxschuster\htmlhaamr\WebPage;
use de\maxschuster\htmlhaamr\tag;
use de\maxschuster\htmlhaamr\Attribute;
use de\maxschuster\htmlhaamr\doctype\Html401Transitional;

// Create a HTML 4.01 doctype
$doctype = new Html401Transitional();

// Create the webpage with the doctype
$webPage = new WebPage($doctype);

// Create a new div
$div = new tag\Div();

// Create a new link
$link = new tag\A('Visit Google!');

// Add the link to the div
$div->addContent($link);

// Set some options
$div->addAttribute(new Attribute('style', 'background:#ccc'));
$link->setHref('http://www.google.de/');
$link->setOnClick("return confirm('Want to Visit Google in a new Tab?');");
$link->setTarget(tag\A::TARGET_BLANK);

// Add the div to the pages content
$webPage->body->addContent($div);

// Set the pages favicon
$webPage->setFaviconHref('res/favicon.ico');

// Echo the webpage
echo $webPage;

?>