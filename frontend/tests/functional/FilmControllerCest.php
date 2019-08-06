<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class FilmControllerCest
{
    public function checkPageFilmsIndex(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->see('W E L C O M E');
        $I->seeLink('Films');
        $I->click('Films');
        $I->see('C I N E M A');
        $I->see('Промо');
        $I->see('Название');
        $I->seeElement('table');
        $I->amGoingTo('Форрест Гамп');
        $I->amGoingTo( "1994");
        $I->amGoingTo( "Драма");
        $I->amGoingTo( "Мелодрама");
        $I->amGoingTo( "Назад в будущее");
        $I->amGoingTo( "1985");
        $I->amGoingTo( "Комедия");
        $I->amGoingTo( "Фантастывывафываика");
        $I->amGoingTo( "Приключение");
    }
    public function checkPageFilmsView(FunctionalTester $I)
    {
        $I->amOnPage('film/view?id=1');
        $I->amGoingTo('Title');
        $I->amGoingTo('Description');
        $I->amGoingTo('Year');
        $I->amGoingTo('1994');
        $I->amGoingTo('sdssd');
        $I->amGoingTo('Форрест Гамп');
        $I->amGoingTo('Форрест Гамп');




    }

}