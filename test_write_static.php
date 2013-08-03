

<?php

include_once 'vendor/autoload.php';

use Assetic\AssetManager;
use Assetic\Asset\FileAsset;
use Assetic\Asset\GlobAsset;

use Assetic\AssetWriter;


$APP_FOLDER =  dirname(__FILE__) ;//dirname(__FILE__);

//jquery
$jquery = new FileAsset($APP_FOLDER . '/js/lib/jquery-1.10.2.js');
$jquery->setTargetPath('jquery.js');//輸出的目標檔名

$am = new AssetManager();
$am->set('jquery',$jquery);

//輸出實體檔案
$writer = new AssetWriter($APP_FOLDER . '/js/complied');
$writer->writeManagerAssets($am);//寫入的路徑位置 /js/complied/jquery.js

?>
