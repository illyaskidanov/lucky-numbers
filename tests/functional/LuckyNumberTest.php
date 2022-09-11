<?php


namespace Functional;

use \FunctionalTester;

class LuckyNumberTest extends \Codeception\Test\Unit
{

    protected FunctionalTester $tester;

    protected function _before()
    {
        $this->tester->amOnRoute('site/index');
    }

    // tests
    public function testCorrectNumberForm()
    {
        $this->tester->submitForm('form#lucky_numbers_form', [
            'NumberForm' => [
                'minNumber' => '555555',
                'maxNumber' => '777777'
            ],
        ]);

        $this->tester->see('24668');
    }

    public function testInvalidNumberForm()
    {
        $this->tester->submitForm('form#lucky_numbers_form', [
            'NumberForm' => [
                'minNumber' => '000000',
                'maxNumber' => 'qwerty'
            ],
        ]);

        $this->tester->see("The number must have a format 'XXXXXX'");
    }

    public function testInvalidMaxLowerThanMinNumberForm()
    {
        $this->tester->submitForm('form#lucky_numbers_form', [
            'NumberForm' => [
                'minNumber' => '999999',
                'maxNumber' => '111111'
            ],
        ]);

        $this->tester->see("The maximum number must be greater than the minimum");
    }
}
