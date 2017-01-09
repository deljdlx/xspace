<?php


require(__DIR__.'/../bootstrap.php');






$loader=new \XSpace\XFilepathManager();


$loader->extendsFilepath(
   __DIR__.'/parent',
    __DIR__.'/child'
);



$test=$loader->getFilepath(
    __DIR__.'/child/world.txt'
);

echo '<pre id="' . __FILE__ . '-' . __LINE__ . '" style="border: solid 1px rgb(255,0,0); background-color:rgb(255,255,255)">';
echo '<div style="background-color:rgba(100,100,100,1); color: rgba(255,255,255,1)">' . __FILE__ . '@' . __LINE__ . '</div>';
print_r($test);
echo '</pre>';




$test=$loader->getFilepath(
    __DIR__.'/child/hello.txt'
);

echo '<pre id="' . __FILE__ . '-' . __LINE__ . '" style="border: solid 1px rgb(255,0,0); background-color:rgb(255,255,255)">';
echo '<div style="background-color:rgba(100,100,100,1); color: rgba(255,255,255,1)">' . __FILE__ . '@' . __LINE__ . '</div>';
print_r($test);
echo '</pre>';


$test=$loader->getFilepath(
    __DIR__.'/child/subfolder'
);

echo '<pre id="' . __FILE__ . '-' . __LINE__ . '" style="border: solid 1px rgb(255,0,0); background-color:rgb(255,255,255)">';
echo '<div style="background-color:rgba(100,100,100,1); color: rgba(255,255,255,1)">' . __FILE__ . '@' . __LINE__ . '</div>';
print_r($test);
echo '</pre>';



$test=$loader->getFilepath(
    __DIR__.'/parent/subfolder'
);

echo '<pre id="' . __FILE__ . '-' . __LINE__ . '" style="border: solid 1px rgb(255,0,0); background-color:rgb(255,255,255)">';
echo '<div style="background-color:rgba(100,100,100,1); color: rgba(255,255,255,1)">' . __FILE__ . '@' . __LINE__ . '</div>';
print_r($test);
echo '</pre>';






