<?php

namespace istt\smsws\controllers;

use Yii;
use yii\web\Controller;

/**
 * DefaultController display reports about this module
 */
class DefaultController extends Controller
{

    /**
     * Lists all NetworkOperator models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
