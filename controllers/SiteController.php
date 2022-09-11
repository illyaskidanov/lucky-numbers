<?php

namespace app\controllers;

use app\models\NumberForm;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * Displays homepage.
     */
    public function actionIndex()
    {
        $numberForm = new NumberForm();
        $luckyTicketsCount = 0;

        if (\Yii::$app->request->isPost && $numberForm->load(\Yii::$app->request->post())) {
            if ($numberForm->validate()) {
                $luckyTicketsCount = 42;
            }
        }

        return $this->render('index', [
            'numberForm' => $numberForm,
            'luckyTicketsCount' => $luckyTicketsCount
        ]);
    }
}
