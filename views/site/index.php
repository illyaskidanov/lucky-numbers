<?php

/** @var yii\web\View $this */
/** @var NumberForm $numberForm */

/** @var int $luckyNumberTicketsCount */

use app\models\NumberForm;

$this->title = 'Lucky Ticket';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?= $this->render('_form', compact('numberForm', 'luckyNumberTicketsCount'))?>
        </div>
    </div>
</div>