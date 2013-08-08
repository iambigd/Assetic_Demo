<?php

include_once 'vendor/autoload.php';

use Assetic\Factory\AssetFactory;

$APP_FOLDER = dirname(__FILE__);
// echo $APP_FOLDER;
$factory = new AssetFactory($APP_FOLDER);
$factory->setDebug(true);
//return AssetCollection
$plugin = $factory->createAsset(array(
    array('js/plugins/jquery.logger.js') //file的路徑 
));

echo $plugin->dump();
?>