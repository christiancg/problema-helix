<?php

namespace com\helix\exercise;

use Exception;
use PHPUnit\Framework\TestCase;

class ArmyCreatorTest extends TestCase
{

    public function testCreateArmy()
    {
        try {
            $chineseArmy = ArmyCreator::createArmy(Civilizations::CHINESE);
            $this->assertEquals(300, $chineseArmy->getTotalPoints());
            $this->assertCount(29, $chineseArmy->getSoldiers());
            $englishArmy = ArmyCreator::createArmy(Civilizations::ENGLISHMEN);
            $this->assertEquals(350, $englishArmy->getTotalPoints());
            $this->assertCount(30, $englishArmy->getSoldiers());
            $byzantineArmy = ArmyCreator::createArmy(Civilizations::BYZANTINE);
            $this->assertEquals(405, $byzantineArmy->getTotalPoints());
            $this->assertCount(28, $byzantineArmy->getSoldiers());
        } catch (Exception $exception) {
            $this->fail("An exception has been thrown: " . $exception->getMessage());
        }
    }
}
