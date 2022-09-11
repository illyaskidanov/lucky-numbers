<?php

namespace app\controllers;

use app\models\NumberForm;
use app\services\LuckyNumberService;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * @var LuckyNumberService
     */
    private $luckyNumberService;

    public function __construct($id, $module, LuckyNumberService $luckyNumberService, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->luckyNumberService = $luckyNumberService;
    }

    /**
     * Displays homepage.
     */
    public function actionIndex()
    {
        $numberForm = new NumberForm();
        $luckyNumberTicketsCount = 'XXXXXX';

        if (\Yii::$app->request->isPost && $numberForm->load(\Yii::$app->request->post())) {
            if ($numberForm->validate()) {
                $luckyNumberTicketsCount = $this->luckyNumberService->countLuckyNumbers(
                    $numberForm->minNumber,
                    $numberForm->maxNumber
                );
            }
        }

        return $this->render(
            'index',
            compact('numberForm', 'luckyNumberTicketsCount')
        );
    }
}
