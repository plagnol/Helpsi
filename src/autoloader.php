<?php
/**
 * Class autolader set with spl_autoload_register($function);
 * @param $class
 */

function autoloader($class)
{
    $paths = array(
        "src",
        "src/model/class/",
        "src/controller/class/",
        "controller/class/",
        "model/class/",
        "../controller/class/",
        "../model/class/",
        "../../model/class/",
        "../../controller/class/",
	"../"
    );
    $i = 0;
    $size = sizeof($paths);
    $found = false;
    while ($i < $size && ! $found) {
        $filename = __DIR__ . "/" . $paths[$i ++] . "/" . $class . ".class.php";
        if (is_file($filename)) {
            include $filename;
            $found = true;
        }
    }
}


spl_autoload_register('autoloader');
