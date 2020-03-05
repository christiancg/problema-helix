<?php


namespace com\helix\exercise;


class Army
{
    private int $civilization;
    private array $soldiers = [];
    private int $coins = 0;
    private array $battles = [];

    public function __construct(int $civilization)
    {
        $this->civilization = $civilization;
    }

    /**
     * @return array
     */
    public function getSoldiers(): array
    {
        return $this->soldiers;
    }

    /**
     * @param array $soldiers
     */
    public function setSoldiers(array $soldiers): void
    {
        $this->soldiers = $soldiers;
    }

    /**
     * @return int
     */
    public function getCoins(): int
    {
        return $this->coins;
    }

    /**
     * @return array
     */
    public function getBattles(): array
    {
        return $this->battles;
    }

    /**
     * @param array $battles
     */
    public function setBattles(array $battles): void
    {
        $this->battles = $battles;
    }

    public function trainSoldier(Soldier $soldier): void
    {
        $this->coins -= $soldier->getType()->getImproveCost();
        $soldier->improve();
    }

    public function transformSoldier(Soldier $soldier): void
    {
        $this->coins -= $soldier->getType()->getTransformCost();
        $soldier->transform();
    }

    public function attack(Army $toAttack): void
    {
        $battle = new Battle($this, $toAttack);
        $battle->fight();
    }

    public function addCoins(int $coins): void
    {
        $this->coins += $coins;
    }

    public function getTotalPoints(): int
    {
        $totalPoints = 0;
        foreach ($this->soldiers as $soldier)
            $totalPoints += $soldier->getPoints();
        return $totalPoints;
    }

    public function addBattle(Battle $battle): void
    {
        $this->battles[] = $battle;
    }

}