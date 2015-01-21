<?php namespace Burthorpe\Runescape\Skills;

use Illuminate\Support\Collection;

class Helper {

    /*
     * Collection of the Skill classes
     *
     * @var \Illuminate\Support\Collection
     */
    protected $collection;

    /*
     * Class constructor
     */
    public function __construct()
    {
        $this->collection = new Collection([
            'agility' => new Agility,
            'attack' => new Attack,
            'constitution' => new Constitution,
            'construction' => new Construction,
            'cooking' => new Cooking,
            'crafting' => new Crafting,
            'defence' => new Defence,
            'divination' => new Divination,
            'dungeoneering' => new Dungeoneering,
            'farming' => new Farming,
            'firemaking' => new Firemaking,
            'fishing' => new Fishing,
            'fletching' => new Fletching,
            'herblore' => new Herblore,
            'hunter' => new Hunter,
            'magic' => new Magic,
            'mining' => new Mining,
            'overall' => new Overall,
            'prayer' => new Prayer,
            'ranged' => new Ranged,
            'runecrafting' => new Runecrafting,
            'slayer' => new Slayer,
            'smithing' => new Smithing,
            'strength' => new Strength,
            'summoning' => new Summoning,
            'thieving' => new Thieving,
            'woodcutting' => new Woodcutting,
        ]);
    }

    /*
     * Magic accessor to collection keys
     *
     * @return \Burthorpe\Runescape\Skills\SkillInterface
     */
    public function __get($key)
    {
        return $this->collection->get($key);
    }

    /*
     * Magic access to collection methods
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->collection, $method], $parameters);
    }

}