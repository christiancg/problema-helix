<?php

namespace com\helix\exercise;

use Exception;
use PHPUnit\Framework\TestCase;

class ArmyTest extends TestCase
{

    public function testAttack()
    {
        try {
            $byzantineArmy = ArmyCreator::createArmy(Civilizations::BYZANTINE);
            $chineseArmy = ArmyCreator::createArmy(Civilizations::CHINESE);
            $byzantineArmy->attack($chineseArmy);
            $this->assertCount(1, $byzantineArmy->getBattles());
            $this->assertCount(1, $chineseArmy->getBattles());
            $this->assertTrue($byzantineArmy->getBattles()[0]->attackerWon());
            $this->assertEquals(1100, $byzantineArmy->getCoins());
        }catch (Exception $exception){
            $this->fail("An exception has been thrown: " . $exception->getMessage());
        }
    }

    public function testTrainSoldier()
    {
        try {
            $englishArmy = ArmyCreator::createArmy(Civilizations::ENGLISHMEN);
            $soldier = $englishArmy->getSoldiers()[0];
            $englishArmy->trainSoldier($soldier);
            $soldierType = get_class($soldier->getType());
            if($soldierType === get_class(new Pikeman())){
                $this->assertEquals(8, $soldier->getPoints());
                $this->assertEquals(990, $englishArmy->getCoins());
            } else if($soldierType === get_class(new Archer())) {
                $this->assertEquals(17, $soldier->getPoints());
                $this->assertEquals(980, $englishArmy->getCoins());
            } else {
                $this->assertEquals(30, $soldier->getPoints());
                $this->assertEquals(970, $englishArmy->getCoins());
            }
        }catch (Exception $exception){
            $this->fail("An exception has been thrown: " . $exception->getMessage());
        }
    }

    public function testTransformSoldier()
    {
        try {
            $englishArmy = ArmyCreator::createArmy(Civilizations::ENGLISHMEN);
            $soldier = $englishArmy->getSoldiers()[0];
            $originalSoldierType = get_class($soldier->getType());
            $englishArmy->transformSoldier($soldier);
            if($originalSoldierType === get_class(new Pikeman())){
                $this->assertEquals(get_class(new Archer()), get_class($soldier->getType()));
                $this->assertEquals(970, $englishArmy->getCoins());
            } else if($originalSoldierType === get_class(new Archer())) {
                $this->assertEquals(get_class(new Knight()), get_class($soldier->getType()));
                $this->assertEquals(960, $englishArmy->getCoins());
            } else {
                $this->assertEquals(get_class(new Knight()), get_class($soldier->getType()));
                $this->assertEquals(1000, $englishArmy->getCoins());
            }
        }catch (Exception $exception){
            $this->fail("An exception has been thrown: " . $exception->getMessage());
        }
    }
}
