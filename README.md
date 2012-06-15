HTML Haamr
==========

This project tries to build an object oriented structure for html in PHP.

Requires PHP 5.3


Short example:
--------------
    <?php

    require 'de/maxschuster/htmlhaamr/inc.htmlhaamr.php';

    use de\maxschuster\htmlhaamr\WebPage;
    use de\maxschuster\htmlhaamr\tag;
    use de\maxschuster\htmlhaamr\Attribute;
    use de\maxschuster\htmlhaamr\doctype\Html5;

    // Create a HTML5 doctype
    $doctype = new Html5();

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

    // Echo the webpage
    echo $webPage;

    ?>

Will create the following output:
---------------------------------
    <!DOCTYPE html>
    <html>
    <head>
    <meta name="generator" content="PHP htmlhaamr" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    </head>
    <body>
    <div style="background:#ccc">
    <a href="http://www.google.de/" onclick="return confirm('Want to Visit Google in a new Tab?');" target="_blank">
    Visit Google!
    </a>

    </div>

    </body>

    </html>

Working examples can be found in index.php and simpleexample.php

To include the sourcecode in your project just require
'<PAHT_TO_THIS_PROJECT>/de/maxschuster/htmlhaamr/inc.htmlhaamr.php'.

Or you can create a phar form this project. Just run the make.php an you should
see a new folder called "phar" in the projects root folder. Inside this folder
You will find a "htmlhaamr.phar". If you are running the script with a
webbrowser you could call it with the GET parameter "download"
(http://localhost/htmlhaamr/make.php?download) to automaticly download the phar.

TODO: Write more and check spelling ;-)