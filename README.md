HTML Haamr
==========
This project tries to build an object oriented structure for HTML in PHP.

Requires PHP 5.3!

Short example:
--------------
    <?php
    
    require 'phar://htmlhaamr.phar';
    
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
    
    // Add the link to the div
    $div->addContent($link);
    
    // Set some options
    $div->setStyle('background', '#ccc');
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

Will create the following output:
---------------------------------
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
    <html>
    <head>
    <meta name="generator" content="PHP htmlhaamr">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <link rel="shortcut icon" href="res/favicon.ico" type="image/x-icon">
    <link rel="icon" href="res/favicon.ico" type="image/x-icon">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    </head>
    <body>
    <div style="background:#ccc">
    <a href="http://www.google.de/" onclick="return confirm('Want to Visit Google in a new Tab?');" target="_blank">
    Visit Google!
    </a>

    </div>

    </body>

    </html>
    
Examples
--------
Sample files can be found in the 'samples' folder

Supported Doctypes
------------------
* HTML 4.01 Transitional
* XHTML 1.0 Transitional
* HTML 5

Extending HTML tags to build custom controls
--------------------------------------------
It is possible to build custom controls by extending exisiting tags
Take this as example:

    \de\maxschuster\htmlhaamr\flash\class.SwfElement.php

Exporting as PHAR (PHP archive)
-------------------------------
First make sure that PHAR write support is enabled in your php.ini

    phar.readonly = Off

Than you could run

    /phar/make.php
    
to create a phar of this project. It will be stored as 

    /phar/htmlhaamr.phar
    
If you are using a webbrowser you could use

    http://htmlhaamrhost/phar/make?download

to directly download the phar.

Include in your project
-----------------------
If you use the phar just do this:

    require 'phar://path/to/phar';
    
If you want to use the php scripts directly do this:

    require '/path/to/this/project/de/maxschuster/htmlhaamr/inc.htmlhaamr.php';

TODOs
-----
Write more and check spelling ;-)