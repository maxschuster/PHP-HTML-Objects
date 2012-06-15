<?php

require 'de/maxschuster/htmlhaamr/inc.htmlhaamr.php';

use de\maxschuster\htmlhaamr\WebPage;
use de\maxschuster\htmlhaamr\tag;
use de\maxschuster\htmlhaamr\Attribute;

$webPage = new WebPage();

$div = new tag\Div();
$link = new tag\A('Visit Google!');
$div->addContent($link);
$div->addAttribute(new Attribute('style', 'background:#ccc'));
$link->setHref('http://www.google.de/');
$link->setOnClick("return confirm('Want to Visit Google in a new Tab?');");
$link->setTarget(tag\A::TARGET_BLANK);

$webPage->body->addContent($div);
echo $webPage;

?>