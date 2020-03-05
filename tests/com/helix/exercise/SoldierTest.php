<?php

namespace com\helix\exercise;

use PHPUnit\Framework\TestCase;

class SoldierTest extends TestCase
{

    public function testTransform()
    {
        $soldier = new Soldier(new Archer());
        $soldier->improve();
        $this->assertEquals(17, $soldier->getPoints());
    }

    public function testImprove()
    {
        $pikeman = new Soldier(new Pikeman());
        $pikeman->transform();
        $archer = new Soldier(new Archer());
        $archer->transform();
        $knight = new Soldier(new Knight());
        $knight->transform();
        $this->assertEquals(get_class(new Knight()), get_class($archer->getType()));
        $this->assertEquals(get_class(new Archer()), get_class($pikeman->getType()));
        $this->assertEquals(get_class(new Knight()), get_class($knight->getType()));
    }
}
