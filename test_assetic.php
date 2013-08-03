
<?php
  
  include_once 'vendor/autoload.php';

  use Assetic\Asset\AssetCollection;  
  use Assetic\Asset\FileAsset;  
  use Assetic\Asset\GlobAsset; 

  use Assetic\Filter\GoogleClosure\CompilerApiFilter;

  $APP_FOLDER = dirname(__FILE__);
  // echo $APP_FOLDER;

  /*

    AssetCollection裡面可以放不同種類assets
  */


  $js = new AssetCollection(array(  
       // new GlobAsset($APP_FOLDER '/js/*'),  //也可以讀整個目錄的assets
       new FileAsset($APP_FOLDER . '/js/plugins/jquery.logger.js'),  
  ), array(
    new CompilerApiFilter()
  ));  
   
  //the code is merged when the asset is dumped
  header("Content-Type: text/javascript");
  echo $js->dump();
?>
