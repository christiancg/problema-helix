<?php


namespace com\helix\exercise;


class Battle
{
    private Army $attackArmy;
    private Army $defendArmy;
    private bool $attackerWon;
    private bool $hasBeenFought;

    public function __construct(Army $attackArmy, Army $defendArmy)
    {
        $this->attackArmy = $attackArmy;
        $this->defendArmy = $defendArmy;
        $this->hasBeenFought = false;
        $this->attackerWon = false;
    }

    /**
     * @return Army
     */
    public function getAttackArmy(): Army
    {
        return $this->attackArmy;
    }

    /**
     * @return Army
     */
    public function getDefendArmy(): Army
    {
        return $this->defendArmy;
    }

    /**
     * @return bool
     */
    public function attackerWon(): bool
    {
        return $this->attackerWon;
    }

    public function fight(): void
    {
        if (!$this->hasBeenFought) {
            $attackerPoints = $this->attackArmy->getTotalPoints();
            $defenderPoints = $this->defendArmy->getTotalPoints();
            if ($attackerPoints > $defenderPoints) {
                $this->attackerWon = true;
                $this->attackArmy->addCoins(100);
                $this->looseBest2Soldiers($this->defendArmy);
            } else if ($attackerPoints < $defenderPoints) {
                $this->defendArmy->addCoins(100);
                $this->looseBest2Soldiers($this->attackArmy);
            } else {
                $this->looseLastSoldier($this->attackArmy);
                $this->looseLastSoldier($this->defendArmy);
            }
            $this->attackArmy->addBattle($this);
            $this->defendArmy->addBattle($this);
            $this->hasBeenFought = true;
        }
    }

    private function looseBest2Soldiers(Army $looser): void
    {
        $soldiers = $looser->getSoldiers();
        for ($i = 0; $i < 2; $i++) {
            $toRemove = $this->getBestSoldier($soldiers);
            $index = array_search($toRemove, $soldiers);
            array_splice($soldiers, $index, 1);
        }
        $looser->setSoldiers($soldiers);
    }

    private function getBestSoldier(array $soldiers): Soldier
    {
        $best = $soldiers[0];
        foreach ($soldiers as $soldier) {
            if ($soldier->getPoints() > $best->getPoints())
                $best = $soldier;
        }
        return $best;
    }

    private function looseLastSoldier(Army $army): void
    {
        $soldiers = $army->getSoldiers();
        array_pop($soldiers);
        $army->setSoldiers($soldiers);
    }
}