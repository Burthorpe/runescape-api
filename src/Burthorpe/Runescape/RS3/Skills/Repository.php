<?php

namespace Burthorpe\Runescape\RS3\Skills;

use Illuminate\Support\Collection;

class Repository
{
    /**
     * @var \Illuminate\Support\Collection
     */
    protected $collection;

    public function __construct()
    {
        $this->collection = new Collection([
            new Overall(),
            new Attack(),
            new Defence(),
            new Strength(),
            new Constitution(),
            new Ranged(),
            new Prayer(),
            new Magic(),
            new Cooking(),
            new Woodcutting(),
            new Fletching(),
            new Fishing(),
            new Firemaking(),
            new Crafting(),
            new Smithing(),
            new Mining(),
            new Herblore(),
            new Agility(),
            new Thieving(),
            new Slayer(),
            new Farming(),
            new Runecrafting(),
            new Hunter(),
            new Construction(),
            new Summoning(),
            new Dungeoneering(),
            new Divination(),
        ]);
    }

    public function __call($method, $params)
    {
        return call_user_func_array([$this->collection, $method], $params);
    }

    /**
     * Find a skill by its ID
     *
     * @param $id
     * @return \Burthorpe\Runescape\RS3\Skills\Contract|null
     */
    public function find($id)
    {
        return $this->collection->filter(function(Contract $skill) use ($id) {
            return $skill->getId() === $id;
        })->first();
    }

    /**
     * Find a skill by its name
     *
     * @param $name
     * @return \Burthorpe\Runescape\RS3\Skills\Contract|null
     */
    public function findByName($name)
    {
        return $this->collection->filter(function(Contract $skill) use ($name) {
            return $skill->getName() === strtolower($name);
        })->first();
    }


}