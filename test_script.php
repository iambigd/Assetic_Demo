plugin<?php

include_once 'vendor/autoload.php';

use Assetic\AssetManager;
use Assetic\Asset\FileAsset;
use Assetic\Asset\GlobAsset;

use Assetic\Filter\GoogleClosure\CompilerApiFilter;
use Assetic\FilterManager;

use Assetic\Factory\AssetFactory;

use Assetic\AssetWriter;

use Assetic\Factory\Loader\FunctionCallsFormulaLoader;
use Assetic\Factory\Resource\FileResource;


use Assetic\functions;


$APP_FOLDER = dirname(__FILE__);
// echo $APP_FOLDER;

// $factory = new AssetFactory('/path/to/web', true); // debug mode is on
$factory = new AssetFactory($APP_FOLDER . 'public/asset');
// $factory->setDebug(true);

$jquery = new FileAsset($APP_FOLDER . '/js/lib/jquery-1.10.2.js');
$jquery->setTargetPath('jquery.js');

// $globCSS = new GlobAsset($APP_FOLDER . '/css/*');
// $globCSS->setTargetPath('glob.css');

$fm = new FilterManager();
$fm->set('google', new CompilerApiFilter());
$factory->setFilterManager($fm);

$am = new AssetManager();
$am->set('jquery', $jquery);
// $am->set('glob_css', $globCSS);
$factory->setAssetManager($am);

//輸出的目錄
$writer = new AssetWriter($APP_FOLDER . '/js/complied/');
$writer->writeManagerAssets($am);

assetic_init($factory);

?>

<?php 
  // array($APP_FOLDER . 
  //       '/js/lib/jquery-1.7.2.min.js',
  //       'js/pluings/jquery.ba-resize.js'), 

foreach (assetic_javascripts(
    array($APP_FOLDER . 
        '/js/lib/jquery-1.7.2.min.js')
     ,array('google')
    ,array('output' => 'js/complied/*', 'name' => 'jquery')
    ) as $url): ?>

<script src="<?php echo $url ?>"></script>

<?php endforeach; ?>

