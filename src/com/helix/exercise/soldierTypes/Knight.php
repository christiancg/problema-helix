<?php


namespace com\helix\exercise;


class Knight implements ISoldierType
{
    public function getInitialPoints(): int
    {
        return 20;
    }

    public function getImprovePoints(): int
    {
        return 10;
    }

    public function transform(Soldier $soldier) : void
    {
        //Cannot transform
    }

    public function getImproveCost(): int
    {
        return 30;
    }

    public function getTransformCost(): int
    {
        return 0; //cannot transform
    }
}