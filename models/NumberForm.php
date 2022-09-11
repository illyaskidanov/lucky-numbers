<?php

declare(strict_types=1);

namespace app\models;

use yii\base\Model;

class NumberForm extends Model
{
    public string $minNumber = "000001";
    public string $maxNumber = "999999";

    public function rules(): array
    {
        return [
            [['minNumber', 'maxNumber'], function($attribute) {
                if (!preg_match('/^\d{5}[1-9]$/', $this->$attribute)) {
                    $this->addError($attribute, "The number must have a format 'XXXXXX'");
                }
            }],
            ['maxNumber', function($attribute) {
                if (intval($this->$attribute) < $this->minNumber) {
                    $this->addError($attribute, "The maximum number must be greater than the minimum");
                }
            }],
        ];
    }
}