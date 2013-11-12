<?php
require_once ("../lib/MiniTemplator.class.php");
function generateCalendarPage() {
    require_once ("../include/common.php");
    $t = new MiniTemplator;
    $ok = $t -> readTemplateFromFile("a.tpl");
    if (!$ok)
        die("MiniTemplator.readTemplateFromFile failed.");
    $t -> setVariable("burl", $burl);
    $t -> setVariable("title", "你好吗");
    $t -> setVariable("image", "1.jpg");
    $t -> setVariable("words", "这事个图片");
    $t -> generateOutput();
    $t->generateOutputToFile("sub1_1.html");
}
generateCalendarPage();
?>