<?php

/** @var yii\web\View $this */
/** @var NumberForm $numberForm */

/** @var int $luckyNumberTicketsCount */

use app\models\NumberForm;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;

Pjax::begin([
    'id' => 'lucky_numbers'
]);

$form = ActiveForm::begin([
    'options' => ['data' => ['pjax' => true]],
]);
?>
    <div class="number-form">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-5">
                    <?= $form->field($numberForm, 'minNumber')->label('N - from') ?>
                </div>
                <div class="col-lg-5">
                    <?= $form->field($numberForm, 'maxNumber')->label('N - to') ?>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <div class="number-form__submit">
                            <?= Html::submitButton('Run', ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p><b>Number of tickets: </b><?= $luckyNumberTicketsCount ?></p>
            </div>
        </div>
    </div>

<?php Pjax::end(); ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <div id="lucky_numbers__loading">
                    <div class="alert alert-primary alert-primary d-flex align-items-center" role="alert">
                        <div class="spinner-grow text-primary flex-shrink-0 me-2 spinner-grow-sm" role="status"></div>
                        <div>
                            Calculating lucky numbers...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

$this->registerJsVar('minNumberInputId', Html::getInputId($numberForm, 'minNumber'));
$this->registerJsVar('maxNumberInputId', Html::getInputId($numberForm, 'maxNumber'));

$this->registerJsFile('@web/js/_form.js', ['depends' => 'yii\web\JqueryAsset']);
?>