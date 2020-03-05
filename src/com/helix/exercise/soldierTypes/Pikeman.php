<?php


namespace com\helix\exercise;


class Pikeman implements ISoldierType
{
    public function getInitialPoints(): int
    {
        return 5;
    }

    public function getImprovePoints(): int
    {
        return 3;
    }

    public function transform(Soldier $soldier) : void
    {
        $soldier->setType(new Archer());
    }

    public function getImproveCost(): int
    {
        return 10;
    }

    public function getTransformCost(): int
    {
        return 30;
    }
}