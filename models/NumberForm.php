<?php

declare(strict_types=1);

namespace app\models;

use yii\base\Model;

class NumberForm extends Model
{
    public int $minNumber = 1;
    public int $maxNumber = 1;

    public function rules(): array
    {
        return [
            ['minNumber', 'number', 'min' => 1, 'max' => 999999],
            ['maxNumber', function($attribute) {
                if ($this->$attribute < $this->minNumber) {
                    $this->addError($attribute, "The maximum number must be greater than the minimum");
                }
            }],
        ];
    }
}