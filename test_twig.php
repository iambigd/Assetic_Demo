<?php

include_once 'vendor/autoload.php';

use Assetic\AssetWriter;
use Assetic\Extension\Twig\TwigFormulaLoader;
use Assetic\Extension\Twig\TwigResource;
use Assetic\Factory\LazyAssetManager;

$twig->addExtension(new AsseticExtension($factory, $debug));

$am = new LazyAssetManager($factory);

// enable loading assets from twig templates
$am->setLoader('twig', new TwigFormulaLoader($twig));

// loop through all your templates
foreach ($templates as $template) {
    $resource = new TwigResource($twigLoader, $template);
    $am->addResource($resource, 'twig');
}

$writer = new AssetWriter(APP_FOLDER .'/js/complied/test.js');
$writer->writeManagerAssets($am);

?>
