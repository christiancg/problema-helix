<?php

namespace com\helix\exercise;

use Exception;
use PHPUnit\Framework\TestCase;

class BattleTest extends TestCase
{

    public function testGetAttackArmy()
    {
        try {
            $attacker = ArmyCreator::createArmy(Civilizations::CHINESE);
            $defender = ArmyCreator::createArmy(Civilizations::ENGLISHMEN);
            $battle = new Battle($attacker, $defender);
            $this->assertEquals($attacker, $battle->getAttackArmy());
        } catch (Exception $exception) {
            $this->fail("An exception has been thrown: " . $exception->getMessage());
        }
    }

    public function testGetDefendArmy()
    {
        try {
            $attacker = ArmyCreator::createArmy(Civilizations::CHINESE);
            $defender = ArmyCreator::createArmy(Civilizations::ENGLISHMEN);
            $battle = new Battle($attacker, $defender);
            $this->assertEquals($defender, $battle->getDefendArmy());
        } catch (Exception $exception) {
            $this->fail("An exception has been thrown: " . $exception->getMessage());
        }
    }

    public function testGetWinner()
    {
        try {
            $attacker = ArmyCreator::createArmy(Civilizations::CHINESE);
            $defender = ArmyCreator::createArmy(Civilizations::ENGLISHMEN);
            $battle = new Battle($attacker, $defender);
            $this->assertEquals(false, $battle->attackerWon());
        } catch (Exception $exception) {
            $this->fail("An exception has been thrown: " . $exception->getMessage());
        }
    }

    public function testFight()
    {
        try {
            $attacker = ArmyCreator::createArmy(Civilizations::CHINESE);
            $defender = ArmyCreator::createArmy(Civilizations::ENGLISHMEN);
            $battle = new Battle($attacker, $defender);
            $battle->fight();
            $knightCount = 0;
            foreach ($battle->getAttackArmy()->getSoldiers() as $soldier) {
                if (get_class($soldier->getType()) === get_class(new Knight()))
                    $knightCount += 1;
            }
            $this->assertCount(27, $attacker->getSoldiers());
            $this->assertEquals(0, $knightCount);
            $this->assertEquals(1100, $defender->getCoins());
        } catch (Exception $exception) {
            $this->fail("An exception has been thrown: " . $exception->getMessage());
        }
    }
}
