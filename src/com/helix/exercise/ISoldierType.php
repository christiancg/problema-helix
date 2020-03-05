<?php


namespace com\helix\exercise;


interface ISoldierType
{
    public function getInitialPoints() : int;
    public function getImprovePoints() : int;
    public function getImproveCost() : int;
    public function getTransformCost() : int;
    public function transform(Soldier $soldier) : void;
}