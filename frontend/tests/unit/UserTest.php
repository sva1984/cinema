<?php namespace frontend\tests;

use Codeception\Test\Unit;
use frontend\tests\fixtures\UserFixture;

class UserTest extends Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;

    public function _fixtures()
    {
        return ['users' => UserFixture::className()];
    }



    public function testGetNickNameFeature()
    {
//        sleep(20);
        $user = $this->tester->grabFixture('users', 'user1');
        expect($user->getUsername())->equals('bayer.hudson');
    }

    public function testGetNickNameFeature2()
    {
//        sleep(20);
        $user = $this->tester->grabFixture('users', 'user2');
        expect($user->getUsername())->equals('2');
    }
}
