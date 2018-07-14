<?php
namespace api\models;

class UrlRuleCustom extends \yii\rest\UrlRule {
  $version = 'v1';

  public function init()
  {
    $path = '@api\modules\$this->version\controllers';
    $d = dir(Yii::getAlias($path));
    $arr = [];
    while (false !== ($entry = $d->read())) {
       if (strpos($entry, 'Controller.php') !== false) {
          $arr[] = lcfirst(str_replace(['Controller.php'], '', $entry));
       }
    }

    $this->controller = $arr;    

    parent::init();
  }
}
