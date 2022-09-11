<?php

/** @var yii\web\View $this */
/** @var NumberForm $numberForm */

/** @var int $luckyTicketsCount */

use app\models\NumberForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'My Yii Application';

$form = ActiveForm::begin([
    'id' => 'lucky_tickets_count_form',
]);
?>

<?= $form->field($numberForm, 'minNumber')->label('N - from')->input('number', ['min' => 1, 'max' => 999999]) ?>
<?= $form->field($numberForm, 'maxNumber')->label('N - to')->input('number', ['min' => 1, 'max' => 999999]) ?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Run', ['class' => 'btn btn-primary']) ?>
    </div>
</div>

<?php ActiveForm::end() ?>

<p><b>Number of tickets: </b><?= $luckyTicketsCount ?></p>

<?php

$this->registerJsVar('minNumberInputId', Html::getInputId($numberForm, 'minNumber'));
$this->registerJsVar('maxNumberInputId', Html::getInputId($numberForm, 'maxNumber'));

$this->registerJsFile('@web/js/site.js', ['depends' => 'yii\web\JqueryAsset']);
?>