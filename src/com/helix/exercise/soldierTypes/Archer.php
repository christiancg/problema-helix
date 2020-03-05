<?php


namespace com\helix\exercise;


class Archer implements ISoldierType
{
    public function getInitialPoints(): int
    {
        return 10;
    }

    public function getImprovePoints(): int
    {
        return 7;
    }

    public function transform(Soldier $soldier) : void
    {
        $soldier->setType(new Knight());
    }

    public function getImproveCost(): int
    {
        return 20;
    }

    public function getTransformCost(): int
    {
        return 40;
    }
}