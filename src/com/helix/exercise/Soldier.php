<?php


namespace com\helix\exercise;


class Soldier
{
    private ISoldierType $type;

    private int $points;

    /**
     * @return mixed
     */
    public function getPoints(): int
    {
        return $this->points;
    }

    public function setType(ISoldierType $type): void
    {
        $this->type = $type;
    }

    public function getType(): ISoldierType
    {
        return $this->type;
    }

    public function __construct(ISoldierType $type)
    {
        $this->type = $type;
        $this->points = $type->getInitialPoints();
    }

    function improve(): void
    {
        $this->points = $this->points + $this->type->getImprovePoints();
    }

    function transform(): void
    {
        $this->type->transform($this);
    }
}