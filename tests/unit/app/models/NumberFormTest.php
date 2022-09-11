<?php


namespace Unit\app\models;

use app\models\NumberForm;
use Codeception\Test\Unit;
use \UnitTester;

class NumberFormTest extends Unit
{

    protected UnitTester $tester;

    public function testValidateMinNumber()
    {
        $numberForm = new NumberForm();

        $numberForm->minNumber = '000001';
        $this->assertTrue($numberForm->validate(['minNumber']));

        $numberForm->minNumber = '000000';
        $this->assertFalse($numberForm->validate(['minNumber']));

        $numberForm->minNumber = 'qwerty';
        $this->assertFalse($numberForm->validate(['minNumber']));
    }

    public function testValidateMaxNumber()
    {
        $numberForm = new NumberForm();

        $numberForm->maxNumber = '784515';
        $this->assertTrue($numberForm->validate(['maxNumber']));

        $numberForm->maxNumber = '000000';
        $this->assertFalse($numberForm->validate(['maxNumber']));

        $numberForm->maxNumber = 'qwerty';
        $this->assertFalse($numberForm->validate(['maxNumber']));

        $numberForm->minNumber = "999999";
        $numberForm->maxNumber = "000001";

        $this->assertFalse($numberForm->validate(['maxNumber']));
    }
}
