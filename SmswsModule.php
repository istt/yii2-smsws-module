<?php

namespace istt\smsws;

class SmswsModule extends \yii\base\Module
{
    public $controllerNamespace = 'istt\template\controllers';

    public function init()
    {
        parent::init();

        \Yii::$app->getI18n()->translations['*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => __DIR__ . '/messages',
        ];
    }
}
