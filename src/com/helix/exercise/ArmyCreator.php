<?php


namespace com\helix\exercise;


use Exception;

class ArmyCreator
{
    public static function createArmy(int $civilization): Army
    {
        if (in_array($civilization, Civilizations::getAllCivilizations())) {
            $army = new Army($civilization);
            $army->addCoins(1000);
            $soldiers = array();
            switch ($civilization) {
                case 1:
                    $soldiers = self::createAllSoldiers(2, 25, 2);
                    break;
                case 2:
                    $soldiers = self::createAllSoldiers(10, 10, 10);
                    break;
                case 3:
                    $soldiers = self::createAllSoldiers(5, 8, 15);
                    break;
                default:
                    break;
            }
            $army->setSoldiers($soldiers);
            return $army;
        } else
            throw new Exception("trying to create a non supported type of army");
    }

    private static function createAllSoldiers(int $pikemanQuantity, int $archerQuantity, int $knightQuantity): array
    {
        $soldiers = array();
        $soldiers = array_merge($soldiers, self::createSpecificSoldiers(new Pikeman(), $pikemanQuantity));
        $soldiers = array_merge($soldiers, self::createSpecificSoldiers(new Archer(), $archerQuantity));
        $soldiers = array_merge($soldiers, self::createSpecificSoldiers(new Knight(), $knightQuantity));
        return $soldiers;
    }

    private static function createSpecificSoldiers(ISoldierType $type, int $quantity): array
    {
        $soldiers = array();
        for ($i = 0; $i < $quantity; $i++)
            $soldiers[] = new Soldier($type);
        return $soldiers;
    }
}