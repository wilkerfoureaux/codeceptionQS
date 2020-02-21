<?php

use function PHPUnit\Framework\assertEquals;

/**
 *  THIS TEST USES WEBDRIVER TO GET WEB-ELEMENTS, SINCE PHPBROWSER SEEMS TO NOT WORK WELL WITH OTHER DRIVERS
 *  PLEASE READ https://codeception.com/docs/modules/WebDriver.html TO GET MORE INFORMATION 
 */
class RegisterCest
{
    /**
     * @depends LoginCest:tryToTest
     */
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/Register.html');

        $I->amGoingTo('fill all mandatory fields');

        $I->fillField('//input[@ng-model="FirstName"]', 'Hakuna');
        $I->fillField('//input[@ng-model="LastName"]', 'Matata');
        $I->fillField('//input[@ng-model="EmailAdress"]', 'user' . $this->randomPhone() . '@getnada.com');
        $I->fillField('//input[@ng-model="Phone"]', $this->randomPhone());
        $I->click('//input[@value="' . $this->randomGender() . '"]');
        $I->selectOption('//select[@ng-model="country"]', 'Brazil');
        $I->selectOption('//select[@ng-model="yearbox"]', $this->randomYear());
        $I->selectOption('//select[@ng-model="monthbox"]', 'August');
        $I->selectOption('//select[@ng-model="daybox"]', $this->randomDay());
        $I->fillField('//input[@ng-model="Password"]', 'Abc12345');
        $I->fillField('//input[@ng-model="CPassword"]', 'Abc12345');

        //$I->click('#submitbtn');

        $I->click('//button[@id="submitbtn"]');

        $I->amGoingTo('submit with success and go to web table page');

        /**
         *  codeception stucks here, and even chrome (no headless) shows Web Table page,
         *  the acceptance test continue to get /Register page information.
         */
        $I->seeCurrentUrlEquals('/WebTable.html');
        // $I->waitForText('Web Table', 30, '//title');
        // $I->canSeeInTitle('Web Table');
        // assertEquals($I->grabTextFrom('//title'), 'Web Tables', '');

        /**
         * you can put some table assert here, but in this example, there is no usability to make a good test
         */
    }

    private function randomPhone()
    {
        // phone has to be a number with 10 digits
        return rand(1000000000, 9999999999);
    }

    private function randomGender()
    {
        $gender = rand(0, 1);
        // TODO: there is a typo in FeMale value, need to be corrected when the bug goes of
        return ($gender > 0 ? 'Male' : 'FeMale');
    }

    private function randomYear()
    {
        return strval(rand(1916, 2015));
    }

    private function randomDay()
    {
        // while the month is fixed as 'August' there is no problem
        // TODO: return a mixed with random Date() values for year and day
        return strval(rand(1, 31));
    }
}
