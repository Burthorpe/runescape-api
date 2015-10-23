<?php

class RepositoryTests extends PHPUnit_Framework_TestCase {

    public function testFind()
    {
        $repository = new \Burthorpe\Runescape\RS3\Skills\Repository();

        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Overall::class, $repository->find(0));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Attack::class, $repository->find(1));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Defence::class, $repository->find(2));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Strength::class, $repository->find(3));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Constitution::class, $repository->find(4));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Ranged::class, $repository->find(5));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Prayer::class, $repository->find(6));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Magic::class, $repository->find(7));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Cooking::class, $repository->find(8));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Woodcutting::class, $repository->find(9));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Fletching::class, $repository->find(10));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Fishing::class, $repository->find(11));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Firemaking::class, $repository->find(12));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Crafting::class, $repository->find(13));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Smithing::class, $repository->find(14));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Mining::class, $repository->find(15));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Herblore::class, $repository->find(16));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Agility::class, $repository->find(17));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Thieving::class, $repository->find(18));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Slayer::class, $repository->find(19));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Farming::class, $repository->find(20));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Runecrafting::class, $repository->find(21));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Hunter::class, $repository->find(22));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Construction::class, $repository->find(23));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Summoning::class, $repository->find(24));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Dungeoneering::class, $repository->find(25));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Divination::class, $repository->find(26));
    }

    public function testFindByName()
    {
        $repository = new \Burthorpe\Runescape\RS3\Skills\Repository();

        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Overall::class, $repository->findByName('Overall'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Attack::class, $repository->findByName('Attack'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Defence::class, $repository->findByName('Defence'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Strength::class, $repository->findByName('Strength'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Constitution::class, $repository->findByName('Constitution'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Ranged::class, $repository->findByName('Ranged'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Prayer::class, $repository->findByName('Prayer'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Magic::class, $repository->findByName('Magic'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Cooking::class, $repository->findByName('Cooking'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Woodcutting::class, $repository->findByName('Woodcutting'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Fletching::class, $repository->findByName('Fletching'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Fishing::class, $repository->findByName('Fishing'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Firemaking::class, $repository->findByName('Firemaking'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Crafting::class, $repository->findByName('Crafting'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Smithing::class, $repository->findByName('Smithing'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Mining::class, $repository->findByName('Mining'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Herblore::class, $repository->findByName('Herblore'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Agility::class, $repository->findByName('Agility'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Thieving::class, $repository->findByName('Thieving'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Slayer::class, $repository->findByName('Slayer'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Farming::class, $repository->findByName('Farming'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Runecrafting::class, $repository->findByName('Runecrafting'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Hunter::class, $repository->findByName('Hunter'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Construction::class, $repository->findByName('Construction'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Summoning::class, $repository->findByName('Summoning'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Dungeoneering::class, $repository->findByName('Dungeoneering'));
        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Divination::class, $repository->findByName('Divination'));
    }

}