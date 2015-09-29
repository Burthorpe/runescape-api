<?php

class RepositoryTests extends PHPUnit_Framework_TestCase {

    public function testFind()
    {
        $repository = new \Burthorpe\Runescape\RS3\Skills\Repository();

        $this->assertTrue($repository->find(0) instanceof \Burthorpe\Runescape\RS3\Skills\Overall);
        $this->assertTrue($repository->find(1) instanceof \Burthorpe\Runescape\RS3\Skills\Attack);
        $this->assertTrue($repository->find(2) instanceof \Burthorpe\Runescape\RS3\Skills\Defence);
        $this->assertTrue($repository->find(3) instanceof \Burthorpe\Runescape\RS3\Skills\Strength);
        $this->assertTrue($repository->find(4) instanceof \Burthorpe\Runescape\RS3\Skills\Constitution);
        $this->assertTrue($repository->find(5) instanceof \Burthorpe\Runescape\RS3\Skills\Ranged);
        $this->assertTrue($repository->find(6) instanceof \Burthorpe\Runescape\RS3\Skills\Prayer);
        $this->assertTrue($repository->find(7) instanceof \Burthorpe\Runescape\RS3\Skills\Magic);
        $this->assertTrue($repository->find(8) instanceof \Burthorpe\Runescape\RS3\Skills\Cooking);
        $this->assertTrue($repository->find(9) instanceof \Burthorpe\Runescape\RS3\Skills\Woodcutting);
        $this->assertTrue($repository->find(10) instanceof \Burthorpe\Runescape\RS3\Skills\Fletching);
        $this->assertTrue($repository->find(11) instanceof \Burthorpe\Runescape\RS3\Skills\Fishing);
        $this->assertTrue($repository->find(12) instanceof \Burthorpe\Runescape\RS3\Skills\Firemaking);
        $this->assertTrue($repository->find(13) instanceof \Burthorpe\Runescape\RS3\Skills\Crafting);
        $this->assertTrue($repository->find(14) instanceof \Burthorpe\Runescape\RS3\Skills\Smithing);
        $this->assertTrue($repository->find(15) instanceof \Burthorpe\Runescape\RS3\Skills\Mining);
        $this->assertTrue($repository->find(16) instanceof \Burthorpe\Runescape\RS3\Skills\Herblore);
        $this->assertTrue($repository->find(17) instanceof \Burthorpe\Runescape\RS3\Skills\Agility);
        $this->assertTrue($repository->find(18) instanceof \Burthorpe\Runescape\RS3\Skills\Thieving);
        $this->assertTrue($repository->find(19) instanceof \Burthorpe\Runescape\RS3\Skills\Slayer);
        $this->assertTrue($repository->find(20) instanceof \Burthorpe\Runescape\RS3\Skills\Farming);
        $this->assertTrue($repository->find(21) instanceof \Burthorpe\Runescape\RS3\Skills\Runecrafting);
        $this->assertTrue($repository->find(22) instanceof \Burthorpe\Runescape\RS3\Skills\Hunter);
        $this->assertTrue($repository->find(23) instanceof \Burthorpe\Runescape\RS3\Skills\Construction);
        $this->assertTrue($repository->find(24) instanceof \Burthorpe\Runescape\RS3\Skills\Summoning);
        $this->assertTrue($repository->find(25) instanceof \Burthorpe\Runescape\RS3\Skills\Dungeoneering);
        $this->assertTrue($repository->find(26) instanceof \Burthorpe\Runescape\RS3\Skills\Divination);
    }

    public function testFindByName()
    {
        $repository = new \Burthorpe\Runescape\RS3\Skills\Repository();

        $this->assertTrue($repository->findByName('Overall') instanceof \Burthorpe\Runescape\RS3\Skills\Overall);
        $this->assertTrue($repository->findByName('Attack') instanceof \Burthorpe\Runescape\RS3\Skills\Attack);
        $this->assertTrue($repository->findByName('Defence') instanceof \Burthorpe\Runescape\RS3\Skills\Defence);
        $this->assertTrue($repository->findByName('Strength') instanceof \Burthorpe\Runescape\RS3\Skills\Strength);
        $this->assertTrue($repository->findByname('Constitution') instanceof \Burthorpe\Runescape\RS3\Skills\Constitution);
        $this->assertTrue($repository->findByName('Ranged') instanceof \Burthorpe\Runescape\RS3\Skills\Ranged);
        $this->assertTrue($repository->findByName('Prayer') instanceof \Burthorpe\Runescape\RS3\Skills\Prayer);
        $this->assertTrue($repository->findByName('Magic') instanceof \Burthorpe\Runescape\RS3\Skills\Magic);
        $this->assertTrue($repository->findByName('Cooking') instanceof \Burthorpe\Runescape\RS3\Skills\Cooking);
        $this->assertTrue($repository->findByName('Woodcutting') instanceof \Burthorpe\Runescape\RS3\Skills\Woodcutting);
        $this->assertTrue($repository->findByName('Fletching') instanceof \Burthorpe\Runescape\RS3\Skills\Fletching);
        $this->assertTrue($repository->findByName('Fishing') instanceof \Burthorpe\Runescape\RS3\Skills\Fishing);
        $this->assertTrue($repository->findByName('Firemaking') instanceof \Burthorpe\Runescape\RS3\Skills\Firemaking);
        $this->assertTrue($repository->findByName('Crafting') instanceof \Burthorpe\Runescape\RS3\Skills\Crafting);
        $this->assertTrue($repository->findByName('Smithing') instanceof \Burthorpe\Runescape\RS3\Skills\Smithing);
        $this->assertTrue($repository->findByName('Mining') instanceof \Burthorpe\Runescape\RS3\Skills\Mining);
        $this->assertTrue($repository->findByName('Herblore') instanceof \Burthorpe\Runescape\RS3\Skills\Herblore);
        $this->assertTrue($repository->findByName('Agility') instanceof \Burthorpe\Runescape\RS3\Skills\Agility);
        $this->assertTrue($repository->findByName('Thieving') instanceof \Burthorpe\Runescape\RS3\Skills\Thieving);
        $this->assertTrue($repository->findByName('Slayer') instanceof \Burthorpe\Runescape\RS3\Skills\Slayer);
        $this->assertTrue($repository->findByName('Farming') instanceof \Burthorpe\Runescape\RS3\Skills\Farming);
        $this->assertTrue($repository->findByName('Runecrafting') instanceof \Burthorpe\Runescape\RS3\Skills\Runecrafting);
        $this->assertTrue($repository->findByName('Hunter') instanceof \Burthorpe\Runescape\RS3\Skills\Hunter);
        $this->assertTrue($repository->findByName('Construction') instanceof \Burthorpe\Runescape\RS3\Skills\Construction);
        $this->assertTrue($repository->findByName('Summoning') instanceof \Burthorpe\Runescape\RS3\Skills\Summoning);
        $this->assertTrue($repository->findByName('Dungeoneering') instanceof \Burthorpe\Runescape\RS3\Skills\Dungeoneering);
        $this->assertTrue($repository->findByName('Divination') instanceof \Burthorpe\Runescape\RS3\Skills\Divination);
    }

}