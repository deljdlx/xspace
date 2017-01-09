<?php

require(__DIR__.'/../bootstrap.php');
require(__DIR__.'/namespace.php');






$autoloader=new \XSpace\XAutoloader();
$autoloader->extendsNamespace('XTestParent', 'XTestChild');

$autoloader->registerAutoload();



$test=new \XTestChild\HelloWorld();


echo '<pre id="' . __FILE__ . '-' . __LINE__ . '" style="border: solid 1px rgb(255,0,0); background-color:rgb(255,255,255)">';
echo '<div style="background-color:rgba(100,100,100,1); color: rgba(255,255,255,1)">' . __FILE__ . '@' . __LINE__ . '</div>';
print_r($test->helloWorl());
echo '</pre>';


$test=new \XTestChild\HelloWorldChild();


echo '<pre id="' . __FILE__ . '-' . __LINE__ . '" style="border: solid 1px rgb(255,0,0); background-color:rgb(255,255,255)">';
echo '<div style="background-color:rgba(100,100,100,1); color: rgba(255,255,255,1)">' . __FILE__ . '@' . __LINE__ . '</div>';
print_r($test->helloWorl());
echo '</pre>';








