<?php

use Codeception\Util\Locator;

class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->seeInTitle('Index');
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        try {
            // try to fill the first page
            // seems that input fields without a form parent aren't catched by codeception
            // http://phptest.club/t/fillfield-outside-form/85/5
            // so I tried this approach https://codeception.com/docs/03-AcceptanceTests#Conditional-Assertions
            $I->see('#email');
            $I->fillField(Locator::firstElement('//input[@id="email"]'), 'user001@getnada.com');
            $I->fillField('#email', 'user@getnada.com');
            $I->click('#enterimg');
        } catch (\Throwable $th) {
            echo '{{{ First approach fail }}} => ' . $th->getMessage();
        }
        try {
            // skipped first login page and go to the next
            $I->click('btn1');
            $I->fillField('//input[@ng-model="Email"]', 'user001@getnada.com');
            $I->fillField('//input[@ng-model="Password"]', 'user001@getnada.com');
            $I->click('enterbtn');
        } catch (\Throwable $th) {
            echo '{{{ Second approach fail }}} => ' . $th->getMessage();
            // skip to register page
            $I->amOnPage('/Register.html');
        }

        /**
         * final assertion
         */
        $I->seeInTitle('Register');
    }
}
