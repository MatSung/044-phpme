<?php

require_once 'classes/Tag.php';

$tag = new Tag('a');
$tag->setText('title')->setAttr('href', 'index.html')->show();
// prints <a href="index.html">title</a>
echo $tag->setText('text')->setAttr('href', 'index.html')->get();
// return <a href="index.html">text</a>